---
layout: post
cid: 1630
title: Invalid command 'Order' perhaps misspelled or defined by a module not included in the server configuration
slug: 1630
date: 2010/01/13 22:22:00
updated: 2017/09/28 23:54:09
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Apache
---


报错是

    Invalid command 'Order', perhaps misspelled or defined by a module not included in the server configuration

解决方案
首先查看 modules 目录下是否有 mod_access_compat.so、mod_authz_host.so
然后在 httpd.conf 下添加

    LoadModule access_compat_module modules/mod_access_compat.so
    LoadModule authz_host_module modules/mod_authz_host.so