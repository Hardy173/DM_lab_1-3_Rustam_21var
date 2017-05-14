<!doctype html>
<html>
	<head>
		<title>
			Лабораторная работа №4
		</title>
	</head>
<body>
<form action="" method="get">
    <p><b>Введите таблицу дорог:</b></p>
    <p><textarea rows="10" cols="45" name="put"><?=htmlspecialchars($_GET['put'])?></textarea></p>
	Начальная вершина <input type="text" name="ver1"><br>
	Конечная вершина <input type="text" name="ver2"><br>
	<p><input type="submit" value="Отправить"></p>
 </form>

 <?php		
	if(isset($_GET["put"]) && isset($_GET["ver1"]) && isset($_GET["ver2"])) {
		$put = $_GET["put"];
		$ver1 = $_GET["ver1"];
		$ver2 = $_GET["ver2"];
		$res = false;
		$res11 = false;
		$res12 = false;
		$null= false;
		$matri = htmlspecialchars (trim($_GET['put'])); 
		$matri = preg_replace('# {2,}#', ' ', $matri); 
		$matri = preg_replace('#(?:\r?\n){2,}#', "\r\n", $matri); 
		$mas = explode("\r\n", $matri); 
		for ($i = 0; $i < count($mas); $i++) { 
			$mas[$i] = trim($mas[$i]); 
			$matrix[$i] = explode (" ",$mas[$i]); 
		}
		$kol=count($mas);
		/*Проверка на квадратичность*/
		for ($i = 0; $i<$kol; $i++) {
			if (count($matrix[$i])==$kol) {
				$res = true;
			}
			else {
				$res = false;
				break;
			}
		}
		/*Проверка на симметричность*/
		$k=0;
		$m=0;
		while ($m<$kol){
		for ($i = $m; $i<$kol; $i++) {
			if ($matrix[$i][$k] == $matrix[$k][$i]) {
				$res11= true;
			}
			else {
				$res12= true;
			}
		}
		$k++;
		$m++;
		}
		/*Проверка на 0 на главной диагонали*/
		$i=0;
		$l=0;
		for ($i = 0; $i<$kol; $i++) {
			if ($matrix[$i][$i] != 0) {
				$matrix[$i][$i] = 0;
			}
		}
		if ($res == true && $res11==true && $res12==false && $null==false) {
			echo 'Всё верно! Держи результат!';
			echo '<br>';
			
			//ИЗМЕНЯЕМ ГДЕ 0 НА 99999
			for($i = 0; $i< $kol; $i++) {
				for($l = 0; $l< $kol; $l++) {
					if ($matrix[$i][$l] == 0) {
						$matr[$i][$l] = 99999;
					}
					else {
						$matr[$i][$l] = $matrix[$i][$l];
					}
				}
			}
			//ИСТОРИЯ ПУТЕЙ, КУДА МОЖНО ПОПАСТЬ
			for($i = 0; $i< $kol; $i++) {
				for($l = 0; $l< $kol; $l++) {
					if ($matrix[$i][$l] != 0) {
						$history[$i][$l] = $l;
					}
					else {
						$history[$i][$l] = 0;
					}
				}
			}
			for ($a = 0; $a < $kol; $a++) {
				for ($b = 0; $b < $kol; $b++) {
					for ($c = 0; $c < $kol; $c++) {
						if ($matr[$b][$a] + $matr[$a][$c] < $matr[$b][$c]) {
							$matr[$b][$c] = $matr[$b][$a] + $matr[$a][$c];
							$history[$b][$c] = $history[$b][$a]; 
						}
					}
				}
			}
			echo '<br>';
			$mmm = $ver1;
			$i = $ver2;
			//$i= $i+1;
			$b = 0;
			while ($i < $kol)
			{
				 if ($matr[$ver1][$i] != 99999) {
					echo 'Расстояние от '.$ver1.' до '.$i.' = '.$matr[$ver1][$i];
					echo ' ';
					echo 'Вершины: (';
					for ($a = 0; $a < $kol; $a++) {
						if ($mmm != $i) {
							echo $mmm.'-';
							//echo ($history[$mmm][$i]);
							$mmm = $history[$mmm][$i];
						}
					}
					echo $mmm.')';
					echo '<br>';
				 }
				 else {
					echo 'Расстояние от '.$ver1.' до '.$i.' = Дороги нет';
					echo '<br>';
				 }
				 $i++;
				 $mmm = $ver1;
				 break;
			}
		}
		else {
			echo 'Элементы матрицы введены не верно!';
		}
	}
?>	
	
</form>
</body>
</html>