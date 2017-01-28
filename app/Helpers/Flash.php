<?php 

namespace App\Helpers;

class Flash
{
    private $important = false;
    
    protected function flash($message, $type)
    {
        session()->flash('notify', [
            'message' => $message,
            'type' => $type
        ]);
        
        return $this;
    }


    public function __call($type, $args)
    {
        $this->flash(array_get($args, 0, 'o_O'), $type);
        
        return $this;
    }
}