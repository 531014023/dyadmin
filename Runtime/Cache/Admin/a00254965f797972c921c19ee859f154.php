<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<style>
	/*.main-content{
		background: url("../../../Public/background/lw.jpg");
		background-repeat: no-repeat;
		background-size: 100% 100%;
	}*/
</style>
<head>
	<meta charset="UTF-8">
	<title><?php echo ($title["two"]["name"]); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- basic styles -->
		<link href="/Public/Admin/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/Public/Admin/assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="http:////at.alicdn.com/t/font_510176_ozamlp3jycmu0udi.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="/Public/Admin/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="/Public/Admin/assets/css/chosen.css">
		<!--<link rel="stylesheet" href="/Public/Admin/assets/css/colorpicker.css">-->
		<link rel="stylesheet" href="/Public/Admin/css/common.css">
		<!-- fonts -->

		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" /> -->

		<!-- ace styles -->

		<link rel="stylesheet" href="/Public/Admin/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/Public/Admin/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/Public/Admin/assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/Public/Admin/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<!--<script src="/Public/Admin/assets/js/ace-extra.min.js"></script>-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/Public/Admin/assets/js/html5shiv.js"></script>
		<script src="/Public/Admin/assets/js/respond.min.js"></script>
		<![endif]-->
</head>
	<div class="navbar navbar-default" id="navbar">
		<script type="text/javascript">
			try{ace.settings.check('navbar' , 'fixed')}catch(e){}
		</script>

		<div class="navbar-container" id="navbar-container">
			<div class="navbar-header pull-left">
				<a href="#" class="navbar-brand">
					<small>
						<i class="icon-leaf"></i>
						<?php echo ($admin_name_long); ?>
					</small>
				</a><!-- /.brand -->
			</div><!-- /.navbar-header -->

			<div class="navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">
					<li class="light-blue">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<span class="user-info">
								<small>欢迎光临,</small>
								<?php echo getAdminUser(session(admin_id)); ?>
							</span>

							<i class="icon-caret-down"></i>
						</a>

						<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							<li>
								<a href="#">
									<i class="icon-cog"></i>
									设置
								</a>
							</li>

							<li>
								<a href="#">
									<i class="icon-user"></i>
									个人资料
								</a>
							</li>

							<li class="divider"></li>

							<li id="logout">
								<a href="javascript:void(0)">
									<i class="icon-off"></i>
									退出
								</a>
							</li>
						</ul>
					</li>
				</ul><!-- /.ace-nav -->
			</div><!-- /.navbar-header -->
		</div><!-- /.container -->
	</div>
	<!-- <script src='/Public/Js/dialog/layer.js'></script>
	<script src='/Public/Js/dialog.js'></script>
	<script src="/Public/Js/jquery.js"></script>
	<script src="/Public/Js/fun.js"></script> -->
<!-- <script>
	
