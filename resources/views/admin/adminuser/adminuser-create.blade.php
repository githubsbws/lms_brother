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
					<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a href="{{ url('/adminuser')}}">ข้อมูลกลุ่มผู้ดูแลระบบ</a></li> » <li>เพิ่มกลุ่มผู้ดูแลระบบ</li>
				</ul><!-- breadcrumbs -->
				<div class="separator bottom"></div>


				<!-- innerLR -->
				<div class="innerLR">
					<div class="widget widget-tabs border-bottom-none">
						<div class="widget-head">
							<ul>
								<li class="active">
									<a class="glyphicons edit" href="#account-details" data-toggle="tab">
										<i></i>เพิ่มกลุ่มผู้ดูแลระบบ</a>
								</li>
							</ul>
						</div>
						<div class="widget-body">
							<div class="form">
								<form enctype="multipart/form-data" id="adminuser-form" action="/adminuser_insert" method="post">
									@csrf
									<p class="note">ค่าที่มี <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span> จำเป็นต้องใส่ให้ครบ</p>
									<div class="row border">
                                        <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label>กลุ่มผู้ใช้</label>
                                                <br>                                        
                                                <div class="select2-container select2-container-multi" id="s2id_PGoup" style="width: 370px;">
                                                    <ul class="select2-choices">  
                                                        <li class="select2-search-field">    
                                                        <label for="s2id_autogen1" class="select2-offscreen"></label>    
                                                        <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default" id="s2id_autogen1" placeholder="" style="width: 407.4px;">  
                                                        </li>
                                                    </ul>
                                                    <div class="select2-drop select2-drop-multi select2-display-none">   
                                                        <ul class="select2-results">   
                                                            <li class="select2-no-results">ไม่พบข้อมูล</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <select multiple="multiple" name="PGoup[]" id="PGoup" tabindex="-1" class="select2-offscreen"></select>   
                                            </div>  
                                        </div>
                                    </div><br><br>

                                    <div class="row">
										<label for="Orgchart_title" class="required">ชื่อผู้ใช้งาน <span class="required">*</span></label> 
                                        <input class="form-control" placeholder="ชื่อผู้ใช้งาน" name="username" id="User_username" type="text" > 
                                        <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="adminuser_adminuser_title_em_" style="display:none"></div>
										</div>
									</div>
                                    
									@error('username')
										<div class="my-2">
											<span class="text-primary">{{$message}}</span>
										</div>
									@enderror

                                    <div class="row border">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><label for="User_password">รหัสผ่าน</label></label>
                                                <div class="eye error">
                                                    <i class="fa fa-eye showPassword"></i>
                                                    <input class="form-control" placeholder="รหัสผ่าน (ควรเป็น (A-z0-9) และมากกว่า 8 ตัวอักษร)" name="password" id="User_password" type="password">
                                                    <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                                    <div class="error help-block">
                                                        <div class="label label-important" id="User_password_em_" style="display:none"></div>
                                                    </div>                                                 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @error('password')
										<div class="my-2">
											<span class="text-primary">{{$message}}</span>
										</div>
									@enderror

                                    <div class="row">   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><label for="User_verifyPassword">ยืนยันรหัสผ่าน</label></label>
                                                <div class="eye">
                                                    <i class="fa fa-eye showPasswordConf"></i>
                                                    <input class="form-control" placeholder="ยืนยันรหัสผ่าน" name="password" id="User_verifyPassword" type="password">
                                                    <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                                    <div class="error help-block">
                                                        <div class="label label-important" id="User_verifyPassword_em_" style="display:none"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @error('password')
										<div class="my-2">
											<span class="text-primary">{{$message}}</span>
										</div>
									@enderror

									{{-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><label for="Profile_phone" class="required">โทรศัพท์เคลื่อนที่ <span class="required">*</span></label></label>
                                                <input class="form-control" placeholder="เบอร์โทรศัพท์" minlength="10" maxlength="10" name="Profile[phone]" id="Profile_phone" type="text">                                                
                                                <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                                <div class="error help-block">
                                                    <div class="label label-important" id="Profile_phone_em_" style="display:none"></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>

                                    @error('phone')
										<div class="my-2">
											<span class="text-primary">{{$message}}</span>
										</div>
									@enderror --}}

									{{-- <div class="row">   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><label for="Profile_title_id">คำนำหน้าชื่อ</label></label>
                                                <select class="form-select" style="width:15%" name="Profile[title_id]" id="Profile_title_id">
                                                    <option value="">---เลือกคำนำหน้าชื่อ---</option>
                                                    <option value="1">คุณ</option>
                                                    <option value="2">นาย</option>
                                                    <option value="3">นางสาว</option>
                                                    <option value="4">นาง</option>
                                                </select>  
                                                <div class="error help-block">                                              
                                                    <div class="label label-important" id="Profile_title_id_em_" style="display:none"></div> 
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>

                                    @error('title_id')
                                    <div class="my-2">
                                        <span class="text-primary">{{$message}}</span>
                                    </div>
                                    @enderror --}}

                                    {{-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><label for="Profile_firstname" class="required">ชื่อ (TH) <span class="required">*</span></label></label>
                                                <input class="form-control" placeholder="ชื่อจริง" name="Profile[firstname]" id="Profile_firstname" type="text" maxlength="50">                                                
                                                <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                                <div class="error help-block">
                                                    <div class="label label-important" id="Profile_firstname_em_" style="display:none"></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>

                                    @error('firstname')
                                    <div class="my-2">
                                        <span class="text-primary">{{$message}}</span>
                                    </div>
                                    @enderror

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><label for="Profile_lastname" class="required">นามสกุล (TH) <span class="required">*</span></label></label>
                                                <input class="form-control" placeholder="นามสกุล" name="Profile[lastname]" id="Profile_lastname" type="text" maxlength="50">                                                
                                                <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                                <div class="error help-block">
                                                    <div class="label label-important" id="Profile_lastname_em_" style="display:none"></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>

                                    @error('lastname')
                                    <div class="my-2">
                                        <span class="text-primary">{{$message}}</span>
                                    </div>
                                    @enderror --}}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <!-- <label><label for="User_email" class="required">อีเมลล์ <span class="required">*</span></label></label> -->
                                                <label for="User_email">อีเมลล์ </label>
                                                <input class="form-control" placeholder="อีเมลล์" name="email" id="User_email" type="email">
                                                <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
                                                <div class="error help-block">
                                                    <div class="label label-important" id="User_email_em_" style="display:none"></div>
                                                </div>                                             
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @error('email')
                                    <div class="my-2">
                                        <span class="text-primary">{{$message}}</span>
                                    </div>
                                    @enderror

									<div class="row buttons">
										<button class="btn btn-primary btn-icon glyphicons ok_2"><i></i>สมัครสมาชิก</button>
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