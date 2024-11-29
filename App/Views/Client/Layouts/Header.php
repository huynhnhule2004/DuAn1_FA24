<?php

namespace App\Views\Client\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;
use App\Views\Client\Components\Header as ComponentsHeader;

class Header extends BaseView
{
    public static function render($data = null)
    {
        unset($_SESSION['user']);
        $is_login = AuthHelper::checkLogin();

?>


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>Waggy - Website bán phụ kiện thú cưng</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="format-detection" content="telephone=no">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="mobile-web-app-capable" content="yes">

            <meta name="author" content="">
            <meta name="keywords" content="">
            <meta name="description" content="">
        </head>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/client/css/vendor.css">
        <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/client/css/style.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Chilanka&family=Montserrat:wght@300;400;500&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
            integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SweetAlert2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.6/dist/sweetalert2.min.css" rel="stylesheet">

        <!-- SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.6/dist/sweetalert2.all.min.js"></script>
        <!-- Thêm jQuery từ CDN -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



        </head>

        <body>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <defs>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="link" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 19a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0-4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm-5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3Zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16Zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1ZM7 15a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0 4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Z" />
                    </symbol>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
                    </symbol>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="category" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M19 5.5h-6.28l-.32-1a3 3 0 0 0-2.84-2H5a3 3 0 0 0-3 3v13a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1h4.56a1 1 0 0 1 .95.68l.54 1.64a1 1 0 0 0 .95.68h7a1 1 0 0 1 1 1Z" />
                    </symbol>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z" />
                    </symbol>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z" />
                    </symbol>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z" />
                    </symbol>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z" />
                    </symbol>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
                    </symbol>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="check" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M18.71 7.21a1 1 0 0 0-1.42 0l-7.45 7.46l-3.13-3.14A1 1 0 1 0 5.29 13l3.84 3.84a1 1 0 0 0 1.42 0l8.16-8.16a1 1 0 0 0 0-1.47Z" />
                    </symbol>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="trash" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M10 18a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1ZM20 6h-4V5a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8h1a1 1 0 0 0 0-2ZM10 5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1h-4Zm7 14a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8h10Zm-3-1a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1Z" />
                    </symbol>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="star-outline" viewBox="0 0 15 15">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z" />
                    </symbol>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="star-solid" viewBox="0 0 15 15">
                        <path fill="currentColor"
                            d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
                    </symbol>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
                    </symbol>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z" />
                    </symbol>
                    <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 15 15">
                        <path fill="currentColor"
                            d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
                    </symbol>

                </defs>
            </svg>

            <!-- <div class="preloader-wrapper">
                <div class="preloader">
                </div>
            </div> -->

            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart"
                aria-labelledby="My Cart">
                <div class="offcanvas-header justify-content-left">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Giỏ hàng</span>
                            <span class="badge bg-primary rounded-circle pt-2">3</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Grey Hoodie</h6>
                                    <small class="text-body-secondary">Brief description</small>
                                </div>
                                <span class="text-body-secondary">$12</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Dog Food</h6>
                                    <small class="text-body-secondary">Brief description</small>
                                </div>
                                <span class="text-body-secondary">$8</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Soft Toy</h6>
                                    <small class="text-body-secondary">Brief description</small>
                                </div>
                                <span class="text-body-secondary">$5</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-bold">Tổng cộng (VND)</span>
                                <strong>$20</strong>
                            </li>
                        </ul>

                        <a href="/checkout" class="w-100 btn btn-primary btn-lg" type="submit">Thanh toán</a>
                    </div>
                </div>
            </div>

            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch"
                aria-labelledby="Search">
                <div class="offcanvas-header justify-content-center">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <div class="order-md-last">
                        <h4 class="text-primary text-uppercase mb-3">
                            Search
                        </h4>
                        <div class="search-bar border rounded-2 border-dark-subtle">
                            <form id="search-form" class="text-center d-flex align-items-center" action="/search" method="GET">
                                <input type="text" class="form-control border-0 bg-transparent" placeholder="Search Here" value="<?= $_GET['keyword'] ?? '' ?>" name="keyword" />
                                <iconify-icon icon="tabler:search" class="fs-4 me-3"></iconify-icon>
                                <button type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <header>
                <div class="container py-2">
                    <div class="row py-4 pb-0 pb-sm-4 align-items-center ">

                        <div class="col-sm-4 col-lg-3 text-center text-sm-start">
                            <div class="main-logo">
                                <a href="/">
                                    <img src="<?= APP_URL ?>/public/assets/client/images/logo.png" alt="logo" class="img-fluid">
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
                            <div class="search-bar border rounded-2 px-3 border-dark-subtle">
                                <form id="search-form" class="text-center d-flex align-items-center" action="/search" method="GET">
                                    <input type="text" class="form-control border-0 bg-transparent" placeholder="Tìm kiếm..." value="<?= $_GET['keyword'] ?? '' ?>" name="keyword" />
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
                                    </svg>
                                </form>
                            </div>
                        </div>

                        <div
                            class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
                            <div class="support-box text-end d-none d-xl-block">
                                <span class="fs-6 secondary-font text-muted">Phone</span>
                                <h5 class="mb-0">0364402449</h5>
                            </div>
                            <div class="support-box text-end d-none d-xl-block">
                                <span class="fs-6 secondary-font text-muted">Email</span>
                                <h5 class="mb-0">waggy@gmail.com</h5>
                            </div>



                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <hr class="m-0">
                </div>

                <div class="container">
                    <nav class="main-menu d-flex navbar navbar-expand-lg ">

                        <div class="d-flex d-lg-none align-items-end mt-3">
                            <ul class="d-flex justify-content-end list-unstyled m-0">
                                <li>
                                    <a href="/login" class="mx-3">
                                        <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                                        aria-controls="offcanvasCart">
                                        <iconify-icon icon="mdi:heart" class="fs-4 position-relative"></iconify-icon>
                                        <span class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                                            03
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                                        aria-controls="offcanvasCart">
                                        <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                                        <span class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                                            03
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch"
                                        aria-controls="offcanvasSearch">
                                        <iconify-icon icon="tabler:search" class="fs-4"></iconify-icon>
                                        </span>
                                    </a>
                                </li>
                            </ul>

                        </div>

                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                            aria-labelledby="offcanvasNavbarLabel">

                            <div class="offcanvas-header justify-content-center">
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body justify-content-between">
                                <select class="filter-categories border-0 mb-0 me-5">
                                    <option>Mua sắm theo danh mục</option>
                                    <option>Clothes</option>
                                    <option>Food</option>
                                    <option>Food</option>
                                    <option>Toy</option>
                                </select>

                                <ul class="navbar-nav menu-list list-unstyled d-flex gap-md-3 mb-0">
                                    <li class="nav-item" id="home-item">
                                        <a href="/" class="nav-link">Trang chủ</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" role="button" id="pages" data-bs-toggle="dropdown"
                                            aria-expanded="false">Sản phẩm</a>
                                        <ul class="dropdown-menu" aria-labelledby="pages">
                                            <?php
                                            ComponentsHeader::render($data['categories']);
                                            ?>
                                            <!-- <li><a href="/products" class="dropdown-item">Thức ăn</a></li>
                                            <li><a href="/products" class="dropdown-item">Phụ kiện cho chó</a></li>
                                            <li><a href="/products" class="dropdown-item">Phụ kiện cho mèo</a></li> -->
                                        </ul>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="/products" class="nav-link">Sản phẩm</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a href="/blogs" class="nav-link">Bài viết</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/about" class="nav-link">Giới thiệu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/contact" class="nav-link">Liên hệ</a>
                                    </li>
                                </ul>

                                <div class="d-none d-lg-flex align-items-end">
                                    <ul class="d-flex justify-content-end list-unstyled m-0">
                                        <li>
                                            <?php
                                            if ($is_login):
                                            ?>
                                                <div class="dropdown show" style="display: inline-block;">
                                                    <a class="dropdown-toggle fs-5" href="#" role="button" id="dropdownMenuLink"
                                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa-solid fa-user"></i>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item m-0" href="/users/<?= $_SESSION['user']['id'] ?>"
                                                            style="font-size: medium;"><?= $_SESSION['user']['username'] ?></a>
                                                        <a class="dropdown-item m-0" href="/orders/history"
                                                            style="font-size: medium;">Lịch sử mua hàng</a>
                                                        <a class="dropdown-item m-0" href="/change-password"
                                                            style="font-size: medium;">Đổi mật khẩu</a>
                                                        <a class="dropdown-item m-0" href="/logout" style="font-size: medium;">Đăng
                                                            xuất</a>
                                                    </div>
                                                </div>


                                            <?php
                                            else:
                                            ?>
                                                <a href="/login" class="mx-3 fs-5">
                                                    <i class="fa-solid fa-user"></i>
                                                </a>

                                            <?php
                                            endif;
                                            ?>
                                        </li>
                                        <li>
                                            <a href="/wishlist" class="mx-3 fs-5">
                                                <i class="fa-solid fa-heart "></i>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="/cart/show" class="mx-3 fs-5 position-relative">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <?php
                                                $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : ['info' => ['number_order' => 0]];

                                                // Kiểm tra nếu key 'buy' tồn tại và là một mảng hợp lệ
                                                $number_order = isset($cart['buy']) && is_array($cart['buy']) ? count($cart['buy']) : 0;
                                                ?>
                                                <!-- <span class="position-absolute badge rounded-circle bg-primary pt-2" style="transform: translate(-40%, -30%); font-size: 12px">
                                                    <?= $number_order > 0 ? $number_order : '' ?>
                                                </span> -->
                                            </a>
                                        </li>
                                        <!-- <li class="">
                                            <a href="/" class="mx-3" data-bs-toggle="offcanvas"
                                                data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                                                <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                                                <span
                                                    class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                                                    03
                                                </span>
                                            </a>
                                        </li> -->
                                    </ul>

                                </div>

                            </div>

                        </div>

                    </nav>



                </div>
            </header>

            <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="/">Client</a>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Trang chủ <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/products">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Giỏ hàng</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Đăng ký</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </nav> -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const menuLinks = document.querySelectorAll('.nav-item a');

                    const currentPath = window.location.pathname;

                    let activeLink = document.querySelector('.nav-item a[href="/"]');

                    menuLinks.forEach(link => {
                        const linkHref = link.getAttribute('href');

                        if (currentPath === linkHref || (currentPath === '/' && linkHref === '/')) {
                            activeLink = link;
                        }
                    });

                    activeLink.classList.add('active');
                });
            </script>

    <?php

    }
}

    ?>