<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Models\User\EmailUser;
use App\Models\Email\EmailCategory;

use Illuminate\Http\Request;
use App\Models\Module;
Use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Helpers\LogActivity;
use Auth;
use Carbon\Carbon;


class EmailUserController extends Controller
{
    
    
    public function show()
    {
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $lists = explode('|',Auth::guard('admin')->user()->access_list);
        $list_array = in_array('set_4',$lists);
        $array = in_array('app',$explode);
        $array_1= in_array('view',$explode_1);
        if(($role == "SuperAdmin") || ($array == true && $array_1 == true && $list_array == true))
        {
            $app = EmailUser::orderBy('id','asc')->where('deleted_at','0')->get();
            $active = EmailUser::where('is_active','1')->get();
            return view('admin.users.applist.app_list', ['apps' => $app],['app_active'=>$active]);
        }
        else
        {
            return redirect()->route('admin/dashboard')->with("error","Permission Denied");
        }
    }

    function add()
    {
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $lists = explode('|',Auth::guard('admin')->user()->access_list);
        $list_array = in_array('set_4',$lists);
        $array = in_array('app',$explode);
        $array_1= in_array('add',$explode_1);
        if(($role == "SuperAdmin") || ($array == true && $array_1 == true && $list_array == true))
        {
            $categorys = EmailCategory::orderBy('id','asc')->where('deleted_at','0')->get();
            return view('admin.users.applist.add_app',compact('categorys'));
        }
        else
        {
            return redirect()->route('admin/dashboard')->with("error","Permission Denied");
        }
    }   

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'required|unique:email_users,user_email',
            'phone_number'=>'min:10'
        ]);
        
        $user = new EmailUser;
        $user->user_name = $request->name ?? null;
        $user->user_email = $request->email;        
        $user->phone_number= $request->phone_number ?? null;
        $user->same_as_ph= $request->same_as ?? null;
        $user->whatsapp_number= $request->whatssapp_number ?? null;
        
        $user->gender = $request['radio-optional'] ?? null;

        if($request->image == 0)
        {
            $years = Carbon::parse($request->dob)->age ?? null;
            $user->filter_age = $years ?? null;
            $user->age_type = $request->image ?? null;
            $user->date_of_birth = $request->dob ?? null;
        }
        if($request->image == 1)
        {
            $user->age_type = $request->image ?? null;
            $user->age = $request->age ?? null;
            $user->filter_age = $request->age ?? null;
        } 
        $user->country= $request->country ?? null;
        $user->city= $request->district ?? null;
        $user->pincode = $request->Pincode ?? null;
        $user->state = $request->State ?? null;
        $user->block = 1 ?? null;
        $user->category_id = $request->category_id ?? null;
        $user->sub_category_id	 = $request->subcategory ?? null;
        $user->admin_id = Auth::guard('admin')->user()->id ?? null; 
        LogActivity::addToLog();
        $user->save();
        return back()->with('message','User Created Successfully');
    }

    public function export_url(Request $request)
    {
        $string = file_get_contents($request->url);


        $test_patt = "/(?:[a-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
        
        
        $check_if_email = preg_match_all($test_patt, $string, $matches);

        $allemails = '';

        if($check_if_email != 0)
        {
            $allemails = implode(',',$matches[0]);

            return response()->json(['result'=>"1",'emails' => $allemails]);

        }
        else
        {
            return response()->json(['result'=>"1",'emails' => "No emails found"]);
        }
    }

    public function  insert_export_email(Request $request)
    {        

        $implode = explode(',',$request->user_email[0]);
        $request['user_email'] = $implode;

        $request->validate([
            'user_email.*' => 'required|unique:email_users,user_email',
        ]);


        // ,
        // [
        //     'user_email.*.unique' =>'Each person must have a unique email address. '.$importData,
        // ]

        
        foreach($implode as $key =>$importData)
        {
            $insertData = array(
            "user_email" => $importData
            );  
            EmailUser::create($insertData);
        }
        return back()->with('message','User created Successfully');
    }

    public function active(Request $request)
    {
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $lists = explode('|',Auth::guard('admin')->user()->access_list);
        $list_array = in_array('set_4',$lists);
        $array = in_array('app',$explode);
        $array_1= in_array('edit',$explode_1);
        if(($role == "SuperAdmin") || ($array == true && $array_1 == true && $list_array == true))
        {
            $parent_id = $request->app_id;
            $status = $request->status;
            if($status == 0)
            {
                $app_active = EmailUser::find($parent_id);
                $app_active->is_active ='1';
                $app_active->save();
                return back()->with('message','User Disabled Successfully');
            }
            if($status == 1)
            {
                $app_active = EmailUser::find($parent_id);
                $app_active->is_active ='0';
                $app_active->save();
                return back()->with('message','User Enabled Successfully');
            }
        }
        else
        {
            return redirect()->route('admin/dashboard')->with("error","Permission Denied");
        }
        
    }

    public function delete(Request $request, $id)
    {
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $lists = explode('|',Auth::guard('admin')->user()->access_list);
        $list_array = in_array('set_4',$lists);
        $array = in_array('app',$explode);
        $array_1= in_array('delete',$explode_1);
        if(($role == "SuperAdmin") || ($array == true && $array_1 == true && $list_array == true))
        {
            $Q1 = EmailUser::find($id);
            $Q1->deleted_at = '1';
            $Q1->save();
            return back()->with('message','Delete Record Successfully');
        }
        else
        {
            return redirect()->route('admin/dashboard')->with("error","Permission Denied");
        }
    }

    public function EditQuestion($id)
    {
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $lists = explode('|',Auth::guard('admin')->user()->access_list);
        $list_array = in_array('set_4',$lists);
        $array = in_array('app',$explode);
        $array_1= in_array('edit',$explode_1);
        if(($role == "SuperAdmin") || ($array == true && $array_1 == true && $list_array == true))
        {
            $edit = EmailUser::find($id);
            $array = array($edit);
            $category = EmailCategory::where('deleted_at','0')->get();
            return view('admin.users.applist.edit_app_list', ['edit_app_id'=> $array],['category_id'=>$category]);
        }
        else
        {
            return redirect()->route('admin/dashboard')->with("error","Permission Denied");
        }
    }
    
    public function EditQuestionList(Request $request, $id)
    {        
        $request->validate([
            'name' => 'required|string|max:255',
            'email'  => 'required|min:3|max:40|unique:email_users,user_email,'.$id,
        ]);

        $user = EmailUser::find($id);
        $user->user_name = $request->name;
        $user->user_email = $request->email;        
        $user->phone_number = $request->phone_number;
        $user->same_as_ph = $request->same_as;
        $user->whatsapp_number= $request->whatssapp_number;
        
        $user->gender = $request['radio-optional'];

        if($request->image == 0)
        {
            $years = Carbon::parse($request->dob)->age;
            $user->filter_age = $years;
            $user->age_type = $request->image;
            $user->date_of_birth = $request->dob;
        }
        if($request->image == 1)
        {
            $user->age_type = $request->image;
            $user->age = $request->age;
            $user->filter_age =  $request->age;
        } 
        $user->country= $request->country;
        $user->city= $request->district;
        $user->pincode = $request->Pincode;
        $user->state = $request->State;
        $user->block = 1;
        $user->category_id = $request->category_id;
        $user->sub_category_id	 = $request->subcategory;
        $user->admin_id = Auth::guard('admin')->user()->id; 
        LogActivity::addToLog();
        $user->save();
        return back()->with('message','User Edited Successfully');
    }
}
