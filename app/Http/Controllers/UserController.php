<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Business;
use App\Models\Information;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    public function profileDetail() {
        $user = auth()->user();
        $business = Branch::where('is_active', 2)->get();
        $media = Branch::where('is_active', 3)->get();
        $information = Branch::where('is_active', 1)->get();

//        $qrCode = QrCode::generate('Welcome to Makitweb', public_path('images/qrcode.svg') );

        return view('admin.users.profile', compact('user', 'business', 'media', 'information'));
    }

    public function updateProfile(Request $request) {
        $data = $request->all();
        $id = $request->id;
        $user = User::where('id', $id)->first();
        $user->update($data);

        return back()->with('success', 'Update Account successful');
    }

    public function download($file) {
        $file_name = public_path('qr-code/' . $file);

        return \Response::download($file_name);
    }
}
