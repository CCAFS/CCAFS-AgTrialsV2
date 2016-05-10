<div class="form-actions">
    <?php if ($form->isNew()): ?>
        <?php echo $helper->linkToDelete($form->getObject(), array('params' => 'class= fg-button ui-state-default fg-button-icon-left ', 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete', 'ui-icon' => '',)) ?>
        <div class="btn-group">
            <?php echo $helper->linkToList(array('params' => 'class= fg-button ui-state-default fg-button-icon-left ', 'class_suffix' => 'list', 'label' => 'Back to list', 'ui-icon' => '',)) ?>
            <?php echo $helper->linkToSave($form->getObject(), array('params' => 'class= fg-button ui-state-default fg-button-icon-left ', 'class_suffix' => 'save', 'label' => 'Save', 'ui-icon' => '',)) ?>
        </div>
    <?php else: ?>
        <?php echo $helper->linkToDelete($form->getObject(), array('params' => 'class= fg-button ui-state-default fg-button-icon-left ', 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete', 'ui-icon' => '',)) ?>
        <div class="btn-group">
            <?php echo $helper->linkToList(array('params' => 'class= fg-button ui-state-default fg-button-icon-left ', 'class_suffix' => 'list', 'label' => 'Back to list', 'ui-icon' => '',)) ?>
            <?php echo $helper->linkToSave($form->getObject(), array('params' => 'class= fg-button ui-state-default fg-button-icon-left ', 'class_suffix' => 'save', 'label' => 'Save', 'ui-icon' => '',)) ?>
            <?php echo $helper->linkToNew(array('params' => 'class= fg-button ui-state-default  ', 'class_suffix' => 'new', 'label' => 'New',)) ?>
        </div>
    <?php endif; ?>
</div>