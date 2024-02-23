@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
<style>
    .video-js {
        max-width: 100%
    }

    /* the usual RWD shebang */

    .video-js {
        width: 350px !important; /* override the plugin's inline dims to let vids scale fluidly */
        height: 350px !important;
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


                <!-- Content -->
                <!-- <div class="span-19"> -->
                <div id="content">
                    <ul class="breadcrumb">
                        <li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a
                                href="/admin/index.php/lesson/index">ระบบบทเรียน</a></li> » <li>บทเรียน</li>
                    </ul><!-- breadcrumbs -->
                    <div class="separator bottom"></div>
                    <script src="{{asset('Adminkit/assets/js/jquery.validate.js')}}" type="text/javascript"></script>
                    <script src="{{asset('Adminkit/assets/js/tinymce-4.3.4/tinymce.min.js')}}" type="text/javascript"></script>
                    <script src="{{asset('Adminkit/assets/js/jquery.uploadifive.min.js')}}" type="text/javascript"></script>
                    <script src="{{asset('Adminkit/assets/js/jwplayer/jwplayer.js')}}" type="text/javascript"></script>
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

                                    if ($('#queue .uploadifive-queue-item').length == 0 && $('#docqueue .uploadifive-queue-item').length ==
                                        0) {
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
                                    $('#Lesson_image_em_').removeAttr('style').html(
                                        "<p class='error help-block'><span class='label label-important'> ไม่สามารถอัพโหลดได้ ไฟล์ที่สามารถอัพโหลดได้จะต้องเป็น: jpg, gif, png.</span></p>"
                                    );
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

                                external_filemanager_path: "resources/filemanager",
                                filemanager_title: "Responsive Filemanager",
                                external_plugins: {
                                    "filemanager": "resources/filemanager/plugin.min.js"
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
                                            <i></i>บทเรียน </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-body">
                                <div class="form">
                                       
                                        <div class="row">
                                            <label for="Lesson_course_id" class="required">หลักสูตรอบรมออนไลน์ <span
                                                    class="required">*</span></label> 
                                                    <h5>{{$lesson->course_title}}</h5>
                                            <div class="error help-block">
                                                <div class="label label-important" id="Lesson_course_id_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="Lesson_title" class="required">ชื่อบทเรียน <span
                                                    class="required">*</span></label>
                                                    <h5>{{$lesson->title}}</h5> 
                                            <div class="error help-block">
                                                <div class="label label-important" id="Lesson_title_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="Lesson_description" class="required">รายละเอียดย่อ <span
                                                    class="required">*</span></label>
                                                    <h5>{{$lesson->description}}</h5> 
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
                                                <span class="required">*</span></label> 
                                                <h5>{{$lesson->cate_amount}}</h5> 
                                            <div class="error help-block">
                                                <div class="label label-important" id="Lesson_cate_amount_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="Lesson_time_test">เวลาในการทำข้อสอบ</label> 
                                            <h5>{{$lesson->time_test}}</h5> 
                                            <div class="error help-block">
                                                <div class="label label-important" id="Lesson_time_test_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="Lesson_content" class="required">เนื้อหา <span
                                                    class="required">*</span></label>
                                            <h5>{!! htmlspecialchars_decode($lesson->content) !!}</h5> 
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
                                            </div>
                                            @else
                                            <h5>ไม่มีวิดีโอ</h5>
                                            @endif
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
                                            @if($filedoc != null)
                                            <a href="{{ route('lesson.downloadfile', ['id' => $filedoc->id]) }}" target="_blank" >{{ $filedoc->file_name}}</a>
                                            @else
                                            -
                                            @endif
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
