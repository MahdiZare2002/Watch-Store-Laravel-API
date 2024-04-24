<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> قالب مدیریتی </title>
    <link rel="shortcut icon" href="assets/media/image/favicon.png">
    <meta name="theme-color" content="#5867dd">
    <link rel="stylesheet" href="vendors/bundle.css" type="text/css">
    <link rel="stylesheet" href="vendors/slick/slick.css">
    <link rel="stylesheet" href="vendors/slick/slick-theme.css">
    <link rel="stylesheet" href="vendors/vmap/jqvmap.min.css">
    <link rel="stylesheet" href="assets/css/app.css" type="text/css">
</head>
<body class="small-navigation">
<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <li data-toggle="tooltip" title="کاربران">
                <a href="#users" title=" کاربران">
                    <i class="icon ti-user"></i>
                </a>
            </li>
        </ul>
        <ul>
            <li data-toggle="tooltip" title="ویرایش پروفایل">
                <a href="#" class="go-to-page">
                    <i class="icon ti-settings"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="خروج">
                <a href="login.html" class="go-to-page">
                    <i class="icon ti-power-off"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">
        <ul id="users">
            <li>
                <a href="#">کاربران</a>
                <ul>
                    <li><a href="#">ایجاد کاربر</a></li>
                    <li><a href="#">لیست کاربران</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- end::navigation -->
<!-- begin::header -->
<div class="header">
    <!-- begin::header logo -->
    <div class="header-logo">
        <a href="index.html">
            <img class="large-logo" src="assets/media/image/logo.png" alt="image">
            <img class="small-logo" src="assets/media/image/logo-sm.png" alt="image">
            <img class="dark-logo" src="assets/media/image/logo-dark.png" alt="image">
        </a>
    </div>
    <!-- end::header logo -->
    <!-- begin::header body -->
    <div class="header-body">
        <div class="header-body-left">
            <h3 class="page-title">داشبورد</h3>
            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> لیست</li>
                </ol>
            </nav>
            <!-- end::breadcrumb -->
        </div>
        <div class="header-body-right">
            <!-- begin::navbar main body -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="ti-plus"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="p-3">
                            <h6 class="font-size-13 m-b-15">دسترسی سریع</h6>
                            <div class="row">
                                <div class="col-6">
                                    <a href="#">
                                        <div
                                            class="d-flex flex-column font-size-13 bg-danger-bright bg-hover pt-3 pb-3 border-radius-1 text-danger text-center mb-3">
                                            <i class="fa fa-sitemap mb-2 font-size-20"></i>
                                            دسته‌بندی ها
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#">
                                        <div
                                            class="d-flex flex-column font-size-13 bg-info-bright bg-hover pt-3 pb-3 border-radius-1 text-info text-center mb-3">
                                            <i class="ti-game mb-2 font-size-20"></i>
                                            محصولات
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#">
                                        <div
                                            class="d-flex flex-column font-size-13 bg-warning-bright bg-hover pt-3 pb-3 border-radius-1 text-warning text-center">
                                            <i class="ti-bar-chart-alt mb-2 font-size-20"></i>
                                            گزارشات
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#">
                                        <div
                                            class="d-flex flex-column font-size-13 bg-secondary-bright bg-hover pt-3 pb-3 border-radius-1 text-secondary text-center">
                                            <i class="fa fa-share mb-2 font-size-20"></i>
                                            سایر
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link nav-link-notify" data-toggle="dropdown">
                        <i class="ti-comment"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="p-4 text-center" data-backround-image="assets/media/image/profile-bg.png">
                            <h6 class="m-b-0">پیام ها</h6>
                            <small class="font-size-13 opacity-7 d-inline-block m-t-5">1 پیام خوانده نشده</small>
                        </div>
                        <div>
                            <ul class="list-group list-group-flush">
                                <li>
                                    <a href="#"
                                       class="p-3 list-group-item d-flex align-items-center link-1 hide-show-toggler">
                                        <div>
                                            <figure class="avatar avatar-sm m-r-15">
                                                <span class="avatar-title bg-success rounded-circle">آ</span>
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 d-flex justify-content-between primary-font">
                                                کاربر 1
                                                <i title="علامت خوانده نشده" data-toggle="tooltip"
                                                   class="hide-show-toggler-item fa fa-check font-size-13"></i>
                                            </h6>
                                            <span class="text-muted m-r-10 small">08:50 ب.ظ</span>
                                            <span class="text-muted small line-height-24">لورم ایپسوم متن ساختگی</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- end::navbar main body -->

            <div class="d-flex align-items-center">
                <!-- begin::navbar navigation toggler -->
                <div class="d-xl-none d-lg-none d-sm-block navigation-toggler">
                    <a href="#">
                        <i class="ti-menu"></i>
                    </a>
                </div>
                <!-- end::navbar navigation toggler -->

                <!-- begin::navbar toggler -->
                <div class="d-xl-none d-lg-none d-sm-block navbar-toggler">
                    <a href="#">
                        <i class="ti-arrow-down"></i>
                    </a>
                </div>
                <!-- end::navbar toggler -->
            </div>
        </div>

    </div>
    <!-- end::header body -->

