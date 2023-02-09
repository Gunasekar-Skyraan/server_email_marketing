<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;



use App\Models\Email\SendEmail;
use App\Models\Template\TemplateCategory;
use App\Models\Template\Template;
use App\Models\Email\EmailCategory;
use App\Models\Email\EmailSubCategory;
use App\Models\User\EmailUser;
use App\Models\Source\SourceEmail;
use App\Models\Email\BounsedEmail;

use App\Models\User;


use Illuminate\Support\Facades\Artisan;

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

class SendEmailController extends Controller
{
    function Add_list()
    {
        LogActivity::addToLog();
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $lists = explode('|',Auth::guard('admin')->user()->access_list);
        $list_array = in_array('set_1',$lists);
        $array = in_array('category',$explode);
        $array_1= in_array('add',$explode_1);
        if(($role == "SuperAdmin") || ($array == true && $array_1 == true && $list_array == true))
        {
            $emailcategory = EmailCategory::orderBy('id','asc')->where('deleted_at','0')->get();
            $category = TemplateCategory::orderBy('id','asc')->where('deleted_at','0')->get();
            $name = TemplateCategory::orderBy('id','asc')->where('deleted_at','0')->get();
            $sendemail = SourceEmail::where('deleted_at','0')->get();
            return view('admin.marketing.sendmail.add_sub_category',compact('category','emailcategory','sendemail','name'));
        }
        else
        {
            return redirect()->route('admin.emailslist')->with("error","Permission Denied");
        }
    }

    public function add_block()
    {
        LogActivity::addToLog();
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $lists = explode('|',Auth::guard('admin')->user()->access_list);
        $list_array = in_array('set_1',$lists);
        $array = in_array('category',$explode);
        $array_1= in_array('add',$explode_1);
        if(($role == "SuperAdmin") || ($array == true && $array_1 == true && $list_array == true))
        {
            $emailcategory = EmailCategory::orderBy('id','asc')->where('deleted_at','0')->get();
            $category = TemplateCategory::orderBy('id','asc')->where('deleted_at','0')->get();
            $name = TemplateCategory::orderBy('id','asc')->where('deleted_at','0')->get();
            $sendemail = SourceEmail::where('deleted_at','0')->get();
            return view('admin.marketing.sendmail.add_block_list',compact('category','emailcategory','sendemail','name'));
        }
        else
        {
            return redirect()->route('admin.emailslist')->with("error","Permission Denied");
        }
    }

    function show()
    {
        LogActivity::addToLog();
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $lists = explode('|',Auth::guard('admin')->user()->access_list);
        $list_array = in_array('set_1',$lists);
        $array = in_array('category',$explode);
        $array_1= in_array('view',$explode_1);
        if(($role == "SuperAdmin") || ($array == true && $array_1 == true && $list_array == true))
        {
            $SendEmail = SendEmail::orderBy('id','asc')->where('deleted_at','0')->get();
            return view('admin.marketing.sendmail.sub_category_list', ['SendEmail' => $SendEmail]);
        }
        else
        {
            return redirect()->route('admin/dashboard')->with("error","Permission Denied");
        }
    }

    public function delete(Request $request, $id)
    {
        LogActivity::addToLog();
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $lists = explode('|',Auth::guard('admin')->user()->access_list);
        $list_array = in_array('set_1',$lists);
        $array = in_array('category',$explode);
        $array_1= in_array('delete',$explode_1);
        if(($role == "SuperAdmin") || ($array == true && $array_1 == true && $list_array == true))
        {
            $Q1 = SendEmail::find($id);
            $Q1->deleted_at = '1';
            $Q1->save();
            return back()->with('message','Delete Record Successfully');
        }
        else
        {
            return redirect()->route('admin.emailslist')->with("error","Permission Denied");
        }
    }

