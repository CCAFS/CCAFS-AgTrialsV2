<ul class="sf_admin_actions_form">
    <?php if ($form->isNew()): ?>
        <?php echo $helper->linkToDelete($form->getObject(), array('params' => 'class= fg-button ui-state-default fg-button-icon-left ', 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete', 'ui-icon' => '',)) ?>
        <?php echo $helper->linkToList(array('params' => 'class= fg-button ui-state-default fg-button-icon-left ', 'class_suffix' => 'list', 'label' => 'Back to list', 'ui-icon' => '',)) ?>
        <button class="btn btn-action" type="submit" id="SubmitGuardUser"><span aria-hidden="true" class="glyphicon glyphicon-save"></span> Save</button>
    <?php else: ?>
        <?php echo $helper->linkToDelete($form->getObject(), array('params' => 'class= fg-button ui-state-default fg-button-icon-left ', 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete', 'ui-icon' => '',)) ?>
        <?php echo $helper->linkToList(array('params' => 'class= fg-button ui-state-default fg-button-icon-left', 'class_suffix' => 'list', 'label' => 'Back to list', 'ui-icon' => '',)) ?>
        <button class="btn btn-action" type="submit" id="SubmitGuardUser"><span aria-hidden="true" class="glyphicon glyphicon-save"></span> Save</button>
        <button class="btn btn-action" type="button" onClick="location.href = '/guard/users/<?php echo $form->getObject()->get('id'); ?>'"><span aria-hidden="true" class="glyphicon glyphicon-eye-open"></span> Show</button>

    <?php endif; ?>
</ul>