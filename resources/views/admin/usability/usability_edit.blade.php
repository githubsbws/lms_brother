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
					<li><a href="{{url('admin')}}">หน้าหลัก</a></li> » <li><a href="{{url('usability')}}">ระบบวิธีการใช้งาน</a></li>
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
										<i></i>วิธีการใช้งาน </a>
								</li>
							</ul>
						</div>
						<div class="widget-body">
							<form enctype="multipart/form-data" id="news-form" action="{{route('usability.edit',$usa->usa_id)}}" method="post">
								@csrf
							<div class="form">
									<div class="row">
										<label for="usa_title" class="required">หัวข้อวิธีการใช้งาน <span class="required">*</span></label> 
										<input size="60" maxlength="250" class="span8" name="usa_title" id="usa_title" type="text" value="{{$usa->usa_title}}" > <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="usa_title" style="display:none"></div>
										</div>
									</div>

									<div class="row">
										<label for="usa_detail" class="required">รายละเอียดย่อ <span class="required">*</span></label> 
										<textarea rows="4" cols="40" class="span8 tinymce" maxlength="255" name="usa_detail" id="usa_detail" >{!! htmlspecialchars_decode($usa->usa_detail) !!}</textarea> <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="usa_detail" style="display:none"></div>
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
	
</body>
@endsection