<?php if ($field->isPartial()): ?>
    <?php include_partial('triallocation/' . $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif ($field->isComponent()): ?>
    <?php include_component('triallocation', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php else: ?>
    <div class="form-group <?php echo $class ?> <?php $form[$name]->hasError() and print 'has-error' ?>">
        <div class="col-sm-2"><?php echo $label ?>:</div>
        <div class="<?php echo $form[$name]->getWidget()->getOption('content-handler'); ?> col-sm-4 <?php echo $class ?>">
            <?php if ($form[$name]->getWidget()->hasOption('content-handler')): ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <?php echo $form[$name]->getWidget()->getOption('content-handler') ?>
                    </span>
                    <?php if ($form[$name]->hasError()): ?>
                        <?php echo $form[$name]->render(array('class' => 'form-control', 'placeholder' => $form[$name]->getError())) ?>
                    <?php else: ?>
                        <?php echo $form[$name]->render(array('class' => 'form-control')) ?>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <?php if ($form[$name]->hasError()): ?>
                    <?php echo $form[$name]->render(array('class' => 'form-control', 'placeholder' => $form[$name]->getError())) ?>
                <?php else: ?>
                    <?php echo $form[$name]->render(array('class' => 'form-control')) ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
