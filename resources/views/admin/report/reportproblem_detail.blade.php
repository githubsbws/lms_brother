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
						<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a href="{{url('news')}}">ระบบจัดการปัญหาการใช้งาน</a></li> » <li>ปัญหาการใช้งาน</li>
					</ul><!-- breadcrumbs -->
					<div class="separator bottom"></div>
					<!-- innerLR -->
					<div class="innerLR">
						<div class="widget widget-tabs border-bottom-none">
							<div class="widget-head">
								<ul>
									<li class="active">
										<a class="glyphicons edit" href="#account-details" data-toggle="tab">
											<i></i>ปัญหาการใช้งาน </a>
									</li>
								</ul>
							</div>
							<div class="widget-body">
								<div class="form">
												
										<div class="row">
											<label for="News_cms_title" class="required">ชื่อ - นามสกุลผู้ส่ง 
											<h4> {{$reportproblem->firstname}}{{$reportproblem->lastname}}</h4>
											<div class="error help-block">
												<div class="label label-important" id="News_cms_title_em_" style="display:none"></div>
											</div>
										</div>
										<div class="row">
											<label for="News_cms_short_title" class="required">อีเมลล์ผู้ส่ง 
											<h4>{{ $reportproblem->email}}</h4>
											<div class="error help-block">
												<div class="label label-important" id="News_cms_short_title_em_" style="display:none"></div>
											</div>
										</div>
										<div class="row">
											<label for="News_cms_short_title" class="required">รายละเอียดปัญหา 
											<h4>{{ $reportproblem->report_detail}}</h4>
											<div class="error help-block">
												<div class="label label-important" id="News_cms_short_title_em_" style="display:none"></div>
											</div>
										</div>
	
										{{-- <div class="row">
											<label for="News_cms_detail">ภาพประกอบ</label>
											@if($reportproblem->report_pic != null)
											<img src=""
											@endif
											<div class="error help-block">
												<div class="label label-important" id="News_cms_detail_em_" style="display:none"></div>
											</div>
										</div> --}}
	
										<br>
										<div class="row">
											<label for="News_cms_short_title" class="required">วิธีแก้ปัญหา 
											<h4>{{ $reportproblem->answer}}</h4>
											<div class="error help-block">
												<div class="label label-important" id="News_cms_short_title_em_" style="display:none"></div>
											</div>
										</div>
										<br>

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