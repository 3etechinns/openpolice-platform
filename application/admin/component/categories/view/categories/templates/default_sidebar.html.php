<?
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		git://git.assembla.com/nooku-framework.git for the canonical source repository
 */
?>

<h3><?= translate('Categories') ?></h3>
<?= import('com:categories.view.categories.list.html', array('categories' => object('com:articles.model.categories')->sort(array('ordering', 'title'))->table($state->table)->getRowset())); ?>
