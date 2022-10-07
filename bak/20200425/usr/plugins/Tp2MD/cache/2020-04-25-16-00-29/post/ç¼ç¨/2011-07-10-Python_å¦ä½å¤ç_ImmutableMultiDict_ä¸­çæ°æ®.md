---
layout: post
cid: 1634
title: Python 如何处理 ImmutableMultiDict 中的数据
slug: 1634
date: 2011/07/10 11:49:00
updated: 2020/01/11 23:34:08
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Python
  - Flask
---


Flask 与前端数据交互的时候，经常会使用 ImmutableMultiDict、MultiDict 类型。

    combined = CombinedMultiDict([self])
    getData = combined['endDate']

self 是一组 ImmutableMultiDict 类型，endDate 是一个 key。
下面是样例：

    >>> from werkzeug.datastructures import CombinedMultiDict, MultiDict
    >>> post = MultiDict([('foo', 'bar')])
    >>> get = MultiDict([('blub', 'blah')])
    >>> combined = CombinedMultiDict([get, post])
    >>> combined['foo']
    'bar'
    >>> combined['blub']
    'blah'
