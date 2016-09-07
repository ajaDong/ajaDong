<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ChapterController extends Controller
{
    // Get all item for Chapter Table
    public function getAll($course_id){
    	$todos= ChapterModel::where('course_id',$course_id)->get();
    	if(count($todos)>0){
            return $todos;
        }else{
            return response()->json(["message"=>"Not Found"],404);
        }
    }

    //Create single item for Chapter Table
    public function create(Request $request){
    	$data=$request->all();

    	$model = new ChapterModel;
    	$model->courseID = $data['course_id'];
    	$model->chapterName = $data['chapter_name'];
    	$model->chapterNo= $data['chapter_no'];
    	$model->save();

        return response()->json(["message"=>"Successfully created"],201);
    }

    //Get single item based on its ID
    public function getSingle($id){
        $todos= ChapterModel::find($id);
        if(count($todos)>0){
            return $todos;
        }else{
            return response()->json(["message"=>"Not Found"],404);
        }
        
    }

    //Modify single item based on its ID
    public function modify(Request $request, $id){
        $data=$request->all();
        $model= ChapterModel::find($id);
        if(count($model)>0){
            return $model;
        }else{
            return response()->json(["message"=>"Not Found"],404);
        }

    	$model->courseID = $data['course_id'];
    	$model->chapterName = $data['chapter_name'];
    	$model->chapterNo= $data['chapter_no'];
    	$model->save();

        return response()->json(["message"=>"Successfully modified"],201);
    }

    //Delete single item based on its ID    
    public function delete($id){
        $todos= ChapterModel::find($id);
        $todos->delete();
    }
}
