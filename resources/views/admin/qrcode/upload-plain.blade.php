@extends('admin.layouts.main')
@section('title', 'Create')

@section('content')
    @include('admin.templates.content-header', ['name' => 'Swinburne', 'key' => 'Queries', 'value' => "", 'value2' => ""])
    @if($user->file_plain == "")
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Upload File Plain
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form class="kt-form" action="{{ route('post.upload.plain', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="kt-portlet__body">
                <div class="form-group">
                    <label>File Browser</label>
                    <div></div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file_plain">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @error('files')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('qrcode.list') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
    @else
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Image plain
                    </h3>
                </div>
            </div>
            <div class="visible-print text-center" style="text-align: center">
                <h1>Plain Name: {{ $user->user_login }}</h1>
                <iframe src="{{ asset('storage/file_plain/'.$user->file_plain) }}" style=" height: 600px; width: 80%"></iframe>

            </div>
            <!--begin::Form-->
            <!--end::Form-->
        </div>
    @endif
@endsection
