@extends('layout/mainlayout')
@section('content')
<body>
    <div class="page-cover">
        <img src="assets/images/screen1.png" alt="">
    </div>

    <div class="container">
        <div class="page-section-heading">
            <div class="row">
                <div class="col-lg-8 col-md-8 pd-20">
                    <!-- start con 8 -->
                    <h2 class="title-layout">
                        <span>ข่าวสาร</span> <small>รวมข่าวสารของ Brother </small>
                        <a href="{{url('new')}}" class="pull-right btn btn-xs btn-light text-1 text-uppercase">ดูทั้งหมด <i class="fa fa-" aria-hidden="true"></i>
                        </a>
                    </h2>
                    <div class="row">
                        @foreach ($news as $new)
                        <div class="col-lg-6 col-md-6">
                            <div class="news-box gridalicious" data-toggle="gridalicious">

                                <div class="galcolumn" id="item02grJH" style="width: 95.7983%; padding-left: 15px; padding-bottom: 15px; float: left; box-sizing: border-box;">
                                    <div class="card" style="margin-bottom: 15px; zoom: 1; opacity: 1;">

                                        <div class="img-news" style="background: url('/../images/storage/uploads/news/78/thumb/17122021085656_Picture.JPG');"></div>
                                        <div class="card-body">
                                            <div class="text-headline">{{ \Illuminate\Support\Str::limit($new->cms_title, $limit = 40, $end = '...') }}</div>
                                            <?php 
                                            $detail =  htmlspecialchars_decode($new->cms_detail);
                                            $data = \Illuminate\Support\Str::limit($new->cms_short_title, $limit = 100, $end = '...');
                                            ?>
                                            <p class="detail-news">{{ $data }}</p>
                                            <span class="d-block mt-2">
                                                <a href="{{ route('new_detail', ['id' => $new->cms_id]) }}" class="btn btn-xs btn-light text-1 text-uppercase">เพิ่มเติม
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="clear2grJH" style="clear: both; height: 0px; width: 0px; display: block;"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                    <div>

                        <div>
                            <h2 class="title-layout-3"><span>ดาวน์โหลดไฟล์เอกสาร</span>
                                <button class="pull-right btn btn-xs btn-light text-1 text-uppercase button1">ดูทั้งหมด <i class="fa fa-" aria-hidden="true"></i>
                                </button>
                            </h2>
                            <h5><span>กรุณาเข้าสู่ระบบเพื่อดาวน์โหลดไฟล์เอกสาร</span></h5>

                            <button type="button" class="accordion download-box button1" data-toggle="modal" data-target="#exampleModal"><img src="/lms_brother_docker/lms/app/themes/bws/images/icons8-pdf-48.png"> ดาวน์โหลด </button>
                        </div>



                    </div>
                </div> <!-- end con 8 -->


                <div class="col-lg-4 col-md-4 box-video login pd-20">
                    <!-- start con 4 -->


                    <h2 class="title-layout"><span>วีดีโอแนะนำ</span> </h2>
                    <video width="100%" controls="">
                        <source src=" /lms_brother_docker/lms/app/themes/bws/video/brother-video-1.mp4" type="video/mp4">
                        <source src="mov_bbb.ogg" type="video/ogg">
                        Your browser does not support HTML5 video.
                    </video>

                    <h2 class="title-layout"><span>เกี่ยวกับบริษัท</span> </h2>

                    <div class="group-link">
                        <div class="depart-well-regis">
                            <a href="/lms_brother_docker/lms/app/index.php/contactus/index"> ติดต่อเรา </a>
                        </div>
                        <div class="depart">
                            <a href="/lms_brother_docker/lms/app/index.php/conditions/index"> เงื่อนไขการใช้งาน </a>
                        </div>
                    </div>
                </div> <!-- end con 4 -->
            </div>
        </div>
    </div>
</body>
@endsection
