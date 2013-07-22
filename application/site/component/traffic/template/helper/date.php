<?php
/**
 * Belgian Police Web Platform - Traffic Component
 *
 * @copyright	Copyright (C) 2012 - 2013 Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.police.be
 */

use Nooku\Library;

class TrafficTemplateHelperDate extends Library\TemplateHelperDate
{
    public function timestamp($config = array())
    {
        $config = new Library\ObjectConfig($config);
        $config->append(array(
            'start_on'   => null,
            'end_on'     => null
        ));

        $html = array();

        $html[] = $this->format(array('date'=> $config->start_on, 'format' => JText::_('DATE_FORMAT_LC4')));

        if (!$config->end_on) {
            $html[] = JText::_('till');
            $html[] = JText::_('end undefined');
        }

        if ($config->start_on < $config->end_on) {
            $html[] = JText::_('till');
            $html[] = $this->format(array('date'=> $config->end_on, 'format' => JText::_('DATE_FORMAT_LC4')));
        }

        return implode(' ', $html);
    }
}