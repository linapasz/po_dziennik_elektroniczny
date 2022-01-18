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
	public $_imie;
	/**
	 * @AttributeType string
	 */
	public $_nazwisko;
	/**
	 * @AttributeType time_t
	 */
	public $_dataUrodzenia;
	/**
	 * @AttributeType long int
	 */
	public $_pesel;
	/**
	 * @AttributeType string
	 */
	public $_miejsceZamieszkania;
	/**
	 * @AttributeType long int
	 */
	public $_telefonKontaktowy;
	/**
	 * @AttributeType string
	 */
	public $_typUzytkownika;
	/**
	 * @AttributeType bool
	 */
	public $_aktywny;
	/**
	 * @AttributeType Lista uzytkownikow
	 * /**
	 *  * @AssociationType Lista uzytkownikow
	 *  * /
	 */
}
?>