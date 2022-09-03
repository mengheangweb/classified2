<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class NotificationController extends Controller
{
    public function list($userId){

        $user = User::findOrFail($userId);

        $notifications = $user->notifications;

        return response(compact('notifications'), 200);
    }
}
