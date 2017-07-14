@extends("layout.main")
@section("content")
    <div class="col-sm-8">
        <form action="/posts/{{$post->id}}" method="POST">
            {{method_field('PUT')}}
            {{ csrf_field() }}
            {{--<input name="_token" value="{{csrf_token()}}" type="hidden">--}}
            <div class="form-group">
                <label>标题</label>
                <input name="title" class="form-control" placeholder="这里是标题" type="text" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label>内容</label>
                <textarea id="content" style="height:400px;max-height:500px;" name="content" class="form-control"
                          placeholder="这里是内容">
                    {!!$post->content!!}
                </textarea>

            </div>

            @include('layout.error')
            <button type="submit" class="btn btn-default">提交</button>
        </form>
    </div>



    {{--<script type="text/javascript" src="/js/lib/jquery-1.10.2.min.js"></script>--}}
    {{--<script type="text/javascript" src="/js/wangEditor.min.js"></script>--}}
    {{--https://github.com/wangfupeng1988/wangEditor/tree/v2.1.23--}}
    <script type="text/javascript">
        $(function () {
            var editor = new wangEditor('content');
            //配置图片上传的功能
            //https://www.kancloud.cn/wangfupeng/wangeditor2/113992
            editor.config.uploadImgUrl = '/posts/image/upload';
            // 设置 headers（举例）
            editor.config.uploadHeaders = {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            };

            editor.create();
        });
    </script>
@endsection
