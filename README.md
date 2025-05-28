# 教室预约系统

<p align="center">
    <h1 align="center">教室预约系统</h1>
    <p align="center">高效管理教室资源，便捷安排课程教学</p>
</p>

## 系统简介

本教室预约系统是一个基于 Yii2 框架开发的 Web 应用，旨在帮助学校高效管理教室资源，便捷安排课程教学。系统采用前后端分离架构，提供直观的用户界面和完善的功能模块。

## 主要功能

### 1. 课程管理
- 课程信息管理：添加、编辑、删除课程信息
- 课程分类管理：对课程进行分类管理
- 课程安排：安排课程的具体时间和教室

### 2. 教室管理
- 教室信息管理：维护教室基本信息
- 教室容量管理：设置教室容纳人数
- 教室使用状态：实时查看教室使用情况

### 3. 预约管理
- 课程预约：根据课程需求预约合适的教室
- 时间冲突检测：自动检测并避免时间冲突
- 预约审核：管理员审核预约申请

### 4. 学期管理
- 学期设置：管理学期信息
- 当前学期：设置当前活动学期
- 学期切换：在不同学期间切换

## 技术架构

### 后端技术栈
- 框架：Yii2 Advanced Application Template
- 数据库：MySQL
- 缓存：Redis

### 前端技术栈
- 框架：Bootstrap 5
- JavaScript：jQuery
- UI 组件：Yii2 GridView, DetailView 等

## 目录结构

```
common/              # 公共模块
    config/          # 共享配置
    models/          # 数据模型
    tests/           # 测试文件
console/             # 控制台应用
    config/          # 控制台配置
    controllers/     # 控制台命令
    migrations/      # 数据库迁移
backend/             # 后台应用
    assets/          # 资源文件
    config/          # 后台配置
    controllers/     # 控制器
    models/          # 模型
    views/           # 视图
    web/             # Web 入口
frontend/            # 前台应用
    assets/          # 资源文件
    config/          # 前台配置
    controllers/     # 控制器
    models/          # 模型
    views/           # 视图
    web/             # Web 入口
```

## 数据模型

### 主要数据表
1. `yyxt_course_arrange` - 课程安排表
   - 课程ID、教师姓名、学生人数、教室ID等
   - 周次、学期、星期、节次等时间信息
   - 备注、所需工具等附加信息

2. `yyxt_room` - 教室信息表
   - 教室名称
   - 容纳人数
   - 备注信息

## 安装部署

1. 环境要求
   - PHP >= 7.4
   - MySQL >= 5.7
   - Composer

2. 安装步骤
   ```bash
   # 克隆项目
   git clone [项目地址]

   # 安装依赖
   composer install

   # 配置数据库
   cp common/config/main-local.php.dist common/config/main-local.php
   # 编辑数据库配置

   # 执行数据库迁移
   php yii migrate
   ```

3. 配置 Web 服务器
   - 配置虚拟主机指向 frontend/web 和 backend/web
   - 确保 runtime 目录可写

## 使用说明

### 管理员功能
1. 登录后台管理系统
2. 管理课程信息
3. 管理教室资源
4. 审核预约申请
5. 查看统计报表

### 教师功能
1. 查看教室使用情况
2. 提交课程预约申请
3. 查看预约状态
4. 管理个人课程安排

## 开发团队

- 开发团队：Hyacine
- 联系方式：1532508040@qq.com
