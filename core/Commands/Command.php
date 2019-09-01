<?php
namespace Clique\Commands;

class Command {

  public $Name;
  public $Command;
  public $Description;
  public $Help;
  public $Usage;
  public $ExecutionArguments;
  public $Arguments;

  public function __construct($Arguments = null){
    $this->ExecutionArguments = $Arguments;
  }

}
