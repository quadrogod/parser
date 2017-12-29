<?php

namespace Quadrogod\Parser;

abstract class Task {                    

    protected $limit = 5;
    protected $proxy_timeout = 5; // ожидание ответа от сервера, сек.
    protected $request_timeout = 30; // ожидание заершения работы реквеста, сек.
    public $_items = [];
    
    private $_user_agents = [
        'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36',
        'Opera/9.80 (Windows NT 6.2; Win64; x64) Presto/2.12 Version/12.16',
        'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko',
        'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0',
        'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML like Gecko) Chrome/36.0.1985.143 Safari/537.36',
        'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0',
        'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML like Gecko) Chrome/36.0.1985.143 Safari/537.36',
        'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML like Gecko) Chrome/30.0.1599.101 Safari/537.36',
        'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML like Gecko) Chrome/37.0.2062.103 Safari/537.36',
        'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.134 Safari/537.36',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.48 Safari/537.36',
    ];


    protected $table = '';


    public function __construct() 
    {        
        if (empty($this->table)) {
            throw new Exception('Field `table` empty!');
        }
        return;
    }        

    /**
     * получение элементов из базы которые необзодимо спарсить
     */
    abstract public function getItemsList();
    
    //@todo: можно добавить метод setAction($name)
    
    public function execute() 
    {                
        $items = $this->getItemsList();        
    }
    
    function getUserAgentRandom() {	
	if (!empty($this->_user_agents) && is_array($this->_user_agents)) {				
		return $this->_user_agents[mt_rand(0, count($this->_user_agents) - 1)];
	} else {
		return 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36';
	}		
    }
}