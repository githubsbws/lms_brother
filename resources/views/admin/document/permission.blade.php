@extends('admin.layouts.mainlayout')
@section('title', 'Admin')
@section('content')
<body class="">
        <div id="wrapper">
            <div class="content-wrapper">
                <div class="content-header">
					<div class="container-fluid">
						<div class="d-flex align-items-center">
							<div class="">
								<h4 class="m-0">กำหนดสิทธิ์</h4>
							</div>
							<div class="ml-3">
								<a href="{{route('document')}}">
									<button class="btn btn-warning d-flex align-items-center">
										<i class="fas fa-angle-left mr-2"></i>
										หน้าหลัก
									</button>
								</a>
							</div>
						</div>
					</div>
				</div>
                <div class="container mt-5">
					<div class="card">
						<div class="card-header bg-primary text-white">
							<h4>กำหนดสิทธิ์: {{ $file->filedoc_name }}</h4>
						</div>
						<div class="card-body">
							<form action="{{ route('document.permission.save', $file->filedoc_id) }}" method="POST">
                                @csrf

                                {{-- ส่วนที่ 1: เลือกเป็นกลุ่ม --}}
                                <h5 class="mt-4">สิทธิ์ตามกลุ่ม </h5>
                                @foreach($groups as $group)
                                    <div class="form-check">
                                        <input type="checkbox"
                                            name="group_ids[]"
                                            data-orgchart="{{ $group->id }}"
                                            value="{{ $group->id }}"
                                            class="form-check-input group-checkbox"
                                            {{ in_array($group->id, $group_permissions) ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $group->title }}</label>
                                    </div>
                                @endforeach

                                {{-- ส่วนที่ 2: เลือกเป็นรายบุคคล --}}
                                <h5 class="mt-4">สิทธิ์รายบุคคล </h5>

                                <input type="text" class="form-control mb-3" id="searchUser" placeholder="ค้นหาชื่อ...">

                                <div style="max-height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
                                    @foreach($users as $u)
                                        <div class="form-check user-item">
                                            <input type="checkbox"
                                                name="user_ids[]"
                                                data-user-orgchart="{{ $u->orgchart_id }}"
                                                value="{{ $u->id }}"
                                                class="form-check-input user-checkbox"
                                                {{ in_array($u->id, $user_permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label">
                                                {{ $u->username ?? '-' }} : {{$u->Profiles->firstname ?? '-'}} {{$u->Profiles->lastname ?? '-'}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <button type="submit" class="btn btn-success mt-4">บันทึกสิทธิ์</button>
                            </form>
						</div>
					</div>
                </div>
                <div id="sidebar">
                </div><!-- sidebar -->
            </div>
            <!-- // Content END -->

        </div>
        <div class="clearfix"></div>
<script>
  $("#searchUser").on("keyup", function() {
        let value = $(this).val().toLowerCase();
        $(".user-item").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    document.querySelectorAll('.group-checkbox').forEach(group => {
    group.addEventListener('change', function () {

        let orgId = this.dataset.orgchart;
        
        // หา user ที่ orgchart_id ตรงกับ group ที่เลือก
        document.querySelectorAll('.user-checkbox').forEach(user => {
            if (user.dataset.userOrgchart == orgId) {
                user.checked = group.checked;
            }
        });

    });
});
</script>
    
    
</body>

@endsection
