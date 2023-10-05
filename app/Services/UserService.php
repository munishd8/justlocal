<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\PersonalAccessToken;


class UserService  extends Controller
{


    public function CheckUserToken()
    {
        $token = null;
        $headers = getallheaders();

        if (isset($headers['Authorization'])) {
            $authorization =  $headers['Authorization'];
        } elseif (isset($headers['authorization'])) {
            $authorization =   $headers['authorization'];
        } else {
            $authorization =   null;
        }

        if (empty($authorization)) {
            return null;
        }
        $token = str_replace('Bearer ', '', $authorization);
        $findToken =  PersonalAccessToken::findToken($token);
        if (!$findToken) {
            return null;
        }
        return $findToken->tokenable_id;
    }


}
