<?php
namespace Clique\Commands;
class UnknownCommand extends Command{
  public $Command = 'UnknownCommand';
  public function run(){
    echo 'Unknown command.';
  }
}
