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
					<li><a href="/admin">หน้าหลัก</a></li> » <li><a href="{{url('video')}}">ระบบตัวอย่าง Vdo YouTube</a></li> » <li>แก้ไขตัวอย่าง Vdo YouTube</li>
				</ul><!-- breadcrumbs -->
				<div class="separator bottom"></div>


				<!-- innerLR -->
				<div class="innerLR">
					<div class="widget widget-tabs border-bottom-none">
						<div class="widget-head">
							<ul>
								<li class="active">
									<a class="glyphicons edit" href="#account-details" data-toggle="tab">
										<i></i>แก้ไขตัวอย่าง Vdo YouTube </a>
								</li>
							</ul>
						</div>
						<div class="widget-body">
							<div class="form">
								<form enctype="multipart/form-data" id="vdo-form" action="{{route('video_update',$vdo->vdo_id)}}" method="post">
									@csrf
									<p class="note">ค่าที่มี <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span> จำเป็นต้องใส่ให้ครบ</p>
									<div class="row">
										<label for="Vdo_vdo_title" class="required">แก้ไขหัวข้อวิดีโอ <span class="required">*</span></label> <input size="60" maxlength="255" class="span7" name="vdo_title" id="Vdo_vdo_title" type="text" value="{{$vdo->vdo_title}}"> <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="Vdo_vdo_title_em_" style="display:none"></div>
										</div>
									</div>
									@error('vdo_title')
										<div class="my-2">
											<span class="text-primary">{{$message}}</span>
										</div>
									@enderror

									<div class="row">
										<label for="Vdo_vdo_path" class="required">แก้ไข Path ของ YouTube <span class="required">*</span></label> <input size="60" maxlength="255" class="span7" name="vdo_path" id="Vdo_vdo_path" type="text" value="{{$vdo->vdo_path}}"> <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="Vdo_vdo_path_em_" style="display:none"></div>
										</div>
									</div>

									@error('vdo_path')
										<div class="my-2">
											<span class="text-primary">{{$message}}</span>
										</div>
									@enderror

									<div class="row">
										<font color="#990000">
											<span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span> ตัวอย่าง http://www.youtube.com/watch?v=xLgnkRxlKCg
										</font>
									</div>
									<br>

									<div class="row buttons">
										<button class="btn btn-primary btn-icon glyphicons ok_2"><i></i>อัปเดตข้อมูล</button>
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