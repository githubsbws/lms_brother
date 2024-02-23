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
					<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a href="{{url('news')}}">ระบบข่าวสารและกิจกรรม</a></li> » <li>เพิ่มข่าวสารและกิจกรรม</li>
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
										<i></i>เพิ่มข่าวสารและกิจกรรม </a>
								</li>
							</ul>
						</div>
						<div class="widget-body">
							<div class="form">
								<form enctype="multipart/form-data" id="news-form" action="{{route('news.edit',$news->cms_id)}}" method="post">
									@csrf
									<p class="note">ค่าที่มี <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span> จำเป็นต้องใส่ให้ครบ</p>
									<div class="row">
										<label for="News_cms_title" class="required">ชื่อหัวข้อ <span class="required">*</span></label> <input size="60" maxlength="250" class="span8" name="cms_title" id="News_cms_title" type="text" value="{{$news->cms_title}}" > <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="News_cms_title_em_" style="display:none"></div>
										</div>
									</div>

									<div class="row">
										<label for="News_cms_short_title" class="required">รายละเอียดย่อ <span class="required">*</span></label> <textarea rows="4" cols="40" class="span8" maxlength="255" name="cms_short_title" id="News_cms_short_title" >{{ $news->cms_short_title}}</textarea> <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="News_cms_short_title_em_" style="display:none"></div>
										</div>
									</div>

									<div class="row">
										<label for="News_cms_detail">เนื้อหาข่าว</label>
										<textarea rows="6" cols="50" class="span8 tinymce" name="cms_detail" id="cms_detail" aria-hidden="true">{!! htmlspecialchars_decode($news->cms_detail) !!}</textarea>
										<div class="error help-block">
											<div class="label label-important" id="News_cms_detail_em_" style="display:none"></div>
										</div>
									</div>

									<br>
									<div class="row">
									</div>
									<br>

									<div class="row">
										<label for="News_cms_picture">รูปภาพ</label>
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="input-append">
												<div class="uneditable-input span3">
													<i class="icon-file fileupload-exists"></i> 
													<span class="fileupload-preview"></span>
												</div>
												<img id="previewImage" src="#" alt="Preview Image" style="display: none;">
												<span class="btn btn-default btn-file">
													<span class="fileupload-new">Select file</span>
													<span class="fileupload-exists">Change</span>
													<input id="ytNews_cms_picture" type="hidden" value="{{$news->cms_picture}}" name="cms_picture">
													<input name="image" id="imageInput"  type="file" >
												</span>
												<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												{{-- <input type="file" id="imageInput" name="image"> --}}

											</div>
											<script>
												document.addEventListener('DOMContentLoaded', function() {
													var imageInput = document.getElementById('imageInput');
													var previewImage = document.getElementById('previewImage');
										
													imageInput.addEventListener('change', function() {
														previewImageFile(this);
													});
										
													function previewImageFile(input) {
														var file = input.files[0];
														if (file) {
															var reader = new FileReader();
															reader.onload = function(e) {
																previewImage.src = e.target.result;
																previewImage.style.display = 'block';
															};
															reader.readAsDataURL(file);
														}
													}
												});
											</script>
										</div>
										<div class="error help-block">
											<div class="label label-important" id="News_cms_picture_em_" style="display:none"></div>
										</div>
									</div>

									<div class="row">
										<font color="#990000">
                                             {{ $news->cms_picture}}
											<span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span> รูปภาพควรมีขนาด 250x180(แนวนอน) หรือ ขนาด 250x(xxx) (แนวยาว)
										</font>
									</div>
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