---
layout: post
cid: 1687
title: Go 中如何阻塞等待所有 goroutines 都完成
slug: 1687
date: 2016/05/30 23:29:00
updated: 2019/01/06 16:19:17
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Go
---


方案一：

    package main
    
    import (
    	"fmt"
    	"runtime"
    	"sync"
    	"time"
    )
    
    // 定义一个同步等待的组
    var wg sync.WaitGroup
    
    // 定义一个Printer函数用于并发
    func Printer(a int) {
    	time.Sleep(2000 * time.Millisecond)
    	fmt.Printf("i am %d\n", a)
    	defer wg.Done()
    }
    
    func main() {
    	// 获取cpu个数
    	maxProcs := runtime.NumCPU()
    	// 限制同时运行的goroutines数量
    	runtime.GOMAXPROCS(maxProcs)
    	for i := 0; i < 10; i++ {
    	    //为同步等待组增加一个成员
    	    wg.Add(1)
    	    //并发一个goroutine
    	    go Printer(i)
    	}
    	// 阻塞等待所有组内成员都执行完毕退栈
    	wg.Wait()
    	fmt.Println("WE DONE!!!")
    }

<!--more-->

方案二：

    package main
    
    import (
    	"fmt"
    	"runtime"
    	"time"
    )
    
    // 定义一工并发多少数量
    var num = 14
    var cnum chan int
    
    func Printer(a int) {
    	time.Sleep(2000 * time.Millisecond)
    	fmt.Printf("i am %d\n", a)
    	// goroutine结束时传送一个标示给信道
    	cnum <- 1
    }
    
    func main() {
    	// 获取cpu个数
    	maxProcs := runtime.NumCPU()
    	// 限制同时运行的goroutines数量
    	runtime.GOMAXPROCS(maxProcs)
    	// make一个chan,缓存为num
    	cnum = make(chan int, num)
    	for i := 0; i < num; i++ {
    	    go Printer(i)
    	}
    	// 下面这个for循环的意义就是利用信道的阻塞 一直从信道里取数据 直到取得跟并发数一样的个数的数据 则视为所有goroutines完成
    	for i := 0; i < num; i++ {
    	    <-cnum
    	}
    	fmt.Println("WE DONE!!!")
    }

