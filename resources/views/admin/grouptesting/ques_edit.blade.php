@extends('admin.layouts.mainlayout')
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
					<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a href="/admin/index.php/grouptesting/index">ระบบชุดข้อสอบบทเรียนออนไลน์</a></li> » <li>เพิ่มชุดข้อสอบอบรมออนไลน์</li>
				</ul><!-- breadcrumbs -->
				<div class="separator bottom"></div>
				<script>
					tinymce.init({
							selector: ".tinymce",
							theme: "modern",
							width: 680,
							height: 300,
							plugins: [
								"advlist autolink link image lists charmap print preview hr anchor pagebreak",
								"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
								"table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
							],
							toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
							toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
							image_advtab: true,

							external_filemanager_path: "{{asset('filemanager_f')}}",
							filemanager_title: "Responsive Filemanager",
							external_plugins: {
								"filemanager": "{{asset('filemanager_f/plugin.min.js')}}"
							}
						});
				</script>

				<!-- innerLR -->
				<div class="innerLR">
					<div class="widget widget-tabs border-bottom-none">
						<div class="widget-head">
							<ul>
								<li class="active">
									<a class="glyphicons edit" href="#account-details" data-toggle="tab">
										<i></i>แก้ไขข้อสอบออนไลน์ </a>
								</li>
							</ul>
						</div>
						<div class="widget-body">
							<div class="form">
								<form enctype="multipart/form-data" id="news-form" action="{{route('ques.edit',['id' => $group->ques_id])}}" method="post">
									@csrf
									<p class="note">ค่าที่มี <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span> จำเป็นต้องใส่ให้ครบ</p>
									<div class="row">
										<label for="Grouptesting_group_title" class="required">คำถาม <span class="required">*</span></label> 
										<div id="microtextbox-cms-detail" style="height: 700px"></div>
										{{-- <textarea class="tinymce" name="content" id="Lesson_content" aria-hidden="true" name="group_title">{!! htmlspecialchars_decode($group->ques_title) !!}</textarea> --}}
										<span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="Grouptesting_group_title_em_" style="display:none"></div>
										</div>
									</div>
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
	@php
	$text = htmlspecialchars_decode(htmlspecialchars_decode($group->ques_title));
	@endphp

   <script>
	const text = '{!! $text !!}'
	const mtextboxConfig = {
		target: [
			{
				id: 'microtextbox-cms-detail',
				name: 'ques_title',
				options: {
					placeholder: "",
					body: '{!! $text !!}'
				},
			}
		],
	}
</script>
</body>
@endsection