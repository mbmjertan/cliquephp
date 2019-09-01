<?php
namespace Clique\Handlers;
class ConfigHandler {
  public $Config;
  function __construct(){
    $this->Config = file_get_contents('config.json');
    $this->Config = json_decode($this->Config);
  }
}
