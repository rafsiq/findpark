<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader {
 
  public function __construct() {
    parent::__construct();
  }
 
  public function getInterface($strInterfaceName) {
    require_once APPPATH . '/interface/' . $strInterfaceName . '.php';
  }
 
}