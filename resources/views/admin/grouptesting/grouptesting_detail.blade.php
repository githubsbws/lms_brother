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
					<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a href="/admin/index.php/grouptesting/index">ระบบชุดข้อสอบบทเรียนออนไลน์</a></li> » <li>ชุดข้อสอบอบรมออนไลน์</li>
				</ul><!-- breadcrumbs -->
				<div class="separator bottom"></div>


				<!-- innerLR -->
				<div class="innerLR">
					<div class="widget widget-tabs border-bottom-none">
						<div class="widget-head">
							<ul>
								<li class="active">
									<a class="glyphicons edit" href="#account-details" data-toggle="tab">
										<i></i>ชุดข้อสอบออนไลน์ </a>
								</li>
							</ul>
						</div>
						<div class="widget-body">	
							<div class="form">
									<div class="row">
										<label for="Grouptesting_lesson_id" class="required">ชื่อบทเรียนออนไลน์ </label> 
										 <h5>{{ $group->title}}</h5>
										<div class="error help-block">
											<div class="label label-important" id="Grouptesting_lesson_id_em_" style="display:none"></div>
										</div>
									</div>

									<div class="row">
										<label for="Grouptesting_group_title" class="required">ชื่อชุด </label> 
										<h5>{{$group->group_title}}</h5>
										<div class="error help-block">
											<div class="label label-important" id="Grouptesting_group_title_em_" style="display:none"></div>
										</div>
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