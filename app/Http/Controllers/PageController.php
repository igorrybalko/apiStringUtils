<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Helpers\AppHelper;

class PageController extends Controller {

    private function renderContent( $id, $tpl = 'withExample' ) {

        $similar = [];

        $page = DB::table( 'pages' )->find( $id );
        
        if($page->similar){
            $simIds = explode(",", $page->similar);
            $similar = DB::table( 'main_menu' )->whereIn('id', $simIds)->get()->toArray();
        }

        return view( 'pages.' . $tpl, [
            'metaTitle' => $page->metaTitle,
            'title' => $page->title,
            'subtitle' => $page->subtitle,
            'metaDescription' => $page->metaDescription,
            'canonical' => $page->canonical,
            'content' => $page->content,
            'json' => json_decode( $page->json ),
            'similar' => $similar,
            'viewTag' => $page->viewTag,
        ] );
    }

    public function home() {

        $page = DB::table( 'pages' )->find( 1 );
        $menu = DB::table( 'main_menu' )->get();

        return view( 'pages.common.home', [
            'metaTitle' => $page->metaTitle,
            'title' => $page->title,
            'subtitle' => $page->subtitle,
            'metaDescription' => $page->metaDescription,
            'content' => $page->content,
            'menu' => $menu,
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
        return $this->renderContent( 2 );
    }

    public function base64Encode() {
        return $this->renderContent( 3 );
    }

    public function base64Decode() {
        return $this->renderContent( 4 );
    }

    public function imgToBase64() {
        return $this->renderContent( 17, 'withoutExample' );
    }

    public function md5Generator() {
        return $this->renderContent( 5 );
    }

    public function jsonStringify() {
        return $this->renderContent( 6 );
    }

    public function sha256Generator() {
        return $this->renderContent( 7 );
    }

    public function htpasswd() {
        return $this->renderContent( 13, 'withoutExample' );
    }

    public function donate() {
        return $this->renderContent( 8, 'simple' );
    }

    public function privacyPolicy() {
        return $this->renderContent( 9, 'simple' );
    }

    public function contacts() {
        return $this->renderContent( 14, 'simple' );
    }

    public function translitUrl() {
        return $this->renderContent( 10, 'withoutExample' );
    }

    public function urlEncode() {
        return $this->renderContent( 11 );
    }

    public function urlDecode() {
        return $this->renderContent( 12 );
    }

    public function stripTags() {
        return $this->renderContent( 15, 'simple' );
    }

    public function caseConverter() {
        return $this->renderContent( 18, 'withoutExample' );
    }

    public function wordCounter() {
        return $this->renderContent( 19, 'withoutExample' );
    }
}
