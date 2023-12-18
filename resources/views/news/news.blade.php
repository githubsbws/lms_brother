@extends('layout/mainlayout')
@section('content')
<body>

    <div class="span-19">
        <div id="content">
            <div class="parallax overflow-hidden page-section bg-blue-300" style="margin-top: 81px;">
                <div class="container parallax-layer" data-opacity="true">
                    <div class="media media-grid v-middle">
                        <div class="media-left">
                            <span class="icon-block half bg-blue-500 text-white" style="height: 45px;"><i class="fa fa-fw fa-newspaper-o"></i></span>
                        </div>
                        <div class="media-body">
                            <h3 class="text-display-2 text-white margin-none">ข่าวสาร</h3>
                            <p class="text-white text-subhead" style="font-size: 1.6rem;">รวมข่าวสารของ Brother</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="page-section">
                    <div class="row">
                        <div class="col-md-9">
                            @foreach($news as $value)
                            <div class="panel panel-default paper-shadow" data-z="0.5" style="margin-bottom: 25px;">
                                <div class="panel-body">
                                    <div class="media media-clearfix-xs">
                                        <div class="media-left text-center">
                                            <div class="cover width-150 width-100pc-xs overlay cover-image-full hover">
                                                <img src="https://cdn.pixabay.com/photo/2014/05/21/22/28/old-newspaper-350376_640.jpg">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="text-headline margin-v-5-0" style="font-size: 28px;"><a href="{{ route('new_detail', ['id' => $value->cms_id]) }}" title="วิธีการใช้งาน TS-Chatbot">{{ $value->cms_title}}</a></h4>

                                            <p style="color: rgb(33, 33, 33);">{{ $value->cms_short_title}}</p>
                                            <hr class="margin-v-8">
                                            <div class="media v-middle">
                                                <div class="media-body">
                                                    <h6> posted by
                                                        <i class="fa fa-fw fa-comment" style="color:#42A5F5;"></i> {{ $value->firstname}} &nbsp; | <i class="fa fa-fw fa-calendar" style="color:#42A5F5;"></i> {{ $value->update_date}} <br>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div style="float: right;">
                                <ul class="pagination margin-top-none" id="yw0">
                                    <li class="first hidden"><a href="{{url('new')}}">&lt;&lt; หน้าแรก</a></li>
                                    @if ($news->currentPage() > 1)
                                    <li class="previous hidden"><a href="{{ $news->previousPageUrl() }}" class="pagination-link">หน้าที่แล้ว</a></li>
                                    @endif
                                    @for ($i = max(1, $news->currentPage() - 3); $i <= min($news->lastPage(), $news->currentPage() + 3); $i++)
                                    <li class="page"><a href="{{ $news->url($i) }}" class="pagination-link {{ ($i == $news->currentPage()) ? 'active' : '' }}">{{ $i }}</a></li>
                                    @endfor
                                    @if ($news->currentPage() < $news->lastPage())
                                    <li class="next"><a href="{{ $news->nextPageUrl() }}" class="pagination-link">หน้าถัดไป</a></li>
                                    @endif
                                    @if ($news->currentPage() == $news->lastPage())
                                    <li class="last"><a href="{{ $news->lastPage() }}"  class="pagination-link">หน้าสุดท้าย &gt;&gt;</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <form action="/lms_brother_docker/lms/app/index.php/list_news" method="post">
                                <div class="panel panel-default" data-toggle="panel-collapse" data-open="true">
                                    <div class="panel-heading panel-collapse-trigger collapse in" data-toggle="collapse" data-target="#4fe5d772-ac6b-7188-4cfa-b2666261bdf7" aria-expanded="true" style="">
                                        <h4 class="panel-title" style="font-weight: bold;">ค้นหา</h4>
                                    </div>

                                    <div id="4fe5d772-ac6b-7188-4cfa-b2666261bdf7" class="collapse in">
                                        <div class="panel-body">
                                            <div class="form-group input-group margin-none">
                                                <div class="row margin-none">
                                                    <div class="col-xs-12 padding-none">
                                                        <input class="form-control" type="text" id="search_text" name="search_text" placeholder="คำค้นหา">
                                                    </div>
                                                </div>
                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title" style="font-weight: bold;">ข่าวล่าสุด</h4>
                                </div>
                                <ul class="list-group list-group-menu">
                                    <li class="list-group-item">
                                        <a href="/lms_brother_docker/lms/app/index.php/news/index/78"><i class="fa fa-chevron-right fa-fw"></i> วิธีการใช้งาน TS-Chatbot</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="/lms_brother_docker/lms/app/index.php/news/index/77"><i class="fa fa-chevron-right fa-fw"></i> Technical Clip EP 3</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="/lms_brother_docker/lms/app/index.php/news/index/74"><i class="fa fa-chevron-right fa-fw"></i> Brother Care Pack</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="/lms_brother_docker/lms/app/index.php/news/index/72"><i class="fa fa-chevron-right fa-fw"></i> Cloud77 App</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="/lms_brother_docker/lms/app/index.php/news/index/71"><i class="fa fa-chevron-right fa-fw"></i> แนะนำโปรแกรม BR-Admin Professional 4</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- content -->
    </div>

</body>
@endsection