<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php get_title();?></title>
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="keywords" content="calculadora,faci,devry,notas,ads,alunos,projetos,análise de sistemas,desenvolvimento,tecnologia,ap1,ap2,ap3,avaliações,resultados,estimativas,médias" />
<meta name="description" content="O AcademicDoc é uma ferramenta que permite o cálculo das notas de avaliações no sistema AP1, AP2 e AP3, para o monitoramento de resultados estatísticos de determinadas disciplinas." />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";?>" />
<meta property="og:title" content="<?php get_title();?>" />
<meta property="og:site_name" content="AcademicDoc" />
<meta property="og:description" content="O AcademicDoc é uma ferramenta que permite o cálculo das notas de avaliações no sistema AP1, AP2 e AP3, para o monitoramento de resultados estatísticos de determinadas disciplinas." />
<meta property="og:image" content="http://academicdoc.tk/images/academicdoc-og-image.jpg" />
<meta name="twitter:card" content="summary_large_image" />
<link rel="stylesheet" type="text/css" href="includes/css/style.css" />
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
<script type="text/javascript" src="includes/js/jquery.js"></script>
<script type="text/javascript" src="includes/js/settings.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php get_head();?>
</head>

<body>
	<div id="wrapper">
    	<div id="header">
        	<div id="logo">
            	<a href="http://www.devry.com.br/faci" rel="bookmark"><img src="images/devry-faci-logo.png" /></a>
            </div>
            <div id="nav">
            	<a href="#" id="open_menu" onClick="return false;"><span id="icon"></span></a>
            	<ul id="sub_menu">
                	<li><a href="." rel="bookmark">Início</a></li>
                    <li><a href="?page=about" rel="bookmark">Quem somos</a></li>
                    <li><a href="?page=contact" rel="bookmark">Contato</a></li>
                    <li><a href="?page=help" rel="bookmark">Ajuda</a></li>
                </ul>
            </div>
            <div id="clear"></div>
        </div>
        
        <div id="content">