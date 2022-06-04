<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
   public function readAll()
   {
      $notifications = Notification::where('notifiable_id',auth()->user()->id)->get();

       foreach ($notifications as $notification){
          $notification->update(['read_at' => now()]);
      }
   }
}
