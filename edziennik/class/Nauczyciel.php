<?php
require_once(realpath(dirname(__FILE__)) . '/Ocena.php');
require_once(realpath(dirname(__FILE__)) . '/Przedmiot.php');
require_once(realpath(dirname(__FILE__)) . '/Uzytkownik.php');

use Ocena;
use Przedmiot;
use Uzytkownik;

/**
 * @access public
 * @author karpasz1
 */
class Nauczyciel extends Uzytkownik {
	/**
	 * @AttributeType string
	 */
	private $_przedmiot;
	/**
	 * @AttributeType Ocena
	 * /**
	 *  * @AssociationType Ocena
	 *  * /
	 */
}
?>