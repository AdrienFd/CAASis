<?php

namespace App\Http\Controllers\MVC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use DB;
use App\Shopping_cart;

class ShopController extends Controller
{

        /*
        *
        * Function call when user ask for the shop it can be called by GET and POST method
        * it will return all article or articles retrieve by filters
        *
        */
        public function getArticles(Request $request){
            //Get the categories
            $category=Category::all();

            //if the user as applied a filter it is using the POST method so we do :
            if($request->isMethod('post')){                

                //select all article under the specified or default max price
                $articles=Article::where('article_price', '<=',  intval($request['max_price']));
                
                //add different where to this select depending on filters
                if(!is_null($request['category'])){
                    $articles = $articles->where('id_category', '=',  $request['category']);
                }

                //add different where to this select depending on filters
                if(!is_null($request['name_order'])){
                    if($request['name_order'] == 1) $articles = $articles->orderby('article_name', 'asc');
                    else $articles = $articles->orderby('article_name', 'desc');
                }

                //add different where to this select depending on filters
                if(!is_null($request['price_order'])){
                    if($request['price_order'] == 1) $articles = $articles->orderby('article_price', 'asc');
                    else $articles = $articles->orderby('article_price', 'desc');
                }

                //get the articles with all the previous filter with a pagination
                $articles = $articles->paginate(10);
                    
                return view('shop', [
                    //Sending data to the view data contain articles, category and filter that have been applied
                    'articles' => $articles,
                    'category' => $category,
                    'category_filter' => $request['category'],
                    'slider' => $request['max_price'],
                    'name_filter' => $request['name_order'],
                    'price_filter' => $request['price_order'],
                ]);


            }
            //if the page as been ask with other than POST method like the GET method return the page with all article
            else {
                $articles=Article::paginate(10);
                return view('shop', [
                    'articles' => $articles,
                    'category' => $category,
                ]);
            }
          
    }

    /*
    *
    * Function that return a specific article in a dedicated view where you can buy it
    *
    */
    public function getArticle(){
        //get the uri explode it to get the id of the article
        $url = $_SERVER['REQUEST_URI'];
        $id = explode('/',$url)[2];

        //get the article data
        $article=Article::where('id_article', $id)
        ->first();
        
        $check=Shopping_cart::where('id_article', $id)
        ->where('id_member', \Auth::id())
        ->first();

        //return that data to the view
        return view('article_description', [
            'article' => $article,
            'check' => $check,
        ]);
    }

    /*
    *
    * Function to add an article to your cart
    *
    */
    public function buyArticle(){
        //Automatic transaction handled by laravel
        DB::transaction(function () {
            //add the vote
            Shopping_cart::insert([
                'id_article' => request('id_article'),
                'id_member' => \Auth::id(),
            ]);
        });
        //return to the lase page
       return redirect()->back();
    }

    /*
    *
    * Function that return the whole cart
    *
    */
    public function getArticlesCard(){
        $shopping_card=array();
        $shopping_cart_articles=Shopping_cart::where('id_member', \Auth::id())->get();
        //Get the articles corresponding to the IS's found in the 
        foreach($shopping_cart_articles as $article){
            array_push($shopping_card, $article->article);
        }
        //dump($shopping_card);
        //$articles_in_card=Article::where('id_article', $shopping_card->id_article);
        return view('shopping_card', [
            'shopping_card' => $shopping_card,
        ]);
    }

    /*
    *
    * Function that delete an article form the cart
    *
    */
    public function deleteArticleFromCard(){
        //Delete an article from the shopping card
        Shopping_cart::where([
            'id_article' => request('id_article'),
            'id_member' => \Auth::id(),
        ])->delete();
        //return to the lase page
       return redirect()->back();
    }
}
