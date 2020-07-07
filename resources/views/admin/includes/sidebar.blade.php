<!-- Begin SideBar-->
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active">
                <a href="{{route('admin.dashboard')}}">
                    <i class="la la-mouse-pointer"></i>
                    <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span>
                </a>
            </li>


            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المشرفين </span>
                    <span class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\Admin::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.admins')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.admins.create')}}" data-i18n="nav.dash.crypto">أضافة مشرف جديد </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام </span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.category')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.category.create')}}" data-i18n="nav.dash.crypto">أضافة قسم </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item open">
                <a href="">
                    <i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">قاعات الافراح </span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.wedding_halls', '2')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.wedding_halls.create', '2')}}" data-i18n="nav.dash.crypto">أضافة قاعه </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item open">
                <a href="">
                    <i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">صالات الافراح </span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.wedding_halls', '3')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.wedding_halls.create', '3')}}" data-i18n="nav.dash.crypto">أضافة صاله </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item open">
                <a href="">
                    <i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">قاعات الفنادق </span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.wedding_halls', '4')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.wedding_halls.create', '4')}}" data-i18n="nav.dash.crypto">أضافة قاعه </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">منظمي الاعراس والحفلات والبوفيهات والضيافة </span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.wedding_halls', '5')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.wedding_halls.create', '5')}}" data-i18n="nav.dash.crypto">أضافة  </a>
                    </li>

                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">مقدمي خدمات التصوير والفيديوهات للأفراح </span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.wedding_halls', '6')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.wedding_halls.create', '6')}}" data-i18n="nav.dash.crypto">أضافة  </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> محلات تصميم وطباعة كروت الافراح</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.wedding_halls', '7')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.wedding_halls.create', '7')}}" data-i18n="nav.dash.crypto">أضافة  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> محلات المجوهرات والشبكة والدبل</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.wedding_halls', '8')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.wedding_halls.create', '8')}}" data-i18n="nav.dash.crypto">أضافة  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">محلات الآتيليه وفساتين الافراح (شراء - تأجير ) </span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.wedding_halls', '9')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.wedding_halls.create', '9')}}" data-i18n="nav.dash.crypto">أضافة  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">صالونات التجميل لتجهيز العروسة والمرافقين </span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.wedding_halls', '10')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.wedding_halls.create', '10')}}" data-i18n="nav.dash.crypto">أضافة  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> محلات المكياج والعطور والبخور</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.wedding_halls', '11')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.wedding_halls.create', '11')}}" data-i18n="nav.dash.crypto">أضافة  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> محلات تأجير السيارات  ( الزفة )</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.wedding_halls', '12')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.wedding_halls.create', '12')}}" data-i18n="nav.dash.crypto">أضافة  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> محلات الاحذية النسائية والرجالية</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.wedding_halls', '13')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.wedding_halls.create', '13')}}" data-i18n="nav.dash.crypto">أضافة  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">محلات الساعات والأقلام </span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.wedding_halls', '14')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.wedding_halls.create', '14')}}" data-i18n="nav.dash.crypto">أضافة  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> محلات البشوت</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.wedding_halls', '15')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.wedding_halls.create', '15')}}" data-i18n="nav.dash.crypto">أضافة  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> حجز افضل العروض لشهر العسل</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.wedding_halls', '16')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.wedding_halls.create', '16')}}" data-i18n="nav.dash.crypto">أضافة  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله الرشايده</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '24')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله العوازم</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '33')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله مطير</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '42')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله عنزه</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '51')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله شمر</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '61')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله العجمان</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '70')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله الهواجر</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '79')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله الدواسر</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '80')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله الظفير</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '81')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله عتيبه</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '82')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله العدواني</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '83')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله السهلي</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '84')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله القحطاني</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '85')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله الخالدي</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '86')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله الحربي</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '89')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله الفضلي</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '88')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item open"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> قبيله السبيعي</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.qabael.cat', '89')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                </ul>
            </li>



        </ul>
    </div>
</div>
