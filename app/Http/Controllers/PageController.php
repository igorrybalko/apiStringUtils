<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller {

    public function home() {

        $page = DB::table( 'pages' )->find( 1 );

        return view( 'pages.common.home', [
            'metaTitle' => $page->metaTitle,
            'title' => $page->title,
            'metaDescription' => $page->metaDescription,
            'content' => $page->content,
            'menu' => json_decode($page->json),
        ] );
    }
}
