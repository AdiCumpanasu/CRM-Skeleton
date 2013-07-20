<?php
/**
 * @access public
 * @author TEST
 * @package DataModel
 */
class Activitate {
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
	public $client;
	/**
	 * @AttributeType string
	 */
	public $tip;
	/**
	 * @AttributeType int
	 */
	public $utilizator_id;
	/**
	 * @AttributeType int
	 */
	public $affected_id;

	/**
	 * @access public
	 */
	public function creeaza() {
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