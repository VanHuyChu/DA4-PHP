@extends('Backend.Master.master')
@section('title')
@if (isset( $user->user_title))
Chỉnh sửa quản trị {{ $user->user_title }}
@else
Chỉnh sửa quản trị {{ $user->user_fullname }}
@endif
@endsection
{{-- @section('title')
Chỉnh sửa quản trị {{ $user->user_fullname }}
@endsection --}}
@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa Thành viên</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Sửa thành viên - admin@gmail.com</div>
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">
                            <form action="{{ route('user.edit', ['id' => $user->id]) }}" method="post">
                                @csrf
                                <div class="col-md-8 col-lg-8 col-lg-offset-2">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="user_email" class="form-control"
                                            value="{{ $user->email }}">
                                    </div>
                                    {!!showErrors($errors, 'user_email')!!}
                                    <div class="form-group">
                                        <label>Full name</label>
                                        <input type="full" name="user_fullname" class="form-control"
                                            value="{{ $user->full }}">
                                    </div>
                                    {!!showErrors($errors, 'user_fullname')!!}
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="address" name="user_address" class="form-control"
                                            value="{{ $user->address }}">
                                    </div>
                                    {!!showErrors($errors, 'user_address')!!}
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="phone" name="user_phone" class="form-control"
                                            value="{{ $user->phone }}">
                                    </div>
                                    {!!showErrors($errors, 'user_phone')!!}
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="user_level" class="form-control" value="">
                                            <option @if ($user->level == 0) selected
                                                @endif value="0" >User</option>
                                            <option @if ($user->level == 1) selected
                                                @endif value="1" >Admin</option>
                                            <option @if ($user->level == 2) selected
                                                @endif value="2" >Super Admin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">

                                        <button class="btn btn-success" type="submit">Sửa thành viên</button>
                                        <a href="{{route('user.index')}}" class="btn btn-danger" type="reset">Huỷ bỏ</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>

        <!--/.row-->
    </div>
@section('script')
    <!--end main-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-user.js"></script>
@endsection
@endsection
