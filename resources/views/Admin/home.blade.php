@extends('layouts.app')
@section('content')
    <!--_header -->
    <header class="navbar-wrapper">
        <div class="navbar navbar-fixed-top">
            <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/">兔小辉博客</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/"></a>
                <span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span>
                <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
                <nav class="nav navbar-nav">
                    <ul class="cl">
                        <li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
                            <ul class="dropDown-menu menu radius box-shadow">
                                <li><a href="javascript:;" data-title="添加资讯" data-href="{{ url('admin/article/create') }}" onclick="Hui_admin_tab(this)"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
                                <li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
                                <li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
                                <li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
                            </ul>
                        <li class="navbar-levelone current"><a href="javascript:;">平台</a></li>
                        <li class="navbar-levelone"><a href="javascript:;">商城</a></li>
                        <li class="navbar-levelone"><a href="javascript:;">财务</a></li>
                        <li class="navbar-levelone"><a href="javascript:;">手机</a></li>
                        </li>
                    </ul>
                </nav>
                <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                    <ul class="cl">
                        <!-- Authentication Links -->
                        @if (!Auth::guest())
                            <li>{{ Auth::user()->name }}</li>
                            <li class="dropDown dropDown_hover">
                                <a href="#" class="dropDown_A">管理员 <i class="Hui-iconfont">&#xe6d5;</i></a>
                                <ul class="dropDown-menu menu radius box-shadow">
                                    <li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
                                    <li><a href="#">切换账户</a></li>
                                    <li><form action="{{ url('/logout') }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">退出</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
                        @endif

                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!--_header -->

    <!--_menu  -->
    <aside class="Hui-aside">
        <div class="menu_dropdown bk_2">
            <dl id="menu-article">
                <dt><i class="Hui-iconfont">&#xe616;</i> 资讯管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="{{ url('admin/article') }}" data-title="文章管理" href="javascript:void(0)">文章管理</a></li>
                        <li><a data-href="{{ url('admin/articleCategory') }}" data-title="文章分类" href="javascript:void(0)">文章分类</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-picture">
                <dt><i class="Hui-iconfont">&#xe613;</i> 图片管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="{{ url('admin/picture') }}" data-title="图片管理" href="javascript:void(0)">图片管理</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-product">
                <dt><i class="Hui-iconfont">&#xe620;</i> 产品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="{{ url('admin/product/product_brand') }}" data-title="品牌管理" href="javascript:void(0)">品牌管理</a></li>
                        <li><a data-href="{{ url('admin/product/product_category') }}" data-title="分类管理" href="javascript:void(0)">分类管理</a></li>
                        <li><a data-href="{{ url('admin/product/product_list') }}" data-title="产品管理" href="javascript:void(0)">产品管理</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-comments">
                <dt><i class="Hui-iconfont">&#xe622;</i> 评论管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="{{ url('admin/comment') }}" data-title="评论列表" href="javascript:;">评论列表</a></li>
                        <li><a data-href="{{ url('admin/feedback') }}" data-title="意见反馈" href="javascript:void(0)">意见反馈</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-member">
                <dt><i class="Hui-iconfont">&#xe60d;</i> 会员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="member-list.html" data-title="会员列表" href="javascript:;">会员列表</a></li>
                        <li><a data-href="member-del.html" data-title="删除的会员" href="javascript:;">删除的会员</a></li>
                        <li><a data-href="member-level.html" data-title="等级管理" href="javascript:;">等级管理</a></li>
                        <li><a data-href="member-scoreoperation.html" data-title="积分管理" href="javascript:;">积分管理</a></li>
                        <li><a data-href="member-record-browse.html" data-title="浏览记录" href="javascript:void(0)">浏览记录</a></li>
                        <li><a data-href="member-record-download.html" data-title="下载记录" href="javascript:void(0)">下载记录</a></li>
                        <li><a data-href="member-record-share.html" data-title="分享记录" href="javascript:void(0)">分享记录</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-admin">
                <dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="admin-role.html" data-title="角色管理" href="javascript:void(0)">角色管理</a></li>
                        <li><a data-href="admin-permission.html" data-title="权限管理" href="javascript:void(0)">权限管理</a></li>
                        <li><a data-href="admin-list.html" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-tongji">
                <dt><i class="Hui-iconfont">&#xe61a;</i> 系统统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="charts-1.html" data-title="折线图" href="javascript:void(0)">折线图</a></li>
                        <li><a data-href="charts-2.html" data-title="时间轴折线图" href="javascript:void(0)">时间轴折线图</a></li>
                        <li><a data-href="charts-3.html" data-title="区域图" href="javascript:void(0)">区域图</a></li>
                        <li><a data-href="charts-4.html" data-title="柱状图" href="javascript:void(0)">柱状图</a></li>
                        <li><a data-href="charts-5.html" data-title="饼状图" href="javascript:void(0)">饼状图</a></li>
                        <li><a data-href="charts-6.html" data-title="3D柱状图" href="javascript:void(0)">3D柱状图</a></li>
                        <li><a data-href="charts-7.html" data-title="3D饼状图" href="javascript:void(0)">3D饼状图</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-system">
                <dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="system-base.html" data-title="系统设置" href="javascript:void(0)">系统设置</a></li>
                        <li><a data-href="system-category.html" data-title="栏目管理" href="javascript:void(0)">栏目管理</a></li>
                        <li><a data-href="system-data.html" data-title="数据字典" href="javascript:void(0)">数据字典</a></li>
                        <li><a data-href="system-shielding.html" data-title="屏蔽词" href="javascript:void(0)">屏蔽词</a></li>
                        <li><a data-href="system-log.html" data-title="系统日志" href="javascript:void(0)">系统日志</a></li>
                    </ul>
                </dd>
            </dl>
        </div>

        <div class="menu_dropdown bk_2" style="display:none">
            <dl id="menu-aaaaa">
                <dt><i class="Hui-iconfont">&#xe616;</i> 二级导航1<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="article-list.html" data-title="资讯管理" href="javascript:void(0)">三级导航</a></li>
                    </ul>
                </dd>
            </dl>
        </div>

        <div class="menu_dropdown bk_2" style="display:none">
            <dl id="menu-bbbbb">
                <dt><i class="Hui-iconfont">&#xe616;</i> 二级导航2<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="article-list.html" data-title="资讯管理" href="javascript:void(0)">三级导航</a></li>
                    </ul>
                </dd>
            </dl>
        </div>

        <div class="menu_dropdown bk_2" style="display:none">
            <dl id="menu-ccccc">
                <dt><i class="Hui-iconfont">&#xe616;</i> 二级导航3<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="article-list.html" data-title="资讯管理" href="javascript:void(0)">三级导航</a></li>
                    </ul>
                </dd>
            </dl>
        </div>

    </aside>
    <div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
    <!--_menu  -->

    <!--_content  -->
    <section class="Hui-article-box">
            <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
                <div class="Hui-tabNav-wp">
                    <ul id="min_title_list" class="acrossTab cl">
                        <li class="active">
                            <span title="我的桌面" data-href="">我的桌面</span>
                            <em></em></li>
                    </ul>
                </div>
                <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
            </div>
            <div id="iframe_box" class="Hui-article">
                <div class="show_iframe">
                    <div style="display:none" class="loading"></div>
                    <iframe scrolling="yes" frameborder="0" src="{{url('admin/dashboard')}}" width="100%" height="100%" name="main"></iframe>
                </div>
            </div>
        </section>

        <div class="contextMenu" id="Huiadminmenu">
            <ul>
                <li id="closethis">关闭当前 </li>
                <li id="closeall">关闭全部 </li>
            </ul>
        </div>
    <!--_content  -->

    <!--_footer-->
    <footer class="footer mt-20">
        <div class="container">
            <p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br>
                Copyright &copy;2015-2017 H-ui.admin v3.1 All Rights Reserved.<br>
                本后台系统由<a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>
        </div>
    </footer>
    <!--/_footer -->
@endsection


