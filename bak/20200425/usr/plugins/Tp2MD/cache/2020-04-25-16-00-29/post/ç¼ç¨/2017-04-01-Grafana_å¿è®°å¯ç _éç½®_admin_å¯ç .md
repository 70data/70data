---
layout: post
cid: 1747
title: Grafana 忘记密码 重置 admin 密码
slug: 1747
date: 2017/04/01 16:09:00
updated: 2020/01/11 23:17:58
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Grafana
---


先进入 grafana 的数据库

```
sqlite3 /var/lib/grafana/grafana.db
```

执行 update 操作

```
sqlite> update user set password = '59acf18b94d7eb0694c61e60ce44c110c7a683ac6a8f09580d626f90f4a242000746579358d77dd9e570e83fa24faa88a8a6', salt = 'F3FAxVm33R' where login = 'admin';
sqlite> .exit
```

再重新用 admin 密码登录就可以

```
账号 admin
密码 admin
```
