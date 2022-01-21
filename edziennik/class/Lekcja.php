<?php
//use Przedmiot;
//use Obecnosc;

/**
 * @access public
 * @author karpasz1
 */
class Lekcja {
	/**
	 * @AttributeType string
	 */
	private $tematLekcji;
	/**
	 * @AttributeType time_t
	 */
	private $dataLekcji;
	/**
	 * @AttributeType time_t
	 */

	/**
	 * @access public
	 */
	public function wyswietlSzczegolyLekcji() {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
	
		$sql = "SELECT * FROM lekcje
		WHERE idlekcji='".$_SESSION["idlekcji"]."'"  ;

		if (mysqli_query($conn, $sql)) {
			
		}
		else{
			echo "<script>alert('Błąd lekcji');</script>";
			echo "<script>window.location.href='plan_lekcji.php';</script>";
		}
	mysqli_close($conn);
	}

	/**
	 * @access public
	 */
	public function wpiszTemat($tematLekcji, $idLekcji) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		
		$sql = "UPDATE lekcje  SET tematlekcji='$tematLekcji'
		WHERE idlekcji='$idLekcji'"  ;

		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Zapisano');</script>";
			echo "<script>window.location.href='plan_lekcji.php';</script>";
			exit();
		}
		else{
			echo "<script>alert('Niepoprawne dane');</script>";
			echo "<script>window.location.href='editLesson.php';</script>";
		}
	mysqli_close($conn);
	}

	/**
	 * @access public
	 */
	public function sprawdzObecnosc() {
		// Not yet implemented
	}
}
?>