@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
@php
use App\Models\Teacher;

$teacher = Teacher::where('id',$course_detail->course_lecturer)->first();
@endphp
<style>
	.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #0dfa24;
}

input:focus + .slider {
  box-shadow: 0 0 1px #0dfa24;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
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
                                href="/admin/index.php/courseOnline/index">ระบบหลักสูตรนิสืต/นักศึกษา</a></li> » <li>
                            เพิ่มหลักสูตรนิสืต/นักศึกษา</li>
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
                                            <i></i>เพิ่มหลักสูตรสนิสืต/นักศึกษา </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-body">
                                <div class="form">
                                    {{-- แก้ไข --}}
                                    <form enctype="multipart/form-data" id="course-form"
                                        action="{{ route('courseonline.edit', ['id'=>$course_detail->course_id]) }}"
                                        method="post">
                                        @csrf
                                        <p class="note">ค่าที่มี
                                            <span style="margin:0;"
                                                class="btn-action single glyphicons circle_question_mark"><i></i>
                                            </span>
                                            จำเป็นต้องใส่ให้ครบ
                                        </p>
                                        <div class="row">
                                            <label for="CourseOnline_cate_id" class="required">หมวดอบรมออนไลน์
                                                <span class="required">*</span>
                                            </label>
                                            <select class="span8" name="cate_id" id="CourseOnline_cate_id">
                                                <option value="">ทั้งหมด</option>
                                                @foreach ($category as $cate_id => $cate_title)
                                                    <option value="{{ $cate_id }}"
                                                        {{ $course_detail->cate_id == $cate_id ? 'selected' : '' }}>
                                                        {{ $cate_title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span style="margin:0;"
                                                class="btn-action single glyphicons circle_question_mark"><i></i>
                                            </span>
                                            <div class="error help-block">
                                                <div class="label label-important" id="CourseOnline_cate_id_em_"
                                                    style="display:none">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="CourseOnline_course_lecturer">ชื่อวิยากร</label>
                                            <select class="span8" name="teacher_name"
                                                id="CourseOnline_course_lecturer">
                                                @if( $teacher != null)
                                                <option value="{{ $teacher->teacher_id }}">{{ $teacher->teacher_name}}</option>
                                                @else
                                                <option value="">-</option>
                                                @endif
                                                @foreach($teacher as $t)
                                                <option value="{{ $t->teacher_id }}">{{ $t->teacher_name}}</option>
                                                @endforeach
                                            </select>
                                            <span style="margin:0;"
                                                class="btn-action single glyphicons circle_question_mark"><i></i>
                                            </span>
                                            <div class="error help-block">
                                                <div class="label label-important" id="CourseOnline_course_lecturer_em_"
                                                    style="display:none">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="CourseOnline_course_title"
                                                class="required">ชื่อหลักสูตรอบรมออนไลน์
                                                <span class="required">*</span>
                                            </label>
                                            <input size="60" maxlength="255" class="span8"
                                                name="course_title"
                                                value="{{ $course_detail->course_title }}" id="CourseOnline_course_title"
                                                type="text">
                                            <span style="margin:0;"
                                                class="btn-action single glyphicons circle_question_mark"><i></i>
                                            </span>
                                            <div class="error help-block">
                                                <div class="label label-important" id="CourseOnline_course_title_em_"
                                                    style="display:none">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="CourseOnline_course_short_title" class="required">รายละเอียดย่อ
                                                <span class="required">*</span>
                                            </label>
                                            <textarea rows="6" cols="50" class="span8" name="course_short_title"
                                                id="CourseOnline_course_short_title">{!!  htmlspecialchars_decode($course_detail->course_short_title) !!}</textarea>
                                            <span style="margin:0;"
                                                class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                            <div class="error help-block">
                                                <div class="label label-important"
                                                    id="CourseOnline_course_short_title_em_" style="display:none">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="CourseOnline_course_detail" class="required">รายละเอียด <span
                                                    class="required">*</span></label>
                                                <div id="microtextbox-cms-detail" style="height: 600px"></div>
                                            {{-- <textarea rows="6" cols="50" class="span8 tinymce" name="course_detail"
                                                id="CourseOnline_course_detail" aria-hidden="true" style="">{!!  htmlspecialchars_decode($course_detail->course_detail) !!}</textarea> --}}
                                            <div class="error help-block">
                                                <div class="label label-important" id="CourseOnline_course_detail_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="row">
                                            <label for="CourseOnline_recommend">ปักหมุดหลักสูตรแนะนำ</label>
                                            <label class="switch">
                                                <input type="checkbox" id="toggleSwitch" name="recommend" >
                                                <span class="slider"></span>
                                              </label>
                                            <div class="error help-block">
                                                <div class="label label-important" id="CourseOnline_recommend_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>


                                     
                                        <div class="row">
                                            <label for="CourseOnline_course_note">หมายเหตุ</label> <input size="60"
                                                maxlength="255" class="span8" value="{{ $course_detail->course_note }}"
                                                name="course_note" id="CourseOnline_course_note"
                                                type="text">
                                            <div class="error help-block">
                                                <div class="label label-important" id="CourseOnline_course_note_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>      
                                        <div class="row">
                                        </div>

                                        <br>
                                        <div class="row">
                                            <div id="picture_show" style="">
                                                ภาพประกอบ <br>
                                                <img src="{{ asset('images/uploads/courseonline/'.$course_detail->course_id.'/original/'.$course_detail->course_picture) }}"
                                                    alt="รูปภาพ" style="width: 300px; " id="selected_picture"
                                                    value="{{ $course_detail->course_picture }}"
                                                    name="course_picture_o"><br><br>
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
                                                        <input id="ytNews_cms_picture" type="hidden" value="{{$course_detail->course_picture}}" name="cate_image">
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
                                                <span style="margin:0;"
                                                    class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                                รูปภาพควรมีขนาด 250x180(แนวนอน) หรือ ขนาด 250x(xxx) (แนวยาว)
                                            </font>
                                        </div>
                                        <br>

                                        <div class="row buttons">
                                            <button
                                                class="btn btn-primary btn-icon glyphicons ok_2"><i></i>อัปเดตข้อมูล</button>
                                        </div>
                                    </form>
                                    {{-- แก้ไข --}}
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
            // เมื่อมีการเปลี่ยนแปลงใน input checkbox
            document.getElementById("toggleSwitch").addEventListener("change", function() {
                if (this.checked) {
                    // ถ้า checkbox ถูกเลือก
                    console.log("เปิด");
                    // ใส่โค้ดที่ต้องการเมื่อเปิด
                } else {
                    // ถ้า checkbox ไม่ถูกเลือก
                    console.log("ปิด");
                    // ใส่โค้ดที่ต้องการเมื่อปิด
                }
                });
        </script>
         @php
         $text = htmlspecialchars_decode(htmlspecialchars_decode($course_detail->course_detail));
         @endphp
     
        <script>
         const text = '{!! $text !!}'
         const mtextboxConfig = {
             target: [
                 {
                     id: 'microtextbox-cms-detail',
                     name: 'course_detail',
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
