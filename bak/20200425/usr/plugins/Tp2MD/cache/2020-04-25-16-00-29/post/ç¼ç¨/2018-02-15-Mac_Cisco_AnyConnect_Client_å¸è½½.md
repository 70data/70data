---
layout: post
cid: 1802
title: Mac Cisco AnyConnect Client 卸载
slug: 1802
date: 2018/02/15 12:17:00
updated: 2020/01/11 23:10:55
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - VPN
---


获取所有包信息

```
pkgutil --pkgs | grep com.cisco
```

删除所有遗留包

```
sudo find / -name "*cisco*" | xargs rm -rf
sudo rm -rf /private/var/db/receipts/com.cisco.pkg.anyconnect.*
```
