@extends("layout.main")
@section("content")
    <div class="col-sm-8">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{asset("/images/carousel/m1.jpg")}}" alt="...">
                    <div class="carousel-caption">
                        美女1号
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset("/images/carousel/m2.jpg")}}" alt="...">
                    <div class="carousel-caption">
                        美女2号
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset("/images/carousel/m4.jpg")}}" alt="...">
                    <div class="carousel-caption">
                        美女4号
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset("/images/carousel/m6.jpg")}}" alt="...">
                    <div class="carousel-caption">
                        美女6号
                    </div>
                </div>

            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        {{--文章主体--}}
        <div style="margin-top:20px;">
            @foreach($posts as $post)
                <div class="blog-class">
                    <p><a style="font-size:18px; line-height:22px; height:22px;" href="/posts/{{$post->id}}"
                          target="_blank"><b>{{$post['title']}}</b></a></p>
                    <p class=""><a href="#"
                                   title="http://carbon.nesbot.com/docs/#api-isset">{{$post->created_at->toFormattedDateString()}}</a><span>：</span>
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