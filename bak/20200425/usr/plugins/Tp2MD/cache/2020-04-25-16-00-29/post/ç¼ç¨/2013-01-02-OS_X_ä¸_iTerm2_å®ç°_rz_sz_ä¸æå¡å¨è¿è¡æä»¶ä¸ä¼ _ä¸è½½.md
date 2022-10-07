---
layout: post
cid: 1744
title: OS X 下 iTerm2 实现 rz/sz 与服务器进行文件上传/下载
slug: 1744
date: 2013/01/02 21:58:00
updated: 2020/01/11 23:18:33
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Mac
---


下载配置 iTerm2 的相关脚本：
这里是下载地址  https://github.com/mmastrac/iterm2-zmodem
将 iterm2-recv-zmodem.sh 和 iterm2-send-zmodem.sh 下载到本机，然后将它们放到/usr/local/bin目录下。
这两个文件赋予可执行权限：
chmod +x /usr/local/bin/iterm2-send-zmodem.sh /usr/local/bin/iterm2-recv-zmodem.sh

配置 iTerm2：
找到 iTerm2 的配置项：iTerm2的Preferences-> Profiles -> Default -> Advanced -> Triggers

配置项如下：

Regular Expression | Action | Parameters | Instant
-----|-----|-----|-----
rz waiting to receive.\*\*B0100 | Run Silent Coprocess | /usr/local/bin/iterm2-send-zmodem.sh | checked
\*\*B00000000000000 | Run Silent Coprocess | /usr/local/bin/iterm2-recv-zmodem.sh | checked

尤其注意最后一项，需要将 Instant 选项勾上，否则将不生效。
![iterm2-lrzsz.png][1]

  [1]: http://70data.net/usr/uploads/2018/01/1303897536.png