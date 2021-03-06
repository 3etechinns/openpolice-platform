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
 * Abstract Controller Behavior
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Library\Controller
 */
abstract class ControllerBehaviorAbstract extends BehaviorAbstract
{
    /**
     * Command handler
     *
     * This function translates the command name that starts with 'action' to a command handler function of the format
     * '_action[Action]'
     *
     * @param   string          $name     The command name
     * @param   CommandContext  $context  The command context
     * @return  boolean  Can return both true or false.
     */
    public function execute($name, CommandContext $context)
    {
        $this->setMixer($context->getSubject());

        $parts = explode('.', $name);
        if ($parts[0] == 'action')
        {
            $method = '_action' . ucfirst($parts[1]);

            if (method_exists($this, $method)) {
                return $this->$method($context);
            }
        }

        return parent::execute($name, $context);
    }

    /**
     * Get the methods that are available for mixin based
     *
     * This function also dynamically adds a function of format _action[Action]
     *
     * @param ObjectMixable $mixer The mixer requesting the mixable methods.
     * @return array An array of methods
     */
    public function getMixableMethods(ObjectMixable $mixer = null)
    {
        $methods = parent::getMixableMethods($mixer);

        foreach ($this->getMethods() as $method)
        {
            if (substr($method, 0, 7) == '_action') {
                $methods[strtolower(substr($method, 7))] = strtolower(substr($method, 7));
            }
        }

        return $methods;
    }
}