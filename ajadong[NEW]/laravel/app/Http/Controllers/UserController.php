<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use App\Http\Requests;

class UserController extends Controller
{
    // Get all item for User Table
    public function getAll(){
    	$todos= UserModel::all();
    	return $todos;
    }

    //Create single item for User Table
    public function create(Request $request){
    	$data=$request->all();

    	$model = new UserModel;
    	$model->firstName = $data['first_name'];
    	$model->lastName = $data['last_name'];
    	$model->dateOfBirth = $data['date_of_birth'];
    	$model->faculty = $data['faculty'];
    	$model->email = $data['email'];
    	$model->password = $data['password'];
    	$model->save();

        return response()->json(["message"=>"Successfully created"],201);
    }

    //Get single item based on its ID
    public function getSingle($id){
        $todos= UserModel::find($id);
        if(count($todos)>0){
            return $todos;
        }else{
            return response()->json(["message"=>"Not Found"],404);
        }
        
    }

    //Modify single item based on its ID
    public function modify(Request $request, $id){
        $data=$request->all();
        $model= UserModel::find($id);
        if(count($model)>0){
            return $model;
        }else{
            return response()->json(["message"=>"Not Found"],404);
        }

    	$model->firstName = $data['first_name'];
    	$model->lastName = $data['last_name'];
    	$model->dateOfBirth = $data['date_of_birth'];
    	$model->faculty = $data['faculty'];
    	$model->email = $data['email'];
    	$model->password = $data['password'];
    	$model->save();

        return response()->json(["message"=>"Successfully modified"],201);
    }

    //Delete single item based on its ID    
    public function delete($id){
        $todos= UserModel::find($id);
        $todos->delete();
    }
}
