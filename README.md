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
3、配置JS接口安全域名（到公众号后台配置，使用测试号请到测试号配置）<br/>
4、如果你是使用测试号，请关注测试号，仅限关注测试号的微信使用才有效果。<br/>
5、访问creat.html即可开始创建<br/><br/>

如图，测试号配置安全域名，域名就是你当前用于搭建的域名，直接填域名，无需填https或http，结尾无需加斜杠。例如你的域名是www.qq.com，那就直接填www.qq.com<br/>
![微信截图_20220415145107.png](https://ucc.alicdn.com/pic/developer-ecology/265b8e94cea84ae7bd4a02c6cb8569da.png)


注意：系统会自动生成access_token.json、jsapi_ticket.json这两个文件，请不要删除，服务器需要有777权限。<br/>

此程序需要配合认证订阅号、认证服务号使用，没有的话就使用测试号使用。<br/>

测试号申请地址：https://mp.weixin.qq.com/debug/cgi-bin/sandboxinfo?action=showinfo&t=sandbox/index <br/>

无论是认证号还是测试号都要绑定JS接口安全域名，域名就是你安装本套程序的域名。<br/>

还有以一个小细节：index.php第21行的第21行的引入微信分享js的时候，我这里默认是引入了http，如果你的域名本身是强制https的话，你也需要将http改成https<br/><br/>

还有重要的一点：如果使用测试号进行搭建，你还需要关注测试号的公众号，在测试号后台，有一个二维码，需要扫码关注，然后用扫码关注的那个微信进行访问分享页才能有效！
---

# 调试

如果一直不生效，没反应，建议大家通过微信web开发者工具进行调试。工具下载地址：https://developers.weixin.qq.com/miniprogram/dev/devtools/download.html

<img src="https://github.com/likeyun/TANKING/blob/master/%E5%BE%AE%E4%BF%A1%E6%88%AA%E5%9B%BE_20220606114215.png" /><br/>
<img src="https://github.com/likeyun/TANKING/blob/master/%E5%BE%AE%E4%BF%A1%E6%88%AA%E5%9B%BE_20220606113806.png" />

# 交流群

有问题可以加入交流群解决
http://www.liketube.cn/ma/common/qun/redirect/?hmid=19122
