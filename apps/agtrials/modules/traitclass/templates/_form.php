<?php use_stylesheets_for_form($form); ?>
<?php use_javascripts_for_form($form); ?>
<?php use_javascript('modulesvalidate.js'); ?>

<div class="row">
    <div class="col-md-2 left-column">
        <?php include_partial('admin/ModuleMenu') ?>
    </div>
    <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
        <span class="Title">Trait class</span>
        <?php echo form_tag_for($form, '@tb_traitclass', array('class' => 'form-horizontal', 'id' => 'FormTraitclass', 'enctype' => 'multipart/form-data')) ?>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <?php echo $form->renderHiddenFields(false) ?>
            <?php if ($form->hasGlobalErrors()): ?>
                <?php echo $form->renderGlobalErrors() ?>
            <?php endif; ?> 
            <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
                <?php include_partial('traitclass/form_fieldset', array('tb_traitclass' => $tb_traitclass, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
            <?php endforeach; ?>
        </div>
        <?php include_partial('traitclass/form_actions', array('tb_traitclass' => $tb_traitclass, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        </form>
    </div>
</div>