<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"D:\phpStudy\PHPTutorial\WWW\shop\public/../application/admin\view\cate\edit.htm";i:1571757030;s:70:"D:\phpStudy\PHPTutorial\WWW\shop\application\admin\view\common\top.htm";i:1571449400;s:71:"D:\phpStudy\PHPTutorial\WWW\shop\application\admin\view\common\left.htm";i:1571563193;}*/ ?>
<!DOCTYPE html>
<html><head>
	<meta charset="utf-8">
    <title>商城系统</title>
    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="/shop/public/static/admin/style/bootstrap.css" rel="stylesheet">
    <link href="/shop/public/static/admin/style/font-awesome.css" rel="stylesheet">
    <link href="/shop/public/static/admin/style/weather-icons.css" rel="stylesheet">
    <!--Beyond styles-->
    <link id="beyond-link" href="/shop/public/static/admin/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="/shop/public/static/admin/style/demo.css" rel="stylesheet">
    <link href="/shop/public/static/admin/style/typicons.css" rel="stylesheet">
    <link href="/shop/public/static/admin/style/animate.css" rel="stylesheet">
</head>
<body>
	<!-- 头部 -->
	
    <div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                            <img src="/shop/public/static/admin/images/logo.png" alt="">
                        </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="/shop/public/static/admin/images/head.png">
                                </div>
                                <section>
                                    <h2><span class="profile"><span>admin</span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="/admin/user/logout.html">
                                            退出登录
                                        </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="/admin/user/changePwd.html">
                                            修改密码
                                        </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>
	<!-- /头部 -->
	<div class="main-container container-fluid">
		<div class="page-container">
			            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Sidebar Menu -->
                  
<div class="sidebar-header-wrapper">
    <input class="searchinput" type="text">
    <i class="searchicon fa fa-search"></i>
    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
