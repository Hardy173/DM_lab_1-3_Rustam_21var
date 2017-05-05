<!doctype html>
<html>
	<head>
		<title>
			Лабораторная работа №3
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
	function Rezult($a){
		$a=trim($a);
		$a = preg_replace("/(\s){2,}/",' ',$a);
		$chislo = array(0,1);
		global $result;
		$result=true;
		$res = false;
		$res1 = false;
		$p1 = explode(" ", $a);
		$k = count($p1);
		$info = 0;
		$n = 0;
		$m = 0;
		//$n1 = 0;
		while ($n < $k) {
			while ($m < $k) {
				if ($p1[$n][$m] == 1){
					$info++;
				}
				$m++;
			}
			
			
			if ($info == 1) {
				$res1 = true;
			}
			else {
				$res = true;
			}
			
			$info = 0;
			$n++;
			$m = 0;
		}
		
		
		
		
		echo ($info);
		
		if ($res1==true && $res==false) {
			$res1='<br>Функция';
			
			$result=false;
			} 
		else {
			$res1='<br>Не функция';
			$result=true;
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
			echo Rezult($matrix);	
		}
		else {
			echo 'Ошибка ввода элементов матрицы';
			
		}
	}

	
	
	
	
	?>
	
	
	
</form>
</body>
</html>