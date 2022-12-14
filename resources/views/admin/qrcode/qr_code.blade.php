@extends('admin.layouts.main')
@section('title', 'Create')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Table User Options
                </h3>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <a href="{{route('users.create')}}" class="btn pull-right hidden-sm-down btn-success"><i
                        class="mdi mdi-plus-circle"></i> Create</a>
            </div>
        </div>
        <div class="kt-portlet__body">
            <!--begin::Section-->
            <div class="kt-section">
                <div class="kt-section__content">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Middlename</th>
                            <th>Givenname</th>
                            <th>Email</th>
                            <th class="text-nowrap">Qrcode</th>
                            <th class="text-nowrap">Plain</th>
                            <th class="text-nowrap">Transcript</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->user_login}}</td>
                                <td>{{$user->user_middlename}}</td>
                                <td>{{$user->user_givenname}}</td>
                                <td>{{$user->user_email}}</td>
                                <td class="text-nowrap">
                                    @if($user->qrcode != "")
                                        <a href="{{ route('profile.image', ['id' => $user->id]) }}"> <i
                                                class="flaticon-eye"></i></a>
                                    @endif
                                    <a href="{{ route('upload.plain', ['id' => $user->id] ) }}"> <i class="flaticon-attachment"></i></a>
                                </td>
                                <td class="text-nowrap">
                                    @if($user->file_plain != "")
                                        <a href="{{ route('upload.plain', ['id' => $user->id]) }}"> <i
                                                class="flaticon-eye"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('upload.plain', ['id' => $user->id] )}}"> <i class="flaticon-attachment"></i></a>
                                </td>
                                <td class="text-nowrap">
                                    @if($user->file_transcript != "")
                                        <a href="{{ route('upload.transcript', ['id' => $user->id]) }}"> <i class="flaticon-eye"></i></a>
                                    @endif
                                    <a href="{{ route('upload.transcript', ['id' => $user->id]) }}"> <i class="flaticon-attachment"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"
                         style="margin-left: 450px">
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>

            <!--end::Section-->
        </div>
    </div>
@endsection
