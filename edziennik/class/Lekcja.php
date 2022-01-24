<?php
include("Obecnosc.php");
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
			echo "<script>alert('Udane wyszukiwanie');</script>";
		}
		else{
			echo "<script>alert('Blad lekcji');</script>";
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
			echo "<script>window.location.href='edytuj_lekcje.php';</script>";
		}
	mysqli_close($conn);
	}

	/**
	 * @access public
	 */
	public function sprawdzObecnosc() {
		$obecnosc = new Obecnosc();
		$result = $obecnosc->wyswietlObecnosc();
		if ($result) {
			echo "<script>alert('Zapisano');</script>";
			exit();
		}
		else{
			echo "<script>alert(Blad zapisu danych');</script>";
		}

	}

}
?>