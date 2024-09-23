@extends('admin/layouts/mainlayout')
@section('title', 'Admin')
@section('content')
@php
use App\Models\Orgchart;
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
                                <h4 class="heading">นำเข้าจาก Excel</h4>
                            </div>
                            <div class="widget-body">
                                <div class="row-fluid">
                                    <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="span4">
                                            <h4>นำเข้าไฟล์ สำหรับผู้เรียน <label>(ไฟล์ excel เท่านั้น)</label></h4>
                                            <input type="file" class="form-control" id="import_excel" name="import_excel">
                                            <div class="form-control">

                                                <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>นำเข้าไฟล์
                                                    excel
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="span4">
                                        <h4>แบบฟอร์มรูปแบบนำเข้าสมาชิก</h4>
                                        <a href="{{asset('images/uploads/templete_import_users_news.xlsx')}}"
                                           class="glyphicons download_alt"><i></i>Download Excel</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    @php
                    $orgchart = Orgchart::where('active','y')->get();
                    @endphp
                    <div class="innerLR">
                        <div class="widget">
                            <div class="widget-head">
                                <h4 class="heading">รหัสที่ใช้ใน Excel</h4>
                            </div>
                            <div class="widget-body">
                                <div class="row-fluid">
                                    <div style="margin-top: -1px;" id="Usability-grid" class="grid-view">
                                        <table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
                                            <thead>
                                                <tr>
                                                    <th id="Usability-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/usability/index?Usability_sort=usa_title">org_id</a></th>
                                                    <th id="Usability-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/usability/index?Usability_sort=usa_title">Title</a></th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orgchart as $org)
                                               <tr class="odd selectable">
                                                <td>{{ $org->id}}</td>
                                                <td>{{ $org->title}}</td>
                                               </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                        <div class="keys" style="display:none" title="/admin/index.php/Usability/index"><span>14</span><span>13</span><span>10</span><span>9</span><span>4</span></div>
                                        <input type="hidden" name="Usability[news_per_page]" value="">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    @php
                    $asc = ASC::where('active','y')->get();
                    @endphp
                    <div class="innerLR">
                        <div class="widget">
                            <div class="widget-head">
                                <h4 class="heading">รหัสที่ใช้ใน Excel</h4>
                            </div>
                            <div class="widget-body">
                                <div class="row-fluid">
                                    <div style="margin-top: -1px;" id="Usability-grid" class="grid-view">
                                        <table class="table table-striped table-bordered table-condensed dataTable table-primary js-table-sortable ui-sortable">
                                            <thead>
                                                <tr>
                                                    <th id="Usability-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/usability/index?Usability_sort=usa_title">asc_id</a></th>
                                                    <th id="Usability-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/usability/index?Usability_sort=usa_title">asc_code</a></th>
                                                    <th id="Usability-grid_c1"><a class="sort-link" style="color:white;" href="/admin/index.php/usability/index?Usability_sort=usa_title">Title</a></th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($asc as $as)
                                               <tr class="odd selectable">
                                                <td>{{ $as->id}}</td>
                                                <td>{{ $as->asc_code}}</td>
                                                <td>{{ $as->name}}</td>
                                               </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                        <div class="keys" style="display:none" title="/admin/index.php/Usability/index"><span>14</span><span>13</span><span>10</span><span>9</span><span>4</span></div>
                                        <input type="hidden" name="Usability[news_per_page]" value="">
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