    public function EditCategory($id)
    {
        LogActivity::addToLog();
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $lists = explode('|',Auth::guard('admin')->user()->access_list);
        $list_array = in_array('set_1',$lists);
        $array = in_array('category',$explode);
        $array_1= in_array('edit',$explode_1);
        if(($role == "SuperAdmin") || ($array == true && $array_1 == true && $list_array == true))
        {
            $edit = SendEmail::find($id);
            $edit_sub_category_id = array($edit);
            $emailcategory = EmailCategory::orderBy('id','asc')->where('deleted_at','0')->get();
            $TemplateCategory = TemplateCategory::orderBy('id','asc')->where('deleted_at','0')->get();
            $sendemail = SourceEmail::where('deleted_at','0')->get();
            return view('admin.marketing.sendmail.edit_sub_category_list', compact('edit_sub_category_id','TemplateCategory','emailcategory','sendemail'));
        }
        else
        {
            return redirect()->route('admin.emailslist')->with("error","Permission Denied");
        }
       
    }

    public function block_list_count(Request $request)
    {
        $block =  $request->block_id;
        $block_list = BounsedEmail::where('send_email_id',$block)->where('bounced','2')->get();
        return response()->json(['subcategories' => $block_list]);
    }

    public function blocked(Request $request)
    {
        $users = EmailUser::whereIn('id',$request->sub_category_id)->update(['block'=> 2]);
        return back()->with('message','Blocked Users Successfully');
    }

    public function block_list_to_mail(Request $request)
    {
        if($request->flexRadioDefault == 1)
        {
            $epxlode = explode(',',$request->ques_desc_1);
            $users = EmailUser::whereIn('user_email',$epxlode)->update(['block'=> 2]);
            return back()->with('message','Users Blocked Successfully');
        }
        else
        {
            $epxlode = explode(',',$request->ques_desc_2);
            $users = EmailUser::whereIn('user_email',$epxlode)->update(['block'=> 1]);
            return back()->with('message','Users Remove Blocked Successfully');
        }

    }



