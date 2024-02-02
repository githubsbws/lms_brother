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
					<li><a href="/admin">หน้าหลัก</a></li> » <li><a href="{{url('questionnaireout')}}">หมวดหัวข้อ</a></li> » <li>แก้ไขหมวดหัวข้อ</li>
				</ul>
				<!-- breadcrumbs -->
				<div class="separator bottom"></div>
				<div class="innerLR">
                    <div class="widget widget-tabs border-bottom-none">
                        <div class="widget-head">
                            <ul>
                                <li class="active">
                                    <a class="glyphicons edit" href="#account-details" data-toggle="tab">
                                        <i></i>แก้ไขหมวดหัวข้อ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget-body">
                            <div class="form">
                                <form enctype="multipart/form-data" id="questionnaireout-form" action="{{route('questionnaireout_update',$survey_headers->survey_header_id)}}" method="post">
                                    @csrf
                                    <p class="note">ค่าที่มี <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span> จำเป็นต้องใส่ให้ครบ</p>

                                    {{-- <div class="row">
                                        <label for="faq_type_id" class="required">หมวดหมู่คำถาม <span class="required">*</span></label>
                                        <select class="span8 custom-dropdown" name="faq_type_id" id="faq_type_id">
                                        </select>
                                    </div> --}}

                                    <div class="row">
                                        <label for="question_THtopic" class="required">แก้ไขชื่อหมวดหัวข้อ<span class="required">*</span></label>
                                        <input size="60" maxlength="250" class="span8" name="survey_name" id="question_THtopic" value="{{$survey_headers->survey_name}}" type="text">
                                    </div>
									@error('survey_name')
										<div class="my-2">
											<span class="text-primary">{{$message}}</span>
										</div>
									@enderror

                                    <div class="row">
                                        <label for="question_THdetails" class="required">แก้ไขรายละเอียดหัวข้อ<span class="required">*</span></label>
                                        <textarea class="span8" name="instructions" id="question_THdetails" rows="6">{{$survey_headers->instructions}}</textarea>
                                    </div>
									@error('instructions')
										<div class="my-2">
											<span class="text-primary">{{$message}}</span>
										</div>
									@enderror

                                    <div class="row buttons">
                                        <button class="btn btn-primary btn-icon glyphicons ok_2"><i></i>อัปเดคข้อมูล</button>
                                    </div>
                                </form>
								<script>
									ClassicEditor
										.create( document.querySelector( '#question_THdetails' ) )
										.catch( error => {
											console.error( error );
										} );
								</script>	
                            </div><!-- form -->
                        </div>
                    </div>
                </div>
                <!-- END innerLR -->
				<div id="sidebar">
				</div><!-- sidebar -->
			</div>
			<!-- </div> -->
			<!-- <div class="span-5 last"> -->
			<!-- </div> -->
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