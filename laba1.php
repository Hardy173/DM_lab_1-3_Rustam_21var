<html>
<head>
	<title>Первая лабораторная работа</title>
	<meta charset='UTF-8'/>
	<link rel="stylesheet" href="style/styleFoto.css" media="all">
</head>
<body>
<?php 
echo 'Лабораторная работа №1 по ДМ и МЛ. Выполнил Юнусов Рустам, студент группы ИВТАПбд-11.';
echo '<br>';
echo '<br>';
echo 'Разработать программу на php выполняющую операции с двумя множествами: объединение, пересечение, дополнение, симметрическую разность. 
Ввод множест осущеставляется пользователем. Сделать валидацию вводимых пользователем данных. Тип данных определяется по индивидуально. 
Пояснение к обозначению типа ввода: с - цифра, b-буква, i -четная цифра.j-нечетная';
echo '<br>';
echo '<br>';
echo 'Мое задание cjjc - цифра, нечётная, нечётная, цифра. <br> ВАЖНО! Элементы массива вводятся через пробел, в начале и в конце элементов множеств, ПРОБЕЛ НЕ СТАВИТЬ!';
echo '<br>';
echo '<br>';
echo '-------------------------------------------------------------------------';
echo '<br>';
?>

<form action="" method="get">	
	Массив А <input type="text" name="massA" value="<?=$_GET['massA']?>"><br>
	Массив В <input type="text" name="massB" value="<?=$_GET['massB']?>"><br>
	<input type="submit" value="Сделать все действия">
</form>



