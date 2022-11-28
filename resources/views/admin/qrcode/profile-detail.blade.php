@extends('admin.layouts.main')
@section('title', 'Create')

@section('content')
    @include('admin.templates.content-header', ['name' => 'Swinburne', 'key' => 'Queries', 'value' => "", 'value2' => ""])
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::App-->
        <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

            <!--Begin:: App Aside Mobile Toggle-->
            <!--End:: App Aside-->
            <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">Account Information</h3>
                                </div>
                            </div>
                            <form class="kt-form kt-form--label-right">
                                <div class="kt-portlet__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Full name:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text" disabled
                                                           value="{{ $user->user_surname .' '. $user->user_middlename .' '. $user->user_givenname }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">User code:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text" disabled
                                                           value="{{ $user->user_code }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">User code AU:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text" disabled
                                                           value="{{ $user->user_code_au }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">DOB:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text" disabled
                                                           value="{{ $user->user_DOB }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Gender:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    @if($user->gender == 1)
                                                        <input class="form-control" disabled type="text" value="Male">
                                                    @else
                                                        <input class="form-control" disabled type="text" value="Female">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Address:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text" disabled
                                                           value="{{ $user->user_address }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Plain:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <a href="{{ route('upload.plain', ['id' => $user->id]) }}"> <i
                                                            class="flaticon-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Transcript:</label>
                                                <div class="col-lg-9 col-xl-6">
{{--                                                    @if($user->file_plain != "")--}}
                                                        <a href="{{ route('upload.transcript', ['id' => $user->id]) }}"> <i
                                                                class="flaticon-eye"></i></a>
{{--                                                    @endif--}}
{{--                                                    <a href="{{ route('upload.plain', ['id' => $user->id] ) }}"> <i class="flaticon-attachment"></i></a>--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Study Status:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" disabled type="text" value="Male">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--End:: App Content-->
        </div>

        <!--End::App-->
    </div>
@endsection



