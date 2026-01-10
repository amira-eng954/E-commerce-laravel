<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //


    public function notifications()
    {
           $notifications=Auth::user()->notifications()->get();
           $count=Auth::user()->unreadNotifications()->count();
           //echo $count;
           foreach($notifications as $r)
           {
            Carbon::parse($r->data['created_at'])->diffForHumans();
            echo $r->data['title'],$r->data['body'],
            
            Carbon::parse($r->data['created_at'])->diffForHumans();
           }
    }

     public function readnotifications($id)
    {
        $user=Auth::user();
           //$notifications=Auth::user()->notifications()->first();
           //$count=Auth::user()->unreadNotifications()->count();
           //dd( $count);
           $notification=$user->unreadNotification()->find($id);
          // $notification->rea
    }

}
