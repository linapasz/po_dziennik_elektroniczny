<?php
require_once(realpath(dirname(__FILE__)) . '/Uzytkownik.php');

use Uzytkownik;

/**
 * @access public
 * @author karpasz1
 */
class Rodzic extends Uzytkownik {
	/**
	 * @AttributeType string[]
	 */
	private $_dzieci;
}
?>