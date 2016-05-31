<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div id="filterPopup" class="modal fade">
    <form action="<?php echo url_for('tb_variablesmeasured_collection', array('action' => 'filter')) ?>" method="post" class="form-horizontal">
        <span class="Title">Variables measured</span>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <div class="modal-body">
                <?php if ($form->hasGlobalErrors()): ?>
                    <?php echo $form->renderGlobalErrors() ?>
                <?php endif; ?>

                <?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?>
                    <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
                    <?php
                    include_partial('variablesmeasured/filters_field', array(
                        'name' => $name,
                        'attributes' => $field->getConfig('attributes', array()),
                        'label' => $field->getConfig('label'),
                        'help' => $field->getConfig('help'),
                        'form' => $form,
                        'field' => $field,
                        'class' => 'control-type-' . strtolower($field->getType()) . ' control-name-' . $name,
                    ))
                    ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-action"><?php echo __('<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Filter', array(), 'sf_admin') ?></button>
            <?php echo link_to(__('<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Reset', array(), 'sf_admin'), 'tb_variablesmeasured_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'btn btn-action')) ?>
            <a class="btn btn-action" class="close" data-dismiss="modal"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span> Close</a>
        </div>
        <?php echo $form->renderHiddenFields() ?>
    </form>
</div>
