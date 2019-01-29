<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Image;
use App\Illustrate_manifestation;
use DB;


class ImageController extends Controller
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

    
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'file' => 'required|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg',
        ]);
        if(!$validator->fails() && $request->hasFile('file')){

            $extension = $request->file('file')->extension();
            $image = $request->file('file');
            $name = $request->title . '$' . time();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            
            DB::transaction(function () use ($request, $name, $destinationPath, $extension) {
                $img = Image::create([
                    'img_name'=>$name,
                    'img_url'=> '/uploads' . '/' . $name,
                    'id_member'=>\Auth::id(),
                ]);

                Illustrate_manifestation::insert([
                    'id_img'=>$img->id_img,
                    'id_manifestation'=>intval($request->id_event),
                ]);
            });

            return dump('success','Image Upload successfully');
        }
        else{
            return dump('error','Image not Upload successfully');
        }
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
}
