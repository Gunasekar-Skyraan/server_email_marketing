<?php

namespace App\Jobs;

use App\Models\User\EmailUser;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Config;



use App\Models\Email\SendEmail;
use App\Models\Template\TemplateCategory;
use App\Models\Template\Template;
use App\Models\Email\EmailCategory;
use App\Models\Email\EmailSubCategory;
use App\Models\Source\SourceEmail;
use App\Models\Email\BounsedEmail;


use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


use App\Models\Module;
Use App\Models\admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Helpers\LogActivity;

use App\Helpers\AppHelper;
use Illuminate\Support\Facades\Auth;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mail_data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail_data)
    {
        $this->mail_data = $mail_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        $input = $this->mail_data['subject'];
        
        $semd = SendEmail::find($this->mail_data['subject']);

        $source = SourceEmail::where('email_id',$semd->sender_email)->first();
        
        // define('EMAIL_HOST', $source->mail_host ?? '');
        // define('EMAIL_PORT', 465 ??  587);
        // define('EMAIL_USERNAME', $source->user_name ?? '');
        // define('EMAIL_PASSWORD', $source->password ??  '');
        // define('EMAIL_ENCRYPTION', null ??  '');
        
        $formEmail  = $semd->sender_email;
        $subject = $semd->maerketing_name;
        $html = $semd->maerketing_short_description;

        $explode = explode(',',$semd->user_id);

        $users = EmailUser::whereIn('id',$explode)->get();

        foreach($users as $mail)
        {
            $mails = $mail->user_email;

            list($username, $domain) = explode('@', $mails);
            if(checkdnsrr($domain, 'MX'))
            {
                try
                {
                    ini_set('memory_limit', '-1');

                    $mmails = Mail::html($html, function($message) use($mails, $subject, $formEmail)
                    {
                        $message->to($mails);
                        $message->subject($subject);
                    });

                    $storage = new BounsedEmail;
                    $storage->bounced_email = $mails;
                    $storage->bounced = 1;
                    $storage->send_email_id = $this->mail_data['subject'];
                    $storage->reason_message = "Mail send";
                    $storage->user_id = $mail->id;
                    $storage->save();
                    
                    $semd->mail_processing = 2;
                    $semd->save();
                }
                catch(\Exception $e)
                {
                    ini_set('memory_limit', '-1');
                    $storage = new BounsedEmail;
                    $storage->bounced_email = $mails;
                    $storage->bounced = 2;
                    $storage->send_email_id = $this->mail_data['subject'];
                    $storage->reason_message = $e->getMessage();
                    $storage->user_id = $mail->id;
                    $storage->save();
                    $coordinates = $this->second_queue($mails);
                }
            }
            else 
            {
                ini_set('memory_limit', '-1');
                $storage = new BounsedEmail;
                $storage->bounced_email = $mails;
                $storage->bounced = 2;
                $storage->send_email_id = $this->mail_data['subject'];
                $storage->reason_message = "Mail Bounced";
                $storage->user_id = $mail->id;
                $storage->save();
                $coordinates = $this->second_queue($mails);
            }
        }
    }


    private function second_queue($postcode)
    {
        $semd = SendEmail::find($this->mail_data['subject']);
        $formEmail  = $semd->sender_email;
        $subject = $semd->maerketing_name;
        $html = $semd->maerketing_short_description;

        $source = SourceEmail::where('email_id',$semd->sender_email)->first();

        $explode = explode(',',$semd->user_id);

        $simple = EmailUser::where('user_email',$postcode)->first();

        $users = EmailUser::whereIn('id', $explode)->where('id','>',$simple->id)->get();

        if(!empty($users))
        {
            foreach($users as $mail)
            {
                $mails = $mail->user_email;
                list($username, $domain) = explode('@', $mails);
                if(checkdnsrr($domain, 'MX'))
                {
                    try
                    {
                        ini_set('memory_limit', '-1');

                        Mail::html($html, function($message) use($mails, $subject, $formEmail)
                        {
                            $message->to($mails);
                            $message->subject($subject);
                        });

                        $storage = new BounsedEmail;
                        $storage->bounced_email = $mails;
                        $storage->bounced = 1;
                        $storage->send_email_id = $this->mail_data['subject'];
                        $storage->reason_message = "Mail send";
                        $storage->user_id = $mail->id;
                        $storage->save();
                        
                    }
                    catch(\Exception $e)
                    {
                        ini_set('memory_limit', '-1');
                        $storage = new BounsedEmail;
                        $storage->bounced_email = $mails;
                        $storage->bounced = 2;
                        $storage->send_email_id = $this->mail_data['subject'];
                        $storage->reason_message = $e->getMessage();
                        $storage->user_id = $mail->id;
                        $storage->save();
                        $coordinates = $this->second_queue($mails);
                    }
                }
                else
                {
                    ini_set('memory_limit', '-1');
                    $storage = new BounsedEmail;
                    $storage->bounced_email = $mails;
                    $storage->bounced = 2;
                    $storage->send_email_id = $this->mail_data['subject'];
                    $storage->reason_message = "Mail Bounced";
                    $storage->user_id = $mail->id;
                    $storage->save();
                    $coordinates = $this->second_queue($mails);
                }
            }
        }
        else
        {
            $mail_processing = SendEmail::find($this->mail_data['subject']);
            $mail_processing->mail_processing = 2;
            $mail_processing->save();
        }
    }
}
