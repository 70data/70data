---
layout: post
cid: 1882
title: brew link python3 出错
slug: 1882
date: 2018/04/19 17:02:00
updated: 2020/01/11 22:55:58
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Python
---


```
$ brew install python3
Warning: python3 3.6.3 is already installed, it's just not linked.
You can use `brew link python3` to link this version.
$ brew link python3
Linking /usr/local/Cellar/python3/3.6.3... Error: Permission denied @ dir_s_mkdir /usr/local/Frameworks
```

发现 /usr/local/ 下没有路径 /usr/local/Frameworks，需要新建该路径，并修改权限。

解决：

```
$ sudo mkdir /usr/local/Frameworks
$ sudo chown $(whoami):admin /usr/local/Frameworks
```

成功：

```
$ brew link python3
Linking /usr/local/Cellar/python3/3.6.3... 1 symlinks created
```
