<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$username=$_POST["user"];
$id=$_POST["modid"];
$mod=$_POST["modstr"];

$filename='../user/'.$username.'.json';
$json_string = file_get_contents($filename);
$data = json_decode($json_string, true);
$pd="N";
if ($username!="" and $id!="" and $mod!="") {
    if (file_exists($filename)) {//文件存在
        if (array_key_exists("mod",$data)) {//mod配置是否已存在
            $Count = count($data['mod']);//查询条目数
            for ($i=0; $i < $Count; $i++) {
                $ids = $data['mod'][$i]['id'];
                if ($id==$ids) {
                    $data['mod'][$i]["id"]=$id;
                    $data['mod'][$i]["mod"]=$mod;
                    $data['mod'][$i]["zt"]=1;
                    $pd="Y";//数据已存在
                    $datas['status']="YES";
                    $datas['message']="恭喜您，配置模板更新成功！";
                    echo json_encode($datas);
                }
            }

            if ($pd=="N") {
                $data['mod'][$i]["id"]=$id;
                $data['mod'][$i]["mod"]=$mod;
                $data['mod'][$i]["zt"]=1;
                $datas['status']="YES";
                $datas['message']="恭喜您，配置模板保存成功！";
                echo json_encode($datas);
            }
            $json = json_encode($data);
            file_put_contents($filename, $json);
            
        } else {//mod不存在，直接写0
            $data['mod'][0]["id"]=$id;
            $data['mod'][0]["mod"]=$mod;
            $data['mod'][0]["zt"]=1;
            $json = json_encode($data);
            file_put_contents($filename, $json);
            $datas['status']="YES";
            $datas['message']="恭喜您，配置模板保存成功！";
            echo json_encode($datas);
        }
    } else {//文件不存在
        $datas['status']="NO";
        $datas['message']="配置文件写入出错，保存配置模板失败！";
        echo json_encode($datas);
    }
    
} else {
    $datas['status']="NO";
    $datas['message']="配置模板内容读取错误，保存配置模板失败！";
    echo json_encode($datas);
}
?>