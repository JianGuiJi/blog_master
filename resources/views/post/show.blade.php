@extends("layout.main")
@section("content")
    <div class="col-sm-8">
        <div class="blog-class">
            <p><a style="font-size:18px; line-height:22px; height:22px;" href="/posts/{{$post->id}}"
                  target="_blank"><b>{{$post['title']}}</b></a>
                @can('update', $post)
                <a title="编辑文章" href="/posts/{{$post->id}}/edit" target="_self"><i class="glyphicon glyphicon-edit"></i></a>
                @endcan

                @can('delete', $post)
                <a title="删除文章" href="/posts/{{$post->id}}/delete"><i class="glyphicon glyphicon-trash"></i></a>
                @endcan
            </p>
            <p class=""><a href="#"
                           title="http://carbon.nesbot.com/docs/#api-isset">{{$post->created_at->toFormattedDateString()}}</a><span>：</span>
                <a href="/posts">{{$post->user->name}}</a>
            </p>
            <div class="">
                {!!$post->content!!}
                {{--                <p title="{{$post->content}}">{{$post->content}}</p>--}}
            </div>
            <div>
                @if($post->zan(\Auth::id())->exists())
                    <a href="/posts/{{$post->id}}/unzan" type="button" class="btn btn-default btn-lg">取消赞</a>
                @else
                    <a href="/posts/{{$post->id}}/zan" type="button" class="btn btn-primary btn-lg">赞</a>
                @endif
            </div>
        </div>

        {{--评论区--}}
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">评论</div>

            <!-- List group -->
            <ul class="list-group">
                @foreach($post->comments as $comment)
                    <li class="list-group-item">
                        <h5>{{$comment->created_at}} by {{$comment->user->name}}</h5>
                        <div>
                            {{$comment->content}}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">发表评论</div>

            <!-- List group -->
            <ul class="list-group">
                <form action="/posts/{{$post->id}}/comment" method="post">
                    {{csrf_field()}}
                    {{--<input type="hidden" name="_token" value="YKpEszIdUEAx7E6Ysiy6pYs77LJ3Kb6p4T4XMZtV">--}}
                    {{--<input type="hidden" name="post_id" value="81"/>--}}
                    <li class="list-group-item">
                        <textarea name="content" class="form-control" rows="10" placeholder="至少3个字符"></textarea>
                        @include('layout.error')
                        <button class="btn btn-default" type="submit">提交</button>
                    </li>

                </form>

            </ul>
        </div>

    </div>
@endsection