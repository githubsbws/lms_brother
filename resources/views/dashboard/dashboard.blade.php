@extends('layout/mainlayout')
@section('title', 'Dashboard')
@section('content')
<?php
use App\Models\Lesson;
use App\Models\Learn;
?>
<body>

    <div id="content">
        <style>
            .text-subhead {
                font-size: 1.50rem;
            }

            .text-caption {
                font-size: 1.2rem;
                font-weight: 400;
            }

            thead {
                background-color: #42A5F5;
            }
        </style>
        <div class="parallax overflow-hidden page-section bg-blue-300">
            <div class="container parallax-layer" data-opacity="true" style="transform: translate3d(0px, 0px, 0px); opacity: 1;">
                <div class="media media-grid v-middle">
                    <div class="media-left">
                        <span class="icon-block half bg-blue-500 text-white" style="height: 45px;"><i class="fa fa-tachometer"></i></span>
                    </div>
                    <div class="media-body">
                        <h3 class="text-display-2 text-white margin-none">Dashboard</h3>
                        <p class="text-white text-subhead" style="font-size: 1.6rem;">รวมหลักสูตร การทำงานของ Product ของ
                            Brother</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="page-section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row" data-toggle="isotope" style="position: relative; height: 790.713px;">
                            <div class="item col-xs-12 col-lg-6" style="position: absolute; left: 0px; top: 0px;">
                                <!-- <h4 class="margin-none">ความเคลื่อนไหวเว็บบอร์ด</h4>

                        <p class="text-subhead text-light">Latest forum topics & comments</p> -->
                                <div class="panel panel-primary paper-shadow" data-z="0.5">
                                    <div class="panel-heading">
                                        <h4 class="margin-none" style="color: white;font-weight: bold;">เว็บบอร์ด</h4>

                                        <p class="text-subhead text-light" style="color: white;">ความเคลื่อนไหวเว็บบอร์ด</p>
                                    </div>
                                    <ul class="list-group relative paper-shadow" data-hover-z="0.5" data-animated="">
                                        <li class="list-group-item paper-shadow">
                                            <div class="media v-middle">
                                                <div class="media-left">
                                                    <img src="/lms_brother_docker/lms/app/themes/bws/images/logo_course2.png" alt="person" class="img-circle width-40">
                                                </div>
                                                <div class="media-body">
                                                    <a href="/lms_brother_docker/lms/app/index.php/forum/forum/forum/id/2/class/link-text-color">Engine: New Mono Laser</a>
                                                    <div class="text-light">
                                                        Topic: <a class="" href="/lms_brother_docker/lms/app/index.php/forum/forum/topic/id/28">ปัญหาการใช้งาน</a> &nbsp;
                                                        By: <a href="#">Kritchanon</a>
                                                    </div>
                                                </div>
                                                <div class="media-right">
                                                    <div class="width-100 text-right">
                                                        <span class="text-caption text-light">
                                                            1329 day
                                                            2 hr
                                                            15 min
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item paper-shadow">
                                            <div class="media v-middle">
                                                <div class="media-left">
                                                    <img src="/lms_brother_docker/lms/app/themes/bws/images/logo_course2.png" alt="person" class="img-circle width-40">
                                                </div>
                                                <div class="media-body">
                                                    <a href="/lms_brother_docker/lms/app/index.php/forum/forum/forum/id/2/class/link-text-color">Engine: New Mono Laser</a>
                                                    <div class="text-light">
                                                        Topic: <a class="" href="/lms_brother_docker/lms/app/index.php/forum/forum/topic/id/28">ปัญหาการใช้งาน</a> &nbsp;
                                                        By: <a href="#">Kritchanon</a>
                                                    </div>
                                                </div>
                                                <div class="media-right">
                                                    <div class="width-100 text-right">
                                                        <span class="text-caption text-light">
                                                            1329 day
                                                            2 hr
                                                            16 min
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item paper-shadow">
                                            <div class="media v-middle">
                                                <div class="media-left">
                                                    <img src="/lms_brother_docker/lms/app/themes/bws/images/logo_course2.png" alt="person" class="img-circle width-40">
                                                </div>
                                                <div class="media-body">
                                                    <a href="/lms_brother_docker/lms/app/index.php/forum/forum/forum/id/2/class/link-text-color">Engine: New Mono Laser</a>
                                                    <div class="text-light">
                                                        Topic: <a class="" href="/lms_brother_docker/lms/app/index.php/forum/forum/topic/id/27">TEST SUBJECT</a> &nbsp;
                                                        By: <a href="#">Kritchanon</a>
                                                    </div>
                                                </div>
                                                <div class="media-right">
                                                    <div class="width-100 text-right">
                                                        <span class="text-caption text-light">
                                                            1449 day
                                                            3 hr
                                                            31 min
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item paper-shadow">
                                            <div class="media v-middle">
                                                <div class="media-left">
                                                    <img src="/lms_brother_docker/lms/app/themes/bws/images/logo_course2.png" alt="person" class="img-circle width-40">
                                                </div>
                                                <div class="media-body">
                                                    <a href="/lms_brother_docker/lms/app/index.php/forum/forum/forum/id/2/class/link-text-color">Engine: New Mono Laser</a>
                                                    <div class="text-light">
                                                        Topic: <a class="posted" href="/lms_brother_docker/lms/app/index.php/forum/forum/topic/id/1">Outline</a> &nbsp;
                                                        By: <a href="#">admin</a>
                                                    </div>
                                                </div>
                                                <div class="media-right">
                                                    <div class="width-100 text-right">
                                                        <span class="text-caption text-light">
                                                            1701 day
                                                            3 hr
                                                            38 min
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item paper-shadow">
                                            <div class="media v-middle">
                                                <div class="media-left">
                                                    <img src="/lms_brother_docker/lms/app/themes/bws/images/logo_course2.png" alt="person" class="img-circle width-40">
                                                </div>
                                                <div class="media-body">
                                                    <a href="/lms_brother_docker/lms/app/index.php/forum/forum/forum/id/9/class/link-text-color">ข่าวสารและกิจกรรม</a>
                                                    <div class="text-light">
                                                        Topic: <a class="" href="/lms_brother_docker/lms/app/index.php/forum/forum/topic/id/26">ผมไม่สอบ ไม่ผ่าน จะทำอย่างไรครับ</a> &nbsp;
                                                        By: <a href="#">ForTest</a>
                                                    </div>
                                                </div>
                                                <div class="media-right">
                                                    <div class="width-100 text-right">
                                                        <span class="text-caption text-light">
                                                            1834 day
                                                            0 hr
                                                            10 min
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item col-xs-12 col-lg-6" style="position: absolute; left: 580px; top: 0px;">
                                <div class="panel panel-primary paper-shadow" data-z="0.5">
                                    <div class="panel-heading">
                                        <h4 class="margin-none" style="color: white;font-weight: bold;">หลักสูตร</h4>

                                        <p class="text-subhead text-light" style="color: white;">หลักสูตรทั้งหมดที่ต้องเรียน</p>
                                    </div>
                                    <ul class="list-group">
                                        
                                        @foreach ($course as $cs)
                                        @php $lesson = Lesson::where('course_id',$cs->course_id)->count();
                                        $lesson_c = Lesson::where('course_id',$cs->course_id)->get(); 
                                        $i = 1;
                                        $pass = 0;
                                        $learning = 0;
                                        $notlearn = 0;
                                        foreach ($lesson_c as $key ) {
                                            $status = Learn::where('lesson_id',$key->id)->get();

                                            if ($status == "pass") {
                                            $pass = $pass + 1;
                                            }
                                            if ($status == "learning") {
                                                $learning = $learning + 1;
                                            }
                                            if ($status == "notLearn") {
                                                $notlearn = $notlearn + 1;
                                            }
                                            $i++;
                                        }
                                        $per = ($pass / $lesson) * 100;
                                        @endphp
                                        <li class="list-group-item media v-middle">
                                            <div class="media-body">
                                                <a href="{{ route('course.detail', ['id' => $cs->course_id]) }}" class="text-subhead list-group-link">
                                                    {{ $cs->course_title }} </a>
                                                <br>
                                                <p style="font-size:18px;">เรียนแล้ว <label style="color: #00A000; font-weight: 600;">{{ $pass }}</label> : ยังไม่เรียน <label style="color: red; font-weight: 600;">{{ $notlearn }} </label> : กำลังเรียน <label>{{ $learning }}</label></p>
                                            </div>

                                            <div class="media-right" align="center">
                                                <label style="color: #00A000; font-weight: 600;">{{ $pass }}</label> จาก <label style="color: #00A000; font-weight: 600;">{{ $lesson }}</label>
                                                <div class="progress progress-mini width-100 margin-none">
                                                    <div class="progress-bar progress-bar-green-300" role="progressbar"
                                                     aria-valuenow="" aria-valuemin="0"
                                                     aria-valuemax="100"
                                                     style="width:{{ $per }}%;">
                                                </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="margin-none" style="color: white;font-weight: bold;">ผลการเรียน</h4>
                                <p class="text-subhead text-light" style="color: white;">ผลการเรียน</p>
                            </div>
                        </div>
                        <div class="panel-group" id="accordion" style="margin-top: 10px;">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="col-md-10" style="padding-top: 12px;">
                                        <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapse10">
                                            <h4 class="panel-title panel-title-adjust">
                                                <!-- หลักสูตร: หลักสูตรการทำงานเป็นทีม -->
                                                หลักสูตร: การซ่อมบำรุงจักรเย็บผ้ารุ่น GS2700
                                            </h4>
                                        </a>
                                    </div>
                                    <!--    <div class="col-md-2" style="text-align: right;" id="btn_">
                        <a href="survey.php" class="btn btn-success">ทำแบบประเมิน</a>
                    </div> -->
                                    <div class="clearfix"></div>
                                </div>
                                <div style="height: auto;" id="collapse10" class="panel-collapse collapse ">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table v-middle table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">บทเรียน</th>
                                                        <th class="text-center">สถานะการเรียน</th>
                                                        <th class="text-center">แบบทดสอบ</th>
                                                        <th class="text-center">สิทธิการทำแบบทดสอบ</th>
                                                        <th class="text-center">แบบสอบถาม</th>
                                                        <th class="text-center">ผลการสอบ(คะแนนที่ดีที่สุด)</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="responsive-table-body">
                                                    <tr>
                                                        <td>
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/223?lesson_id=383">บทที่ 1. แนะนำผลิตภัณฑ์ จักรเย็บผ้า GS2700</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/223?lesson_id=383"><span style="color:green;">เรียนผ่าน</span></a></td>
                                                        <td class="text-center">
                                                            - </td>
                                                        <td class="text-center">
                                                            -
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-warning" style="font-size: medium; letter-spacing: 2px !important;">ไม่มีแบบสอบถาม</label></p>


                                                        </td>

                                                        <td class="text-center">0 / 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/223?lesson_id=384">บทที่ 2. การใช้งานเบื้องต้น </a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/223?lesson_id=384"><span style="color:green;">เรียนผ่าน</span></a></td>
                                                        <td class="text-center">
                                                            - </td>
                                                        <td class="text-center">
                                                            -
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-warning" style="font-size: medium; letter-spacing: 2px !important;">ไม่มีแบบสอบถาม</label></p>


                                                        </td>

                                                        <td class="text-center">0 / 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/223?lesson_id=385">บทที่ 2.(ต่อเนื่อง) ส่วนประกอบของเครื่อง </a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/223?lesson_id=385"><span style="color:blue;">กำลังเรียน</span></a></td>
                                                        <td class="text-center">
                                                            - </td>
                                                        <td class="text-center">
                                                            -
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-warning" style="font-size: medium; letter-spacing: 2px !important;">ไม่มีแบบสอบถาม</label></p>

                                                        </td>

                                                        <td class="text-center">0 / 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/223?lesson_id=386">บทที่ 3.การถอด/ประกอบ เครื่อง GS2700</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/223?lesson_id=386"><span style="color:red;">ยังไม่ได้เรียน</span></a></td>
                                                        <td class="text-center">
                                                            - </td>
                                                        <td class="text-center">
                                                            -
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-warning" style="font-size: medium; letter-spacing: 2px !important;">ไม่มีแบบสอบถาม</label></p>

                                                        </td>

                                                        <td class="text-center">0 / 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/223?lesson_id=388">บทที่ 4.การปรับตั้งค่า ใช้งาน (Adjustment)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/223?lesson_id=388"><span style="color:red;">ยังไม่ได้เรียน</span></a></td>
                                                        <td class="text-center">
                                                            - </td>
                                                        <td class="text-center">
                                                            -
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-warning" style="font-size: medium; letter-spacing: 2px !important;">ไม่มีแบบสอบถาม</label></p>

                                                        </td>

                                                        <td class="text-center">0 / 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/223?lesson_id=389">บทที่ 5 แบบทดสอบ GS2700 ภาคทฏษฎี 10 ข้อ</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/223?lesson_id=389"><span style="color:red;">ยังไม่ได้เรียน</span></a></td>
                                                        <td class="text-center">
                                                            - </td>
                                                        <td class="text-center">
                                                            -
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-warning" style="font-size: medium; letter-spacing: 2px !important;">ไม่มีแบบสอบถาม</label></p>

                                                        </td>

                                                        <td class="text-center">0 / 0</td>
                                                    </tr>


                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--    <div class="panel panel-warning">
                                   <div class="panel-heading">
                                       <div class="col-md-10" style="padding-top: 12px;">
                                           <a class="" data-toggle="collapse" data-parent="#accordion"
                                              href="#collapse2">
                                               <h4 class="panel-title panel-title-adjust">
                                                   หลักสูตร: หลักสูตรการทำงานเป็นทีม
                                               </h4>
                                           </a>
                                       </div>
                                       <div class="col-md-2" style="text-align: right;">
                                           <button type="button" class="btn btn-danger" disabled="disabled">
                                               ทำแบบประเมิน
                                           </button>
                                       </div>
                                       <div class="clearfix"></div>
                                   </div>
                                   <div style="height: auto;" id="collapse2" class="panel-collapse collapse">
                                       <div class="panel-body">
                                           <div class="table-responsive">
                                               <table class="table v-middle table-bordered">
                                                   <thead>
                                                   <tr>
                                                       <th class="text-center" width="60%">บทเรียน</th>
                                                       <th class="text-center" width="20%">สถานะการเรียน</th>
                                                       <th class="text-center" width="20%">ผลการสอบ</th>
                                                   </tr>
                                                   </thead>
                                                   <tbody id="responsive-table-body">
                                                   <tr>
                                                       <td>บทที่ 1 แนะนำบทเรียน</td>
                                                       <td class="text-center"><span style="color: rgb(255, 180, 0);">กำลังเรียน</span>
                                                       </td>
                                                       <td class="text-center">-</td>
                                                   </tr>
                                                   <tr>
                                                       <td>บทที่ 2 บทที่หนึ่ง</td>
                                                       <td class="text-center">-</td>
                                                       <td class="text-center">-</td>
                                                   </tr>
                                                   <tr>
                                                       <td>บทที่ 2 บทที่สอง</td>
                                                       <td class="text-center">-</td>
                                                       <td class="text-center">-</td>
                                                   </tr>
                                                   </tbody>
                                               </table>
                                           </div>
                                       </div>
                                   </div>
                               </div>

                               <div class="panel panel-danger">
                                   <div class="panel-heading">
                                       <div class="col-md-10" style="padding-top: 12px;">
                                           <a class="" data-toggle="collapse" data-parent="#accordion"
                                              href="#collapse3">
                                               <h4 class="panel-title panel-title-adjust">
                                                   หลักสูตร: หลักสูตรการทำงานเป็นทีม
                                               </h4>
                                           </a>
                                       </div>
                                       <div class="col-md-2" style="text-align: right;">
                                           <button type="button" class="btn btn-danger" disabled="disabled">
                                               ทำแบบประเมิน
                                           </button>
                                       </div>
                                       <div class="clearfix"></div>
                                   </div>
                                   <div style="height: auto;" id="collapse3" class="panel-collapse collapse">
                                       <div class="panel-body">
                                           <div class="table-responsive">
                                               <table class="table v-middle table-bordered">
                                                   <thead>
                                                   <tr>
                                                       <th class="text-center" width="60%">บทเรียน</th>
                                                       <th class="text-center" width="20%">สถานะการเรียน</th>
                                                       <th class="text-center" width="20%">ผลการสอบ</th>
                                                   </tr>
                                                   </thead>
                                                   <tbody id="responsive-table-body">
                                                   <tr>
                                                       <td>บทที่ 1 แนะนำบทเรียน</td>
                                                       <td class="text-center">-</td>
                                                       <td class="text-center">-</td>
                                                   </tr>
                                                   <tr>
                                                       <td>บทที่ 2 บทที่หนึ่ง</td>
                                                       <td class="text-center">-</td>
                                                       <td class="text-center">-</td>
                                                   </tr>
                                                   <tr>
                                                       <td>บทที่ 2 บทที่สอง</td>
                                                       <td class="text-center">-</td>
                                                       <td class="text-center">-</td>
                                                   </tr>
                                                   </tbody>
                                               </table>
                                           </div>
                                       </div>
                                   </div>
                               </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection