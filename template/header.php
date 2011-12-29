<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CupCupCake蛋糕工作坊</title>
<meta name="keywords" content="CupCupCake,蛋糕工作坊" />
<meta name="Description" content="CupCupCake" />
<link href="<?=get_cji('main.css')?>" rel="stylesheet" type="text/css" />
    <?if(isset($load_css)):?>
<link href="<?=get_cji($load_css)?>" rel="stylesheet" type="text/css" />       
    <?endif;?>
<script type="text/javascript" src="<?=get_cji('jQuery_min.js')?>"></script>
    <?if(isset($load_js)):?>
<script type="text/javascript" src="<?=get_cji($load_js)?>"></script>
    <?endif;?>
</head>

<body>
<div id="warp">
	<!-- start #head -->
	<div id="head">
            <img src="<?=get_cji('logo.gif')?>" class="logo" />
            <ul class="menu">
                <li><a href="<?=site_url('index')?>">首页</a></li>
                <li><a href="<?=site_url('about')?>">关于我们</a></li>
                <li><a href="<?=site_url('cakes')?>">蛋糕类别</a></li>
                <li><a href="<?=site_url('contact')?>">联系我们</a></li>
            </ul>
        </div>
        <?if(isset($menu_on)&&  is_numeric($menu_on)):?>
        <script type="text/javascript">
            $(function(){
                $('ul.menu li:eq(<?=$menu_on?>)').addClass('on');
            })
        </script>
        <?endif;?>
    <!-- end #head -->