@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
<link rel="stylesheet" crossorigin href="/assets/index-CNiHm67Y.css">
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
										<i></i>แก้ไขข้อมูล
									</a>
								</li>
							</ul>
						</div>
						<div class="widget-body">
							<form action="{{ route('aboutus.update',['id' => $about_detail->about_id]) }}" enctype="multipart/form-data" method="post" id="question-form">
								@csrf
							<div class="form">

								<!-- <p class="note">ค่าที่มี <?php //echo $this->NotEmpty();?> จำเป็นต้องใส่ให้ครบ</p> -->
								หัวข้อเกี่ยวกับเรา
								<div class="row">
									{{ Form::textarea('about_title',$about_detail->about_title, ['class' => 'form-control']) }}
								</div>
								รายละเอียดเกี่ยวกับเรา
								<div class="row">
									
									<div id="microtextbox-cms-detail" style="height:300px"></div>
									{{-- <textarea class="tinymce" name="about_detail" id="about_detail" aria-hidden="true">{!! htmlspecialchars_decode($about_detail->about_detail) !!}</textarea> --}}
								</div>

								<br/>

								<div class="row buttons">
									<button class="btn btn-primary btn-icon glyphicons ok_2"><i></i>บันทึกข้อมูล</button>
								</div>

								

							</div><!-- form -->
							</form>
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
    $text = htmlspecialchars_decode(htmlspecialchars_decode($about_detail->about_detail));
	@endphp

   <script>
	const text = '{!! $text !!}'
	const mtextboxConfig = {
		target: [
			{
				id: 'microtextbox-cms-detail',
				name: 'about_detail',
				options: {
					placeholder: "",
					body: '{!! $text !!}'
				},
			}
		],
	}
</script>
<script type="module" crossorigin src="/assets/index-BL4sPiOY.js"></script>
</body>

@endsection



