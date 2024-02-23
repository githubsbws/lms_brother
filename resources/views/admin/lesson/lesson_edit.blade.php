@extends('admin.layouts.mainlayout')
@section('title', 'Admin')
@section('content')
<style>
    .video-js {
            max-width: 100%
        }
    
        /* the usual RWD shebang */
    
        .video-js {
            width: 350px !important; /* override the plugin's inline dims to let vids scale fluidly */
            height: 200px !important;
        }
    
        .video-js video {
            position: relative !important;
        } 
</style>
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

                <!-- Content -->
                <!-- <div class="span-19"> -->
                <div id="content">
                    <ul class="breadcrumb">
                        <li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a
                                href="/admin/index.php/lesson/index">ระบบบทเรียน</a></li> » <li>แก้ไขบทเรียน</li>
                    </ul><!-- breadcrumbs -->
                    <div class="separator bottom"></div>
                    

                    <!-- innerLR -->
                    <div class="innerLR">
                        <div class="widget widget-tabs border-bottom-none">
                            <div class="widget-head">
                                <ul>
                                    <li class="active">
                                        <a class="glyphicons edit" href="#account-details" data-toggle="tab">
                                            <i></i>แก้ไขบทเรียน </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-body">
                                <div class="form">

                                    <form enctype="multipart/form-data" id="lesson-form"
                                        action="{{ route('lesson.edit', ['id' =>$lesson->id]) }}" method="post">
                                        {{-- แก้ไข --}}
                                        @csrf
                                        <p class="note">ค่าที่มี <span style="margin:0;"
                                                class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                            จำเป็นต้องใส่ให้ครบ</p>
                                        <div class="row">
                                            <label for="Lesson_course_id" class="required">หลักสูตรอบรมออนไลน์ <span
                                                    class="required">*</span></label> <select class="span8"
                                                name="course_id" id="Lesson_course_id">
                                                <option value="{{$lesson->course_id}}">{{ $lesson->course_title}}</option>
                                                @foreach($course_online as $course)
                                                <option value="{{ $course->course_id }}">{{ $course->course_title}}</option>
                                                @endforeach
                                            </select> <span style="margin:0;"
                                                class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                            <div class="error help-block">
                                                <div class="label label-important" id="Lesson_course_id_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="Lesson_title" class="required">ชื่อบทเรียน <span
                                                    class="required">*</span></label> <input size="60" maxlength="80"
                                                class="span8" name="title" id="Lesson_title" type="text"
                                                value="{{ $lesson->title }}"> <span style="margin:0;"
                                                class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                            <div class="error help-block">
                                                <div class="label label-important" id="Lesson_title_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="Lesson_description" class="required">รายละเอียดย่อ <span
                                                    class="required">*</span></label>
                                            <textarea size="60" maxlength="255" class="span8" name="description" id="Lesson_description">{{ $lesson->description }}</textarea> <span style="margin:0;"
                                                class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                            <div class="error help-block">
                                                <div class="label label-important" id="Lesson_description_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>
                                        <div class="row" style="display:none;">
                                            <label for="Lesson_view_all" class="required">สิทธิ์การดูบทเรียนนี้ <span
                                                    class="required">*</span></label> <select class="span8"
                                                name="view_all" id="Lesson_view_all">
                                                <option value="y" selected="selected">ดูได้ทั้งหมด</option>
                                                <option value="n">ดูได้เฉพาะกลุ่ม</option>
                                            </select> <span style="margin:0;"
                                                class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                            <div class="error help-block">
                                                <div class="label label-important" id="Lesson_view_all_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="Lesson_cate_amount" class="required">จำนวนครั้งที่สามารถทำข้อสอบได้
                                                <span class="required">*</span></label> <input size="60"
                                                maxlength="255" class="span8" name="cate_amount"
                                                id="Lesson_cate_amount" type="text"
                                                value="{{ $lesson->cate_amount }}"> ครั้ง
                                            <span style="margin:0;"
                                                class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                            <div class="error help-block">
                                                <div class="label label-important" id="Lesson_cate_amount_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="Lesson_time_test">เวลาในการทำข้อสอบ</label> <input size="60"
                                                maxlength="255" class="span8" name="time_test"
                                                id="Lesson_time_test" type="text" value="{{ $lesson->time_test }}">
                                            นาที
                                            <span style="margin:0;"
                                                class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                            <div class="error help-block">
                                                <div class="label label-important" id="Lesson_time_test_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="Lesson_content" class="required">เนื้อหา <span
                                                    class="required">*</span></label>
                                            <textarea rows="6" cols="50" class="span8 tinymce" name="content" id="Lesson_content" aria-hidden="true">{!! htmlspecialchars_decode($lesson->content) !!}</textarea>
                                            <div class="error help-block">
                                                <div class="label label-important" id="Lesson_content_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div id="vdo_show" style="">
                                                
                                        </div>
                                        <br>
                                        <div class="row">
                                            <label for="File_filename">ไฟล์บทเรียน (mp3,mp4)</label>
                                            @if($file != null)
                                            
														<div class="col-md-6">
															<video id="example_video_1" class="video-js vjs-default-skin" controls="" preload="none" data-setup="{}" controlsList="nodownload">
																{{-- <source src="/../images/storage/uploads/lesson/{{$lesson->filename}}" type="video/mp4"> --}}
																<source src="{{asset('images/uploads/lesson/'.$file->filename)}}" type="video/mp4">
																<!-- <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
																			<source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' /> -->
																<!-- <track kind="captions" src="demo.captions.vtt" srclang="en" label="English"></track> -->
																<!-- Tracks need an ending tag thanks to IE9 -->
																<!-- <track kind="subtitles" src="demo.captions.vtt" srclang="en" label="English"></track> -->
																<!-- Tracks need an ending tag thanks to IE9 -->
																<p class="vjs-no-js">To view this video please
																	enable JavaScript, and consider upgrading to
																	a
																	web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
																</p>
															</video>
                                                            <a class="btn-action glyphicons pencil btn-danger remove_2" title="ลบ" onclick="showSweetAlert()" href="{{route('lesson_video.delete', ['id' => $file->id])}}"><i></i></a>
														</div>
                                                    
														@else
														<h5>ไม่มีวิดีโอ</h5>
                                            
													@endif
                                            <div id="queue"></div>
                                            <input id="ytfilename" type="file" value="" name="filename">
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
                                                <div class="label label-important" id="File_filename_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div id="doc_show" style="">
                                               
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <label for="FileDoc_doc">ไฟล์ประกอบบทเรียน (pdf,docx,pptx)</label>
                                            @if($filedoc !== null)
                                            <h5>{{ $filedoc->file_name}}</h5>
                                
                                            @else
                                            <h5>ไม่มีไฟล์</h5>
                                            @endif
                                            <div id="docqueue"></div>
                                            <input id="ytdoc" type="file" value="" name="doc">
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
                                                <div class="label label-important" id="FileDoc_doc_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>

                                        <br>
                                        <br>

                                        <div class="row">
                                            <div id="picture_show" style="">
                                                ภาพประกอบ <br>
                                                <img src="{{ asset('images/uploads/lesson/'.$lesson->id.'/original/'. $lesson->image) }}"
                                                    alt="รูปภาพ" style="width: 300px; " id="selected_picture"
                                                    value="{{ $lesson->image }}" name="lesson_picture_o"><br><br>
                                            </div>
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
                                                        <input id="ytNews_cms_picture" type="hidden" value="{{$lesson->image}}" name="picture">
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
                                        </div>
                                        <div class="row">
                                            <font color="#990000">
                                                <span style="margin:0;"
                                                    class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                                รูปภาพควรมีขนาด 175x130(แนวนอน) หรือ ขนาด 175x(xxx) (แนวยาว)
                                            </font>
                                        </div>
                                        <br><br>

                                        <div class="row buttons">
                                            <button class="btn btn-primary btn-icon glyphicons ok_2"
                                                onclick="return upload();"><i></i>อัปเดตข้อมูล</button>
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
