# Fuwari Typecho主题 - 快速入门指南

## 快速开始测试

### 方式一: 使用Docker (推荐)

#### 1. 启动测试环境

```bash
cd /home/engine/project
./start-test-env.sh
```

#### 2. 访问并安装

打开浏览器访问: http://localhost:8080

按照安装向导配置:
- **数据库地址**: `mysql`
- **数据库端口**: `3306`
- **数据库名**: `typecho`
- **用户名**: `typecho`
- **密码**: `typecho`
- **表前缀**: `typecho_`

#### 3. 启用主题

1. 完成安装后，登录Typecho管理面板
2. 进入 **外观** → **主题**
3. 找到 **Fuwari** 主题并点击启用

### 方式二: 手动部署到现有Typecho

#### 1. 复制主题文件

```bash
cp -r /home/engine/project/fuwari-typecho /path/to/your/typecho/usr/themes/
```

#### 2. 启用主题

登录Typecho管理面板，进入 **外观** → **主题**，启用Fuwari主题。

## Docker环境管理

### 查看日志
```bash
cd /home/engine/project
docker-compose logs -f
```

### 停止环境
```bash
docker-compose down
```

### 重启服务
```bash
docker-compose restart
```

### 完全重置 (清除数据)
```bash
docker-compose down -v
rm -rf typecho-site/usr/themes/*/.cache
```

## 主题文件结构

```
fuwari-typecho/
├── assets/              # CSS、JS和静态资源 (不要修改)
│   ├── *.css           # 编译后的CSS文件
│   ├── *.js            # JavaScript文件
│   └── images/         # 图片资源
├── header.php          # 网站头部
├── footer.php          # 网站底部
├── sidebar.php         # 侧边栏
├── index.php           # 首页/文章列表
├── post.php            # 文章详情页
├── page.php            # 独立页面
├── archive.php         # 归档/分类/标签页
├── comments.php        # 评论区
├── functions.php       # 主题函数
├── style.css           # 主题元数据
└── README.md           # 说明文档
```

## 主题定制

### 修改站点信息

1. 登录Typecho管理面板
2. 进入 **设置** → **基本**
3. 修改站点名称、描述等信息

### 配置侧边栏

1. 进入 **外观** → **设置外观**
2. 选择要显示的侧边栏组件

### 修改颜色主题

主题支持深色/浅色模式，用户可以通过网站右上角的主题切换按钮自由切换。

如需修改主题色调，可以编辑 `header.php` 中的 `configHue` 变量:

```javascript
const configHue = 250; // 修改这个数值 (0-360)
```

色调参考:
- 0 = 红色
- 120 = 绿色
- 240 = 蓝色
- 250 = 紫色 (默认)

## 创建内容

### 发布文章

1. 登录管理面板
2. 进入 **撰写** → **文章**
3. 填写标题和内容
4. 选择分类和标签
5. 点击 **发布文章**

### 创建独立页面

1. 进入 **撰写** → **页面**
2. 创建页面 (如: 关于、联系等)
3. 页面会自动出现在导航栏

### 添加分类和标签

- **分类**: 在 **管理** → **分类** 中添加
- **标签**: 在撰写文章时直接输入标签，系统会自动创建

## 故障排除

### 主题显示不正常

1. 确保所有主题文件都已正确上传
2. 检查 `assets/` 目录权限是否正确
3. 清除浏览器缓存

### CSS样式丢失

1. 检查 `assets/` 目录是否完整
2. 确认Web服务器可以访问静态文件
3. 检查文件权限: `chmod -R 755 fuwari-typecho/`

### Docker无法启动

1. 确保Docker和docker-compose已安装
2. 检查端口8080和3306是否被占用
3. 查看日志: `docker-compose logs`

### 数据库连接失败

1. 确认数据库配置信息正确
2. 在Docker环境中，主机名必须是 `mysql` 而不是 `localhost`
3. 检查MySQL容器是否正常运行: `docker-compose ps`

## 性能优化

### 启用缓存

在 `config.inc.php` 中启用Typecho缓存:

```php
define('__TYPECHO_CACHE_ENABLE__', true);
```

### 优化图片

- 使用WebP格式
- 启用懒加载
- 压缩图片大小

### CDN加速

可以将 `assets/` 目录的静态资源部署到CDN，修改资源路径即可。

## 技术支持

### 文档和资源

- **原始主题**: https://github.com/saicaca/fuwari
- **Typecho官网**: http://typecho.org
- **Typecho文档**: http://docs.typecho.org

### 常见问题

**Q: 如何修改导航菜单?**
A: 导航菜单会自动显示所有独立页面，可以通过创建/删除页面来管理。

**Q: 支持哪些Markdown特性?**
A: 支持标准Markdown语法，具体取决于Typecho版本。

**Q: 如何添加自定义代码?**
A: 可以在 `functions.php` 中添加自定义PHP代码。

**Q: 主题支持多语言吗?**
A: 当前主题主要为中英文优化，可以通过修改模板文件支持其他语言。

## 更新日志

### v1.0.0 (2025-12-27)
- 首次发布
- 从Fuwari Astro主题移植
- 支持深色模式
- 完整的响应式设计
- 集成Typecho评论系统

## 许可证

MIT License - 可自由使用和修改

---

**祝你使用愉快！** 🎉

如有问题，请查看 `PROJECT_SUMMARY.md` 了解更多技术细节。
