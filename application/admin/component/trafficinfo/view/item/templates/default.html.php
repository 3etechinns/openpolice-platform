<?
/**
 * Belgian Police Web Platform - Trafficinfo Component
 *
 * @copyright	Copyright (C) 2012 - 2013 Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.police.be
 */
?>

<?= helper('behavior.validator'); ?>

<ktml:module position="actionbar">
    <ktml:toolbar type="actionbar">
</ktml:module>

<!--
<script src="media://js/koowa.js" />
-->

<form action="" method="post" class="-koowa-form">
	<div class="form-body">
		<div class="title">
		    <input class="required" type="text" name="title" maxlength="255" value="<?= $item->title ?>" placeholder="<?= translate('Title') ?>" />
		</div>
		
		<div class="form-content">
			<fieldset>
				<legend><?= translate( 'Information' ); ?>:</legend>
				
				<div>
					<label for="title_fr" class="control-label"><?= translate( 'Title FR' ); ?>:</label>
					<div>
						<input type="text" name="title_fr" size="32" maxlength="250" value="<?= $item->title_fr; ?>" />
					</div>
				</div>
				
				<div>
					<label for="type" class="control-label"><?= translate( 'Type' ); ?>:</label>
					<div>
						<?= helper('listbox.groups', array('selected'  => $item->group)) ?>
					</div>
				</div>				
			</fieldset>
		</div>
	</div>
</form>