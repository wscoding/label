<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$username=$_POST["username"];
$password=$_POST["password"];
$wen=$_POST["wen"];

$filename='../user/'.$username.'.json';

if ($username!="" and $password!="" and $wen!="") {
    if(file_exists($filename)){
        //echo "当前目录中，文件".$filename."存在";
        $datas['status']="NO";
        $datas['message']="注册失败，您键入的账号已存在！";
        $datas['username']=$username;
        echo json_encode($datas);
    }else{
        //echo "当前目录中，文件".$filename."不存在";
        $data['username']=$username;
        $data['password']=$password;
        $data['wen']=$wen;
        $json = json_encode($data);
        file_put_contents($filename, $json);
        $datas['status']="YES";
        $datas['message']="注册成功，恭喜您：".$username."！";
        $datas['username']=$username;
        echo json_encode($datas);
    }
}
?>