<?php

namespace App\Jobs;

use App\Models\User\EmailUser;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;



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

        require base_path("vendor/autoload.php");

        $source = SourceEmail::where('email_id',$semd->sender_email)->first();

        $mail = new PHPMailer(true);    
        try
        {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = $source->mail_host;
            $mail->SMTPAuth = true;
            $mail->Username = $source->user_name;
            $mail->Password = $source->password;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom($semd->sender_email);

            if($semd->new_user_type	 == 2)
            {
                $explode = explode(',',$semd->new_user);

                foreach($explode as $roes)
                {
                    $mail->AddBCC($roes);
                }
            }

            if($semd->new_user_type	 == 1)
            {
                $implode = explode(',',$semd->user_id);
                $EmailUser = EmailUser::whereIn('id',$implode)->pluck('user_email')->toArray();
                foreach($EmailUser as $row)
                {
                    $mail->AddBCC($row);
                }
            }
            
            $mail->isHTML(true);

            $mail->Subject = $semd->maerketing_name;
            $mail->Body = $semd->maerketing_short_description;
            
            if($mail->send()) 
            {
                $mail_processing = SendEmail::find($this->mail_data['subject'])->update(['mail_processing' => 2]);
                dd('Mail Send Successfullyyyy');
            }
            else
            {
                return back()->with("error", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
        } 
        catch (\phpmailerException $e) 
        {
            dd($e->getMessage());
            return back()->with("error", $e->getMessage());
        }
        catch (\Exception $e)
        {
            $string = $e->getMessage();

            $explode = explode(':',$string);

            unset($explode[0],$explode[1],$explode[2]); 

            $array = array_values($explode);

            $test_patt = "/(?:[a-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
            
            $check_if_email = preg_match_all($test_patt, $string, $matches);

            if($check_if_email > 0)
            {
                $allemails = implode(',',$matches[0]);
                $alldsjn = explode(',',$allemails);

                $unique_email = array_unique($alldsjn);
                $unique_email = array_values($unique_email);

                foreach($unique_email as $key => $bounced_emails)
                {
                    $BounsedEmail = BounsedEmail::where('bounced_email',$bounced_emails)->count();
                    $EmailUser = EmailUser::where('user_email',$bounced_emails)->first();
                    if($BounsedEmail > 2)
                    {
                        $EmailUer = EmailUser::where('user_email',$bounced_emails)->first();
                        $EmailUer->block = 2;
                        $EmailUer->save();
                    }
                    $bounced = new BounsedEmail;
                    $bounced->bounced_email = $bounced_emails;
                    $bounced->user_id = $EmailUser->id ?? '1';
                    $bounced->bounced = $BounsedEmail + 1;
                    $bounced->send_email_id = $this->mail_data['subject'];
                    $bounced->reason_message = $string;
                    $bounced->save();
                    $mail_processing = SendEmail::find($this->mail_data['subject'])->update(['mail_processing' => 2]);

                }
                dd('message','Mail Send Successfully');
            }
            else
            {
                dd('message','Mail Send Successfully mugaam');
            }
        }
    }
}
