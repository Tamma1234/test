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
                                    <h3 class="kt-portlet__head-title">PHI???U ????NG K?? THAM GIA X??T TUY???N V?? H???C B???NG</h3>
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
                                                <label class="col-form-label btn-label text-left">1. H???, ch??? ?????m v?? t??n
                                                    th?? sinh (vi???t ????ng nh?? gi???y khai sinh b???ng ch??? in hoa c?? d???u)</label>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">H??? v?? t??n:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text"
                                                           value="{{ $user->full_name }}" name="full_name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Gi???i t??nh:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="kt-radio-inline">
                                                        <label class="kt-radio">
                                                            <input type="radio" name="gender"
                                                                   value="0"> Nam
                                                            <span></span>
                                                        </label>
                                                        <label class="kt-radio">
                                                            <input type="radio" name="gender"
                                                                   value="1"> N???
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">2. Ng??y, th??ng, n??m
                                                    sinh:</label>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Ng??y th??ng:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" name="dob" type="date" value=""
                                                           id="example-date-input">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">3. Tr?????ng THPT:</label>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">T???nh/Th??nh:</label>
                                                <div class="col-lg-9 col-xl-6">
{{--                                                    <input class="form-control" type="text" name="" value=""--}}
{{--                                                           placeholder="V?? d???: Qu???n Ba ????nh">--}}
                                                    <select class="form-control choose province" data-live-search="true" id="city" name="province_id">
                                                        <option value="" >Ch???n T???nh/Th??nh</option>
                                                        @foreach($provinces as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Qu???n/Huy???n:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control choose" data-live-search="true" id="district" name="district_id">
                                                        <option value="">Ch???n Qu???n/huy???n</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Tr?????ng THPT:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    {{--                                                    <input class="form-control" name="pschool_name" type="text" value=""--}}
                                                    {{--                                                           placeholder="V?? d???: THPT Minh Khai">--}}
                                                    <select class="form-control" name="school_id" id="school">
                                                        <option value="">Ch???n Tr?????ng</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">4. ?????i v???i th?? sinh
                                                    ch??a t???t nghi???p: ??i???m trung b??nh h???c k??? 1 ho???c ??i???m trung b??nh l???p
                                                    12:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name="gpa" value=""
                                                           placeholder="V?? d???: 8.0">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">5. ?????i v???i th?? sinh ????
                                                    t???t nghi???p:</label>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label">N??m t???t nghi???p THPT:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name="graduated_year"
                                                           value="" placeholder="V?? d???: 2020">
                                                </div>
                                                <label class="col-form-label">X???p lo???i t???t nghi???p:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name="toefl"
                                                           value="" placeholder="V?? d???: Kh??">
                                                </div>
                                                <label class="col-form-label">??i???m t???t nghi???p:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name="gpa"
                                                           value="" placeholder="V?? d???: 9.0">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">6. Tr??nh ????? ti???ng Anh:
                                                    ????nh gi?? tr??nh ????? c???a b???n</label>
                                            </div>
                                            <div class="kt-radio-inline">
                                                <label class="kt-radio col-2">
                                                    <input type="radio" name="english_level"
                                                           value="1">Ch??a bi???t
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio col-2">
                                                    <input type="radio" name="english_level"
                                                           value="2">C?? b???n
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio col-2">
                                                    <input type="radio" name="english_level"
                                                           value="3">Kh??
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio col-2">
                                                    <input type="radio" name="english_level"
                                                           value="4">T???t
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label">Ch???ng ch??? ti???ng Anh(n???u c??):</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name=""
                                                           value="" placeholder="V?? d???: IELTS">
                                                </div>
                                                <label class="col-form-label">Ng??y thi:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name="pgen_code_date"
                                                           value="" placeholder="V?? d???: 01/01/2020">
                                                </div>
                                                <label class="col-form-label">K???t qu???:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name="ielts"
                                                           value="" placeholder="V?? d???: 6.5">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">7. S??? CCCD s???:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name="cmt"
                                                           value="" placeholder="V?? d???: 001202015340">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label">Ng??y c???p:</label>
                                                <div class="col-lg-2 col-xl-4">
                                                    <input class="form-control" type="date" name="cmt_provided_date"
                                                           id="example-date-input" placeholder="V?? d???: 01/01/2020">
                                                </div>
                                                <label class="col-form-label">N??i c???p:</label>
                                                <div class="col-lg-2 col-xl-4">
                                                    <input class="form-control" type="text" name="cmt_provided_where"
                                                           value="" placeholder="V?? d???: C??ng An TP H?? N???i">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">8. ?????a ch??? li??n
                                                    h???:</label>
                                                <div class="col-lg-2 col-xl-8">
                                                    <input class="form-control" type="text" name="paddress"
                                                           value="" placeholder="V?? d???: 80 Duy T??n - C???u Gi???y - H?? N???i">
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
                                                           value="" placeholder="V?? d???: tamma1290@gmail.com">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">10. H??? t??n b???/m???/ng?????i
                                                    gi??m h???:</label>
                                                <div class="col-lg-2 col-xl-6">
                                                    <input class="form-control" type="text" name=""
                                                           value="" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label">Ngh??? nghi???p:</label>
                                                <div class="col-lg-2 col-xl-6">
                                                    <input class="form-control" type="text" name=""
                                                           value="" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label">N??i c??ng t??c:</label>
                                                <div class="col-lg-2 col-xl-4">
                                                    <input class="form-control" type="text" name=""
                                                           value=""
                                                           placeholder="V?? d???: S??? 2 -D????ng Khu?? - Mai D???ch - C???u Gi???y - H?? N???i">
                                                </div>
                                                <label class="col-form-label">Email:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name=""
                                                           value="" placeholder="V?? d???: thuyquynh123@gmail.com">
                                                </div>
                                                <label class="col-form-label">Mobile:</label>
                                                <div class="col-lg-2 col-xl-2">
                                                    <input class="form-control" type="text" name=""
                                                           value="" placeholder="v?? d???: 0987566666">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label btn-label text-left">11. Ng??nh ????ng k??:(c???p
                                                    nh???p theo quy ch??? tuy???n sinh)</label>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">1. C??ng ngh??? th??ng tin:</label>
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
                                                <label class="col-3 col-form-label">2. Ng??nh qu???n tr???nh kinh
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
                                                <label class="col-3 col-form-label ">3. Ng??nh truy???n th??ng ??a ph????ng
                                                    ti???n:</label>
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
                                                <label class="col-form-label btn-label text-left">12. ????ng k?? x??t tuy???n
                                                    th???ng v?? h???c b???ng t???i Swinburne Vi???t Nam:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="kt-radio-inline">
                                                        <label class="kt-radio">
                                                            <input type="radio"
                                                                   {{ $user->transition == 1 ? 'checked' : "" }} name="transition"
                                                                   value="1"> C??
                                                            <span></span>
                                                        </label>
                                                        <label class="kt-radio">
                                                            <input type="radio"
                                                                   {{ $user->transition == 2 ? 'checked' : "" }} name="transition"
                                                                   value="2"> Kh??ng
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label btn-label text-left">13. Cam k???t c???a th?? sinh:</label>
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
