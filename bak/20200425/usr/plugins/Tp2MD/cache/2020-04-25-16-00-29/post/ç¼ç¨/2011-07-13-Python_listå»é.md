---
layout: post
cid: 1656
title: Python list去重
slug: 1656
date: 2011/07/13 23:39:00
updated: 2017/09/27 16:43:58
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Python
---


基础方法

    ids = [1,2,3,3,4,2,3,4,5,6,1]
    news_ids = []
    for id in ids:
        if id not in news_ids:
            news_ids.append(id)
    print news_ids

set 容器

    ids = [1,4,3,3,4,2,3,4,5,6,1]
    news_ids = list(set(ids))
    news_ids.sort(ids.index)

itertools.grouby

    ids = [1,4,3,3,4,2,3,4,5,6,1]
    ids.sort()
    it = itertools.groupby(ids)
    for k, g in it:
        print k

reduce

    ids = [1,4,3,3,4,2,3,4,5,6,1]
    func = lambda x,y:x if y in x else x + [y]
    reduce(func, [[], ] + ids)
    [1, 4, 3, 2, 5, 6]