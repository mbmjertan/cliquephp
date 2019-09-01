<?php
namespace Clique\Handlers;
class CommandExecutionHandler {
  private $argc;
  private $argv;
  private $AvailableCommands;
  private $AvailableCommandsClasses;
  private $ClassNamespace;
  public function __construct($Commands){
    foreach($Commands as $Command => $Class){
      $ConfigHandler = new ConfigHandler;
      $this->ClassNamespace = $ConfigHandler->Config->CommandNamespace;
      $this->AvailableCommands[] = $Command;
      $this->AvailableCommandsClasses[] = $this->ClassNamespace.'\\'.$Class;
    }
  }

  public function run($argc, $argv){
    if($argc>1){
      $CommandRan = false;
      foreach($this->AvailableCommands as $Key => $Command){
        if($argv[1] == $Command){
          $Arguments = array_splice($argv, 1);
          $CommandInstance = new $this->AvailableCommandsClasses[$Key]($Arguments);
          $CommandInstance->run();
          $CommandRan = true;
          break;
        }
      }
      if(!$CommandRan){
        if(!in_array("Clique\\Commands\\UnknownCommand", $this->AvailableCommandsClasses)){
          throw new \Exception("Unknown command");
        }
        else{
          $CommandInstance = new \Clique\Commands\UnknownCommand;
          $CommandInstance->run();
        }
      }
    }
    else{
      if(in_array("Clique\\Commands\\DryRun", $this->AvailableCommandsClasses)){
        $CommandInstance = new \Clique\Commands\DryRun;
        $CommandInstance->run();
      }
      elseif(!in_array("Clique\\Commands\\Help", $this->AvailableCommandsClasses) && !in_array("Clique\\Commands\\UnknownCommand", $this->AvailableCommandsClasses)){
        throw new \Exception("No set command");
      }
      else{
        if(in_array("Clique\\Commands\\Help", $this->AvailableCommandsClasses)){
          $CommandInstance = new \Clique\Commands\Help;
          $CommandInstance->run();
        }
        else{
          $CommandInstance = new \Clique\Commands\UnknownCommand;
          $CommandInstance->run();
        }
      }
    }
  }
}
