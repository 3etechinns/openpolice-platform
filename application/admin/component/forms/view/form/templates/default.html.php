<?
/**
 * Belgian Police Web Platform - Forms Component
 *
 * @copyright	Copyright (C) 2012 - 2013 Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		https://github.com/belgianpolice/internet-platform
 */
?>

<?= helper('behavior.validator'); ?>

<script src="assets://js/koowa.js" />

<ktml:module position="actionbar">
    <ktml:toolbar type="actionbar">
</ktml:module>

<form action="" method="post" id="form-form" class="-koowa-form">
    <input type="hidden" name="published" value="0" />

    <div class="main">
        <div class="title">
            <input class="required" type="text" name="title" maxlength="50" value="<?= escape($form->title) ?>" placeholder="<?= translate('Title') ?>" />
            <div class="slug">
                <span class="add-on">Slug</span>
                <input type="text" name="slug" maxlength="60" value="<?= escape($form->slug) ?>" />
            </div>
        </div>

        <?= object('com:ckeditor.controller.editor')->render(array('name' => 'text', 'text' => $form->text, 'attribs' => array('class' => 'ckeditor-required'))) ?>
    </div>
    <div class="sidebar">
        <?= import('default_sidebar.html'); ?>
    </div>
</form>

<script data-inline>
    CKEDITOR.replace( 'text', {
        toolbar : 'standard',
        removeButtons: 'readmore'
    } );
</script>