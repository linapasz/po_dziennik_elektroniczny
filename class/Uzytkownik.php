<?php
require_once(realpath(dirname(__FILE__)) . '/Lista_uzytkownikow.php');
require_once(realpath(dirname(__FILE__)) . '/Plan_lekcji.php');

use Lista_uzytkownikow;
use Plan_lekcji;

/**
 * @access public
 * @author karpasz1
 */
class Uzytkownik {
	/**
	 * @AttributeType string
	 */
	private $_imie;
	/**
	 * @AttributeType string
	 */
	private $_nazwisko;
	/**
	 * @AttributeType time_t
	 */
	private $_dataUrodzenia;
	/**
	 * @AttributeType long int
	 */
	private $_pesel;
	/**
	 * @AttributeType string
	 */
	private $_miejsceZamieszkania;
	/**
	 * @AttributeType long int
	 */
	private $_telefonKontaktowy;
	/**
	 * @AttributeType string
	 */
	private $_typUzytkownika;
	/**
	 * @AttributeType bool
	 */
	private $_aktywny;
	/**
	 * @AttributeType Lista u�ytkownik�w
	 * /**
	 *  * @AssociationType Lista u�ytkownik�w
	 *  * /
	 */
}
?>