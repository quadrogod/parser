<?php

namespace Quadrogod\Parser;

abstract class ParserManager {
    
    /**
     * 
     * @param string $task
     * @return \Quadrogod\Parser\Task
     * @throws \Exception
     */
    static function factory($task) 
    {                
        $class_name = '\App\Parser\\Task_' . ucfirst($task);
        //
        if ( ! class_exists($class_name) ) {
            throw new \Exception('Class \'' . $class_name . '\' not found.');
        }                
        
        return new $class_name();        
    }        

    //@todo: можно добавить абстрактный метод setAction($name)

    abstract public function execute();
    
}
