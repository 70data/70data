---
layout: post
cid: 1022
title: Linux 下 ctrl+s 假死恢复
slug: 1712
date: 2010/01/08 21:07:00
updated: 2017/08/19 17:38:02
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Linux
---


使用 SecureCRT 或者 Xshell 时，偶尔发生屏幕假死，不能输入等情况。
后来发现，只要输入 ctrl+s，就会假死。
输入 ctrl+q 就可以恢复过来。
ctrl+s 是一个古老的 shell 控制键，再输入 ctrl+q 就可以恢复了。

<!--more-->

When you use terminal/putty/secureCRT/xshell,you can mistakenly type ctrl-s.It makes terminal freeze.It is because ctrl-s is an flow control signal to terminals.To resume the terminal,you should push ctrl-q.

This is not very convenient solution.We use ctrl-s a lot, especially for EMACS users.To prevent this,you can add this line in your login script.

stty stop undef
You can confirm this setting using this command.

stty -a
The stop section should be undef.