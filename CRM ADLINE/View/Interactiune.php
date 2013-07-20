<?php
require_once(realpath(dirname(__FILE__)) . '/../DataModel/Firma.php');

/**
 * @access public
 * @author TEST
 * @package DataModel
 */
class Interactiune {
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
	public $continut;
	/**
	 * @AttributeType int
	 */
	public $utilizator_id;
	/**
	 * @AttributeType int
	 */
	public $firma_id;
	/**
	 * @AssociationType DataModel.Firma
	 * @AssociationKind Aggregation
	 */
	public $agregareInterFirm;

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