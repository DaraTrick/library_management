<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">បញ្ជី</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>ផ្ទាំងគ្រប់គ្រង</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-calendar-month"></i>
                        <span>គ្រប់គ្រងការខ្ចីសៀវភៅ</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('create_borrower') }}">គ្រប់គ្រងការខ្ចី</a></li>
                        <li><a href="{{ route('list_borrower') }}">បញ្ជីដែលបានខ្ចីសៀវភៅ</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-book"></i>
                        <span>គ្រប់គ្រងសៀវភៅ</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('manage_book') }}">សៀវភៅទាំងអស់</a></li>
                        <li><a href="{{ route('create_book') }}">បន្ថែមសៀវភៅ</a></li>
                        <li><a href="{{ route('manage_book_author') }}">អ្នកនិពន្ធសៀវភៅ</a></li>
                        <li><a href="{{ route('manage_book_category') }}">ប្រភេទសៀវភៅ</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-school"></i>
                        <span>គ្រប់គ្រងសិស្ស</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all_students') }}">សិស្សទាំងអស់</a></li>
                        <li><a href="{{ route('add-new-student') }}">បន្ថែមសិស្សថ្មី</a></li>
                        <li><a href="{{ route('courses') }}">មុខវិជ្ជាសិក្សា</a></li>
                        <li><a href="{{ route('manage_grade') }}">ឆ្នាំសិក្សា</a></li>
                        {{-- 
                        <li><a href="pages-gallery.html">Gallery</a></li>
                        <li><a href="pages-faqs.html">FAQs</a></li>
                        <li><a href="pages-pricing.html">Pricing</a></li>
                        <li><a href="pages-404.html">Error 404</a></li>
                        <li><a href="pages-500.html">Error 500</a></li> --}}
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-package-variant-closed"></i>
                        <span>របាយការណ៍</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="advanced-alertify.html">ប្រចាំថ្ងៃ</a></li>
                        <li><a href="advanced-rating.html">ប្រចាំសប្តាហ៍</a></li>
                        <li><a href="advanced-nestable.html">ប្រចាំខែ</a></li>
                        <li><a href="advanced-rangeslider.html">ប្រចាំឆ្នាំ</a></li>
                        {{-- <li><a href="advanced-sweet-alert.html">Sweet-Alert</a></li>
                        <li><a href="advanced-lightbox.html">Lightbox</a></li>
                        <li><a href="advanced-maps.html">Maps</a></li> --}}
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-delete"></i>
                        <span>ព្រាងទុក</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('trashed_students') }}">សិស្ស</a></li>
                        <li><a href="{{ route('trashed_books') }}">សៀវភៅ</a></li>
                        <li><a href="advanced-nestable.html">ការខ្ចីសៀវភៅប្រចាំខែ</a></li>
                        <li><a href="advanced-rangeslider.html">អ្នកប្រើប្រាស់</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('manage_staff') }}" class="waves-effect">
                        <i class="mdi mdi-account"></i>
                        <span>អ្នកប្រើប្រាស់</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="waves-effect">
                        <i class="mdi mdi-logout"></i>
                        <span>ចាកចេញ</span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->