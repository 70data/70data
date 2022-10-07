---
layout: post
cid: 1803
title: Linux 升级 Glibc
slug: 1803
date: 2010/01/27 12:39:00
updated: 2020/01/11 23:08:48
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Linux
---


下载安装包

```
wget http://ftp.gnu.org/gnu/glibc/glibc-2.15.tar.gz
wget http://ftp.gnu.org/gnu/glibc/glibc-ports-2.15.tar.gz
```

解压

```
tar -xvf  glibc-2.15.tar.gz
tar -xvf  glibc-ports-2.15.tar.gz
```

包合并

```
mv glibc-ports-2.15 glibc-2.15/ports
```

建立编译目录

```
mkdir glibc-build-2.15
```

编译

```
cd glibc-build-2.15
../glibc-2.15/configure --prefix=/usr --disable-profile --enable-add-ons --with-headers=/usr/include --with-binutils=/usr/bin
make
make install
```

查看 glibc 支持的版本

```
strings libc.so | grep GLIBC
```
