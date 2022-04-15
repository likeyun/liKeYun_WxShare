# WxShare自定义微信分享卡片2.1
创建微信分享给好友，分享到朋友圈的卡片，自定义分享，微信jssdk分享，微信卡片分享，微信分享带描述文字、带图片、带标题的卡片。

![微信截图_20220415142419.png](https://ucc.alicdn.com/pic/developer-ecology/88cc02609a3d4c7c8684d85811d03d1d.png)

# 更新日志（2022-04-15）
1、优化UI<br/>
2、新增预览效果<br/>

# 注意
如果使用测试号进行搭建，你还需要关注测试号的公众号，在测试号后台，有一个二维码，需要扫码关注，然后用扫码关注的那个微信进行访问分享页才能有效！

# 使用说明

1、导入数据库wxzdy_share.sql<br/>
2、打开db_config.php，修改里面的配置信息（数据库相关配置，公众号相关配置）<br/>
3、配置JS接口安全域名（到公众号后台配置）<br/>
4、访问creat.html即可开始创建<br/><br/>

注意：系统会自动生成access_token.json、jsapi_ticket.json这两个文件，请不要删除，服务器需要有777权限。<br/>

此程序需要配合认证订阅号、认证服务号使用，没有的话就使用测试号使用。<br/>

测试号申请地址：https://mp.weixin.qq.com/debug/cgi-bin/sandboxinfo?action=showinfo&t=sandbox/index <br/>

无论是认证号还是测试号都要绑定JS接口安全域名，域名就是你安装本套程序的域名。<br/><br/>

还有重要的一点：如果使用测试号进行搭建，你还需要关注测试号的公众号，在测试号后台，有一个二维码，需要扫码关注，然后用扫码关注的那个微信进行访问分享页才能有效！
---

# 交流群

有问题可以加入交流群解决
http://www.liketube.cn/ma/common/qun/redirect/?hmid=19122
