---
layout: post
cid: 1649
title: 让你的 Python 代码更 Pythonic
slug: 1649
date: 2011/07/12 23:28:00
updated: 2017/08/28 23:54:43
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Python
---


变量交换

    a, b = b, a

循环遍历

    for i in xrange(6):
        print i

带有索引位置的集合遍历

    colors = ['red', 'green', 'blue', 'yellow']
    for i, color in enumerate(colors):
        print i, color

字符串拼接

    names = ['raymond', 'rachel', 'matthew', 'roger', 'betty', 'melissa', 'judith', 'charlie']
    print ', '.join(names)

打开文件

    with open('data.txt') as f:
        data = f.read()

列表推导式

    [j for i in xrange(10)]

遍历字典

    for k, v in d.iteritems():
        print k, v
    for i, v in enumerate(l):
    	pass

构建字典

    names = ['raymond', 'rachel', 'matthew']
    colors = ['red', 'green', 'blue']
    d = dict(izip(names, colors))

<!--more-->

序列解包

    p = 'vttalk', 'female', 30, 'python@qq.com'
    name, gender, age, email = p

排序复制

    d = [3, 0, 2, 1]
    print sorted(d)
    [0, 1, 2, 3]
    print d
    [3, 0, 2, 1]

合理使用列表

    from collections import deque
    names = deque(['raymond', 'rachel', 'matthew', 'roger', 'betty', 'melissa', 'judith', 'charlie'])
    names.popleft()
    names.appendleft('mark')

filter, mapreduce使用会更频繁一些

    lst = [1, 2, 3, 4, 5, 6]
    # 所有奇数都会返回True, 偶数会返回False被过滤掉
    print filter(lambda x: x % 2 != 0, lst)
    # 输出结果
    [1, 3, 5]

时间转换
![Python时间转换.jpg][1]

collections.defaultdict
原始代码

    d = {}
    datas = [1, 2, 3, 4, 2, 3, 4, 1, 5]
    for k in datas:
        if k not in d:
            d[k] = 0 
        d[k] += 1

改良代码

    default_d = defaultdict(lambda: 0)
    datas = [1, 2, 3, 4, 2, 3, 4, 1, 5]
    for k in datas:
        default_d[k] += 1

原始代码

    if 'list' not in d:
    	d['list'] = []
    d['list'].append(x)

改良代码

    d.setdefault('list', []).append(x)

for else
原始代码

    search_list = ['Jone', 'Aric', 'Luise', 'Frank', 'Wey']
    found = False
    for s in search_list:
        if s.startswith('C'):
            found = True
            print 'Found'
            break
    
    if not found:
        print 'Not found'

改良代码

    search_list = ['Jone', 'Aric', 'Luise', 'Frank', 'Wey']
    for s in search_list:
        if s.startswith('C'):
            print 'Found'
            break
    else:
        print 'Not found'

锁

    # 创建锁
    lock = threading.Lock()

    # 使用锁的老方法
    lock.acquire()
    try:
        print 'Critical section 1'
        print 'Critical section 2'
    finally:
        lock.release()

    # 使用锁的新方法
    with lock:
        print 'Critical section 1'
        print 'Critical section 2'

  [1]: http://70data.net/usr/uploads/2017/08/2223459566.jpg