@extends('layout/mainlayout')
@section('content')
@php
use App\Models\Downloadcategoty;
use App\Models\DownloadFile;
use App\Models\DownloadFileDoc;
use App\Helpers\DocumentPermissionHelper;
@endphp
<body>
    
    <div class="parallax overflow-hidden page-section bg-blue-300">
      <div class="container parallax-layer" data-opacity="true">
        <div class="media media-grid v-middle">
          <div class="media-left">
            <span class="icon-block half bg-blue-500 text-white" style="height: 45px;"><i class="fa fa-fw fa-download"></i></span>
          </div>
          <div class="media-body">
            <h3 class="text-display-2 text-white margin-none">ดาวน์โหลดไฟล์เอกสาร</h3>
            <p class="text-white text-subhead" style="font-size: 1.6rem;">เอกสารคู่มือ Brother</p>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Content -->
    <section class="content" id="document">
    
      <div class="container">
    
        <div class='page-section'>
    
            <div class="col-lg-9">
              <div id="table">
                  <div>
                    <div class="panel panel-default paper-shadow download-group" data-z="0.5" style="margin-bottom: 5px;">
                        <ul class=" list-group">
                                  @foreach($download_title as $dow)
                                <li class="list-group-item">
                                  <div class="media v-middle">
                                    <div class="media-body">
                                      <h4 class="text-headline margin-none" style="font-size: 26px;font-weight: bold;">หัวข้อ - {{$dow->title_name}}</h4>
                                    </div>
                                    <div class="media-right">
                                    </div>
                                  </div>
                                </li>
              
                                <li class="list-group-item media v-middle">
                                  @php
                                  $dow_cate = Downloadcategoty::where('title_id',$dow->title_id)->where('active','y')->get();
                                  @endphp
                                  @foreach($dow_cate as $cate)

                                  @php
                                      $canViewCategory = DocumentPermissionHelper::userHasCategoryPermission(
                                          $cate->download_id, 
                                          auth()->id()
                                      );
                                  @endphp

                                  @if ($canViewCategory)

                                      @php
                                          $files = DownloadFile::select(
                                                      'download_file.*',
                                                      'download_filedoc.filedoc_id',
                                                      'download_filedoc.filedoc_name'
                                                  )
                                                  ->join('download_filedoc','download_filedoc.file_id','=','download_file.file_id')
                                                  ->where('download_file.download_id',$cate->download_id)
                                                  ->where('download_file.active','y')
                                                  ->where('download_filedoc.active','y')
                                                  ->distinct()
                                                  ->get();

                                          $collapseId = "collapse-" . $cate->download_id;

                                          $downloadCount = 0;
                                      @endphp

                                      <div class="panel panel-default">
                                          <div class="panel-heading dowload-header panel-collapse-trigger"
                                              data-toggle="collapse"
                                              data-target="#{{ $collapseId }}">
                                              <h3 class="panel-title" style="font-size: 22px;">
                                                  หมวดหมู่ - {{ $cate->download_name }}
                                              </h3>
                                          </div>

                                          <div id="{{ $collapseId }}" class="collapse">
                                              <div class="panel-body list-group">
                                                  <ul class="list-group list-group-menu">

                                                      @foreach($files as $f)

                                                          @php
                                                              $canDownload = DocumentPermissionHelper::userHasPermission(
                                                                  $f->filedoc_id, 
                                                                  auth()->id()
                                                              );
                                                          @endphp

                                                          @if ($canDownload)
                                                              @php $downloadCount++; @endphp

                                                              <li class="list-group-item">
                                                                  <a href="{{ route('download.downloadfiles', ['id' => $f->filedoc_id]) }}">
                                                                      <img src="{{asset('themes/bws/images/icons8-pdf-48.png')}}" style="width: 22px;">
                                                                      {{ $f->filedoc_name }}
                                                                      <span class="pull-right"><i class="fa fa-download"></i> ดาวน์โหลด</span>
                                                                  </a>
                                                              </li>
                                                          @endif

                                                      @endforeach

                                                      @if ($downloadCount === 0)
                                                          <h5 class="text-danger">ไม่มีสิทธิ์ดาวน์โหลดเอกสารในหมวดนี้</h5>
                                                      @endif

                                                  </ul>
                                              </div>
                                          </div>
                                      </div>

                                  @else
                                      
                                  @endif

                              @endforeach
              
                                </li>
                                @endforeach
                                </ul>
                    </div>
    
    
                  </div>
           
              </div>
            </div>
          </div>
    
          
    
    
    </section>
</body>
@endsection