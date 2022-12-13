@extends('admin.layouts.main')
@section('title', 'Create')

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <!--end::Portlet-->
            <div class="col-md-6 col-4 align-self-center" style="color: red;font-size: xx-large;font-weight: 600;">
                <span id="sophut"></span> : <span id="sogiay"></span>
            </div>
            <!--begin::Portlet-->
            @foreach($question_type as $item)
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ $item->name }}
                        </h3>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="kt-form kt-form--label-right" action="{{ route('post.question') }}">
                    @csrf
                    <input type="hidden" value="{{ $time }}" name="time_exam">
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            @foreach($item->questions as $question)

                                <h3 class="kt-section__title">{{ $question->question_content }}</h3>
                                <div class="kt-radio-list">
                                    @foreach($question->answers as $answer)
                                        <label class="kt-radio">
                                            <input type="checkbox" name="answers[]" value="{{ $answer->id }}"> {{ $answer->answers }}
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
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!--end::Form-->
            </div>
            @endforeach
            <!--end::Portlet-->
        </div>
    </div>
@endsection
