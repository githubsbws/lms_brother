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
            <div id="content">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin')}}">หน้าหลัก</a></li> » <li><a >เอกสารและประเภทเอกสาร</a></li> »
                    <li>เอกสารและประเภทเอกสาร</li>
                </ul><!-- breadcrumbs -->
                <div class="separator bottom"></div>

                <!-- innerLR -->
                <div class="innerLR">
                    <div class="widget widget-tabs border-bottom-none">
                        <div class="widget-head">
                            <ul>
                                <li class="active">
                                    <a class="glyphicons edit" href="#account-details" data-toggle="tab">
                                        <i></i>เอกสารและประเภทเอกสาร</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget-body">
                            <div class="form">
                                <form enctype="multipart/form-data" id="faq_edit" action="{{route('document.edit',['id' =>$document->filedoc_id])}}" method="post">
                                    @csrf
                                    <div class="row">
										<label for="Grouptesting_lesson_id" class="required">ประเภทเอกสาร <span class="required">*</span></label> <select class="span8" name="download_cate" id="download_cate">
											<option value="{{$document_type->download_id}}">{{$document_type->download_name}}</option>
											@foreach ($document_cate as $item)
											<option value="{{ $item->download_id}}">{{$item->download_name}}</option>
											@endforeach
										</select> <span style="margin:0;" class="btn-action single glyphicons circle_question_mark"><i></i></span>
										<div class="error help-block">
											<div class="label label-important" id="Grouptesting_lesson_id_em_" style="display:none"></div>
										</div>
									</div>
                                    <div class="row">
                                        <label for="faq_type_id" class="required">ชื่อไฟล์ <span class="required">*</span></label>
                                        <input size="60" maxlength="250" class="span8" name="filedoc_name" id="filedoc_name" type="text" value="{{ $document->filedoc_name }}">
                                    </div>
                                    <div class="row">
										<label for="News_cms_picture">ไฟล์ที่ดาว์นโหลด</label>
                                        {{ $document->filedocname}}
                                        <br>
                                        <br>
										<div class="fileupload fileupload-new" data-provides="fileupload">
											
                                                <div id="fileNameDisplay"></div>
												<span class="btn btn-default btn-file">
													<span class="fileupload-new">Select file</span>
													<span class="fileupload-exists">Change</span>
													{{-- <input id="ytNews_cms_picture" type="hidden" value="{{$document->filedocname}}" name="cms_picture"> --}}
													<input name="filedoc" id="imageInput" type="file" onchange="displayFileName()" >
                                                    
												</span>
                                                <script>
                                                    function displayFileName() {
                                                        // Get the file input element
                                                        var input = document.getElementById('imageInput');
                                            
                                                        // Get the file name
                                                        var fileName = input.files[0].name;
                                            
                                                        // Display the file name
                                                        document.getElementById('fileNameDisplay').innerText = 'Selected file: ' + fileName;
                                                    }
                                                </script>
												<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												{{-- <input type="file" id="imageInput" name="image"> --}}

											
										</div>
                                    </div>
                                    <div class="row buttons">
                                        <button class="btn btn-primary btn-icon glyphicons ok_2"><i></i>บันทึกข้อมูล</button>
                                    </div>
                                </form>
                            </div><!-- form -->
                        </div>
                    </div>
                </div>
                <!-- END innerLR -->

                <div id="sidebar">
                </div><!-- sidebar -->
            </div>
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