</div>
<ul class="nav sidebar-menu">
                    <!--Dashboard-->                  
        <li>
            <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-gear"></i>
            <span class="menu-text">商品管理</span>
            <i class="menu-expand"></i>
            </a>
                <ul class="submenu">
                    <li><a href="<?php echo url ('brand/lst'); ?>">
                        <span class="menu-text">商品列表</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                    <li><a href="#">
                        <span class="menu-text">添加商品</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                    <li><a href="#">
                        <span class="menu-text">商品分类</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                     <li><a href="<?php echo url ('brand/lst'); ?>">
                        <span class="menu-text">商品品牌</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                    <li><a href="#">
                        <span class="menu-text">商品类型</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                    <li><a href="#">
                        <span class="menu-text">商品回收站</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                </ul>                            
        </li>                        
 </ul>

 <ul class="nav sidebar-menu">
       <!--Dashboard-->                  
        <li>
            <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-gear"></i>
            <span class="menu-text">促销管理</span>
            <i class="menu-expand"></i>
            </a>
                <ul class="submenu">
                    <li><a href="#">
                        <span class="menu-text">团购活动</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                    <li><a href="#">
                        <span class="menu-text">积分商城</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                    <li><a href="#">
                        <span class="menu-text">优惠卷</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                   
                </ul>                            
        </li>                        
 </ul>

 <ul class="nav sidebar-menu">
       <!--Dashboard-->                  
        <li>
            <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-gear"></i>
            <span class="menu-text">订单管理</span>
            <i class="menu-expand"></i>
            </a>
                <ul class="submenu">
                    <li><a href="#">
                        <span class="menu-text">订单列表</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                    <li><a href="#">
                        <span class="menu-text">订单查询</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                </ul>                            
        </li>                        
 </ul>
 <ul class="nav sidebar-menu">
       <!--Dashboard-->                  
        <li>
            <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-gear"></i>
            <span class="menu-text">会员管理</span>
            <i class="menu-expand"></i>
            </a>
                <ul class="submenu">
                    <li><a href="#">
                        <span class="menu-text">会员列表</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                    <li><a href="#">
                        <span class="menu-text">会员等级</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                     <li><a href="#">
                        <span class="menu-text">会员留言</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                </ul>                            
        </li>                        
 </ul>
 <ul class="nav sidebar-menu">
       <!--Dashboard-->                  
        <li>
            <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-gear"></i>
            <span class="menu-text">权限管理</span>
            <i class="menu-expand"></i>
            </a>
                                          
        </li>                        
 </ul>
 <ul class="nav sidebar-menu">
       <!--Dashboard-->                  
        <li>
            <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-gear"></i>
            <span class="menu-text">系统设置</span>
            <i class="menu-expand"></i>
            </a>
                <ul class="submenu">
                    <li><a href="#">
                        <span class="menu-text">会员注册项设置</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                    <li><a href="#">
                        <span class="menu-text">支付方式设置</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                     <li><a href="#">
                        <span class="menu-text">会员留言</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                </ul>                            
        </li>                        
 </ul>
  <ul class="nav sidebar-menu">
       <!--Dashboard-->                  
        <li>
            <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-gear"></i>
            <span class="menu-text">文章模块</span>
            <i class="menu-expand"></i>
            </a>
                <ul class="submenu">
                    <li><a href="<?php echo url('cate/lst'); ?>">
                        <span class="menu-text">文章分类</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>

                    <li><a href="#">
                        <span class="menu-text">文章管理</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>

                </ul>                            
        </li>                        
 </ul>
 <ul class="nav sidebar-menu">
       <!--Dashboard-->                  
        <li>
            <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-gear"></i>
            <span class="menu-text">数据库管理</span>
            <i class="menu-expand"></i>
            </a>
                <ul class="submenu">
                    <li><a href="#">
                        <span class="menu-text">数据备份</span>
                        <i class="menu-expand"></i>
                        </a>
                    </li>
                </ul>                            
        </li>                        
 </ul>
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                    <li><a href="<?php echo url('index/index'); ?>">系统</a></li>
                    <li><a href="<?php echo url('cate/lst'); ?>"">文章管理</a></li>
                    <li class="active">修改文章</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Body -->
    <div class="page-body">
    <div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="widget">
    <div class="widget-header bordered-bottom bordered-blue">
    <span class="widget-caption">修改文章</span>
    </div>
        <div class="widget-body">
        <div id="horizontal-form">
        <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
             <input type="hidden" name="id" value="<?php echo $cates['id']; ?>">
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label no-padding-right">上级分类</label>
                <div class="col-sm-6">
                    <select class="form-control" name="pid" >
                        <option value="0">顶级分类</option>
                       <?php if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): $i = 0; $__LIST__ = $cateRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                        <option <?php if($cate['id'] == $cates['pid']): ?> selected="selected" <?php endif; ?> value="<?php echo $cates['id']; ?>"><?php echo str_repeat('-', $cate['level'] * 8); ?><?php echo $cate['cate_name']; ?></option>
                       <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <p class="help-block col-sm-4 red">* 必填</p>
            </div>
              <div class="form-group">
                <label for="username" class="col-sm-2 control-label no-padding-right" >分类名称</label>
                <div class="col-sm-6">
                    <input class="form-control"  placeholder="" value="<?php echo $cates['cate_name']; ?>" name="cate_name"required="" type="text">
                </div>
                <p class="help-block col-sm-4 red">* 必填</p>
            </div>
             <div class="form-group">
                <label for="username" class="col-sm-2 control-label no-padding-right">显示到导航</label>
                <div class="col-sm-6">
                 <div class="radio" style="float:left; padding-right:10px;">
                   <label>
                        <input name="show_nav" <?php if($cates['show_nav'] == 1): ?> checked="checked" <?php endif; ?> value="1" class="colored-blue" type="radio">
                        <span class="text">显示</span>
                    </label>
                </div>
                <div class="radio" style="float:left;">
                    <label>
                        <input name="show_nav"  <?php if($cates['show_nav'] == 0): ?> checked="checked" <?php endif; ?> value="0"  class="colored-blue" type="radio">
                        <span class="text">隐藏</span>
                    </label>
                </div>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-2 control-label no-padding-right">关键词</label>
                <div class="col-sm-6">
                   <textarea class="form-control" name="keywords" ><?php echo $cates['keywords']; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-2 control-label no-padding-right">文章描述</label>
                <div class="col-sm-6">
                   <textarea class="form-control" name="description" ><?php echo $cates['description']; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">保存信息</button>
                </div>
            </div>
           </form>
         </div>
       </div>
     </div>
  </div>
</div>
    </div>
                <!-- /Page Body -->
    </div>
            <!-- /Page Content -->
	</div>
	</div>
	    <!--Basic Scripts-->
    <script src="/shop/public/static/admin/style/jquery_002.js"></script>
    <script src="/shop/public/static/admin/style/bootstrap.js"></script>
    <script src="/shop/public/static/admin/style/jquery.js"></script>
    <!--Beyond Scripts-->
    <script src="/shop/public/static/admin/style/beyond.js"></script>
</body>
</html>
