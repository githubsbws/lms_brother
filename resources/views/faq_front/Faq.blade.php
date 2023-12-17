@extends('layout/mainlayout')
@section('content')
<body>

    <div class="span-19">
        <div id="content">
            <!---->
            <!--<h1>Faqs</h1>-->
            <!---->
            <style>
                .panel {
                    margin-bottom: 4px;
                }

                .panel-collapse-trigger.panel-heading::after {
                    top: 15px;
                }

                .panel-default>.panel-heading:hover {
                    color: #333;
                    background-color: #F0F0F0;
                    border-color: #E2E9E6;
                }
            </style>
            <div class="parallax overflow-hidden page-section bg-blue-300">
                <div class="container parallax-layer" data-opacity="true">
                    <div class="media media-grid v-middle">
                        <div class="media-left">
                            <span class="icon-block half bg-blue-500 text-white" style="height: 45px;"><i class="fa fa-fw fa-question-circle"></i></span>
                        </div>
                        <div class="media-body">
                            <h3 class="text-display-2 text-white margin-none">คำถามที่พบบ่อย</h3>
                            <!--                <p class="text-white text-subhead" style="font-size: 1.6rem;">รวมข่าวสารของ Brother</p>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="page-section">
                    <div class="col-md-9" style="margin-bottom: 25px;">
                        <div class="panel panel-default paper-shadow" data-z="0.5" style="margin-bottom: 25px;">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="media v-middle">
                                        <div class="media-body">
                                            <h4 class="text-headline margin-none" style="font-size: 26px;font-weight: bold;">วิธีการสมัครสมาชิก</h4>
                                            <!--                            <p class="text-subhead text-light">คำถามที่พบบ่อย</p>-->
                                        </div>
                                        <div class="media-right">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item media v-middle">
                                    <div class="panel panel-default" data-toggle="panel-collapse" data-open="false">
                                        <div class="panel-heading panel-collapse-trigger collapse in collapsed" data-toggle="collapse" data-target="#3caeb8e4-baaa-9587-7891-500dc5108dfe" aria-expanded="false" style="">
                                            <h3 class="panel-title" style="font-size: 22px;"><img src="https://cdn.pixabay.com/photo/2014/12/29/18/44/beach-583172_640.jpg" alt="person" style="width: 25px;"> สมัครสมาชิกได้อย่างไร</h3>
                                        </div>

                                        <div id="3caeb8e4-baaa-9587-7891-500dc5108dfe" class="collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body list-group">
                                                <ul class="list-group list-group-menu">
                                                    <li class="list-group-item" style="padding-left: 15px;padding:10px;">
                                                        <p><img style="font-size: 2em;" src="https://cdn.pixabay.com/photo/2014/12/29/18/44/beach-583172_640.jpg" alt="" width="100%" height="100%"></p>
                                                        <h1>&nbsp;</h1>
                                                        <p>&nbsp;</p>
                                                        <ul>
                                                            <li>
                                                                <p><strong>เมื่อเข้ามาที่หน้า website นำเม้าไปคลิกที่เมนู&nbsp;"สมาชิก" ทางด้านบนของ&nbsp;website หลังจากนั้น</strong></p>
                                                                <p><strong>คลิก "สมัครสมาชิก" เพื่อ</strong><strong>ทำการสมัครสมาชิก</strong></p>
                                                            </li>
                                                            <li>
                                                                <p><img src="https://cdn.pixabay.com/photo/2014/12/29/18/44/beach-583172_640.jpg" alt="" width="173" height="53"></p>
                                                                <p><strong>ทำการเลือกประเภทของการสมัครสมาชิก "นิสิต/นักศึกษา" หรือ "ผู้ประกอบการ"&nbsp;</strong></p>
                                                                <p>&nbsp;</p>
                                                                <p><img src="https://cdn.pixabay.com/photo/2014/12/29/18/44/beach-583172_640.jpg" alt="" width="173" height="53"></p>
                                                                <p><strong>เมื่อเข้ามาให้ทำการกรอกข้อมูลให้ครบถ้วน เสร็จแล้วกด"ยืนยันการสมัครสามชิก"ที่ด้านล่าง&nbsp;</strong><strong>website</strong></p>
                                                                <p>&nbsp;</p>
                                                                <p><img src="https://cdn.pixabay.com/photo/2014/12/29/18/44/beach-583172_640.jpg" alt="" width="173" height="53"></p>
                                                                <p><strong>เมื่อยืนยันการสมัครสมาชิกเรียบร้อยแล้ว จะพบข้อความดังรูปภาพ จากนั้นให้ทำการเข้าสู่อีเมล์ และตรวจเช็ค email ที่สมาชิกได้</strong><strong>ใช้ในการสมัคร เพื่อทำการยืนยันการสมัครสมาชิก</strong></p>
                                                                <p><img src="https://cdn.pixabay.com/photo/2014/12/29/18/44/beach-583172_640.jpg" alt="" width="173" height="53"></p>
                                                                <p><strong>เมื่อเข้าไปใน email ที่สมาชิกได้ใช้ในการสมัครจะพบ ลิ้งค์ที่อยู่ใน email ให้สมาชิกกดยืนยันที่</strong></p>
                                                                <p><strong>ข้อความที่ส่งไปให้จากทาง website หรือ&nbsp;ถ้าไม่สามารถกดเพื่อเข้าลิ้งค์ได้ให้ท่านทำการ copy</strong></p>
                                                                <p><strong>ลิ้งค์ดังกล่าวไปเปิดใน browser ที่ท่านใช้ เช่น IE , chrome , safari&nbsp;</strong><strong>เป็นต้น</strong></p>
                                                                <p>&nbsp;</p>
                                                                <p><img src="https://cdn.pixabay.com/photo/2014/12/29/18/44/beach-583172_640.jpg" alt="" width="173" height="53"></p>
                                                                <p><strong>เมื่อต้องการเข้าใช้งาน website ระบบจะแสดงข้อมูลยืนยันการเปิดใช้งานดังรูป&nbsp;</strong></p>
                                                                <p><strong>จากนั้น ให้คลิกลูกศรหลังคำว่าสมาชิก เพื่อเข้าสู่เมนู&nbsp;"เข้าสู่ระบบ"ด้านซ้ายของ website&nbsp;</strong></p>
                                                                <p><strong>หรือคลิกที่ "เมนูหน้าหลัก" เพื่อเข้าสู่หน้าเข้าสู่ระบบ และเลือกกรอกข้อมูล&nbsp;</strong><strong>username และ&nbsp;</strong><strong>password ตามประเภทที่ลงทะเบียนไว้&nbsp;</strong></p>
                                                                <p>&nbsp;</p>
                                                                <p><img src="https://cdn.pixabay.com/photo/2014/12/29/18/44/beach-583172_640.jpg" alt="" width="173" height="53"></p>
                                                                <p><strong>เมื่อเข้ามาแล้วจะพบชื่อสมาชิก และการแก้ไขข้อมูลส่วนตัวต่างๆ</strong></p>
                                                                <p>&nbsp;</p>
                                                                <p><strong>&nbsp;</strong><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;</strong><strong><strong>&nbsp;</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></p>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                        <div class="panel panel-default paper-shadow" data-z="0.5" style="margin-bottom: 25px;">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="media v-middle">
                                        <div class="media-body">
                                            <h4 class="text-headline margin-none" style="font-size: 26px;font-weight: bold;">เข้าสู่บทเรียนอย่างไร</h4>
                                            <!--                            <p class="text-subhead text-light">คำถามที่พบบ่อย</p>-->
                                        </div>
                                        <div class="media-right">
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item media v-middle">
                                    <div class="panel panel-default" data-toggle="panel-collapse" data-open="false">
                                        <div class="panel-heading panel-collapse-trigger collapse in" data-toggle="collapse" data-target="#fb3c8f57-0e6e-c592-c199-c9313d5f7626" aria-expanded="true" style="">
                                            <h3 class="panel-title" style="font-size: 22px;"><img src="/lms_brother_docker/lms/app/themes/bws/images/icon/faq.png" alt="person" style="width: 25px;"> brother</h3>
                                        </div>

                                        <div id="fb3c8f57-0e6e-c592-c199-c9313d5f7626" class="collapse">
                                            <div class="panel-body list-group">
                                                <ul class="list-group list-group-menu">
                                                    <li class="list-group-item" style="padding-left: 15px;padding:10px;">
                                                        <p><strong>brother</strong></p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <form action="/lms_brother_docker/lms/app/index.php/faq" method="post">
                            <div class="panel panel-default" data-toggle="panel-collapse" data-open="true">
                                <div class="panel-heading panel-collapse-trigger collapse in" data-toggle="collapse" data-target="#db1bec6e-26b3-0d7f-8fb2-2ea6a985de3c" aria-expanded="true" style="">
                                    <h4 class="panel-title" style="font-weight: bold;">ค้นหา</h4>
                                </div>

                                <div id="db1bec6e-26b3-0d7f-8fb2-2ea6a985de3c" class="collapse in">
                                    <div class="panel-body">
                                        <div class="form-group input-group margin-none">
                                            <div class="row margin-none">
                                                <div class="col-xs-12 padding-none">
                                                    <input class="form-control" type="text" name="search_text" placeholder="คำค้นหา" value="">
                                                </div>
                                            </div>
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div><!-- content -->
    </div>

</body>
@endsection