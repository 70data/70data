---
layout: post
cid: 1795
title: github push 错误 The requested URL returned error: 403 Forbidden while accessing
slug: 1795
date: 2015/11/03 09:20:00
updated: 2020/01/11 23:13:49
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Git
---


```
git push  
error: The requested URL returned error: 403 Forbidden while accessing
```

修改 .git/config

```
[remote "origin"]
    url = https://github.com/70data/example.git
```

改成

```
[remote "origin"]
    url = https://70data@github.com/70data/example.git
```

重新 push
