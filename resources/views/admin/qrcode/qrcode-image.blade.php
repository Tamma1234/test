
@extends('admin.layouts.main')
@section('title', 'Create')

@section('content')

        <div class="kt-portlet">
            <!--begin::Form-->
            <div class="visible-print text-center" style="text-align: center">

                @if($user->qrcode != null)
                    <h1>Qrcode Name : {{$user->user_login}}</h1>
                    <div>
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(400)
                            ->generate('http://127.0.0.1:8000/profile/'.$user->qrcode)) !!} ">
                        <a href="{{ route('download-prcode', ['file' => $user->qrcode]) }}" class="btn btn-brand btn-elevate btn-icon-sm">Download</a>
                    </div>

                @else
                    <img src="{{ asset('assets/admin/images/no-image.jpg') }}">
                @endif

            </div>
            <!--end::Form-->
        </div>

@endsection
