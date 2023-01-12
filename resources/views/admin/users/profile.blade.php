@extends('admin.layouts.main')
@section('title', 'Create')

@section('content')
    @include('admin.templates.content-header', ['name' => 'Swinburne', 'key' => 'Profile', 'value' => "", 'value2' => ""])
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::App-->
        <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
            <!--Begin:: App Aside Mobile Toggle-->
            <!--End:: App Aside-->
            <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">

                <!--Begin::Portlet-->
                <div class="kt-portlet kt-portlet--height-fluid-">
                    <div class="kt-portlet__head kt-portlet__head--noborder">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <!--begin::Widget -->
                        <div class="kt-widget kt-widget--user-profile-2">
                            <div class="kt-widget__head">
                                <div class="kt-widget__media" style="margin: auto">
                                    {!! QrCode::format('svg')->merge('qr-code/'.$user->path , 0.3, true)->size(200)->generate(route('profile.detail', ['hash' => $user->hash_id])); !!}
                                    <div class="kt-section kt-section--last" style="padding: 20px; text-align: center">
                                        <a href="{{ route('profile.download', ['file' => $user->path]) }}"
                                           class="btn btn-info" target="_blank"
                                           download="{{ $user->path }}">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--End:: Portlet-->
            </div>
            <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                <div class="row">
                    <div class="col">

                        <!--Begin::Section-->
                        <div class="kt-portlet">
                            <div class="kt-portlet__body kt-portlet__body--fit">
                                <div class="kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                Swinburne Hà Nội - Swinburne Hà Nội
                                            </h3>
                                        </div>
                                    </div>

                                </div>
                                <div class="row row-no-padding row-col-separator-xl">

                                    <div class="col-md-12 col-lg-12 col-xl-4">

                                        <!--begin:: Widgets/Stats2-1 -->
                                        <div class="kt-widget1">
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Last Name:</h3>
                                                </div>
                                                <span class="kt-kt-widget12__desc">{{ $people->last_name }}</span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Address HKTT:</h3>
                                                </div>
                                                <input type="textarea" class="form__control"
                                                       value="{{ $people->paddress }}">
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Post office address:</h3>
                                                </div>
                                                <input type="text" class="form__control"
                                                       value="{{ $people->paddress }}">
                                            </div>
                                            <?php
                                            $date = $people->dob;
                                            if ($date) {
                                                $time = strtotime($date);
                                                $format = date("d/m/Y", $time);
                                            } else {
                                                $format = "";
                                            }

                                            ?>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Date of birth:</h3>
                                                </div>

                                                <span class="kt-kt-widget12__desc">{{ $format }}</span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Studying aspiration:</h3>
                                                </div>
                                                <span class="kt-kt-widget12__desc"></span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Interview date:</h3>
                                                </div>
                                                <span
                                                    class="kt-kt-widget12__desc">{{ date('d/m/Y', strtotime($people->date_view))  }}</span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Year Intake:</h3>
                                                </div>
                                                <select class="form-control" id="exampleSelects" style="width: 30%">
                                                    <option>Select</option>
                                                    <option>Summer</option>
                                                    <option>Spring</option>
                                                    <option>Fall</option>
                                                </select>
                                                <select class="form-control" id="exampleSelects" style="width: 30%">
                                                    <option>Select</option>
                                                    <option>2018</option>
                                                    <option>2019</option>
                                                    <option>2020</option>
                                                    <option>2021</option>
                                                    <option>2022</option>
                                                    <option>2023</option>
                                                </select>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">User code:</h3>
                                                </div>
                                                <span
                                                    class="kt-kt-widget12__desc"></span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Ielts:</h3>
                                                </div>
                                                <span
                                                    class="kt-kt-widget12__desc">{{ $people->ielts }}</span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">CMT:</h3>
                                                </div>
                                                <span
                                                    class="kt-kt-widget12__desc">{{ $people->cmt }}</span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Created Date:</h3>
                                                </div>
                                                <span
                                                    class="kt-kt-widget12__desc">{{ $people->created_date }}</span>
                                            </div>
                                        </div>
                                        <!--end:: Widgets/Stats2-1 -->
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-4">

                                        <!--begin:: Widgets/Stats2-2 -->
                                        <div class="kt-widget1">
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">First Name:</h3>
                                                </div>
                                                <span class="kt-kt-widget12__desc">{{ $people->first_name }}</span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Telesale:</h3>
                                                </div>
                                                <span class="kt-kt-widget12__desc">{{ $people->updated_by }}</span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Email phụ huynh 1:</h3>
                                                </div>
                                                <span class="kt-kt-widget12__desc"></span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">School:</h3>
                                                </div>
                                                <span class="kt-kt-widget12__desc">{{ $people->pschool_name }}</span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Recruitment campain:</h3>
                                                </div>
                                                <span class="kt-kt-widget12__desc">2023</span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Exemptions GC:</h3>
                                                </div>
                                                <select class="form-control" id="exampleSelects" style="width: 30%">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Major Intake:</h3>
                                                </div>
                                                <select class="form-control" id="exampleSelects" style="width: 30%">
                                                    <option>Select</option>
                                                    <option>Summer</option>
                                                    <option>Spring</option>
                                                    <option>Fall</option>
                                                </select>
                                                <select class="form-control" id="exampleSelects" style="width: 30%">
                                                    <option>Select</option>
                                                    <option>2018</option>
                                                    <option>2019</option>
                                                    <option>2020</option>
                                                    <option>2021</option>
                                                    <option>2022</option>
                                                    <option>2023</option>
                                                </select>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Comming year:</h3>
                                                </div>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">GPA:</h3>
                                                </div>
                                                <span
                                                    class="kt-kt-widget12__desc">{{ $people->gpa }}</span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Date of issue:</h3>
                                                </div>
                                                <span
                                                    class="kt-kt-widget12__desc"></span>
                                            </div>
                                        </div>
                                        <!--end:: Widgets/Stats2-2 -->
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-4">

                                        <!--begin:: Widgets/Stats2-3 -->
                                        <div class="kt-widget1">
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Gender:</h3>

                                                </div>
                                                @if($people->gender == 1)
                                                    <span class="kt-kt-widget12__desc">Male</span>
                                                @else
                                                    <span class="kt-kt-widget12__desc">FeMale</span>
                                                @endif
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Email:</h3>
                                                </div>
                                                <span class="kt-kt-widget12__desc">{{ $people->pemail }}</span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Email phụ huynh 2:</h3>
                                                </div>
                                                <span class="kt-kt-widget12__desc"></span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Graduated year:</h3>
                                                </div>
                                                <span class="kt-kt-widget12__desc">{{ $people->graduated_year }}</span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Course:</h3>
                                                </div>
                                                <select class="form-control" id="exampleSelects" style="width: 60%">
                                                    <option>Select</option>
                                                    @foreach($brand as $item)
                                                        <option {{ $people->pbrand_id == $item->id ? "selected" : "" }}
                                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">English qualify:</h3>
                                                </div>
                                                <select class="form-control" id="exampleSelects" style="width: 30%">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Grade:</h3>
                                                </div>
                                                <span class="kt-kt-widget12__desc"></span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Scholarship:</h3>
                                                </div>
                                                <span class="kt-kt-widget12__desc"></span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Place of issue:</h3>
                                                </div>
                                                <span class="kt-kt-widget12__desc"></span>
                                            </div>
                                            <div class="kt-widget1__item">
                                                <div class="kt-widget1__info">
                                                    <h3 class="kt-widget1__title">Updated by:</h3>
                                                </div>
                                                <span class="kt-kt-widget12__desc"></span>
                                            </div>
                                        </div>
                                        <!--end:: Widgets/Stats2-3 -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--End::Section-->
                    </div>
                </div>

            </div>
            <!--End:: App Content-->
        </div>

        <!--End::App-->
    </div>

@endsection


