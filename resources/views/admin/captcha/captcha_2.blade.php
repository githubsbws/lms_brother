@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
    @php
        use App\Models\Course;
        use App\Models\Captcha;
    @endphp
<body class="">
    <div id="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <h4 class="m-0">ระบบ Captcha</h4>
                        </div>
                        <div class="ml-3">
                            <a href="{{route('admin')}}">
                                <button class="btn btn-warning d-flex align-items-center">
                                    <i class="fas fa-angle-left mr-2"></i>
                                    กลับหน้าหลัก
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
				<div class="content">
                    <div class="container-fluid">
                        <div class="card m-0">
                            <div class="card-body">
                                <a type="button" class="btn btn-primary" href="{{ route('captcha_create') }}">เพิ่มแคปช่า</a>                
								<table id="settingTable" class="table table-striped table-bordered nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อเงื่อนไข</th>
                                            <th>ชื่อหลักสูตร</th>
                                            <th>เลือกหลักสูตร</th>
                                            <th>สถานะ</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($captcha as $cap)
                                            @php
                                                $course = Course::where('course_point', $cap->capid)->get();
                                                $dataId = $cap->capid;
                                            @endphp
                                            <tr>
                                                <td>{{ $cap->capid }}</td>
                                                <td>{{ $cap->capt_name }}</td>
                                                <td class="text-wrap">
                                                    @if (count($course) > 0)
                                                        @foreach ($course as $c)
                                                            {{ $c->course_title }}
                                                        @endforeach
                                                    @else
                                                        ยังไม่ได้เลือกหลักสูตร
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary"
                                                        data-id="{{ $cap->capid }}" data-toggle="modal"
                                                        data-target=".bd-example-modal-lg">เลือกหลักสูตร</button>
                                                </td>
                                                @if ($cap->capt_active == 'y')
                                                    <td><a class="btn btn-success btn-icon"
                                                            href="{{ route('captcha_n', ['capid' => $cap->capid, 'capt_active' => 'n']) }}">เปิด</a>
                                                    </td>
                                                @else
                                                    <td><a class="btn btn-dark btn-icon"
                                                            href="{{ route('captcha_y', ['capid' => $cap->capid, 'capt_active' => 'y']) }}">ปิด</a>
                                                    </td>
                                                @endif
                                                <td>
                                                    <a href="{{ route('captcha_detail', $cap->capid) }}" class="btn btn-warning btn-sm"><i class="fas fa-search"></i></a>
                                                    <a href="{{ route('captcha_edit', $cap->capid) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm delete-button" data-id="{{ $cap->capid }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
								</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true" style="z-index:10001" hidden>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3>Modal header</h3>
                    </div>
                    <form id="scoreForm" action="{{ route('captcha.course') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <table
                                class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column" id="chk"> ทั้งหมด</th>
                                        <th id="News-grid_c2"><a class="sort-link" style="color:white;">ชื่อหลักสูตร</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courseOnline as $courses)
                                        <tr class="odd selectable">
                                            <td width="20" class="checkbox-column">
                                                <input class="select-on-check" value="{{ $courses->course_id }}"
                                                    id="chk_course_{{ $loop->iteration }}" type="checkbox"
                                                    name="chk[]" {{ $courses->course_point ? 'checked' : '' }}>

                                                <input type="hidden" name="chk_unchecked[]"
                                                    value="{{ $courses->course_id }}"
                                                    {{ $courses->course_point ? '' : 'checked' }}>
                                            </td>
                                            <td width="110">{{ $courses->course_title }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="data-id" id="dataIdField">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#settingTable').DataTable({
            responsive: false,
            scrollX: true,
            language: {
                url: '/include/languageDataTable.json',
            }
        });
    });
    // เมื่อคลิกที่ปุ่ม
    document.querySelectorAll('.btn-primary[data-toggle="modal"]').forEach(function(button) {
        button.addEventListener('click', function() {
            // ดึงค่า ID จากแอตทริบิวต์ data-id ของปุ่มที่ถูกคลิก
            var id = this.getAttribute('data-id');
            // กำหนดค่า ID ลงในฟิลด์ซ่อน
            document.getElementById('dataIdField').value = id;
            // กำหนดค่า ID ลงในแอตทริบิวต์ action ของฟอร์ม
            document.getElementById('scoreForm').action = '{{ route('captcha.course') }}';
        });
    });
    $(document).ready(function() {
        // เมื่อคลิกที่ปุ่ม "เลือกหลักสูตร"
        $(".open-modal").click(function() {
            // ดึงค่า data-id จากปุ่ม
            var dataId = $(this).data("id");
            // เปิด modal ที่เกี่ยวข้องโดยใช้ data-id เป็นเงื่อนไข
            $(".modal[data-id='" + dataId + "']").modal("show");
        });
    });

    $(document).ready(function() {
				// ตรวจสอบว่า jQuery โหลดหรือไม่
				if (typeof jQuery === "undefined") {
					console.error("jQuery is not loaded!");
					return;
				}

				// ตั้งค่า CSRF Token
				$.ajaxSetup({
					headers: {
						"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
					}
				});

				// ตรวจสอบว่าโค้ดนี้ทำงานจริงไหม
				console.log("Delete button script loaded");

				// ใช้ Event Delegation เผื่อปุ่มถูกโหลดใหม่
				$(document).on("click", ".delete-button", function(e) {
					e.preventDefault();

					var id = $(this).data("id");
					var url = "/captcha_delete/" + id;

					console.log("Clicked delete button with ID:", id); // ตรวจสอบว่า ID ถูกต้องไหม

					Swal.fire({
						title: "คุณแน่ใจหรือไม่?",
						text: "ข้อมูลนี้จะถูกลบออก!",
						icon: "warning",
						showCancelButton: true,
						confirmButtonColor: "#3085d6",
						cancelButtonColor: "#d33",
						confirmButtonText: "ใช่, ลบเลย!",
						cancelButtonText: "ยกเลิก"
					}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								url: url,
								type: "POST", // ใช้ DELETE ตาม Laravel
								success: function(response) {
									console.log("Success:", response);
									Swal.fire({
										title: "สำเร็จ!",
										text: response.message || "ลบข้อมูลสำเร็จ",
										icon: "success",
										confirmButtonText: "OK"
									}).then(() => {
										location.reload();
									});
								},
								error: function(xhr) {
									console.error("Error:", xhr);
									Swal.fire(
										"เกิดข้อผิดพลาด!",
										xhr.responseJSON?.message || "ไม่สามารถลบข้อมูลได้",
										"error"
									);
								}
							});
						}
					});
				});
			});

			@if(session('success'))
			Swal.fire({
				title: "{{ session('alert') }}",
				text:"บันทึกข้อมูลสำเร็จ",
				icon: "success",
				confirmButtonText: 'ตกลง' // เพิ่มปุ่มยืนยัน
			});
		@endif
</script>
</body>

@endsection
