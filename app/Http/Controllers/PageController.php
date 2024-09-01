<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Helpers\AppHelper;

class PageController extends Controller {

    public function home() {

        $page = DB::table( 'pages' )->find( 1 );

        return view( 'pages.common.home', [
            'metaTitle' => $page->metaTitle,
            'title' => $page->title,
            'metaDescription' => $page->metaDescription,
            'content' => $page->content,
            'menu' => json_decode( $page->json ),
        ] );
    }

    public function getPageContent( Request $request, string $id ) {
        $appHelper = new AppHelper();

        $hApiKey = $request->header( 'x-api-key-app' );
        $validApiKey = $appHelper->checkApiKey( $hApiKey );

        if ( !$validApiKey ) {
            return response()->json( [ 'message' => 'unauthenticated' ], 401 );
        }

        $pageId = intval( $id );

        if ( !$pageId ) {
            return response()->json( [ 'message' => 'Error' ], 400 );
        }

        $page = DB::table( 'pages' )->find( $id );

        return response()->json( [
            'title' => $page->title,
            'subtitle' => $page->subtitle,
            'content' => $page->content,
            'additionalContent' => $page->additionalContent,
            'json' => $page->json
        ] );
    }

    public function jsonMinify() {
        $page = DB::table( 'pages' )->find( 2 );

        return view( 'pages.formatter.json-minify', [
            'metaTitle' => $page->metaTitle,
            'title' => $page->title,
            'subtitle' => $page->subtitle,
            'metaDescription' => $page->metaDescription,
            'canonical' => $page->canonical,
            'content' => $page->content,
            'json' => json_decode( $page->json ),
        ] );
    }
}
