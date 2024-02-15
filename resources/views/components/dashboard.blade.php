<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../back/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../back/assets/img/favicon.png" />
    <title>Soft UI Dashboard Tailwind</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../back/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../back/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="../back/assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

<!-- Sidebar -->
@extends('layouts.sidebar')

{{ $slot }}

</body>
<!-- plugin for scrollbar  -->
<script src="../back/assets/js/plugins/perfect-scrollbar.min.js" async></script>

</html>
