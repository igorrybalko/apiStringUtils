<?php

namespace App\Helpers;

class AppHelper {
    public function checkApiKey($headerApiKey){
        $xApiKey = env('X_API_KEY_APP');

        return $xApiKey === $headerApiKey;
    }
}
