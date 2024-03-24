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
					<div class="widget" style="margin-top: -1px;">
                        <div class="widget-head">

                        </div>
                        <div class="widget-body">
                            <h4>รายละเอียด</h4>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ชื่อ:</th>
                                                    <td>{{ @$query->Profiles->Fullname() ?? null }}</td>
                                                </tr>
                                                <tr>
                                                    <th>ชื่อEN:</th>
                                                    <td>{{ @$query->Profiles->FullnameEN() ?? null }}</td>
                                                </tr>
                                                <tr>
                                                    <th>เลขบัตรประชาชน:</th>
                                                    <td>{{ @$query->Profiles->identification ?? null }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email:</th>
                                                    <td>{{ @$query->email ?? null }}</td>
                                                </tr>
                                                <tr>
                                                    <th>ตำแหน่ง:</th>
                                                    <td>{{ @$query->Position->position_title ?? null }}</td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
				</div>
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
