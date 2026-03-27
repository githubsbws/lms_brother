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
								<h4 class="m-0">Import User Permission (Excel)</h4>
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
					{{-- แสดง Error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- แสดง Success --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('import-service.manual') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">เลือกไฟล์ Excel</label>
                                    <input type="file" name="excel" class="form-control" accept=".xlsx,.xls" required>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    อัปโหลดและนำเข้า
                                </button>
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
  
</script>
    
    
</body>

@endsection
