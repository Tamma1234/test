

@extends('admin.layouts.main')
@section('title', 'Create')

@section('content')

    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    List Quiz Options
                </h3>
            </div>

        </div>
        <div class="kt-portlet__body">
            <!--begin::Section-->
            <div class="kt-section">
                <div class="kt-section__content">
                    <div class="row">
                        @foreach($question_type as $item)
                        <div class="col-lg-4">
                            <div class="kt-portlet kt-callout kt-callout--warning kt-callout--diagonal-bg">
                                <div class="kt-portlet__body">
                                    <div class="kt-callout__body">
                                        <div class="kt-callout__content">
                                            <h3 class="kt-callout__title">{{ $item->name }}</h3>
                                        </div>
                                        <div class="kt-callout__action">
                                            <a href="{{ route('question.detail', ['type' => $item->id]) }}" class="btn btn-custom btn-bold btn-upper btn-font-sm  btn-warning">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <!--end::Section-->
        </div>
    </div>
@endsection
