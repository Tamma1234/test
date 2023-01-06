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
            {{--            <div class="kt-grid__item kt-grid__item--fluid kt-app__content">--}}
            {{--                <div class="row">--}}
            {{--                    <div class="col-xl-12">--}}
            {{--                        <div class="kt-portlet">--}}
            {{--                            <div class="kt-portlet__head">--}}
            {{--                                <div class="kt-portlet__head-label">--}}
            {{--                                    <h3 class="kt-portlet__head-title">Account Information</h3>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                            <form class="kt-form kt-form--label-right"--}}
            {{--                                  action="{{ route('update.profile', ['id' => $user->id]) }}" method="post"--}}
            {{--                                  enctype="multipart/form-data">--}}
            {{--                                @csrf--}}
            {{--                                <input type="hidden" value="{{ $user->id }}" name="id">--}}
            {{--                                <div class="kt-portlet__body">--}}
            {{--                                    <div class="kt-section kt-section--first">--}}
            {{--                                        <div class="kt-section__body">--}}
            {{--                                            <div></div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-xl-3 col-lg-3 col-form-label">Họ và tên:</label>--}}
            {{--                                                <div class="col-lg-9 col-xl-6">--}}
            {{--                                                    <input class="form-control" type="text"--}}
            {{--                                                           value="{{ $user->full_name }}" name="full_name">--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-xl-3 col-lg-3 col-form-label">Email:</label>--}}
            {{--                                                <div class="col-lg-9 col-xl-6">--}}
            {{--                                                    <input class="form-control" type="text" disabled--}}
            {{--                                                           value="{{ $user->email }}" name="email">--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-xl-3 col-lg-3 col-form-label">Số điện thoại:</label>--}}
            {{--                                                <div class="col-lg-9 col-xl-6">--}}
            {{--                                                    <input class="form-control" type="text" name="phone_number"--}}
            {{--                                                           value="{{ $user->phone_number }}">--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-xl-3 col-lg-3 col-form-label">Địa chỉ:</label>--}}
            {{--                                                <div class="col-lg-9 col-xl-6">--}}
            {{--                                                    <input class="form-control" type="text"--}}
            {{--                                                           value="{{ $user->address }}" name="address">--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <h2 class="col-xl-3 col-lg-3">Các chương trình đào tạo</h2>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-xl-3 col-lg-3 col-form-label">Công nghệ thông--}}
            {{--                                                    tin:</label>--}}
            {{--                                                <div class="col-lg-9 col-xl-6">--}}
            {{--                                                    <select class="custom-select form-control">--}}
            {{--                                                        <option selected>Chọn</option>--}}
            {{--                                                        <option value="1">Phát triển phần mềm</option>--}}
            {{--                                                        <option value="2">Trí tuệ nhân tạo</option>--}}
            {{--                                                        <option value="3">Internet of Things(IoT)</option>--}}
            {{--                                                    </select>--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-xl-3 col-lg-3 col-form-label">Kinh doanh:</label>--}}
            {{--                                                <div class="col-lg-9 col-xl-6">--}}
            {{--                                                    <select class="custom-select form-control">--}}
            {{--                                                        <option selected>Chọn</option>--}}
            {{--                                                        <option value="1">Quản trị kinh doanh</option>--}}
            {{--                                                        <option value="1">Kinh doanh quốc tế</option>--}}
            {{--                                                        <option value="2">Marketing</option>--}}
            {{--                                                    </select>--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-xl-3 col-lg-3 col-form-label">Truyền thông đa phương--}}
            {{--                                                    tiện:</label>--}}
            {{--                                                <div class="col-lg-9 col-xl-6">--}}
            {{--                                                    <select class="custom-select form-control">--}}
            {{--                                                        <option selected>Chọn</option>--}}
            {{--                                                        <option value="1">Truyền thông xã hội</option>--}}
            {{--                                                        <option value="1">Quảng cáo</option>--}}
            {{--                                                        <option value="2">Quan hệ công chúng</option>--}}
            {{--                                                    </select>--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-form-label btn-label text-left">1. Các ngành học hiện--}}
            {{--                                                    nay--}}
            {{--                                                    ở Swinburne Việt Nam, bạn quan tâm đến ngành nào:</label>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-3 col-form-label">Công nghệ thông tin:</label>--}}
            {{--                                                <div class="col-9">--}}
            {{--                                                    <div class="kt-radio-inline">--}}
            {{--                                                        @foreach($information as $item)--}}
            {{--                                                            @if($user->hasBranch != null)--}}
            {{--                                                                <label class="kt-radio">--}}
            {{--                                                                    <input type="radio"--}}
            {{--                                                                           {{ $item->id == $user->hasBranch->id ? 'checked' : 0 }} name="branch_id"--}}
            {{--                                                                           value="{{ $item->id }}"> {{ $item->industry_name }}--}}
            {{--                                                                    <span></span>--}}
            {{--                                                                </label>--}}
            {{--                                                            @else--}}
            {{--                                                                <label class="kt-radio">--}}
            {{--                                                                    <input type="radio" name="branch_id"--}}
            {{--                                                                           value="{{ $item->id }}"> {{ $item->industry_name }}--}}
            {{--                                                                    <span></span>--}}
            {{--                                                                </label>--}}
            {{--                                                            @endif--}}
            {{--                                                        @endforeach--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-3 col-form-label">Kinh doanh:</label>--}}
            {{--                                                <div class="col-9">--}}
            {{--                                                    <div class="kt-radio-inline">--}}
            {{--                                                        @foreach($business as $item)--}}
            {{--                                                            @if($user->hasBranch != null)--}}
            {{--                                                                <label class="kt-radio">--}}
            {{--                                                                    <input type="radio"--}}
            {{--                                                                           {{ $item->id == $user->hasBranch->id ? 'checked' : 0 }} name="branch_id"--}}
            {{--                                                                           value="{{ $item->id }}"> {{ $item->industry_name }}--}}
            {{--                                                                    <span></span>--}}
            {{--                                                                </label>--}}
            {{--                                                            @else--}}
            {{--                                                                <label class="kt-radio">--}}
            {{--                                                                    <input type="radio" name="branch_id"--}}
            {{--                                                                           value="{{ $item->id }}"> {{ $item->industry_name }}--}}
            {{--                                                                    <span></span>--}}
            {{--                                                                </label>--}}
            {{--                                                            @endif--}}
            {{--                                                        @endforeach--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-3 col-form-label ">Truyền thông đa phương--}}
            {{--                                                    tiện:</label>--}}
            {{--                                                <div class="col-9">--}}
            {{--                                                    <div class="kt-radio-inline">--}}
            {{--                                                        @foreach($media as $item)--}}
            {{--                                                            @if($user->hasBranch != null)--}}
            {{--                                                                <label class="kt-radio">--}}
            {{--                                                                    <input type="radio"--}}
            {{--                                                                           {{ $user->hasBranch->id == $item->id ? 'checked' : 0 }} name="branch_id"--}}
            {{--                                                                           value="{{ $item->id }}"> {{ $item->industry_name }}--}}
            {{--                                                                    <span></span>--}}
            {{--                                                                </label>--}}
            {{--                                                            @else--}}
            {{--                                                                <label class="kt-radio">--}}
            {{--                                                                    <input type="radio" name="branch_id"--}}
            {{--                                                                           value="{{ $item->id }}"> {{ $item->industry_name }}--}}
            {{--                                                                    <span></span>--}}
            {{--                                                                </label>--}}
            {{--                                                            @endif--}}
            {{--                                                        @endforeach--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-form-label btn-label text-left">2. Kế hoạch--}}
            {{--                                                    sau khi thi--}}
            {{--                                                    THPT Quốc gia của bạn:</label>--}}
            {{--                                                <div class="col-lg-9 col-xl-6">--}}
            {{--                                                    <div class="kt-radio-inline">--}}
            {{--                                                        <label class="kt-radio">--}}
            {{--                                                            <input type="radio"--}}
            {{--                                                                   {{ $user->after_exam == 1 ? 'checked' : "" }} name="after_exam"--}}
            {{--                                                                   value="1"> Du học--}}
            {{--                                                            <span></span>--}}
            {{--                                                        </label>--}}
            {{--                                                        <label class="kt-radio">--}}
            {{--                                                            <input type="radio"--}}
            {{--                                                                   {{ $user->after_exam == 2 ? 'checked' : "" }} name="after_exam"--}}
            {{--                                                                   value="2"> Học ĐH Quốc tế--}}
            {{--                                                            <span></span>--}}
            {{--                                                        </label>--}}
            {{--                                                        <label class="kt-radio">--}}
            {{--                                                            <input type="radio"--}}
            {{--                                                                   {{ $user->after_exam == 3 ? 'checked' : "" }} name="after_exam"--}}
            {{--                                                                   value="3"> Học ĐH công lập--}}
            {{--                                                            <span></span>--}}
            {{--                                                        </label>--}}
            {{--                                                        <label class="kt-radio">--}}
            {{--                                                            <input type="radio"--}}
            {{--                                                                   {{ $user->after_exam == 4 ? 'checked' : "" }} name="after_exam"--}}
            {{--                                                                   value="4"> Khác--}}
            {{--                                                            <span></span>--}}
            {{--                                                        </label>--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-form-label btn-label text-left">3. Tham gia ký--}}
            {{--                                                    chuyển tiếp--}}
            {{--                                                    quốc tế với Swinburne Australia:</label>--}}
            {{--                                                <div class="col-lg-9 col-xl-6">--}}
            {{--                                                    <div class="kt-radio-inline">--}}
            {{--                                                        <label class="kt-radio">--}}
            {{--                                                            <input type="radio"--}}
            {{--                                                                   {{ $user->transition == 1 ? 'checked' : "" }} name="transition"--}}
            {{--                                                                   value="1"> Có--}}
            {{--                                                            <span></span>--}}
            {{--                                                        </label>--}}
            {{--                                                        <label class="kt-radio">--}}
            {{--                                                            <input type="radio"--}}
            {{--                                                                   {{ $user->transition == 2 ? 'checked' : "" }} name="transition"--}}
            {{--                                                                   value="2"> Không--}}
            {{--                                                            <span></span>--}}
            {{--                                                        </label>--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-form-label btn-label text-left">4. Trình độ--}}
            {{--                                                    tiếng Anh của--}}
            {{--                                                    bạn hiện nay:</label>--}}
            {{--                                                <div class="col-lg-9 col-xl-6">--}}
            {{--                                                    <div class="kt-radio-inline">--}}
            {{--                                                        <label class="kt-radio">--}}
            {{--                                                            <input type="radio"--}}
            {{--                                                                   {{ $user->english_level == 1 ? 'checked' : "" }} name="english_level"--}}
            {{--                                                                   value="1"> Trung bình--}}
            {{--                                                            <span></span>--}}
            {{--                                                        </label>--}}
            {{--                                                        <label class="kt-radio">--}}
            {{--                                                            <input type="radio"--}}
            {{--                                                                   {{ $user->english_level == 2 ? 'checked' : "" }} name="english_level"--}}
            {{--                                                                   value="2"> Khá--}}
            {{--                                                            <span></span>--}}
            {{--                                                        </label>--}}
            {{--                                                        <label class="kt-radio">--}}
            {{--                                                            <input type="radio"--}}
            {{--                                                                   {{ $user->english_level == 3 ? 'checked' : "" }} name="english_level"--}}
            {{--                                                                   value="3"> Tốt--}}
            {{--                                                            <span></span>--}}
            {{--                                                        </label>--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-form-label btn-label text-left">Chứng chỉ quốc--}}
            {{--                                                    tế--}}
            {{--                                                    IELTS/TOEFL/PTE thi gần nhất đạt:</label>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-xl-1 col-lg-2 col-form-label">IELTS:</label>--}}
            {{--                                                <div class="col-lg-2 col-xl-2">--}}
            {{--                                                    <input class="form-control" type="text" name="ielts"--}}
            {{--                                                           value="{{ $user->ielts }}">--}}
            {{--                                                </div>--}}
            {{--                                                <label class="col-xl-1 col-lg-2 col-form-label">TOEFL:</label>--}}
            {{--                                                <div class="col-lg-2 col-xl-2">--}}
            {{--                                                    <input class="form-control" type="text" name="toefl"--}}
            {{--                                                           value="{{ $user->toefl }}">--}}
            {{--                                                </div>--}}
            {{--                                                <label class="col-xl-1 col-lg-2 col-form-label">Khác:</label>--}}
            {{--                                                <div class="col-lg-2 col-xl-2">--}}
            {{--                                                    <input class="form-control" type="text" name="certificate"--}}
            {{--                                                           value="{{ $user->certificate }}">--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-form-label btn-label text-left"> 5. Bạn có--}}
            {{--                                                    thích được tham--}}
            {{--                                                    gia hoạt động sinh viên, thực tế tại doanh nghiệp và môi trường trải--}}
            {{--                                                    nghiệm quốc tế không ?</label>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <div class="col-lg-9 col-xl-6">--}}
            {{--                                                    <div class="kt-radio-inline text-center">--}}
            {{--                                                        <label class="kt-radio">--}}
            {{--                                                            <input type="radio"--}}
            {{--                                                                   {{ $user->participation == 1 ? 'checked' : "" }} name="participation"--}}
            {{--                                                                   value="1"> Rất thích tham gia--}}
            {{--                                                            <span></span>--}}
            {{--                                                        </label>--}}
            {{--                                                        <label class="kt-radio">--}}
            {{--                                                            <input type="radio"--}}
            {{--                                                                   {{ $user->participation == 2 ? 'checked' : "" }} name="participation"--}}
            {{--                                                                   value="2"> Bình hường--}}
            {{--                                                            <span></span>--}}
            {{--                                                        </label>--}}
            {{--                                                        <label class="kt-radio">--}}
            {{--                                                            <input type="radio"--}}
            {{--                                                                   {{ $user->participation == 3 ? 'checked' : "" }} name="participation"--}}
            {{--                                                                   value="3"> Không thích tham gia--}}
            {{--                                                            <span></span>--}}
            {{--                                                        </label>--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <label class="col-form-label btn-label text-left">6. Bạn có quan tâm đến--}}
            {{--                                                    kỳ--}}
            {{--                                                    thi tuyển học bổng "Thắp sáng tương lai" của Swinburne--}}
            {{--                                                    không?</label>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="form-group row">--}}
            {{--                                                <div class="col-lg-9 col-xl-6">--}}
            {{--                                                    <div class="kt-radio-inline text-center">--}}
            {{--                                                        <label class="kt-radio">--}}
            {{--                                                            <input type="radio"--}}
            {{--                                                                   {{ $user->scholarship_exam == 1 ? 'checked' : "" }} name="scholarship_exam"--}}
            {{--                                                                   value="1"> Có--}}
            {{--                                                            <span></span>--}}
            {{--                                                        </label>--}}
            {{--                                                        <label class="kt-radio">--}}
            {{--                                                            <input type="radio"--}}
            {{--                                                                   {{ $user->scholarship_exam == 2 ? 'checked' : "" }} name="scholarship_exam"--}}
            {{--                                                                   value="2"> Không--}}
            {{--                                                            <span></span>--}}
            {{--                                                        </label>--}}
            {{--                                                        <label class="kt-radio">--}}
            {{--                                                            <input type="radio"--}}
            {{--                                                                   {{ $user->scholarship_exam == 3 ? 'checked' : "" }} name="scholarship_exam"--}}
            {{--                                                                   value="3"> Em muốn tư vấn thêm--}}
            {{--                                                            <span></span>--}}
            {{--                                                        </label>--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}

            {{--                                        </div>--}}
            {{--                                        <div class="kt-form__actions text-center">--}}
            {{--                                            <div class="row">--}}
            {{--                                                <div class="col-lg-12">--}}
            {{--                                                    <button type="submit" class="btn btn-primary">Save</button>--}}
            {{--                                                    <a href="{{ route('dashboard') }}"--}}
            {{--                                                       class="btn btn-secondary">Cancel</a>--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </form>--}}
            {{--                        </div>--}}

            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
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


