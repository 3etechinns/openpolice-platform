<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2007 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Library;

/**
 * Event Interface
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Library\Event
 */
interface EventInterface
{
    /**
     * Get the event name
     *
     * @return string	The event name
     */
    public function getName();
    
    /**
     * Set the event name
     *
     * @param string $name The event name
     * @return Event
     */
    public function setName($name);
    
    /**
     * Get the event target
     *
     * @return object	The event target
     */
    public function getTarget();
    
    /**
     * Set the event target
     *
     * @param ObjectInterface $target	The event target
     * @return Event
     */
    public function setTarget(ObjectInterface $target);
    
    /**
     * Stores the EventDispatcher that dispatches this Event
     *
     * @param EventDispatcherInterface $dispatcher
     * @return Event
     */
    public function setDispatcher(EventDispatcherInterface $dispatcher);
    
    /**
     * Returns the EventDispatcher that dispatches this Event
     *
     * @return EventDispatcherInterface
     */
    public function getDispatcher();
    
    /**
     * Returns whether further event listeners should be triggered.
     *
     * @return boolean 	TRUE if the event can propagate. Otherwise FALSE
     */
    public function canPropagate();

    /**
     * Stops the propagation of the event to further event listeners.
     *
     * If multiple event listeners are connected to the same event, no further event listener will be triggered once
     * any trigger calls stopPropagation().
     * 
     * @return Event
     */
    public function stopPropagation();
}