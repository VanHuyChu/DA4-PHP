@extends('frontend.master.master')
@section('title','Thông tin')
@section('content')
		<!-- main -->

		<div id="colorlib-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-three-forth">
							{!!$setting->about!!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end main -->
	@endsection
