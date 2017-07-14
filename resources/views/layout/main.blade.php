<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>文章本天成</title>

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

@include("layout.nav")

<div id="top"></div>
<div class="container" style="margin-top: 55px;">
    <!-- Stack the columns on mobile by making one full-width and the other half-width -->
    <div class="row">
        @yield("content")
        {{--侧边栏--}}
        @include("layout.sidebar")
    </div>

</div>
@include("layout.footer")

</body>
</html>