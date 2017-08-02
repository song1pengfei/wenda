<?php
    /*用GD库画验证码*/
    session_start();
    
    //1.创建画布
    $w = 120;
    $h = 30;
    $hImg = imagecreatetruecolor($w,$h);
    
    
    //$str = 'abcdefghjkmnprstuvwxyACDEFGHJKLMNPQRSTUVWXY34567';
    $str = 'abcd34567';
    $str = str_shuffle($str);
    
    //2.画画
    
    
    imagefill($hImg,0,0,randColor($hImg,true));  //填充背景
    
    for($i=0;$i<=4;$i++){
        imageline($hImg,rand(0,$w),rand(0,$h),rand(0,$w),rand(0,$h),randColor($hImg));
    }
    
    //把一个一个字符画到画布上去
    $_SESSION['code'] = '';
    for($i=0;$i<4;$i++){
        imagettftext($hImg,18,rand(30,-30),19+$i*24,20,randColor($hImg),'./arialbd.ttf',$str[$i]);
        $_SESSION['code'] .= $str[$i];
    }

    //3.输出
    header('content-type:image/jpeg');
    imagejpeg($hImg);
    
    //4.销毁画布
    imagedestroy($hImg);

    
    
    //生成随机颜色的函数
    function randColor($hImg,$flag=false)
    {
        if($flag){
            //浅色
            return imagecolorallocate($hImg,rand(128,255),rand(128,255),rand(128,255));
        }
        //深色
        return imagecolorallocate($hImg,rand(0,127),rand(0,127),rand(0,127));
    }

?>