@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
@php
use App\Models\Company;
use App\Models\Division;
use App\Models\Position;
use App\Models\ProfilesTitle;
use App\Models\ASC;
@endphp
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
					<li><a href="/admin/index.php">หน้าหลัก</a></li> » <li><a href="{{ url('/user_admin')}}">รายชื่อสมาชิก</a></li> » <li>แก้ไขข้อมูลสมาชิก</li>
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
                                            <form action="{{ route('user_update') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <h3><strong>แก้ไขข้อมูลสมาชิก</strong></h3>
                                                <p class="text-center"><span class="required" style="color:red">*</span> ไม่เป็นค่าว่าง</p>
                                                <div class="col-md-6">
                                                    <label for="">Username<span style="color:red">*</span></label>
                                                    <input type="text" name="username" value="{{ $user->username }}" disabled>
                                                </div>
                                                {{-- <div class="col-md-6">
                                                    <label for="">Password<span style="color:red">*</span></label>
                                                    <input type="password" name="password">
                                                </div> --}}
                                                <div class="col-md-6">
                                                    <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control" name="password"  autocomplete="new-password" oninput="checkPassword()" >
                                                        <input type="hidden" name="old_password" value="{{ $user->password }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="password-length" class="col-md-4 col-form-label text-md-end">รหัสผ่านต้องมีความยาวมากว่า 8 ตัว</label>
                                                    <div class="col-md-6">
                                                        <span id="password-length-status"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="password-special" class="col-md-4 col-form-label text-md-end">รหัสผ่านต้องมีสัญลักษณ์พิเศษอย่างน้อย 1 ตัว</label>
                                                    <div class="col-md-6">
                                                        <span id="password-special-status"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                                    </div>
                                                </div>
                                                @error('password')
                                                <div class="form-group">
                                                    <div class="col-sm-6 col-sm-offset-3" style="padding: 0;">
                                                        <span class="{{ $errors->has('password') ? 'input-error' : '' }}" style="color:red;">{{ $message }}</span>
                                                    </div>
                                                </div>
                                            @enderror
                                            @php
                                            $pro = ProfilesTitle::where('prof_id',$user->Profiles->title_id)->first();
                                            @endphp
                                                <div class="col-md-6">
                                                    <label for="">คำนำหน้าชื่อ</label>
                                                    <select name="title" id="title">
                                                        @if($pro)
                                                        <option value="{{$user->Profiles->title_id}}">{{ $pro->prof_title }}</option>
                                                        @else
                                                        <option value="">---เลือก---</option>
                                                        @endif
                                                        @foreach ( $profTitle as $title )
                                                            <option value="{{ $title->prof_id }}">{{ $title->prof_title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">ชื่อ(EN)</label>
                                                    <input type="text" name="firstname_en" value="{{ $user->Profiles->firstname_en ?? null}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">นามสกุล(EN)</label>
                                                    <input type="text" name="lastname_en" value="{{ $user->Profiles->lastname_en ?? null }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">ชื่อ(TH)<span style="color:red">*</span></label>
                                                    <input type="text" name="firstname" value="{{ $user->Profiles->firstname ?? null }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">นามสกุล(TH)<span style="color:red">*</span></label>
                                                    <input type="text" name="lastname" value="{{ $user->Profiles->lastname ?? null }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">เลขบัตรประชาชน</label>
                                                    <input type="text" name="identification" value="{{ $user->Profiles->identification ?? null }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Email</label>
                                                    <input type="email" name="email" value="{{ $user->email ?? null }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">เบอร์โทรศัพท์</label>
                                                    <input type="text" name="phone" value="{{ $user->Profiles->phone ?? null }}">
                                                </div>
                                                <div class="col-md-6">
                                                    @php
                                                    $user_com = Company::find($user->company_id);
                                                    @endphp
                                                    <label for="">company</label>
                                                    <select name="company" id="company">
                                                        @if($user_com != null)
                                                        <option value="{{$user_com->company_id}}">{{ $user_com->company_title}}</option>
                                                        @else
                                                        <option value="">---เลือก---</option>
                                                        @endif
                                                        @foreach ( $company as $comp )
                                                            <option value="{{ $comp->company_id }}">{{ $comp->company_title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    @php
                                                    $user_position = Position::find($user->position_id)
                                                    @endphp
                                                    <label for="">ตำแหน่ง</label>
                                                    @if($user_position != null)

                                                    <select name="position" id="position">
                                                        <option value="{{$user_position->id}}">{{ $user_position->position_title}}</option>
                                                    </select>
                                                    @else
                                                    <select name="position" id="position">
                                                        
                                                    </select>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    @php
                                                    $user_division = Division::find($user->division_id)
                                                    @endphp
                                                    <label for="">division</label>
                                                    @if($user_division != null)
                                                    <select name="division" id="division">
                                                        <option value="{{$user_division->id}}">{{ $user_division->dep_title}}</option>
                                                    </select>
                                                    @else
                                                    <select name="division" id="division">
                                                        
                                                    </select>
                                                    @endif
                                                </div>
                                                @php
                                                $asc = ASC::where('id',$user->asc_id)->where('active','y')->first();
                                                $asc_all = ASC::where('active','y')->get();
                                                @endphp
                                                    <div class="col-md-6">
                                                        <label for="">ASC</label>
                                                        <select name="asc" id="asc">
                                                            @if($asc)
                                                            <option value="{{$user->asc_id}}">{{ $asc->name }}</option>
                                                            @else
                                                            <option value="">---เลือก---</option>
                                                            @endif
                                                            @foreach ( $asc_all as $as )
                                                                <option value="{{ $as->id }}">{{ $as->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <br>
                                                <div class="col-md-6">
                                                    <button class="btn btn-success">บันทึกข้อมูล</button>
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
    <script>
        function checkPassword() {
            var password = document.getElementById("password").value;

            // ตรวจสอบความยาวของรหัสผ่าน (ต้องมีอย่างน้อย 8 ตัวอักษร)
            if (password.length < 8) {
                document.getElementById("password-length-status").innerHTML = "<p style='color:red;'>รหัสผ่านต้องมีอย่างน้อย 8 ตัว</p>";
            } else {
                document.getElementById("password-length-status").innerHTML = "<p style='color:green;'>&#x2714;</p>";
            }

            // ตรวจสอบว่ามีอักขระพิเศษอย่างน้อย 1 ตัว
            if (!/[!@#$%^&*]/.test(password)) {
                document.getElementById("password-special-status").innerHTML = "<p style='color:red;'>รหัสผ่านต้องมีสัญลักษณ์พิเศษอย่างน้อย 1 ตัว</p>";
            } else {
                document.getElementById("password-special-status").innerHTML = "<p style='color:green;'>&#x2714;</p>";
            }
        }
        function validatePassword() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password-confirm').value;

        if (password !== confirmPassword) {
            alert('รหัสผ่านไม่ตรงกัน');
            return false;
        }

        return true;
    }
    </script>
</body>
@endsection
