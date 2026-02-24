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
                            <a href="{{route('pgroup')}}">
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
                        แก้ไขกลุ่มผู้ใช้งาน
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pgroup_update',['pgroup_id'=>$group_id]) }}" enctype="multipart/form-data" method="post" id="question-form">
                            @csrf
                            <div class="form-group">
                                <p>ชื่อกลุ่มผู้ใช้งาน<i style="color:red">*</i></p>
                                <input type="text" id="group_name" name="group_name" value="{{ $group_id->group_name }}"@disabled(true) class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="table-responsive">
                                    <p>เลือกเมนูและบันทึกลงฐานข้อมูล</p>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="row">เลือก</th>
                                                <th scope="row">เมนูหลัก</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($menuHead as $menuHeads)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox"
                                                            id="{{ $menuHeads->id }}"
                                                            name="menu[]"
                                                            value="{{ $menuHeads->id }}"
                                                            {{ in_array($menuHeads->id, $checked ?? []) ? 'checked' : '' }}>
                                                        
                                                        <!-- ต้องมีทุกครั้ง -->
                                                        <input type="hidden" name="checkMenu[]" value="{{ $menuHeads->id }}">
                                                    </td>

                                                    <td>
                                                        <label>{{ $menuHeads->name }}</label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>บันทึก</button>
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

