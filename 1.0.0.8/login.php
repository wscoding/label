<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$username=$_POST["username"];
$password=$_POST["password"];

$filename='../user/'.$username.'.json';

if ($username!="" and $password!="") {
    if(file_exists($filename)){
        //echo "当前目录中，文件".$filename."存在";
        $json_string = file_get_contents($filename);
        $datas = json_decode($json_string, true);
        $passwords = $datas['password'];
        if ($passwords==$password) {
            //密码正确，返回数据
            $data['status']="YES";
	        $data['message']="登陆成功，欢迎您：".$username."！";
	        $data['username']=$username;
	        echo json_encode($data);
        }else{
        	//密码不正确，返回数据
        	$data['status']="NO";
	        $data['message']="登陆失败，您键入的密码不正确！";
	        $data['username']=NULL;
	        echo json_encode($data);
        }
    }else{
        //echo "当前目录中，文件".$filename."不存在";
        $data['status']="NO";
        $data['message']="登陆失败，您键入的账号不存在！";
        $data['username']=NULL;
        echo json_encode($data);
    }
}
?>