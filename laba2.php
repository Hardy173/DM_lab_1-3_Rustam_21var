<!doctype html>
<html>
	<head>
		<title>
			Лабораторная работа №2
		</title>
	</head>
<body>
<form action="" method="get">	
	Матрица <input type="text" name="matrix" value="<?=$_GET['matrix']?>"><br>
	<input type="submit" value="Сделать все действия">
</form>


<?php
	function validation($a){
		$a=trim($a);
		$a = preg_replace("/(\s){2,}/",' ',$a);
		$chislo = array(0,1);
		global $result;
		$result=true;
		$p1 = explode(" ", $a);
		echo 'Введенные элементы в матрицу nxn:';
		echo '<br>';
		$k = count($p1);
		echo 'n = '.$k;
		echo '<br>';
		for ( $i = 0; $i < count( $p1) ; $i++ ) {
			echo ($p1[$i]).'<br>';
		}
		//echo '<br>';
		$res1 = false;
		$res = false;
		$n = 0;
		$m = 0;
		while ($n < $k) {
			while ($m < $k) {
				if(in_array($p1[$n][$m],$chislo) && strlen($p1[$n]) == $k){
					$res1 = true;
				}
				else {
					$res = true;
				}
				$m++;
			}
			$m = 0;
			$n++;
			
		}
		
		
		if ($res1==true && $res==false) {
			$res1='<br>Элементы введены верно, держи результат:';
			
			$result=false;
			} 
		else {
			$res1='<span class="error">Ошибка ввода элементов матрицы!</span>';
			$result=true;
		}
		return $res1;
	}
	function Refl($a){
		$a = trim($a);
		$a = preg_replace("/(\s){2,}/",' ',$a);
		$p1 = explode(" ", $a);
		$k = count($p1);
		$m = 0;
		$n = 0;
		$s = 0;
		$res = false;
		while ($n < $k) {
			while ($m < $k) {
				if($p1[$n][$s]==1) {
					$res1 = true;
					$m = $k;
				}
				else {
					$res = true;
					$m = $k;
				}
				$m++;			
			}
			
			$s = $s + 1;
			$n++;	
			$m = 0;
		}
		if ($res1==true && $res==false) {
			$res1='<br>Рефлексивно';
			}
			else {
				$res1='<br>Не рефлексивно!';
			}
		return $res1;
		
		
	}
	
	
	function Simetr($a){
		$a = trim($a);
		$a = preg_replace("/(\s){2,}/",' ',$a);
		$p1 = explode(" ", $a);
		$k = count($p1);
		$k = $k - 1;
		$p2 = $p1;
		$m = 0;
		$n = 0;
		$z = 0;
		$s = 0;
		$res1= false;
		$res = false;
		while ($m < $k) {
			if ($p1[$n][$s]==$p1[$z][$s1]) {
				$res1=true;
			}
			else {
				$res=true;
			}
			if ($p1[$n][$k]==$p1[$k][$n]) {
				$res1=true;
			}
			else {
				$res=true;
			}
			$n++;
			$m++;
			$s1++;
		}
		
		
		
		if ($res1==true && $res==false) {
			$res1='<br>Симметрично';
			}
			else {
				$res1='<br>Не симметрично!';
			}
		return $res1;
		
	
	}
	
	
	function kososimetr($a){
		$a = trim($a);
		$a = preg_replace("/(\s){2,}/",' ',$a);
		$p1 = explode(" ", $a);
		$k = count($p1);
		$k1 = $k-1;
		$p2 = $p1;
		$z = 1;
		$elm = $z;
		$s = 0;
		$s1 = 0;
		$m1 = 0;
		$res1 = false;
		$res = false;
		$n = 0;
		$m = 0;
		$n1 = 0;
		$z1 = 1;
		while ($n < $k) {
			while ($m < $k) {
				//$s1 = $k1-$z1;
				$s1 = $k1 - $z1;
				if ($p1[$n][$n1]==1 && $p1[$n][$elm]==0 && $p1[$k1-$s][$s1]==0){
					$res = true;
				}
				else{
					$res1 = true;
				}
				$z1++;
				
				$m++;
				$elm++;	
			}
			
			$s++;
			$s1 = 0;
			$m=0;
			$elm = 0;
			$z++;
			$z1 = $z;
			$n1++;
			$n++;
			$elm = $elm + $z;
			
		}
		
	
	if ($res==true && $res1==false) {
			$res1='<br>Кососимметрично';
			}
			else {
				$res1='<br>Не кососимметрично!';
			}
		return $res1;
	}
	
	function tranzitiv($a){
		$a = trim($a);
		$a = preg_replace("/(\s){2,}/",' ',$a);
		$p1 = explode(" ", $a);
		$k = count($p1);
		$res1 = false;
		$res = false;
		

			//$b; 
			/*$n=0;
			$m=0;
			while ($n < $k){
				while ($m < $k) {
					$p2[$n][$m]=$p1[$n][$m]*$p1[$n][$m]; 
					$m++;
				}
				$n++;
			}
			$n=0;
			$m=0;
			while ($n < $k){
				while ($m < $k) {
					if($p2[$n][$m] != $p1[$n][$m]){
						$res1 = true;
					}
					else {
						$res = true;
					}
					$m++;
				}
				$n++;
			}
			
			
			
			*//*
			$n=0;
			$m = 0;
		while ($n < $k) {
			while ($m < $k) {
				$T[$n][$m]=$p1[$n][$m]*$p1[$m][$n];
				$m++;	
			}
			$n++;	
		}
		$n = 0;
		$m = 0;		
		while ($n < $k) {
			while ($m < $k) {
				if($T[$n][$m] != $p1[$n][$m]) { 
						$res1 = true;
				}
				else {
					$res = true;
				}
				$m++;
			}
			$n++;
		}
			*/
			
			/*------------------------------*/
			for($n = 0; $n<$k; $n++) { 
				for($m=0; $m<$k; $m++) { 
					$T[$n][$m]=$p1[$n][$m]*$p1[$m][$n]; 
				} 
			} 
			for($n = 0; $n<$k; $n++) { 
				for($m=0; $m<$k; $m++) { 
					if($T[$n][$m] != $p1[$n][$m]) { 
						$res1 = true;
					} 
					else {
						$res = true;
					}
				} 
			} 

	
		
		
		
		
		
		
		
		/*$n = 0;
		$p2;
		$m = 0;
		while ($n < $k) {
			while ($m < $k) {
				$p2[$n][$m] = $p1[$n][$m]*$p1[$m][$n];
				$m++;	
			}
			$n++;	
		}
		echo ($p2[$n][$m]);
		$n = 0;
		$m = 0;		
		while ($n < $k) {
			while ($m < $k) {
				if ($p2[$n][$m] != $p1[$n][$m]){
					$res1 = true;
				}
				else {
					$res = true;
				}
				$m++;
			}
			$n++;
		}
		
		
		
		
		*/

		if ($res==true && $res1==false) {
			$res1='<br>Транзитивно';
			}
			else {
				$res1='<br>Не транзитивно!';
			}
		return $res1;
	}
	
	
	

	
	
	
	
	
	
	
	
	if(isset($_GET["matrix"]))
	{
		$matrix = $_GET["matrix"];
		$matrix=trim($matrix);
		$matrix = preg_replace("/(\s){2,}/",' ',$matrix);
		$chislo = array(0,1);
		global $result;
		$result=true;
		$p1 = explode(" ", $matrix);
		echo 'Введенные элементы в матрицу nxn:';
		echo '<br>';
		$k = count($p1);
		echo 'n = '.$k;
		echo '<br>';
		for ( $i = 0; $i < count( $p1) ; $i++ ) {
			echo ($p1[$i]).'<br>';
		}
		echo '<br>';
		$res1 = false;
		$res = false;
		$n = 0;
		$m = 0;
		while ($n < $k) {
			while ($m < $k) {
				if(in_array($p1[$n][$m],$chislo) && strlen($p1[$n]) == $k){
					$res1 = true;
				}
				else {
					$res = true;
				}
				$m++;
			}
			$m = 0;
			$n++;
			
		}
		if ($res1==true && $res==false) {
			echo 'Элементы введены верно, держи результат:';
			
			//echo validation($matrix);
			echo Refl($matrix);	
			echo Simetr($matrix);
			echo kososimetr($matrix);
			echo tranzitiv($matrix);
		}
		else {
			echo 'Ошибка ввода элементов матрицы';
			
		}
	}
		
	
	?>
</body>
</html>