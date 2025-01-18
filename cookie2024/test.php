<?php
include("db.php");
if (isset($_COOKIE["login"])) {
    $email = $_COOKIE["login"];

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Form php</title>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
         <style>
                .btn {
            padding: .45rem 1.5rem .35rem;
            }

            .gradient-custom {
            /* fallback for old browsers */
            background: #c471f5;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(196, 113, 245, 1), rgba(250, 113, 205, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(196, 113, 245, 1), rgba(250, 113, 205, 1))
            }

            .btn-outline-light {
            --mdb-btn-hover-bg: transparent;
            --mdb-btn-active-bg: transparent;
            }
           
        </style>
     
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark gradient-custom">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">Navbar</a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-collapse-init
            data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars text-light"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left links -->
            <ul class="navbar-nav me-auto d-flex flex-row mt-3 mt-lg-0">
                <li class="nav-item text-center mx-2 mx-lg-1">
                <a class="nav-link active" aria-current="page" href="#!">
                    <div>
                    <i class="fas fa-home fa-lg mb-1"></i>
                    </div>
                    Home
                </a>
                </li>
                <li class="nav-item text-center mx-2 mx-lg-1">
                <a class="nav-link" href="#!">
                    <div>
                    <i class="far fa-envelope fa-lg mb-1"></i>
                    <span class="badge rounded-pill badge-notification bg-dark">11</span>
                    </div>
                    Link
                </a>
                </li>
                <li class="nav-item text-center mx-2 mx-lg-1">
                <a class="nav-link disabled" aria-disabled="true" href="#!">
                    <div>
                    <i class="far fa-envelope fa-lg mb-1"></i>
                    <span class="badge rounded-pill badge-notification bg-dark">11</span>
                    </div>
                    Disabled
                </a>
                </li>
                <li class="nav-item dropdown text-center mx-2 mx-lg-1">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-dropdown-init
                    aria-expanded="false">
                    <div>
                    <i class="far fa-envelope fa-lg mb-1"></i>
                    <span class="badge rounded-pill badge-notification bg-dark">11</span>
                    </div>
                    Dropdown
                </a>
                <!-- Dropdown menu -->
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                    <hr class="dropdown-divider" />
                    </li>
                    <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
                </li>
            </ul>
            <!-- Left links -->

            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0">
                <li class="nav-item text-center mx-2 mx-lg-1">
                <a class="nav-link" href="#!">
                    <div>
                    <i class="fas fa-bell fa-lg mb-1"></i>
                    <span class="badge rounded-pill badge-notification bg-dark">11</span>
                    </div>
                    Messages
                </a>
                </li>
                <li class="nav-item text-center mx-2 mx-lg-1">
                <a class="nav-link" href="#!">
                    <div>
                    <i class="fas fa-globe-americas fa-lg mb-1"></i>
                    <span class="badge rounded-pill badge-notification bg-dark">11</span>
                    </div>
                    News
                </a>
                </li>
            </ul>
            <!-- Right links -->

            <!-- Search form -->
            <form class="d-flex input-group w-auto ms-lg-3 my-3 my-lg-0">
                <input type="search" class="form-control" placeholder="Search" aria-label="Search" />
                <button type="button" class="btn btn-outline-light" data-mdb-ripple-init data-mdb-ripple-color="dark">
                Search
                </button>
            </form>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </body>

    </html>
<?php
} else {
    header("location:index.php");
}
?>