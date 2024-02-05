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
					<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a href="/admin/index.php/lesson/index">ระบบบทเรียน</a></li> » <li>เพิ่มบทเรียน</li>
				</ul><!-- breadcrumbs -->
				<div class="separator bottom"></div>
				<script src="/admin/js/jquery.validate.js" type="text/javascript"></script>
				<script src="/admin/js/tinymce-4.3.4/tinymce.min.js" type="text/javascript"></script>
				<script src="/admin/js/jquery.uploadifive.min.js" type="text/javascript"></script>
				<script src="/admin/../js/jwplayer/jwplayer.js" type="text/javascript"></script>
				<script type="text/javascript">
					jwplayer.key = "MOvEyr0DQm0f2juUUgZ+oi7ciSsIU3Ekd7MDgQ==";
				</script>
				<script type="text/javascript">
					function upload() {
						tinymce.triggerSave();
						var file = $('#Lesson_image').val();
						var exts = ['jpg', 'gif', 'png'];
						if (file) {
							var get_ext = file.split('.');
							get_ext = get_ext.reverse();
							if ($.inArray(get_ext[0].toLowerCase(), exts) > -1) {

								if ($('#queue .uploadifive-queue-item').length == 0 && $('#docqueue .uploadifive-queue-item').length == 0) {
									return true;
								} else {
									if ($('#queue .uploadifive-queue-item').length > 0) {
										$('#filename').uploadifive('upload');
										return false;
									} else if ($('#docqueue .uploadifive-queue-item').length > 0) {
										$('#doc').uploadifive('upload');
										return false;
									}
								}

							} else {
								$('#Lesson_image_em_').removeAttr('style').html("<p class='error help-block'><span class='label label-important'> ไม่สามารถอัพโหลดได้ ไฟล์ที่สามารถอัพโหลดได้จะต้องเป็น: jpg, gif, png.</span></p>");
								return false;
							}
						} else {
							if ($('#queue .uploadifive-queue-item').length == 0 && $('#docqueue .uploadifive-queue-item').length == 0) {
								return true;
							} else {
								if ($('#queue .uploadifive-queue-item').length > 0) {
									$('#filename').uploadifive('upload');
									return false;
								} else if ($('#docqueue .uploadifive-queue-item').length > 0) {
									$('#doc').uploadifive('upload');
									return false;
								}
							}
						}
					}

					function deleteVdo(vdo_id, file_id) {
						$.get("/admin/index.php/lesson/deleteVdo", {
							id: file_id
						}, function(data) {
							if ($.trim(data) == 1) {
								notyfy({
									dismissQueue: false,
									text: "ลบข้อมูลเรียบร้อย",
									type: 'success'
								});
								$('#' + vdo_id).parent().hide('fast');
							} else {
								alert('ไม่สามารถลบวิดีโอได้');
							}
						});
					}

					function deleteFileDoc(filedoc_id, file_id) {
						$.get("/admin/index.php/lesson/deleteFileDoc", {
							id: file_id
						}, function(data) {
							if ($.trim(data) == 1) {
								notyfy({
									dismissQueue: false,
									text: "ลบไฟล์เรียบร้อย",
									type: 'success'
								});
								$('#' + filedoc_id).parent().hide('fast');
							} else {
								alert('ไม่สามารถลบไฟล์ได้');
							}
						});
					}

					function editName(filedoc_id) {

						var name = $('#filenamedoc' + filedoc_id).val();

						$.get("/admin/index.php/lesson/editName", {
							id: filedoc_id,
							name: name
						}, function(data) {

							// if($.trim(data)==1){
							//     notyfy({dismissQueue: false,text: "เปลี่ยนชื่อไฟล์เรียบร้อย",type: 'success'});
							//     $('#'+filedoc_id).parent().hide('fast');
							// }else{
							//     alert('ไม่สามารถเปลี่ยนชื่อไฟล์ได้');
							// }
							$('#filenamedoc' + filedoc_id).hide();
							$('#filenamedoctext' + filedoc_id).text(name);
							$('#filenamedoctext' + filedoc_id).show();
							$('#btnEditName' + filedoc_id).show();
						});

					}

					$(function() {
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

							external_filemanager_path: "/admin/../filemanager/",
							filemanager_title: "Responsive Filemanager",
							external_plugins: {
								"filemanager": "/admin/../filemanager/plugin.min.js"
							}
						});
					});
				</script>

				<link rel="stylesheet" type="text/css" href="/admin/css/uploadifive.css">
				<style type="text/css">
					body {
						font: 13px Arial, Helvetica, Sans-serif;
					}

					.uploadifive-button {
						float: left;
						margin-right: 10px;
					}

					#queue {
						border: 1px solid #E5E5E5;
						height: 177px;
						overflow: auto;
						margin-bottom: 10px;
						padding: 0 3px 3px;
						width: 600px;
					}

					#docqueue {
						border: 1px solid #E5E5E5;
						height: 177px;
						overflow: auto;
						margin-bottom: 10px;
						padding: 0 3px 3px;
						width: 600px;
					}
				</style>
				<!-- innerLR -->
				<div class="innerLR">
					<div class="widget widget-tabs border-bottom-none">
						<div class="widget-head">
							<ul>
								<li class="active">
									<a class="glyphicons edit" href="#account-details" data-toggle="tab">
										<i></i>เพิ่มบทเรียน </a>
								</li>
							</ul>
						</div>
						<div class="widget-body">
							<div class="form">

								<form enctype="multipart/form-data" id="lesson-form" action="/admin/index.php/Lesson/create" method="post">
									{{-- แก้ไข --}}
									@csrf
									<p class="note">ค่าที่มี <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span> จำเป็นต้องใส่ให้ครบ</p>
									<div class="row">
										<label for="Lesson_course_id" class="required">หลักสูตรอบรมออนไลน์ <span class="required">*</span></label> <select class="span8" name="Lesson[course_id]" id="Lesson_course_id" required>
											<option value="">-- กรุณาเลือกหลักสูตร --</option>
											@foreach ($course_online as $course)
											<option value="{{ $course->course_id }}">{{$course->course_title}} &gt;&gt; {{ $course->cate_title }} &gt;&gt;{{ $course->course_title }}</option>
											@endforeach
											{{-- แก้ไข --}}						
										</select> <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="Lesson_course_id_em_" style="display:none"></div>
										</div>
									</div>

									<div class="row">
										<label for="Lesson_title" class="required">ชื่อบทเรียน <span class="required">*</span></label> <input size="60" maxlength="80" class="span8" name="Lesson[title]" id="Lesson_title" type="text" required> <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="Lesson_title_em_" style="display:none"></div>
										</div>
									</div>

									<div class="row">
										<label for="Lesson_description" class="required">รายละเอียดย่อ <span class="required">*</span></label> <textarea size="60" maxlength="255" class="span8" name="Lesson[description]" id="Lesson_description" required></textarea> <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="Lesson_description_em_" style="display:none"></div>
										</div>
									</div>
									<div class="row" style="display:none;">
										<label for="Lesson_view_all" class="required">สิทธิ์การดูบทเรียนนี้ <span class="required">*</span></label> <select class="span8" name="Lesson[view_all]" id="Lesson_view_all">
											<option value="y" selected="selected">ดูได้ทั้งหมด</option>
											<option value="n">ดูได้เฉพาะกลุ่ม</option>
										</select> <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="Lesson_view_all_em_" style="display:none"></div>
										</div>
									</div>
									<div class="row">
										<label for="Lesson_cate_amount" class="required">จำนวนครั้งที่สามารถทำข้อสอบได้ <span class="required">*</span></label> <input size="60" maxlength="255" class="span8" name="Lesson[cate_amount]" id="Lesson_cate_amount" type="text" value="2" required> ครั้ง
										<span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="Lesson_cate_amount_em_" style="display:none"></div>
										</div>
									</div>
									<div class="row">
										<label for="Lesson_time_test">เวลาในการทำข้อสอบ</label> <input size="60" maxlength="255" class="span8" name="Lesson[time_test]" id="Lesson_time_test" type="text" value="60" required> นาที
										<span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="Lesson_time_test_em_" style="display:none"></div>
										</div>
									</div>
									<div class="row">
										<label for="Lesson_content" class="required">เนื้อหา <span class="required">*</span></label>
										<div id="mceu_25" class="mce-tinymce mce-container mce-panel" hidefocus="1" tabindex="-1" role="application" style="visibility: hidden; border-width: 1px; width: 680px;">
											<div id="mceu_25-body" class="mce-container-body mce-stack-layout">
												<div id="mceu_26" class="mce-container mce-menubar mce-toolbar mce-stack-layout-item mce-first" role="menubar" style="border-width: 0px 0px 1px;">
													<div id="mceu_26-body" class="mce-container-body mce-flow-layout">
														<div id="mceu_27" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-first mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_27" role="menuitem" aria-haspopup="true"><button id="mceu_27-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">File</span> <i class="mce-caret"></i></button></div>
														<div id="mceu_28" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_28" role="menuitem" aria-haspopup="true"><button id="mceu_28-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Edit</span> <i class="mce-caret"></i></button></div>
														<div id="mceu_29" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_29" role="menuitem" aria-haspopup="true"><button id="mceu_29-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Insert</span> <i class="mce-caret"></i></button></div>
														<div id="mceu_30" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_30" role="menuitem" aria-haspopup="true"><button id="mceu_30-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">View</span> <i class="mce-caret"></i></button></div>
														<div id="mceu_31" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_31" role="menuitem" aria-haspopup="true"><button id="mceu_31-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Format</span> <i class="mce-caret"></i></button></div>
														<div id="mceu_32" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_32" role="menuitem" aria-haspopup="true"><button id="mceu_32-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Table</span> <i class="mce-caret"></i></button></div>
														<div id="mceu_33" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-last mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_33" role="menuitem" aria-haspopup="true"><button id="mceu_33-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Tools</span> <i class="mce-caret"></i></button></div>
													</div>
												</div>
												<div id="mceu_34" class="mce-toolbar-grp mce-container mce-panel mce-stack-layout-item" hidefocus="1" tabindex="-1" role="group">
													<div id="mceu_34-body" class="mce-container-body mce-stack-layout">
														<div id="mceu_35" class="mce-container mce-toolbar mce-stack-layout-item mce-first" role="toolbar">
															<div id="mceu_35-body" class="mce-container-body mce-flow-layout">
																<div id="mceu_36" class="mce-container mce-flow-layout-item mce-first mce-btn-group" role="group">
																	<div id="mceu_36-body">
																		<div id="mceu_0" class="mce-widget mce-btn mce-first mce-disabled" tabindex="-1" aria-labelledby="mceu_0" role="button" aria-label="Undo" aria-disabled="true"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-undo"></i></button></div>
																		<div id="mceu_1" class="mce-widget mce-btn mce-last mce-disabled" tabindex="-1" aria-labelledby="mceu_1" role="button" aria-label="Redo" aria-disabled="true"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-redo"></i></button></div>
																	</div>
																</div>
																<div id="mceu_37" class="mce-container mce-flow-layout-item mce-btn-group" role="group">
																	<div id="mceu_37-body">
																		<div id="mceu_2" class="mce-widget mce-btn mce-first" tabindex="-1" aria-labelledby="mceu_2" role="button" aria-label="Bold"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bold"></i></button></div>
																		<div id="mceu_3" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_3" role="button" aria-label="Italic"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-italic"></i></button></div>
																		<div id="mceu_4" class="mce-widget mce-btn mce-last" tabindex="-1" aria-labelledby="mceu_4" role="button" aria-label="Underline"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-underline"></i></button></div>
																	</div>
																</div>
																<div id="mceu_38" class="mce-container mce-flow-layout-item mce-btn-group" role="group">
																	<div id="mceu_38-body">
																		<div id="mceu_5" class="mce-widget mce-btn mce-first" tabindex="-1" aria-labelledby="mceu_5" role="button" aria-label="Align left"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignleft"></i></button></div>
																		<div id="mceu_6" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_6" role="button" aria-label="Align center"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-aligncenter"></i></button></div>
																		<div id="mceu_7" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_7" role="button" aria-label="Align right"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignright"></i></button></div>
																		<div id="mceu_8" class="mce-widget mce-btn mce-last" tabindex="-1" aria-labelledby="mceu_8" role="button" aria-label="Justify"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignjustify"></i></button></div>
																	</div>
																</div>
																<div id="mceu_39" class="mce-container mce-flow-layout-item mce-btn-group" role="group">
																	<div id="mceu_39-body">
																		<div id="mceu_9" class="mce-widget mce-btn mce-splitbtn mce-menubtn mce-first" role="button" tabindex="-1" aria-label="Bullet list" aria-haspopup="true"><button type="button" hidefocus="1" tabindex="-1"><i class="mce-ico mce-i-bullist"></i></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div>
																		<div id="mceu_10" class="mce-widget mce-btn mce-splitbtn mce-menubtn" role="button" tabindex="-1" aria-label="Numbered list" aria-haspopup="true"><button type="button" hidefocus="1" tabindex="-1"><i class="mce-ico mce-i-numlist"></i></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div>
																		<div id="mceu_11" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_11" role="button" aria-label="Decrease indent"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-outdent"></i></button></div>
																		<div id="mceu_12" class="mce-widget mce-btn mce-last" tabindex="-1" aria-labelledby="mceu_12" role="button" aria-label="Increase indent"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-indent"></i></button></div>
																	</div>
																</div>
																<div id="mceu_40" class="mce-container mce-flow-layout-item mce-last mce-btn-group" role="group">
																	<div id="mceu_40-body">
																		<div id="mceu_13" class="mce-widget mce-btn mce-menubtn mce-first mce-last mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_13" role="button" aria-haspopup="true"><button id="mceu_13-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Formats</span> <i class="mce-caret"></i></button></div>
																	</div>
																</div>
															</div>
														</div>
														<div id="mceu_41" class="mce-container mce-toolbar mce-stack-layout-item mce-last" role="toolbar">
															<div id="mceu_41-body" class="mce-container-body mce-flow-layout">
																<div id="mceu_42" class="mce-container mce-flow-layout-item mce-first mce-btn-group" role="group">
																	<div id="mceu_42-body">
																		<div id="mceu_14" class="mce-widget mce-btn mce-first mce-last" tabindex="-1" aria-labelledby="mceu_14" role="button" aria-label="Insert file"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-browse"></i></button></div>
																	</div>
																</div>
																<div id="mceu_43" class="mce-container mce-flow-layout-item mce-btn-group" role="group">
																	<div id="mceu_43-body">
																		<div id="mceu_15" class="mce-widget mce-btn mce-first" tabindex="-1" aria-labelledby="mceu_15" role="button" aria-label="Insert/edit link"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-link"></i></button></div>
																		<div id="mceu_16" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_16" role="button" aria-label="Remove link"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-unlink"></i></button></div>
																		<div id="mceu_17" class="mce-widget mce-btn mce-last" tabindex="-1" aria-labelledby="mceu_17" role="button" aria-label="Anchor"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-anchor"></i></button></div>
																	</div>
																</div>
																<div id="mceu_44" class="mce-container mce-flow-layout-item mce-btn-group" role="group">
																	<div id="mceu_44-body">
																		<div id="mceu_18" class="mce-widget mce-btn mce-first" tabindex="-1" aria-labelledby="mceu_18" role="button" aria-label="Insert/edit image"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-image"></i></button></div>
																		<div id="mceu_19" class="mce-widget mce-btn mce-last" tabindex="-1" aria-labelledby="mceu_19" role="button" aria-label="Insert/edit video"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-media"></i></button></div>
																	</div>
																</div>
																<div id="mceu_45" class="mce-container mce-flow-layout-item mce-btn-group" role="group">
																	<div id="mceu_45-body">
																		<div id="mceu_20" class="mce-widget mce-btn mce-colorbutton mce-first" role="button" tabindex="-1" aria-haspopup="true" aria-label="Text color"><button role="presentation" hidefocus="1" type="button" tabindex="-1"><i class="mce-ico mce-i-forecolor"></i><span id="mceu_20-preview" class="mce-preview"></span></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div>
																		<div id="mceu_21" class="mce-widget mce-btn mce-colorbutton mce-last" role="button" tabindex="-1" aria-haspopup="true" aria-label="Background color"><button role="presentation" hidefocus="1" type="button" tabindex="-1"><i class="mce-ico mce-i-backcolor"></i><span id="mceu_21-preview" class="mce-preview"></span></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div>
																	</div>
																</div>
																<div id="mceu_46" class="mce-container mce-flow-layout-item mce-last mce-btn-group" role="group">
																	<div id="mceu_46-body">
																		<div id="mceu_22" class="mce-widget mce-btn mce-first" tabindex="-1" aria-labelledby="mceu_22" role="button" aria-label="Print"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-print"></i></button></div>
																		<div id="mceu_23" class="mce-widget mce-btn" tabindex="-1" aria-labelledby="mceu_23" role="button" aria-label="Preview"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-preview"></i></button></div>
																		<div id="mceu_24" class="mce-widget mce-btn mce-last" tabindex="-1" aria-labelledby="mceu_24" role="button" aria-label="Source code"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-code"></i></button></div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div id="mceu_47" class="mce-edit-area mce-container mce-panel mce-stack-layout-item" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><iframe id="Lesson_content_ifr" frameborder="0" allowtransparency="true" title="Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help" src="javascript:&quot;&quot;" style="width: 100%; height: 300px; display: block;"></iframe></div>
												<div id="mceu_48" class="mce-statusbar mce-container mce-panel mce-stack-layout-item mce-last" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;">
													<div id="mceu_48-body" class="mce-container-body mce-flow-layout">
														<div id="mceu_49" class="mce-path mce-flow-layout-item mce-first">
															<div role="button" class="mce-path-item mce-last" data-index="0" tabindex="-1" id="mceu_49-0" aria-level="0">p</div>
														</div><label id="mceu_51" class="mce-wordcount mce-widget mce-label mce-flow-layout-item">Words: 0</label>
														<div id="mceu_50" class="mce-flow-layout-item mce-resizehandle mce-last"><i class="mce-ico mce-i-resize"></i></div>
													</div>
												</div>
											</div>
										</div><textarea class="tinymce" name="Lesson[content]" id="Lesson_content" aria-hidden="true" style="" required></textarea>
										<div class="error help-block">
											<div class="label label-important" id="Lesson_content_em_" style="display:none"></div>
										</div>
									</div>
									<br>
									<div class="row">
										<label for="File_filename">ไฟล์บทเรียน (mp3,mp4)</label>
										<div id="queue"></div>
										<input id="ytfilename" type="file" value="" name="File[filename]">
										{{-- <div id="uploadifive-filename" class="uploadifive-button" style="height: 30px; line-height: 30px; overflow: hidden; position: relative; text-align: center; width: 100px;">Select Files<input id="filename" multiple="multiple" name="File[filename]" type="file" style="display: none;"><input type="file" style="opacity: 0; position: absolute; z-index: 999;" multiple="multiple"></div> <!-- <input id="file_upload" name="file_upload" type="file" multiple="true" > -->
										<!-- <a style="position: relative; top: 8px;" href="javascript:$('#file_upload').uploadifive('upload')">Upload Files</a> -->
										<script type="text/javascript">
											$(function() {
												$('#filename').uploadifive({
													'auto': false,
													//'checkScript'      : 'check-exists.php',
													'checkScript': '/admin/index.php/lesson/checkExists',
													'formData': {
														'timestamp': '1702018825',
														'token': '318cbc63e6408e17d86446458d266d07'
													},
													'queueID': 'queue',
													'uploadScript': '/admin/index.php/lesson/uploadifive',
													'onQueueComplete': function(file, data) {
														//console.log(data);
														if ($('#docqueue .uploadifive-queue-item').length == 0) {
															$('#lesson-form').submit();
														} else {
															$('#doc').uploadifive('upload');
														}
													}
												});
											});
										</script> --}}
										<div class="error help-block">
											<div class="label label-important" id="File_filename_em_" style="display:none"></div>
										</div>
									</div>

									<div class="row">
										<label for="FileDoc_doc">ไฟล์ประกอบบทเรียน (pdf,docx,pptx)</label>
										<div id="docqueue"></div>
										<input id="ytdoc" type="file" value="" name="FileDoc[doc]">
										{{-- <div id="uploadifive-doc" class="uploadifive-button" style="height: 30px; line-height: 30px; overflow: hidden; position: relative; text-align: center; width: 100px;">Select Files<input id="doc" multiple="multiple" name="FileDoc[doc]" type="file" style="display: none;"><input type="file" style="opacity: 0; position: absolute; z-index: 999;" multiple="multiple"></div> <!-- <input id="file_upload" name="file_upload" type="file" multiple="true" > -->
										<!-- <a style="position: relative; top: 8px;" href="javascript:$('#file_upload').uploadifive('upload')">Upload Files</a> -->
										<script type="text/javascript">
											$(function() {
												$('#doc').uploadifive({
													'auto': false,
													//'checkScript'      : 'check-exists.php',
													//                    'checkScript'      : '//',
													'formData': {
														'timestamp': '1702018825',
														'token': '318cbc63e6408e17d86446458d266d07'
													},
													'queueID': 'docqueue',
													'uploadScript': '/admin/index.php/lesson/uploadifivedoc',
													'onQueueComplete': function(file, data) {
														//console.log(data);
														$('#lesson-form').submit();
													}
												});
											});
										</script> --}}
										<div class="error help-block">
											<div class="label label-important" id="FileDoc_doc_em_" style="display:none"></div>
										</div>
									</div>

									<br>
									<br>

									<div class="row">
									</div>
									<br>
									<div class="row">
										<label for="Lesson_image">รูปภาพ</label>
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="input-append">
												<div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-default btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input id="ytLesson_image" type="hidden" value="" name="Lesson[image]"><input name="Lesson[image]" id="Lesson_image" type="file"></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
											</div>
										</div>
										<div class="error help-block">
											<div class="label label-important" id="Lesson_image_em_" style="display:none"></div>
										</div>
									</div>

									<div class="row">
										<font color="#990000">
											<span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span> รูปภาพควรมีขนาด 175x130(แนวนอน) หรือ ขนาด 175x(xxx) (แนวยาว)
										</font>
									</div>
									<br><br>

									<div class="row buttons">
										<button class="btn btn-primary btn-icon glyphicons ok_2" onclick="return upload();"><i></i>บันทึกข้อมูล</button>
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