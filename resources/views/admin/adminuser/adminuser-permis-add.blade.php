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
                @if (session('success'))
                    <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
                    <script>
                        setTimeout(function(){
                            document.getElementById('success-alert').style.display = 'none';
                        }, 3000);
                    </script>
                @endif

                @if ($errors->has('import_excel'))
                    <div class="alert alert-danger" id="error-alert">{{ $errors->first('import_excel') }}</div>
                    <script>
                        setTimeout(function(){
                            document.getElementById('error-alert').style.display = 'none';
                        }, 3000);
                    </script>
                @endif
				<!-- breadcrumbs -->
				<div class="separator bottom"></div>
                    <div class="innerLR">
                        <div class="widget">
                            <div class="widget-head">
                                <h4 class="heading">เพิ่มกลุ่มผู้ใช้งาน</h4>
                            </div>
                            <div class="widget-body">
                                <div class="row-fluid">
                                    <form action="{{ route('permission_insert',['id' => $id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-control">
                                            <label for="">ชื่อ: {{ $user->Fullname() }} </label>
                                            <label for="">เลือกกลุ่มผู้ใช้งาน<span style="color:red">*</span></label>
                                            <select name="group_role" id="group_role" class="form-control">
                                                <option value="">กรุณาเลือก</option>
                                                @foreach($groupRole as $role)
                                                    <option value="{{ $role->id }}">{{ $role->group_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button class="btn btn-success">บันทึก</button>
                                    </form>
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
