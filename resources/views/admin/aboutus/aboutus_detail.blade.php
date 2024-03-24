@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
<body class="">

	<!-- Main Container Fluid -->
	<div class="container-fluid fluid menu-left">

		<!-- Top navbar -->
		@include('admin.layouts.partials.top-nav')
		<!-- Top navbar END -->


		<!-- Sidebar menu & content wrapper -->
		<div id="wrapper">

			<!-- Sidebar Menu -->
			@include('admin.layouts.partials.menu-left')
			<!-- // Sidebar Menu END -->


			<!-- Content -->
			<!-- <div class="span-19"> -->
			<div id="content">
				<ul class="breadcrumb">
					<li><a href="{{url('admin')}}">หน้าหลัก</a></li> » <li>ระบบเกี่ยวกับเรา</li>
				</ul><!-- breadcrumbs -->
				<div class="separator bottom"></div>

				<!-- innerLR -->
				<div class="innerLR">
					<div class="widget widget-tabs border-bottom-none">
						<div class="widget-head">
							<ul>
								<li class="active">
									<a class="glyphicons edit" href="#account-details" data-toggle="tab">
										<i>รายละเอียดเกี่ยวกับเรา</i>
									</a>
								</li>
							</ul>
						</div>
						<div class="widget-body">
							<div class="form">
								<!-- <p class="note">ค่าที่มี <?php //echo $this->NotEmpty();?> จำเป็นต้องใส่ให้ครบ</p> -->
								<div class="row">
									<h3>หัวข้อเกี่ยวกับเรา</h3>
								</div>
								<h4>{{$about_detail->about_title}}</h4>
								<div class="row">
									<h3>รายละเอียดเกี่ยวกับเรา</h3>
								</div>
								{!! htmlspecialchars_decode(htmlspecialchars_decode($about_detail->about_detail)) !!}
								<br/>

								<div class="row buttons">
									
								</div>


							</div><!-- form -->
						</div>
					</div>
				</div>
<!-- END innerLR -->


				<div id="sidebar">
				</div><!-- sidebar -->
			</div>
			<!-- </div> -->
			<!-- <div class="span-5 last"> -->
			<!-- </div> -->
			<!-- // Content END -->

		</div>
		<div class="clearfix"></div>
		<!-- // Sidebar menu & content wrapper END -->

		<div id="footer" class="hidden-print">

			<!--  Copyright Line -->
			<div class="copy">© 2023 - All Rights Reserved.</a></div>
			<!--  End Copyright Line -->

		</div>
		<!-- // Footer END -->

	</div>

</body>

@endsection



