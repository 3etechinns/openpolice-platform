<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		git://git.assembla.com/nooku-framework.git for the canonical source repository
 */

namespace Nooku\Component\Users;

use Nooku\Library;

/**
 * User Controller Toolbar
 *
 * @author  Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @package Nooku\Component\Users
 */
class ControllerToolbarUser extends Library\ControllerToolbarActionbar
{
    /**
     * Add default toolbar commands
     * .
     * @param	Library\CommandContext	$context A command context object
     */
    protected function _afterControllerBrowse(Library\CommandContext $context)
    {
        parent::_afterControllerBrowse($context);
        
        $this->addSeparator();
		$this->addEnable();
		$this->addDisable();
		$this->addSeparator();
    }
}