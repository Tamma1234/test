@extends('admin.layouts.main')
@section('title', 'Create')

@section('content')
{{--    @include('admin.templates.content-header', ['name' => 'Swinburne', 'key' => 'Queries', 'value' => "", 'value2' => ""])--}}
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
                    <div class="col-xl-12">
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">PHIẾU ĐĂNG KÝ THAM GIA XÉT TUYỂN VÀ HỌC BỔNG</h3>
                                </div>
                            </div>
                            <form class="kt-form kt-form--label-right"
                                  action="{{ route('update.profile', ['id' => $user->id]) }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $user->id }}" name="id">
                                <div class="kt-portlet__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">1. Họ, chữ đệm và tên
                                                    thí sinh (viết đúng như giấy khai sinh bằng chữ in hoa có dấu)</label>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Họ và tên:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text"
                                                           value="{{ $user->full_name }}" name="full_name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Giới tính:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="kt-radio-inline">
                                                        <label class="kt-radio">
                                                            <input type="radio" name="gender"
                                                                   value="0"> Nam
                                                            <span></span>
                                                        </label>
                                                        <label class="kt-radio">
                                                            <input type="radio" name="gender"
                                                                   value="1"> Nữ
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">2. Ngày, tháng, năm
                                                    sinh:</label>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Ngày tháng:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" name="dob" type="date" value=""
                                                           id="example-date-input">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">3. Trường THPT:</label>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Tỉnh/Thành:</label>
                                                <div class="col-lg-9 col-xl-6">
{{--                                                    <input class="form-control" type="text" name="" value=""--}}
{{--                                                           placeholder="Ví dụ: Quận Ba Đình">--}}
                                                    <select class="form-control choose province" data-live-search="true" id="city" name="province_id">
                                                        <option value="" >Chọn Tỉnh/Thành</option>
                                                        @foreach($provinces as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Quận/Huyện:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control choose" data-live-search="true" id="district" name="district_id">
                                                        <option value="">Chọn Quận/huyện</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Trường THPT:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    {{--                                                    <input class="form-control" name="pschool_name" type="text" value=""--}}
                                                    {{--                                                           placeholder="Ví dụ: THPT Minh Khai">--}}
                                                    <select class="form-control" name="school_id" id="school">
                                                        <option value="">Chọn Trường</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">4. Đối với thí sinh
                                                    chưa tốt nghiệp: điểm trung bình học kỳ 1 hoặc điểm trung bình lớp
                                                    12:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name="gpa" value=""
                                                           placeholder="Ví dụ: 8.0">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">5. Đối với thí sinh đã
                                                    tốt nghiệp:</label>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label">Năm tốt nghiệp THPT:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name="graduated_year"
                                                           value="" placeholder="Ví dụ: 2020">
                                                </div>
                                                <label class="col-form-label">Xếp loại tốt nghiệp:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name="toefl"
                                                           value="" placeholder="Ví dụ: Khá">
                                                </div>
                                                <label class="col-form-label">Điểm tốt nghiệp:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name="gpa"
                                                           value="" placeholder="Ví dụ: 9.0">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">6. Trình độ tiếng Anh:
                                                    Đánh giá trình độ của bạn</label>
                                            </div>
                                            <div class="kt-radio-inline">
                                                <label class="kt-radio col-2">
                                                    <input type="radio" name="english_level"
                                                           value="1">Chưa biết
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio col-2">
                                                    <input type="radio" name="english_level"
                                                           value="2">Cơ bản
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio col-2">
                                                    <input type="radio" name="english_level"
                                                           value="3">Khá
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio col-2">
                                                    <input type="radio" name="english_level"
                                                           value="4">Tốt
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label">Chứng chỉ tiếng Anh(nếu có):</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name=""
                                                           value="" placeholder="Ví dụ: IELTS">
                                                </div>
                                                <label class="col-form-label">Ngày thi:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name="pgen_code_date"
                                                           value="" placeholder="Ví dụ: 01/01/2020">
                                                </div>
                                                <label class="col-form-label">Kết quả:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name="ielts"
                                                           value="" placeholder="Ví dụ: 6.5">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">7. Số CCCD số:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name="cmt"
                                                           value="" placeholder="Ví dụ: 001202015340">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label">Ngày cấp:</label>
                                                <div class="col-lg-2 col-xl-4">
                                                    <input class="form-control" type="date" name="cmt_provided_date"
                                                           id="example-date-input" placeholder="Ví dụ: 01/01/2020">
                                                </div>
                                                <label class="col-form-label">Nơi cấp:</label>
                                                <div class="col-lg-2 col-xl-4">
                                                    <input class="form-control" type="text" name="cmt_provided_where"
                                                           value="" placeholder="Ví dụ: Công An TP HÀ Nội">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">8. Địa chỉ liên
                                                    hệ:</label>
                                                <div class="col-lg-2 col-xl-8">
                                                    <input class="form-control" type="text" name="paddress"
                                                           value="" placeholder="Ví dụ: 80 Duy Tân - Cầu Giấy - Hà Nội">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">9. Mobile:</label>
                                                <div class="col-lg-2 col-xl-3">
                                                    <input class="form-control" type="text" name="ptelephone"
                                                           value="" placeholder="">
                                                </div>
                                                <label class="col-form-label">Home Phone:</label>
                                                <div class="col-lg-2 col-xl-4">
                                                    <input class="form-control" type="text" name="pphone"
                                                           value="" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label">Email:</label>
                                                <div class="col-lg-2 col-xl-8">
                                                    <input class="form-control" type="text" name="pemail"
                                                           value="" placeholder="Ví dụ: tamma1290@gmail.com">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">10. Họ tên bố/mẹ/người
                                                    giám hộ:</label>
                                                <div class="col-lg-2 col-xl-6">
                                                    <input class="form-control" type="text" name=""
                                                           value="" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label">Nghề nghiệp:</label>
                                                <div class="col-lg-2 col-xl-6">
                                                    <input class="form-control" type="text" name=""
                                                           value="" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label">Nơi công tác:</label>
                                                <div class="col-lg-2 col-xl-4">
                                                    <input class="form-control" type="text" name=""
                                                           value=""
                                                           placeholder="Ví dụ: Số 2 -Dương Khuê - Mai Dịch - Cầu Giấy - Hà Nội">
                                                </div>
                                                <label class="col-form-label">Email:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name=""
                                                           value="" placeholder="Ví dụ: thuyquynh123@gmail.com">
                                                </div>
                                                <label class="col-form-label">Mobile:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name=""
                                                           value="" placeholder="ví dụ: 0987566666">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">11. Ngành đăng ký:(cập
                                                    nhập theo quy chế tuyển sinh)</label>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">1. Công nghệ thông tin:</label>
                                                <div class="col-9">
                                                    <div class="kt-radio-inline">
                                                        @foreach($information as $item)
                                                            @if($user->hasBranch != null)
                                                                <label class="kt-radio">
                                                                    <input type="radio"
                                                                           {{ $item->id == $user->hasBranch->id ? 'checked' : 0 }} name="branch_id"
                                                                           value="{{ $item->id }}"> {{ $item->industry_name }}
                                                                    <span></span>
                                                                </label>
                                                            @else
                                                                <label class="kt-radio">
                                                                    <input type="radio" name="branch_id"
                                                                           value="{{ $item->id }}"> {{ $item->industry_name }}
                                                                    <span></span>
                                                                </label>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">2. Ngành quản trịnh kinh
                                                    doanh:</label>
                                                <div class="col-9">
                                                    <div class="kt-radio-inline">
                                                        @foreach($business as $item)
                                                            @if($user->hasBranch != null)
                                                                <label class="kt-radio">
                                                                    <input type="radio"
                                                                           {{ $item->id == $user->hasBranch->id ? 'checked' : 0 }} name="branch_id"
                                                                           value="{{ $item->id }}"> {{ $item->industry_name }}
                                                                    <span></span>
                                                                </label>
                                                            @else
                                                                <label class="kt-radio">
                                                                    <input type="radio" name="branch_id"
                                                                           value="{{ $item->id }}"> {{ $item->industry_name }}
                                                                    <span></span>
                                                                </label>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label ">3. Ngành truyền thông đa phương
                                                    tiện:</label>
                                                <div class="col-9">
                                                    <div class="kt-radio-inline">
                                                        @foreach($media as $item)
                                                            @if($user->hasBranch != null)
                                                                <label class="kt-radio">
                                                                    <input type="radio"
                                                                           {{ $user->hasBranch->id == $item->id ? 'checked' : 0 }} name="branch_id"
                                                                           value="{{ $item->id }}"> {{ $item->industry_name }}
                                                                    <span></span>
                                                                </label>
                                                            @else
                                                                <label class="kt-radio">
                                                                    <input type="radio" name="branch_id"
                                                                           value="{{ $item->id }}"> {{ $item->industry_name }}
                                                                    <span></span>
                                                                </label>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">12. Đăng ký xét tuyển
                                                    thẳng và học bổng tại Swinburne Việt Nam:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="kt-radio-inline">
                                                        <label class="kt-radio">
                                                            <input type="radio"
                                                                   {{ $user->transition == 1 ? 'checked' : "" }} name="transition"
                                                                   value="1"> Có
                                                            <span></span>
                                                        </label>
                                                        <label class="kt-radio">
                                                            <input type="radio"
                                                                   {{ $user->transition == 2 ? 'checked' : "" }} name="transition"
                                                                   value="2"> Không
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label btn-label text-left">13. Cam kết của thí sinh:</label>
                                        </div>
                                        <div class="kt-form__actions text-center">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <a href="{{ route('dashboard') }}"
                                                       class="btn btn-secondary">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!--End:: App Content-->
        </div>
        <!--End::App-->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.choose').on('change', function () {
                var action = $(this).attr('id');
                var id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = "";
                if (action == 'city') {
                    result = "district";
                } else {
                    result = "school";
                }
                $.ajax({
                    url: "{{ route('select.school') }}",
                    method: 'POST',
                    data: {action: action, id: id, _token: _token},
                    success: function (data) {
                        console.log(data);
                        $('#' + result).html(data);
                    }
                });
            })
        });
        // $('select').selectpicker();

    </script>
@endsection
