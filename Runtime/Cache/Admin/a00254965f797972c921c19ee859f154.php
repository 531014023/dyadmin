<?php if (!defined('THINK_PATH')) exit();?><html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台首页</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- basic styles -->
    <link href="/dyadmin/Public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/dyadmin/Public/assets/css/font-awesome.min.css">

    <!--[if IE 7]>
    <link rel="stylesheet" href="/dyadmin/Public/assets/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="/dyadmin/Public/assets/css/chosen.css">
    <link rel="stylesheet" href="/dyadmin/Public/assets/css/colorpicker.css">
    <!-- fonts -->

    <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" /> -->

    <!-- ace styles -->

    <link rel="stylesheet" href="/dyadmin/Public/assets/css/ace.min.css">
    <link rel="stylesheet" href="/dyadmin/Public/assets/css/ace-rtl.min.css">
    <link rel="stylesheet" href="/dyadmin/Public/assets/css/ace-skins.min.css">

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/dyadmin/Public/assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="/dyadmin/Public/assets/js/ace-extra.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="/dyadmin/Public/assets/js/html5shiv.js"></script>
    <script src="/dyadmin/Public/assets/js/respond.min.js"></script>
    <![endif]-->
    <style>
        html,body{height: 100%;}
        *{margin: 0;padding: 0;}
        .ace-nav{height: auto;}
        .main-content{min-height: inherit;}
        small{font-size: 90%;}
    </style>
</head>
<body>
<div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>
                    <i class="icon-leaf"></i>
                    dyadmin后台管理系统
                </small>
            </a><!-- /.brand -->
        </div><!-- /.navbar-header -->

        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<span class="user-info">
								<small>欢迎光临,</small>
								admin							</span>

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
<div class="main-container" id="main-container">
    <a class="menu-toggler" id="menu-toggler" href="#">
        <span class="menu-text"></span>
    </a>
    <div class="sidebar" id="sidebar">
        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
        </script>

        <ul class="nav nav-list">
            <li class="">
                <a href="javascript:iframe('index')">
                    <i class="icon-home"></i>
                    <span class="menu-text"> 首页 </span>
                </a>
            </li>

            <li class="">
                <a href="javascript:void(0)" class="dropdown-toggle">
                    <i class="icon-group"></i>
                    <span class="menu-text"> 用户管理 </span>

                    <b class="arrow icon-angle-down"></b>
                </a>

                <ul class="submenu">

                    <li class="">
                        <a href="javascript:iframe('userlist')">
                            <i class="icon-double-angle-right"></i>
                            用户列表
                        </a>
                    </li>
                    <li class="">
                        <a href="javascript:iframe('stoptrad')">
                            <i class="icon-double-angle-right"></i>
                            禁止交易
                        </a>
                    </li>
                    <li class="">
                        <a href="javascript:iframe('tradinfo')">
                            <i class="icon-double-angle-right"></i>
                            交易明细
                        </a>
                    </li>
                </ul>
            </li>

        </ul><!-- /.nav-list -->

        <div class="sidebar-collapse" id="sidebar-collapse">
            <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
        </div>

        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        </script>
    </div>
    <div class="main-content">
        <!-- <div style="clear: both;"></div> -->
        <iframe src="https://www.baidu.com" frameborder="0" width="100%" height="100%" id="iframe"></iframe>
    </div>
</div>


</body>
<!-- basic scripts -->

<!--[if !IE]> -->

<!-- <![endif]-->

<!--[if IE]>
<script src="https://cdn.bootcss.com/jquery/3.2.0/jquery.min.js"></script>
<![endif]-->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='/dyadmin/Public/assets/js/jquery-2.0.3.min.js'>"+"<"+"script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='/dyadmin/Public/assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='/dyadmin/Public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
</script>
<script src="/dyadmin/Public/assets/js/bootstrap.min.js"></script>
<script src="/dyadmin/Public/assets/js/typeahead-bs2.min.js"></script>

<!-- page specific plugin scripts -->
<script src="/dyadmin/Public/assets/js/chosen.jquery.min.js"></script>
<!--[if lte IE 8]>
<script src="/dyadmin/Public/assets/js/excanvas.min.js"></script>
<![endif]-->

<script src="/dyadmin/Public/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/dyadmin/Public/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="/dyadmin/Public/assets/js/jquery.slimscroll.min.js"></script>
<script src="/dyadmin/Public/assets/js/jquery.easy-pie-chart.min.js"></script>
<script src="/dyadmin/Public/assets/js/jquery.sparkline.min.js"></script>
<script src="/dyadmin/Public/assets/js/flot/jquery.flot.min.js"></script>
<script src="/dyadmin/Public/assets/js/flot/jquery.flot.pie.min.js"></script>
<script src="/dyadmin/Public/assets/js/flot/jquery.flot.resize.min.js"></script>

<!-- ace scripts -->

<script src="/dyadmin/Public/assets/js/ace-elements.min.js"></script>
<script src="/dyadmin/Public/assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    window.onload = function(){
        $(".chosen-select").chosen();
        var windowH = $(document.body).outerHeight(true);
        var navH = $("#navbar").outerHeight(true);
        $(".main-content").height(windowH-navH);
    }
</script>
<script>
    window.onload = function () {

    }
    function iframe(str) {
        switch (str){
            case 'index':
                $("#iframe").attr('src','https://dy.zetaluoxin.cn/index.php');
                break;
            case 'userlist':
                $("#iframe").attr("src","https://www.baidu.com");
                break;
        }
    }
</script>
</html>