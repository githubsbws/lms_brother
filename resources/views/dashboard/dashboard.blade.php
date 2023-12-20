@extends('layout/mainlayout')
@section('title', 'Dashboard')
@section('content')
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
                                        <li class="list-group-item media v-middle">
                                            <div class="media-body">
                                                <a href="/lms_brother_docker/lms/app/index.php/course/detail/176" class="text-subhead list-group-link">
                                                    หลักสูตรการอบรมขั้นพื้นฐานสำหรับเครื่องพิมพ์ Inkjet Tank System. </a>
                                                <br>
                                                <p style="font-size:18px;">เรียนแล้ว <label style="color: #00A000; font-weight: 600;">2</label> : ยังไม่เรียน <label style="color: red; font-weight: 600;">0 </label> : กำลังเรียน <label>3</label></p>
                                            </div>

                                            <div class="media-right" align="center">
                                                <label style="color: #00A000; font-weight: 600;">2</label> จาก <label style="color: #00A000; font-weight: 600;">5</label>
                                                <div class="progress progress-mini width-100 margin-none">
                                                    <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item media v-middle">
                                            <div class="media-body">
                                                <a href="/lms_brother_docker/lms/app/index.php/course/detail/192" class="text-subhead list-group-link">
                                                    หลักสูตรการอบรมขั้นพื้นฐานสำหรับเครื่องพิมพ์ A3 Inkjet Tank Technology. </a>
                                                <br>
                                                <p style="font-size:18px;">เรียนแล้ว <label style="color: #00A000; font-weight: 600;">2</label> : ยังไม่เรียน <label style="color: red; font-weight: 600;">0 </label> : กำลังเรียน <label>5</label></p>
                                            </div>

                                            <div class="media-right" align="center">
                                                <label style="color: #00A000; font-weight: 600;">2</label> จาก <label style="color: #00A000; font-weight: 600;">7</label>
                                                <div class="progress progress-mini width-100 margin-none">
                                                    <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="28.571428571429" aria-valuemin="0" aria-valuemax="100" style="width: 28.5714%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item media v-middle">
                                            <div class="media-body">
                                                <a href="/lms_brother_docker/lms/app/index.php/course/detail/191" class="text-subhead list-group-link">
                                                    การซ่อมบำรุงเครื่องพิมพ์ Brother Mono Laser สำหรับ ELL-Series </a>
                                                <br>
                                                <p style="font-size:18px;">เรียนแล้ว <label style="color: #00A000; font-weight: 600;">7</label> : ยังไม่เรียน <label style="color: red; font-weight: 600;">0 </label> : กำลังเรียน <label>0</label></p>
                                            </div>

                                            <div class="media-right" align="center">
                                                <label style="color: #00A000; font-weight: 600;">7</label> จาก <label style="color: #00A000; font-weight: 600;">7</label>
                                                <div class="progress progress-mini width-100 margin-none">
                                                    <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item media v-middle">
                                            <div class="media-body">
                                                <a href="/lms_brother_docker/lms/app/index.php/course/detail/197" class="text-subhead list-group-link">
                                                    การซ่อมบำรุงเครื่องพิมพ์ Brother Color LED สำหรับ ECL-Series </a>
                                                <br>
                                                <p style="font-size:18px;">เรียนแล้ว <label style="color: #00A000; font-weight: 600;">3</label> : ยังไม่เรียน <label style="color: red; font-weight: 600;">0 </label> : กำลังเรียน <label>4</label></p>
                                            </div>

                                            <div class="media-right" align="center">
                                                <label style="color: #00A000; font-weight: 600;">3</label> จาก <label style="color: #00A000; font-weight: 600;">7</label>
                                                <div class="progress progress-mini width-100 margin-none">
                                                    <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="42.857142857143" aria-valuemin="0" aria-valuemax="100" style="width: 42.8571%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item media v-middle">
                                            <div class="media-body">
                                                <a href="/lms_brother_docker/lms/app/index.php/course/detail/232" class="text-subhead list-group-link">
                                                    หลักสูตรแนะนำผลิตภัณฑ์ GTX เบื้องต้น </a>
                                                <br>
                                                <p style="font-size:18px;">เรียนแล้ว <label style="color: #00A000; font-weight: 600;">2</label> : ยังไม่เรียน <label style="color: red; font-weight: 600;">0 </label> : กำลังเรียน <label>1</label></p>
                                            </div>

                                            <div class="media-right" align="center">
                                                <label style="color: #00A000; font-weight: 600;">2</label> จาก <label style="color: #00A000; font-weight: 600;">3</label>
                                                <div class="progress progress-mini width-100 margin-none">
                                                    <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="66.666666666667" aria-valuemin="0" aria-valuemax="100" style="width: 66.6667%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item media v-middle">
                                            <div class="media-body">
                                                <a href="/lms_brother_docker/lms/app/index.php/course/detail/231" class="text-subhead list-group-link">
                                                    หลักสูตรแนะนำผลิตภัณฑ์ BMB เบื้องต้น </a>
                                                <br>
                                                <p style="font-size:18px;">เรียนแล้ว <label style="color: #00A000; font-weight: 600;">0</label> : ยังไม่เรียน <label style="color: red; font-weight: 600;">1 </label> : กำลังเรียน <label>0</label></p>
                                            </div>

                                            <div class="media-right" align="center">
                                                <label style="color: #00A000; font-weight: 600;">0</label> จาก <label style="color: #00A000; font-weight: 600;">1</label>
                                                <div class="progress progress-mini width-100 margin-none">
                                                    <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item media v-middle">
                                            <div class="media-body">
                                                <a href="/lms_brother_docker/lms/app/index.php/course/detail/209" class="text-subhead list-group-link">
                                                    การซ่อมบำรุงเครื่อง Scanner สำหรับ ADS-Series </a>
                                                <br>
                                                <p style="font-size:18px;">เรียนแล้ว <label style="color: #00A000; font-weight: 600;">0</label> : ยังไม่เรียน <label style="color: red; font-weight: 600;">5 </label> : กำลังเรียน <label>1</label></p>
                                            </div>

                                            <div class="media-right" align="center">
                                                <label style="color: #00A000; font-weight: 600;">0</label> จาก <label style="color: #00A000; font-weight: 600;">6</label>
                                                <div class="progress progress-mini width-100 margin-none">
                                                    <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item media v-middle">
                                            <div class="media-body">
                                                <a href="/lms_brother_docker/lms/app/index.php/course/detail/222" class="text-subhead list-group-link">
                                                    การซ่อมบำรุงเครื่องพิมพ์ฉลาก PT-E850TKW </a>
                                                <br>
                                                <p style="font-size:18px;">เรียนแล้ว <label style="color: #00A000; font-weight: 600;">0</label> : ยังไม่เรียน <label style="color: red; font-weight: 600;">3 </label> : กำลังเรียน <label>2</label></p>
                                            </div>

                                            <div class="media-right" align="center">
                                                <label style="color: #00A000; font-weight: 600;">0</label> จาก <label style="color: #00A000; font-weight: 600;">5</label>
                                                <div class="progress progress-mini width-100 margin-none">
                                                    <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item media v-middle">
                                            <div class="media-body">
                                                <a href="/lms_brother_docker/lms/app/index.php/course/detail/182" class="text-subhead list-group-link">
                                                    การซ่อมบำรุงเครื่องพิมพ์ Brother Mono Laser สำหรับ DL-Series </a>
                                                <br>
                                                <p style="font-size:18px;">เรียนแล้ว <label style="color: #00A000; font-weight: 600;">1</label> : ยังไม่เรียน <label style="color: red; font-weight: 600;">1 </label> : กำลังเรียน <label>4</label></p>
                                            </div>

                                            <div class="media-right" align="center">
                                                <label style="color: #00A000; font-weight: 600;">1</label> จาก <label style="color: #00A000; font-weight: 600;">6</label>
                                                <div class="progress progress-mini width-100 margin-none">
                                                    <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="16.666666666667" aria-valuemin="0" aria-valuemax="100" style="width: 16.6667%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item media v-middle">
                                            <div class="media-body">
                                                <a href="/lms_brother_docker/lms/app/index.php/course/detail/223" class="text-subhead list-group-link">
                                                    การซ่อมบำรุงจักรเย็บผ้ารุ่น GS2700 </a>
                                                <br>
                                                <p style="font-size:18px;">เรียนแล้ว <label style="color: #00A000; font-weight: 600;">2</label> : ยังไม่เรียน <label style="color: red; font-weight: 600;">3 </label> : กำลังเรียน <label>1</label></p>
                                            </div>

                                            <div class="media-right" align="center">
                                                <label style="color: #00A000; font-weight: 600;">2</label> จาก <label style="color: #00A000; font-weight: 600;">6</label>
                                                <div class="progress progress-mini width-100 margin-none">
                                                    <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="33.333333333333" aria-valuemin="0" aria-valuemax="100" style="width: 33.3333%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
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
                                        <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                            <h4 class="panel-title panel-title-adjust">
                                                <!-- หลักสูตร: หลักสูตรการทำงานเป็นทีม -->
                                                หลักสูตร: หลักสูตรการอบรมขั้นพื้นฐานสำหรับเครื่องพิมพ์ Inkjet Tank System.
                                            </h4>
                                        </a>
                                    </div>
                                    <!--    <div class="col-md-2" style="text-align: right;" id="btn_">
                        <a href="survey.php" class="btn btn-success">ทำแบบประเมิน</a>
                    </div> -->
                                    <div class="clearfix"></div>
                                </div>
                                <div style="height: auto;" id="collapse1" class="panel-collapse collapse in">
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/176?lesson_id=206">บทที่ 1. แนะนำผลิตภัณท์เบื้องต้น</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/176?lesson_id=206"><span style="color:green;">เรียนผ่าน</span></a></td>
                                                        <td class="text-center">
                                                            <a href="/lms_brother_docker/lms/app/index.php/question/index/206">ทำแบบทดสอบก่อนเรียน</a>
                                                        </td>
                                                        <td class="text-center">
                                                            เหลือ 1 ครั้ง
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-warning" style="font-size: medium; letter-spacing: 2px !important;">ไม่มีแบบสอบถาม</label></p>

                                                        </td>

                                                        <td class="text-center">0 / 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/176?lesson_id=207">บทที่ 2 คุณสมบัติและข้อมูลตัวเครื่อง</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/176?lesson_id=207"><span style="color:green;">เรียนผ่าน</span></a></td>
                                                        <td class="text-center">
                                                            <a href="/lms_brother_docker/lms/app/index.php/question/index/207">ทำแบบทดสอบหลังเรียน</a>
                                                        </td>
                                                        <td class="text-center">
                                                            เหลือ 2 ครั้ง
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-warning" style="font-size: medium; letter-spacing: 2px !important;">ไม่มีแบบสอบถาม</label></p>

                                                        </td>

                                                        <td class="text-center">0 / 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/176?lesson_id=208">บทที่ 3 การติดตั้งเครื่องครั้งแรก</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/176?lesson_id=208"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/176?lesson_id=209">บทที่ 4. เนื้อหาอธิบายส่วนทฤษฎี</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/176?lesson_id=209"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/176?lesson_id=213">บทที่ 5. การถอดประกอบเครื่อง</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/176?lesson_id=213"><span style="color:blue;">กำลังเรียน</span></a></td>
                                                        <td class="text-center">
                                                            - </td>
                                                        <td class="text-center">
                                                            -
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-danger" style="font-size: medium; letter-spacing: 2px !important;">ต้องเรียนให้ผ่านก่อน</label></p>

                                                        </td>

                                                        <td class="text-center">0 / 0</td>
                                                    </tr>


                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="col-md-10" style="padding-top: 12px;">
                                        <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                            <h4 class="panel-title panel-title-adjust">
                                                <!-- หลักสูตร: หลักสูตรการทำงานเป็นทีม -->
                                                หลักสูตร: หลักสูตรการอบรมขั้นพื้นฐานสำหรับเครื่องพิมพ์ A3 Inkjet Tank Technology.
                                            </h4>
                                        </a>
                                    </div>
                                    <!--    <div class="col-md-2" style="text-align: right;" id="btn_">
                        <a href="survey.php" class="btn btn-success">ทำแบบประเมิน</a>
                    </div> -->
                                    <div class="clearfix"></div>
                                </div>
                                <div style="height: auto;" id="collapse2" class="panel-collapse collapse ">
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/192?lesson_id=290">บทที่ 5. Special Notes.</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/192?lesson_id=290"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/192?lesson_id=291">บทที่ 4. Service Topics.</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/192?lesson_id=291"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/192?lesson_id=292">บทที่ 3. Usability improvements.</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/192?lesson_id=292"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/192?lesson_id=293">บทที่ 2. Product Improvements.</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/192?lesson_id=293"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/192?lesson_id=294">บทที่ 1. Product Line Up &amp; Specifications A3 Tank</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/192?lesson_id=294"><span style="color:green;">เรียนผ่าน</span></a></td>
                                                        <td class="text-center">
                                                            <a href="/lms_brother_docker/lms/app/index.php/question/index/294">ทำแบบทดสอบก่อนเรียน</a>
                                                        </td>
                                                        <td class="text-center">
                                                            เหลือ 1 ครั้ง
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-warning" style="font-size: medium; letter-spacing: 2px !important;">ไม่มีแบบสอบถาม</label></p>

                                                        </td>

                                                        <td class="text-center">0 / 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/192?lesson_id=315">บทที่ 6. Disasembly</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/192?lesson_id=315"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/192?lesson_id=321">บทที่ 7 ทดสอบ (หลังเรียน) 20 คะแนน</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/192?lesson_id=321"><span style="color:green;">เรียนผ่าน</span></a></td>
                                                        <td class="text-center">
                                                            <a href="/lms_brother_docker/lms/app/index.php/question/index/321">ทำแบบทดสอบหลังเรียน</a>
                                                        </td>
                                                        <td class="text-center">
                                                            เหลือ 3 ครั้ง
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><a class="btn btn-primary" href="/lms_brother_docker/lms/app/index.php/questionnaire/index/321">ทำแบบสอบถาม</a></p>

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
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="col-md-10" style="padding-top: 12px;">
                                        <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                            <h4 class="panel-title panel-title-adjust">
                                                <!-- หลักสูตร: หลักสูตรการทำงานเป็นทีม -->
                                                หลักสูตร: การซ่อมบำรุงเครื่องพิมพ์ Brother Mono Laser สำหรับ ELL-Series
                                            </h4>
                                        </a>
                                    </div>
                                    <!--    <div class="col-md-2" style="text-align: right;" id="btn_">
                        <a href="survey.php" class="btn btn-success">ทำแบบประเมิน</a>
                    </div> -->
                                    <div class="clearfix"></div>
                                </div>
                                <div style="height: auto;" id="collapse3" class="panel-collapse collapse ">
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/191?lesson_id=284">บทที่ 1 แนะนำผลิตภัณฑ์เบื้องต้น (Brother Mono Laser for ELL Series)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/191?lesson_id=284"><span style="color:green;">เรียนผ่าน</span></a></td>
                                                        <td class="text-center">
                                                            <a href="/lms_brother_docker/lms/app/index.php/question/index/284">ทำแบบทดสอบก่อนเรียน</a>
                                                        </td>
                                                        <td class="text-center">
                                                            เหลือ 1 ครั้ง
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-warning" style="font-size: medium; letter-spacing: 2px !important;">ไม่มีแบบสอบถาม</label></p>

                                                        </td>

                                                        <td class="text-center">0 / 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/191?lesson_id=285">บทที่ 2.คุณสมบัติและข้อมูลตัวเครื่อง (Brother Mono Laser for ELL Series)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/191?lesson_id=285"><span style="color:green;">เรียนผ่าน</span></a></td>
                                                        <td class="text-center">
                                                            <a href="/lms_brother_docker/lms/app/index.php/question/index/285">ทำแบบทดสอบหลังเรียน</a>
                                                        </td>
                                                        <td class="text-center">
                                                            เหลือ 3 ครั้ง
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-warning" style="font-size: medium; letter-spacing: 2px !important;">ไม่มีแบบสอบถาม</label></p>

                                                        </td>

                                                        <td class="text-center">0 / 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/191?lesson_id=286">บทที่ 3. หลักการทำงานและทฤษฏี (Brother Mono Laser for ELL Series)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/191?lesson_id=286"><span style="color:green;">เรียนผ่าน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/191?lesson_id=287">บทที่ 4.ขั้นตอนตรวจเช็คตามระยะเวลา (Brother Mono Laser for ELL Series)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/191?lesson_id=287"><span style="color:green;">เรียนผ่าน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/191?lesson_id=288">บทที่ 5. การแก้ปัญหาเบื้องต้น (Brother Mono Laser for ELL Series)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/191?lesson_id=288"><span style="color:green;">เรียนผ่าน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/191?lesson_id=289">บทที่ 6 ขั้นตอนการถอดประกอบเครื่องพิมพ์ (Brother Mono Laser for ELL Series )</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/191?lesson_id=289"><span style="color:green;">เรียนผ่าน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/191?lesson_id=307">บทที่ 7. แบบทดสอบหลังจบหลักสูตร (Brother Mono Laser ELL Series)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/191?lesson_id=307"><span style="color:green;">เรียนผ่าน</span></a></td>
                                                        <td class="text-center">
                                                            <a href="/lms_brother_docker/lms/app/index.php/question/index/307">ทำแบบทดสอบหลังเรียน</a>
                                                        </td>
                                                        <td class="text-center">
                                                            เหลือ 3 ครั้ง
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
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="col-md-10" style="padding-top: 12px;">
                                        <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                            <h4 class="panel-title panel-title-adjust">
                                                <!-- หลักสูตร: หลักสูตรการทำงานเป็นทีม -->
                                                หลักสูตร: การซ่อมบำรุงเครื่องพิมพ์ Brother Color LED สำหรับ ECL-Series
                                            </h4>
                                        </a>
                                    </div>
                                    <!--    <div class="col-md-2" style="text-align: right;" id="btn_">
                        <a href="survey.php" class="btn btn-success">ทำแบบประเมิน</a>
                    </div> -->
                                    <div class="clearfix"></div>
                                </div>
                                <div style="height: auto;" id="collapse4" class="panel-collapse collapse ">
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/197?lesson_id=300">บทที่ 1 แนะนำผลิตภัณฑ์เบื้องต้น (Brother Color LED for ECL Series)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/197?lesson_id=300"><span style="color:green;">เรียนผ่าน</span></a></td>
                                                        <td class="text-center">
                                                            <a href="/lms_brother_docker/lms/app/index.php/question/index/300">ทำแบบทดสอบก่อนเรียน</a>
                                                        </td>
                                                        <td class="text-center">
                                                            เหลือ 1 ครั้ง
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-warning" style="font-size: medium; letter-spacing: 2px !important;">ไม่มีแบบสอบถาม</label></p>

                                                        </td>

                                                        <td class="text-center">0 / 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/197?lesson_id=301">บทที่ 2.คุณสมบัติและข้อมูลตัวเครื่อง (Brother Color LED for ECL Series)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/197?lesson_id=301"><span style="color:green;">เรียนผ่าน</span></a></td>
                                                        <td class="text-center">
                                                            <a href="/lms_brother_docker/lms/app/index.php/question/index/301">ทำแบบทดสอบหลังเรียน</a>
                                                        </td>
                                                        <td class="text-center">
                                                            เหลือ 3 ครั้ง
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-warning" style="font-size: medium; letter-spacing: 2px !important;">ไม่มีแบบสอบถาม</label></p>

                                                        </td>

                                                        <td class="text-center">0 / 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/197?lesson_id=302">บทที่ 3. หลักการทำงานและทฤษฏี (Brother Color LED for ECL Series)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/197?lesson_id=302"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/197?lesson_id=303">บทที่ 4.ขั้นตอนตรวจเช็คตามระยะเวลา (Brother Color LED for ECL Series)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/197?lesson_id=303"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/197?lesson_id=304">บทที่ 5. การแก้ปัญหาเบื้องต้น (Brother Color LED for ECL Series)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/197?lesson_id=304"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/197?lesson_id=305">บทที่ 6 ขั้นตอนการถอดประกอบเครื่องพิมพ์ (Brother Color LED for ECL Series )</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/197?lesson_id=305"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/197?lesson_id=306">บนที่ 7. แบบทดสอบ ECL-SEries ภาคทฏษฎี 20 ข้อ (Brother Color LED for ECL Series )</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/197?lesson_id=306"><span style="color:green;">เรียนผ่าน</span></a></td>
                                                        <td class="text-center">
                                                            <a href="/lms_brother_docker/lms/app/index.php/question/index/306">ทำแบบทดสอบหลังเรียน</a>
                                                        </td>
                                                        <td class="text-center">
                                                            เหลือ 3 ครั้ง
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-warning" style="font-size: medium; letter-spacing: 2px !important;">ไม่มีแบบสอบถาม</label></p>

                                                        </td>

                                                        <td class="text-center">0 / 20</td>
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
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="col-md-10" style="padding-top: 12px;">
                                        <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                            <h4 class="panel-title panel-title-adjust">
                                                <!-- หลักสูตร: หลักสูตรการทำงานเป็นทีม -->
                                                หลักสูตร: หลักสูตรแนะนำผลิตภัณฑ์ GTX เบื้องต้น
                                            </h4>
                                        </a>
                                    </div>
                                    <!--    <div class="col-md-2" style="text-align: right;" id="btn_">
                        <a href="survey.php" class="btn btn-success">ทำแบบประเมิน</a>
                    </div> -->
                                    <div class="clearfix"></div>
                                </div>
                                <div style="height: auto;" id="collapse5" class="panel-collapse collapse ">
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/232?lesson_id=423">บทที่ 1. หลักสูตรแนะนำผลิตภัณฑ์ GTX เบื้องต้น (ช่วงที่ 1)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/232?lesson_id=423"><span style="color:green;">เรียนผ่าน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/232?lesson_id=424">บทที่ 2. หลักสูตรแนะนำผลิตภัณฑ์ GTX เบื้องต้น (ช่วงที่ 2)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/232?lesson_id=424"><span style="color:green;">เรียนผ่าน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/232?lesson_id=425">บทที่ 3. การติดตั้งและบำรุงรักษผลิตภัณฑ์ GTX เบื้องต้น </a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/232?lesson_id=425"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="col-md-10" style="padding-top: 12px;">
                                        <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                            <h4 class="panel-title panel-title-adjust">
                                                <!-- หลักสูตร: หลักสูตรการทำงานเป็นทีม -->
                                                หลักสูตร: หลักสูตรแนะนำผลิตภัณฑ์ BMB เบื้องต้น
                                            </h4>
                                        </a>
                                    </div>
                                    <!--    <div class="col-md-2" style="text-align: right;" id="btn_">
                        <a href="survey.php" class="btn btn-success">ทำแบบประเมิน</a>
                    </div> -->
                                    <div class="clearfix"></div>
                                </div>
                                <div style="height: auto;" id="collapse6" class="panel-collapse collapse ">
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/231?lesson_id=422">แนะนำผลิตภัณฑ์ BMB เบื้องต้น</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/231?lesson_id=422"><span style="color:red;">ยังไม่ได้เรียน</span></a></td>
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
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="col-md-10" style="padding-top: 12px;">
                                        <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                                            <h4 class="panel-title panel-title-adjust">
                                                <!-- หลักสูตร: หลักสูตรการทำงานเป็นทีม -->
                                                หลักสูตร: การซ่อมบำรุงเครื่อง Scanner สำหรับ ADS-Series
                                            </h4>
                                        </a>
                                    </div>
                                    <!--    <div class="col-md-2" style="text-align: right;" id="btn_">
                        <a href="survey.php" class="btn btn-success">ทำแบบประเมิน</a>
                    </div> -->
                                    <div class="clearfix"></div>
                                </div>
                                <div style="height: auto;" id="collapse7" class="panel-collapse collapse ">
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/209?lesson_id=327">บทที่ 1 แนะนำผลิตภัณฑ์เบื้องต้น (Brother Scanner for ADS2 Series)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/209?lesson_id=327"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/209?lesson_id=328">บทที่ 2.คุณสมบัติและข้อมูลตัวเครื่อง (Brother Scanner for ADS2 Series)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/209?lesson_id=328"><span style="color:red;">ยังไม่ได้เรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/209?lesson_id=329">บทที่ 3. หลักการทำงานและทฤษฏี (Brother Scanner for ADS2 Series)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/209?lesson_id=329"><span style="color:red;">ยังไม่ได้เรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/209?lesson_id=330">บทที่ 4.ขั้นตอนตรวจเช็คตามระยะเวลา (Brother Scanner for ADS Series)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/209?lesson_id=330"><span style="color:red;">ยังไม่ได้เรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/209?lesson_id=331">บทที่ 5 ขั้นตอนการถอดประกอบเครื่องสแกน (Brother Scanner for ADS2 Series )</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/209?lesson_id=331"><span style="color:red;">ยังไม่ได้เรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/209?lesson_id=332">บนที่ 6. แบบทดสอบ ADS2 Series ภาคทฏษฎี 10 ข้อ</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/209?lesson_id=332"><span style="color:red;">ยังไม่ได้เรียน</span></a></td>
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
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="col-md-10" style="padding-top: 12px;">
                                        <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                                            <h4 class="panel-title panel-title-adjust">
                                                <!-- หลักสูตร: หลักสูตรการทำงานเป็นทีม -->
                                                หลักสูตร: การซ่อมบำรุงเครื่องพิมพ์ฉลาก PT-E850TKW
                                            </h4>
                                        </a>
                                    </div>
                                    <!--    <div class="col-md-2" style="text-align: right;" id="btn_">
                        <a href="survey.php" class="btn btn-success">ทำแบบประเมิน</a>
                    </div> -->
                                    <div class="clearfix"></div>
                                </div>
                                <div style="height: auto;" id="collapse8" class="panel-collapse collapse ">
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/222?lesson_id=378">บทที่ 1 แนะนำผลิตภัณฑ์ และ บทที่ 2 คุณสมบัติและข้อมูลของตัวเครื่อง</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/222?lesson_id=378"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/222?lesson_id=379">บทที่ 3 ทฤษฏีและหลักการทำงาน</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/222?lesson_id=379"><span style="color:red;">ยังไม่ได้เรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/222?lesson_id=380">บทที่ 4 ขั้นตอนตรวจเช็คตามระยะเวลา</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/222?lesson_id=380"><span style="color:red;">ยังไม่ได้เรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/222?lesson_id=381">บทที่ 5 การแก้ปัญหาเบื้องต้น</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/222?lesson_id=381"><span style="color:red;">ยังไม่ได้เรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/222?lesson_id=382">บทที่ 6 การถอดประกอบเครื่องพิมพ์ฉลาก PT-E850TKW</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/222?lesson_id=382"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="col-md-10" style="padding-top: 12px;">
                                        <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapse9">
                                            <h4 class="panel-title panel-title-adjust">
                                                <!-- หลักสูตร: หลักสูตรการทำงานเป็นทีม -->
                                                หลักสูตร: การซ่อมบำรุงเครื่องพิมพ์ Brother Mono Laser สำหรับ DL-Series
                                            </h4>
                                        </a>
                                    </div>
                                    <!--    <div class="col-md-2" style="text-align: right;" id="btn_">
                        <a href="survey.php" class="btn btn-success">ทำแบบประเมิน</a>
                    </div> -->
                                    <div class="clearfix"></div>
                                </div>
                                <div style="height: auto;" id="collapse9" class="panel-collapse collapse ">
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/182?lesson_id=229">บทที่ 1 แนะนำผลิตภัณฑ์เบื้องต้น (Brother Mono Laser)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/182?lesson_id=229"><span style="color:green;">เรียนผ่าน</span></a></td>
                                                        <td class="text-center">
                                                            <a href="/lms_brother_docker/lms/app/index.php/question/index/229">ทำแบบทดสอบก่อนเรียน</a>
                                                        </td>
                                                        <td class="text-center">
                                                            เหลือ 1 ครั้ง
                                                        </td>


                                                        <td class="text-center">
                                                            <p style="font-weight: normal;color: #045BAB;"><label class="label label-warning" style="font-size: medium; letter-spacing: 2px !important;">ไม่มีแบบสอบถาม</label></p>

                                                        </td>

                                                        <td class="text-center">0 / 0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/182?lesson_id=230">บทที่ 2.คุณสมบัติและข้อมูลตัวเครื่อง (Brother Mono Laser)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/182?lesson_id=230"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/182?lesson_id=231">บทที่ 3. หลักการทำงานและทฤษฏี (Brother Mono Laser)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/182?lesson_id=231"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/182?lesson_id=232">บทที่ 4.ขั้นตอนตรวจเช็คตามระยะเวลา (Brother Mono Laser)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/182?lesson_id=232"><span style="color:blue;">กำลังเรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/182?lesson_id=233">บทที่ 5. การแก้ปัญหาเบื้องต้น (Brother Mono Laser)</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/182?lesson_id=233"><span style="color:red;">ยังไม่ได้เรียน</span></a></td>
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
                                                            <a href="/lms_brother_docker/lms/app/index.php/course/lesson/182?lesson_id=234">บทที่ 6 ขั้นตอนการถอดประกอบเครื่องพิมพ์ (Brother Mono Laser )</a>
                                                        </td>
                                                        <td class="text-center"><a href="/lms_brother_docker/lms/app/index.php/course/lesson/182?lesson_id=234"><span style="color:blue;">กำลังเรียน</span></a></td>
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