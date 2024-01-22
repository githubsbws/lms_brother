@extends('layout/mainlayout')
@section('title', 'Course')
@section('content')

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


                        <?php
                        $strTotal = 0;
                        $questionTypeArray = array(1 => 'checkbox', 2 => 'radio', 3 => 'textarea');
                        ?>

                        <?php foreach ($model as $z => $m): ?>

                            <?php foreach ($m as $i => $result): ++$strTotal; ?>

                                <div class="question" style="margin:10px 0;font-weight: bold;font-size: 22px;">

                                    <div class="col-md-12 col-sm-12">

                                        <?php $imageS = CHtml::image(Yii::app()->request->baseUrl . '/images/knewstuff.png', '', array(
                                            'width' => '20px',
                                            'valign' => 'top',
                                            'style' => 'margin-right:10px;'
                                        )); ?>
                                        <?php echo $imageS . ' ' . $strTotal . '. ' . CHtml::decode($result->ques_title); ?>

                                    </div>

                                    <div id="div-choice<?php echo $i; ?>"
                                         class="col-md-12 col-sm-12 ml-15 pull-left question-group" style="margin-top: 5px;">

                                        <?php
                                        //========== Check Count Chioce ==========//

                                        if ($result->ques_type == 1) {
                                            echo CHtml::hiddenField("Question_type[" . $result->ques_id . "]", $questionTypeArray[$result->ques_type]);
                                            if ($result->chioce) {
                                                foreach ($result->chioce as $choice) {
                                                    echo "<div class='col-md-12 col-sm-12 mb-quiz'><label>";
                                                    echo CHtml::checkBox("Choice[" . $result->ques_id . "][]", false,
                                                            array(
                                                                'value' => $choice->choice_id,
                                                                'style' => 'margin-top:0px;'
                                                            )
                                                        ) . " " . CHtml::decode($choice->choice_detail) . "<br>";
                                                    echo "</label></div>";
                                                }
                                            }
                                        } else if ($result->ques_type == 2) {
                                            echo CHtml::hiddenField("Question_type[" . $result->ques_id . "]", $questionTypeArray[$result->ques_type]);
                                            if ($result->chioce) {
                                                foreach ($result->chioce as $choice) {
                                                    echo "<div class='col-md-12 col-sm-12 mb-quiz'><label>";
                                                    echo CHtml::radioButton("Choice[" . $result->ques_id . "][]", false,
                                                            array(
                                                                'value' => $choice->choice_id,
                                                                'style' => 'margin-top:0px;'
                                                            )
                                                        ) . " " . CHtml::decode($choice->choice_detail);
                                                    echo "</label></div>";
                                                }
                                            }
                                        } else if ($result->ques_type == 3) {
                                            echo CHtml::hiddenField("Question_type[" . $result->ques_id . "]", $questionTypeArray[$result->ques_type]);
                                            echo "<div class='col-md-12 col-sm-12 mb-quiz'>";
                                            echo CHtml::textarea("ChoiceText[" . $result->ques_id . "]", '', array('class' => 'form-control'));
                                            echo "</div>";
                                        }

                                        ?>

                                    </div>
                                </div>
                                <?php //echo $form->error($result,"[$z][$i]choiceAnswer"); ?>
                                <div class="col-md-12 col-sm-12 mb-assessment" style="margin-bottom: 40px;">
                                    <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/bordertop.png', '', array('class' => 'img-responsive')); ?>
                                </div>

                            <?php endforeach; ?>

                        <?php endforeach; ?>
                        <div class="col-md-12 col-sm-12 mb-assessment text-right" style="margin-bottom: 40px;">
                            <?php echo CHtml::tag('button', array('class' => 'btn btn-icon btn-primary'), 'บันทึกข้อมูล'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <?php $this->endWidget(); ?>
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