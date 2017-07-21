@extends("layout.main")
@section("content")
    <div class="col-sm-8">
       <div class="alert alert-success" role="alert">
           符合条件：{{$query}} 的文章共{{$posts->total()}}条
       </div>
        {{--文章主体--}}
        <div>
            @foreach($posts as $post)
                <div class="blog-class">
                    <p><a style="font-size:18px; line-height:22px; height:22px;" href="/posts/{{$post->id}}"
                          target="_blank"><b>{{$post['title']}}</b></a></p>
                    <p class="">{{$post->created_at->toFormattedDateString()}}<span>：</span>
                        <a href="/posts">{{$post->user->name}}</a>
                    </p>
                    <p>
                        {!!str_limit($post->content,200,'...')!!}
                    </p>
                    <p class="blog-post-meta">赞 {{$post->zans_count}}  | 评论 {{$post->comments_count}}</p>
                </div>
            @endforeach

            {{$posts->links()}}

        </div>
    </div>
@endsection