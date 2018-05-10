<html>
<body>
    <form method="POST" action="w2p4.php">
         字符串1：<input type="text" name='string1'><br>
		 字符串2：<input type="text" name='string2'><br>
		 操作要求：
		 并集<input type="radio" name="operation" value="union">
		 差集<input type="radio" name="operation" value="subtraction"><br><br>
    <input type="submit">
</form>
</body>
<?php
//大家好[81]。你是谁[3]。大家好[3]。老师好[12]。上午好。上午好[12]。
//老师好[12]。常熟理工。
function mergeString($ori_str){
    $tmp_array = explode("。",$ori_str);
    array_pop($tmp_array);
    $res_array=array();
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
        
	    if(array_key_exists($str,$res_array)){
            $res_array[$str]+=$num;
	    }else{
		    $res_array[$str]=$num;
	    }	
    } 
    return $res_array;
}

function operateResArry($res_array1,$res_array2,$operation){
    if($operation==="union"){
		foreach($res_array2 as $k=>$v){
			if(array_key_exists($k,$res_array1)){
				$res_array1[$k]+=$v;
			}else{
				$res_array1[$k]=$v;
			}
		}
	}else{
		foreach($res_array2 as $k=>$v){
			if(array_key_exists($k,$res_array1)){
				$res_array1[$k]-=$v;
				if(($res_array1[$k]-=$v)<=0)
					unset($res_array1[$k]);
			}
		}
	}
    return $res_array1;	
}

function resArrayTOresString($res_array1){
	$res_str="";
	foreach ($res_array1 as $k=>$v){
		//if($v!==1){
	        $res_str=$res_str.$k."[".$v."]。";
	   // }else{
	       // $res_str=$res_str.$k."。";	
	   // }
	}
	return $res_str;
}

if (isset($_POST["string1"])&&isset($_POST["string2"])&&isset($_POST["operation"]))
{
	$ori_str1=$_POST["string1"];
	$ori_str2=$_POST["string2"];
	$operation=$_POST["operation"];
	
	$res_array1=mergeString($ori_str1);
	$res_array2=mergeString($ori_str2);
    $res_str = resArrayTOresString(operateResArry($res_array1,$res_array2,$operation));
	echo $res_str;
	
}

?>

</html>