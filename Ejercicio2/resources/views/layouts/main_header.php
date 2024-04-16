<?php

function head($args=null) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Foro FIE - IS</title>
    <style>
        body{
            background-color: #E4E4E4;
        }
        .logo{
            max-height: 50px;
            max-width: 50px;
        }
    </style>
</head>
<body>
    <div id="app" class="container_fluid p-0">
        <header class="row m-0 bg-dark">
            <div class="col-9">
                <h1 class="ml-3 mt-2 text-light">Foro FIE - Ingeniería de software</h1>
            </div>
            <div class="col-3 float-end">
                <img src="/resources/images/logo.jpg" alt="Logo" class="logo">
            </div>
        </header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Foro</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house-door-fill"></i></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Ultimas publicaciones</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" id="buscar">
                    <button class="btn btn-outline-success" type="button" onclick="app.searchByWord()"><i class="bi bi-search"></i></button>
                </form>
                </div>
            </div>
        </nav>
<?php } ?>