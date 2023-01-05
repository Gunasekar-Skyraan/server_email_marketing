<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Models\Email\EmailSubCategory;
use App\Models\Email\EmailCategory;
use Illuminate\Http\Request;
use App\Models\Module;
Use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Helpers\LogActivity;
use Auth;
class EmailSubCategoryController extends Controller
{
    function show()
    {
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $lists = explode('|',Auth::guard('admin')->user()->access_list);
        $list_array = in_array('set_2',$lists);
        $array = in_array('sub_category',$explode);
        $array_1= in_array('view',$explode_1);
        if(($role == "SuperAdmin") || ($array == true && $array_1 == true && $list_array == true))
        {
            $sub_category = EmailSubCategory::orderBy('id','asc')->where('deleted_at','0')->get();
            return view('admin.Email_Category.subcategory.sub_category_list', ['sub_categorys' => $sub_category]);
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
        $list_array = in_array('set_2',$lists);
        $array = in_array('sub_category',$explode);
        $array_1= in_array('add',$explode_1);
        if(($role == "SuperAdmin") || ($array == true && $array_1 == true && $list_array == true))
        {
            $category = EmailCategory::orderBy('id','asc')->where('deleted_at','0')->get();
            return view('admin.Email_Category.subcategory.add_sub_category', ['category' => $category]);
        }
        else
        {
            return redirect()->route('admin/dashboard')->with("error","Permission Denied");
        }
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'select-alerts2'=>"required",
            'SubCategoryName' => 'required|string|max:255',
        ],
        [
            'select-alerts2.required' => 'You have to choose atleast one Category!'
        ]);   
        $user = new EmailSubCategory;
        $user->category_id = $request['select-alerts2']; 
        $user->sub_category_name = $request['SubCategoryName'];
        LogActivity::addToLog();
        $user->save();
        return back()->with('message','Sub - Category Created Successfully');
    }

    public function subCat(Request $request)
    {
        $parent_id = $request->cat_id;
        $subcategories = EmailSubCategory::where('category_id', $parent_id)->where('deleted_at','0')->get();
        return response()->json(['subcategories' => $subcategories]);
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
        $list_array = in_array('set_2',$lists);
        $array = in_array('sub_category',$explode);
        $array_1= in_array('edit',$explode_1);
        if(($role == "SuperAdmin") || ($array == true && $array_1 == true && $list_array == true))
        {
            $sub_cat_id = $request->sub_cat_id;
            $status = $request->status;
            if($status == 0)
            {
                $app_active = EmailSubCategory::find($sub_cat_id);
                $app_active->is_active ='1';
                $app_active->save();
                return back()->with('message','Sub-Category Disabled Successfully');
            }
            if($status == 1)
            {
                $app_active = EmailSubCategory::find($sub_cat_id);
                $app_active->is_active ='0';
                $app_active->save();
                return back()->with('message','Sub-Category Enabled Successfully');
            }
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
        $list_array = in_array('set_2',$lists);
        $array = in_array('sub_category',$explode);
        $array_1= in_array('delete',$explode_1);
        if(($role == "SuperAdmin") || ($array == true && $array_1 == true && $list_array == true))
        {
            $Q1 = EmailSubCategory::find($id);
            $Q1->deleted_at = '1';
            $Q1->save();
            return back()->with('message','Delete Record Successfully');
        }
        else
        {
            return redirect()->route('admin/dashboard')->with("error","Permission Denied");
        }
    }

    public function EditSubCategory($id)
    {
        LogActivity::addToLog();
        $role = Auth::guard('admin')->user()->role;
        $AccessPrivilege = Auth::guard('admin')->user()->accountAccessPrivilege;
        $AccessModule = Auth::guard('admin')->user()->accountAccessModule;
        $explode = explode('|',$AccessModule);
        $explode_1 = explode('|',$AccessPrivilege);
        $lists = explode('|',Auth::guard('admin')->user()->access_list);
        $list_array = in_array('set_2',$lists);
        $array = in_array('sub_category',$explode);
        $array_1= in_array('edit',$explode_1);
        if(($role == "SuperAdmin") || ($array == true && $array_1 == true && $list_array == true))
        {
            $edit = EmailSubCategory::find($id);
            $category = EmailCategory::where('deleted_at','0')->get();
            $array = array($edit);
            return view('admin.Email_Category.subcategory.edit_sub_Category_list', ['edit_sub_category_id'=> $array],['category_id'=>$category]);
        }
        else
        {
            return redirect()->route('admin/dashboard')->with("error","Permission Denied");
        }
    }

    public function EditSubCatList(Request $request, $id)
    {
        
        $request->validate([
            'select-alerts2'=>"required",
            'SubCategoryName' => 'required|string|max:255'
        ]);   
        $user = EmailSubCategory::find($id);
        $user->category_id = $request['select-alerts2']; 
        $user->sub_category_name = $request['SubCategoryName'];
        LogActivity::addToLog();
        $user->save();
        return back()->with('message','Sub - Category Edit Successfully');
    }
}
