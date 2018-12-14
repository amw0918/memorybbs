<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notifications=\Auth::user()->notifications()->paginate(20);

        \Auth::user()->markAsRead();
        return view('notifications.index',compact("notifications"));
    }
}
