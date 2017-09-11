@extends('layouts.app')
@section('content')
  <div class="page-container">
    <form action="{{ url('admin/articleCategory/'.$data['id']) }}" method="POST"  class="form form-horizontal" id="form-category-edit">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}
      <div id="tab-category" class="HuiTab">
        <div class="tabBar cl">
          <span>基本设置</span>
        </div>
        <div class="tabCon">
          <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">
              <span class="c-red">*</span>
              上级栏目：</label>
            <div class="formControls col-xs-8 col-sm-9">
                         <span class="select-box">
                         <select class="select" id="pid" name="pid">
                           <option value="0">顶级分类</option>
                           @foreach($category as $key=>$value)
                             <option value="{{$value->id}}" @if( $data->pid ==$value->id) selected @endif>{{$value->cate_name}}</option>
                           @endforeach
                         </select>
                         </span>
            </div>
            <div class="col-3">
            </div>
          </div>
          <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">
              <span class="c-red">*</span>
              分类名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
              <input type="text" class="input-text" value="{{$data['cate_name']}}" placeholder="" id="" name="cate_name">
            </div>
            <div class="col-3">
            </div>
          </div>
          <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">排序：</label>
            <div class="formControls col-xs-8 col-sm-9">
              <input type="text" class="input-text" value="{{$data['order']}}" placeholder="" id="order" name="order">
            </div>
            <div class="col-3">
            </div>
          </div>
          <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">链接：</label>
            <div class="formControls col-xs-8 col-sm-9">
              <input type="text" class="input-text" value="{{$data['url']}}" placeholder="" id="url" name="url">
            </div>
            <div class="col-3">
            </div>
          </div>
          <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">关键词：</label>
            <div class="formControls col-xs-8 col-sm-9">
              <input type="text" class="input-text" value="{{$data['keywords']}}" name="keywords">
            </div>
            <div class="col-3">
            </div>
          </div>
          <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">描述：</label>
            <div class="formControls col-xs-8 col-sm-9">
              <textarea name="description" cols="" rows="2" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,100)">{{$data['description']}}</textarea>
              <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
            </div>
            <div class="col-3">
            </div>
          </div>
        </div>
        <div class="row cl">
          <div class="col-9 col-offset-3">
            <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
          </div>
        </div>
    </form>
  </div>

  <!--请在下方写此页面业务相关的脚本-->
  <script type="text/javascript" src="{{ URL::asset('lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('lib/jquery.validation/1.14.0/jquery.validate.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('lib/jquery.validation/1.14.0/validate-methods.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('lib/jquery.validation/1.14.0/messages_zh.js')}}"></script>
  <script type="text/javascript">
    $(function(){
      $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
      });

      $("#tab-category").Huitab({
        index:0
      });
      $("#form-category-edit").validate({
        rules:{
          pid : "required",
          cate_name : "required"
        },
        onkeyup:false,
        focusCleanup:true,
        submitHandler:function(form){
          $(form).ajaxSubmit({
            type: 'post',
            dataType: "json",
            url: "{{ url('admin/articleCategory/'.$data['id']) }}",
            success: function(data){
              layer.msg(data.msg, {icon:1,time:1000}, function(){
                var index = parent.layer.getFrameIndex(window.name);
                parent.location.reload(); //刷新父页面
                parent.layer.close(index);
              });
            },
            error: function(XmlHttpRequest, textStatus, errorThrown){
              layer.msg(data.msg,{icon:2,time:1000});
            }
          });
        }
      });
    });
  </script>
@endsection