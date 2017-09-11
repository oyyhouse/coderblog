@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">评论管理</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <caption>评论列表</caption>
                            <thead>
                            <tr>
                                <th>Comment</th>
                                <th>User</th>
                                <th>Article_id</th>
                                <th>时间</th>
                                <th>编辑</th>
                                <th>删除</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->content }}</td>
                                <td>{{ $comment->nickname }}--{{ $comment->email }}--{{ $comment->website }}</td>
                                <td>{{ $comment->article_id }}</td>
                                <td>{{ $comment->created_at }}</td>
                                <td> <a href="{{ url('admin/comment/'.$comment->id.'/edit') }}" class="btn btn-success">编辑</a></td>
                                <td> <form action="{{ url('admin/comment/'.$comment->id) }}" method="POST" style="display: inline;">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">删除</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection