<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-dns-prefetch-control" content="on" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="True"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="format-detection" content="address=no"/>
    <meta name="format-detection" content="email=no" />
    <title>@if(isset($category)){{$category->cate_name or ''}}栏目@elseif(isset($article)&&!isset($home)){{$article->title or ''}} @elseif(isset($articles)) 首页  @endif -- 兔小辉博客 V1.0</title>
    <meta name="keywords" content="{{option_info('keywords')}}" />
    <meta name="description" content="{{option_info('description')}}" />
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <![endif]-->
    @yield('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/ico" href="/favicon.ico">
</head>
<body>
<div id="app">
    <div id="header">
        <div class="header-content">
            <hgroup>
                <div class="avatar">
                    <a href="{{ url('/') }}"><img src="{{ asset('images/avatar.jpg') }}" alt="默认头像"></a>
                </div>
                <h1><a href="{{ url('/') }}">兔小辉博客 V1.0</a></h1>
                <div class="description">
                    <p>梦想还是要有的，万一实现了呢</p>
                </div>
            </hgroup>
            <div class="clear"></div>
            <nav class="nav-bar">
                <div class="menu-side-menu-container">
                    <ul id="menu-side-menu" class="menu">
                        <li class="menu-item"><a href="{{ url('/') }}">首页</a></li>
                        @include('widgets.navigation')
                        @yield('nav')
                    </ul>
                </div>
            </nav>
            <div class="clear"></div>
            <div class="social-icons" id="my-social">
                <a class="fa fa-weibo" href="" target="_blank" rel="nofollow">
                    <span class="hidden">Weibo</span>
                </a>
                <a class="fa fa-github" href="" target="_blank" rel="nofollow">
                    <span class="hidden">GitHub</span>
                </a>
                <a class="fa fa-google-plus" href="" target="_blank" rel="nofollow">
                    <span class="hidden">Google+</span>
                </a>
                <a class="fa fa-rss" href="" target="_blank">
                    <span class="hidden">feed</span>
                </a>
            </div>
        </div>
    </div>
    <!--article content-->
    <div id="content">
        <div class="content-main">
            @yield('content')
        </div>

        <div id="footer">
            <div class="footer-content">
                <div class="footer-border">
                    <p><a href="http://www.miitbeian.gov.cn" target="_blank" rel="nofollow">ICP：粤ICP备15022397号 </a></p>
                    <p>本站点采用Laravel 5.4 驱动，H-ui.admin后端框架， Mypersimmon前端界面</p>
                    <p>Coder by 兔小辉博客 V1.0 - CopyRight &copy; 2017</p>
                    @yield('footer')
                </div>
            </div>
        </div>

    </div>

    <div class="analytics hidden">
        <!-- tongji analytics code -->

    </div>
</div>
@yield('scripts')
</body>
</html>