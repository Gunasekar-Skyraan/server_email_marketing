<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Source\SourceEmail;
use App\Models\Module;
Use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Helpers\LogActivity;
use Auth;


class SourceEmailController extends Controller
{
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
            $category = SourceEmail::orderBy('id','asc')->where('deleted_at','0')->get();
            return view('admin.marketing.emails.category_list', ['emailss' => $category]);
        }
        else
        {
            return redirect()->route('admin/dashboard')->with("error","Permission Denied");
        }
    }

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
            return view('admin.marketing.emails.add_category');
        }
        else
        {
            return redirect()->route('admin.emailslist')->with("error","Permission Denied");
        }
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'Email_name' => 'required|unique:source_emails,email_id',
            'mail_host'=>'required',
            'user_name'=>'required',
            'password'=>'required',
        ]);

        $user = new SourceEmail;
        $user->email_id = $request['Email_name'];
        $user->website_name = $request['website_name'];
        $user->person_name = $request['person_name'];
        $user->mail_host = $request['mail_host'];
        $user->user_name = $request['user_name'];
        $user->password = $request['password'];

        $user->save();
        LogActivity::addToLog();
        return back()->with('message','Email Created Successfully');
    }
    public function active(Request $request)
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
            $cat_id = $request->cat_id;
            $status = $request->status;
            if($status == 0)
            {
                $app_active = SourceEmail::find($cat_id);
                $app_active->is_active ='1';
                $app_active->save();
                return back()->with('message','Email Disabled Successfully');
            }
            if($status == 1)
            {
                $app_active = SourceEmail::find($cat_id);
                $app_active->is_active ='0';
                $app_active->save();
                return back()->with('message','Email Enabled Successfully');
            }
        }
        else
        {
            return redirect()->route('admin.emailslist')->with("error","Permission Denied");
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
            $Q1 = SourceEmail::find($id);
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
            $edit = SourceEmail::find($id);
            $array = array($edit);
            return view('admin.marketing.emails.edit_Category_list', ['edit_category_id'=> $array]);
        }
        else
        {
            return redirect()->route('admin.emailslist')->with("error","Permission Denied");
        }
       
    }

    public function EditCatList(Request $request, $id)
    {
        $request->validate([
            'Email_name' => 'required|unique:source_emails,email_id,'.$id,
            'mail_host'=>'required',
            'user_name'=>'required',
            'password'=>'required',
        ]);

        $user = SourceEmail::find($id);
        $user->email_id = $request['Email_name'];
        $user->website_name = $request['website_name'];
        $user->person_name = $request['person_name'];

        $user->mail_host = $request['mail_host'];
        $user->user_name = $request['user_name'];
        $user->password = $request['password'];

        $user->save();
        LogActivity::addToLog();
        return back()->with('message','Email Edited Successfully');
    }
}
