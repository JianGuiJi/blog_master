<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    //
    protected $tomail = '378823123@qq.com';

    public function send()
    {
        $name = '学院君';
        $flag = Mail::send('测试邮件', ['name' => $name], function ($message) {
            $to = '378823123@qq.com';
            $message->to($to)->subject('测试邮件');
        });
        if ($flag) {
            echo '发送邮件成功，请查收！';
        } else {
            echo '发送邮件失败，请重试！';
        }
    }

    public function mail()
    {
        Mail::raw('这是一封测试邮件', function ($message) {
            $to = '378823123@qq.com';
            $message->from('15868921868@163.com','JJG')->to($to)->subject('测试邮件');
        });
    }

    public function sendAttach()
    {
        $name = '学院君';
        $imgPath = 'http://laravelacademy.org/wp-statics/images/carousel/LaravelAcademy.jpg';
        $flag = Mail::send('emails.test',['name'=>$name,'imgPath'=>$imgPath],function($message){
            $to = '1072155122@qq.com';
            $message->to($to)->subject('测试邮件');

            $attachment = storage_path('app/files/test.doc');
            //在邮件中上传附件
            $message->attach($attachment,['as'=>"=?UTF-8?B?".base64_encode('测试文档')."?=.doc"]);
        });
    }
}
