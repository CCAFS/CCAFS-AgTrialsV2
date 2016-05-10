<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<div class="sf_admin_form">
    <?php echo form_tag_for($form, '@sf_guard_group', array('enctype' => 'multipart/form-data', 'id' => 'FormGuardGroup', 'name' => 'FormGuardGroup')) ?>
    <?php echo $form->renderHiddenFields() ?>
    <?php
    $count = 0;
    foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields):
        $count++;
    endforeach;
    ?>

    <div id="sf_admin_form_tab_menu">
        <?php if ($count > 1): ?>
            <ul>
                <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
                    <?php $count++ ?>
                    <li><a href="#sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>"><?php echo __($fieldset, array(), 'messages') ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif ?>

        <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
            <?php include_partial('sfGuardGroup/form_fieldset', array('sfGuardGroup' => $sf_guard_group, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
        <?php endforeach; ?>
    </div>
    <div id="BotonAccionesFijo"  class="fg-toolbar ui-widget-header ui-corner-all">
        <div class="sf_admin_actions_block ui-widget ui-helper-clearfix">
            <?php include_partial('sfGuardGroup/form_actions', array('sfGuardGroup' => $sf_guard_group, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        </div>
    </div>
    <br><br>
    </form>
</div>
