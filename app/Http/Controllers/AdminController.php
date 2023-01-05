<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Validator, Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Models\admin;
use App\Models\Module;

use App\Models\Event;
use App\Models\App\EventAppList;
Use App\Models\Category\EventCategoryList;
use App\Models\MappedApp\EventMappedAppCategory;

use App\Models\Calendar;
use App\Models\App\CalendarAppList;
use App\Models\Category\CalendarCategoryList;
use App\Models\MappedApp\CalendarMappedAppCategory;

Use App\Models\App\ImageAppList;
use App\Models\Image;
Use App\Models\Category\ImageCategoryList;
use App\Models\MappedApp\ImageMappedAppCategory;
use App\Models\SubCategory\ImageSubCategoryList;

use App\Models\App\PrayerAppList;
use App\Models\Category\PrayerCategoryList;
use App\Models\MappedApp\PrayerMappedAppCategory;
use App\Models\Prayer;

Use App\Models\App\QuotesAppList;
Use App\Models\Category\QuotesCategoryList;
use App\Models\MappedApp\QuotesMappedAppCategory;
use App\Models\SubCategory\QuotesSubCategoryList;
use App\Models\Quotes;

use App\Models\App\VideoAppList;
Use App\Models\Category\VideoCategoryList;
use App\Models\MappedApp\VideoMappedAppCategory;
use App\Models\SubCategory\VideoSubCategoryList;
use App\Models\Video;





use App\Helpers\LogActivity;
use DB;

