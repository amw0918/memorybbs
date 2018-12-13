@extends('layouts.app')

@section('title', $topic->title)
@section('description', $topic->excerpt)

@section('content')

    <div class="row">

        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
            <div class="card card-default">
                <div class="card-body">
                    <div class="text-center">
                        作者：{{ $topic->user->nickname }}
                    </div>
                    <hr>
                    <div class="media">
                        <div align="center">
                            <a href="{{ route('users.show', $topic->user->id) }}">
                                <img class="thumbnail img-responsive" src="{{ $topic->user->avatar }}" width="200px"
                                     height="200px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content">
            <div class="card card-default">
                <div class="card-body">
                    <h1 class="text-center">
                        {{ $topic->title }}
                    </h1>

                    <div class="article-meta text-center">
                        {{ $topic->created_at->diffForHumans() }}
                        ⋅
                        评论： <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                        {{ $topic->reply_count }}

                        栏目：{{ $topic->category->name }}
                    </div>

                    <div class="topic-body">
                        {!! $topic->body !!}

                    </div>

                    @can('update',$topic)

                        <div class="operate">
                            <hr>
                            <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-default btn-xs"
                               role="button">
                                <i class="glyphicon glyphicon-edit"></i> 编辑
                            </a>
                            <form action="{{ route('topics.destroy', $topic->id) }}" method="post" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link" style="margin-left: 6px">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    删除
                                </button>
                            </form>
                        </div>
                    @endcan


                </div>
            </div>

            {{-- 用户回复列表 --}}
            <div class="card card-default topic-reply">
                <div class="card-body">
                    @includeWhen(Auth::check(),'topics._reply_box',['topic' => $topic])
                    @include('topics._reply_list', ['replies' => $topic->replies()->withCreated()->with('user')->get()])
                </div>
            </div>
        </div>
    </div>
@stop