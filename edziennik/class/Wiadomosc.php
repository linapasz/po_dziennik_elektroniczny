<?php
require_once(realpath(dirname(__FILE__)) . '/Skrzynka_odbiorcza.php');

use Skrzynka_odbiorcza;

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
	public function wyslij() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function anuluj() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function podajTresc() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function dodajOdbiorce() {
		// Not yet implemented
	}
}
?>