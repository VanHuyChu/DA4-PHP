@extends('Backend.Master.master')
@section('title', 'Danh sách quản trị viên')
@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Cấu hình website </li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cấu hình website </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">

                    <div class="panel-body">
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Logo
                        </button>

                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Cấu hình Logo</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <textarea class="form-control ckeditor" id="description" rows="3"
                                            name="body_logo">@if ($setting) {!!$setting->logo!!} @endif </textarea>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <input type="hidden" name="set_id" value="@if ($setting) {{ $setting->id }} @endif">
                                            <button type="submit" name="body_logo_sm" value="1" class="btn btn-danger">Sửa</button>
                                            <button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#about">
                            Về chúng tôi
                        </button>
                        <div class="modal fade" id="about">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Cấu hình</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <textarea class="form-control ckeditor" id="description" rows="3"
                                            name="body">@if ($setting) {!!$setting->about!!} @endif</textarea>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <input type="hidden" name="set_id" value="@if ($setting) {{ $setting->id }} @endif">
                                            <button type="submit" name="about" value="1" class="btn btn-danger">Sửa</button>
                                            <button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contact">
                            Liên hệ
                        </button>
                        <div class="modal fade" id="contact">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Cấu hình</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <textarea class="form-control ckeditor" id="description" rows="3"
                                            name="body_contact">@if ($setting) {!!$setting->contact!!} @endif</textarea>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <input type="hidden" name="set_id" value="@if ($setting) {{ $setting->id }} @endif">
                                            <button type="submit" name="contact" value="1" class="btn btn-danger">Sửa</button>
                                            <button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar').click(function() {
                $('#img').click();
            });
        });

    </script>
      <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
      <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
@endsection
