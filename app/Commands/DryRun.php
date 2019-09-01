<?php
namespace Clique\Commands;
class DryRun extends Command{
  public $Command = 'DryRun';
  public function run(){
    echo 'DryRun';
  }
}
