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
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link kt-font-danger font-weight-bold"
                           style="font-size: 1.5rem" id="totalQuestion"> 0 </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link kt-font-danger font-weight-bold"
                           style="font-size: 1.5rem">
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
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
                <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">
                    <!--begin:: Widgets/Notifications-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                                    @foreach($question_type as $item)
                                        <li class="nav-item" style="margin-top: 15px">
                                            <a class="nav-link {{ $item->id == 1 ? "active" : "" }}"
                                               onclick="chooseQuestion({{ $item->id }})" id="{{ $item->id }}"
                                               data-toggle="tab" href="#kt_widget6_tab{{ $item->id }}_content"
                                               role="tab">
                                                Phần {{ $item->id }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                    <div class="col-lg-12 tab-content">
                        <!--begin::Portlet-->
                        <form class="kt-form kt-form--label-right" action="{{ route('post.question') }}"
                              method="post">
                            @csrf
                            @foreach($studentUser as $student)
                                <div id="myForm">
                                    @foreach($question_type as $item)
                                            <?php $questions = \App\Models\Questions::where('question_type', $item->id)->where('parent_id', 0)->get();
                                            ?>
                                        <div class="kt-portlet tab-pane {{ $item->id == 1 ? "active" :"" }}"
                                             id="kt_widget6_tab{{ $item->id }}_content">
                                            <div class="kt-portlet__head">
                                                <div class="kt-portlet__head-label">
                                                    <h3 class="kt-portlet__head-title"
                                                        style="color: #6a5bf1; font-weight: 600">
                                                        {{ $item->name }}
                                                    </h3>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{ $user->time_exam }}" name="time_exam"
                                                   id="time_start">
                                            <div class="kt-portlet__body" id="question">
                                                @foreach($questions as $question)
                                                    <div class="kt-section kt-section--first">
                                                        <h3 class="kt-section__title"
                                                            id="{{ $question->id }}">{{ $question->question_content }}</h3>
                                                        <div class="kt-radio-list">
                                                            @foreach($question->answers as $answer)
                                                                <label class="kt-radio">
                                                                    <input {{ $student->answers_id == $answer->id ? "checked" : "" }}> {{ $answer->question_content }}
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
                                </div>
                            @endforeach
                            <div class="kt-portlet__foot" style="margin-bottom: 20px">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-success">Kết thúc bài thi</button>
                                            {{--                                <a href="{{ route('question.test') }}" type="button"--}}
                                            {{--                                   class="btn btn-secondary">Cancel</a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let questions;

        function chooseAnswers(id) {
            // var question_id = $(this).data(id);
            var question_id = $('input[name="answers[${id}]"]').val();
            console.log(question_id);
            {{--var question = $('#question div.kt-section');--}}
            {{--var arr = [];--}}
            {{--question.each(function (k, v) {--}}
            {{--    let id = $(v).find('h3').attr('id');--}}
            {{--    let da = $(v).find('input[type="radio"]:checked').attr('id');--}}
            {{--    arr.push(da);--}}
            {{--})--}}
            {{--var result = arr.filter(function (word) {--}}
            {{--    return word != undefined;--}}
            {{--});--}}

            {{--$('#totalQuestion').html(result.length);--}}
            {{--var _token = $("input[name='_token']").val()--}}
            {{--$.ajax({--}}
            {{--    url: "{{ route('post.answer') }}",--}}
            {{--    method: 'POST',--}}
            {{--    data: {id: id, question_id: question_id, _token: _token},--}}
            {{--    success: function (data) {--}}

            {{--    }--}}
            {{--});--}}
        }

        function chooseQuestion(id) {
            $.ajax({
                url: "{{ route('list.answer') }}/" + id,
                method: 'GET',
                data: {id: id},
                success: function (data) {
                    $('#myForm').html(data);
                }
            });
        }

        $(document).ready(function () {
            let li = $('.nav-item');
            li.each(function (k, v) {
                let active = $(v).find('a').attr('class');
                if (active == "nav-link active") {
                    var active_id = $(v).find('a').attr('id');
                    $.ajax({
                        url: "{{ route('list.answer') }}/" + active_id,
                        method: 'GET',
                        data: {active_id: active_id},
                        success: function (data) {
                            $('#myForm').html(data);
                        }
                    });
                }
            })
        })
    </script>
@endsection
