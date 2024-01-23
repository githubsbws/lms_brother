@extends('layout/mainlayout')
@section('title', 'Course')
@section('content')
@php
use App\Models\Choice;
@endphp
@foreach($breadcrumbs as $breadcrumb)
    @if($breadcrumb['url'])
        <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a> /
    @else
        {{ $breadcrumb['name'] }} /
    @endif
@endforeach
    <style type="text/css">
        #question-form p {
            display: inline;
        }
    </style>
    <script type='text/javascript'
            src='{{asset('themes/bws/js/jquery.countdown.min.js')}}'></script>
    <script type="text/javascript">
        window.timeEnd = false;
    </script>
    <div class="bs-example">

        


        <style>
            .quiz {
                list-style-type: none;
                margin-bottom: 40px;
            }

            .quiz li {
                float: left;
                margin-right: 20px;
            }

            .head-quiz {
                padding-left: 20px;
                padding-right: 20px;
            }

            thead {
                background-color: #94CFFF;
            }

            .mb-quiz {
                margin-bottom: 10px;
            }

            .form-control {
                border: 1px solid #D1D1D1;
            }

            .radio label::before {
                border: 1px solid #4193D0;
            }

            .checkbox label::before {
                border: 1px solid #4193D0;
            }

            .ml-15 {
                margin-left: 15px;
            }

            .mb-10 {
                margin-bottom: 15px;;
            }

            .span5 {
                width: 500px;
            }
            label{
                font-weight: normal;
            }
        </style>
        
        <div class="parallax bg-white page-section">
            <div class="container parallax-layer" data-opacity="true">
                <div class="media v-middle">
                    <div class="media-body">
                        <h1 class="text-display-2 margin-none">แบบทดสอบ</h1>

                        <!--                <p class="text-light lead">แบบประเมินผลการอบรม</p>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="text-center bg-transparent margin-none">

            </div>
            <div class="page-section">
                <div class="panel panel-default head-quiz">
                    <div class="row">
                        <div class="col-md-12 col-sm-12"
                             style="margin-top: 20px;margin-bottom: 30px;text-align: center;"><img
                                src="{{asset('Adminkit/theme/images/head-subject/quiz.png')}}"
                                alt="person" style="margin-top: -15px;"/><span
                                style="font-size: 50px;color: rgb(0, 183, 243);">แบบทดสอบ</span>


                            <?php
                            /*$first = array('100','101');
                            $firstInvert = array('100','101');
                            var_dump($first == $firstInvert);*/
                            if ($lesson->time_test != '' && $lesson->time_test != 0) {
                                ?>
                                <div class="alert alert-danger sticky" style="font-size: 30px;background-color: rgb(255, 188, 188);
color: rgb(30, 30, 30);">
                                    <strong>เวลาในการทำข้อสอบ : <span id="timeTest"></span></strong>
                                </div>
                            <?php
                            }
                            ?>
                        </div>


                        @php
                            $strTotal = 0;
                            $questionTypeArray = ['1' => 'checkbox', '2' => 'radio', '3' => 'textarea'];
                        @endphp
                        @foreach ($model as $z => $m)
                        
                            @php ++$strTotal; 
                            $choice = Choice::where(['ques_id'=>$m->ques_id,'active'=>'y'])->get();
                            @endphp

                            <div class="question" style="margin: 10px 0; font-weight: bold; font-size: 22px;">
                                <div class="col-md-12 col-sm-12">
                                    @php
                                        $imageS = asset('/images/knewstuff.png');
                                    @endphp
                                    <img src="{{ $imageS }}" width="20px" valign="top" style="margin-right:10px;" alt="">
                                    {{ $strTotal }}.{!! html_entity_decode($m->ques_title) !!}
                                </div>
                    
                                <div id="div-choice" class="col-md-12 col-sm-12 ml-15 pull-left question-group" style="margin-top: 5px;">
                                    @if ($m->ques_type == '1')
                                        {{ Form::hidden("Question_type[{$m->ques_id}]", $questionTypeArray[$m->ques_type]) }}
                                        @if ($choice)
                                            @foreach ($choice as $choices)
                                                <div class="col-md-12 col-sm-12 mb-quiz">
                                                    <label>
                                                        {{ Form::checkbox("Choice[{$m->ques_id}][]", $choices->choice_id, false, ['style' => 'margin-top:0px;']) }}
                                                        {{ html_entity_decode($choices->choice_detail) }}<br>
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif
                                    @elseif ($m->ques_type == '2')
                                        {{ Form::hidden("Question_type[{$m->ques_id}]", $questionTypeArray[$m->ques_type]) }}
                                        @if ($choice)
                                            @foreach ($choice as $choices)
                                                <div class="col-md-12 col-sm-12 mb-quiz">
                                                    <label>
                                                        {{ Form::radio("Choice[{$m->ques_id}][]", $choices->choice_id, false, ['style' => 'margin-top:0px;']) }}
                                                        {{ html_entity_decode($choices->choice_detail) }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif
                                    @elseif ($m->ques_type == '3')
                                        {{ Form::hidden("Question_type[{$m->ques_id}]", $questionTypeArray[$m->ques_type]) }}
                                        <div class="col-md-12 col-sm-12 mb-quiz">
                                            {{ Form::textarea("ChoiceText[{$m->ques_id}]", '', ['class' => 'form-control']) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                    
                            <div class="col-md-12 col-sm-12 mb-assessment" style="margin-bottom: 40px;">
                                <img src="{{ asset('/images/bordertop.png') }}" class="img-responsive" alt="">
                            </div>

                    
                        @endforeach
                        <div class="col-md-12 col-sm-12 mb-assessment text-right" style="margin-bottom: 40px;">
                            <button class="btn btn-icon btn-primary">บันทึกข้อมูล</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        
    </div>
    <script type="text/javascript">
        $(function () { // document ready

            $('form#question-form').submit(function () {

                var validate = true;

                if (validate && !window.timeEnd) {
                    // alert('กรุณาเลือกคำตอบให้ครบ');
                    //  return false;

                    $('.question-group').each(function (index) {

                        var type = $(this).find("input[name^='Question_type']");
                        if (type.length) {
                            type = type.val();
                        } else {
                            type = 'error';
                        }

                        if (type != 'textarea') {
                            var radiochecked = $(this).find("input:checked").length;
                            if (!radiochecked) {
                                alert('กรุณาเลือกคำตอบให้ครบ');
                                $(this).find("input:" + type).first().focus();
                                validate = false;
                                return false;
                            }
                        }

                    });
                }

                return validate;
            });

            if (!!$('.sticky').offset()) { // make sure ".sticky" element exists

                var stickyTop = $('.sticky').offset().top; // returns number

                $(window).scroll(function () { // scroll event

                    var windowTop = $(window).scrollTop(); // returns number

                    if (stickyTop < windowTop) {
                        $('.sticky').css({position: 'fixed', top: 0, 'z-index': 99999, right: 0});
                    }
                    else {
                        $('.sticky').css('position', 'static');
                    }

                });

            }

        });
    </script>
<?php
if ($lesson->time_test != '' && $lesson->time_test != 0) {
    ?>
    <script type="text/javascript">
        $("#timeTest")
            .countdown('<?php echo date('Y/m/d H:i:s',strtotime('+'.$lesson->time_test.' minutes')); ?>', function (event) {
                //console.log(event);
                $(this).text(
                    event.strftime('%H:%M:%S')
                );
            })
            .on('finish.countdown', function (event) {
                window.timeEnd = true;
                jQuery('#question-form').submit();
            });
    </script>
<?php
}
?>
@endsection