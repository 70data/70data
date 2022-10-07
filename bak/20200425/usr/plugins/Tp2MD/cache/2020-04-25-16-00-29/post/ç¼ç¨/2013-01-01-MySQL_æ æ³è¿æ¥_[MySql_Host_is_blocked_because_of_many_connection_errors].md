---
layout: post
cid: 1742
title: MySQL 无法连接 [MySql Host is blocked because of many connection errors]
slug: 1742
date: 2013/01/01 21:52:00
updated: 2020/01/11 23:19:15
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - MySQL
---


MySQL 报错 Host is blocked because of many connection errors; unblock with 'mysqladmin flush-hosts'。

原因：同一个 ip 在短时间内产生太多中断的数据库连接而导致的阻塞。

解决方案：

1. set global max_connect_errors = 5000 或者更大
2. 或者修改my.cnf max_connect_errors = 5000 或者更大

临时修复方案：

```
flush hosts
```
