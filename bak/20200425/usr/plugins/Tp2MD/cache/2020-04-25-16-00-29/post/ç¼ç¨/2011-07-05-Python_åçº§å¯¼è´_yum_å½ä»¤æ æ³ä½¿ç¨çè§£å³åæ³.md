---
layout: post
cid: 1393
title: Python 升级导致 yum 命令无法使用的解决办法
slug: 1393
date: 2011/07/05 00:09:00
updated: 2017/08/19 20:33:37
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Python
---


报错信息如下

    [root@develop local]# yum -y install prce  
    There was a problem importing one of the Python modules  
    required to run yum. The error leading to this problem was:  
      
      
       No module named yum  
      
      
    Please install a package which provides this module, or  
    verify that the module is installed correctly.  
      
      
    It's possible that the above module doesn't match the  
    current version of Python, which is:  
    2.6.1 (r261:67515, Aug 7 2010, 11:36:17)  
    [GCC 4.1.2 20080704 (Red Hat 4.1.2-44)]  
      
      
    If you cannot solve this problem yourself, please go to  
    the yum faq at:  
    http://wiki.linux.duke.edu/YumFaq

<!--more-->

执行命令 找到yum命令的在哪

    [root@iZ6249dycmaZ ~]# whereis yum
    yum: /usr/bin/yum /etc/yum /etc/yum.conf /usr/share/man/man8/yum.8.gz

编辑命令

    vim /usr/bin/yum
    #!/usr/bin/python
    改成
    #!/usr/bin/python2.6.6

![yum配置.jpg][1]

重命名命令

    cp /usr/bin/python /usr/bin/python2.6.6

  [1]: http://70data.net/usr/uploads/2016/09/3298600308.jpg