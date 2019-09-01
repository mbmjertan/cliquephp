<?php
namespace Clique\Handlers;
class ExceptionHandler {
  private $Exception;
  private $Message;
  private function ExceptionMessageGenerator(){
    $Message = "***********************\n
                 *   clique exception  *\n
                 ***********************";
   $Message .= "\n";
   $Message .= "An exception occured during execution: \n";
   $Message .= $this->Exception;
  }

  public function Handle(Throwable $Exception=null){
    $ConfigHandler = new ConfigHandler;
    if($ConfigHandler->Config->Environment == 'Development'){
      $this->Exception = $Exception;
    }
    $this->ExceptionMessageGenerator();
    echo $this->Message;
    die();
  }
}
