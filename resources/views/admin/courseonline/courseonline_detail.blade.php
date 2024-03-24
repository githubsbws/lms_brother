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
                        <li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a
                                href="/admin/index.php/courseOnline/index">ระบบหลักสูตรนิสืต/นักศึกษา</a></li> » <li>
                            หลักสูตรนิสืต/นักศึกษา</li>
                    </ul><!-- breadcrumbs -->
                    <div class="separator bottom"></div>

                    <!-- innerLR -->
                    <div class="innerLR">
                        <div class="widget widget-tabs border-bottom-none">
                            <div class="widget-head">
                                <ul>
                                    <li class="active">
                                        <a class="glyphicons edit" href="#account-details" data-toggle="tab">
                                            <i></i>หลักสูตรสนิสืต/นักศึกษา </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-body">
                                <div class="form">
                                    
                                        <div class="row">
                                            <label for="CourseOnline_cate_id" class="required">หมวดอบรมออนไลน์
                                                <span class="required">*</span>
                                            </label>
                                           <h5>{{ $course_online->cate_title}}</h5>
                                            <div class="error help-block">
                                                <div class="label label-important" id="CourseOnline_cate_id_em_"
                                                    style="display:none">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="row">
                                                             <label for="CourseOnline_course_number">รหัสหลักสูตร</label>					<input class="span8" name="CourseOnline[course_number]" id="CourseOnline_course_number" type="text" maxlength="255" />					<span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>					<div class="error help-block"><div class="label label-important" id="CourseOnline_course_number_em_" style="display:none"></div></div>				</div> -->

                                        <!-- <div class="row">
                                                             <label for="CourseOnline_course_rector_date">หลักสูตรได้รับความเห็นชอบเมื่อวันที่</label>					<input class="span8" readonly="readonly" id="CourseOnline_course_rector_date" name="CourseOnline[course_rector_date]" type="text" />					<span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>					<div class="error help-block"><div class="label label-important" id="CourseOnline_course_rector_date_em_" style="display:none"></div></div>				</div> -->

                                        <div class="row">
                                            <label for="CourseOnline_course_lecturer">ชื่อวิยากร</label>
                                            <h5>{{ $course_online->teacher_name == '' ? '-' : $course_online->teacher_name }}</h5>
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
                                            <h5>{{ $course_online->course_title}}</h5>
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
                                            <h5>{{ $course_online->course_short_title}}</h5>
                                            <div class="error help-block">
                                                <div class="label label-important"
                                                    id="CourseOnline_course_short_title_em_" style="display:none">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="CourseOnline_course_detail" class="required">รายละเอียด <span
                                                    class="required">*</span></label>
                                                <h5>{!! htmlspecialchars_decode(htmlspecialchars_decode($course_online->course_detail))  !!}</h5>
                                            <div class="error help-block">
                                                <div class="label label-important" id="CourseOnline_course_detail_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>
                                        <br>


                                        <div class="row">
                                            <label for="CourseOnline_recommend">ปักหมุดหลักสูตรแนะนำ</label>
                                            @if($course_online->recommend == 'y')
                                            <h5>เปิด</h5>
                                            @else
                                            <h5>ไม่เปิด</h5>
                                            @endif
                                            <div class="error help-block">
                                                <div class="label label-important" id="CourseOnline_recommend_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <label for="CourseOnline_course_note">หมายเหตุ</label> 
                                            <h5>{{ $course_online->course_note}}</h5>
                                            <div class="error help-block">
                                                <div class="label label-important" id="CourseOnline_course_note_em_"
                                                    style="display:none"></div>
                                            </div>
                                        </div>

                                        <!-- <div class="row">
                                                             <label for="CourseOnline_course_price">ราคา</label>					<input class="span8" name="CourseOnline[course_price]" id="CourseOnline_course_price" type="text" value="0" />					<span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>					<div class="error help-block"><div class="label label-important" id="CourseOnline_course_price_em_" style="display:none"></div></div>				</div> -->

                                        <div class="row">
                                        </div>

                                        <br>
                                        <div class="row">
                                            <div id="picture_show" style="">
                                                ภาพประกอบ <br>
                                                <img src="{{ asset('images/uploads/courseonline/'.$course_online->course_id.'/original/'. $course_online->course_picture) }}"
                                                    alt="รูปภาพ" style="width: 300px; " id="selected_picture"
                                                    name="course_picture_o"><br><br>
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
