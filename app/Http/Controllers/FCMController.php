<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class FCMController extends Controller
{
    public function index(Request $request)
    {
        $user = User::findOrFail($request['user_id']);
        $user->fcm_token = $request['fcm_token'];
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'User token updated successfully'
        ]);
    }

    public function admin(Request $request)
    {
        $admin = Admin::findOrFail($request['admin_id']);
        $admin->fcm_token = $request['fcm_token'];
        $admin->save();

        return response()->json([
            'success' => true,
            'message' => 'Admin token updated successfully'
        ]);
    }
}
