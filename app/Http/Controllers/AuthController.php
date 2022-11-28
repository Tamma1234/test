<?php

namespace App\Http\Controllers;

use App\Models\Fu\Campus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        if(auth()->user() != "") {
            return redirect()->route('profile.detail');
        } else {
            return view('admin.home.index');
        }
    }
    public function login(Request $request) {
        if (auth()->user() != "") {
            return redirect()->route('profile.detail');
        } else {
                $email = $request->email;
                $user = User::where('email', $email)->first();
                if ($user->is_active == 1) {
                    $credentials = $request->validate([
                        'email' => ['required'],
                        'password' => ['required'],
                    ]);
                    // Ghi nhớ đăng nhập
                    $remenber = $request->remember_token;
                    /**
                     * Dùng Auth::attempt xem email,password có trong table users k
                     *  Nếu có thì dùng session để lưu, ghi nhớ thông tin login
                     * Sau đó chuyển hướng đến trang dasboard
                     */
                    if (auth()->attempt($credentials, $remenber)) {
                        $request->session()->regenerate();
                        return redirect()->route('profile.detail');
                    }

                    // Còn không sẽ trả về back và hiển thị lỗi email
                    return back()->withErrors([
                        'email' => 'The provided credentials do not match our records.',
                    ]);
                }  else {
                    return view('admin.auth.alert');
                }

        }
    }

    /**
     * edit.
     *
     * @return login
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}