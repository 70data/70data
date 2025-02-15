---
layout: post
cid: 1401
title: SaltStack 开发遇到的问题
slug: 1401
date: 2011/07/06 10:03:00
updated: 2018/03/13 17:15:10
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Python
  - SaltStack
---


开发 SaltStack 的 Web 界面，遇到一个神奇的问题：
通过 Python 调用 salt-api 没有返回值，直到超时，并且后端打印 DEBUG 日志：
![saltstack开发遇到的问题1.png][1]
会提示机器链接不上，而且机器 hostname 是被拆分开的。

<!--more-->

但是如果使用 curl 命令是可以得到返回值的。

    curl -k https://xx.xxx.com:9000 -H 'Accept: application/x-yaml' -H 'X-Auth-Token: xxxxx' -d client='local' -d tgt='*' -d expr_from='list' -d fun='test.ping'

Python 代码：

    import json
    import urllib
    import urllib2
    import ssl
    ssl._create_default_https_context = ssl._create_unverified_context
    salt_url = 'https://xxx.xxx.xxx.com:9000'
    salt_json_data = {'client':'local', 'tgt':'*', 'expr_form':'list', 'fun':'test.ping'}
    salt_json = json.dumps(salt_json_data)
    header = {'Content-Type':'application/json', 'Accept':'application/x-yaml', 'X-Auth-Token':'xxxx'}
    req = urllib2.Request(salt_url, salt_json, header)
    res = urllib2.urlopen(req)
    result = res.read()

后来。仔细排查日志，发现了问题。
![saltstack问题排查1.png][2]
有问题的部分的代码：

    if 'topic_lst' in package:
        topic_lst = package['topic_lst']
        for topic in topic_lst:
            if topic in self.present:
                for client in self.present[topic]:
                    try:
                        f = client.stream.write(payload)
                        self.io_loop.add_future(f, lambda f: True)
                     except tornado.iostream.StreamClosedError:
                        to_remove.append(client)
            else:
                log.debug('Publish target {0} not connected'.format(topic))

最后发现 tcp transport 默认是解析数组。
也就是说 topic_lst，即机器列表，应该是以数组形式传递的。
修正后，问题得到解决。

  [1]: http://70data.net/usr/uploads/2016/12/1678920883.png
  [2]: http://70data.net/usr/uploads/2016/12/2682523982.png