<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\Models\Email\SendEmail;
use App\Models\Template\TemplateCategory;
use App\Models\Template\Template;
use App\Models\Email\EmailCategory;
use App\Models\Email\EmailSubCategory;
use App\Models\User\EmailUser;
use App\Models\Source\SourceEmail;

use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Email;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


use App\Models\Module;
Use App\Models\admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Helpers\LogActivity;
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
            $sendemail = SourceEmail::where('deleted_at','0')->get();
            return view('admin.marketing.sendmail.add_sub_category',compact('category','emailcategory','sendemail'));
        }
        else
        {
            return redirect()->route('admin.emailslist')->with("error","Permission Denied");
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
        $request->validate([
            'sender_email' => 'required',
            'category_id'=>'required',
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
        $user->user_count = $request->hidden_user_count;


        $user->category_id	= $category_id;
        $user->sub_category_id	= $sub_category_id;
        $user->user_id = $request->user_count[0];

        $user->filter_age = $request->filter_age;
        $user->filter_gender = $request->filter_gender;
        $user->filter_country= $request->filter_country;
        $user->filter_state= $request->filter_state;
        
        $user->filter_city = $request->filter_city;
        $user->filter_type = $request->check_filter_type ?? '0';


        require base_path("vendor/autoload.php");

        $source = SourceEmail::where('email_id',$request->sender_email)->first();
        // dd($source);

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

            $explode = implode(',',$request->user_count);
            $implode = explode(',',$explode);
            $EmailUser = EmailUser::whereIn('id',$implode)->get();

            
            foreach($EmailUser as $all)
            {
                $mail->addBCC($all->user_email);
            }

            $mail->isHTML(true);
 
            $mail->Subject = $request->subject;
            $mail->Body    = $request->template_body;
  
            if($mail->send()) 
            {
                LogActivity::addToLog();
                $user->save();
                return back()->with('message','Mail Send Successfully');
            }
            else
            {
                return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            }

        } 
        
        catch (Exception $e) 
        {
            return back()->with('error','Message could not be sent.');
        }
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
