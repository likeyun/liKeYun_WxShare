<?php
// 声明页面header
header("Content-type:text/html;charset=utf-8");

// 获取分享ID
$shareid = trim($_GET["sid"]);

// 数据库配置
include './db_config.php';

// 连接数据库
$conn = new mysqli($db_url, $db_user, $db_pwd, $db_name);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

mysqli_query($conn,"SET NAMES utf8");
$sql = "SELECT * FROM wxzdy_share WHERE sid = '$shareid'";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        $title = $row["title"];
        $description = $row["description"];
        $img = $row["img"];
        $redirect_url = $row["redirect_url"];
    }

    
} else {
    echo "0 结果";
}
$conn->close();

$SERVER = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
$link = dirname($SERVER)."/redirect.php?sid=".$shareid;

// 获取access_token和jsapi_ticket
function getToken(){
   $file = file_get_contents("access_token.json",true);// 读取access_token.json里面的数据
   $result = json_decode($file,true);

// 判断access_token是否在有效期内，如果在有效期则获取缓存的access_token
// 如果过期了则请求接口生成新的access_token并且缓存access_token.json
if (time() > $result['expires']){
       $data = array();
       $data['access_token'] = getNewToken($appid,$appsecret);
       $data['expires'] = time()+7000;
       $jsonStr =  json_encode($data);
       $fp = fopen("access_token.json", "w");
       fwrite($fp, $jsonStr);
       fclose($fp);
       return $data['access_token'];
   }else{
       return $result['access_token'];
   }
}

// 获取新的access_token
function getNewToken($appid,$appsecret){
   global $appid;
   global $appsecret;
   $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret."";
   $access_token_Arr =  file_get_contents($url);
   $token_jsonarr = json_decode($access_token_Arr, true);
   return $token_jsonarr["access_token"];
}

$access_token = getToken();

//缓存jsapi_ticket
function getTicket(){
   $file = file_get_contents("jsapi_ticket.json",true);//读取jsapi_ticket.json里面的数据
   $result = json_decode($file,true);

//判断jsapi_ticket是否在有效期内，如果在有效期则获取缓存的jsapi_ticket
//如果过期了则请求接口生成新的jsapi_ticket并且缓存jsapi_ticket.json
if (time() > $result['expires']){
       $data = array();
       $data['jsapi_ticket'] = getNewTicket();
       $data['expires'] = time()+7000;
       $jsonStr =  json_encode($data);
       $fp = fopen("jsapi_ticket.json", "w");
       fwrite($fp, $jsonStr);
       fclose($fp);
       return $data['jsapi_ticket'];
   }else{
       return $result['jsapi_ticket'];
   }
}

//获取新的access_token
function getNewTicket($appid,$appsecret){
   global $appid;
   global $appsecret;
   $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=".getToken()."";
   $jsapi_ticket_Arr =  file_get_contents($url);
   $ticket_jsonarr = json_decode($jsapi_ticket_Arr, true);
   return $ticket_jsonarr["ticket"];
}

$jsapiTicket = getTicket();

// 动态获取URL
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// 生成时间戳
$timestamp = time();

// 生成nonceStr
$createNonceStr = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
str_shuffle($createNonceStr);
$nonceStr = substr(str_shuffle($createNonceStr),0,16);

// 按照 key 值 ASCII 码升序排序
$string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

// 按顺序排列按sha1加密生成字符串
$signature = sha1($string);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <title><?php echo $title; ?></title>
    <link href="" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.staticfile.org/Swiper/3.2.6/css/swiper.min.css">
</head>

<!-- 内容主体 -->
<body>
<p style='text-align:center;margin-top:200px;font-size:25px;color:#666;'>点击右上角【···】<br/>分享出去就可以看到效果</p>
</body>

</html>
   <!-- 引入微信分享js-->
   <script src="http://res.wx.qq.com/open/js/jweixin-1.6.0.js"></script>
   <script type="text/javascript">
    // 初始化配置
    wx.config({
       debug: false, // 正式上线后改成false不在弹出调试信息
       appId: '<?php echo $appid;?>',
       timestamp: '<?php echo $timestamp;?>',
       nonceStr: '<?php echo $nonceStr;?>',
       signature: '<?php echo $signature;?>',
       jsApiList: [
         // 所有要调用的 API 都要加到这个列表中
         'updateAppMessageShareData', //分享到朋友圈
         'updateTimelineShareData',//分享给朋友
       ]
     });

    // 配置完成后会调用ready函数
    wx.ready(function (res) {

     //分享到朋友圈
     wx.updateTimelineShareData({
       title: '<?php echo $title; ?>', // 分享标题
       link: '<?php echo $link; ?>', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
       imgUrl: '<?php echo $img; ?>', // 分享图标
       success: function (res) {
         // 分享成功
       }
     })

     wx.updateAppMessageShareData({ 
       title: '<?php echo $title; ?>', // 分享标题
       desc: '<?php echo $description; ?>', // 分享描述
       link: '<?php echo $link; ?>', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
       imgUrl: '<?php echo $img; ?>', // 分享图标
       success: function (res) {
         // 分享成功
       }
     })

   });

   //错误返回信息
   wx.error(function(res){    
   // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。    
       alert(res);
   });    
   
</script>