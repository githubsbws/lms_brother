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
                    <div class="alert alert-success" id="alert-success">{{ session('success') }}</div>
                    <script>
                        setTimeout(function(){
                            document.getElementById('alert-success').style.display = 'none'
                        }, 3000);
                    </script>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger" id="error-alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <script>
                        setTimeout(function(){
                            document.getElementById('error-alert').style.display = 'none';
                        }, 3000);
                    </script>
                @endif
				<ul class="breadcrumb">
					<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a href="{{ url('/user_admin')}}">รายชื่อสมาชิก</a></li> » <li>ระบบสมัครสมาชิก</li>
				</ul>
				<div class="separator bottom"></div>
				<div class="innerLR">
					<div class="widget" style="margin-top: -1px;">
                        <div class="widget-head">

                        </div>
                        <div class="widget-body">
                            <div class="container">
                                <div class="page-section">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="{{ route('user_insert') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <h3><strong>การสมัครสมาชิก</strong></h3>
                                                <p class="text-center"><span class="required" style="color:red">*</span> ไม่เป็นค่าว่าง</p>
                                                <div class="col-md-6">
                                                    <label for="">Username<span style="color:red">*</span></label>
                                                    <input type="text" name="username" placeholder="username">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Password<span style="color:red">*</span></label>
                                                    <input type="password" name="password">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">คำนำหน้าชื่อ</label>
                                                    <select name="title" id="title">
                                                        <option value="">---เลือก---</option>
                                                        @foreach ( $profTitle as $title )
                                                            <option value="{{ $title->prof_id }}">{{ $title->prof_title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">ชื่อ(EN)</label>
                                                    <input type="text" name="firstname_en">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">นามสกุล(EN)</label>
                                                    <input type="text" name="lastname_en">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">ชื่อ(TH)<span style="color:red">*</span></label>
                                                    <input type="text" name="firstname" placeholder="ชื่อ">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">นามสกุล(TH)<span style="color:red">*</span></label>
                                                    <input type="text" name="lastname" placeholder="นามสกุล">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">เลขบัตรประชาชน<span style="color:red">*</span></label>
                                                    <input type="text" name="identification" placeholder="เลขบัตรประชาชน 13 หลัก">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Email</label>
                                                    <input type="email">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">เบอร์โทรศัพท์</label>
                                                    <input type="text" name="phone">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">company</label>
                                                    <select name="company" id="company">
                                                        <option value="">---เลือก---</option>
                                                        @foreach ( $company as $comp )
                                                            <option value="{{ $comp->company_id }}">{{ $comp->company_title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">ตำแหน่ง</label>
                                                    <select name="position" id="position"></select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">division</label>
                                                    <select name="division" id="division"></select>
                                                </div>
                                                <br>
                                                <div class="col-md-6">
                                                    <button class="btn btn-success">สมัครสมาชิก</button>
                                                </div>
                                            </form>
                                        </div>
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

    <script type="text/javascript">
        document.getElementById('company').addEventListener('change', function() {
            var selectedId = this.value;

            // ส่งค่าไปยัง backend เพื่อคิวรี่ข้อมูลสองอันที่เหลือ
            fetch('/useradmin_create/company_selector/' + selectedId)
                .then(response => response.json())
                .then(data => {
                    populateSecondDropdown(data.position);
                    populateThirdDropdown(data.division);
                });
        });

        function populateSecondDropdown(data) {
            var secondDropdown = document.getElementById('position');
            secondDropdown.innerHTML = '<option value="" selected disabled>เลือกตำแหน่ง</option>';

            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.textContent = item.position_title;
                secondDropdown.appendChild(option);
            });
        }

        function populateThirdDropdown(data) {
            var thirdDropdown = document.getElementById('division');
            thirdDropdown.innerHTML = '<option value="" selected disabled>เลือกdivision</option>';

            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.textContent = item.dep_title;
                thirdDropdown.appendChild(option);
            });
        }
    </script>

</body>
@endsection
