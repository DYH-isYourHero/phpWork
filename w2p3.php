<?php

//$ori_str  = "大家a好a[81]。cc你是谁[3]。大家a好a[3]。老师好[12]。上午好。上午好[12]。";

$ori_str  = "aaa[1]。bb[3]。cc。aaa[2]。";

function mergeString($ori_str){
    $tmp_array = explode("。",$ori_str);
    array_pop($tmp_array);
//$str_array = array();
//$num_array = array();
    $res_array=array();
    //array_unique($tmp_array);


    foreach ($tmp_array as $v){
	    if(mb_strpos($v,"[",0,"utf-8")!==false&&mb_strpos($v,"]",0,"utf-8")!==false){ //获得【 和】位置 截取数字和前面的串
		    $pos1=mb_strpos($v,"[",0,"utf-8");
		    $pos2=mb_strpos($v,"]",0,"utf-8");
		    $num = intval(mb_substr($v,$pos1+1,$pos2-$pos1-1,"utf-8"));
			$str = mb_substr($v,0,$pos1,"utf-8");
	    }else{
		    $num=1;
			$str = $v;
	    }
       // $str = mb_substr($v,0,$pos1,"utf-8");
		
		echo $v.'-->'.$str."<br>";
	    //array_push($str_array,$str);
	    //array_push($num_array,$num);
	//var_dump($num);
	//var_dump($str);
	    if(array_key_exists($str,$res_array)){
            $res_array[$str]+=$num;
	    }else{
		    $res_array[$str]=$num;
	    }	
    } 
	var_dump($res_array);
    return $res_array;
}

$res_array=mergeString($ori_str );
//print_r($res_array);
$res_str = "";
foreach ($res_array as $k => $v) {
	if($v!==1){
	$res_str=$res_str.$k."[".$v."]。";
	}else{
	$res_str=$res_str.$k."。";	
	}
}
echo $res_str;
/*print_r($str_array);
echo "</br>";
print_r($num_array);
$b = array_combine($str_array,$num_array);
echo "</br>";
print_r($b);
$bb = array_combine($num_array,$str_array);
echo "</br>";
print_r($bb);*/
?>