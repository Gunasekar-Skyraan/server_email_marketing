<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User\EmailUser;


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

class testCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testCron:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Every five minutes delete user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $chek_status = SendEmail::where('mail_processing',1)->first();
        if($chek_status)
        {
            $input = $chek_status->id;
            
            $semd = SendEmail::find($chek_status->id);

            $source = SourceEmail::where('email_id',$semd->sender_email)->first();
            
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
                        $storage->send_email_id = $chek_status->id;
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
                        $storage->send_email_id = $chek_status->id;
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
                    $storage->send_email_id = $chek_status->id;
                    $storage->reason_message = "Mail Bounced";
                    $storage->user_id = $mail->id;
                    $storage->save();
                    $coordinates = $this->second_queue($mails);
                }
            }
        }
    }
    

    private function second_queue($postcode)
    {
        $chek_status = SendEmail::latest()->first();
        $semd = SendEmail::find($chek_status->id);
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
                        $storage->send_email_id = $chek_status->id;
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
                        $storage->send_email_id = $chek_status->id;
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
                    $storage->send_email_id = $chek_status->id;
                    $storage->reason_message = "Mail Bounced";
                    $storage->user_id = $mail->id;
                    $storage->save();
                    $coordinates = $this->second_queue($mails);
                }
            }
        }
        else
        {
            $mail_processing = SendEmail::find($chek_status->id)->update(['mail_processing' => 2]);
        }
    }
}
