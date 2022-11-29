<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Information;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    public function profileDetail() {
        $user = auth()->user();
        $business = Information::where('is_active', 2)->get();
        $media = Information::where('is_active', 3)->get();
        $information = Information::where('is_active', 1)->get();

        return view('admin.users.profile', compact('user', 'business', 'media', 'information'));
    }

    public function updateProfile(Request $request) {
        $data = $request->all();
        $id = $request->id;
        $user = User::where('id', $id)->first();
        $user->update($data);

        return back()->with('success', 'Update Account successful');
    }
}
