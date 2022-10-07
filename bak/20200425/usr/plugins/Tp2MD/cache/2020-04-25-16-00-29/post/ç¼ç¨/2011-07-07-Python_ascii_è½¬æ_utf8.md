---
layout: post
cid: 1625
title: Python ascii 转成 utf8
slug: 1625
date: 2011/07/07 20:29:00
updated: 2017/08/19 20:33:48
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Python
---


    a = '\xe4\xb8\xad'
    print a
    print type(a)
    print a.decode()

这样会报错

    ➜  Test python unicode.py
    中
    <type 'str'>
    Traceback (most recent call last):
      File "unicode.py", line 7, in <module>
        print a.decode()
    UnicodeDecodeError: 'ascii' codec can't decode byte 0xe4 in position 0: ordinal not in range(128)

decode 的时候 需要注明编码

    a = '\xe4\xb8\xad'
    print a
    print type(a)
    aa = a.decode('utf-8')
    print aa

结果

    ➜  Test python unicode.py
    中
    <type 'str'>
    中