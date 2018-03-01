cd /home/vagrant/Code/github/blog
#建表
php artisan migrate:install
php artisan migrate


#创建elasticSearch索引（前提已开启elasticSearch）
php artisan es:init

http://blog.test/

##二维码生成
https://github.com/endroid/qr-code

