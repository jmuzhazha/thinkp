<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>cms管理后台</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="stylesheet" href="/thinkp/Public/css/amazeui.min.css">
    <link rel="stylesheet" href="/thinkp/Public/css/app.css">
</head>
<body>
<div class="am-g myapp-login">
    <div class="myapp-login-logo-block">
        <div class="myapp-login-logo-text">
            <div class="myapp-login-logo-text">
                cms<span>系统</span> <i class="am-icon-skyatlas"></i>

            </div>
        </div>

        <div class="login-font">
            <i>Log In </i> or <span> Sign Up</span>
        </div>
        <div class="am-u-sm-10 login-am-center">
            <form class="am-form">
                <fieldset>
                    <div class="am-form-group">
                        <input type="email" class="" id="doc-ipt-email-1" placeholder="用户名" name="username" onblur="login.check()">
                    </div>
                    <div class="am-form-group">
                        <input type="password" class="" id="doc-ipt-pwd-1" placeholder="密码" name="password" >
                    </div>
                    <p><button type="button" class="am-btn am-btn-default" onclick="login.check()">登陆</button></p>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<script src="/thinkp/Public/js/jquery.js"></script>
<script src="/thinkp/Public/js/dialog/layer.js"></script>
<script src="/thinkp/Public/js/dialog.js"></script>
<script src="/thinkp/Public/js/admin/login.js"></script>


</body>
</html>