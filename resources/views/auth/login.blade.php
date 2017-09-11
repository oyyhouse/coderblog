<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ URL::asset('lib/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('lib/respond.min.js') }}"></script>
    <![endif]-->
    <link href="{{ URL::asset('css/H-ui.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('backend/css/H-ui.admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('backend/css/H-ui.login.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('backend/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('backend/skin/default/skin.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('lib/Hui-iconfont/1.0.8/iconfont.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{ URL::asset('js/H-ui.js') }}"></script>

    <!--[if IE 6]>
    <script type="text/javascript" src="{{ URL::asset('lib/DD_belatedPNG_0.0.8a-min.js') }}" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->

    <title>兔小辉博客 - 后台登录</title>
    <meta name="keywords" content="兔小辉博客">
    <meta name="description" content="兔小辉博客"></head>
<body>

<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"><a class="webtitle" href="{{ url('/') }}">兔小辉博客</a> - 后台管理系统 </div>
<div class="loginWraper">
    <div id="loginform" class="loginBox">
        <form class="form form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="row cl {{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                <div class="formControls col-xs-7">
                    <input id="email" type="email"  name="email" placeholder="账户" class="input-text size-L" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row cl {{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                <div class="formControls col-xs-7">
                    <input id="password" name="password"  type="password" placeholder="密码" class="input-text size-L" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
           <div class="row cl">
                <label class="form-label  col-xs-3"><i class="Hui-iconfont">&#xe6b6;</i></label>
                <div class="formControls col-xs-8 ">
                    <input id="code" class="input-text size-L" type="text" placeholder="验证码"  name="code" style="width:150px;" required>&nbsp;&nbsp;
                    <img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?'+Math.random()" title="看不清，换一张">
                    @if ($errors->has('code'))
                          <span class="help-block">
                               <font color="red"><strong>{{ $errors->first('code') }}</strong></font>
                          </span>
                    @endif
                </div>
           </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <label for="online">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        使我保持登录状态&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <label for="online">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            忘记密码？
                        </a></label>
                </div>
            </div>
            <div class="row cl">

                <div class="formControls col-xs-8 col-xs-offset-3">
                    <button type="submit"  class="btn btn-success radius size-L" >&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;</button>
                    <button type="reset" class="btn btn-default radius size-L">&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;</button>
                </div>
            </div>

        </form>
    </div>
</div>
<div class="footer">Copyright 深圳信仁网络科技 by 兔小辉博客 v1.0</div>
<script type="text/javascript" src="{{ URL::asset('lib/jquery/1.9.1/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/H-ui.min.js') }}"></script>
</body>
</html>



