<!--This is IE DTD patch , Don't delete this line.-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cupcupcake后台</title>
<link href="<?=  admin_cji('frame.css')?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=get_cji('jQuery_min.js')?>"></script>
<script language="javascript">
function JumpFrame(url1, url2)
{
	$('#menufra').get(0).src = url1;
	$('#main').get(0).src = url2;
}
</script>
</head>
<body class="showmenu">

<div class="head">
	<div class="top">
		<div class="top_logo">
			<img src="<?=admin_cji('admin_top_logo.gif')?>" width="170" height="37" alt="DedeCms Logo" title="Welcome use DedeCms" />
		</div>
		<div class="top_link">
			<ul>
				<li class="welcome">您好：
				
                                    <b><?=$user?></b>
				 ，欢迎使用cupcupcake管理系统！</li>
				
     		
     		<li><a href="<?=site_url()?>" target="_blank">网站主页</a></li>
     		
      	<li><a href="<?=site_url('login/sign_out')?>" target="_top">注销</a></li>
			</ul>
			
		</div>
	</div>
	
	<div class="topnav">
		<div class="menuact">
			
		</div>
		<div class="nav" id="nav">
		</div>
		<div class="sysmsg">
			
		</div>
	</div>
</div>
