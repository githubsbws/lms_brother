@extends('layout/mainlayout')
@section('content')
<body>

    <div id="content" style="margin-top: 6rem;">
        <div class="parallax overflow-hidden page-section bg-blue-300">
            <div class="container parallax-layer" data-opacity="true">
                <div class="media media-grid v-middle">
                    <div class="media-left">
                        <span class="icon-block half bg-blue-500 text-white" style="height: 45px;"><i class="fa fa-fw fa-book"></i></span>
                    </div>
                    <div class="media-body">
                        <h3 class="text-display-2 text-white margin-none">ห้องเรียนเสมือน</h3>
                        <p class="text-white text-subhead" style="font-size: 1.6rem;">รวมรายชื่อห้องเรียนเสมือนที่กำลัง ออนไลน์อยู่</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="min-height: 250px;">
            <div class="page-section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row" data-toggle="isotope" style="position: relative; height: 0px;">



                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</body>
@endsection