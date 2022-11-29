<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Service\Service;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }

    public function register()
    {
        return view('admin.auth.register');
    }

    public function alert()
    {
        return view('admin.auth.alert');
    }

    public function postRegister(RegisterRequest $request)
    {
        $email = $request->email;
        $full_name = $request->full_name;
        $phone_number = $request->phone_number;
        $password = "123@123a";
        $hashPassword = Hash::make($password);
        $user = User::create([
            'full_name' => $full_name,
            'email' => $email,
            'phone_number' => $request->phone_number,
            'password' => $hashPassword,
            'is_active' => 0
        ]);
        $id = $user->id;
        $hashId = Hash::make($id .'swin');
        User::where('id', $id)->update(['hash_id' => $hashId]);

        Service::getSendMail()->sendPaymentMail($email, $full_name, $phone_number, $password);

        return redirect()->route('home')->with('success', 'Please check your email to activate your registered account');
    }

    public function confirm(Request $request) {
        $user = User::where('email', $request->email)->first();
        $user->update([
            'is_active' => 1
        ]);

        return view('admin.home.index');
    }
}
