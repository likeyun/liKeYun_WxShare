# WxShare自定义微信分享卡片2.0
创建微信分享给好友，分享到朋友圈的卡片，自定义分享，微信jssdk分享，微信卡片分享，微信分享带描述文字、带图片、带标题的卡片。

<img src="https://p.pstatp.com/origin/pgc-image/3baf9db4e1954a3496e33aa8567f71f7" width="400" /><br/>
<img src="https://s.pc.qq.com/tousu/img/20210804/9391668_1628006629.jpg" width="400" /><br/>
<img src="https://p.pstatp.com/origin/pgc-image/1255127dd06143e89ed85d4432ee7a99" width="400" /><br/>

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
http://inews.gtimg.com/newsapp_bt/0/14446103724/641