class AdminController extends Controller
{
    public function authenticate(Request $request) 
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $app_active = admin::where('email',$request->email)->get();
        if(count($app_active) && !empty($app_active))
        {
            foreach($app_active as $user)
            {
                if($user->is_active == 0 && $user->deleted_at == 0)
                {
                    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember'))) 
                    {
                        LogActivity::addToLog();
                        return redirect()->route('admin/dashboard');
                    } 
                    else 
                    {
                        session()->flash('error','Either Email/Password is incorrect - Please Try Again');
                        return back()->withInput($request->only('email'));
                    }
                }
                else
                {
                    session()->flash('error'," “ You can't access this site right now!.. “");
                    return back()->withInput($request->only('email'));
                }
            }
        }
        else
        {
            session()->flash('error','Either Email/Password is incorrect - Please Try Again');
            return back()->withInput($request->only('email'));
        }
    }

    public function logout() {
        LogActivity::addToLog();
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        // $EventAppList = EventAppList::orderBy('id','asc')->where('deleted_at','0')->get();
        // $PrayerAppList = PrayerAppList::orderBy('id','asc')->where('deleted_at','0')->get();
        // $ImageAppList = ImageAppList::orderBy('id','asc')->where('deleted_at','0')->get();
        // $CalendarAppList = CalendarAppList::orderBy('id','asc')->where('deleted_at','0')->get();
        // $QuotesAppList = QuotesAppList::orderBy('id','asc')->where('deleted_at','0')->get();
        // $VideoAppList = VideoAppList::orderBy('id','asc')->where('deleted_at','0')->get();

        // $EventCategoryList = EventCategoryList::orderBy('id','asc')->where('deleted_at','0')->get();
        // $PrayerCategoryList = PrayerCategoryList::orderBy('id','asc')->where('deleted_at','0')->get();
        // $ImageCategoryList = ImageCategoryList::orderBy('id','asc')->where('deleted_at','0')->get();
        // $VideoCategoryList = VideoCategoryList::orderBy('id','asc')->where('deleted_at','0')->get();
        // $CalendarCategoryList = CalendarCategoryList::orderBy('id','asc')->where('deleted_at','0')->get();
        // $QuotesCategoryList = QuotesCategoryList::orderBy('id','asc')->where('deleted_at','0')->get();

        // $VideoSubCategoryList = VideoSubCategoryList::orderBy('id','asc')->where('deleted_at','0')->get();
        // $ImageSubCategoryList = ImageSubCategoryList::orderBy('id','asc')->where('deleted_at','0')->get();
        // $QuotesSubCategoryList = QuotesSubCategoryList::orderBy('id','asc')->where('deleted_at','0')->get();

        // $Event = Event::orderBy('id','asc')->where('deleted_at','0')->get();
        // $Prayer = Prayer::orderBy('id','asc')->where('deleted_at','0')->get();
        // $Image = Image::orderBy('id','asc')->where('deleted_at','0')->get();
        // $Calendar = Calendar::orderBy('id','asc')->where('deleted_at','0')->get();
        // $Quotes = Quotes::orderBy('id','asc')->where('deleted_at','0')->get();
        // $Video = Video::orderBy('id','asc')->where('deleted_at','0')->get();

        return view('admin.dashboard');
    }
    public function profileUpdate(Request $request)
    {
        LogActivity::addToLog();
        $request->validate([
            'name' =>'required|string|max:25',
            'email'=>'required|email|string|max:255',
        ]);
        $user = Auth::guard('admin')->user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->image = $request['file'];
        if($request->password != null)
        {
            $request->validate([ "password" => 'required|confirmed|min:8'
            ],[
                'password.same'=>'password are not the same password must match same value',
                'password.min'=>'confirm-password length must be greater than 8 characters',
            ]);
            $user->password = Hash::make($request['password']);
        }
        if($request->hasFile('file'))
        { 
            $Video = $request['file'];
            $Video_name = $Video->getClientOriginalName();
            $extension = pathinfo($Video_name, PATHINFO_EXTENSION);
            $encrpt = round(microtime(true)*1000);
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $charactersLength; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $new_name = ($encrpt).'_'.$randomString.'.'.$extension;
            $Video->move(public_path('storage/users'),$new_name);
            $new_name_2= 'storage/users/'.$new_name;
        }
        $uploaded_file = $new_name_2 ?? ''; 
        $user->image = $uploaded_file;
        $user->save();
        return back()->with('message','Profile Updated Successfully');
    }

    public function superadmin() 
    {
        $user_id =Auth::guard('admin')->user()->id;
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
        $array = in_array('admin', $permis);
        $array_1= in_array('view',$explode_1);
        if(($role == "SuperAdmin") || ($array == true &&  $array_1 == true))
        {
            $superadmin = admin::orderBy('role','asc')->whereIn('role',['SubAdmin','Administrator'])->where('id','!=',$user_id)->where('deleted_at','0')->get();
            return view('admin.accounts.admin_accounts', ['superadmin' => $superadmin]);
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
        $module = Module::Select(['module_name'])->whereIn('module_name',$explode)->get();
        $permission=[];
        foreach($module as $row)
        {
            $permission[] = $row->module_name;
        }
        $permis = $permission;
        $array = in_array('admin', $permis);
        $array_1= in_array('add',$explode_1);
        if(($role == "SuperAdmin") || ($array == true &&  $array_1 == true))
        {
            $module = Module::all();
            return view('admin.accounts.add_admmin',['module'=>$module]);
        }
        else
        {
            return redirect()->route('admin/dashboard')->with("error","Permission Denied");
        }
    }

    function insert(Request $request)
    {
        
        $request->validate([
            'name' =>'required|min:8|string|max:25',
            'email'=>'required|email|string|max:255',
            "password" => 'required|confirmed|min:8'
        ],
        [
            'password.same'=>'password are not the same password must match same value',
            'password.min'=>'confirm-password length must be greater than 8 characters',
        ]);
        $user = new admin;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->image = $request['file'];
        $user->password = Hash::make($request['password']);
        $name = implode("|", $request->list);
        $user->access_list = $name ?? '';
        $arrays = implode("|", $request->model);
        $user->accountAccessModule = $arrays ?? '';
        $accountAccessPrivilege = implode("|", $request->privileges);
        $user->accountAccessPrivilege = $accountAccessPrivilege ?? '';

        $user->role = $request->parent;
        $user->image_type = 1;
        if($request->hasFile('file'))
        { 
            $Video = $request['file'];
            $Video_name = $Video->getClientOriginalName();
            $extension = pathinfo($Video_name, PATHINFO_EXTENSION);
            $encrpt = round(microtime(true)*1000);
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $charactersLength; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $new_name = ($encrpt).'_'.$randomString.'.'.$extension;
            $Video->move(public_path('storage/users'),$new_name);
            $new_name_2= 'storage/users/'.$new_name;
        }
        $uploaded_file = $new_name_2 ?? ''; 
        $user->image = $uploaded_file;
        LogActivity::addToLog();
        $user->save();
        return back()->with('message','Admin Create Successfully');
    }

    public function edit($id)
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
        $array = in_array('admin', $permis);
        $array_1= in_array('edit',$explode_1);
        if(($role == "SuperAdmin") || ($array == true &&  $array_1 == true))
        {
            $edit = admin::find($id);
            $array = array($edit);
            $module = Module::all();
            return view('admin.accounts.edit_admin', ['edit'=> $array,'module'=>$module]);
        }
        else
        {
            return redirect()->route('superadmin.list')->with("error","Permission Denied");
        }
    }

    public function editlist(Request $request,$id)
    {
        
        $request->validate([
            'name' =>'required|min:8|string|max:25',
            'email'=>'required|email|string|max:255',
        ]);
        $user = admin::find($id);
        $user->role = $request->parent;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->image = $request['file'];
        if($request->password != null)
        {
            $request->validate([ "password" => 'required|confirmed|min:8'
            ],[
                'password.same'=>'password are not the same password must match same value',
                'password.min'=>'confirm-password length must be greater than 8 characters',
            ]);
            $user->password = Hash::make($request['password']);
        }
        $name = implode("|", $request->list);
        $user->access_list = $name ?? '';

        $arrays = implode("|", $request->model);
        $user->accountAccessModule = $arrays ?? '';
        $accountAccessPrivilege = implode("|", $request->privileges);
        $user->accountAccessPrivilege = $accountAccessPrivilege ?? '';
        $user->role = $request->parent;
        if($request->file_type == 1)
        {
            $user->image_type = $request->file_type;
            $user->image = $request['file'];
            if($request->hasFile('file'))
            { 
                $Video = $request['file'];
                $Video_name = $Video->getClientOriginalName();
                $extension = pathinfo($Video_name, PATHINFO_EXTENSION);
                $encrpt = round(microtime(true)*1000);
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $charactersLength; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                $new_name = ($encrpt).'_'.$randomString.'.'.$extension;
                $Video->move(public_path('storage/users'),$new_name);
                $new_name_2= 'storage/users/'.$new_name;
            }
            $uploaded_file = $new_name_2 ?? ''; 
            $user->image = $uploaded_file;
        }
        else if($request->file_type == 2)
        {
            $user->image = $request->url_image;
            $user->image_type = $request->file_type;
        }
        LogActivity::addToLog();
        $user->save();
        return back()->with('message','Admin Edit Successfully');
    }

    public function active(Request $request)
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
            $parent_id = $request->user_id;
            $status = $request->status;
            LogActivity::addToLog();
            if($status == 0)
            {
                $app_active = admin::find($parent_id);
                $app_active->is_active ='1';
                $app_active->save();
                return back()->with('message','User Disabled Successfully');
            }
            if($status == 1)
            {
                $app_active = admin::find($parent_id);
                $app_active->is_active ='0';
                $app_active->save();
                return back()->with('message','User Enabled Successfully');
            }
        }
        else
        {
            return redirect()->route('superadmin.list')->with("error","Permission Denied");
        }
    }

    public function delete(Request $request, $id)
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
        $array = in_array('admin', $permis);
        $array_1= in_array('delete',$explode_1);
        if(($role == "SuperAdmin") || ($role == "Administrator") || ($array == true &&  $array_1 == true))
        {
            $Q1 = admin::find($id);
            $Q1->deleted_at = '1';
            LogActivity::addToLog();
            $Q1->save();
            return back()->with('message','Delete Record Successfully');
        }
        else
        {
            return redirect()->route('superadmin.list')->with("error","Permission Denied");
        }
    }

    public function activitydelete(Request $request)
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
        $array = in_array('Activity', $permis);
        $array_1= in_array('delete',$explode_1);
        if(($role == "SuperAdmin") || ($role == "Administrator") || ($array == true &&  $array_1 == true))
        {
            $log = LogActivity::logActivityLists()->find($request->checkbox)
            ->each(function ($activity, $key) 
            {
                $activity->delete();
            });
            LogActivity::addToLog();
            return back()->with('message','Delete Record Successfully');
        }
        else
        {
            return redirect()->route('superadmin.list')->with("error","Permission Denied");
        }
    }
    
    // public function manage($id)
    // {

    //     $date = now();
    //     $startOfWeek = $date->startOfWeek()->toDateString();
    //     $endOfWeek = $date->endOfWeek()->toDateString();
    //     // dd($startOfWeek,$endOfWeek);
    //     $dates_1 = Question::where('admin_id', $id)->whereBetween('created_at',[$startOfWeek,$endOfWeek])->get();
    //     dd($dates_1);
    //     $data = [];
        








    //     $question_check = Question::where('admin_id',$id)->get();

    //     foreach($question_check as $row)
    //     {
    //         $time = $row->created_at;
    //     }
        
    //     $datetime = \Carbon\Carbon::parse($time)->format('d/m/Y');
        
    //     $yesterday = date("Y-m-j", strtotime( '-1 days' ) );

    //     $f = Question::where('admin_id', $id)->where('created_at','>=', $yesterday)->get();

    //     // dd($f);
        
    //     $week = date("Y-m-j", strtotime( '-1 week'));
        
    //     $f = Question::where('admin_id', $id)
    //         ->where('created_at', '>=', $week)
    //         ->get();
    //     // dd($f);

    //     foreach (range(0, 99) as $i) {
    //         $date = today($i);
    //         $dates[$date->format('d-m-y')] = Question::where('admin_id',$id)
    //             ->where('created_at', '<', $date->startOfDay()->toDateString())
    //             ->count();
    //     }

    //     $data = array_diff($dates);
    //     // dd($data);

    //     return view('admin.accounts.manage',['list'=> $question_check,'date'=>$datetime,'f'=> $f,'datetime'=>$data,]);
    // }
}
