<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return response()->json([
            'message' => 'Admin Dashboard Data',
            'stats' => [
                'users' => 100,
                'books' => 500
            ]
        ]);
    }
}
