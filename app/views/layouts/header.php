<!DOCTYPE html>
<html>
<head>
    <title>Tasks</title>
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/font-awesome.min.css">
    <link rel="icon" href="">
</head>
<body>
	<div class="container">
<nav class="navbar navbar-default">
<div class="container-fluid">
    <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <a href="/" class="navbar-brand">Tasks</a>
    </div>
    <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
    <li><a href="/">Главная</a></li>
    <li><a href="/task/add">Добавить задачу</a></li>
    <?php if (isset($_SESSION['user'])) { ?>
    <li><a href="/admin">Админ панель</a></li>
    <li><a href="/admin/logout">Выйти</a></li>
    <?php } else { ?>
    <li><a href="/admin/login">Войти</a></li>
    <?php } ?>
</ul>
</div>
</div>
</nav>
