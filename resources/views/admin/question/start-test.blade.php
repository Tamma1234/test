@extends('admin.layouts.master')
@section('title', 'Create')

@section('content')

    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Bài Thi </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Tổng số câu hỏi </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>'
                        <a href="" class="kt-subheader__breadcrumbs-link" id="totalQuestion"> 0 </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            {{ $totalQuestion }} </a>


                        <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                    </div>
                </div>
                <div class="kt-subheader__toolbar">
                    <div class="kt-subheader__wrapper">
                        <div class="col-md-12 col-4 align-self-center"
                             style="color: red;font-size: xx-large;font-weight: 600;margin-left: 40px">
                            <span id="sophut"></span> : <span id="sogiay"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <!--begin::Portlet-->
            <form class="kt-form kt-form--label-right" action="{{ route('post.question') }}" id="myForm" method="post">
                @csrf
                @foreach($question_type as $item)
                        <?php $questions = \App\Models\Questions::where('question_type', $item->id)->where('parent_id', 0)->get();
                        ?>
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title" style="color: #6a5bf1; font-weight: 600">
                                    {{ $item->name }}
                                </h3>
                            </div>
                        </div>
                        <input type="hidden" value="{{ $user->time_exam }}" name="time_exam" id="time_start">
                        <div class="kt-portlet__body" id="question">
                            @foreach($questions as $question)
                                <div class="kt-section kt-section--first">
                                    <h3 class="kt-section__title" id="{{ $question->id }}">{{ $question->question_content }}</h3>
                                    <div class="kt-radio-list">
                                        @foreach($question->answers as $answer)
                                            <label class="kt-radio">
                                                <input id="{{ $answer->id }}" onclick="chooseAnswers({{$answer->id}})" type="radio"
                                                       name="answers[ {{ $question->id }} ]"
                                                       value="{{ $answer->id }}"> {{ $answer->question_content }}
                                                <span></span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--end::Form-->
                    </div>
                @endforeach
                <div class="kt-portlet__foot" style="margin-bottom: 20px">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-success">Submit</button>
{{--                                <a href="{{ route('question.test') }}" type="button"--}}
{{--                                   class="btn btn-secondary">Cancel</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!--end::Portlet-->
        </div>
    </div>
@endsection
@section('script')
    <script>
            // let questions;
            // function chooseAnswers(id) {
            //     var question = $('#question div.kt-section');
            //     var arr = [];
            //     question.each(function (k, v) {
            //         let id = $(v).find('h3').attr('id');
            //         let da = $(v).find('input[type="radio"]:checked').attr('id');
            //        arr.push(da);
            //     })
            //     console.log(arr.length);
            //     // const result = arr.filter((value, index) => {
            //     //     console.log(value.length);
            //     // })
            //
            // }


    </script>
@endsection
