<!DOCTYPE html>
<html lang="es-ar">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Title of the document</title>
    <link type="text/css" rel="stylesheet" media="all" href="<?=base_url()?>media/styles/reset.css" />
    <link type="text/css" rel="stylesheet" media="all" href="<?=base_url()?>media/styles/fonts.css" />
    <link type="text/css" rel="stylesheet" media="all" href="<?=base_url()?>media/styles/style.css" />

    <script type="text/javascript" src="scripts/jquery-1.10.2.js"></script>


    <?echo (isset($css_include))? $css_include: "<!-- css -->";?>
    
    <?echo (isset($js_include))? $js_include: "<!-- js -->";?>
</head>

<body>
    <header>
        <div class="title">
            <p>Vendo-Mi-Usado.com.ar</p>
        </div>

        <nav class="menu">
            <ul>
                <li><a href="" title="">Accesorios y Autopartes</a></li>
                <li><a href="" title="">Vehiculos Solicitados</a></li>
                <li><a href="" title="">Busqueda Personalizada</a></li>    
                <li><a href="" title="">Ultimas Publicaciones</a></li>
            </ul>
        </nav>
        <div style="clear:both;"></div>
    </header>

    <div class="center">
        <div class="main">
            <h1><?=$title;?></h1>
            <br />

    
