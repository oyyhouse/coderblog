@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">编辑修改</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>修改失败</strong> 输入不符合要求<br><br>
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                    @endif

                    <form action="{{ url('admin/comment/'.$comments->id) }}" method="POST">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="comment_id" value="{{ $comments->id }}">
                        <div class="form-group">
                            <label>Nickname</label>
                            <input type="text" name="nickname" class="form-control" style="width: 300px;" required="required" value="{{ $comments->nickname }}">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" style="width: 300px;" value="{{ $comments->email }}">
                        </div>
                        <div class="form-group">
                            <label>Home page</label>
                            <input type="text" name="website" class="form-control" style="width: 300px;" value="{{ $comments->website }}">
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required">{{ $comments->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection