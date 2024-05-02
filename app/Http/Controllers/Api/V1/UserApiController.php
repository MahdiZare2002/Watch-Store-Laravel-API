<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function register(Request $request)
    {
        $user = auth()->user();

        if($user) {
            User::updateUserInfo($user,$request);
        }
    }
}
