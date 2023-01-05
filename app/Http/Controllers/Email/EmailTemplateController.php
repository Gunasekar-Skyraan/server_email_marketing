<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Models\Template\Template;
use Illuminate\Http\Request;

use App\Models\Template\TemplateCategory;
use App\Models\Module;
Use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Helpers\LogActivity;
use Auth;

class EmailTemplateController extends Controller
{
    function show()
    {
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $module = Module::Select(['module_name'])->whereIn('module_name',$explode)->get();
        $permission=[];
        foreach($module as $row)
        {
            $permission[] = $row->module_name;
        }
        $permis = $permission;
        $array = array_intersect($explode, $permis);
        $array_1= in_array('view',$explode_1);
        if(($role == "SuperAdmin") || ($array == true &&  $array_1 == true))
        {
            $category = Template::orderBy('id','asc')->where('deleted_at','0')->get();
            return view('admin.template.template.template_list', ['categorys' => $category]);
        }
        else
        {
            return redirect()->route('template.list')->with("error","Access Denied");
        }
    }

    function Add_list()
    {
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $module = Module::Select(['module_name'])->whereIn('module_name',$explode)->get();
        $permission=[];
        foreach($module as $row)
        {
            $permission[] = $row->module_name;
        }
        $permis = $permission;
        $array = array_intersect($explode, $permis);
        $array_1= in_array('add',$explode_1);
        if(($role == "SuperAdmin") || ($array  && $array_1== true))
        {
            $categorys = TemplateCategory::where('deleted_at','0')->get();
            return view('admin.template.template.add_template',compact('categorys'));
        }
        else
        {
            return redirect()->route('template.list')->with("error","Access Denied");
        }
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|string|max:255',
            'category_name'=>'required|unique:templates,template_name',
        ],
        [
            'category_name.unique'=>'The Template Name has already been taken.',
            'category_id.required'=> 'Please Fill the Category Name',
        ]);

        $user = new Template;
        $user->category_id = $request['category_id'];
        $user->template_name = $request['category_name'];
        $user->template_subject = $request['subject'];
        
        if($request['flexRadioDefault'] == 1)
        {
            $user->body_type = $request['flexRadioDefault'];
            $user->template_body = $request->ques_desc_1;
        }
        else
        {
            $user->body_type = $request['flexRadioDefault'];
            $user->template_body = $request->ques_desc_2;
        }
        $user->save();
        LogActivity::addToLog();
        return back()->with('message','template Created Successfully');
    }
    public function active(Request $request)
    {
        LogActivity::addToLog();
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $module = Module::Select(['module_name'])->whereIn('module_name',$explode)->get();
        $permission=[];
        foreach($module as $row)
        {
            $permission[] = $row->module_name;
        }
        $permis = $permission;
        $array = array_intersect($explode, $permis);
        $array_1= in_array('edit',$explode_1);
        if(($role == "SuperAdmin") || ($array  && $array_1== true))
        {
            $cat_id = $request->cat_id;
            $status = $request->status;
            if($status == 0)
            {
                $app_active = Template::find($cat_id);
                $app_active->is_active ='1';
                $app_active->save();
                return back()->with('message','template Disabled Successfully');
            }
            if($status == 1)
            {
                $app_active = Template::find($cat_id);
                $app_active->is_active ='0';
                $app_active->save();
                return back()->with('message','template Enabled Successfully');
            }
        }
        else
        {
            return redirect()->route('template.list')->with("error","Access Denied");
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
        $module = Module::Select(['module_name'])->whereIn('module_name',$explode)->get();
        $permission=[];
        foreach($module as $row)
        {
            $permission[] = $row->module_name;
        }
        $permis = $permission;
        $array = array_intersect($explode, $permis);
        $array_1= in_array('delete',$explode_1);
        if(($role == "SuperAdmin") || ($array  && $array_1== true))
        {
            $Q1 = Template::find($id);
            $Q1->deleted_at = '1';
            $Q1->save();
            return back()->with('message','Delete Record Successfully');
        }
        else
        {
            return redirect()->route('template.list')->with("error","Access Denied");
        }
    }

    public function EditCategory($id)
    {
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $module = Module::Select(['module_name'])->whereIn('module_name',$explode)->get();
        $permission=[];
        foreach($module as $row)
        {
            $permission[] = $row->module_name;
        }
        $permis = $permission;
        $array = array_intersect($explode, $permis);
        $array_1= in_array('edit',$explode_1);
        if(($role == "SuperAdmin") || ($array  && $array_1== true))
        {
            $edit = Template::find($id);
            $array = array($edit);
            $category = TemplateCategory::where('deleted_at','0')->get();
            return view('admin.template.template.edit_template_list', ['edit_category_id'=> $array,'category_list'=>$category]);
        }
        else
        {
            return redirect()->route('template.list')->with("error","Access Denied");
        }
       
    }

    public function EditCatList(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|string|max:255',
            'category_name'=>'required|unique:templates,template_name,'.$id,
        ],
        [
            'category_name.unique'=>'The Template Name has already been taken.',
            'category_id.required'=> 'Please Fill the Category Name',
        ]);

        $user = Template::find($id);
        $user->category_id = $request['category_id'];
        $user->template_name = $request['category_name'];
        $user->template_subject = $request['subject'];
        
        if($request['flexRadioDefault'] == 1)
        {
            $user->body_type = $request['flexRadioDefault'];
            $user->template_body = $request->ques_desc_1;
        }
        else
        {
            $user->body_type = $request['flexRadioDefault'];
            $user->template_body = $request->ques_desc_2;
        }
        $user->save();
        LogActivity::addToLog();
        return back()->with('message','template Created Successfully');
    }

    public function upload(Request $request)
    {
        
        if($request->hasFile('upload')) 
        {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.time().'.'.$extension;
            $filename_change = $request->file('upload')->move('public/bulk_image/',$filenametostore);
            $new_name = $filenametostore;
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('bulk_image/'.$new_name); 
            $msg = 'Image successfully uploaded'; 
            LogActivity::addToLog();
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }
    }
}
