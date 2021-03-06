<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Articles;

use Nooku\Library;

/**
 * Article Database Row
 *
 * @author  Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @package Nooku\Component\Articles
 */
class DatabaseRowArticle extends Library\DatabaseRowTable
{
    public function __get($column)
    {
        if($column == 'text' && !isset($this->_data['text'])) {
            $this->_data['text'] = $this->fulltext ? $this->introtext.'<hr id="system-readmore" />'.$this->fulltext : $this->introtext;
        }

        return parent::__get($column);
    }

    public function save()
    {
        //Set the introtext and the full text
        $text    = str_replace('<br>', '<br />', $this->text);
        $pattern = '#<hr\s+id=("|\')system-readmore("|\')\s*\/*>#i';

        if(preg_match($pattern, $text))
        {
            list($introtext, $fulltext) = preg_split($pattern, $text, 2);

            $this->introtext = trim($introtext);
            $this->fulltext  = trim($fulltext);
        }
        else
        {
        	$this->introtext = trim($text);
        	$this->fulltext  = '';
        }

        //Validate the title
        if(empty($this->title))
        {
            $this->_status          = Library\Database::STATUS_FAILED;
            $this->_status_message  = JText::_('Article must have a title');

            return false;
        }

        return parent::save();
    }
}