<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Debug;

use Nooku\Library;

/**
 * Database Event Subscriber
 * 
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Component\Debug
 */
class EventSubscriberDatabase extends Library\EventSubscriberAbstract implements Library\ObjectMultiton
{    
    /**
     * The start time
     * 
     * @var int
     */
    protected $_start = 0;
    
    /**
     * Array of profile marks
     *
     * @var array
     */
    protected $_queries = array();

    /**
     * Get queries
     *
     * @return array Array of the executed database queries
     */
    public function getQueries()
    {
        return $this->_queries;
    }
    
    public function onBeforeDatabaseSelect(Library\Event $event)
    {
        $this->_start = microtime(true);
    }
        
    public function onAfterDatabaseSelect(Library\Event $event)
    {
        $event->time = microtime(true) - $this->_start;
        $this->_queries[] = $event;
    }
    
    public function onBeforeDatabaseUpdate(Library\Event $event)
    {
        $this->_start = microtime(true);
    }
        
    public function onAfterDatabaseUpdate(Library\Event $event)
    {
        $event->time = microtime(true) - $this->_start;
        $this->_queries[] = $event;
    }
    
    public function onBeforeDatabaseInsert(Library\Event $event)
    {
        $this->_start = microtime(true);
    }
                
    public function onAfterDatabaseInsert(Library\Event $event)
    {
        $event->time = microtime(true) - $this->_start;
        $this->_queries[] = $event;
    }
    
    public function onBeforeDatabaseDelete(Library\Event $event)
    {
        $this->_start = microtime(true);
    }
                
    public function onAfterDatabaseDelete(Library\Event $event)
    {
        $event->time = microtime(true) - $this->_start;
        $this->_queries[] = $event;
    }
}