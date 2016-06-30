<?php
function solution($S){
	$result = "";
	$len = 0; $start = 1;
	$str = str_replace(" ","",$S);
	$str = str_replace("-", "",$str);
	$len = strlen($str);
	if ($len%3 == 1 && $len>3)
	{
		$start = 5;
		$result = "_" . substr($str, $len-4,2) . "_" . substr($str, $len-2, 2);
	}
	for ($i=$len-$start;$i>=0;$i--)
	{
		$result = substr($str,$i,1) . $result;
		if ($i%3==0)
			$result = "_" . $result;
	}
	if ($result[0] == "_")
		$result = substr($result,1);
	return $result;
}
function solution2($A, $B, $M, $X, $Y)
{
	$res = 0; $start = 0;
	$len = count($A);
	while($start<$len)
	{
		$i = $start; $maxA = 0; $maxB = 0;
		$c = array();
		while($i<$len)
		{
			if (($maxA + $A[$i])>$Y || ($maxB + 1) > $X)
			{
				$res ++; break;
			}
			else
			{
				$maxA += $A[$i];
				$maxB += 1;
				if (!isset($c[$B[$i]]) || $c[$B[$i]] != 1)
				{
					$res++;
				}
				$c[$B[$i]] = 1;
				$i++;
			}
		}
		$start = $i;
	}
	$res++;
	return $res;
}
function solution3($S){
	$len = strlen($S);
	$total_open = 0; $total_close = 0;
	$open = 0; $close = 0;
	$res = 0;
	for ($i=0;$i<$len;$i++)
	{
		$char = $S[$i];
		if ($char == "(") $total_open ++;
		if ($char == ")") $total_close ++;
	}
	for ($i=0;$i<$len;$i++)
	{
		$char = $S[$i];
		if ($char == "(") $open ++;
		if ($char == ")") $close ++;
		if ($open == ($total_close - $close)){
			$res = $i + 1;
			break;
		}
	}
	return $res;
}
echo solution("00-44  48 5555 8361") . "<br/>";
echo solution("0 - 22 1985--324") . "<br/>";
echo solution("555372654") . "<br/>";

$A1 = [60,80,40];
$B1 = [2,3,5];
$M1 = 5; $X1 = 2; $Y1 = 200;

$A2 = [40,40,100,80,20];
$B2 = [3,3,2,2,3];
$M2 = 3; $X2 = 5; $Y2 = 200;
$res1 = solution2($A1,$B1,$M1,$X1,$Y1);
$res2 = solution2($A2,$B2,$M2,$X2,$Y2);
echo $res1 . "," . $res2 . "<br/>";

$res3 = solution3("((((()))))(()((()))))))((()))))(");
$res4 = solution3("((((()))))(()((()))))))((()))))(()((()))))))((()))))(");
echo $res3 . "<br/>";
echo $res4 . "<br/>";
?>