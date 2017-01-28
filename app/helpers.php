<?php 

if(! function_exists('flash')){
    function flash($message=null)
    {
        $class = new \App\Helpers\Flash();
        
        if(! is_null($message)){
            $class->success($message);
        }
        
        return $class;
    }
}