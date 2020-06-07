<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$username=$_POST["user"];

$filename='../user/'.$username.'.json';

if ($username!="") {
    if(file_exists($filename)){
        //echo "当前目录中，文件".$filename."存在";
        $json_string = file_get_contents($filename);
        $data = json_decode($json_string, true);
        $Count = count($data['mod']);//查询条目数
        $x = 0 ;
        $pd = 0;
        if ($Count > 0) {
            for ($i=0; $i < $Count; $i++) {
                $ids = $data['mod'][$i]['id'];
                $zts = $data['mod'][$i]['zt'];
                if ($zts == 1) {
                    $datas['mod'][$x]['id'] = $ids;
                    $x++;
                    $pd = 1;
                }
            }
            if ($pd == 1) {
                $datas['status']="YES";
                $datas['message']="恭喜您，读取模板名称成功！";
                echo json_encode($datas);
            } else {
                $datas['status']="NO";
                $datas['message']="您还没有添加模板呢亲";
                echo json_encode($datas);
            }
        }else{
            $datas['status']="NO";
            $datas['message']="您还没有添加模板呢亲";
            echo json_encode($datas);
        }
        
    }else{
        //echo "当前目录中，文件".$filename."不存在";
        $datas['status']="NO";
        $datas['message']="发生错误，读取模板文件失败！";
        echo json_encode($datas);
    }
}
?>