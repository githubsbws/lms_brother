<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('admin')}}" class="brand-link">
        <p class="brand-text font-weight-border text-center mb-0">เมนูจัดการแอดมิน</p>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin')}}" class="nav-link {{ request()->routeIs('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>ภาพรวม</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('aboutus*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('aboutus*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            เกี่ยวกับเรา
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/aboutus_create') }}" class="nav-link {{ request()->is('aboutus_create') ? 'active' : '' }}">
                                <p>เพิ่มข้อมูลเกี่ยวกับเรา</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/aboutus') }}" class="nav-link {{ request()->is('aboutus') ? 'active' : '' }}">
                                <p>จัดการเกี่ยวกับเรา</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('condition*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('condition*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            เงื่อนไขการใช้งาน
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/condition') }}" class="nav-link {{ request()->is('condition') ? 'active' : '' }}">
                                <p>แก้ไขเงื่อนไขการใช้งาน</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('setting*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('setting*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            ตั้งค่าระบบพื้นฐาน
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/setting') }}" class="nav-link {{ request()->is('setting') ? 'active' : '' }}">
                                <p>ตั้งค่าระบบพื้นฐาน</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('contactus*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('contactus*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            ติดต่อเรา
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/contactus') }}" class="nav-link {{ request()->is('contactus') ? 'active' : '' }}">
                                <p>จัดการติดต่อเรา</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('video*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('video*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            ระบบวีดีโอ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/video_create') }}" class="nav-link {{ request()->is('video_create') ? 'active' : '' }}">
                                <p>เพิ่มวีดีโอ (ภาษา EN )</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/video') }}" class="nav-link {{ request()->is('video') ? 'active' : '' }}">
                                <p>จัดการวีดีโอ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('document*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('document*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            ระบบเอกสาร
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('document_head')}}" class="nav-link {{ request()->is('document_head') ? 'active' : '' }}">
                                <p>จัดการหัวข้อเอกสาร</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('document_type_create')}}" class="nav-link {{ request()->is('document_type_create') ? 'active' : '' }}">
                                <p>เพิ่มประเภทเอกสาร (ภาษา EN )</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('document_type')}}" class="nav-link {{ request()->is('document_type') ? 'active' : '' }}">
                                <p>จัดการประเภทเอกสาร</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('document_create')}}" class="nav-link {{ request()->is('document_create') ? 'active' : '' }}">
                                <p>เพิ่มเอกสาร (ภาษา EN )</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/document') }}" class="nav-link {{ request()->is('document') ? 'active' : '' }}">
                                <p>จัดการเอกสาร</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('news*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('news*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            ระบบจัดการเนื้อหาเว็บไซต์
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/news_create') }}" class="nav-link {{ request()->is('news_create') ? 'active' : '' }}">
                                <p>เพิ่มข่าวสารและกิจกรรม (ภาษา EN )</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/news') }}" class="nav-link {{ request()->is('news') ? 'active' : '' }}">
                                <p>จัดการข่าวสารและกิจกรรม</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('category*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('category*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            ระบบหมวดหลักสูตร
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">1</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('category_create')}}" class="nav-link {{ request()->is('category_create') ? 'active' : '' }}">
                                <p>เพิ่มหมวดหลักสูตร (ภาษา US)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/category') }}" class="nav-link {{ request()->is('category') ? 'active' : '' }}">
                                <p>จัดการหมวดหลักสูตร</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('courseonline*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('courseonline*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            ระบบจัดการหลักสูตร
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('courseonline_create')}}" class="nav-link {{ request()->is('courseonline_create') ? 'active' : '' }}">
                                <p>เพิ่มหลักสูตร (ภาษา US)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('courseonline')}}" class="nav-link {{ request()->is('courseonline') ? 'active' : '' }}">
                                <p>จัดการหลักสูตร</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('lesson*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('lesson*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            ระบบจัดการเนื้อหาบทเรียน
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('lesson_create')}}" class="nav-link {{ request()->is('lesson_create') ? 'active' : '' }}">
                                <p>เพิ่มบทเรียน (ภาษา US)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('lesson')}}" class="nav-link {{ request()->is('lesson') ? 'active' : '' }}">
                                <p>จัดการบทเรียน</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('grouptesting*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('grouptesting*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            ระบบข้อสอบ
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">4</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('grouptesting_create')}}" class="nav-link {{ request()->is('grouptesting_create') ? 'active' : '' }}">
                                <p>เพิ่มชุดข้อสอบ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('grouptesting')}}" class="nav-link {{ request()->is('grouptesting') ? 'active' : '' }}">
                                <p>จัดการชุดข้อสอบ</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="/Demo-LMS-New/admin/pages/create/course/exam/" class="nav-link">
                                <p>เพิ่มข้อสอบหลักสูตร</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Demo-LMS-New/admin/pages/setting/course/exam/" class="nav-link">
                                <p>จัดการข้อสอบหลักสูตร</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('questionnaireout*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('questionnaireout*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            แบบประเมินผลการฝึกอบรม
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">5</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/questionnaireout_excel') }}" class="nav-link {{ request()->is('questionnaireout_excel') ? 'active' : '' }}">
                                <p>เพิ่มแบบสอบถาม</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/questionnaireout') }}" class="nav-link {{ request()->is('questionnaireout') ? 'active' : '' }}">
                                <p>จัดการแบบสอบถาม</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('orgchart*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('orgchart*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>
                            ระบบจัดการระดับชั้นการเรียน
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/orgchart') }}" class="nav-link {{ request()->is('orgchart') ? 'active' : '' }}">
                                <p>จัดการระดับชั้นการเรียน</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>จัดการใบประกาศนียบัตร</p>
                    </a>
                </li> --}}
                <li class="nav-item {{ request()->is('captcha*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('captcha*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-print"></i>
                        <p>ระบบ Captcha</p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/captcha') }}" class="nav-link {{ request()->is('captcha') ? 'active' : '' }}">
                                <p>ตั้งค่าแคปช่า</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('learnreset')}}" class="nav-link {{ request()->is('learnreset') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sync-alt"></i>
                        <p>ระบบรีเซ็ตผลการเรียนการสอบ</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('usability*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('usability*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            ระบบวิธีการใช้งาน
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('usability_create')}}" class="nav-link {{ request()->is('usability_create') ? 'active' : '' }}">
                                <p>เพิ่มวิธีการใช้งาน (ภาษา US)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('usability')}}" class="nav-link {{ request()->is('usability') ? 'active' : '' }}">
                                <p>จัดการวิธีการใช้งาน</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('reportproblem*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('reportproblem*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bug"></i>
                        <p>ระบบปัญหาการใช้งาน</p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('reportproblem')}}" class="nav-link {{ request()->is('reportproblem') ? 'active' : '' }}">
                                <p>จัดการปัญหาการใช้งาน</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('faq*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('faq*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            ระบบคำถามที่พบบ่อย
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/faqtype') }}" class="nav-link {{ request()->is('faqtype') ? 'active' : '' }}">
                                <p>หมวดคำถาม (ภาษา US)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/faq') }}" class="nav-link {{ request()->is('faq') ? 'active' : '' }}">
                                <p>คำถามที่พบบ่อย</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('adminuser*') || request()->is('adminuser*')  ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('pgroup*') || request()->is('adminuser*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            ระบบการกำหนดสิทธิการใช้งาน
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/adminuser') }}" class="nav-link {{ request()->is('adminuser') ? 'active' : '' }}">
                                <p>ข้อมูลผู้ดูแลระบบ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/pgroup') }}" class="nav-link {{ request()->is('pgroup') ? 'active' : '' }}">
                                <p>กลุ่มผู้ใช้งาน</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('user*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            ระบบจัดการสมาชิก (สมาชิก)
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/useradmin_create')}}" class="nav-link {{ request()->is('useradmin_create') ? 'active' : '' }}">
                                <p>เพิ่มสมาชิก</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/userexcel')}}" class="nav-link {{ request()->is('userexcel') ? 'active' : '' }}">
                                <p>เพิ่มสมาชิกจาก Excel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/asc')}}" class="nav-link {{ request()->is('asc') ? 'active' : '' }}">
                                <p>เพิ่มASC</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/user_admin')}}" class="nav-link {{ request()->is('user_admin') ? 'active' : '' }}">
                                <p>รายชื่อสมาชิก</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('imgslide*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('imgslide*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            ระบบป้ายประชาสัมพันธ์
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/imgslide_create') }}" class="nav-link {{ request()->is('imgslide_create') ? 'active' : '' }}">
                                <p>เพิ่มป้ายประชาสัมพันธ์ (ภาษา US)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/imgslide') }}" class="nav-link {{ request()->is('imgslide') ? 'active' : '' }}">
                                <p>จัดการป้ายประชาสัมพันธ์</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('report*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('report*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            ระบบ Report
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('report_course')}}" class="nav-link {{ request()->is('report*') ? 'active' : '' }}">
                                <p>รายงานภาพรวมของหลักสูตร</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('log*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('log*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            ระบบเก็บ Log การใช้งานระบบ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/logusers')}}" class="nav-link {{ request()->is('logusers') ? 'active' : '' }}">
                                <p>Log การใช้งานผู้เรียน</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/logadmin')}}" class="nav-link {{ request()->is('logadmin') ? 'active' : '' }}">
                                <p>Log การใช้งานผู้ดูแลระบบ</p>
                            </a>
                        </li>
                    </ul>
                    <li class="nav-item">
                        <a href="{{ route('logout.admin')}}" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                ออกจากระบบ
                            </p>
                        </a>
                    </li>
                </li>
            </ul>
        </nav>
    </div>
</aside>

{{-- <div class="nav-sidebar shadow-sm">
    <div class="d-flex align-items-center">
        <button class="nav-btn d-md-none me-3" onclick="slice()">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="1.5" d="M2.75 12.25h10.5m-10.5-4h10.5m-10.5-4h10.5" />
            </svg>
        </button>
        <h4 class="mb-0">
            @switch(Route::currentRouteName())
                @case('admin')
                    หน้าหลัก
                    @break
                @default
                    หน้าหลัก
            @endswitch 
        </h4>
    </div>
    <div class="ms-auto d-flex align-items-center">
        <button class="notify-btn me-3">
            <i class="fa-regular fa-bell" style="color: #FE5C73;"></i>
        </button>
        <div class="dropdown position-relative">
            <button class="dropdown-btn d-flex align-items-center dropdown-toggle" type="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->username }}
            </button>
            <ul class="dropdown-menu end-0">
                <li>
                    <button class="dropdown-item" href="#">คู่มือการใช้ระบบ</button>
                </li>
                <li>
                    <button class="dropdown-item" href="#">วิธีการใช้งาน</button>
                </li>
                <li>
                    <button class="dropdown-item" onclick="logout()">ออกจากระบบ</button>
                </li>
            </ul>
        </div>
    </div>
</div> --}}

<script type="text/javascript">
    function slice() {
        const element = document.getElementById("sidebar");
        element.classList.toggle("show");
        const body = document.getElementById("body");
        body.classList.toggle("overflow-hidden");
    };

    function logout() {
        fetch("{{ route('logout.admin') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}", // ใช้ CSRF Token สำหรับความปลอดภัย
                "Content-Type": "application/json"
            }
        })
        .then(response => {
            if (response.ok) {
                window.location.href = "/admin"; // เปลี่ยนเส้นทางไปที่หน้าล็อกอิน
            } else {
                console.error("Logout failed");
            }
        })
        .catch(error => console.error("Error:", error));
    }
</script>