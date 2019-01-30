<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Image;
use App\Illustrate_manifestation;
use DB;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /*
    *
    * Store only picture in the folder public/uploads folder
    *
    */
    public function store(Request $request)
    {
        // validate is the file as been named and if its a picture
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'file' => 'required|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg',
        ]);

        //if the validation is ok and the file is not empty then
        if(!$validator->fails() && $request->hasFile('file')){

            //prepare the path, the name of the picutre (name = user name + $ + timestamp)
            $image = $request->file('file');
            $name = $request->title . '$' . time();
            $destinationPath = public_path('/uploads');

            //place the image into the folder with the modified name 
            $image->move($destinationPath, $name);
            
            //auto handle transaction
            DB::transaction(function () use ($request, $name, $destinationPath) {
                //add a record of this image with the name, path, member who post it ...
                $img = Image::create([
                    'img_name'=>$name,
                    'img_url'=> '/uploads' . '/' . $name,
                    'id_member'=>\Auth::id(),
                ]);

                //illustrate the manifestation with that picture
                Illustrate_manifestation::insert([
                    'id_img'=>$img->id_img,
                    'id_manifestation'=>intval($request->id_event),
                ]);
            });
        }
            return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /*
    *
    * Make zip with img from event
    *
    */
    public function downloadAll() {
        $url = $_SERVER['REQUEST_URI'];
        $id = explode('/',$url)[2];
        $name = explode('/',$url)[3];   

        //get img_id corresponding to the event
        $imgs = Illustrate_manifestation::where('id_manifestation', $id)->get();
       
        //get all img url from the event
        $imgs_path = array();
        foreach ($imgs as $img){
            $path = '.' .$img->image->img_url;
            array_push($imgs_path, $path);
        }

        if($imgs_path != []){
        //$files = glob('uploads/*');
        $zip = \Zipper::make('images_event.zip')->add($imgs_path)->close();

        //header of the response & naming of the file 
        $headers = ['Content-Type' => 'application/zip',];
        $title = 'images' . $name . '.zip';

        //return the zip file and delete it after
        return \Response::download('images_event.zip', $title , $headers)->deleteFileAfterSend(true);
        }
        else {
            return redirect()->back();
        }
    }
}
