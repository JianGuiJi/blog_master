<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <title>登录页面</title>

    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/wangEditor.min.css">
    <script src="/js/lib/jquery-1.10.2.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/wangEditor.min.js"></script>
    <style>
        .item img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>请登录</h2>
            <form action="/login" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="exampleInputEmail1" class="sr-only">邮箱</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="邮箱" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="sr-only">密码</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="密码 8-16位" required>
                </div>

                <div class="checkbox"><label> <input type="checkbox" name="is_remember" value="1"> 记住我 </label></div>
                @include('layout.error')
                {{--<div class="form-group">--}}
                    {{--<button type="submit" class="btn btn-primary btn-lg btn-block">登录</button>--}}
                {{--</div>--}}
                <button type="submit" class="btn btn-primary btn-lg btn-block">登录</button>
                <a class="btn btn-primary btn-lg btn-block" href="/register">注册>></a>
            </form>
        </div>
    </div>

</div>


</body>
</html>