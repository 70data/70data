---
layout: post
cid: 1623
title: Linux 查看网卡 UUID
slug: 1623
date: 2010/01/12 19:54:00
updated: 2017/08/19 20:34:22
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Linux
---


通过 nmcli 命令

    [root@master test]# nmcli con
    名称    UUID                                  类型            设备
    ens33   c96bc909-188e-ec64-3a96-6a90982b08ad  802-3-ethernet  ens33
    virbr0  7f06cd4d-a01e-4ba9-a5f8-494179118ee6  bridge          virbr0

