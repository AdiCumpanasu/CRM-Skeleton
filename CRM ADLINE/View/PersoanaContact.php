<?php
require_once(realpath(dirname(__FILE__)) . '/../DataModel/Firma.php');

/**
 * @access public
 * @author TEST
 * @package DataModel
 */
class PersoanaContact {
	/**
	 * @AttributeType int
	 */
	public $id;
	/**
	 * @AttributeType datetime
	 */
	public $data;
	/**
	 * @AttributeType string
	 */
	public $nume;
	/**
	 * @AttributeType string
	 */
	public $telefon;
	/**
	 * @AttributeType string
	 */
	public $email;
	/**
	 * @AttributeType string
	 */
	public $act_identitate;
	/**
	 * @AttributeType int
	 */
	public $firma_id;
	/**
	 * @AssociationType DataModel.Firma
	 * @AssociationKind Composition
	 */
	public $unnamed_Firma_;

	/**
	 * @access public
	 */
	public function creeaza() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function arhiveaza() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function actualizeaza() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function read() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function get() {
		// Not yet implemented
	}
}
?>