</div>
<!-- end::header -->
<!-- begin::main content -->
<main class="main-content">
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">1</h2>
                            <h6 class="mb-2 font-size-13 text-primary font-weight-bold primary-font">تعداد کاربران</h6>
                        </div>
                        <div>
                            <span class="dashboard-pie-1" style="display: none;">2/5</span>
                            <svg class="peity" height="60" width="60">
                                <path
                                    d="M 30.000000000000004 0 A 30 30 0 0 1 47.633557568774194 54.270509831248425 L 30 30"
                                    data-value="2" fill="rgba(88, 103, 221, 0.3)"></path>
                                <path
                                    d="M 47.633557568774194 54.270509831248425 A 30 30 0 1 1 29.999999999999993 0 L 30 30"
                                    data-value="3" fill="rgb(88, 103, 221)"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">1</h2>
                            <h6 class="mb-2 font-size-13 text-success font-weight-bold primary-font">تعداد فروش</h6>
                        </div>
                        <div>
                            <span class="dashboard-pie-2" style="display: none;">4/5</span>
                            <svg class="peity" height="60" width="60">
                                <path
                                    d="M 30.000000000000004 0 A 30 30 0 1 1 1.4683045111453907 20.729490168751582 L 30 30"
                                    data-value="4" fill="rgba(10, 187, 135, 0.3)"></path>
                                <path
                                    d="M 1.4683045111453907 20.729490168751582 A 30 30 0 0 1 29.999999999999993 0 L 30 30"
                                    data-value="1" fill="rgb(10, 187, 135)"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">1</h2>
                            <h6 class="mb-2 font-size-13 text-warning font-weight-bold primary-font">مجموع نظرات</h6>
                        </div>
                        <div>
                            <span class="dashboard-pie-3" style="display: none;">1/5</span>
                            <svg class="peity" height="60" width="60">
                                <path
                                    d="M 30.000000000000004 0 A 30 30 0 0 1 58.53169548885461 20.72949016875158 L 30 30"
                                    data-value="1" fill="rgba(255, 184, 34, 0.3)"></path>
                                <path
                                    d="M 58.53169548885461 20.72949016875158 A 30 30 0 1 1 29.999999999999993 0 L 30 30"
                                    data-value="4" fill="rgb(255, 184, 34)"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">1</h2>
                            <h6 class="mb-2 font-size-13 text-info font-weight-bold primary-font">تعداد محصولات </h6>
                        </div>
                        <div>
                            <span class="dashboard-pie-4" style="display: none;">2/5</span>
                            <svg class="peity" height="60" width="60">
                                <path
                                    d="M 30.000000000000004 0 A 30 30 0 0 1 47.633557568774194 54.270509831248425 L 30 30"
                                    data-value="2" fill="rgba(85, 166, 235, 0.3)"></path>
                                <path
                                    d="M 47.633557568774194 54.270509831248425 A 30 30 0 1 1 29.999999999999993 0 L 30 30"
                                    data-value="3" fill="rgb(85, 166, 235)"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h6 class="card-title">ایجاد کاربر</h6>
                <form method="POST">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نام و نام خانوادگی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" placeholder="نام و نام خانوادگی" dir="rtl"
                                   name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ایمیل</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" placeholder="ایمیل" dir="rtl"
                                   name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">موبایل</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" placeholder="موبایل" dir="rtl"
                                   name="mobile">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">پسورد</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" placeholder="پسورد" dir="rtl"
                                   name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">واتس اپ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="whatsapp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تلگرام</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="telegram">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">اینستاگرام</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" name="instagram">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
                        <input class="col-sm-10" type="file" class="form-control-file" id="file">
                    </div>
                    <div class="form-group row">
                        <button name="submit" type="button" class="btn btn-success btn-uppercase">
                            <i class="ti-check-box m-r-5"></i> ذخیره
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table overflow-auto" tabindex="8">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center align-middle text-primary">ردیف</th>
                        <th class="text-center align-middle text-primary">عکس</th>
                        <th class="text-center align-middle text-primary">نام و نام خانوادگی</th>
                        <th class="text-center align-middle text-primary">ایمیل</th>
                        <th class="text-center align-middle text-primary">موبایل</th>
                        <th class="text-center align-middle text-primary">نقش های کاربر</th>
                        <th class="text-center align-middle text-primary"> وضعیت</th>
                        <th class="text-center align-middle text-primary">ویرایش</th>
                        <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center align-middle"></td>
                        <td class="text-center align-middle">
                            <figure class="avatar avatar">
                                <img src="" class="rounded-circle" alt="image">
                            </figure>
                        </td>
                        <td class="text-center align-middle"></td>
                        <td class="text-center align-middle"></td>
                        <td class="text-center align-middle"></td>
                        <td class="text-center align-middle">
                            <a class="btn btn-outline-info" href="#">
                                نقش های کاربر
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <span class="cursor-pointer badge badge-success">فعال</span>
                        </td>
                        <td class="text-center align-middle">
                            <a class="btn btn-outline-info" href="#">
                                ویرایش
                            </a>
                        </td>
                        <td class="text-center align-middle"></td>
                    </tr>

                </table>
                <div style="margin: 40px !important;"
                     class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                </div>
            </div>
        </div>
    </div>

</main>
<script src="vendors/bundle.js"></script>
<script src="vendors/slick/slick.min.js"></script>
<script src="vendors/vmap/jquery.vmap.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
