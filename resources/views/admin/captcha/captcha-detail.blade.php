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
				<!-- breadcrumbs -->
				<div class="separator bottom"></div>
				<div class="innerLR">
					<!-- Box -->
					<div class="hero-unit well">
						<div class="widget-head">
                            <h4 class="heading glyphicons show_thumbnails_with_lines"><i></i>จัดการระบบCaptcha >> เพิ่มระบบCaptcha</h4>
                        </div>
						<hr class="separator">
						<!-- Row -->
						<div class="form">
                                <div class="row">
                                    <label for="capt_name" class="required">ชื่อเงื่อนไข<span class="required"></span></label>
									<h4>{{$captcha->capt_name}}</h4>
                                    <div class="error help-block">
                                        <div class="label label-important" id="News_cms_title_em_" style="display:none"></div>
                                    </div>
                                </div>
    
                                <div class="row">
                                    <label for="type" class="required">ชนิด<span class="required"></span></label> 
									<h4>{{$captcha->type}}</h4>
                                    <div class="error help-block">
                                        <div class="label label-important" id="type" style="display:none"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="capt_times" class="required">ระยะเวลาการแสดงแคปช่า<span class="required"></span></label> 
									<h4>{{$captcha->capt_times}}</h4>
									
                                    <div class="error help-block">
                                        <div class="label label-important" id="capt_times" style="display:none"></div>
                                    </div>
                                </div>
    
    
                            </div>  
                            <!-- // Row END -->
    
                        </div>
						<!-- // Row END -->

					</div>
					<!-- // Box END -->
				</div>
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