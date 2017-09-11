@extends( 'layouts.app' )
@section( 'content' )
  <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span>
    资讯管理
    <span class="c-gray en">&gt;</span>
    文章分类
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
  </nav>
  <div class="page-container">
    <div class="text-c">
      <input type="text" name="" id="" placeholder="栏目名称、id" style="width:250px" class="input-text">
      <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		<a class="btn btn-primary radius" onclick="article_category_add('添加文章分类','{{ url('admin/articleCategory/create') }}')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加栏目</a>
		</span>
      <span class="r">共有数据：<strong><?php echo count($data) ?></strong> 条</span>
    </div>
    <div class="mt-20">
      <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
        <tr class="text-c">
          <th width="25"><input type="checkbox" name="" value=""></th>
          <th width="80">ID</th>
          <th>栏目名称</th>
          <th width="100">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $v)
          <tr class="text-c">
            <td><input type="checkbox" name="id[]" value="{{ $v['id'] }}"></td>
            <td>{{ $v['id'] }}</td>
            <td class="text-l">@if(!$v['ismain'])&nbsp;&nbsp;├─@endif{{ $v['cate_name'] }}</td>
            <td class="f-14"><a title="编辑" href="javascript:;" onclick="article_category_edit('栏目编辑','{{ url('admin/articleCategory/'.$v['id'].'/edit') }}','{{ $v['id'] }}')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
              <a title="删除" href="javascript:;" onclick="article_category_del(this,'{{ $v['id'] }}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!--请在下方写此页面业务相关的脚本-->
  <script type="text/javascript" src="{{ URL::asset('lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('lib/laypage/1.2/laypage.js')}}"></script>
  <script type="text/javascript">

    /*文章-栏目-添加*/
    function article_category_add(title,url,w,h){
      layer_show(title,url,w,h);
    }
    /*文章-栏目-编辑*/
    function article_category_edit(title,url,id,w,h){
      layer_show(title,url,w,h);
    }
    /*文章-栏目-删除*/
    function article_category_del(obj,id){
      layer.confirm('确认要删除吗？',function(index){
        $.ajax({
          type: 'POST',
          url: "{{ url('admin/articleCategory/') }}/"+id ,
          data: {"_token":'{{csrf_token()}}',"_method": 'delete' },
          dataType: 'json',
          success: function(data){
            if(data.status ==0){
              $(obj).parents("tr").remove();
              layer.msg(data.msg,{icon:1,time:2000});
            }else{
              layer.msg(data.msg,{icon:2,time:2000});
            }
          },
          error:function(data) {
            layer.msg(data.msg,{icon:2,time:2000});
          },
        });
      });
    }
  </script>
@endsection