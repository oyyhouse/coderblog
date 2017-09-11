<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <script type="text/javascript" src="{{ URL::asset('lib/jquery/1.9.1/jquery.min.js') }}"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ URL::asset('lib/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('lib/respond.min.js') }}"></script>
    <![endif]-->
    <link href="{{ URL::asset('css/H-ui.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('backend/css/H-ui.admin.css')}}" rel="stylesheet" type="text/css">
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
    <meta name="description" content="兔小辉博客">
</head>

<body>

    <script type="text/javascript" src="{{ URL::asset('lib/layer/2.4/layer.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/H-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('backend/js/H-ui.admin.js') }}"></script>
    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{ URL::asset('lib/jquery.contextmenu/jquery.contextmenu.r2.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            /*$("#min_title_list li").contextMenu('Huiadminmenu', {
             bindings: {
             'closethis': function(t) {
             console.log(t);
             if(t.find("i")){
             t.find("i").trigger("click");
             }
             },
             'closeall': function(t) {
             alert('Trigger was '+t.id+'\nAction was Email');
             },
             }
             });*/


            $("body").Huitab({
                tabBar:".navbar-wrapper .navbar-levelone",
                tabCon:".Hui-aside .menu_dropdown",
                className:"current",
                index:0,
            });
        });
        /*个人信息*/
        function myselfinfo(){
            layer.open({
                type: 1,
                area: ['300px','200px'],
                fix: false, //不固定
                maxmin: true,
                shade:0.4,
                title: '查看信息',
                content: '<div>管理员信息</div>'
            });
        }

        /*资讯-添加*/
        function article_add(title,url){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }
        /*图片-添加*/
        function picture_add(title,url){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }
        /*产品-添加*/
        function product_add(title,url){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }
        /*用户-添加*/
        function member_add(title,url,w,h){
            layer_show(title,url,w,h);
        }

    </script>

    @yield('content')
</body>
</html>
