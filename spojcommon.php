
<head>
<title>SPOJ Common</title>
</head>
<body>
<form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
<input type="text" placeholder="Enter Username" name="user1">
<input type="text" placeholder="Enter Username" name="user2">
<button type="submit" name="submit">Submit</button>
</form>
<br/>

</body>




<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$u1=$_POST["user1"];
	$u2=$_POST["user2"];
	//echo $u1;

$lnk='http://www.spoj.com/users/'.$u1.'/';
$url=file_get_contents($lnk);
$lnk2='http://www.spoj.com/users/'.$u2.'/';
$url2=file_get_contents($lnk2);

//if(preg_match('/<table class="table table-condensed">((?s).*?)<\/table>/',$url,$match))
//{
	//var_dump($match);

if(preg_match_all('/<td align="left" width="14%"><a href="[^"]+">(.+)<\/a><\/td>/',$url,$matched))
	{
		//echo sizeof($matched[0]);


		for($i=0;$i<sizeof($matched[0]);$i++)
		{
			$name1[$i]=strip_tags($matched[0][$i],"<b>");
		//echo strip_tags($matched[0][$i],"<b>");
		//printf("\n");	
		}
		

	}
	else
	{
		echo "No match found";
	}
	echo '<br/>';

if(preg_match_all('/<td align="left" width="14%"><a href="[^"]+">(.+)<\/a><\/td>/',$url2,$matched2))
	{
		//echo sizeof($matched[0]);


		for($i11=0;$i11<sizeof($matched2[0]);$i11++)
		{
			$name2[$i11]=strip_tags($matched2[0][$i11],"<b>");
		//echo $matched2[0][$i1];
		//printf("\n");	
		}
		

	}
	else
	{
		echo "No match found";
	}
	echo '<br/>';


	//echo sizeof($name1);
	//echo '<br/>';
	//echo sizeof($name2);
	//echo '<br/>';

	//for($i5=0;$i5<sizeof($name1);$i5++){
		//echo $name1[$i5];
		//echo '<br/>' ;
	//}

	//for($i6=0;$i6<sizeof($name2);$i6++){
	//	echo $name2[$i6];
	//	echo '<br/>' ;
	//}
	echo 'Common Problems :' ;
	echo '<br/>' ;

	$i4=1;
	for($i2=0;$i2<sizeof($name1);$i2++)
	{
		$n1=$name1[$i2];
		for($i3=0;$i3<sizeof($name2);$i3++)
		{
			$n2=$name2[$i3];
			if(strcmp($n1,$n2)==0)
			{
				echo $i4." ";
				echo '<a href=http://www.spoj.com/problems/'.$n1.'/>'.$n1.'</a>';
				echo '<br/>' ;
				//$common[i4]=$n1;
				$i4++;
			}
		}

	}
	//echo  sizeof($common);

	//for($i5=0;$i5<sizeof($common);$i5++)
	//	echo $common[$i5];

	//echo $match[1];
//}
//else
//{
//	echo "No match found";
//}
}
?>