    public function EditCatList(Request $request)
    {
        $request->validate([
            'sender_email' => 'required',
        ]);
        if(!empty($request->category_id))
        {
            $category_id = implode(',',$request->category_id);
        }

        if(!empty($request->sub_category_id))
        {
            $sub_category_id = implode(',',$request->sub_category_id);
        }

        $user = new SendEmail;
        $user->sender_email = $request->sender_email;
        $user->template_category_id = $request->template_category;

        $user->template_id = $request->template_id; 
        $user->maerketing_name = $request->subject;

        $user->maerketing_short_description = $request->template_body;
        $user->user_count = $request->hidden_user_count ?? '';

        

        $user->category_id	= $category_id ?? '';
        $user->sub_category_id	= $sub_category_id ?? '';
        $user->user_id = $request->user_count[0] ?? '';

        $user->filter_age = $request->filter_age;
        $user->filter_gender = $request->filter_gender;
        $user->filter_country= $request->filter_country;
        $user->filter_state= $request->filter_state;
        
        $user->filter_city = $request->filter_city;
        $user->filter_type = $request->check_filter_type ?? '0';


        require base_path("vendor/autoload.php");

        $source = SourceEmail::where('email_id',$request->sender_email)->first();

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
            $mail->setFrom($request->sender_email);


            if($request->file_type == 2)
            {
                $user->new_user_type = $request->file_type;
                $explode = explode(',',$request->new_user);
                $implode = implode(',',$explode);

                $user->new_users = $implode;

                $EmailUser = EmailUser::whereIn('user_email',$explode)->pluck('user_email')->toArray();
                
                $newemails = array_diff($explode,$EmailUser);
              
                foreach($newemails as $all)
                {
                    $newuser = new EmailUser;
                    $newuser->user_email = $all;
                    $newuser->save();
                }

                foreach($explode as $roes)
                {   
                    $mail->addBCC($roes);
                }
            }
            if($request->file_type == 1)
            {
                $user->new_user_type = $request->file_type;
                $explode = implode(',',$request->user_count);
                $implode = explode(',',$explode);
                $EmailUser = EmailUser::whereIn('id',$implode)->get();

                foreach($EmailUser as $all)
                {
                    $mail->addBCC($all->user_email);
                }
            }
            
            $mail->isHTML(true);

            $mail->Subject = $request->subject;
            $mail->Body = $request->template_body;
            
            if($mail->send()) 
            {
                LogActivity::addToLog();
                $user->save();
                return back()->with('message','Mail Send Successfullyyyy');
            }
            else
            {
                return back()->with("error", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
        } 
        catch (phpmailerException $e) 
        {
            return back()->with("error", $e->errorMessage());
        } 
        catch (Exception $e)
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
                    if($BounsedEmail > 9)
                    {
                        $EmailUer = EmailUser::where('user_email',$bounced_emails)->first();
                        $EmailUer->block = 2;
                        $EmailUer->save();
                    }
                    LogActivity::addToLog();
                    $user->save();
                    $bounced = new BounsedEmail;
                    $bounced->bounced_email = $bounced_emails;
                    $bounced->user_id = $EmailUser->id;
                    $bounced->bounced = $BounsedEmail + 1;
                    $bounced->send_email_id = $user->id;
                    $bounced->reason_message = $array[$key];
                    $bounced->save();
                }
                return back()->with('message','Mail Send Successfully');
            }
            else
            {
                return back()->with("error", $e->errorMessage());
            }
        }
    }


    function count(Request $request)
    {
        $template_sub_category = $request->template_sub_category;
        $parent_id = $request->cat_id;
        if(!empty($parent_id))
        {
            $subcategories = Template::where('category_id', $parent_id)->where('deleted_at','0')->get();
            return response()->json(['subcategories' => $subcategories]);
        }


        if(!empty($template_sub_category))
        {
            if(count($template_sub_category) > 1)
            {
                $subcategories = EmailSubCategory::whereIn('category_id', $template_sub_category)->where('deleted_at','0')->get();
                $users = EmailUser::select('id')->whereIn('category_id',$template_sub_category)->get();
                foreach($subcategories as $row)
                {
                    $name[] = $row->id;
                }
                $user_id = [];
                foreach($users as $rows)
                {
                    $user_id[] = $rows->id;
                }
                return response()->json(['template_sub_category' => $subcategories,'subcategoru_if'=> $name,"users"=>$user_id]);
            }
            else
            {
                $explode = implode(',',$template_sub_category);
                $end = end($template_sub_category);
                $subcategories = EmailSubCategory::where('category_id', $end)->where('deleted_at','0')->get();
                $users = EmailUser::select('id')->where('category_id',$end)->get();
                foreach($subcategories as $row)
                {
                    $name[] = $row->id;
                }
                $user_id = [];
                foreach($users as $rows)
                {
                    $user_id[] = $rows->id;
                }
                return response()->json(['template_sub_category' => $subcategories,'subcategoru_if'=> $name,"users"=>$user_id]);
            }
        }



        // all fields check 
        if($request->gender == "Male" && $request->age == 1 && !empty($request->country) && !empty($request->state) && !empty($request->city))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','Male')->where('filter_age','<','20')->where('country',$request->country)->where('state',$request->state)->where('city',$request->city)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        if($request->gender == "Male" && $request->age == 2 && !empty($request->country) && !empty($request->state) && !empty($request->city))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','Male')->where('filter_age','>','20')->where('country',$request->country)->where('state',$request->state)->where('city',$request->city)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        if($request->gender == "FeMale" && $request->age == 1 && !empty($request->country) && !empty($request->state) && !empty($request->city))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','FeMale')->where('filter_age','<','20')->where('country',$request->country)->where('state',$request->state)->where('city',$request->city)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        if($request->gender == "FeMale" && $request->age == 2 && !empty($request->country) && !empty($request->state) && !empty($request->city))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','FeMale')->where('filter_age','>','20')->where('country',$request->country)->where('state',$request->state)->where('city',$request->city)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }


        // all fields check  gender,country, city , state

        if($request->gender == "Male" && !empty($request->country) && !empty($request->state) && !empty($request->city))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','Male')->where('country',$request->country)->where('state',$request->state)->where('city',$request->city)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        if($request->gender == "Male" && !empty($request->country) && !empty($request->state) && !empty($request->city))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','Male')->where('country',$request->country)->where('state',$request->state)->where('city',$request->city)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        if($request->gender == "FeMale" && !empty($request->country) && !empty($request->state) && !empty($request->city))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','FeMale')->where('country',$request->country)->where('state',$request->state)->where('city',$request->city)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        if($request->gender == "FeMale" &&  !empty($request->country) && !empty($request->state) && !empty($request->city))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','FeMale')->where('country',$request->country)->where('state',$request->state)->where('city',$request->city)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }


         // all fields check  age, gender,country,state

        if($request->gender == "Male" && $request->age == 1 && !empty($request->country) && !empty($request->state))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','Male')->where('filter_age','<','20')->where('country',$request->country)->where('state',$request->state)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }
        if($request->gender == "Male" && $request->age == 2 && !empty($request->country) && !empty($request->state))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','Male')->where('filter_age','>','20')->where('country',$request->country)->where('state',$request->state)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        if($request->gender == "FeMale" && $request->age == 1 && !empty($request->country) && !empty($request->state))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','FeMale')->where('filter_age','<','20')->where('country',$request->country)->where('state',$request->state)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        if($request->gender == "FeMale" && $request->age == 2 && !empty($request->country) && !empty($request->state))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','FeMale')->where('filter_age','>','20')->where('country',$request->country)->where('state',$request->state)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }


        // all fields check gender,country,state

        if($request->gender == "Male"  && !empty($request->country) && !empty($request->state))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','Male')->where('country',$request->country)->where('state',$request->state)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }
        if($request->gender == "Male" && !empty($request->country) && !empty($request->state))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','Male')->where('country',$request->country)->where('state',$request->state)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        if($request->gender == "FeMale" && !empty($request->country) && !empty($request->state))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','FeMale')->where('country',$request->country)->where('state',$request->state)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        if($request->gender == "FeMale"  && !empty($request->country) && !empty($request->state))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','FeMale')->where('country',$request->country)->where('state',$request->state)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }


        // all fields check age , gender,country

        if($request->gender == "Male" && $request->age == 1 && !empty($request->country))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','Male')->where('filter_age','<','20')->where('country',$request->country)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }


        if($request->gender == "Male" && $request->age == 2 && !empty($request->country))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','Male')->where('filter_age','>','20')->where('country',$request->country)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }


        if($request->gender == "FeMale" && $request->age == 1 && !empty($request->country))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','FeMale')->where('filter_age','<','20')->where('country',$request->country)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        if($request->gender == "FeMale" && $request->age == 2 && !empty($request->country))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','FeMale')->where('filter_age','>','20')->where('country',$request->country)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }


        // all fields check gender,country

        if($request->gender == "Male" && !empty($request->country))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','Male')->where('country',$request->country)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }


        if($request->gender == "Male" && !empty($request->country))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','Male')->where('country',$request->country)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }


        if($request->gender == "FeMale" && !empty($request->country))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','FeMale')->where('country',$request->country)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        if($request->gender == "FeMale" && !empty($request->country))
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','FeMale')->where('country',$request->country)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }
        
        if($request->gender == "Male" && $request->age == 1)
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','Male')->where('filter_age','<','20')->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }
        if($request->gender == "Male" && $request->age == 2)
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','Male')->where('filter_age','>','20')->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        if($request->gender == "FeMale" && $request->age == 1)
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','FeMale')->where('filter_age','<','20')->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }
        if($request->gender == "FeMale" && $request->age == 2)
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','FeMale')->where('filter_age','>','20')->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        if($request->age == 1)
        {
            $users = EmailUser::select('id')->whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('filter_age','<','20')->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }
        if($request->age == 2)
        {
            $users = EmailUser::select('id')->whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('filter_age','>','20')->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        
        if($request->gender == "Male")
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','Male')->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }

        
        if($request->gender == "FeMale")
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('gender','FeMale')->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }




        if($request->city)
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('country',$request->country)->where('state',$request->state)->where('city',$request->city)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }


        if($request->state)
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('country',$request->country)->where('state',$request->state)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }


        if($request->country)
        {
            $users = EmailUser::whereIn('category_id',$request->category_id)->whereIn('sub_category_id',$request->sub_category_id)->where('country',$request->country)->get();
            $user_id = [];
            foreach($users as $rows)
            {
                $user_id[] = $rows->id;
            }
            return response()->json(["users"=>$user_id]);
        }
    }

    function insert_email(Request $request)
    {
        $sender = $request->sender_email;

        AppHelper::setMailConfig($sender);

        $request->validate([
            'sender_email' => 'required',
        ]);

        if(!empty($request->category_id))
        {
            $category_id = implode(',',$request->category_id);
        }

        if(!empty($request->sub_category_id))
        {
            $sub_category_id = implode(',',$request->sub_category_id);
        }

        $user = new SendEmail;
        $user->sender_email = $request->sender_email;
        $user->template_category_id = $request->template_category;

        $user->template_id = $request->template_id; 
        $user->maerketing_name = $request->subject;

        $user->maerketing_short_description = $request->template_body;
        $user->user_count = $request->hidden_user_count ?? '';

        if(!empty($request->new_template_category) && ($request->template_category_hidden == 1))
        {
            $request->validate([
                'new_template_category' => 'required',
            ]);

            $template = new Template;
            $template->category_id = $request->new_template_category;
            $template->template_name = $request->category_name;
            $template->template_subject = $request->subject;
            $template->template_body = $request->template_body;
            $template->body_type = 2;
            $template->save();
        }

        $user->category_id	= $category_id ?? '';
        $user->sub_category_id	= $sub_category_id ?? '';
        $user->user_id = $request->user_count[0] ?? '';

        $user->filter_age = $request->filter_age;
        $user->filter_gender = $request->filter_gender;
        $user->filter_country= $request->filter_country;
        $user->filter_state= $request->filter_state;
        
        $user->filter_city = $request->filter_city;
        $user->filter_type = $request->check_filter_type ?? '0';


        if($request->file_type == 2)
        {
            $user->new_user_type = $request->file_type;
            $explode = explode(',',$request->new_user);
            $implode = implode(',',$explode);

            $user->new_users = $implode;

            $EmailUser = EmailUser::whereIn('user_email',$explode)->pluck('user_email')->toArray();
            
            $newemails = array_diff($explode,$EmailUser);
            
            foreach($newemails as $all)
            {
                $newuser = new EmailUser;
                $newuser->user_email = $all;
                $newuser->save();
            }
        }

        if($request->file_type == 1)
        {
            $user->new_user_type = 1;
        }
        
        $user->mail_processing = 1;
                
        $user->save();

        $mail_data = ['subject' => $user->id];

        $job = (new \App\Jobs\SendMailJob($mail_data))->onConnection('database');

        $this->dispatch($job);

        return back()->with('message',"Mail Processing");

    }





    function template_list_apend(Request $request)
    {
        $parent_id = $request->cat_id;
        $subcategories = Template::where('id', $parent_id)->where('deleted_at','0')->get();
        return response()->json(['name' => $subcategories]);
    }

    public function select_subcat(Request $request)
    {
        $parent_id = $request->cat_id;
        $subcategories = EmailSubCategory::where('category_id', $parent_id)->where('deleted_at','0')->get();
        return response()->json(['subcategories_list' => $subcategories]);
    }


}
