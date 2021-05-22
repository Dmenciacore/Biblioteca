<!DOCTYPE html>
<html lang="es">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Proyecto</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Strength Password-->
    <link href="assets/open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/strength.css">
  </head>
  <body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="?c=libroFunc"><img src="assets/logoelibris.png" alt="User Image"></a>
  <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
  <!-- Navbar Right Menu-->
  <ul class="app-nav">
    <!-- User Menu-->
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li><a href="?c=usuario&a=modificarClaveFunc"><i class="fa fa-cog fa-lg"></i> Cambiar contraseña</a></li>
        <li><a ><i class="fa fa-user fa-lg"></i> Funcionarios</a></li>
        <li><a href="?c=usuario&a=Cerrar"><i class="fa fa-sign-out fa-lg"></i> Cerrar Sesión</a></li>
      </ul>
    </li>
  </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
  <?php //echo "<h1>".print_r ($_SESSION['usuario'])."</h1>";?>
    <div>
      <p class="app-sidebar__user-name"></p>
      <p class="app-sidebar__user-designation">Gestión Bibliotecaria</p>
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item active" href="?c=libroFunc"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Catálogo</span></a></li>
    <li class="treeview is-expanded"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Operaciones Con Libros</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item active" href="?c=reservaFunc"><i class="icon fa fa-circle-o"></i> Libros</a></li>
      <li><a class="treeview-item active" href="?c=informes"><i class="icon fa fa-circle-o"></i> Informes</a></li>
    </ul>
    </li>        
  </ul>
</aside>
</body>
</html>