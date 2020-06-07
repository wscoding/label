<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$username=$_POST["username"];
$password=$_POST["password"];
$wen=$_POST["wen"];

$filename='../user/'.$username.'.json';

if ($username!="" and $password!="" and $wen!="") {
    if(file_exists($filename)){
        $json_string = file_get_contents($filename);
        $datas = json_decode($json_string, true);
        $wens = $datas['wen'];
        $datas['password'] = $password;
        $json = json_encode($datas);
        file_put_contents($filename, $json);
        if ($wen==$wens) {
            //口令正确，返回数据
            $data['status']="YES";
            $data['message']="找回&修改密码成功，欢迎您：".$username."！";
            $data['username']=$username;
            echo json_encode($data);
        }else{
            //口令不正确，返回数据
            $data['status']="NO";
            $data['message']="找回&修改密码失败，验证口令不正确！";
            $data['username']=NULL;
            echo json_encode($data);
        }
    }else{
        //echo "当前目录中，文件".$filename."不存在";
        $data['status']="NO";
        $data['message']="找回&修改密码失败，您键入的账号不存在！";
        $data['username']=NULL;
        echo json_encode($data);
    }
}
?>