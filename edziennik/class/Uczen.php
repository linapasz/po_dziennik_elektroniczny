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
	private $_klasaUcznia;
	/**
	 * @AttributeType int
	 */
	private $_numerWdzienniku;
	/**
	 * @AttributeType bool
	 */
	private $_sklasyfikowany;
	/**
	 * @AttributeType Ocena
	 * /**
	 *  * @AssociationType Ocena
	 *  * /
	 */

	/**
	 * @access public
	 */
	public function zmienKlase() {
		// Not yet implemented
	}
}
?>