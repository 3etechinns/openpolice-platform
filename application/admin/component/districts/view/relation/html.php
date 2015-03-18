<?php
/**
 * Belgian Police Web Platform - Districts Component
 *
 * @copyright	Copyright (C) 2012 - 2013 Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		https://github.com/belgianpolice/internet-platform
 */

use Nooku\Library;

class DistrictsViewRelationHtml extends Library\ViewHtml
{
    public function render()
    {
        $model      = $this->getModel();
        $relation   = $model->getRow();

        if($relation->isLocatable())
        {
            $this->street = $relation->getStreets()->top();
        }

        return parent::render();
    }
}