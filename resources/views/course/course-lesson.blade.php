@extends('layout/mainlayout')
@section('title', 'Course')
@section('content')
<body>
    @foreach($course_lesson as $lesson)
    <div class="parallax bg-white page-section third">
        <div class="container parallax-layer" data-opacity="true" style="transform: translate3d(0px, 0px, 0px); opacity: 1;">
            <div class="media v-middle media-overflow-visible">
                <div class="media-left">
                    <span class="icon-block s30 bg-default"><img src="{{asset('themes/bws/images/logo_course2.png')}}" width="30" class="img-responsive"></span>
                </div>
                <div class="media-body">
                    <div class="text-headline" style="font-size: 25px;">{{ $lesson->course_title}}</div>
                </div>
                <div class="media-right">
                    <div class="dropdown">
                        <a class="btn btn-white dropdown-toggle" style="font-size: 22px;" data-toggle="dropdown" href="#">หลักสูตร <span class="caret"></span></a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="{{ route('course.detail', ['id' => $lesson->course_id]) }}">{{ $lesson->course_title}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="page-section">
            <div class="row">
                <div class="col-md-9">

                    <div class="page-section padding-top-none" style="padding-bottom: 0;">
                        <div class="media media-grid v-middle">
                            <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated="">
                                <div class="panel-body" style="padding: 10px;">
                                    <div class="media-left">
                                        <!-- <span class="icon-block half bg-blue-300 text-white">2</span> -->
                                        <span class="icon-block half bg-default text-white"><img src="{{asset('themes/bws/images/logo_course2.png')}}" width="50" class="img-responsive"></span>
                                    </div>
                                    <div class="media-body">
                                        <h1 class="text-display-1 margin-none">{{ $lesson->title}}</h1>
                                    </div>
                                    <br>
                                    <p class="text-body-2">
                                    </p>
                                    <p></p>
                                    <p>{{ $lesson->description}}</p>
                                    <p></p>
                                    <h4>ไฟล์ประกอบการเรียน</h4><a href="/lms_brother_docker/lms/app/index.php/course/download/103" target="_blank">PT-E850TKW_Chapter_1_2.pdf</a><br>
                                    <p></p>

                                </div>
                            </div>
                        </div>
                        <div class="lessonContent">

                            <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading830">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapse830" aria-expanded="true" aria-controls="collapse830">
                                                <div style="float: left;" id="imageCheck830"><img title="ยังไม่ได้เรียน" style="margin-bottom: 8px;" src="{{asset('images/icon_checkbox.png')}}" alt="ยังไม่ได้เรียน"></div> test : view 821
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse830" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading830">
                                        <div class="panel-body" style="background-color: #666;">
                                            <div>
                                                <div class="split-me" id="split-me1">
                                                    <div class="col-md-6">
                                                        <video id="example_video_1" class="video-js vjs-default-skin" controls="" preload="none" data-setup="{}">
                                                            <source src="/../images/storage/uploads/lesson/1098386216-1.mp4" type="video/mp4">
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

                                                    <div class="col-md-6">

                                                        <div class="col-md-12">
                                                            <a href="#" id="showslide1" rel="prettyPhoto">

                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 showslidethumb" id="showslidethumb1" style="overflow-x:auto; padding:0;">
                                                        <ul>
                                                            <li><img src="/../images/storage/uploads/ppt/830/slide-0.JPG" id="slide1_0" class="slidehide1 img-responsive" style="" data-time="1">
                                                            </li>
                                                            <li><img src="/../images/storage/uploads/ppt/830/slide-1.JPG" id="slide1_1" class="slidehide1 img-responsive" style="display:none;" data-time="19">
                                                            </li>
                                                            <li><img src="/../images/storage/uploads/ppt/830/slide-2.JPG" id="slide1_2" class="slidehide1 img-responsive" style="display:none;" data-time="38">
                                                            </li>
                                                            <li><img src="/../images/storage/uploads/ppt/830/slide-3.JPG" id="slide1_3" class="slidehide1 img-responsive" style="display:none;" data-time="74">
                                                            </li>
                                                            <li><img src="/../images/storage/uploads/ppt/830/slide-4.JPG" id="slide1_4" class="slidehide1 img-responsive" style="display:none;" data-time="92">
                                                            </li>
                                                            <li><img src="/../images/storage/uploads/ppt/830/slide-5.JPG" id="slide1_5" class="slidehide1 img-responsive" style="display:none;" data-time="101">
                                                            </li>
                                                            <li><img src="/../images/storage/uploads/ppt/830/slide-6.JPG" id="slide1_6" class="slidehide1 img-responsive" style="display:none;" data-time="112">
                                                            </li>
                                                            <li><img src="/../images/storage/uploads/ppt/830/slide-7.JPG" id="slide1_7" class="slidehide1 img-responsive" style="display:none;" data-time="134">
                                                            </li>
                                                            <li><img src="/../images/storage/uploads/ppt/830/slide-8.JPG" id="slide1_8" class="slidehide1 img-responsive" style="display:none;" data-time="139">
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <script type="text/javascript">
                                                    console.log('first')

                                                    function clearAllRun1() {
                                                        window.run1_0 = false;
                                                        window.run1_1 = false;
                                                        window.run1_2 = false;
                                                        window.run1_3 = false;
                                                        window.run1_4 = false;
                                                        window.run1_5 = false;
                                                        window.run1_6 = false;
                                                        window.run1_7 = false;
                                                        window.run1_8 = false;
                                                    }
                                                    var myPlayer1 = videojs('example_video_1');
                                                    var link = '/lms_brother_docker/lms/app/index.php/Course/LearnVdo';
                                                    var id = '830';
                                                    var learn_id = '14592';
                                                    console.log('con_vdo')

                                                    console.log('s')
                                                    myPlayer1.on('play', function() {
                                                        console.log('play')
                                                        $.getJSON('/lms_brother_docker/lms/app/index.php/Course/LearnVdo', {
                                                            id: id,
                                                            learn_id: learn_id,
                                                            counter: "counter"
                                                        }, function(data) {
                                                            // console.log(id);
                                                            // console.log(learn_id);
                                                            $('#imageCheck' + data.no).html(data.image);
                                                        });
                                                    });
                                                    myPlayer1.on('ended', function() {
                                                        console.log('ended')
                                                        $.getJSON('/lms_brother_docker/lms/app/index.php/Course/LearnVdo', {
                                                            id: id,
                                                            learn_id: learn_id,
                                                            status: "success"
                                                        }, function(data) {
                                                            $('#imageCheck' + data.no).html(data.image);
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <script type="text/javascript">
                            var myVar;
                            var width = $(document).width();
                            var height = $(document).height();

                            $(document).ready(function() {



                                // $('.container').attr('class', 'container-fluid');
                                $(".video-js").each(function(videoIndex) {
                                    var videoId = $(this).attr("id");
                                    var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
                                    var myPlayer = videojs(videoId);


                                    var $win = $(window); // or $box parent container
                                    var $box = $(".video-js");
                                    var statusCheckCountdown = true;

                                    var checkFullScreen = true;


                                    function countdown(timer) {
                                        // console.log(timer);
                                        var myPlayer_alert = videojs(videoId);
                                        // console.log(timer)

                                        if ((window.fullScreen) ||
                                            (window.innerWidth == screen.width && window.innerHeight == screen.height)) {
                                            checkFullScreen = true;
                                        } else {
                                            checkFullScreen = false;

                                        }


                                        if (timer === 0) {
                                            myPlayer_alert.pause();
                                            if (checkFullScreen) {
                                                myPlayer_alert.exitFullscreen();
                                            }
                                            swal({
                                                    title: "ท่านยังอยู่ที่หน้าจอคอมพิวเตอร์",
                                                    text: 'ของท่านหรือไม่ ?',
                                                    icon: 'warning',
                                                    buttons: [false, "ตกลง"],
                                                })
                                                .then((confirm) => {
                                                    if (confirm) {
                                                        // alert("ok");
                                                        if (checkFullScreen) {
                                                            myPlayer_alert.requestFullscreen();
                                                            countdown(300);
                                                        }
                                                        myPlayer_alert.play();
                                                        statusCheckCountdown = false;
                                                    }
                                                });
                                            setTimeout();


                                        }
                                        // setTimeout(() => countdown(timer - 1), 1000);
                                        var timers = setTimeout(() => countdown(timer - 1), 1000);

                                        var keys = {};
                                        $(document).keydown(function(e) {
                                            if (e.which == 17 || e.which == 18 || e.which == 9) {
                                                myPlayer.pause();
                                                clearTimeout(timers);
                                            }
                                        });





                                        $win.on("click.Bst", function(event) {
                                            if ($box.has(event.target).length == 0 && !$box.is(event.target)) {
                                                // alert('you clicked outside the video');
                                                if (statusCheckCountdown) {
                                                    myPlayer.pause();
                                                }
                                                clearTimeout(timers);
                                            }
                                            // else {
                                            //     console.log('you clicked inside the video');
                                            // }
                                        });

                                        // var keys = {};
                                        // $(document).keydown(function (e) {
                                        //     if(e.which == 17 || e.which == 18 || e.which == 9){
                                        //         myPlayer.pause();
                                        //     }
                                        // });

                                        $(window).bind('resize', function() {
                                            // alert('STOP');
                                            var current_width = $(document).width();
                                            var current_height = $(document).height();
                                            if (statusCheckCountdown) {
                                                clearTimeout(timers);
                                                myPlayer.pause();
                                            }
                                            if (current_width < width && current_height < height) {
                                                console.log('HIDE !!!!!!!!!!!');
                                                //vjs-paused
                                                $(".vjs-control-bar").css("display", "none");
                                                $("video").css("display", "none");
                                                $('video').click(function() {
                                                    return false;
                                                });
                                                $('#stopLearn').modal({
                                                    backdrop: 'static',
                                                    keyboard: false
                                                });
                                                $('#stopLearn').modal('show');
                                                // $('video').click(false);
                                                myPlayer.pause();
                                            } else {
                                                $(".vjs-control-bar").css("display", "block");
                                                $("video").css("display", "block");
                                                $('video').click(function() {
                                                    return false;
                                                });
                                                $('#stopLearn').modal('hide');
                                                // $('video').click(true);
                                            }

                                        });

                                        window.onblur = function() {
                                            // console.log('blur');
                                            clearTimeout(timers);
                                            myPlayer.pause();
                                        }

                                    }


                                    _V_(videoId).ready(function() {
                                        this.on("play", function(e) {
                                            countdown(300);

                                            // alert('asdad');

                                            //pause other video
                                            $(".video-js").each(function(index) {
                                                if (videoIndex !== index) {
                                                    this.player.pause();
                                                }
                                            });

                                        });

                                    });
                                });
                                $("a[rel^='prettyPhoto']").prettyPhoto({
                                    social_tools: false
                                });
                            });
                        </script>
                    </div>

                    <!-- <h5 class="text-subhead-2 text-light">บทเรียน</h5> -->
                    <div class="panel panel-default curriculum open paper-shadow" data-z="0.5">
                        <div class="panel-heading panel-heading-gray" data-toggle="collapse" data-target="#curriculum-1">
                            <div class="media">
                                <div class="media-left">
                                    <span class="icon-block img-circle bg-orange-300 half text-white"><i class="fa fa-graduation-cap"></i></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="text-headline"><strong>บทเรียน</strong></h3>
                                </div>
                            </div>
                            <!-- <span class="collapse-status collapse-open">Open</span> -->
                            <!-- <span class="collapse-status collapse-close">Close</span> -->
                        </div>
                        @foreach($lesson_list  as $list)
                        <div class="list-group collapse in" id="curriculum-1">
                            <a href="{{ route('course.lesson', ['course_id' => $list->course_id,'id' => $list->id]) }}">

                                <div class="list-group-item media active" data-target="{{ route('course.lesson', ['course_id' => $list->course_id,'id' => $list->id]) }}">
                                    <div class="media-left">
                                                <li class="text-crt"></li>
                                    </div>
                                    <div class="media-body">
                                        <i class="fa fa-fw fa-circle text-orange-300"></i>
                                       {{ $list->title }}
                                    </div>
                                    <!-- <div class="media-right">
                                        <div class="width-100 text-right text-caption">10:00 min</div>
                                    </div> -->
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <br>
                    <br>
                </div>
                <div class="col-md-3">

                    <div class="panel panel-primary" data-toggle="panel-collapse" data-open="true">
                        <div class="panel-heading panel-collapse-trigger collapse in" data-toggle="collapse" data-target="#b4ae6923-e10f-aefb-6fa1-189cbe03d8f5" aria-expanded="true" style="">
                            <h4 class="panel-title" style="font-weight: bold;">หัวข้อเกี่ยวกับหลักสูตร</h4>
                        </div>

                        <div id="b4ae6923-e10f-aefb-6fa1-189cbe03d8f5" class="collapse in">
                            <div class="panel-body list-group">
                                <ul class="list-group list-group-menu">
                                    <li class="list-group-item active"><a class="link-text-color" href="/lms_brother_docker/lms/app/index.php/course/lesson/222">บทเรียน</a>
                                    </li>
                                    <li class="list-group-item"><a class="link-text-color" href="/lms_brother_docker/lms/app/index.php/forum">เว็บบอร์ดของหลักสูตร</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>




                    <div class="panel panel-primary" data-toggle="panel-collapse" data-open="true">
                        <div class="panel-heading panel-collapse-trigger collapse in" data-toggle="collapse" data-target="#a61ed05a-9654-8825-8ff5-72531f405beb" aria-expanded="true" style="">
                            <h4 class="panel-title" style="font-size: 22px;font-weight: bold;">สรุปผลการเรียน</h4>
                        </div>

                        <div id="a61ed05a-9654-8825-8ff5-72531f405beb" class="collapse in">
                            <div class="panel-body list-group">
                                <ul class="list-group list-group-menu">


                                    <li class="list-group-item menu_li_padding" style="font-size: 20px;font-weight: bold;">ผลการเรียน<br>

                                        <p style="font-weight: normal;color: #045BAB;"><span style="color:blue;">เรียนยังไม่ผ่าน</span></p>
                                    </li>
                                    <li class="list-group-item menu_li_padding" style="font-size: 20px;font-weight: bold;">
                                        ผลการสอบกอ่นเรียน,ผลการสอบหลังเรียน<br>
                                        <p style="font-weight: normal;color: #045BAB;">- </p>

                                    </li>
                                    <li class="list-group-item menu_li_padding" style="font-size: 20px;font-weight: bold;">สิทธิการทำแบบทดสอบ<br>

                                        <p style="font-weight: normal;color: #045BAB;">-</p>
                                    </li>
                                    <li class="list-group-item menu_li_padding" style="font-size: 20px;font-weight: bold;">คะแนนที่ดีที่สุด<br>

                                        <p style="font-weight: normal;color: #045BAB;">0 / 0</p>
                                    </li>
                                    <li class="list-group-item menu_li_padding">แบบสอบถาม<br>

                                        <p style="font-weight: normal;color: #045BAB;">-</p>
                                    </li>
                                    <li class="list-group-item menu_li_padding">
                                        <b>คะแนนผลการสอบ</b> <span style="color: #045BAB;">0.00 %</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>




                    <div class="panel panel-primary" data-toggle="panel-collapse" data-open="true">
                        <div class="panel-heading panel-collapse-trigger collapse in" data-toggle="collapse" data-target="#338482d2-9782-f9f0-f7c9-4e51b69d603e" aria-expanded="true" style="">
                            <h4 class="panel-title" style="font-size: 22px;font-weight: bold;">ผู้สอน</h4>
                        </div>


                        <div id="338482d2-9782-f9f0-f7c9-4e51b69d603e" class="collapse in">
                            <div class="panel-body">
                                <div class="media v-middle">
                                    <div class="media-left">
                                        <img class="img-circle width-40" src="/lms_brother_docker/lms/app/themes/bws/images/default-avatar.png" alt="No Image">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="text-title margin-none"><a href="#">อาจารย์ นภัทร สุขศิริภูริภัทร</a>
                                        </h4>
                                        <span class="caption text-light">ชื่อวิทยากร</span>
                                    </div>
                                </div>
                                <br>

                                <div class="expandable expandable-indicator-white expandable-trigger">
                                    <div class="expandable-content">
                                        <p></p>
                                        <p><label id="lblPositionInfo">Expert - Technical Support Engineer</label></p>
                                        <p></p>
                                        <div class="expandable-indicator"><i></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</body>
@endsection