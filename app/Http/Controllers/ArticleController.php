<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Helpers\AppHelper;

class ArticleController extends Controller {

  
    function getItem($slug){
        $page = DB::table( 'articles' )->where('slug', $slug)->first();
        // echo '<pre>';
        // var_dump($article);
        // echo '</pre>';

        if(!isset($page)){
            return response()->view('errors.404', [], 404);
        }

        return view( 'articles.item', [
            'metaTitle' => $page->metaTitle,
            'title' => $page->title,
            'subtitle' => $page->subtitle,
            'metaDescription' => $page->metaDescription,
            'canonical' => '/articles/' . $page->slug,
            'content' => $page->content,
        ] );
    }

    function getList(){
        $list = DB::table( 'articles' )->orderBy('id', 'desc')->paginate(3);
        // echo '<pre>';
        // var_dump($article);
        // echo '</pre>'


       return view( 'articles.list',  ['data' => $list->toArray()]);
    }
}
