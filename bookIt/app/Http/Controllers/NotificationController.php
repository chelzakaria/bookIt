<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function store($id)
    {
        $Notif = Notification::where('task_id', $id)->first();
        $Notif->seen = 1;
        $Notif->save();
        return redirect('tasks');
    }
}
