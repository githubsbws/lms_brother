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
            <div id="content">
                <ul class="breadcrumb">
                    <li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a href="/admin/index.php/contact/index">ติดต่อเรา</a></li> »
                    <li>เพิ่มข้อมูลติดต่อ</li>
                </ul><!-- breadcrumbs -->
                <div class="separator bottom"></div>

                <!-- innerLR -->
                <div class="innerLR">
                    <div class="widget widget-tabs border-bottom-none">
                        <div class="widget-head">
                            <ul>
                                <li class="active">
                                    <a class="glyphicons edit" href="#account-details" data-toggle="tab">
                                        <i></i>เพิ่มข้อมูลติดต่อ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget-body">
                            <div class="form">
                                <form enctype="multipart/form-data" id="contactus_insert" action="/contactus_insert" method="post">
                                    @csrf
                                    <p class="note">ค่าที่มี <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span> จำเป็นต้องใส่ให้ครบ</p>

                                    <div class="row">
                                        <label for="contac_by_name" class="required">ชื่อ <span class="required">*</span></label>
                                        <input size="60" maxlength="250" class="span8" name="contac_by_name" id="contac_by_name" type="text">
                                    </div>

                                    <div class="row">
                                        <label for="contac_by_surname" class="required">นามสกุล <span class="required">*</span></label>
                                        <input size="60" maxlength="250" class="span8" name="contac_by_surname" id="contac_by_surname" type="text">
                                    </div>

                                    <div class="row">
                                        <label for="contac_by_email" class="required">อีเมล <span class="required">*</span></label>
                                        <input size="60" maxlength="250" class="span8" name="contac_by_email" id="contac_by_email" type="text">
                                        <span id="email-error" style="color: red;"></span>
                                    </div>

                                    <div class="row">
                                        <label for="contac_by_tel" class="required">เบอร์โทรศัพท์ <span class="required">*</span></label>
                                        <input size="60" maxlength="250" class="span8" name="contac_by_tel" id="contac_by_tel" type="text">
                                        <span id="tel-error" style="color: red;"></span>
                                    </div>

                                    <div class="row">
                                        <label for="contac_subject" class="required">หัวข้อติดต่อ <span class="required">*</span></label>
                                        <input size="60" maxlength="250" class="span8" name="contac_subject" id="contac_subject" type="text">
                                    </div>

                                    <div class="row">
                                        <label for="contac_detail" class="required">รายละเอียดติดต่อ <span class="required">*</span></label>
                                        <textarea class="span8" name="contac_detail" id="contac_detail" rows="6"></textarea>
                                    </div>

                                    <div class="row">
                                        <label for="contac_ans_subject" class="required">หัวข้อคำตอบ <span class="required">*</span></label>
                                        <input size="60" maxlength="250" class="span8" name="contac_ans_subject" id="contac_ans_subject" type="text">
                                    </div>

                                    <div class="row">
                                        <label for="contac_ans_detail" class="required">รายละเอียดคำตอบ <span class="required">*</span></label>
                                        <textarea class="span8" name="contac_ans_detail" id="contac_ans_detail" rows="6"></textarea>
                                    </div>

                                    <div class="row buttons">
                                        <button class="btn btn-primary btn-icon glyphicons ok_2"><i></i>บันทึกข้อมูล</button>
                                    </div>
                                </form>
                            </div><!-- form -->
                        </div>
                    </div>
                </div>
                <!-- END innerLR -->

                <div id="sidebar">
                </div><!-- sidebar -->
            </div>
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
@section('scripts')
    @parent
    <script>
        function validateEmail() {
            var emailInput = document.getElementById('contac_by_email');
            var emailError = document.getElementById('email-error');
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(emailInput.value)) {
                emailError.textContent = 'กรุณากรอก Email ให้ถูกต้อง';
            } else {
                emailError.textContent = '';
            }
        }

        function validatePhoneNumber() {
            var telInput = document.getElementById('contac_by_tel');
            var telError = document.getElementById('tel-error');
            var telRegex = /^\d+$/;

            if (!telRegex.test(telInput.value)) {
                telError.textContent = 'กรุณากรอกเบอร์โทรศัพท์เป็นตัวเลขเท่านั้น';
            } else {
                telError.textContent = '';
            }
        }

        // เพิ่ม event listener สำหรับทำ validation
        document.getElementById('contac_by_email').addEventListener('blur', validateEmail);
        document.getElementById('contac_by_tel').addEventListener('blur', validatePhoneNumber);
    </script>
@endsection