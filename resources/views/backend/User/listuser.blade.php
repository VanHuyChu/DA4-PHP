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
                <li class="active">Danh sách thành viên</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách thành viên</h1>
            </div>
        </div>
        @if (session('thong-bao-loi'))
        <div class="alert bg-danger" role="alert">
            <svg class="glyph stroked cancel">
                <use xlink:href="#stroked-cancel"></use>
            </svg>{!!session('thong-bao-loi')!!}<a href="#" class="pull-right"><span
                    class="glyphicon glyphicon-remove"></span></a>
        </div>
        @endif
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">

                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                @if (session('thong-bao'))
                                    <div class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg>Đã thêm thành công<a href="#" class="pull-right"><span
                                                class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                @endif
                                @if (session('thong-bao-update'))
                                    <div class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg>Đã cập nhật thành công<a href="#" class="pull-right"><span
                                                class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                @endif
                                @if (session('thong-bao-delete'))
                                    <div class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg>Đã xóa thành công<a href="{{ route('user.add') }}" class="pull-right"><span
                                                class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                @endif
                                <a href="{{ route('user.add') }}" class="btn btn-primary">Thêm Thành viên</a>

                                <table class="table table-bordered" style="margin-top:20px;">

                                    <thead>
                                        <tr class="bg-primary">
                                            <th>STT</th>
                                            <th>Email</th>
                                            <th>Tên</th>
                                            <th>Địa chỉ</th>
                                            <th>Số điện thoại</th>
                                            <th>Cấp</th>
                                            <th>Phân quyền</th>
                                            <th width='18%'>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->full }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>
                                                    @if ($item->level == 1)
                                                        <span style="background: rgb(235, 8, 8)"
                                                            class="badge badge-danger rounded">Adimin</span>
                                                    @else
                                                        <span style="background: rgb(9, 233, 9)"
                                                            class="badge badge-success rounded">Quản trị viên</span>
                                                    @endif
                                                </td>
                                                <form action="{{route('user.assign_permission',['id'=>$item->id])}}" method='post'>
                                                    @csrf
                                                <td>
                                                                <input type="checkbox" name="add"  @if ($item->hasPermissionTo('add')) checked @endif><label> Thêm</label><br/>
                                                                <input type="checkbox" name="edit" {{$item->hasPermissionTo('edit') ? 'checked' : '' }}><label> Sửa</label><br/>
                                                                <input type="checkbox" name="delete"  {{$item->hasPermissionTo('delete') ? 'checked' : '' }}><label> Xóa</label><br/>

                                                </td>

                                                <td>
                                                    <a href="{{ route('user.edit', ['id' => $item->id]) }}"
                                                        class="btn btn-warning"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i> Sửa</a>
                                                    <a href="{{ route('user.del', ['id' => $item->id]) }}"
                                                        class="btn btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i> Xóa</a>
                                                            <button class="btn btn-info" onclick="return confirm('Xác nhận trao quyền');"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Trao quyền</button>
                                                </td>
                                            </form>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div align='right'>
                                    {{--
                                    <!-- {{ $users->links() }} --> --}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <!--/.row-->


            </div>

        @section('script')
            <!-- javascript -->
            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/chart.min.js"></script>
            <script src="js/chart-data.js"></script>
        @endsection
    @endsection
