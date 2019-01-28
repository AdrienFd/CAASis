<?php

namespace App\Http\Controllers\MVC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;

class ShopController extends Controller
{
        public function getArticles(){

            //Get the categories
            $category=Category::all();

            //Get data from the view
            $cancel=request('cancel');
            $category_id=request('category');

            $max_price=request('max_price');

            $descending=request('descending');
            $increassing=request('increassing');
            echo $category_id . "--" . $max_price;



            //Print only the good categories
            if(isset($max_price)){
                if($category_id==0){
                    $articles=Article::where('article_price', '<=',  $max_price)
                    ->get();
                    echo "test";
                }
                else{
                    $articles=Article::where('article_price', '<=',  $max_price)
                    ->where('id_category', $category_id)
                    ->get();
                }
            }
        else{
            $articles=Article::all();

        }

            return view('shop', [
                //Sending data to the view
                'articles' => $articles,
                'category' => $category,
            ]);
    }
}