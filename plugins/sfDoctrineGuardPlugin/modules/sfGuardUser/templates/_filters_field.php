<?php $ArrLabel = array('first_name' => 'First name', 'last_name' => 'Last name', 'email_address' => 'Email address', 'username' => 'Username', 'is_active' => 'Active', 'permissions_list' => 'Permissions'); ?>
<?php if ($field->isPartial()): ?>
    <?php include_partial('sfGuardUser/' . $name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif ($field->isComponent()): ?>
    <?php include_component('sfGuardUser', $name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php else: ?>
    <div class="form-group <?php echo $class ?>">
        <div class="col-sm-3"><?php echo $ArrLabel[$name]; ?>:</div>
        <div class="col-sm-6 <?php echo $class ?>">
            <?php echo $form[$name]->renderError() ?>
            <?php echo $form[$name]->render(array('class' => 'form-control')) ?>
            <?php if ($help || $help = $form[$name]->renderHelp()): ?>
                <p class="help-block"><?php echo __($help, array(), 'messages') ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
