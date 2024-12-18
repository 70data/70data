---
layout: post
cid: 1804
title: Git Rebase
slug: 1804
date: 2015/11/12 11:27:00
updated: 2020/01/11 23:06:34
status: publish
author: 千夜同学
categories: 
  - 编程
tags: 
  - Git
---


分支合并，有两个选择，一个是 `merge`，另一个是 `rebase`。
1. `merge` 和 `rebase` 合并后的结果是一模一样的，形象的说，二者是殊途同归。
2. 使用 `rebase` 后的 `commit` 与之前的 `commit`，它们的 SHA-1 值不同，Git 会把它们看成两次提交。

现在社区中推荐的主流 Git 合作方法，也是利用 Rebase 命令，即 Fork 一个代码库后，保留一个 `remote` 分支用来跟近主库进度，另开一个 `feature` 分支来打 `patch`，当 `patch` 打好后，在本地同步一下 `remote` 分支上的代码，保持与主库一致，如果在你打 `patch` 这段时间，主库发生了变化，那么你就需要在本地预先做一次 `rebase` 操作，以保证你的改动是构建在主库最新代码之上的。这其实相当与你帮助作者在本地处理好了冲突，这样作者再合并你的代码时候，也就能比较轻松了。换个角度，其实使用 `rebase` 这个过程也是一个自我检查的过程，可以强制你对改动进行 Review，从而减轻贡献者和所有者之间的工作量。因为没有人比你更熟悉你的代码。

`git pull —rebase`，这个命令在实际使用中的出场率还是很高的。
我们先从 `git pull` 说起，`git pull` 完整的应该是 `git fetch + git merge FETCH_HEAD`，默认时候 `git pull` 会先拉取代码，再进行 `merge`，上面说了使用 `merge` 会多出一条合并的 `commit` 以及一条分支线来，如果 `commit` 和 `merge` 频繁的话，可能会出现下图这样的情况，但是 `rebase` 则不同，其会保持线性，这样提交记录看起来就会整洁许多，使用 `rebase` 就是这个意思用 `git rebase` 取代。
![git-rebase-1.png][1]


  [1]: http://70data.net/usr/uploads/2018/02/2510717654.png