</script> -->
	<div class="main-container" id="main-container">
		<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>
			<div class="sidebar" id="sidebar">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="icon-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="icon-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="icon-group"></i>
						</button>

						<button class="btn btn-danger">
							<i class="icon-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- #sidebar-shortcuts -->

				<ul class="nav nav-list">
					<?php if(is_array($menu)): foreach($menu as $key=>$m): ?><li style="<?php echo ($m["show"]); ?>" class="<?php echo ($m["open"]); ?>">
						<a href="<?php echo ($m["href"]); ?>" class="<?php echo ($m["down"]); ?>">
							<i class="<?php echo ($m["icon"]); ?>"></i>
							<span class="menu-text"> <?php echo ($m["name"]); ?> </span>
							<?php echo ($m["b"]); ?>
						</a>

						<ul class="submenu" style="<?php echo ($m["display"]); ?>">
							<?php if(is_array($m['menu'])): foreach($m['menu'] as $key=>$me): ?><li style="<?php echo ($me["show"]); ?>" class="<?php echo ($me["open"]); ?>">
								<a href="<?php echo ($me["href"]); ?>">
									<i class="icon-double-angle-right"></i>
									<?php echo ($me["name"]); ?>
								</a>
							</li><?php endforeach; endif; ?>
						</ul>
					</li><?php endforeach; endif; ?>

				</ul><!-- /.nav-list -->

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>
		<div class="main-content" style="height: 591px;">
			<!-- <div style="clear: both;"></div> -->
			<div class="row">
				<div class="col-xs-11">
					<p class="text-success" style="font-size: 20px;padding-top: 10px;">欢迎使用<?php echo ($admin_name_long); ?>!</p>
					<p>登录次数：<?php echo ($admin["login_count"]); ?> </p>
					<p>上次登录IP：<?php echo ($admin["ip"]); ?>  上次登录时间：<?php echo ($admin["login_time"]); ?></p>
					<table class="table table-border table-bordered table-bg">
						<thead>
						<tr>
							<th colspan="2" scope="col">服务器信息</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<th width="30%">服务器计算机名</th>
							<td><span id="lbServerName">http://127.0.0.1/</span></td>
						</tr>
						<tr>
							<td>服务器IP地址</td>
							<td><?php echo ($server["SERVER_IP"]); ?></td>
						</tr>
						<tr>
							<td>服务器域名</td>
							<td><?php echo ($server["HTTP_HOST"]); ?></td>
						</tr>
						<tr>
							<td>服务器端口 </td>
							<td><?php echo ($server["SERVER_PORT"]); ?></td>
						</tr>
						<tr>
							<td>WEB服务器版本 </td>
							<td><?php echo ($server["SERVER_SOFTWARE"]); ?></td>
						</tr>
						<tr>
							<td>本文件所在文件夹 </td>
							<td><?php echo ($server["REQUEST_URI"]); ?></td>
						</tr>
						<tr>
							<td>服务器操作系统 </td>
							<td>
								<?php echo php_uname(); ?>
							</td>
						</tr>
						<tr>
							<td>系统所在文件夹 </td>
							<td><?php echo ($server["DOCUMENT_ROOT"]); ?></td>
						</tr>
						<tr>
							<td>php版本 </td>
							<td>
								<?php echo PHP_VERSION; ?>
							</td>
						</tr>
						<tr>
							<td>服务器当前时间 </td>
							<td>
								<?php echo date("Y-m-d H:i:s"); ?>
							</td>
						</tr>
						<tr>
							<td>当前程序占用内存 </td>
							<td>
								<?php echo memory_usage(); ?>
							</td>
						</tr>
						<tr>
							<td>当前SessionID </td>
							<td>
								<?php echo session_id(); ?>
							</td>
						</tr>
						<tr>
							<td>当前系统用户名 </td>
							<td><?php echo ($server["USER"]); ?></td>
						</tr>
						<tr>
							<td>服务器语言 </td>
							<td><?php echo ($server["HTTP_ACCEPT_LANGUAGE"]); ?></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="ace-settings-container" id="ace-settings-container" style="top: 100px;">
				<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
					<i class="icon-cog bigger-150"></i>
				</div>

				<div class="ace-settings-box" id="ace-settings-box">
					<div>
						<div class="pull-left">
							<select id="skin-colorpicker" class="hide" style="display: none;">
								<option data-skin="default" value="#438EB9">#438EB9</option>
								<option data-skin="skin-1" value="#222A2D">#222A2D</option>
								<option data-skin="skin-2" value="#C6487E">#C6487E</option>
								<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
							</select>
							<div class="dropdown dropdown-colorpicker" style="display: none;">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">
									<span class="btn-colorpicker" style="background-color:#438EB9"></span>
								</a>
								<ul class="dropdown-menu dropdown-caret">
									<li><a class="colorpick-btn selected" href="#" style="background-color:#438EB9;" data-color="#438EB9"></a></li>
									<li><a class="colorpick-btn" href="#" style="background-color:#222A2D;" data-color="#222A2D"></a></li>
									<li><a class="colorpick-btn" href="#" style="background-color:#C6487E;" data-color="#C6487E"></a></li>
									<li><a class="colorpick-btn" href="#" style="background-color:#D0D0D0;" data-color="#D0D0D0"></a></li>
								</ul>
							</div>
						</div>
						<span>&nbsp; 主题风格</span>
					</div>

					<div>
						<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar">
						<label class="lbl" for="ace-settings-navbar"> 固定导航条</label>
					</div>

					<div>
						<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar">
						<label class="lbl" for="ace-settings-sidebar"> 固定工具栏</label>
					</div>

					<div>
						<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs">
						<label class="lbl" for="ace-settings-breadcrumbs"> 固定面包屑</label>
					</div>

					<div>
						<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl">
						<label class="lbl" for="ace-settings-rtl"> 工具栏左右切换</label>
					</div>

					<div>
						<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container">
						<label class="lbl" for="ace-settings-add-container">
							工具栏居中
						</label>
					</div>
				</div>
			</div>
		</div>
	</div>
		<script type="text/javascript">
			var root = "";
			var app = "";
		</script>
		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script src="/Public/Admin/Js/jquery.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/Public/Admin/assets/js/jquery-2.0.3.min.js'>"+"<"+"script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<![endif]-->

		<script type="text/javascript">
