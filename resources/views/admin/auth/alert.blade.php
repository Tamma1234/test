@extends('admin.layouts.alert')
@section('title', 'Create')

@section('content')
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v6 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid__item--center kt-grid kt-grid--ver kt-login__content" style="background-image: url({{ asset('assets/admin/images/bg-6.jpg') }});">

                <div class="kt-login__section">
                    <div class="kt-login__block">
                        <a href="{{ route('home') }}" style="padding: 24%">
                            <img src="{{ asset('assets/admin/images/logo-swb.jpg') }}" style="width: 200px; height: 200px; margin-bottom: 100px">
                        </a>
                        <h3 class="kt-login__title">Notice of account activation</h3>
                        <div class="kt-login__desc">
                            We have sent the account activation information via email, please check your email and activate your account via email.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
