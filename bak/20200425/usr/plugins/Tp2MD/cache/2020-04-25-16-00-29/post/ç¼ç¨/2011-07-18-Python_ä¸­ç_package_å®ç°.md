---
layout: post
cid: 1668
title: Python 中的 package 实现
slug: 1668
date: 2011/07/18 18:52:00
updated: 2017/08/28 23:54:05
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Python
---


目录结构

    demo.py
    MyPackage
    ---classOne.py
    ---classTwo.py
    ---__init__.py

1.__init__.py 空白文件方式
demo.py 内容

    from MyPackage.classOne import classOne
    from MyPackage.classTwo import classTwo
    if __name__ == "__main__":
        c1 = classOne()
        c1.printInfo()
        c2 = classTwo()
        c2.printInfo()

classOne.py 内容

    class classOne:
        def __init__(self):
            self.name = "class one"
        def printInfo(self):
            print "i am class One!"

classTwo.py 内容

    class classTwo:
        def __init__(self):
            self.name = "class two"
        def printInfo(self):
            print "i am class two!"

<!--more-->

2.__init__.py 写入导入模块语句方式
__init__.py 内容

    from classOne import classOne
    from classTwo import classTwo

demo.py 内容

    import MyPackage
    if __name__ == "__main__":
        c1 = MyPackage.classOne()
        c1.printInfo()
        c2 = MyPackage.classTwo()
        c2.printInfo()

或者

    from MyPackage import *
    if __name__ == "__main__":
        c1 = classOne()
        c1.printInfo()
        c2 = classTwo()
        c2.printInfo()