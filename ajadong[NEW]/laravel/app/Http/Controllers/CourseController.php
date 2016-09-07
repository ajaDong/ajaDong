<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseModel;
use App\Http\Requests;

class CourseController extends Controller
{
    // Get all item for Course Table
    public function getAll(){
    	$todos= CourseModel::all();
    	return $todos;
    }

    //Create single item for Course Table
    public function create(Request $request){
    	$data=$request->all();

    	$model = new CourseModel;
    	$model->courseName = $data['course_name'];
    	$model->courseCode = $data['course_code'];
    	$model->courseStatus = $data['course_status'];
    	$model->userID = $data['user_id'];
    	$model->role = $data['role'];
    	$model->description = $data['description'];
    	$model->price = $data['price'];
    	$model->save();

        return response()->json(["message"=>"Successfully created"],201);
    }

    //Get single item based on its ID
    public function getSingle($id){
        $todos= CourseModel::find($id);
        if(count($todos)>0){
            return $todos;
        }else{
            return response()->json(["message"=>"Not Found"],404);
        }
        
    }

    //Modify single item based on its ID
    public function modify(Request $request, $id){
        $data=$request->all();
        $model= CourseModel::find($id);
        if(count($model)>0){
            return $model;
        }else{
            return response()->json(["message"=>"Not Found"],404);
        }

    	$model->courseName = $data['course_name'];
    	$model->courseCode = $data['course_code'];
    	$model->courseStatus = $data['course_status'];
    	$model->userID = $data['user_id'];
    	$model->role = $data['role'];
    	$model->description = $data['description'];
    	$model->price = $data['price'];
    	$model->save();

        return response()->json(["message"=>"Successfully modified"],201);
    }

    //Delete single item based on its ID    
    public function delete($id){
        $todos= CourseModel::find($id);
        $todos->delete();
    }
}
