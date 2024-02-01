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
					<li><a href="/admin">หน้าหลัก</a></li> » <li><a href="{{url('imgslide')}}">ระบบสไลด์รูปภาพ</a></li> » <li>เพิ่มสไลด์รูปภาพ</li>
				</ul><!-- breadcrumbs -->
				<div class="separator bottom"></div>


				<!-- innerLR -->
				<div class="innerLR">
					<div class="widget widget-tabs border-bottom-none">
						<div class="widget-head">
							<ul>
								<li class="active">
									<a class="glyphicons edit" href="#account-details" data-toggle="tab">
										<i></i>เพิ่มสไลด์รูปภาพ </a>
								</li>
							</ul>
						</div>
						<div class="widget-body">
							<div class="form">
								<form enctype="multipart/form-data" id="imgslide-form" action="/imgslide_insert" method="post">
									@csrf
									<p class="note">ค่าที่มี <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span> จำเป็นต้องใส่ให้ครบ</p>
									<div class="row">
										<label for="Imgslide_imgslide_link" class="required">ชื่อลิ้งค์ <span class="required">*</span></label> <input size="60" maxlength="250" class="span8" name="imgslide_link" id="Imgslide_imgslide_link" type="text"> <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="Imgslide_imgslide_link_em_" style="display:none"></div>
										</div>
									</div>
									@error('imgslide_link')
										<div class="my-2">
											<span class="text-primary">{{$message}}</span>
										</div>
									@enderror

									<div class="row">
										<font color="#990000">
											<span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span> ตัวอย่าง http://www.cpdland.com/
										</font>
									</div>
									<br>

									<div class="row">
									</div>
									<br>

									<div class="row">
										<label for="Imgslide_imgslide_picture" class="required">รูปภาพประกอบ <span class="required">*</span></label>
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="input-append">
												<div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i><span class="fileupload-preview"></span></div><span class="btn btn-default btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input id="ytImgslide_imgslide_picture" type="hidden" value="" name="imgslide_picture"><input name="imgslide_picture" id="Imgslide_imgslide_picture" type="file"></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
											</div>
										</div>
										<div class="error help-block">
											<div class="label label-important" id="Imgslide_imgslide_picture_em_" style="display:none"></div>
										</div>
									</div>
									@error('imgslide_picture')
										<div class="my-2">
											<span class="text-primary">{{$message}}</span>
										</div>
									@enderror

									<div class="row">
										<font color="#990000">
											<span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span> รูปภาพควรมีขนาด 1000x300
											<br><b>Note:</b>Only File JPG, JPEG, PNG, GIF & PDF to allow
										</font>
									</div>
									<br>

									<div class="row buttons">
										<button class="btn btn-primary btn-icon glyphicons ok_2" type="submit"><i></i>บันทึกข้อมูล</button>
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