//			if("ontouchend" in document) document.write("<script src='/Public/Admin/assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="/Public/Admin/assets/js/bootstrap.min.js"></script>
		<!--<script src="/Public/Admin/assets/js/typeahead-bs2.min.js"></script>-->

		<!-- page specific plugin scripts -->
		<!--<script src="/Public/Admin/assets/js/jquery.dataTables.min.js"></script>-->
		<!--<script src="/Public/Admin/assets/js/jquery.dataTables.bootstrap.js"></script>-->
		<script src="/Public/Admin/assets/js/chosen.jquery.min.js"></script>
		<script type="text/javascript" src="/Public/static/js/dialog/layer.js"></script>
		<script type="text/javascript" src="/Public/static/js/dialog.js"></script>
		<script type="text/javascript" src="/Public/static/js/fun.js"></script>
		<!--[if lte IE 8]>
		  <!--<script src="/Public/Admin/assets/js/excanvas.min.js"></script>-->
		<![endif]-->

		<!--<script src="/Public/Admin/assets/js/jquery-ui-1.10.3.custom.min.js"></script>-->
		<!--<script src="/Public/Admin/assets/js/jquery.ui.touch-punch.min.js"></script>-->
		<!--<script src="/Public/Admin/assets/js/jquery.slimscroll.min.js"></script>-->
		<!--<script src="/Public/Admin/assets/js/jquery.easy-pie-chart.min.js"></script>-->
		<!--<script src="/Public/Admin/assets/js/jquery.sparkline.min.js"></script>-->
		<!--<script src="/Public/Admin/assets/js/flot/jquery.flot.min.js"></script>-->
		<!--<script src="/Public/Admin/assets/js/flot/jquery.flot.pie.min.js"></script>-->
		<!--<script src="/Public/Admin/assets/js/flot/jquery.flot.resize.min.js"></script>-->

		<!-- ace scripts -->

		<script src="/Public/Admin/assets/js/ace-elements.min.js"></script>
		<script src="/Public/Admin/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			$(".chosen-select").chosen();
			window.onload = function(){
				/*var windowH = $(document).outerHeight(true);
				var navH = $("#navbar").outerHeight(true);
				$(".main-content").height(windowH-navH);*/
			}
		</script>
		

	<!--<script>
		window.onload = function () {
			$("[href='/applefarm/enjoy/getorder.html']")[0].click();
			console.log(111);
		};
	</script>-->
</html>