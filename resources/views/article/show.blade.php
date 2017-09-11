@extends('layouts.base')

@section('head')
@endsection

@section('nav')
@endsection

@section('content')
    <article class="post clearfix" itemscope itemtype="http://schema.org/Article">
        <header class="post-header">
            <h1 class="entry-title">{{ $article->title }}</h1>
            <div class="post-date">
                &nbsp;&nbsp;<span class="tagcloud">{{get_category_name($article->category)}}</span>&nbsp;&nbsp;
                <time class="fa fa-calendar date" datetime="{{$article->created_at->format('c')}}"
                      itemprop="datePublished" pubdate=""> {{$article->created_at->format('d F , Y')}}
                </time>
                <span class="views fa fa-eye" itemprop="views"> {{ $article->view}} views</span>
            </div>
            <div class="clear"></div>
        </header>
        <br />
        <div class="post-content markdown-body" itemprop="articleBody">
            @if(!empty($article->thumb))
                <div class="thumb">
                    <img src="/uploads/{{ $article->thumb }}?imageMogr2/thumbnail/!75p"/>
                </div>
            @endif
            {!! $article->body !!}
            <div class="clear"></div>
        </div>
        <footer class="post-footer" itemprop="keywords">
            <li>
                {{--@foreach($article->tags as $tindex => $tag)--}}
                    {{--<i class="fa fa-tag"></i> <a href="{{ route('tags',[$tag->tags_flag]) }}" rel="tag">{{ $tag->tags_name }}</a>&nbsp;&nbsp;--}}
                {{--@endforeach--}}
            </li>
            <div class="clear"></div>
        </footer>
    </article>

    <div id="comment">
        <div class="comments-area">
            <div id="respond" class="comment-respond">
                <h3 id="reply-title" class="comment-reply-title">发表评论</h3>
                <div class="comment-form">
                    <form  id="commentform" action="{{ url('comment') }}" method="POST" class="comment-form">
                        {!! csrf_field() !!}
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <p class="comment-notes">
                            <span id="email-notes">电子邮件地址不会被公开。</span> 必填项已用<span class="required">*</span>标注
                        </p>
                        <p class="comment-form-author">
                            <label for="name">姓名 <span class="required">*</span></label>
                            <input name="nickname" id="name" value="" size="30" maxlength="245" aria-required="true" required="required" type="text"></p>
                        <p class="comment-form-email">
                            <label for="email">电子邮件 <span class="required">*</span></label>
                            <input  name="email" id="email" value="" size="30" maxlength="100" aria-describedby="email-notes" aria-required="true" required="required" type="text"></p>
                        <p class="comment-form-url">
                            <label for="url">站点</label>
                            <input name="website" id="url" value="" size="30" maxlength="200" type="text"></p>
                        <p class="mk-tips">Tips：暂不javascript语言 <a name="comment"></a></p>
                        <p class="comment-form-comment"><label for="markdown">评论</label>
                            <textarea name="content" id="newFormContent" cols="45" rows="8" maxlength="65525" aria-required="true" required="required"></textarea>
                        </p>
                        <p class="form-submit">
                            <button  type="submit"  id="submit" class="submit">发表评论</button>
                        </p>
                    </form>
                    <div class="commentPreview"></div>
                </div>
            </div>
            <div class="commentshow"><ol class="commentlist"></ol></div>
        </div>
    </div>

    <div class="conmments" >
        @foreach ($article->hasManyComments as $comment)

            <div class="one" style="border-top: solid 20px #efefef; padding: 5px 20px;">
                <div class="nickname icon-user" data="{{ $comment->nickname }}">
                    @if ($comment->website)
                       <a href="{{ $comment->website }}">
                            <h3 id="comment_{{$comment->id}}">{{ $comment->nickname }}</h3>
                        </a>
                    @else
                        <h3>{{ $comment->nickname }}</h3>
                    @endif
                    <h6>{{ $comment->created_at }}</h6>
                </div>
                <div class="content">
                    <p style="padding: 20px;">
                        {{ $comment->content }}
                    </p>
                </div>
                <div class="reply" style="text-align: right; padding: 5px;">
                    <a href="#new" onclick="reply({{$comment->id}});">回复</a>
                </div>
            </div>

        @endforeach

    </div>
    <script>
        function reply(obj) {
            var nickname = $('#comment_'+obj).html();
            $('#newFormContent').html('回复给'+nickname+':  ');
        }
    </script>
@endsection

@section('pager')
@endsection

@section('footer')
@endsection

@section('scripts')
    <script src="{{asset('js/app.js') }}"></script>

@endsection
