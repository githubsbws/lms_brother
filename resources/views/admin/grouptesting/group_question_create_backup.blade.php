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
										<i></i>เพิ่มชุดข้อสอบออนไลน์ </a>
								</li>
							</ul>
						</div>
						<div class="widget-body">
							<div class="form">
								<form enctype="multipart/form-data" id="news-form" action="{{route('group_question.create')}}" method="post">
									@csrf
									<p class="note">ค่าที่มี <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span> จำเป็นต้องใส่ให้ครบ</p>
									<div class="row">
										<label for="Grouptesting_lesson_id" class="required">ชื่อบทเรียนออนไลน์ <span class="required">*</span></label> <select class="span8" name="group_id" id="Grouptesting_lesson_id">
											@foreach ($grouptesting as $item)
											<option value="{{ $item->group_id}}">{{$item->group_title}}</option>
											@endforeach
										</select> <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="Grouptesting_lesson_id_em_" style="display:none"></div>
										</div>
									</div>

									<div class="row">
										<label for="Grouptesting_group_title" class="required">ประเภท <span class="required">*</span></label>
										<input type="radio" class="btn btn-primary" id="radio1" name="radio" value="1" ><span>Checkbox</span><br>
										<input type="radio" class="btn btn-primary" id="radio2" name="radio" value="2" ><span>Radio</span><br> 
										<input type="radio" class="btn btn-primary" id="radio3" name="radio" value="3" ><span>Textarea</span><br>
										{{-- <input type="button" class="btn btn-primary" id="radio1" name="radio" value="เพิ่ม" onclick="addCheckbox()"><span>Checkbox</span><br><br>
										<div id="inputContainer1"></div>

										<input type="button" class="btn btn-primary" id="radio2" name="radio" value="เพิ่ม" onclick="addRadio()"><span>Radio</span><br><br>
										<div id="inputContainer2"></div>
										
										<input type="button" class="btn btn-primary" id="radio3" name="radio" value="เพิ่ม" onclick="addTextarea()"><span>Textarea</span><br>

										<div id="textareaContainer"></div> --}}
										<div class="error help-block">
											<div class="label label-important" id="Grouptesting_group_title_em_" style="display:none"></div>
										</div>
									</div>
									<div class="row">
										<label for="Grouptesting_group_title" class="required">หัวข้อ <span class="required">*</span></label> 
										<textarea rows="6" cols="50" class="span8 tinymce" name="ques_title" id="ques_title" aria-hidden="true" ></textarea>
										<div class="error help-block">
											<div class="label label-important" id="Grouptesting_group_title_em_" style="display:none"></div>
										</div>
									</div>
									<div class="row">
										<label for="Grouptesting_group_title" class="required">รายละเอียดย่อ <span class="required">*</span></label> 
										<textarea rows="6" cols="50" class="span8 tinymce" name="ques_explain" id="ques_explain" aria-hidden="true" ></textarea>
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
	<script>
		// เพิ่ม textarea ใหม่
		function addTextarea() {
			var container = document.getElementById("textareaContainer");
			var newTextarea = document.createElement("textarea");
			newTextarea.rows = "4";
			newTextarea.cols = "50";
			newTextarea.className = "span8 tinymce"; 
			container.appendChild(newTextarea);

			// เพิ่มปุ่มลบ
			var deleteButton = document.createElement("button");
			deleteButton.textContent = "ลบ";
			deleteButton.onclick = function() {
				container.removeChild(newTextarea);
				container.removeChild(deleteButton);
			};
			
			container.appendChild(newTextarea);
			container.appendChild(deleteButton);
		}
		function addCheckbox() {
			var container = document.getElementById("inputContainer1");
			var newCheckbox = document.createElement("input");
			newCheckbox.type = "checkbox";
			newCheckbox.className = "dynamic-input";

			var textInput = document.createElement("input");
			textInput.type = "text";
			textInput.placeholder = "กรุณาใส่ข้อความ";
			
			// เพิ่มปุ่มลบ
			var deleteButton = document.createElement("button");
			deleteButton.textContent = "ลบ";
			deleteButton.onclick = function() {
				container.removeChild(newCheckbox);
				container.removeChild(textInput);
				container.removeChild(deleteButton);
			};
			
			container.appendChild(newCheckbox);
			container.appendChild(textInput);
			container.appendChild(deleteButton);
		}
		function addRadio() {
			var container = document.getElementById("inputContainer2");
			var newRadio = document.createElement("input");
			newRadio.type = "radio";
			newRadio.name = "dynamicRadio";
			newRadio.className = "dynamic-input";
			
			// เพิ่มปุ่มลบ
			var deleteButton = document.createElement("button");
			deleteButton.textContent = "ลบ";
			deleteButton.onclick = function() {
				container.removeChild(newRadio);
				container.removeChild(deleteButton);
			};
			
			container.appendChild(newRadio);
			container.appendChild(deleteButton);
		}
		</script>
</body>
@endsection