@extends('admin.layouts.master')
@section('title', 'choose offices')
@section('content')
    <div class="page-wrapper-main">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Swinburne VN</h4>
                    <h6 class="card-subtitle">Add<code>.table-striped</code>for borders on all sides of the table and
                        cells.
                    </h6>
                    <div class="table-responsive" style="margin-top: 100px">
                        <h3 class="text-themecolor m-b-0 m-t-0">Choose Offices</h3>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                @can('office_HN')
                                    <th>CAMPUS NAME</th>
                                @endcan
                                <th>OFFICE NAME</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($offices as $office)
                                <?php
                                $campusName = $campus->find($office->id);
                                ?>
                                    <tr>
                                        <td>{{$campusName->campus_name}}</td>
                                        <td>{{$office->name}}</td>
                                        <td><span class="label label-light-info"> <a
                                                    href="{{ route('dashboard') }}">continue</a></span></td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
