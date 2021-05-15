<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function see(Request $request)
    {
    	auth()->user()->unreadNotifications->markAsRead();
    	return true;
    }
}
