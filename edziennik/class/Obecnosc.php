<?php
//require_once(realpath(dirname(__FILE__)) . '/Lekcja.php');

//use Lekcja;

/**
 * @access public
 * @author karpasz1
 */
class Obecnosc {
	/**
	 * @AttributeType string
	 */
	private $obecnosc;
	/**
	 * @AttributeType Lekcja
	 * /**
	 *  * @AssociationType Lekcja
	 *  * /
	 */

	public function obecny($idUz, $idLekcji) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		$sql = "SELECT * FROM obecnosci WHERE uczniowie_uzytkownicy_iduz='$idUz' AND lekcje_idlekcji='$idLekcji'";
		$result=mysqli_query($conn, $sql);
		if ($result==NULL){
			$sql = "INSERT INTO obecnosci (lekcje_idlekcji, uczniowie_uzytkownicy_iduz, obecnosc) VALUES ('$idLekcji', '$idUz', '1')";
			$result=mysqli_query($conn, $sql);
			if ($result == TRUE) {
				echo "Obecnosc zmieniona";
			  } else {
				echo "Error przy zmienianiu obecnosci: " . $conn->error;
			  }
		}
		else {
			$sql = "UPDATE obecnosci SET obecnosc=1 WHERE obecnosci.uczniowie_uzytkownicy_iduz='$idUz' AND lekcje_idlekcji='$idLekcji'";
			$result=mysqli_query($conn, $sql);
			if ($result == TRUE) {
				echo "Obecnosc zmieniona";
			  } else {
				echo "Error przy zmienianiu obecnosci: " . $conn->error;
			  }
		}
	}

	/**
	 * @access public
	 */
	public function nieobecny($idUz, $idLekcji) {
		echo 1;
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		$sql = "SELECT * FROM obecnosci WHERE uczniowie_uzytkownicy_iduz='$idUz' AND lekcje_idlekcji='$idLekcji'";
		$result=mysqli_query($conn, $sql);
		if ($result==NULL){
			$sql = "INSERT INTO obecnosci (lekcje_idlekcji, uczniowie_uzytkownicy_iduz, obecnosc) VALUES ('$idLekcji', '$idUz', '0')";
			$result=mysqli_query($conn, $sql);
			if ($result == TRUE) {
				echo "Obecnosc zmieniona";
			  } else {
				echo "Error przy zmienianiu obecnosci: " . $conn->error;
			  }
		}
		else {
			$sql = "UPDATE obecnosci SET obecnosc=0 WHERE obecnosci.uczniowie_uzytkownicy_iduz='$idUz' AND lekcje_idlekcji='$idLekcji'";
			$result=mysqli_query($conn, $sql);
			if ($result == TRUE) {
				echo "Obecnosc zmieniona";
			  } else {
				echo "Error przy zmienianiu obecnosci: " . $conn->error;
			  }
		}
	}

	/**
	 * @access public
	 */
	public function usprawiedliw($idUz,$idLekcji,$obecnosc) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		if($obecnosc=0){
			$sql = "UPDATE obecnosci SET obecnosc=1 WHERE uczniowie_uzytkownicy_iduz='$idUz' AND lekcje_idlekcji='$idLekcji' ";
		}
		$result=mysqli_query($conn, $sql);
		if ($result == TRUE) {
			echo "Usprawiedliwiono";
		  } else {
			echo "Error przy usprawiedliwianiu: " . $conn->error;
		  }
	}

	/**
	 * @access public
	 */
	public function wyswietlObecnosc($idLekcji) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');

		 if($_SESSION['usertype']=='uczen'){
			$sql = "SELECT obecnosci.idobecnosci,obecnosci.uczniowie_uzytkownicy_iduz, obecnosci.obecnosc, uzytkownicy.imie, uzytkownicy.nazwisko, uzytkownicy.iduz
			FROM obecnosci
			INNER JOIN uczniowie ON uczniowie.uzytkownicy_iduz=obecnosci.uczniowie_uzytkownicy_iduz
			INNER JOIN uzytkownicy ON uzytkownicy.iduz=uczniowie.uzytkownicy_iduz
			WHERE obecnosci.lekcje_idlekcji = '$idLekcji' AND obecnosci.uczniowie_uzytkownicy_iduz='".$_SESSION["userid"]."'
			ORDER BY uzytkownicy.nazwisko ASC";
		}
		else if($_SESSION['usertype']=='rodzic') {
			$sql = "SELECT obecnosci.idobecnosci,obecnosci.uczniowie_uzytkownicy_iduz, obecnosci.obecnosc, uzytkownicy.imie, uzytkownicy.nazwisko, uzytkownicy.iduz
			FROM obecnosci
			INNER JOIN uczniowie ON uczniowie.uzytkownicy_iduz=obecnosci.uczniowie_uzytkownicy_iduz
			INNER JOIN uzytkownicy ON uzytkownicy.iduz=uczniowie.uzytkownicy_iduz
			INNER JOIN rodzice ON rodzice.iduz=obecnosci.uczniowie_uzytkownicy_iduz
			WHERE obecnosci.lekcje_idlekcji = '$idLekcji' AND rodzice.iduz='".$_SESSION["userid"]."'
			ORDER BY uzytkownicy.nazwisko ASC";
		}
		else {
			$sql = "SELECT obecnosci.idobecnosci,obecnosci.uczniowie_uzytkownicy_iduz, obecnosci.obecnosc, uzytkownicy.imie, uzytkownicy.nazwisko, uzytkownicy.iduz
			FROM obecnosci
			INNER JOIN uczniowie ON uczniowie.uzytkownicy_iduz=obecnosci.uczniowie_uzytkownicy_iduz
			INNER JOIN uzytkownicy ON uzytkownicy.iduz=uczniowie.uzytkownicy_iduz
			WHERE obecnosci.lekcje_idlekcji = '$idLekcji'
			ORDER BY uzytkownicy.nazwisko ASC";
		}

		$result = mysqli_query($conn, $sql);
		$records = mysqli_num_rows($result);
		if ($records > 0) {
			$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$count = 1;
			foreach ($row as $row) { 
				$idUz=$row['uczniowie_uzytkownicy_iduz'];
				echo "<tr>";
				echo "<th>" . $row['imie'] ."</th>";
				echo "<th>" . $row['nazwisko'] ."</th>";
				echo "<th>" . $row['obecnosc'] ."</th>";
				if($_SESSION['usertype']=='rodzic' ){
					echo '<th><form method="post">
					<button type="submit" name="'.$row['uczniowie_uzytkownicy_iduz'].'" class="btn btn-success btn-xs">Usprawiedliw</button>
					</form></th>';
					if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST[$row['uczniowie_uzytkownicy_iduz']])){				
						Obecnosc::usprawiedliw($idUz,$idLekcji,$row['obecnosc']);
						echo '<meta http-equiv="Refresh" content="0;url=obecnosci_sprawdz.php">';
					}
					
				}
				else if ($_SESSION['usertype']!='uczen' ){
					echo '<th><form method="post">
					<button type="submit" name="'.$row['uczniowie_uzytkownicy_iduz'].'" class="btn btn-success btn-xs">Nieobecny</button>
					</form></th>';
					if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST[$row['uczniowie_uzytkownicy_iduz']])){				
						Obecnosc::nieobecny($idUz,$idLekcji);
						echo '<meta http-equiv="Refresh" content="0;url=obecnosci_sprawdz.php">';
					}
					
					echo '<th><form method="get">
					<button type="submit" name="'.$row['iduz'].'" class="btn btn-success btn-xs">Obecny</button>
					</form></th>';
					if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET[$row['iduz']])){				
						Obecnosc::obecny($idUz,$idLekcji);
						echo '<meta http-equiv="Refresh" content="0;url=obecnosci_sprawdz.php">';
					}
				}
				echo "</tr>";
			}
	}
	}
}
?>