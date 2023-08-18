<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use App\Http\Requests\ImagesRequest;

class ImagesController extends Controller
{
    //
    public function create(ImagesRequest $request){
        
        //Data của request lấy từ api post
        $image = new Images();
        $image->name = $request->name;
        $image->type = $request->type;
        $image->imageDirectory = $request->imageDirectory;
        $image->text_id = $request->text_id;

        $image->save();
        return response()->json('Added Successfully');
    }
    
    public function edit(ImagesRequest $request){
        $image = Images::findorfail($request->route('id'));
        $image->name = $request->name;
        $image->type = $request->type;
        $image->imageDirectory = $request->imageDirectory;
        $image->text_id = $request->text_id;

        $image->update();

        return response()->json('Updated Successfully');
    }

    public function delete(Request $request){
        $image = Images::findorfail($request->route('id'))->delete();
        return response()->json('Deleted Successfully');
    }

    public function getData(){
        $images = Images::all(); //fetch all the data (query code in laravel)
        return response()->json($images);
    }
}
