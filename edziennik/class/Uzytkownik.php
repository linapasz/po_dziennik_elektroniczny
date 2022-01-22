<?php
require_once('Lista_uzytkownikow.php');
require_once('Plan_lekcji.php');

//use Lista_uzytkownikow;
//use Plan_lekcji;

/**
 * @access public
 * @author karpasz1
 */
class Uzytkownik {
	/**
	 * @AttributeType string
	 */
	public $imie;
	/**
	 * @AttributeType string
	 */
	public $nazwisko;
	/**
	 * @AttributeType time_t
	 */
	public $dataUrodzenia;
	/**
	 * @AttributeType long int
	 */
	public $pesel;
	/**
	 * @AttributeType string
	 */
	public $miejsceZamieszkania;
	/**
	 * @AttributeType long int
	 */
	public $telefonKontaktowy;
	/**
	 * @AttributeType string
	 */
	public $typUzytkownika;
	/**
	 * @AttributeType bool
	 */
	public $aktywny;
	/**
	 * @AttributeType Lista uzytkownikow
	 * /**
	 *  * @AssociationType Lista uzytkownikow
	 *  * /
	 */
}
?>