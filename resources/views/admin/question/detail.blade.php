@extends('admin.layouts.main')
@section('title', 'Create')

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <!--end::Portlet-->

            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Form Label Aligment
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            @foreach($question as $item)
                                <h3 class="kt-section__title">{{ $item->question_content }}</h3>
                                    <div class="kt-radio-list">
                                        @foreach($item->answers as $answer)
                                        <label class="kt-radio">
                                            <input type="radio" name="radio1"> {{ $answer->answers }}
                                            <span></span>
                                        </label>
                                        @endforeach
                                    </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <button type="reset" class="btn btn-success">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>
@endsection
