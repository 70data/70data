---
layout: post
cid: 1852
title: InfluxDB 报错 connection refused service=subscriber
slug: 1852
date: 2017/02/01 16:21:00
updated: 2020/01/11 22:57:55
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - InfluxDB
---


InfluxDB 的日志中有大量如下报错

```
Post http://localhost:9092/write?consistency=&db=_internal&precision=ns&rp=monitor: dial tcp 127.0.0.1:9092: getsockopt: connection refused service=subscriber
```

解决方案：
取消 kapacitor 订阅

```
[root@qtsdb01 /home/s/logs/influxdb]# /home/s/server/influxdb/bin/influx
Connected to http://localhost:8086 version 1.2.4
InfluxDB shell version: 1.2.4
> show subscriptions
name: _internal
retention_policy name                                           mode destinations
---------------- ----                                           ---- ------------
monitor          kapacitor-7fe56778-d84d-4d8e-9cf3-457e2dcd2a7c ANY  [http://localhost:9092]
monitor          kapacitor-29cd4eb0-a394-4e0f-bd25-91251fa69238 ANY  [http://localhost:9092]
> drop subscription "kapacitor-7fe56778-d84d-4d8e-9cf3-457e2dcd2a7c" on "_internal"."monitor"
> drop subscription "kapacitor-29cd4eb0-a394-4e0f-bd25-91251fa69238" on "_internal"."monitor"
```
