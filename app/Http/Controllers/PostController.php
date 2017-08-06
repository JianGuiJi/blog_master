<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Zan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\Output\ProcOutputPager;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    //文章列表
    public function index(\Psr\Log\LoggerInterface $log)
    {
        //日志 依赖 注入类
//        \Log::info('post_index',['data'=>'this is index']);
        $log->info('post_index', ['data' => 'this is index']);


        $posts = Post::orderBy('created_at', 'desc')->withCount(['comments', 'zans'])->paginate(5);
//        return view("post/index", ['posts' => $posts]);
        return view("post/index", compact('posts'));
    }

    //文章详情
    public function show(Post $post)
    {
        $post->load('comments');//渲染之前加载评论信息
        return view("post/show", compact('post'));
    }

    //创建文章
    public function create()
    {
        return view("post/create");

    }

    //创建逻辑
    public function store()
    {
        //#####========= OK
//        $post = new Post();
//        $post->title = request('title');
//        $post->content = request('content');
//        $post->save();

//        $params = ['title' => request('title'), 'content' => request('content')];
//        $params = request(['title', 'content']);

        ##表单提交， 先数据验证 http://d.laravel-china.org/docs/5.4/validation
        $this->validate(request(), [
            'title' => 'required|string|min:1|max:100',
            'content' => 'required|string|min:10'
        ]);
        //逻辑
        ##开启事务
        DB::beginTransaction();
        $user_id = \Auth::id();
        $param = array_merge(request(['title', 'content']), compact('user_id'));

        $ret = Post::create($param); //Post内必须定义： protected $fillable=['title','content'];//可以使用数组注入字段
        if ($ret) {
            DB::commit();
            return redirect("/posts");//前端的URI:/posts(和view('/post/edit不是一个概念')) ;也可以返回html
        }

        return back()->withErrors('文章提交失败');
//        return \Redirect::back()->withErrors('邮箱密码不匹配');

    }

    //文章编辑
    public function edit(Post $post)
    {
        return view('/post/edit', compact('post'));
    }

    //编辑逻辑
    public function update(Post $post)
    {
        ##TODO 权限验证
        ## 验证
        ##表单提交， 先数据验证 http://d.laravel-china.org/docs/5.4/validation
        $this->validate(request(), [
            'title' => 'required|string|min:2|max:100',
            'content' => 'required|string|min:10'
        ]);
        ##权限验证
        $this->authorize('update', $post);

        ##逻辑
//        $post = new Post();
        $post->title = request('title');
        $post->content = request('content');
        $post->save();

        ##渲染
        return redirect("/posts/{$post->id}");
    }

    //删除文章
    public function delete(Post $post)
    {
        ##todo 权限验证
        $post->delete();
        return redirect('/posts');
    }


    public function imageUpload(Request $request)
    {

        //todo 系统文件配置 改成 选择 public驱动
        //D:\Projects\mylaravel54\config\filesystems.php
//         'default' => env('FILESYSTEM_DRIVER', 'public')

        //Storage::disk('local')->put('file.txt', 'Contents');
        if(false){
            $file = $request->file('wangEditorH5File');
            if ($file->isValid()) {
                # 原文件名
                $originalName = $file->getClientOriginalName();
                # 扩展名
                $ext = $file->getClientOriginalExtension();
                # 类型
                $type = $file->getClientMimeType();
                #临时绝对路径
                $realPath = $file->getRealPath();

                #文件命名：时间+唯一id+扩展
                $file_name = date('YmdHis') . '-' . uniqid() . $ext;

                ## 上传文件目录 需要配置 uploads 配置地址 D\config\filesystems.php
                # Storage::disk http://d.laravel-china.org/api/5.4/Illuminate/Filesystem/FilesystemAdapter.html#method_exists
//            dd(Storage::disk('uploads')->files($file_name));

//            $bool = Storage::disk('uploads')->putFile($file_name, $file); ##直接把上传的文件存储到指定path

                $bool = Storage::disk('uploads')->put($file_name, file_get_contents($realPath));

            }
        }

        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/' . $path);

    }

    //提交评论
    public function comment(Post $post)
    {
        //验证
        $this->validate(request(), [
            'content' => 'required|string|min:3'
        ]);
        //逻辑
        $comment = new Comment();
        $comment->user_id = \Auth::id();
        $comment->content = request('content');
        $post->comments()->save($comment);
        //渲染
        return back();
    }

    //赞
    public function zan(Post $post)
    {
        $param = [
            'user_id' => \Auth::id(),
            'post_id' => $post->id,
        ];
        Zan::firstOrCreate($param);
        return back();

    }

    //取消赞
    public function unzan(Post $post)
    {
        $post->zan(\Auth::id())->delete();
        return back();
    }

    //搜索页面
    public function search()
    {

        ##验证
        $this->validate(request(), [
            'query' => 'required'
        ]);

        ##逻辑
        $query = request('query');
        $posts = \App\Post::search($query)->paginate(2);

        ##渲染
        return view('post.search', compact('posts', 'query'));
//        return 'this is search';
    }


}
