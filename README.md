# 个人博客-laravel5.5

## 目前进度

- 管理后台前端构架
- 管理后台登录、退出
- 管理后台标签管理

## 运行环境
- Nginx 1.8+
- PHP 7.1+
- Mysql 5.7+

## 开发环境部署/安装

#### 1.克隆源代码
    >git clone  git@github.com:ZQCard/laravel_blog.git

#### 2.部署LNMP环境
    1).新手推荐使用oneinstack一键环境安装
    2).nginx指向/path/laravel_blog/public
    3).chmod -R /path/laravel_blog/storage

#### 3.生成秘钥 
```
shell
$ php artisan key:generate
```
#### 4.配置env文件
```
shell
$ cp .env.example .env
$ vim .env to config your environment
```

#### 5.生成数据表以及测试数据
```
shell
$ php artisan migrate --seed
```

#### 6.链接入口
* 首页地址:http://www.yourdomain.com
* 管理后台:http://www.yourdomain.com/admin

    