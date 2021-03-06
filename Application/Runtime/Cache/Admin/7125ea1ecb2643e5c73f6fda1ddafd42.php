<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>sing后台管理平台</title>
    <!-- Bootstrap Core CSS -->
    <link href="/thinkp/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/thinkp/Public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/thinkp/Public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/thinkp/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/thinkp/Public/css/sing/common.css" />
    <link rel="stylesheet" href="/thinkp/Public/css/party/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="/thinkp/Public/css/party/uploadify.css">

    <!-- jQuery -->
    <script src="/thinkp/Public/js/jquery.js"></script>
    <script src="/thinkp/Public/js/bootstrap.min.js"></script>
    <script src="/thinkp/Public/js/dialog/layer.js"></script>
    <script src="/thinkp/Public/js/dialog.js"></script>
    <script type="text/javascript" src="/thinkp/Public/js/party/jquery.uploadify.js"></script>
    <script src = "/thinkp/Public/js/admin/common.js"></script>

</head>

    



<body>
<div id="wrapper">

  <?php
 $navs = D("Menu")->getAdminMenus(); $index = 'index'; ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    
    <a class="navbar-brand" style="color: red " >cms内容管理系统</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    
    
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['adminUser']['username']?> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="/thinkp/index.php?m=admin&c=admin&a=personal"><i class="fa fa-fw fa-user"></i> 个人中心</a>
        </li>
       
        <li class="divider"></li>
        <li>
          <a href="/thinkp/index.php?m=admin&c=login&a=loginout"><i class="fa fa-fw fa-power-off"></i> 退出</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav nav_list">
      <li <?php echo (getActive($index)); ?>>
        <a href="/thinkp/admin.php"><i class="fa fa-fw fa-dashboard"></i> 首页</a>
      </li>
      <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li <?php echo (getActive($nav["c"])); ?>>
        <a href="<?php echo (getAdminMenuUrl($nav)); ?>"><i class="fa fa-fw fa-bar-chart-o"></i> <?php echo ($nav["name"]); ?></a>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>

    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>
  <div id="page-wrapper">

	<div class="container-fluid">

	  <!-- Page Heading -->
	  <div class="row">
		<div class="col-lg-12">

		  <ol class="breadcrumb">
			<li>
			  <i class="fa fa-dashboard"></i>  <a href="/thinkp/admin.php?c=positioncontent">推荐位内容管理</a>
			</li>
			<li class="active">
			  <i class="fa fa-edit"></i> 添加推荐位内容
			</li>
		  </ol>
		</div>
	  </div>
	  <!-- /.row -->

	  <div class="row">
		<div class="col-lg-6">

		  <form class="form-horizontal" id="singcms-form">
			<div class="form-group">
			  <label for="inputname" class="col-sm-2 control-label">标题:</label>
			  <div class="col-sm-5">
				<input type="text" name="title" class="form-control" id="inputname" placeholder="请填写标题" value="<?php echo ($vo["title"]); ?>">
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputname" class="col-sm-2 control-label">选择推荐位:</label>
			  <div class="col-sm-5">
				<select class="form-control" name="position_id">

				  <?php if(is_array($positions)): foreach($positions as $key=>$position): ?><option value="<?php echo ($position["id"]); ?>" <?php if($position['id'] == $vo['position_id']): ?>selected="selected"<?php endif; ?>><?php echo ($position["name"]); ?></option><?php endforeach; endif; ?>
				</select>
			  </div>
			</div>

			<div class="form-group">
			  <label for="inputname" class="col-sm-2 control-label">缩图:</label>
			  <div class="col-sm-5">
				<input id="file_upload"  type="file" multiple="true" >
				<img style="display: none" id="upload_org_code_img" src="<?php echo ($vo["thumb"]); ?>" width="150" height="150">
				<input id="file_upload_image" name="thumb" type="hidden" multiple="true" value="<?php echo ($vo["thumb"]); ?>">
			  </div>
			</div>

			<div class="form-group">
			  <label for="inputPassword3" class="col-sm-2 control-label">url:</label>
			  <div class="col-sm-5">
				<input type="text" class="form-control" value="<?php echo ($vo["url"]); ?>" name="url" id="inputPassword3" placeholder="请url地址">
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputname" class="col-sm-2 control-label">文章id:</label>
			  <div class="col-sm-5">
				<input type="text" name="news_id" value="<?php echo ($vo["news_id"]); ?>" class="form-control" id="inputname" placeholder="如果和文章无关联的可以不添加文章id">
			  </div>
			</div>
			<div class="form-group">
			  <label for="inputPassword3" class="col-sm-2 control-label">状态:</label>
			  <div class="col-sm-5">
				<input type="radio" name="status" id="optionsRadiosInline1" value="1" <?php if($vo['status'] == 1): ?>checked<?php endif; ?>> 开启
				<input type="radio" name="status" id="optionsRadiosInline2" value="0" <?php if($vo['status'] == 0): ?>checked<?php endif; ?>> 关闭
			  </div>
			  <input type="hidden" name="id"  value="<?php echo ($vo["id"]); ?>"/>
			</div>

			<div class="form-group">
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="button" class="btn btn-default" id="singcms-button-submit">提交</button>
			  </div>
			</div>
		  </form>


		</div>

	  </div>
	  <!-- /.row -->

	</div>
	<!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->
</div>
<script>
  var SCOPE = {
	'save_url' : '/thinkp/admin.php?c=positioncontent&a=add',
	'jump_url' : '/thinkp/admin.php?c=positioncontent&a=index',
	'ajax_upload_image_url' : '/thinkp/admin.php?c=image&a=ajaxuploadimage',
	'ajax_upload_swf' : '/Public/js/party/uploadify.swf'
  };
  var thumb = "<?php echo ($vo["thumb"]); ?>";
  if(thumb) {
	$("#upload_org_code_img").show();
  }
</script>
<!-- /#wrapper -->
<script type="text/javascript" src="/thinkp/Public/js/admin/form.js"></script>
<script src="/thinkp/Public/js/admin/image.js"></script>
<script src="/thinkp/Public/js/admin/common.js"></script>



</body>

</html>