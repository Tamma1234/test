@extends('admin.layouts.main')
@section('title', 'Create')

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet">
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-grid  kt-wizard-v2 kt-wizard-v2--white" id="kt_wizard_v2" data-ktwizard-state="step-first">
                    <div class="kt-grid__item kt-wizard-v2__aside">

                        <!--begin: Form Wizard Nav -->
                        <div class="kt-wizard-v2__nav">
                            <div class="kt-wizard-v2__nav-items kt-wizard-v2__nav-items--clickable">

                                <!--doc: Replace A tag with SPAN tag to disable the step link click -->
                                <div class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-icon">
                                            <i class="flaticon-responsive"></i>
                                        </div>
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                {{ $question_type->name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-datatable kt-datatable--default">
                                    <div class="kt-datatable__pager kt-datatable--paging-loaded">
                                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                                            <?php $i =1 ?>
                                            @foreach($question as $item)
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#kt_widget2_tab1_content" role="tab" aria-selected="false">
                                                        {{ $i++ }}
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Nav -->
                    </div>
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    {{ $question_type->name }}
                                </h3>
                            </div>
                            <div class="col-md-6 col-4 align-self-center" style="color: red;font-size: xx-large;font-weight: 600;">
                                <span id="sophut"></span> : <span id="sogiay"></span>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="kt-form kt-form--label-right" action="{{ route('post.question') }}">
                            @csrf
                            <input type="hidden" value="{{ $time }}" name="time_exam">
                            <div class="kt-portlet__body">
                                <div class="kt-section kt-section--first">
                                    @foreach($question as $item)
                                        <h3 class="kt-section__title">{{ $item->question_content }}</h3>
                                        <div class="kt-radio-list">
                                            @foreach($item->answers as $answer)
                                                <label class="kt-radio">
                                                    <input type="checkbox" name="answers[]" value="{{ $answer->id }}"> {{ $answer->question_content }}
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

                </div>
            </div>
        </div>
    </div>
@endsection
