<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$username=$_POST["user"];
$modid=$_POST["mod"];

$filename='../user/'.$username.'.json';

if ($username!="") {
    if(file_exists($filename)){
        //echo "当前目录中，文件".$filename."存在";
        $json_string = file_get_contents($filename);
        $data = json_decode($json_string, true);
        $Count = count($data['mod']);//查询条目数
        for ($i=0; $i < $Count; $i++) {
            $ids = $data['mod'][$i]['id'];
            $mods = $data['mod'][$i]['mod'];
            if ($ids==$modid) {
                $datas['mod'] = $mods;
                $datas['status']="YES";
                $datas['message']="恭喜您，读取模板名称成功！";
                echo json_encode($datas);
                $pd = true;
            }
        }
        if ($pd != true) {
            $datas['status']="NO";
            $datas['message']="未查找到模板配置文件，读取模板文件失败！";
            echo json_encode($datas);
        }
    }else{
        //echo "当前目录中，文件".$filename."不存在";
        $datas['status']="NO";
        $datas['message']="未查找到模板配置文件，读取模板文件失败！";
        echo json_encode($datas);
    }
}
?>