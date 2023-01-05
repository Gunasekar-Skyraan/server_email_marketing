<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;


use App\Models\Quiz\QuizSet1;
use App\Models\App\QuizAppSet1;
Use App\Models\Category\QuizCategorySet1;
use App\Models\MappedApp\QuizSet1MappedAppCategory;


Use App\Models\App\QuizAppSet2;
Use App\Models\Category\QuizCategorySet2;
use App\Models\SubCategory\QuizSubCategorySet2;
use App\Models\MappedApp\QuizSet2MappedAppCategory;
use App\Models\Quiz\QuizSet2;

Use App\Models\App\QuizAppSet3;
Use App\Models\Category\QuizCategorySet3;
use App\Models\SubCategory\QuizSubCategorySet3;
use App\Models\MappedApp\QuizSet3MappedAppCategory;
use App\Models\MappedApp\QuizSet3CategoryMappedApp;
use App\Models\Quiz\QuizSet3;


use App\Models\Quiz\QuizSet4;
use App\Models\App\QuizAppSet4;


use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function App()
    {
        $resArr=[];
        $responseArr = array('result' => '0' ,'message'=>'failed','data'=> []);
        
        $app = QuizAppSet1::Select('id','app_name','app_description','app_image','image_type')->where('deleted_at','0')->get();
        
        if(!empty($app) && count($app) )
        {
            foreach($app as $row)
            {   
                $temp['app_id'] = (string) $row->id ?? '';
                $temp['app_name'] = $row->app_name ?? '';
                if($row->image_type == 1)
                {   
                    $temp['app_image'] = asset($row->app_image) ?? 'https://picsum.photos/200'; 
                }
                else
                { 
                    $temp['app_image'] = $row->app_image ?? 'https://picsum.photos/200'; 
                }
                $temp['app_description'] = $row->app_description ?? '' ;
                array_push($resArr, $temp);
            }
            
            if(!empty($resArr)){
                $responseArr = array('result'=>'1', 'data'=> $resArr, 'message'=>'Success');
            }else{
                $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
            }
        }
        else
        {
            $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
        }   
        return response()->json($responseArr);
    }

    public function Category(Request $request)
    {
        $page = $request->page;
        $app_id = $request->app_id;
        $app = QuizSet1MappedAppCategory::select(['app_id','category_id'])->where('app_id', $app_id)->get();
        $mapped_app=[];
        foreach($app as $row)
        {
            $mapped_app[] = $row->category_id;
        }
        $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
        if(!empty($app) && count($app))
        {
            $category = QuizCategorySet1::Select(['id as category_id','category_name','category_description','category_image','image_type',])->whereIn('id', $mapped_app)->paginate(15);
            foreach($category as $row)
            {   
                $row['category_id'] = (string) $row->category_id ?? '';
                $row['category_name'] = $row->category_name ?? '';
                if($row->image_type == 1)
                {   
                    $row['category_image'] = asset($row->category_image) ?? 'https://picsum.photos/200'; 
                }
                else
                { 
                    $row['category_image'] = $row->category_image ?? 'https://picsum.photos/200'; 
                }
                $row['category_description'] = $row->category_description ?? '' ;
                unset($row->image_type);
            }
            if(!empty($category))
            {
                $responseArr = array('result'=>'1', 'data'=> $category->items(),'total'=>(string) $category->total(),'currentPage'=>(string) $category->currentPage(),'perPage'=> (string) $category->perPage(),'lastPage'=> (string) $category->lastPage(), 'message'=>'Success');
            }
            else
            {
                $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
            }
        }
        
        return response()->json($responseArr);
    }

    public function QuizCategoryList(Request $request)
    {
        $page = $request->page;
        $category = $request->quiz_category_id;
        $app_id = $request->app_id;
        $resArr = [];

        if(!empty($category) && !empty($app_id))
        {
            $category_id = QuizSet1MappedAppCategory::select('category_id')->where('app_id',$app_id)->where('category_id',$category)->pluck('category_id')->all();
            $responseArr = array('result' => '0' ,'message'=>'failed','data'=> []);
            $users = QuizSet1::select([
            'id As quiz_id',
            'question_name',
            'question_content',
            'question_format_type',
            'option_1',
            'option_2',
            'option_3',
            'option_4',
            'option_5',
            'option_6',
            'quiz_answer',
            'quiz_hint',
            'quiz_exp',
            'quiz_image',
            'image_type',
            'option_count',
            'category_id'])
            ->whereIn('category_id',$category_id)
            ->where('deleted_at','0')->paginate(15);
                // dd($users);
            if(!empty($users) && count($users) )
            {
                foreach($users as $row)
                {   
                    $row['quiz_id'] = (string) $row->quiz_id ?? '';
                    if($row->question_format_type == 1)
                    {
                        $row['question_name'] = $row->question_name ?? '';
                    }
                    if($row->question_format_type == 2)
                    {
                        $row['question_name'] = $row->question_name ?? '';
                    }
                    if($row->question_format_type == 3)
                    {
                        $row['question_name'] = asset($row->question_name) ?? '';
                    }
                    if($row->question_format_type == 4)
                    {
                        $row['question_name'] = asset($row->question_name) ?? '';
                    }
                    
                    $row['question_content'] = $row->question_content ?? '';
                    $row['option_1'] = $row->option_1 ?? '';
                    $row['option_2'] = $row->option_2 ?? '';
                    $row['option_3'] = $row->option_3 ?? '';
                    $row['option_4'] = $row->option_4 ?? '';
                    $row['option_5'] = $row->option_5 ?? '';
                    $row['option_6'] = $row->option_6 ?? '';
                    $row['quiz_answer'] = $row->quiz_answer ?? '';
                    $row['quiz_hint'] = $row->quiz_hint ?? '';
                    $row['quiz_explanation'] = $row->quiz_exp ?? '';
                    if($row['image_type'] == 1)
                    {   
                        $row['quiz_image'] = asset($row->quiz_image) ?? 'https://picsum.photos/200'; 
                    }
                    else
                    {
                        $row['quiz_image'] = $row->quiz_image ?? 'https://picsum.photos/200'; 
                    }
                    $row['category_id'] = $row->category_id;
                    
                    unset($row['image_type'],$row->question_format_type,$row->quiz_exp);
                }
                
                if(!empty($users))
                {
                    $responseArr = array('result'=>'1', 'data'=> $users->items(),'total'=>(string) $users->total(),'currentPage'=>(string) $users->currentPage(),'perPage'=> (string) $users->perPage(),'lastPage'=> (string) $users->lastPage(), 'message'=>'Success');
                }
                else
                {
                    $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
                }
            }
            else
            {
                $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
            }
            return response()->json($responseArr);     
        }
        else
        {
            $category_id = QuizSet1MappedAppCategory::select('category_id')->where('app_id',$app_id)->pluck('category_id')->all();
            $responseArr = array('result' => '0' ,'message'=>'failed','data'=> []);
            $users = QuizSet1::select([
            'id As quiz_id',
            'question_name As quiz_name',
            'question_content As quiz_content',
            'question_format_type As quiz_format_type',
            'option_1',
            'option_2',
            'option_3',
            'option_4',
            'option_5',
            'option_6',
            'quiz_answer',
            'quiz_answer_value',
            'quiz_hint',
            'quiz_exp',
            'quiz_image',
            'image_type',
            'option_count',
            'category_id'])
            ->whereIn('category_id',$category_id)
            ->where('deleted_at','0')->paginate(15);
            if(!empty($users) && count($users) )
            {
                foreach($users as $row)
                {   
                    $row['quiz_id'] = (string) $row->quiz_id ?? '';
                    if($row->quiz_format_type == 1)
                    {
                        $row['question_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 2)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 3)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    if($row->quiz_format_type == 4)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    
                    $row['option_1'] = $row->option_1 ?? '';
                    $row['option_2'] = $row->option_2 ?? '';
                    $row['option_3'] = $row->option_3 ?? '';
                    $row['option_4'] = $row->option_4 ?? '';
                    $row['option_5'] = $row->option_5 ?? '';
                    $row['option_6'] = $row->option_6 ?? '';
                    $row['quiz_answer'] = $row->quiz_answer ?? '';
                    $row['quiz_answer_value']= $row->quiz_answer_value ?? "";
                    $row['quiz_hint'] = $row->quiz_hint ?? '';
                    $row['quiz_explanation'] = $row->quiz_exp ?? '';

                    if($row['image_type'] == 1)
                    {   
                        $row['quiz_image'] = asset($row->quiz_image) ?? 'https://picsum.photos/200'; 
                    }
                    else
                    {
                        $row['quiz_image'] = $row->quiz_image ?? 'https://picsum.photos/200'; 
                    }
                    $row['category_id'] = $row->category_id;
                    
                    unset($row['image_type'],$row->quiz_exp);
                }
                
                if(!empty($users))
                {
                    $responseArr = array('result'=>'1', 'data'=> $users->items(),'total'=>(string) $users->total(),'currentPage'=>(string) $users->currentPage(),'perPage'=> (string) $users->perPage(),'lastPage'=> (string) $users->lastPage(), 'message'=>'Success');
                }
                else
                {
                    $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
                }
            }
            else
            {
                $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
            }  
            
            return response()->json($responseArr);
        }
    }

    


    public function quizset2App()
    {
        $resArr=[];
        $responseArr = array('result' => '0' ,'message'=>'failed','data'=> []);
        
        $app = QuizAppSet2::Select('id','app_name','app_description','app_image','image_type')->where('deleted_at','0')->get();
        
        if(!empty($app) && count($app) )
        {
            foreach($app as $row)
            {   
                $temp['app_id'] = (string) $row->id ?? '';
                $temp['app_name'] = $row->app_name ?? '';
                if($row->image_type == 1)
                {   
                    $temp['app_image'] = asset($row->app_image) ?? 'https://picsum.photos/200'; 
                }
                else
                { 
                    $temp['app_image'] = $row->app_image ?? 'https://picsum.photos/200'; 
                }
                $temp['app_description'] = $row->app_description ?? '' ;
                array_push($resArr, $temp);
            }
            
            if(!empty($resArr)){
                $responseArr = array('result'=>'1', 'data'=> $resArr, 'message'=>'Success');
            }else{
                $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
            }
        }
        else
        {
            $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
        }   
        return response()->json($responseArr);
    }

    public function quizset2Category(Request $request)
    {
        $page = $request->page;
        $app_id = $request->app_id;

        $app = QuizSet2MappedAppCategory::select(['app_id','category_id'])->where('app_id', $app_id)->get();
        $mapped_app=[];
        foreach($app as $row)
        {
            $mapped_app[] = $row->category_id;
        }
        $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
        if(!empty($app) && count($app))
        {
            $category = QuizCategorySet2::Select(['id as category_id','category_name','category_description','category_image'])->whereIn('id', $mapped_app)->paginate(15);
            foreach($category as $row)
            {   
                $row['category_id'] = (string) $row->category_id ?? '';
                $row['category_name'] = $row->category_name ?? '';
                $row['category_image'] = asset($row->category_image) ?? 'https://picsum.photos/200'; 
                $row['category_description'] = $row->category_description ?? '' ;
            }
            if(!empty($category))
            {
                $responseArr = array('result'=>'1', 'data'=> $category->items(),'total'=>(string) $category->total(),'currentPage'=>(string) $category->currentPage(),'perPage'=> (string) $category->perPage(),'lastPage'=> (string) $category->lastPage(), 'message'=>'Success');
            }
            else
            {
                $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
            }
        }
        
        return response()->json($responseArr);
    }


    public function quizset2SubCategory(Request $request)
    {
        $category = $request->category_id;
        $resArr=[];
        $responseArr = array('result' => '0' ,'message'=>'failed','data'=> []);
        
        $sub_category = QuizSubCategorySet2::select(['id','sub_category_name','sub_category_description','sub_category_image'])->where('category_id',$category)->paginate(15);
        
        if(!empty($sub_category) && count($sub_category) )
        {
            foreach($sub_category as $row)
            {   
                $temp['sub_category_id'] = (string) $row->id ?? '';
                $temp['sub_category_name'] = $row->sub_category_name ?? '';
                $temp['sub_category_image'] = asset($row->sub_category_image) ?? 'https://picsum.photos/200'; 
                $temp['sub_category_description'] = $row->sub_category_description ?? '' ;
                array_push($resArr, $temp);
            }
            
            if(!empty($resArr)){
                $responseArr = array('result'=>'1', 'data'=> $resArr,'total'=>(string) $sub_category->total(),'currentPage'=>(string) $sub_category->currentPage(),'perPage'=> (string) $sub_category->perPage(),'lastPage'=> (string) $sub_category->lastPage(), 'message'=>'Success');
            }else{
                $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
            }
        }
        else
        {
            $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
        }  
        
        return response()->json($responseArr);
    }

    public function quizset2CategoryList(Request $request)
    {
        $category = $request->category_id;
        $resArr=[];
        $users = QuizSet2::select([
            'id As quiz_id',
            'question_name As quiz_name',
            'question_content As quiz_content',
            'question_format_type As quiz_format_type',
            'option_1',
            'option_2',
            'option_3',
            'option_4',
            'option_5',
            'option_6',
            'quiz_answer',
            'quiz_answer_value',
            'quiz_hint',
            'quiz_exp',
            'quiz_image',
            'image_type',
            'option_count',
            'category_id'])
            ->where('category_id',$category)
            ->where('deleted_at','0')->paginate(15);
            if(!empty($users) && count($users) )
            {
                foreach($users as $row)
                {   
                    $row['quiz_id'] = (string) $row->quiz_id ?? '';
                    if($row->quiz_format_type == 1)
                    {
                        $row['question_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 2)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 3)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    if($row->quiz_format_type == 4)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    
                    $row['option_1'] = $row->option_1 ?? '';
                    $row['option_2'] = $row->option_2 ?? '';
                    $row['option_3'] = $row->option_3 ?? '';
                    $row['option_4'] = $row->option_4 ?? '';
                    $row['option_5'] = $row->option_5 ?? '';
                    $row['option_6'] = $row->option_6 ?? '';
                    $row['quiz_answer'] = $row->quiz_answer ?? '';
                    $row['quiz_answer_value']= $row->quiz_answer_value ?? "";
                    $row['quiz_hint'] = $row->quiz_hint ?? '';
                    $row['quiz_explanation'] = $row->quiz_exp ?? '';

                    if($row['image_type'] == 1)
                    {   
                        $row['quiz_image'] = asset($row->quiz_image) ?? 'https://picsum.photos/200'; 
                    }
                    else
                    {
                        $row['quiz_image'] = $row->quiz_image ?? 'https://picsum.photos/200'; 
                    }
                    $row['category_id'] = $row->category_id;
                    
                    unset($row['image_type'],$row->quiz_exp);
                }
                
                if(!empty($users))
                {
                    $responseArr = array('result'=>'1', 'data'=> $users->items(),'total'=>(string) $users->total(),'currentPage'=>(string) $users->currentPage(),'perPage'=> (string) $users->perPage(),'lastPage'=> (string) $users->lastPage(), 'message'=>'Success');
                }
                else
                {
                    $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
                }
            }
            else
            {
                $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
            }  
        
        return response()->json($responseArr);
    }

    public function quizset2SubCategoryList(Request $request)
    {
        $sub_category = $request->sub_category_id;
        $users = QuizSet2::select([
            'id As quiz_id',
            'question_name As quiz_name',
            'question_content As quiz_content',
            'question_format_type As quiz_format_type',
            'option_1',
            'option_2',
            'option_3',
            'option_4',
            'option_5',
            'option_6',
            'quiz_answer',
            'quiz_answer_value',
            'quiz_hint',
            'quiz_exp',
            'quiz_image',
            'image_type',
            'option_count',
            'category_id'])
            ->where('sub_category_id',$sub_category)
            ->where('deleted_at','0')->paginate(15);
            if(!empty($users) && count($users) )
            {
                foreach($users as $row)
                {   
                    $row['quiz_id'] = (string) $row->quiz_id ?? '';
                    if($row->quiz_format_type == 1)
                    {
                        $row['question_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 2)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 3)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    if($row->quiz_format_type == 4)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    
                    $row['option_1'] = $row->option_1 ?? '';
                    $row['option_2'] = $row->option_2 ?? '';
                    $row['option_3'] = $row->option_3 ?? '';
                    $row['option_4'] = $row->option_4 ?? '';
                    $row['option_5'] = $row->option_5 ?? '';
                    $row['option_6'] = $row->option_6 ?? '';
                    $row['quiz_answer'] = $row->quiz_answer ?? '';
                    $row['quiz_answer_value']= $row->quiz_answer_value ?? "";
                    $row['quiz_hint'] = $row->quiz_hint ?? '';
                    $row['quiz_explanation'] = $row->quiz_exp ?? '';

                    if($row['image_type'] == 1)
                    {   
                        $row['quiz_image'] = asset($row->quiz_image) ?? 'https://picsum.photos/200'; 
                    }
                    else
                    {
                        $row['quiz_image'] = $row->quiz_image ?? 'https://picsum.photos/200'; 
                    }
                    $row['category_id'] = $row->category_id;
                    
                    unset($row['image_type'],$row->quiz_exp);
                }
                
                if(!empty($users))
                {
                    $responseArr = array('result'=>'1', 'data'=> $users->items(),'total'=>(string) $users->total(),'currentPage'=>(string) $users->currentPage(),'perPage'=> (string) $users->perPage(),'lastPage'=> (string) $users->lastPage(), 'message'=>'Success');
                }
                else
                {
                    $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
                }
            }
            else
            {
                $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
            }
        
        return response()->json($responseArr);
    }

    public function quizset2(Request $request)
    {
        $quiz_id = $request->quiz_id;
        $resArr=[];
        $responseArr = array('result' => '0' ,'message'=>'failed','data'=> []);
        
        $users = QuizSet2::select([
            'id As quiz_id',
            'question_name As quiz_name',
            'question_content As quiz_content',
            'question_format_type As quiz_format_type',
            'option_1',
            'option_2',
            'option_3',
            'option_4',
            'option_5',
            'option_6',
            'quiz_answer',
            'quiz_answer_value',
            'quiz_hint',
            'quiz_exp',
            'quiz_image',
            'image_type',
            'option_count',
            'category_id'])
            ->where('id',$quiz_id)
            ->where('deleted_at','0')->paginate(15);
            if(!empty($users) && count($users) )
            {
                foreach($users as $row)
                {   
                    $row['quiz_id'] = (string) $row->quiz_id ?? '';
                    if($row->quiz_format_type == 1)
                    {
                        $row['question_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 2)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 3)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    if($row->quiz_format_type == 4)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    
                    $row['option_1'] = $row->option_1 ?? '';
                    $row['option_2'] = $row->option_2 ?? '';
                    $row['option_3'] = $row->option_3 ?? '';
                    $row['option_4'] = $row->option_4 ?? '';
                    $row['option_5'] = $row->option_5 ?? '';
                    $row['option_6'] = $row->option_6 ?? '';
                    $row['quiz_answer'] = $row->quiz_answer ?? '';
                    $row['quiz_answer_value']= $row->quiz_answer_value ?? "";
                    $row['quiz_hint'] = $row->quiz_hint ?? '';
                    $row['quiz_explanation'] = $row->quiz_exp ?? '';

                    if($row['image_type'] == 1)
                    {   
                        $row['quiz_image'] = asset($row->quiz_image) ?? 'https://picsum.photos/200'; 
                    }
                    else
                    {
                        $row['quiz_image'] = $row->quiz_image ?? 'https://picsum.photos/200'; 
                    }
                    $row['category_id'] = $row->category_id;
                    
                    unset($row['image_type'],$row->quiz_exp);
                }
                
                if(!empty($users))
                {
                    $responseArr = array('result'=>'1', 'data'=> $users->items(),'total'=>(string) $users->total(),'currentPage'=>(string) $users->currentPage(),'perPage'=> (string) $users->perPage(),'lastPage'=> (string) $users->lastPage(), 'message'=>'Success');
                }
                else
                {
                    $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
                }
            }
            else
            {
                $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
            }  
        
        return response()->json($responseArr);
    }

    public function quizset2paginate(Request $request)
    {
        $app_id = $request->app_id;
        $search = $request->search;
        $page = $request->page;
        if($page == Null && !empty($search) && !empty($app_id))
        {
            $resArr=[];
            $map = QuizSet2MappedAppCategory::select('category_id')->where('app_id',$app_id)->get();
            $category_id = [];
            foreach($map as $row)
            {
                $category_id[] = $row->category_id;
            }
            $responseArr = array('result'=>'0', 'data'=> [], 'message'=>'required field are missing');
            if(!empty($search) && !empty($category_id))
            {   
                $users = QuizSet2::select([
                    'id As quiz_id',
                    'question_name As quiz_name',
                    'question_content As quiz_content',
                    'question_format_type As quiz_format_type',
                    'option_1',
                    'option_2',
                    'option_3',
                    'option_4',
                    'option_5',
                    'option_6',
                    'quiz_answer',
                    'quiz_answer_value',
                    'quiz_hint',
                    'quiz_exp',
                    'quiz_image',
                    'image_type',
                    'option_count',
                    'category_id'])
                    ->where([['question_name', '!=', Null],
                    [function ($query) use ($search) {
                                $query->Where('question_name', 'LIKE', '%' . $search . '%');
                        }]])->where('deleted_at','0')->get();
                    if(!empty($users) && count($users) )
                    {
                        foreach($users as $row)
                        {   
                            $row['quiz_id'] = (string) $row->quiz_id ?? '';
                            if($row->quiz_format_type == 1)
                            {
                                $row['question_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = $row->quiz_content ?? '';
                            }
                            if($row->quiz_format_type == 2)
                            {
                                $row['quiz_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = $row->quiz_content ?? '';
                            }
                            if($row->quiz_format_type == 3)
                            {
                                $row['quiz_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = asset($row->quiz_content) ?? '';
                            }
                            if($row->quiz_format_type == 4)
                            {
                                $row['quiz_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = asset($row->quiz_content) ?? '';
                            }
                            
                            $row['option_1'] = $row->option_1 ?? '';
                            $row['option_2'] = $row->option_2 ?? '';
                            $row['option_3'] = $row->option_3 ?? '';
                            $row['option_4'] = $row->option_4 ?? '';
                            $row['option_5'] = $row->option_5 ?? '';
                            $row['option_6'] = $row->option_6 ?? '';
                            $row['quiz_answer'] = $row->quiz_answer ?? '';
                            $row['quiz_answer_value']= $row->quiz_answer_value ?? "";
                            $row['quiz_hint'] = $row->quiz_hint ?? '';
                            $row['quiz_explanation'] = $row->quiz_exp ?? '';
        
                            if($row['image_type'] == 1)
                            {   
                                $row['quiz_image'] = asset($row->quiz_image) ?? 'https://picsum.photos/200'; 
                            }
                            else
                            {
                                $row['quiz_image'] = $row->quiz_image ?? 'https://picsum.photos/200'; 
                            }
                            $row['category_id'] = $row->category_id;
                            
                            unset($row['image_type'],$row->quiz_exp);
                        }
                        
                        if(!empty($users))
                        {
                            $responseArr = array('result'=>'1', 'data'=> $users, 'message'=>'Success');
                        }
                        else
                        {
                            $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
                        }
                    }
                    else
                    {
                        $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
                    }
                }
            return response()->json($responseArr);
        }
        else
        {
            $app_id = $request->app_id;
            $search = $request->search;
            $resArr=[];
            $map = QuizSet2MappedAppCategory::select('category_id')->where('app_id',$app_id)->get();
            $category_id = [];
            foreach($map as $row)
            {
                $category_id[] = $row->category_id;
            }
            $responseArr = array('result'=>'0', 'data'=> [], 'message'=>'required field are missing');
            if(!empty($search) && !empty($category_id))
            {   
                $users = QuizSet2::select([
                    'id As quiz_id',
                    'question_name As quiz_name',
                    'question_content As quiz_content',
                    'question_format_type As quiz_format_type',
                    'option_1',
                    'option_2',
                    'option_3',
                    'option_4',
                    'option_5',
                    'option_6',
                    'quiz_answer',
                    'quiz_answer_value',
                    'quiz_hint',
                    'quiz_exp',
                    'quiz_image',
                    'image_type',
                    'option_count',
                    'category_id'])
                    ->where([['question_name', '!=', Null],
                    [function ($query) use ($search) {
                                $query->Where('question_name', 'LIKE', '%' . $search . '%');
                        }]])->where('deleted_at','0')->paginate(15);
                    if(!empty($users) && count($users) )
                    {
                        foreach($users as $row)
                        {   
                            $row['quiz_id'] = (string) $row->quiz_id ?? '';
                            if($row->quiz_format_type == 1)
                            {
                                $row['question_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = $row->quiz_content ?? '';
                            }
                            if($row->quiz_format_type == 2)
                            {
                                $row['quiz_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = $row->quiz_content ?? '';
                            }
                            if($row->quiz_format_type == 3)
                            {
                                $row['quiz_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = asset($row->quiz_content) ?? '';
                            }
                            if($row->quiz_format_type == 4)
                            {
                                $row['quiz_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = asset($row->quiz_content) ?? '';
                            }
                            
                            $row['option_1'] = $row->option_1 ?? '';
                            $row['option_2'] = $row->option_2 ?? '';
                            $row['option_3'] = $row->option_3 ?? '';
                            $row['option_4'] = $row->option_4 ?? '';
                            $row['option_5'] = $row->option_5 ?? '';
                            $row['option_6'] = $row->option_6 ?? '';
                            $row['quiz_answer'] = $row->quiz_answer ?? '';
                            $row['quiz_answer_value']= $row->quiz_answer_value ?? "";
                            $row['quiz_hint'] = $row->quiz_hint ?? '';
                            $row['quiz_explanation'] = $row->quiz_exp ?? '';
        
                            if($row['image_type'] == 1)
                            {   
                                $row['quiz_image'] = asset($row->quiz_image) ?? 'https://picsum.photos/200'; 
                            }
                            else
                            {
                                $row['quiz_image'] = $row->quiz_image ?? 'https://picsum.photos/200'; 
                            }
                            $row['category_id'] = $row->category_id;
                            
                            unset($row['image_type'],$row->quiz_exp);
                        }
                        
                        if(!empty($users))
                        {
                            $responseArr = array('result'=>'1', 'data'=> $users->items(),'total'=>(string) $users->total(),'currentPage'=>(string) $users->currentPage(),'perPage'=> (string) $users->perPage(),'lastPage'=> (string) $users->lastPage(), 'message'=>'Success');
                        }
                        else
                        {
                            $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
                        }
                    }
                    else
                    {
                        $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
                    }
                }   
            return response()->json($responseArr);
        }
    }


    public function quizset4App()
    {
        $resArr=[];
        $responseArr = array('result' => '0' ,'message'=>'failed','data'=> []);
        
        $app = QuizAppSet4::Select('id','app_name','app_description','app_image','image_type')->where('deleted_at','0')->get();
        
        if(!empty($app) && count($app) )
        {
            foreach($app as $row)
            {   
                $temp['app_id'] = (string) $row->id ?? '';
                $temp['app_name'] = $row->app_name ?? '';
                if($row->image_type == 1)
                {   
                    $temp['app_image'] = asset($row->app_image) ?? 'https://picsum.photos/200'; 
                }
                else
                { 
                    $temp['app_image'] = $row->app_image ?? 'https://picsum.photos/200'; 
                }
                $temp['app_description'] = $row->app_description ?? '' ;
                array_push($resArr, $temp);
            }
            
            if(!empty($resArr)){
                $responseArr = array('result'=>'1', 'data'=> $resArr, 'message'=>'Success');
            }else{
                $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
            }
        }
        else
        {
            $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
        }  
        return response()->json($responseArr);
    }

    public function quizset4(Request $request)
    {
        $app_id = $request->app_id;
        $resArr=[];
        $responseArr = array('result' => '0' ,'message'=>'failed','data'=> []);
        
        $users = QuizSet4::select([
            'id As quiz_id',
            'question_name As quiz_name',
            'question_content As quiz_content',
            'question_format_type As quiz_format_type',
            'option_1',
            'option_2',
            'option_3',
            'option_4',
            'option_5',
            'option_6',
            'quiz_answer',
            'quiz_answer_value',
            'quiz_hint',
            'quiz_exp',
            'quiz_image',
            'image_type',
            'option_count',
            'app_id'])
            ->where('app_id',$app_id)
            ->where('deleted_at','0')->paginate(15);
            if(!empty($users) && count($users) )
            {
                foreach($users as $row)
                {   
                    $row['quiz_id'] = (string) $row->quiz_id ?? '';
                    if($row->quiz_format_type == 1)
                    {
                        $row['question_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 2)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 3)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    if($row->quiz_format_type == 4)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    
                    $row['option_1'] = $row->option_1 ?? '';
                    $row['option_2'] = $row->option_2 ?? '';
                    $row['option_3'] = $row->option_3 ?? '';
                    $row['option_4'] = $row->option_4 ?? '';
                    $row['option_5'] = $row->option_5 ?? '';
                    $row['option_6'] = $row->option_6 ?? '';
                    $row['quiz_answer'] = $row->quiz_answer ?? '';
                    $row['quiz_answer_value']= $row->quiz_answer_value ?? "";
                    $row['quiz_hint'] = $row->quiz_hint ?? '';
                    $row['quiz_explanation'] = $row->quiz_exp ?? '';
                    $row['app_id'] = $row->app_id ?? '';
                    if($row['image_type'] == 1)
                    {   
                        $row['quiz_image'] = asset($row->quiz_image) ?? 'https://picsum.photos/200'; 
                    }
                    else
                    {
                        $row['quiz_image'] = $row->quiz_image ?? 'https://picsum.photos/200'; 
                    }

                    unset($row['image_type'],$row->quiz_exp);
                }
                
                if(!empty($users))
                {
                    $responseArr = array('result'=>'1', 'data'=> $users->items(),'total'=>(string) $users->total(),'currentPage'=>(string) $users->currentPage(),'perPage'=> (string) $users->perPage(),'lastPage'=> (string) $users->lastPage(), 'message'=>'Success');
                }
                else
                {
                    $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
                }
            }
            else
            {
                $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
            }  
        
        return response()->json($responseArr);
    }

    public function quizset4search(Request $request)
    {
        $app_id = $request->app_id;
        $search = $request->search;
        $page = $request->page;
        if($page == Null && !empty($search) && !empty($app_id))
        {
            if(!empty($search))
            {   
                $users = QuizSet4::select([
                    'id As quiz_id',
                    'question_name As quiz_name',
                    'question_content As quiz_content',
                    'question_format_type As quiz_format_type',
                    'option_1',
                    'option_2',
                    'option_3',
                    'option_4',
                    'option_5',
                    'option_6',
                    'quiz_answer',
                    'quiz_answer_value',
                    'quiz_hint',
                    'quiz_exp',
                    'quiz_image',
                    'image_type',
                    'option_count',
                    'app_id'])->where('app_id',$app_id)
                    ->where([['question_name', '!=', Null],
                    [function ($query) use ($search) {
                                $query->Where('question_name', 'LIKE', '%' . $search . '%');
                        }]])->where('deleted_at','0')->get();
                if(!empty($users) && count($users) )
                {
                    foreach($users as $row)
                    {   
                        $row['quiz_id'] = (string) $row->quiz_id ?? '';
                        if($row->quiz_format_type == 1)
                        {
                            $row['question_name'] = $row->quiz_name ?? '';
                            $row['quiz_content'] = $row->quiz_content ?? '';
                        }
                        if($row->quiz_format_type == 2)
                        {
                            $row['quiz_name'] = $row->quiz_name ?? '';
                            $row['quiz_content'] = $row->quiz_content ?? '';
                        }
                        if($row->quiz_format_type == 3)
                        {
                            $row['quiz_name'] = $row->quiz_name ?? '';
                            $row['quiz_content'] = asset($row->quiz_content) ?? '';
                        }
                        if($row->quiz_format_type == 4)
                        {
                            $row['quiz_name'] = $row->quiz_name ?? '';
                            $row['quiz_content'] = asset($row->quiz_content) ?? '';
                        }
                        
                        $row['option_1'] = $row->option_1 ?? '';
                        $row['option_2'] = $row->option_2 ?? '';
                        $row['option_3'] = $row->option_3 ?? '';
                        $row['option_4'] = $row->option_4 ?? '';
                        $row['option_5'] = $row->option_5 ?? '';
                        $row['option_6'] = $row->option_6 ?? '';
                        $row['quiz_answer'] = $row->quiz_answer ?? '';
                        $row['quiz_answer_value']= $row->quiz_answer_value ?? "";
                        $row['quiz_hint'] = $row->quiz_hint ?? '';
                        $row['quiz_explanation'] = $row->quiz_exp ?? '';
    
                        if($row['image_type'] == 1)
                        {   
                            $row['quiz_image'] = asset($row->quiz_image) ?? 'https://picsum.photos/200'; 
                        }
                        else
                        {
                            $row['quiz_image'] = $row->quiz_image ?? 'https://picsum.photos/200'; 
                        }
                        $row['app_id'] = $row->app_id ?? '';
                        
                        unset($row['image_type'],$row->quiz_exp);
                    }
                    
                    if(!empty($users))
                    {
                        $responseArr = array('result'=>'1', 'data'=> $users, 'message'=>'Success');
                    }
                    else
                    {
                        $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
                    }
                }
                else
                {
                    $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
                }
            }
            return response()->json($responseArr);
        }
        else
        {
            $app_id = $request->app_id;
            $search = $request->search;
            $responseArr = array('result'=>'0', 'data'=> [], 'message'=>'required field are missing');
            if(!empty($search) && !empty($category_id))
            {   
                $users = QuizSet4::select([
                    'id As quiz_id',
                    'question_name As quiz_name',
                    'question_content As quiz_content',
                    'question_format_type As quiz_format_type',
                    'option_1',
                    'option_2',
                    'option_3',
                    'option_4',
                    'option_5',
                    'option_6',
                    'quiz_answer',
                    'quiz_answer_value',
                    'quiz_hint',
                    'quiz_exp',
                    'quiz_image',
                    'image_type',
                    'option_count',
                    'app_id'])->where('app_id',$app_id)
                    ->where([['question_name', '!=', Null],
                    [function ($query) use ($search) {
                                $query->Where('question_name', 'LIKE', '%' . $search . '%');
                        }]])->where('deleted_at','0')->paginate(15);
                    if(!empty($users) && count($users) )
                    {
                        foreach($users as $row)
                        {   
                            $row['quiz_id'] = (string) $row->quiz_id ?? '';
                            if($row->quiz_format_type == 1)
                            {
                                $row['question_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = $row->quiz_content ?? '';
                            }
                            if($row->quiz_format_type == 2)
                            {
                                $row['quiz_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = $row->quiz_content ?? '';
                            }
                            if($row->quiz_format_type == 3)
                            {
                                $row['quiz_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = asset($row->quiz_content) ?? '';
                            }
                            if($row->quiz_format_type == 4)
                            {
                                $row['quiz_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = asset($row->quiz_content) ?? '';
                            }
                            
                            $row['option_1'] = $row->option_1 ?? '';
                            $row['option_2'] = $row->option_2 ?? '';
                            $row['option_3'] = $row->option_3 ?? '';
                            $row['option_4'] = $row->option_4 ?? '';
                            $row['option_5'] = $row->option_5 ?? '';
                            $row['option_6'] = $row->option_6 ?? '';
                            $row['quiz_answer'] = $row->quiz_answer ?? '';
                            $row['quiz_answer_value']= $row->quiz_answer_value ?? "";
                            $row['quiz_hint'] = $row->quiz_hint ?? '';
                            $row['quiz_explanation'] = $row->quiz_exp ?? '';
        
                            if($row['image_type'] == 1)
                            {   
                                $row['quiz_image'] = asset($row->quiz_image) ?? 'https://picsum.photos/200'; 
                            }
                            else
                            {
                                $row['quiz_image'] = $row->quiz_image ?? 'https://picsum.photos/200'; 
                            }
                            $row['app_id'] = $row->app_id ?? '';
                            
                            unset($row['image_type'],$row->quiz_exp);
                        }
                        
                        if(!empty($users))
                        {
                            $responseArr = array('result'=>'1', 'data'=> $users->items(),'total'=>(string) $users->total(),'currentPage'=>(string) $users->currentPage(),'perPage'=> (string) $users->perPage(),'lastPage'=> (string) $users->lastPage(), 'message'=>'Success');
                        }
                        else
                        {
                            $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
                        }
                    }
                    else
                    {
                        $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
                    }
                }   
            return response()->json($responseArr);
        }
    }



    public function quizset3App()
    {
        $resArr=[];
        $responseArr = array('result' => '0' ,'message'=>'failed','data'=> []);
        
        $app = QuizAppSet3::Select('id','app_name','app_description','app_image','image_type')->where('deleted_at','0')->get();
        
        if(!empty($app) && count($app) )
        {
            foreach($app as $row)
            {   
                $temp['app_id'] = (string) $row->id ?? '';
                $temp['app_name'] = $row->app_name ?? '';
                if($row->image_type == 1)
                {   
                    $temp['app_image'] = asset($row->app_image) ?? 'https://picsum.photos/200'; 
                }
                else
                { 
                    $temp['app_image'] = $row->app_image ?? 'https://picsum.photos/200'; 
                }
                $temp['app_description'] = $row->app_description ?? '' ;
                array_push($resArr, $temp);
            }
            
            if(!empty($resArr)){
                $responseArr = array('result'=>'1', 'data'=> $resArr, 'message'=>'Success');
            }else{
                $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
            }
        }
        else
        {
            $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
        }   
        return response()->json($responseArr);
    }

    public function quizset3Category(Request $request)
    {
        $page = $request->page;
        $app_id = $request->app_id;

        $app = QuizSet3MappedAppCategory::select(['app_id','category_id'])->where('app_id', $app_id)->get();
        $mapped_app=[];
        foreach($app as $row)
        {
            $mapped_app[] = $row->category_id;
        }
        $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
        if(!empty($app) && count($app))
        {
            $category = QuizCategorySet3::Select(['id as category_id','category_name','category_description','category_image'])->whereIn('id', $mapped_app)->paginate(15);
            foreach($category as $row)
            {   
                $row['category_id'] = (string) $row->category_id ?? '';
                $row['category_name'] = $row->category_name ?? '';
                $row['category_image'] = asset($row->category_image) ?? 'https://picsum.photos/200'; 
                $row['category_description'] = $row->category_description ?? '' ;
            }
            if(!empty($category))
            {
                $responseArr = array('result'=>'1', 'data'=> $category->items(),'total'=>(string) $category->total(),'currentPage'=>(string) $category->currentPage(),'perPage'=> (string) $category->perPage(),'lastPage'=> (string) $category->lastPage(), 'message'=>'Success');
            }
            else
            {
                $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
            }
        }
        
        return response()->json($responseArr);
    }


    public function quizset3SubCategory(Request $request)
    {
        $category = $request->category_id;
        $resArr=[];
        $responseArr = array('result' => '0' ,'message'=>'failed','data'=> []);
        
        $app = QuizSet3CategoryMappedApp::select(['category_id','sub_category_id'])->where('category_id', $category)->get();
        $mapped_app=[];
        foreach($app as $row)
        {
            $mapped_app[] = $row->sub_category_id;
        }
        $sub_category = QuizSubCategorySet3::select(['id','sub_category_name','sub_category_description','sub_category_image'])->whereIn('id',$mapped_app)->paginate(15);
        
        if(!empty($sub_category) && count($sub_category) )
        {
            foreach($sub_category as $row)
            {   
                $temp['sub_category_id'] = (string) $row->id ?? '';
                $temp['sub_category_name'] = $row->sub_category_name ?? '';
                $temp['sub_category_image'] = asset($row->sub_category_image) ?? 'https://picsum.photos/200'; 
                $temp['sub_category_description'] = $row->sub_category_description ?? '' ;
                array_push($resArr, $temp);
            }
            
            if(!empty($resArr)){
                $responseArr = array('result'=>'1', 'data'=> $resArr,'total'=>(string) $sub_category->total(),'currentPage'=>(string) $sub_category->currentPage(),'perPage'=> (string) $sub_category->perPage(),'lastPage'=> (string) $sub_category->lastPage(), 'message'=>'Success');
            }else{
                $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
            }
        }
        else
        {
            $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
        }  
        
        return response()->json($responseArr);
    }

    public function quizset3CategoryList(Request $request)
    {
        $category = $request->category_id;

        $app = QuizSet3CategoryMappedApp::select(['category_id','sub_category_id'])->where('category_id', $category)->get();
        $mapped_app=[];
        foreach($app as $row)
        {
            $mapped_app[] = $row->sub_category_id;
        }

        $resArr=[];
        $users = QuizSet3::select([
            'id As quiz_id',
            'question_name As quiz_name',
            'question_content As quiz_content',
            'question_format_type As quiz_format_type',
            'option_1',
            'option_2',
            'option_3',
            'option_4',
            'option_5',
            'option_6',
            'quiz_answer',
            'quiz_answer_value',
            'quiz_hint',
            'quiz_exp',
            'quiz_image',
            'image_type',
            'option_count',
            'sub_category_id'])
            ->whereIn('sub_category_id',$mapped_app)
            ->where('deleted_at','0')->paginate(15);
            if(!empty($users) && count($users) )
            {
                foreach($users as $row)
                {   
                    $row['quiz_id'] = (string) $row->quiz_id ?? '';
                    if($row->quiz_format_type == 1)
                    {
                        $row['question_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 2)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 3)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    if($row->quiz_format_type == 4)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    
                    $row['option_1'] = $row->option_1 ?? '';
                    $row['option_2'] = $row->option_2 ?? '';
                    $row['option_3'] = $row->option_3 ?? '';
                    $row['option_4'] = $row->option_4 ?? '';
                    $row['option_5'] = $row->option_5 ?? '';
                    $row['option_6'] = $row->option_6 ?? '';
                    $row['quiz_answer'] = $row->quiz_answer ?? '';
                    $row['quiz_answer_value']= $row->quiz_answer_value ?? "";
                    $row['quiz_hint'] = $row->quiz_hint ?? '';
                    $row['quiz_explanation'] = $row->quiz_exp ?? '';

                    if($row['image_type'] == 1)
                    {   
                        $row['quiz_image'] = asset($row->quiz_image) ?? 'https://picsum.photos/200'; 
                    }
                    else
                    {
                        $row['quiz_image'] = $row->quiz_image ?? 'https://picsum.photos/200'; 
                    }
                    $row['sub_category_id'] = $row->sub_category_id;
                    
                    unset($row['image_type'],$row->quiz_exp);
                }
                
                if(!empty($users))
                {
                    $responseArr = array('result'=>'1', 'data'=> $users->items(),'total'=>(string) $users->total(),'currentPage'=>(string) $users->currentPage(),'perPage'=> (string) $users->perPage(),'lastPage'=> (string) $users->lastPage(), 'message'=>'Success');
                }
                else
                {
                    $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
                }
            }
            else
            {
                $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
            }  
        
        return response()->json($responseArr);
    }

    public function quizset3SubCategoryList(Request $request)
    {
        $sub_category = $request->sub_category_id;
        $users = QuizSet3::select([
            'id As quiz_id',
            'question_name As quiz_name',
            'question_content As quiz_content',
            'question_format_type As quiz_format_type',
            'option_1',
            'option_2',
            'option_3',
            'option_4',
            'option_5',
            'option_6',
            'quiz_answer',
            'quiz_answer_value',
            'quiz_hint',
            'quiz_exp',
            'quiz_image',
            'image_type',
            'option_count',
            'sub_category_id'])
            ->where('sub_category_id',$sub_category)
            ->where('deleted_at','0')->paginate(15);
            if(!empty($users) && count($users) )
            {
                foreach($users as $row)
                {   
                    $row['quiz_id'] = (string) $row->quiz_id ?? '';
                    if($row->quiz_format_type == 1)
                    {
                        $row['question_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 2)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 3)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    if($row->quiz_format_type == 4)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    
                    $row['option_1'] = $row->option_1 ?? '';
                    $row['option_2'] = $row->option_2 ?? '';
                    $row['option_3'] = $row->option_3 ?? '';
                    $row['option_4'] = $row->option_4 ?? '';
                    $row['option_5'] = $row->option_5 ?? '';
                    $row['option_6'] = $row->option_6 ?? '';
                    $row['quiz_answer'] = $row->quiz_answer ?? '';
                    $row['quiz_answer_value']= $row->quiz_answer_value ?? "";
                    $row['quiz_hint'] = $row->quiz_hint ?? '';
                    $row['quiz_explanation'] = $row->quiz_exp ?? '';

                    if($row['image_type'] == 1)
                    {   
                        $row['quiz_image'] = asset($row->quiz_image) ?? 'https://picsum.photos/200'; 
                    }
                    else
                    {
                        $row['quiz_image'] = $row->quiz_image ?? 'https://picsum.photos/200'; 
                    }
                    $row['sub_category_id'] = $row->sub_category_id;
                    
                    unset($row['image_type'],$row->quiz_exp);
                }
                
                if(!empty($users))
                {
                    $responseArr = array('result'=>'1', 'data'=> $users->items(),'total'=>(string) $users->total(),'currentPage'=>(string) $users->currentPage(),'perPage'=> (string) $users->perPage(),'lastPage'=> (string) $users->lastPage(), 'message'=>'Success');
                }
                else
                {
                    $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
                }
            }
            else
            {
                $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
            }
        
        return response()->json($responseArr);
    }

    public function quizset3(Request $request)
    {
        $quiz_id = $request->quiz_id;
        $resArr=[];
        $responseArr = array('result' => '0' ,'message'=>'failed','data'=> []);
        
        $users = QuizSet3::select([
            'id As quiz_id',
            'question_name As quiz_name',
            'question_content As quiz_content',
            'question_format_type As quiz_format_type',
            'option_1',
            'option_2',
            'option_3',
            'option_4',
            'option_5',
            'option_6',
            'quiz_answer',
            'quiz_answer_value',
            'quiz_hint',
            'quiz_exp',
            'quiz_image',
            'image_type',
            'option_count',
            'sub_category_id'])
            ->where('id',$quiz_id)
            ->where('deleted_at','0')->paginate(15);
            if(!empty($users) && count($users) )
            {
                foreach($users as $row)
                {   
                    $row['quiz_id'] = (string) $row->quiz_id ?? '';
                    if($row->quiz_format_type == 1)
                    {
                        $row['question_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 2)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = $row->quiz_content ?? '';
                    }
                    if($row->quiz_format_type == 3)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    if($row->quiz_format_type == 4)
                    {
                        $row['quiz_name'] = $row->quiz_name ?? '';
                        $row['quiz_content'] = asset($row->quiz_content) ?? '';
                    }
                    
                    $row['option_1'] = $row->option_1 ?? '';
                    $row['option_2'] = $row->option_2 ?? '';
                    $row['option_3'] = $row->option_3 ?? '';
                    $row['option_4'] = $row->option_4 ?? '';
                    $row['option_5'] = $row->option_5 ?? '';
                    $row['option_6'] = $row->option_6 ?? '';
                    $row['quiz_answer'] = $row->quiz_answer ?? '';
                    $row['quiz_answer_value']= $row->quiz_answer_value ?? "";
                    $row['quiz_hint'] = $row->quiz_hint ?? '';
                    $row['quiz_explanation'] = $row->quiz_exp ?? '';

                    if($row['image_type'] == 1)
                    {   
                        $row['quiz_image'] = asset($row->quiz_image) ?? 'https://picsum.photos/200'; 
                    }
                    else
                    {
                        $row['quiz_image'] = $row->quiz_image ?? 'https://picsum.photos/200'; 
                    }
                    $row['sub_category_id'] = $row->sub_category_id;
                    
                    unset($row['image_type'],$row->quiz_exp);
                }
                
                if(!empty($users))
                {
                    $responseArr = array('result'=>'1', 'data'=> $users->items(),'total'=>(string) $users->total(),'currentPage'=>(string) $users->currentPage(),'perPage'=> (string) $users->perPage(),'lastPage'=> (string) $users->lastPage(), 'message'=>'Success');
                }
                else
                {
                    $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
                }
            }
            else
            {
                $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
            }  
        
        return response()->json($responseArr);
    }

    public function quizset3paginate(Request $request)
    {
        $app_id = $request->app_id;
        $search = $request->search;
        $page = $request->page;
        if($page == Null && !empty($search) && !empty($app_id))
        {
            $resArr=[];
            $map = QuizSet3MappedAppCategory::select('category_id')->where('app_id',$app_id)->get();
            $category_id = [];
            foreach($map as $row)
            {
                $category_id[] = $row->category_id;
            }
            $responseArr = array('result'=>'0', 'data'=> [], 'message'=>'required field are missing');
            if(!empty($search) && !empty($category_id))
            {   
                $users = QuizSet3::select([
                    'id As quiz_id',
                    'question_name As quiz_name',
                    'question_content As quiz_content',
                    'question_format_type As quiz_format_type',
                    'option_1',
                    'option_2',
                    'option_3',
                    'option_4',
                    'option_5',
                    'option_6',
                    'quiz_answer',
                    'quiz_answer_value',
                    'quiz_hint',
                    'quiz_exp',
                    'quiz_image',
                    'image_type',
                    'option_count',
                    'sub_category_id'])
                    ->where([['question_name', '!=', Null],
                    [function ($query) use ($search) {
                                $query->Where('question_name', 'LIKE', '%' . $search . '%');
                        }]])->where('deleted_at','0')->get();
                    if(!empty($users) && count($users) )
                    {
                        foreach($users as $row)
                        {   
                            $row['quiz_id'] = (string) $row->quiz_id ?? '';
                            if($row->quiz_format_type == 1)
                            {
                                $row['question_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = $row->quiz_content ?? '';
                            }
                            if($row->quiz_format_type == 2)
                            {
                                $row['quiz_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = $row->quiz_content ?? '';
                            }
                            if($row->quiz_format_type == 3)
                            {
                                $row['quiz_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = asset($row->quiz_content) ?? '';
                            }
                            if($row->quiz_format_type == 4)
                            {
                                $row['quiz_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = asset($row->quiz_content) ?? '';
                            }
                            
                            $row['option_1'] = $row->option_1 ?? '';
                            $row['option_2'] = $row->option_2 ?? '';
                            $row['option_3'] = $row->option_3 ?? '';
                            $row['option_4'] = $row->option_4 ?? '';
                            $row['option_5'] = $row->option_5 ?? '';
                            $row['option_6'] = $row->option_6 ?? '';
                            $row['quiz_answer'] = $row->quiz_answer ?? '';
                            $row['quiz_answer_value']= $row->quiz_answer_value ?? "";
                            $row['quiz_hint'] = $row->quiz_hint ?? '';
                            $row['quiz_explanation'] = $row->quiz_exp ?? '';
        
                            if($row['image_type'] == 1)
                            {   
                                $row['quiz_image'] = asset($row->quiz_image) ?? 'https://picsum.photos/200'; 
                            }
                            else
                            {
                                $row['quiz_image'] = $row->quiz_image ?? 'https://picsum.photos/200'; 
                            }
                            $row['sub_category_id'] = $row->sub_category_id;
                            
                            unset($row['image_type'],$row->quiz_exp);
                        }
                        
                        if(!empty($users))
                        {
                            $responseArr = array('result'=>'1', 'data'=> $users, 'message'=>'Success');
                        }
                        else
                        {
                            $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
                        }
                    }
                    else
                    {
                        $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
                    }
                }
            return response()->json($responseArr);
        }
        else
        {
            $app_id = $request->app_id;
            $search = $request->search;
            $resArr=[];
            $map = QuizSet3MappedAppCategory::select('category_id')->where('app_id',$app_id)->get();
            $category_id = [];
            foreach($map as $row)
            {
                $category_id[] = $row->category_id;
            }

            $responseArr = array('result'=>'0', 'data'=> [], 'message'=>'required field are missing');
            if(!empty($search) && !empty($category_id))
            {   
                $users = QuizSet3::select([
                    'id As quiz_id',
                    'question_name As quiz_name',
                    'question_content As quiz_content',
                    'question_format_type As quiz_format_type',
                    'option_1',
                    'option_2',
                    'option_3',
                    'option_4',
                    'option_5',
                    'option_6',
                    'quiz_answer',
                    'quiz_answer_value',
                    'quiz_hint',
                    'quiz_exp',
                    'quiz_image',
                    'image_type',
                    'option_count',
                    'sub_category_id'])
                    ->where([['question_name', '!=', Null],
                    [function ($query) use ($search) {
                                $query->Where('question_name', 'LIKE', '%' . $search . '%');
                        }]])->where('deleted_at','0')->paginate(15);
                    if(!empty($users) && count($users) )
                    {
                        foreach($users as $row)
                        {   
                            $row['quiz_id'] = (string) $row->quiz_id ?? '';
                            if($row->quiz_format_type == 1)
                            {
                                $row['question_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = $row->quiz_content ?? '';
                            }
                            if($row->quiz_format_type == 2)
                            {
                                $row['quiz_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = $row->quiz_content ?? '';
                            }
                            if($row->quiz_format_type == 3)
                            {
                                $row['quiz_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = asset($row->quiz_content) ?? '';
                            }
                            if($row->quiz_format_type == 4)
                            {
                                $row['quiz_name'] = $row->quiz_name ?? '';
                                $row['quiz_content'] = asset($row->quiz_content) ?? '';
                            }
                            
                            $row['option_1'] = $row->option_1 ?? '';
                            $row['option_2'] = $row->option_2 ?? '';
                            $row['option_3'] = $row->option_3 ?? '';
                            $row['option_4'] = $row->option_4 ?? '';
                            $row['option_5'] = $row->option_5 ?? '';
                            $row['option_6'] = $row->option_6 ?? '';
                            $row['quiz_answer'] = $row->quiz_answer ?? '';
                            $row['quiz_answer_value']= $row->quiz_answer_value ?? "";
                            $row['quiz_hint'] = $row->quiz_hint ?? '';
                            $row['quiz_explanation'] = $row->quiz_exp ?? '';
        
                            if($row['image_type'] == 1)
                            {   
                                $row['quiz_image'] = asset($row->quiz_image) ?? 'https://picsum.photos/200'; 
                            }
                            else
                            {
                                $row['quiz_image'] = $row->quiz_image ?? 'https://picsum.photos/200'; 
                            }
                            $row['sub_category_id'] = $row->sub_category_id;
                            
                            unset($row['image_type'],$row->quiz_exp);
                        }
                        
                        if(!empty($users))
                        {
                            $responseArr = array('result'=>'1', 'data'=> $users->items(),'total'=>(string) $users->total(),'currentPage'=>(string) $users->currentPage(),'perPage'=> (string) $users->perPage(),'lastPage'=> (string) $users->lastPage(), 'message'=>'Success');
                        }
                        else
                        {
                            $responseArr = array('result'=>'0', 'data'=> $resArr, 'message'=>'No Data Found');
                        }
                    }
            }
            else
            {
                $responseArr = array('result' => '0' ,'data'=> [] ,'message'=>'No Data Found',);
            }
            return response()->json($responseArr);
        }
    }



}


