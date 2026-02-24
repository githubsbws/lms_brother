@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')

<body>
    <div id="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <h4 class="m-0">ระบบการกำหนดสิทธิการใช้งาน</h4>
                        </div>
                        <div class="ml-3">
                            <a href="{{route('adminmenu_p')}}">
                                <button class="btn btn-warning d-flex align-items-center">
                                    <i class="fas fa-angle-left mr-2"></i>
                                    กลับหน้าหลัก
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        แก้ไขชื่อเมนู
                    </div>
                    <div class="card-body">
                        <form action="{{ route('adminmenu_update', $menu->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>ชื่อเมนู</label>
                                <input type="text" name="name" value="{{ $menu->name }}" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success">บันทึก</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="sidebar">
        </div><!-- sidebar -->
    <div class="clearfix"></div>
    </div>
</body>
@endsection

