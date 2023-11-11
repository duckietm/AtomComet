<?php

namespace App\Http\Controllers;

use App\Http\Resources\OnlineUserCountResource;
use App\Http\Resources\OnlineUsersResource;
use App\Http\Resources\UserResource;
use App\Models\User;

class HotelApiController extends Controller
{
    public function fetchUser($username, $columns = ['username', 'motto', 'look']): UserResource
    {
        return new UserResource(User::select($columns)->where('username', '=', $username));
    }

    public function onlineUsers($columns = ['username', 'motto', 'look']): OnlineUsersResource
    {
        return new OnlineUsersResource(User::select($columns)
            ->where('online', '=', '1')
            ->inRandomOrder());
    }

    public function onlineUserCount($columns = ['username', 'motto', 'look']): OnlineUserCountResource
    {
        return new OnlineUserCountResource(User::select($columns)->where('online', '=', '1'));
    }
}