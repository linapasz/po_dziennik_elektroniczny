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
	private $_temat;
	/**
	 * @AttributeType string
	 */
	private $_odbiorca;
	/**
	 * @AttributeType string
	 */
	private $_nadawca;
	/**
	 * @AttributeType time_t
	 */
	private $_dataWyslania;
	/**
	 * @AttributeType string
	 */
	private $_tresc;
	/**
	 * @AttributeType Skrzynka odbiorcza
	 * /**
	 *  * @AssociationType Skrzynka odbiorcza
	 *  * /
	 */
	/**
	 * @access public
	 */
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

}
?>