<?php
class Configuration
{

  //-- Defind configuration parameter for connect database --
  public $config = array(
    'host' => 'localhost',
    'dbname' => 'coedsystem',
    'dbuser' => 'root',
    'dbpass' => '',
    'sitetitle' => 'Xplor : Factor exploring software',
    'session_prefix' => 'cesx_',
    'salt' => 'W54mnFMEVPcHLiDQwbwG44#is0Sr*dkxX'
  );

  //-- Constructor --
  public function __construct(){
    // Code here
  }

}
