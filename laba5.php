<!doctype html>
<html>
	<head>
		<title>
			Лабораторная работа №5
		</title>
	</head>
<body>
<form action="" method="get">
    <p><b>Введите матрицу:</b></p>
    <p><textarea rows="10" cols="45" name="put"><?=htmlspecialchars($_GET['put'])?></textarea></p>
	<p><input type="submit" value="Отправить"></p>
 </form>

 <?php
	if(isset($_GET["put"])) {
		$put = $_GET["put"];
		$res = false;
		$res11 = false;
		$res12 = false;
		$matr1;
		$matri = htmlspecialchars (trim($_GET['put'])); 
		$matri = preg_replace('# {2,}#', ' ', $matri); 
		$matri = preg_replace('#(?:\r?\n){2,}#', "\r\n", $matri); 
		$mas = explode("\r\n", $matri); 
		$temp;
		for ($i = 0; $i < count($mas); $i++) { 
		$mas[$i] = trim($mas[$i]); 
		$matrix[$i] = explode (" ",$mas[$i]); 
}
		$kol=count($mas);	
		echo 'Введенная матрица: ';
		echo '<br>';
		for ($i =0; $i<$kol; $i++) {
			for($l=0; $l<$kol; $l++) {
				echo ($matrix[$i][$l]). ' ';
			}
			echo '<br>';
		}
		//Проверка на квадратичность матрицы
		for ($i =0; $i<$kol; $i++) {
			if (count($matrix[$i])==$kol) {
				$res = true;
			}
			else {
				$res = false;
				break;
			}
		}
		//проверка на введеные элементы(можно вводить только 1 и 0)
		for ($i =0; $i<$kol; $i++) {
			for($l=0; $l<$kol; $l++) {
				if ($matrix[$i][$l]=='1' || $matrix[$i][$l]=='0')  {
					$res11 = true;
				}
				else {
					$res12 = true;
					break;
				}
			}
		}
		if ($res==true && $res11==true && $res12==false) {
			echo '<br>Элементы введены верно, держи результат: <br>';
		}	
		//РОБИТ//
		$s=0;
			for($i=0;$i<$kol; $i++) {
				for($l=0; $l<$kol; $l++) {
					for ($m=0; $m<$kol; $m++) {
						if ($matrix[$i][$m]==1 && $matrix[$m][$l]==1) {
							$s=1;
						}
					}
					if ($s == 1) {
						$matr[$i][$l]=1;
						$temp[$i][$l]=1;
					}
					else {
						$matr[$i][$l]=0;
						$temp[$i][$l]=0;
					}
					$s=0;
				}
			}	
			for($i=0;$i<$kol; $i++) {
				for($l=0; $l<$kol; $l++) {
					$matriza[$i][$l]=$matrix[$i][$l];
				}
			}	
		while ($end < ($kol - 1)) {
				/**СРАВНЕНИЕ*/
				for($i=0;$i<$kol; $i++) {
					for($l=0; $l<$kol; $l++) {
						if ($matriza[$i][$l] == 1 || $temp[$i][$l] == 1) {
							$matriza[$i][$l] = 1;
							
						}
						else {
							$matriza[$i][$l] = 0;
						}
					}
				}
				//Умножение
				for($i=0;$i<$kol; $i++) {
					for($l=0; $l<$kol; $l++) {
						for ($m=0; $m<$kol; $m++) {
							if ($matr[$i][$m]==1 && $matrix[$m][$l]==1) {
								$s=1;
							}
						}
						if ($s == 1) {
							$temp[$i][$l]=1; //куб
						}
						else {
							$temp[$i][$l]=0;
						}
						$s=0;
					}
					}
				/*CРАВНЕНИЕ*/
				for($i=0;$i<$kol; $i++) {
					for($l=0; $l<$kol; $l++) {
						if ($temp[$i][$l] == 1 || $matriza[$i][$l] == 1) {
							$matriza[$i][$l] = 1;
						}
						else {
							$matriza[$i][$l] = 0;
						}
					}
				}
				$end++;
			}	
		for($i=0;$i<$kol; $i++) {
				for($l=0; $l<$kol; $l++) {
					echo ($matriza[$i][$l].' ');
				}
				echo '<br>';
		};
			} 
		else {
			echo 'Ошибка ввода элементов матриц!';
		}
	?>
</form>
</body>
</html>