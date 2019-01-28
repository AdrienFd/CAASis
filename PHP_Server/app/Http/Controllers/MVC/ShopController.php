<?php

namespace App\Http\Controllers\MVC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
        public function getArticles(){

            //Get data from the application table
            $articles_data= '\App\\' . 'Article';

            $category_data= '\App\\' . 'Article';

            $articles=$articles_data::all();
            $category=$category_data::all();

            return view('shop', [
                //Sending data to the view
                'articles' => $articles,
                'category' => $category,
            ]);
    }
}