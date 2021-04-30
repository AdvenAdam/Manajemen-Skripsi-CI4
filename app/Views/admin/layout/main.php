<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Circl - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="/tema/admin/circladmin-10/circl/theme/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/tema/admin/circladmin-10/circl/theme/assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="/tema/admin/circladmin-10/circl/theme/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="/tema/admin/circladmin-10/circl/theme/assets/plugins/apexcharts/apexcharts.css" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="/tema/admin/circladmin-10/circl/theme/assets/css/main.min.css" rel="stylesheet">
    <link href="/tema/admin/circladmin-10/circl/theme/assets/css/custom.css" rel="stylesheet">

</head>

<body>

    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div>
    <div class="page-container">
        <!-- tempat halaman -->
        <?= $this->include('/admin/layout/v_nav'); ?>
        <?= $this->include('/admin/layout/v_side'); ?>
        <?= $this->renderSection('content'); ?>
    </div>

    <!-- Javascripts -->
    <script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/tema/admin/circladmin-10/circl/theme/assets/js/feather.min.js"></script>
    <script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="/tema/admin/circladmin-10/circl/theme/assets/js/main.min.js"></script>
    <script src="/tema/admin/circladmin-10/circl/theme/assets/js/popper.min.js"></script>
    <script src="/tema/admin/circladmin-10/circl/theme/assets/js/pages/dashboard.js"></script>
</body>

</html>