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
					<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a href="/admin/index.php/imgslide/index">ระบบแก้ไขสไลด์รูปภาพ</a></li> » <li>แก้ไขสไลด์รูปภาพ</li>
				</ul><!-- breadcrumbs -->
				<div class="separator bottom"></div>


				<!-- innerLR -->
				<div class="innerLR">
					<div class="widget widget-tabs border-bottom-none">
						<div class="widget-head">
							<ul>
								<li class="active">
									<a class="glyphicons edit" href="#account-details" data-toggle="tab">
										<i></i>สไลด์รูปภาพ </a>
								</li>
							</ul>
						</div>
						<div class="widget-body">
							<div class="form">
			
									<div class="row">
										<label for="Imgslide_imgslide_link" class="required">ชื่อลิ้งค์ <span class="required">*</span></label> 
										<h5>{{ $imgslide->imgslide_link}}</h5>
										<div class="error help-block">
											<div class="label label-important" id="Imgslide_imgslide_link_em_" style="display:none"></div>
										</div>
									</div>
									
									<br>

									<div class="row">
									</div>
									<br>

									<div class="row">
										<label for="Imgslide_imgslide_picture" class="required">รูปภาพประกอบ <span class="required">*</span></label>
										<img src="{{asset('images/uploads/imgslides/'.$imgslide->imgslide_picture)}}" style="width:350px;height:350px;">
										<div class="error help-block">
											<div class="label label-important" id="Imgslide_imgslide_picture_em_" style="display:none"></div>
										</div>
									</div>
									
									
									<br>

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