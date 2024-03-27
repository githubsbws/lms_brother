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
						<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a href="{{url('news')}}">ระบบจัดการปัญหาการใช้งาน</a></li> » <li>แก้ไขจัดการปัญหาการใช้งาน</li>
					</ul><!-- breadcrumbs -->
					<div class="separator bottom"></div>
					<!-- innerLR -->
					<div class="innerLR">
						<div class="widget widget-tabs border-bottom-none">
							<div class="widget-head">
								<ul>
									<li class="active">
										<a class="glyphicons edit" href="#account-details" data-toggle="tab">
											<i></i>จัดการปัญหาการใช้งาน </a>
									</li>
								</ul>
							</div>
							<div class="widget-body">
								<div class="form">
									<form enctype="multipart/form-data"  action="{{route('reportproblem.edit',$reportproblem->id)}}" method="post">
										@csrf				
										<div class="row">
											<label for="News_cms_title" class="required">ชื่อ - นามสกุลผู้ส่ง <span class="required">*</span></label> 
											<input size="60" maxlength="250" class="span8" name="firstname"  type="text" value="{{$reportproblem->firstname}}{{$reportproblem->lastname}}" readonly><span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
											<div class="error help-block">
												<div class="label label-important" id="News_cms_title_em_" style="display:none"></div>
											</div>
										</div>
										<div class="row">
											<label for="News_cms_short_title" class="required">อีเมลล์ผู้ส่ง <span class="required">*</span></label> 
											<input rows="4" cols="40" class="span8" maxlength="255" type="text" name="email" value="{{ $reportproblem->email}}" readonly><span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
											<div class="error help-block">
												<div class="label label-important" id="News_cms_short_title_em_" style="display:none"></div>
											</div>
										</div>
										<div class="row">
											<label for="News_cms_short_title" class="required">รายละเอียดปัญหา <span class="required">*</span></label> 
											<textarea rows="4" cols="40" class="span8" maxlength="255" name="report_detail" value="{{ $reportproblem->report_detail}}" readonly ></textarea> <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
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
											<label for="News_cms_short_title" class="required">วิธีแก้ปัญหา <span class="required">*</span></label> 
											<textarea rows="4" cols="40" class="span8" maxlength="255" name="answer">{{ $reportproblem->answer}}</textarea> <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
											<div class="error help-block">
												<div class="label label-important" id="News_cms_short_title_em_" style="display:none"></div>
											</div>
										</div>
										<br>
	
										
	
										<br>
	
										<div class="row buttons">
											<button class="btn btn-primary btn-icon glyphicons ok_2"><i></i>บันทึกข้อมูล</button>
										</div>
									</form>
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