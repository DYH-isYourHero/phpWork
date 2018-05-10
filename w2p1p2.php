<?php 
$num_array = range(0,9,1);
$res = array_search(0,$num_array,true); //如果在数组中找到指定的键值，则返回对应的键名，否则返回 FALSE。
if($res !== false){   //！== 
	echo $res;
}else{
	echo "0不在数组中";
}

echo "<hr>";

$test_array=array("33t",5,1,"123dyh",13.2,13,66,99,"Z09415105",78,109,"t");

echo "排序前："."</br>";
foreach ($test_array as $v)
   echo $v."</br>";

mySort($test_array);
  
echo "</br>排序后："."</br>";
foreach ($test_array as $v)
   echo $v."</br>";
  
function mySort(&$arr){
	try{
		
   	    $isOrdered = false; 
	    for ($i = 0;$i < count($arr)&&!$isOrdered;$i++){
		    $isOrdered = true ; 
		    for($j =count($arr)-1;$j > $i;$j-- ){				
			    if(intval($arr[$j])<intval($arr[$j-1])){	
                    $temp = $arr[$j];
				    $arr[$j] = $arr[$j-1];
				    $arr[$j-1] = $temp;
			        $isOrdered = false;
			    }
		   }
	    }
		return true;
	}catch(Exception $e){
		return false;
	}
	
}



?>