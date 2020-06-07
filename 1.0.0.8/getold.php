<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$username=$_POST["user"];
$id=$_POST["modid"];

$filename='../user/'.$username.'.json';
$json_string = file_get_contents($filename);
$data = json_decode($json_string, true);
$pd="N";
if ($username!="" and $id!="") {
    if (file_exists($filename)) {//文件存在
        if (array_key_exists("mod",$data)) {//mod配置是否已存在
            $Count = count($data['mod']);//查询条目数
            for ($i=0; $i < $Count; $i++) {
                $ids = $data['mod'][$i]['id'];
                if ($id==$ids) {
                    $data['mod'][$i]['zt'] = 0;
                    $json = json_encode($data);
                    file_put_contents($filename, $json);

                    $datas['status']="YES";
                    $datas['message']="恭喜您，删除配置模板成功！";
                    echo json_encode($datas);
                }
            }
        } else {//mod不存在，直接写0
            $datas['status']="NO";
            $datas['message']="未找到此名称模板，删除配置模板失败！";
            echo json_encode($datas);
        }
    } else {//文件不存在
        $datas['status']="NO";
        $datas['message']="配置文件读取错误，删除配置模板失败！";
        echo json_encode($datas);
    }
    
} else {
    $datas['status']="NO";
    $datas['message']="配置模板内容读取错误，删除配置模板失败！";
    echo json_encode($datas);
}
?>