<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Brand;
use App\Models\Business;
use App\Models\District;
use App\Models\Districts;
use App\Models\Information;
use App\Models\Media;
use App\Models\People;
use App\Models\Province;
use App\Models\School;
use App\Models\User;
use App\Models\Wards;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    public function profileDetail()
    {
        $user = auth()->user();
        $brand = Brand::all();
        $id = $user->id;
        $people = People::find($id);
        $date = $people->dob;
        $time = strtotime($date);
        $format = date("d/m/Y", $time);
        $business = Branch::where('is_active', 2)->get();
        $media = Branch::where('is_active', 3)->get();
        $information = Branch::where('is_active', 1)->get();

//        $qrCode = QrCode::generate('Welcome to Makitweb', public_path('images/qrcode.svg') );

        return view('admin.users.profile', compact('user', 'business', 'media',
            'information', 'people', 'format', 'brand'));
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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listProfile() {
        $user = auth()->user();
        $schools = School::all();
        $provinces = Province::all();
        $business = Branch::where('is_active', 2)->get();
        $media = Branch::where('is_active', 3)->get();
        $information = Branch::where('is_active', 1)->get();

        return view('admin.users.people', compact('user', 'media', 'business',
            'information', 'schools', 'provinces'));
    }

    /**
     * @param Request $request
     * @return string
     */
    public function selectSchool(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = "";
            if ($data['action'] == 'city') {
                $districts = Districts::where('province_id', $data['id'])->orderby('id', 'ASC')->get();
                foreach ($districts as $item) {
                    $output.='<option value="'.$item->id.'">'.$item->name.'</option>';
                }
            } else {
                $district = Districts::find($data['id']);
                $id = $district->province->id;
                $schools = School::where('province_id', $id)->orderby('id', 'ASC')->get();
                foreach ($schools as $item) {
                    $output.='<option value="'.$item->id.'">'.$item->school_name.'</option>';
                }
            }
        }

        return $output;
    }
}
