<?php
header("Content-type:application/json");

// 数据库配置
include './db_config.php';

// 创建连接
$conn = new mysqli($db_url, $db_user, $db_pwd, $db_name);

// 获得表单POST过来的数据
$title = $_POST["title"];
$description = $_POST["description"];
$img = $_POST["img"];
$redirect_url = $_POST["redirect_url"];

if(empty($title)){
	$result = array(
		"code" => "201",
		"msg" => "标题不得为空"
	);
}else if(empty($description)){
	$result = array(
		"code" => "202",
		"msg" => "摘要不得为空"
	);
}else if(empty($img)){
	$result = array(
		"code" => "203",
		"msg" => "图片还没上传"
	);
}else if(empty($redirect_url)){
	$result = array(
		"code" => "204",
		"msg" => "链接还没填写"
	);
}else{
	mysqli_query($conn,"SET NAMES utf8");
	// SID
	$sid = rand(100000,999999);
	// 插入数据库
	$sql = "INSERT INTO wxzdy_share (title, description, img, redirect_url, sid) VALUES ('$title', '$description', '$img', '$redirect_url', '$sid')";
	$SERVER = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
	$link = dirname($SERVER)."/index.php?sid=".$sid;
	if ($conn->query($sql) === TRUE) {
	    $result = array(
			"code" => "200",
			"msg" => "创建成功",
			"link" => $link
		);
	} else {
	    $result = array(
			"code" => "205",
			"msg" => "创建失败，数据库发生错误"
		);
	}
	
	// 断开数据库连接
	$conn->close();
}
// 返回结果
echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>