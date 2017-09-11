@extends('layouts.base')

@section('head')
@endsection

@section('nav')
@endsection

@section('content')
    @foreach($articles as $article)
    <article class="post clearfix" itemscope >
        <header class="post-header">
            <h1 class="entry-title"><a href="{{ url('article/'.$article->id) }}" rel="bookmark">{{ $article->title or '' }}</a></h1>
            <div class="post-date">
                &nbsp;&nbsp;<span class="tagcloud">{{get_category_name($article->category)}}</span>&nbsp;&nbsp;
                <time class="fa fa-calendar date" datetime="{{$article->created_at->format('c')}}"
                      itemprop="datePublished" pubdate=""> {{$article->created_at->format('d F , Y')}}
                </time>
                <span class="views fa fa-eye" itemprop="views"> {{ $article->view}} views</span>

            </div>
            <div class="clear"></div>
        </header>
        <div class="post-content post-desc" itemprop="articleBody">
            <p>{{ get_description(strip_tags($article->body))}}</p>
            <p>[<a href="{{ url('article/'.$article->id) }}" rel="nofollow">阅读更多 →</a>]</p>
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
    @endforeach
    {{ $articles->links('partials.pager') }}
@endsection

@section('footer')
@endsection

@section('scripts')
@endsection
