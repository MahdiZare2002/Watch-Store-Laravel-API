<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function register(Request $request)
    {
        $user = auth()->user();

        if ($user) {
            User::updateUserInfo($user, $request);
            return Response()->json([
                'result' => true,
                'message' => "User updated successfully",
                'data' => [
                    'user' => new UserResource($user),
                ]
            ], status: 201);
        } else {
            return Response()->json([
                'result' => false,
                'message' => "User not found",
                'data' => [],
            ], status: 403);
        }
    }
}
