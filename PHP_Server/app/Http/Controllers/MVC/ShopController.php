<?php

namespace App\Http\Controllers\MVC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
        public function getArticles(){

            //Get data from the application table
            $articles_data= '\App\\' . 'Article';
            //Look in the database
            $articles=$articles_data::all();

            $category_value=request('category');

            echo $category_value;
            echo "yoyo";  

            /*switch(request('category')){

            }*/

            $category_data= '\App\\' . 'Category';

            $category=$category_data::all();

            return view('shop', [
                //Sending data to the view
                'articles' => $articles,
                'category' => $category,
            ]);
    }
}