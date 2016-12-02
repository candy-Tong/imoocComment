<?php
header('content-type:text/html;charset=utf-8');
require_once 'connect.php';
require_once 'comment.class.php';
require_once('getRealip.php');
$arr=array();
$res=Comment::validate($arr);
if($res){
	$sql="INSERT test(username,face,content,pubTime,ip) VALUES(?,?,?,?,?);";
	$mysqli_stmt=$mysqli->prepare($sql);
	$arr['pubTime']=time();
	$arr['ip']=getIP();
	$mysqli_stmt->bind_param('sssis',$arr['username'],$arr['face'],$arr['content'],$arr['pubTime'],$arr['ip']);
	$mysqli_stmt->execute();
	$comment=new Comment($arr);
	echo json_encode(array('status'=>1,'html'=>$comment->output()));
}else{
	echo '{"status":0,"errors":'.json_encode($arr).'}';
}

