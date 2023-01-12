@extends('admin.layouts.main')
@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-wizard-v4" id="kt_wizard_v4" data-ktwizard-state="step-first">

        <!--begin: Form Wizard Nav -->
        <div class="kt-wizard-v4__nav">
            <div class="kt-wizard-v4__nav-items kt-wizard-v4__nav-items--clickable">
                <!--doc: Replace A tag with SPAN tag to disable the step link click -->
                <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                    <div class="kt-wizard-v4__nav-body">

                        <div class="kt-wizard-v4__nav-label">
                            <div class="kt-wizard-v4__nav-label-title">
                                 Account Test
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end: Form Wizard Nav -->
        <div class="kt-portlet">
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-grid">
                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

                        <!--begin: Form Wizard Form-->
                        <form class="kt-form" id="kt_form">

                            <!--begin: Form Wizard Step 1-->
                            <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                <div class="kt-heading kt-heading--md">Enter your Account Details</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v4__form">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" disabled class="form-control" name="full_name" placeholder="First Name" value="{{ $user->full_name }}">
                                            <span class="form-text text-muted">Please enter your full name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" disabled class="form-control" name="lname" placeholder="Last Name" value="{{ $user->email }}">
                                            <span class="form-text text-muted">Please enter your email.</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="tel" disabled class="form-control" name="phone_number" placeholder="phone" value="{{ $user->phone_number }}">
                                                    <span class="form-text text-muted">Please enter your phone number.</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="address" disabled class="form-control" name="address" placeholder="Email" value="{{ $user->address }}">
                                                    <span class="form-text text-muted">Please enter your email address.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 1-->

                            <!--begin: Form Wizard Step 2-->

                            <!--end: Form Wizard Step 4-->

                            <!--begin: Form Actions -->
                            <div class="kt-form__actions">
                                @if($user->time_exam == "")
                                <a class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" style="color: white" href="{{ route('question.start') }}">
                                    Bắt Đầu Thi
                                </a>
                                @else
                                    <a class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" style="color: white" href="#">
                                        Hoàn Thành
                                    </a>
                                @endif
                            </div>

                            <!--end: Form Actions -->
                        </form>

                        <!--end: Form Wizard Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
