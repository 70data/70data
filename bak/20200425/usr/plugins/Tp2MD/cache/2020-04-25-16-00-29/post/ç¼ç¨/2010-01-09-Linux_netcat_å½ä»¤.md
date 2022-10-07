---
layout: post
cid: 1341
title: Linux netcat 命令
slug: 1341
date: 2010/01/09 22:10:00
updated: 2020/03/15 11:20:35
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Linux
---


netcat 或者叫 nc 是 Linux 下的一个用于调试和检查网络工具包。
可用于创建 TCP/IP 连接，最大的用途就是用来处理 TCP/UDP 套接字。
这里我们将通过一些实例来学习 netcat 命令。
1.在服务器-客户端架构上使用 netcat
netcat 工具可运行于服务器模式，侦听指定端口

    $ nc -l 2389

然后你可以使用客户端模式来连接到 2389 端口：

    $ nc localhost 2389

现在如果你输入一些文本，它将被发送到服务器端：

    $ nc localhost 2389
    HI, 70data

在服务器的终端窗口将会显示下面内容：

    $ nc -l 2389
    HI, 70data

<!--more-->

2.使用 netcat 来传输文件
netcat 工具还可用来传输文件，在客户端，假设我们有一个 testfile 文件：

    $ cattestfile
    hello 70data

而在服务器端有一个空文件名为 test
然后我们使用如下命令来启用服务器端：

    $ nc -l 2389 > test

紧接着运行客户端：

    cattestfile | nc localhost 2389

然后你停止服务器端，你可以查看 test 内容就是刚才客户端传过来的 testfile 文件的内容：

    $ cattest
    hello 70data

3.netcat 支持超时控制
多数情况我们不希望连接一直保持，那么我们可以使用 -w 参数来指定连接的空闲超时时间，该参数紧接一个数值，代表秒数，如果连接超过指定时间则连接会被终止。
服务器:

    nc -l 2389

客户端:

    $ nc -w 10 localhost 2389

该连接将在 10 秒后中断。
注意:不要在服务器端同时使用 -w 和 -l 参数，因为 -w 参数将在服务器端无效果。
4.netcat 支持 IPv6
netcat 的 -4 和 -6 参数用来指定 IP 地址类型，分别是 IPv4 和 IPv6：
服务器端：

    $ nc -4 -l 2389

客户端：

    $ nc -4 localhost 2389

然后我们可以使用 netcat 命令来查看网络的情况：

    $ netstat| grep2389
    tcp        0      0 localhost:2389          localhost:50851         ESTABLISHED
    tcp        0      0 localhost:50851         localhost:2389          ESTABLISHED

接下来我们看看 IPv6 的情况：
服务器端：

    $ nc -6 -l 2389

客户端：

    $ nc -6 localhost 2389

再次运行 netcat 命令：

    $ netstat| grep2389
    tcp6       0      0 localhost:2389          localhost:33234         ESTABLISHED
    tcp6       0      0 localhost:33234         localhost:2389          ESTABLISHED

前缀是 tcp6 表示使用的是 IPv6 的地址。
5.在 netcat 中禁止从标准输入中读取数据
该功能使用 -d 参数，请看下面例子：
服务器端：

    $ nc -l 2389

客户端：

    $ nc -d localhost 2389
    Hi

你输入的 Hi 文本并不会送到服务器端。
6.强制 netcat 服务器端保持启动状态
如果连接到服务器的客户端断开连接，那么服务器端也会跟着退出。
服务器端：

    $ nc -l 2389

客户端：

    $ nc localhost 2389

服务器端：

    $ nc -l 2389

上述例子中，但客户端断开时服务器端也立即退出。
我们可以通过 -k 参数来控制让服务器不会因为客户端的断开连接而退出。
服务器端：

    $ nc -k -l 2389

客户端：

    $ nc localhost 2389

服务器端：

    $ nc -k -l 2389

7.配置 netcat 客户端不会因为 EOF 而退出
netcat 客户端可以通过 -q 参数来控制接收到 EOF 后隔多长时间才退出，该参数的单位是秒：
客户端使用如下方式启动：

    nc -q 5 localhost 2389

现在如果客户端接收到 EOF，它将等待 5 秒后退出。
8.使用 netcat 来处理 UDP 协议
netcat 默认是使用 TCP 协议，但也支持 UDP，可使用 -u 参数来启用 UDP 协议通讯。
服务器端：

    $ nc -4 -u -l 2389

客户端：

    $ nc -4 -u localhost 2389

这样客户端和服务器端都使用了 UDP 协议，可通过 netstat 命令来查看：

    $ netstat| grep2389
    udp        0      0 localhost:42634         localhost:2389          ESTABLISHED

