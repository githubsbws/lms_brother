<!-- page 2 add Questionnaire-->


<?php echo CHtml::beginForm(Yii::app()->createUrl('AddGroup/AddGroup'), 'POST'); ?>
<?php
echo "<br>";
echo 'TH ชื่อแบบสอบถาม';
echo CHtml::textField('nameTH');
echo '<br>';
echo '<br>';
echo 'EN ชื่อแบบสอบถาม';
echo CHtml::textField('nameEN');
?>
<br>
<br>


<?php
echo 'วันที่';
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name' => 'publishDate',
    // additional javascript options for the date picker plugin
    'options' => array(
        'showAnim' => 'fold',
        'dateFormat'=>'yy-mm-dd',
    ),
    'htmlOptions' => array(
        'style' => 'height:20px;'
    ),
));
?>

<?php
echo 'ถึง';
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name' => 'endDate',
    // additional javascript options for the date picker plugin
    'options' => array(
        'showAnim' => 'fold',
        'dateFormat'=>'yy-mm-dd',
    ),
    'htmlOptions' => array(
        'style' => 'height:20px;'
    ),
));
?>

<table style='border-style: solid; margin-top:10px; margin-bottom: 10px; margin-left: 30px;' border=1>
    <tr>
        <td>หัวข้อที่ 1 <input type="button" value="save" onclick="saveGroup('<?php echo $count; ?>');"/>
            <input type="button" id="btnPreview" value="Preview" onclick="Preview(); "/>
        </td>


    </tr>   
    <tr>
        <td> <?php
            echo CHtml::label('หัวข้อ : ', null);
            echo CHtml::dropDownList('DDlist', '', $dropdownitem, ''); // แสดง dropDownList
            echo '<br>';
            echo CHtml::label('คำถาม : ', null);
            ?>
            <div id='Question'></div>
        </td>
    </tr>



</table>
<?php
echo CHtml::submitButton('ตกลง');
echo CHtml::submitButton('ยกเลิก');
?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery/jquery-1.11.3.min.js"); ?>
<script type="text/javascript">
document.getElementById("btnPreview").disabled = true;
        $(document).ready(function () {
            var value = $('#DDlist :selected').text();

                jQuery.ajax({
                    type: "POST",
                    url: "../Addgroup/Listquestion",
                    data: {val: value},
                    success: function (msg) {
                        //alert('success');
                        $("#Question").html(msg);
                    },
                    error: function (xhr) {
                        alert("failure: " + xhr.readyState + this.url);

                    }
                });

        $('#DDlist').change(function () {
            var value = $('#DDlist :selected').text();
            var baseUrl = "../AddGroup/AddGroup";

                jQuery.ajax({
                    type: "POST",
                    url: "../Addgroup/Listquestion",
                    data: {val: value},
                    success: function (msg) {
                        //cosole.log('success');
                        //   alert('success');
                        $("#Question").html(msg);
                    },
                    error: function (xhr) {
                        alert("failure: " + xhr.readyState + this.url);

                    }
                });


        });
    });
    var add =0;
    function saveGroup(count)
    {
        document.getElementById("btnPreview").disabled = false; 
        var Title = $('#DDlist :selected').text();
        var nameTH = $('#nameTH').val();
        var nameEN = $('#nameEN').val();
        var sDate = $('#publishDate').val();
        var eDate = $('#endDate').val();      
      
        if(add<1){//add CGroup           
                    jQuery.ajax({
                        type: "POST",
                        url: "../Addgroup/InsertCGroup",
                        data: {
                                    nTH: nameTH, 
                                    nEN: nameEN, 
                                    Sd: sDate, 
                                    Ed: eDate                                    
                              },
                        success: function (msg) {
                            console.log('InsertCGroup'); 
                            addQuestion(count);                           
                        },
                        error: function (xhr) {
                            alert("failure: " + xhr.readyState + this.url);
                        }
                    });
                    add++;                   
        }
        else
        {           
            addQuestion(count);
        }
        
       
    }
    function addQuestion(count)
    {
        //add Question
        for (i = 1; i <= count; i++) {
            if ($("#chkquestion" + i).is(':checked')) {
                var question = $("#chkquestion" + i).val();                      
                if (question != null){                 
                        jQuery.ajax({
                            type: "POST",
                            url: "../Addgroup/InsertQuestion",
                            data: {
                                        chkquestion: question                                                                        
                                  },
                            success: function (msg) {
                                console.log('InsertQuestionSuccess');
                                $("#test").html(msg);
                            },
                            error: function (xhr) {
                                alert("failure: " + xhr.readyState + this.url);

                            }
                        });
                }
               
            }
        }
        alert("เพิ่มคำถามเรียบร้อย");
    }
    function Preview() {
        window.open("../Preview/Preview");
    }


</script>
<div id="test"></div>
<?php
echo CHtml::endForm();