<?php


	function validation($a,$b)
	{  	
		$a=trim($a);
		$b= trim($b);
		$a = preg_replace("/(\s){2,}/",' ',$a);
		$b = preg_replace("/(\s){2,}/",' ',$b);
	
		$chislo = array(0,1,2,3,4,5,6,7,8,9);
		global $result;
		$result=true;
		$p1 = explode(" ", $a);
		$p2 = explode(" ", $b);
		echo 'Введенные элементы в массив №1 или массив A : '.'{' .$a .'}';
echo '<br>';
echo 'Введенные элементы в массив №2 или массив B : '.'{' .$b.'}' ;
echo '<br>';
echo '<br>';
		$res1=true;
		$res2=true;

		for ( $i = 0; $i < count( $p1) ; $i++ ) 
	    {
			if (in_array($p1[$i][0],$chislo)&&($p1[$i][1]%2==1)&&($p1[$i][2]%2==1)&&in_array($p1[$i][3],$chislo)&&strlen($p1[$i])==4)
			{
				$res1=true;
			} else {
				$res1=false;
				break;
			}
		}
		for ( $i = 0; $i < count( $p2) ; $i++ ) 
	    {
			if (in_array($p2[$i][0],$chislo)&&($p2[$i][1]%2==1)&&($p2[$i][2]%2==1)&&in_array($p2[$i][3],$chislo)&&strlen($p2[$i])==4)
			{
				$res2=true;
			} else {
				$res2=false;
				break;
			}
		}
		if ($res1==false||$res2==false) {
			$res='<br><p><span class="error">Ошибка ввода элементов множества!</span></p><br>';
			$result=false;
		/*}
			if ($res1==true||$res2==false) {
			$res="Ошибка ввода элементов множества второе поле множества введено не верно!";
			$result=false;
			}
			if ($res1==false||$res2==true) {
			$res="Ошибка ввода элементов множества первое поле множества введено не верно!";
			$result=false;
			*/
		} 
		else {
			$res='Элементы введены верно, держи результат: <br>';
			$result=true;
		}
		return $res;
	}
	function Ob()
	{	
		global $p1,$p2;
		$k=count( $p1);
		
		for ( $i = 0; $i < $k ; $i++ )
		{ 	
			$res1[$i]=$p1[$i];
		}
	    for ( $i = 0; $i < count( $p2) ; $i++ )
		{ 	
			$result1=true;
			for ( $j = 0; $j < count( $p1) ; $j++ )
			{
				if ($res1[$j]==$p2[$i])
				{
					$result1=false;
					break;
				}
			}
			if ($result1==true) {
				$res1[$k]=$p2[$i];
				$k++;
			}
		}
		$res="";
		for ( $j = 0; $j < count( $res1) ; $j++ )
		$res=$res.$res1[$j]." ";
		return $res;
	}
	function Per()
	{	
		global $p1,$p2;
		$k=0;
		for ( $i = 0; $i < count( $p1) ; $i++ )
		{ 
			$result1=false;
			for ( $j = 0; $j < count( $p2) ; $j++ )
			{
				if ($p1[$i]==$p2[$j]) 
				{
					$result1=true;
					break;
				}
			}
			if ($result1==true) {
				$res1[$k]=$p1[$i];
				$k++;
			}
		} 
		
		if ($res1[0]!=""){
			$res="";
			for ( $j = 0; $j < count( $res1) ; $j++ )
			$res=$res.$res1[$j]." ";
			} else {
				$res='ПУСТОЕ МНОЖЕСТВО!';
			}
		return $res;
	}
	function MassRaz()
	{	
		global $p1,$p2;
		$k=0;
		for ( $i = 0; $i < count( $p1) ; $i++ )
		{ 	$result1=true;
			for ( $j = 0; $j < count( $p2) ; $j++ )
			{
				if ($p1[$i]==$p2[$j])
				{
					$result1=false;break;
				}
			}
			if ($result1==true) {
				$res1[$k]=$p1[$i];
				$k++;
			}
		}
		for ( $i = 0; $i < count( $p2) ; $i++ )
		{ 	
			$result1=true;
			for ( $j = 0; $j < count( $p1) ; $j++ )
			{
				if ($p1[$j]==$p2[$i])
				{
					$result1=false;
					break;
				}
			}
			if ($result1==true) {
				$res1[$k]=$p2[$i];
				$k++;
			}
		}
		if ($k!=0){
			$res="";
			for ( $j = 0; $j < count( $res1) ; $j++ )
			$res=$res.$res1[$j]." ";
			} else {
				$res='ПУСТОЕ МНОЖЕСТВО!';
			}
		return $res;
	}
	function massBA()
	{	
		global $p1,$p2;
		$k=0;
		for ( $i = 0; $i < count( $p1) ; $i++ )
		{ 	
			$result1=true;
			for ( $j = 0; $j < count( $p2) ; $j++ )
			{
				if ($p1[$i]==$p2[$j])
				{
					$result1=false;
					break;
				}
			}
			if ($result1==true) {
				$res1[$k]=$p1[$i];
				$k++;
			}
		}
		if ($k!=0){
			$res="";
			for ( $j = 0; $j < count( $res1) ; $j++ )
			$res=$res.$res1[$j]." ";
			} else {
				$res='ПУСТОЕ МНОЖЕСТВО!';
				echo '<br>';
			}
		return $res;
	}
	function massAB()
	{	
		global $p1,$p2;
		$k=0;
		for ( $i = 0; $i < count( $p2) ; $i++ )
		{ 	
			$result1=true;
			for ( $j = 0; $j < count( $p1) ; $j++ )
			{
					if ($p1[$j]==$p2[$i])
					{
						$result1=false;
						break;
					}
			}
			if ($result1==true) {
				$res1[$k]=$p2[$i];
				$k++;
			}
		}
		if ($k!=0)
			{
			$res="";
			for ( $j = 0; $j < count( $res1) ; $j++ )
			$res=$res.$res1[$j]." ";
			} else {
				$res='ПУСТОЕ МНОЖЕСТВО!';
				echo '<br>';
			}
		return $res;
	}	
	if(isset($_GET["massA"]) && isset($_GET["massB"]))
	{
		$massA = $_GET["massA"];
		$massB = $_GET["massB"];
		echo validation($massA,$massB);
		$massA = trim($massA);
		$massB = trim($massB);
		$massA = preg_replace("/(\s){2,}/",' ',$massA);
		$massB = preg_replace("/(\s){2,}/",' ',$massB);
		$p1 = explode(" ", $massA );
		$p2 = explode(" ", $massB );
		$n=count($p1);
		$i = 0;
		if ($n!=1)
		{
			while ($i <$n-1)
			{	
				$j = $i+1;
				while ($j < $n)
					{ 	
						if ($p1[$i]==$p1[$j])
							{	for ( $m = $j; $m <$n ; $m++ )
									{ 	
									$p1[$m]=$p1[$m+1];
									}
								$p1[$n-1]="";
								$n--;
							$j--;
							}
						$j++;
					}
				$i++;
			}
		}
		$n=count($p2);
		$i = 0;
		if ($n!=1)
		{
			while ($i <$n-1)
			{	
				$j = $i+1;
				while ($j < $n)
					{ 	
						if ($p2[$i]==$p2[$j])
							{	for ( $m = $j; $m <$n ; $m++ )
									{ 	
									$p2[$m]=$p2[$m+1];
									}
								$p2[$n-1]="";
								$n--;
								$j--;
							}
						$j++;
					}
				$i++;
			}			
		}
		if ($result==true) {
			echo '<br/>'.'Объединение двух множеств:<br/>';
			echo '{'.Ob().'}';
			echo '<br>';
		}
		if ($result==true) {
			echo '<br/>'.'Пересечение двух множеств:<br/>';
			echo '{'.Per().'}';
			echo '<br>';
		}
		if ($result==true) {
			echo '<br/>'.'Симметрическая разность двух множеств:<br/>';
			echo '{'.MassRaz().'}';
			echo '<br>';
			echo '<br>';
		}
		/*if ($result==true) {
			echo 'Дополнение множества B до множества A:<br/>';
			echo '{'. massBA().'}';
			echo '<br>';
		}*/
		if ($result==true) {
			echo '<br/>'.'Дополнение множества A до множества B:<br/>';
			echo '{'. massAB().'}';
		}
	}
?>
</body>
</html>