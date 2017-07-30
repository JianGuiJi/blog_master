1)拷贝代码
2）.env 配置 数据库
3）创建表命令行下， 执行 php artisan migrate:install
 php artisan migrate
4) 若使用了Laravel 的搜索系统 Scout(elasticsearch https://www.elastic.co/cn/),先启动
   下载地址推荐：https://github.com/medcl/elasticsearch-rtf
5)测试环境， 可以使用 php artisan server[ --port=8899]
 其他web服务器 nginx /apache2

 常见错误：文件上传失败
 1) 排查php的一个扩展是否启用：extension=php_fileinfo.dll
2)临时文件存储目录是否有访问的权限  C:\Windows\Temp
