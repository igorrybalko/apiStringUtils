<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\AppHelper;
use ErrorException;
use Exception;

class FilesController extends Controller
{
    public function getFileForFormat(Request $request){

        $appHelper = new AppHelper();

        $hApiKey = $request->header('x-api-key-app');
        $validApiKey = $appHelper->checkApiKey($hApiKey);

        if(!$validApiKey){
            return response()->json(['message' => 'unauthenticated'], 401);
        }

        $url = $request->input('url');
        $url = trim($url);

        if(!$url){
            return response()->json(['message' => 'URL empty'], 400);
        }

        $isHttps = str_starts_with($url, 'https://');
        if(!$isHttps) {
            return response()->json(['message' => 'URL should start with https'], 400);
        }


        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec($curl_handle);
        $info = curl_getinfo($curl_handle);

        if (curl_errno($curl_handle)) {
            $error_msg = curl_error($curl_handle);
        }
        
        curl_close($curl_handle);

        if (isset($error_msg) || substr($info['http_code'],0,1) !== '2') {

            return response()->json(['message' => 'Failed to retrieve data'], 400);
        }
        
        return response()->json(['content' => $content]);

    }
}
