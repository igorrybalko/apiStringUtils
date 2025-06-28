<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Helpers\AppHelper;

class ArticleController extends Controller {

  
    function getItem($slug){
        $page = DB::table( 'articles' )->where('slug', $slug)->first();

        if(!isset($page)){
            return response()->view('errors.404', [], 404);
        }

        return view( 'articles.item', [
            'metaTitle' => $page->metaTitle,
            'title' => $page->title,
            'subtitle' => $page->subtitle,
            'metaDescription' => $page->metaDescription,
            'canonical' => '/article/' . $page->slug,
            'content' => $page->content,
            'img' => $page->img,
            'img_alt' => $page->img_alt,
        ] );
    }

    function getList(){
        $list = DB::table( 'articles' )->orderBy('id', 'desc')->paginate(6);
        return view( 'articles.list',  ['data' => $list->toArray()]);
    }
}
