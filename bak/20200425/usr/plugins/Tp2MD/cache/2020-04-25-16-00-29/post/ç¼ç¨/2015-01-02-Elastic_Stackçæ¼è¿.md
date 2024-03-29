---
layout: post
cid: 1505
title: Elastic Stack的演进
slug: 1505
date: 2015/01/02 22:56:00
updated: 2020/03/14 23:29:21
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Elasticsearch
---


Elastic Stack 是由 Elastic 公司推出的一个技术栈，包括但不限于 beats、logstash、elasticsearch、kibana 等软件。

目前整体的架构 大致如下：
![01.png](http://70data-net-static.smartgslb.com/upload/log/01.png)

<!--more-->

之前，数据只有采集、存储过程。
![02.png](http://70data-net-static.smartgslb.com/upload/log/02.png)

后来，有了数据的 filter。
![03.png](http://70data-net-static.smartgslb.com/upload/log/03.png)

这时候，技术栈是 logstash、elasticsearch.

然后，为了缓解 logstash 作为采集端的压力，有了 filebeat 组件。
![04.png](http://70data-net-static.smartgslb.com/upload/log/04.png)

为了缓解数据的 filter，或者 convert，引入了队列。
![05.png](http://70data-net-static.smartgslb.com/upload/log/05.png)

当数据源越来越多的时候，就会由各种的采集端。包括队列，以及高可用的 elasticsearch 集群。
![06.png](http://70data-net-static.smartgslb.com/upload/log/06.png)
