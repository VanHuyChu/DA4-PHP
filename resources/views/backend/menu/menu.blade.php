@extends('backend.master.master')
@section('title')
    Cấu hình Website
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="page-wrapper">
            <div class="page-content">
                {!! Menu::render() !!}
            </div>
        </div>
    </div>
</div>
@push('scripts')
{!! Menu::scripts() !!}
@endpush

@endsection
