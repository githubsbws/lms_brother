@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
@php
use App\Models\Company;
@endphp
<body>
	<div id="wrapper">
		<div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <h4 class="m-0">Company</h4>
                        </div>
                        <div class="ml-3">
                            <a href="{{route('admin')}}">
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
                        เพิ่มCompany
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.company') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="company_title">ชื่อCompany </label>
                                <input type="text" name="company_title" class="form-control">
                            </div>

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>

				<div class="card">
                    <div class="card-header bg-primary text-white">
                        เพิ่มASC
                    </div>
                    <div class="card-body">
                        <form action="{{ route('asc.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">ชื่อบริษัท </label>
                                <input type="text" name="title" class="form-control">
                            </div>

							<div class="form-group">
                                <label for="asc_code">ASC_Code </label>
                                <input type="text" name="asc_code" class="form-control">
                            </div>
							
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
				@php
				$company = Company::get();
				@endphp
				<div class="card">
                    <div class="card-header bg-primary text-white">
                        เพิ่มPosition
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.position') }}" method="POST" enctype="multipart/form-data">
                            @csrf
							<div class="form-group">
                                <label for="position_title">ชื่อCompany </label>
                                <select name="company_id" id="company" class="form-control">
									<option value="">---เลือก---</option>
									@foreach ( $company as $com )
										<option value="{{ $com->id }}">{{ $com->company_title }}</option>
									@endforeach
								</select>
                            </div>

                            <div class="form-group">
                                <label for="position_title">ชื่อposition </label>
                                <input type="text" name="position_title" class="form-control">
                            </div>
							
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			<div id="sidebar">
			</div><!-- sidebar -->
		</div>
	</div>
	<div class="clearfix"></div>
</body>

@endsection