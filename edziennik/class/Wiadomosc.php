<?php
require_once(realpath(dirname(__FILE__)) . '/Skrzynka_odbiorcza.php');

/**
 * @access public
 * @author karpasz1
 */
class Wiadomosc {
	/**
	 * @AttributeType string
	 */
	private $temat;
	/**
	 * @AttributeType string
	 */
	private $odbiorca;
	/**
	 * @AttributeType string
	 */
	private $nadawca;
	/**
	 * @AttributeType time_t
	 */
	private $dataWyslania;
	/**
	 * @AttributeType string
	 */
	private $tresc;
	/**
	 * @AttributeType Skrzynka odbiorcza
	 * /**
	 *  * @AssociationType Skrzynka odbiorcza
	 *  * /
	 */


	/**
	 * @access public
	 */
	//funkcja do wyslania wiadomosci do konkretnego uzytkownika
	public function wyslij($temat,$idNadawcy,$dataWyslania,$tresc,$idOdbiorcy) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
	
		$sql = "INSERT INTO wiadomosci ( temat, idnadawcy, datawyslania, tresc, uzytkownicy_iduz) 
		VALUES ('$temat','$idNadawcy','$dataWyslania','$tresc','$idOdbiorcy')";

		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Wyslano');</script>";
			echo "<script>window.location.href='poczta.php';</script>";
			exit();
		}
		else{
			echo "<script>alert('Niepoprawne dane');</script>";
			echo "<script>window.location.href='poczta.php';</script>";
		}
	mysqli_close($conn);
	}

	
	/**
	 * @access public
	 */
	//funkcja do wyslania wiadomosci do konkretnego uzytkownika
	public function anuluj(){
		if($_SESSION["todo"==0]){
			echo "<script>alert('Anulowano');</script>";
			exit();
			$_SESSION["message"]=NULL;
		}
	}

	/**
	 * @access public
	 */
	//wpisanie tresci, jesli brak - komunikat
	public function podajTresc(){
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["wiadomosc"])){
			$tresc = $_SESSION["idWiadomosci"] ;
			Skrzynka_odbiorcza::wyswietlWiadomosc();
		}
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		$sql = "INSERT INTO wiadomosci ( tresc ) VALUES ('$tresc')";
		if (mysqli_query($conn, $sql)) {
			exit();
		}
		else{
			echo "<script>alert('Brak tresci');</script>";
		}
		mysqli_close($conn);
	}

			/**
	 * @access public
	 */
	//wpisanie odbiorcy, jesli brak - komunikat
	public function dodajOdbiorce(){
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["wiadomosc"])){
			$odbiorca = $_SESSION["idodbiorcy"] ;
		}

		$conn = mysqli_connect('localhost', 'root','', 'edziennik');
		$sql = "INSERT INTO wiadomosci ( idodbiorcy) VALUES ('$odbiorca')";
		if (mysqli_query($conn, $sql)) {
			exit();
		}
		else{
			echo "<script>alert('Brak odbiorcy');</script>";
		}
		mysqli_close($conn);
	}
}
?>