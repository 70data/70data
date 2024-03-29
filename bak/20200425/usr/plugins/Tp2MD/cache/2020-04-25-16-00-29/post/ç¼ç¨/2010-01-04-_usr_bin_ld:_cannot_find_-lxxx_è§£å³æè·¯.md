---
layout: post
cid: 1029
title: /usr/bin/ld: cannot find -lxxx 解决思路
slug: 1719
date: 2010/01/04 16:43:00
updated: 2017/08/19 17:29:25
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Linux
---


问题描述
/usr/bin/ld: cannot find -lxxx
其中 xxx 即表示函式库文件名称，其命名规则是：lib+库名(即xxx)+.so。

可能原因：
1.安装，但相对应的 lib 版本不兼容。
我们需要的是 libjpeg.so.8.0，但安装的是 libjpeg.so.6.0。或者是需要 arm 平台上的 lib，但我们安装的是 X86 架构的，或反之本来是要编译 arm 平台上的却忘了指定交叉编译器，我们需要 32 位但我们安装的是 64 位的。
2.安装了，版本也对了，但 lib(.so.version-num) 的 symbolic link 不正确，没有连结到正确的函式库文件(.so)。
我们需要的是 libjpeg.so.8.0，也安装上了。但是实际使用时我们是查找的 libjpeg.so，就需要相应的一个名为 libjpeg.so 的 link 指向 libjpeg.so.8.0。
3.目录中确实没有相对应的 lib。
系统中没有安装相对应的 lib，安装了，但不在这个目录且不在环境变量中。

<!--more-->

遇到此类问题的解决思路：
一、先详细了解问题，注意看错误的详细信息以进一步确定，若出现类似下面提示： 

    /usr/bin/ld: skipping incompatible /usr/local/jpeg-6b when searching for -libjpeg.so

问题：版本不兼容
1、32 位与 64 位冲突问题

    yum provides libX11.so
    libX11-devel-1.3-2.el6.x86_64 : Development files for libX11
    Repo : base
    Matched from:
    Filename : /usr/lib64/libX11.so

解决：

    yum install libX11-devel-1.3-2.el6.x86_64

安装 x86_64 兼容包

2、平台不兼容 arm X86 
很可能是编译是忘了指定交叉编译工具。

    make CC=arm-xilinx-linux-gnueabi-gcc

或者手动修改Makefile中的CC

3、版本号不对
安装新的版本。

二、若非版本问题
进入相关目录查看是否是 lib(.so.version-num) 的 symbolic link 不正确，并建立链接。

    cd /usr/lib
    ln -s libjpeg.so.6 libjpeg.so 

三、真的没有要找的 libxxx.so
1、安装了但不在系统变量所设的目录
修改 Makefile 在编译选项中添加 Lyourlibpath
案例：
修改 plugins/input_uvc/Makfile 文件

    CFLAGS = -O2 -DLINUX -D_GNU_SOURCE -Wall -shared -fPIC
    修改为
    CFLAGS = -O2 -DLINUX -D_GNU_SOURCE -Wall -shared -fPIC-I/home/70data/jpeg-6b/jpeg/include 


    $(CC) $(CFLAGS) -ljpeg -o $@ input_uvc.c v4l2uvc.lo jpeg_utils.lo dynctrl.lo
    修改为
    $(CC) $(CFLAGS) -ljpeg -L/home/70data/jpeg-6b/jpeg/lib -o $@ input_uvc.c v4l2uvc.lo jpeg_utils.lo dynctrl.lo

2、没安装
安装相关库 
先用 yum search 以确定库的确切名称，然后安装。 

    yum search libxtst-dev
    yum install libxtst-devel   

