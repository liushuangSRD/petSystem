<h1 align="center">
  <br>
  社区宠物平台
</h1>

# 简介

该平台采用的是前后端分离的架构，所以你至少需要熟悉 PHP 和 Vue。

服务端框架是基于 ThinkPHP5.1的，所以如果你比较熟悉ThinkPHP的开发模式，那将可以更好的使用本项目。但如果你并不熟悉ThinkPHP，我们认为也没有太大的关系，因为框架本身已经提供了一套完整的开发机制，你只需要在框架下用 PHP 来编写自己的业务代码即可。照葫芦画瓢应该就是这种感觉。

但前端不同，前端还是需要开发者比较熟悉 Vue 的。但我想以 Vue 在国内的普及程度，绝大多数的开发者是没有问题的。这也正是我们选择 Vue 作为前端框架的原因

# 快速开始

## Server 端必备环境

* 安装MySQL（version： 5.7+）

* 安装PHP环境(version： 7.1+)


## 安装依赖包

执行命令前请确保你已经安装了composer工具

```bash
# 进入项目根目录
cd petSystem
# 先执行以下命令，全局替换composer源，解决墙的问题
composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
# 接着执行以下命令安装依赖包
composer install
```

## 数据库配置

该平台需要你自己在 MySQL 中新建一个数据库，名字由你自己决定。例如，新建一个名为` lin-cms `的数据库。接着，我们需要在工程中进行一项简单的配置。使用编辑器打开 Lin 工程根目录下``/config/database.php``，找到如下配置项：

```php
// 服务器地址
  'hostname'        => '',
// 数据库名
  'database'        => 'lin-cms',
// 用户名
  'username'        => 'root',
// 密码
  'password'        => '',
  
  //省略后面一堆的配置项
```

**请务必根据自己的实际情况修改此配置项**

## 导入数据

接下来使用你本机上任意一款数据库可视化工具，为已经创建好的`lin-cms`数据库运行petSystem根目录下的`schema.sql`文件，这个SQL脚本文件将为为你生成一些基础的数据库表和数据。

## 运行

如果前面的过程一切顺利，项目所需的准备工作就已经全部完成，这时候你就可以试着让工程运行起来了。在工程的根目录打开命令行，输入：

```bash
php think run --port 5000 //启动thinkPHP内置的Web服务器
```

启动成功后会看到如下提示：

```php
ThinkPHP Development server is started On <http://127.0.0.1:5000/>
You can exit with `CTRL-C`
```

打开浏览器，访问``http://127.0.0.1:5000``，你会看到一个欢迎界面

## 前端仓库链接

https://github.com/liushuangSRD/pet_system_vue.git
