<?php
require_once(realpath(dirname(__FILE__)) . '/Ocena.php');
require_once(realpath(dirname(__FILE__)) . '/Klasa.php');
require_once(realpath(dirname(__FILE__)) . '/Uzytkownik.php');

use Ocena;
use Klasa;
use Uzytkownik;

/**
 * @access public
 * @author karpasz1
 */
class Uczen extends Uzytkownik {
	/**
	 * @AttributeType string
	 */
	private $klasaUcznia;
	/**
	 * @AttributeType int
	 */
	private $numerWdzienniku;
	/**
	 * @AttributeType bool
	 */
	private $sklasyfikowany;
	/**
	 * @AttributeType Ocena
	 * /**
	 *  * @AssociationType Ocena
	 *  * /
	 */

	/**
	 * @access public
	 */
	public function zmienKlase($idUz, $klasaUcznia) {
		$conn = mysqli_connect('localhost', 'root','', 'edziennik');

		$sql = "UPDATE uczniowie  SET klasa="$klasaUcznia" WHERE iduz='$idUz'"  ;
		//obsluga bledow
		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Zapisano');</script>";
			echo "<script>window.location.href='uzytkownicy.php';</script>";
			exit();
		}
		else{
			echo "<script>alert('Niepoprawne dane');</script>";
			echo "<script>window.location.href='edytuj_uzytkownika.php';</script>";
		}
	mysqli_close($conn);
	}
}
?>