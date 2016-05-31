<?php if ($field->isPartial()): ?>
    <?php include_partial('institution/' . $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif ($field->isComponent()): ?>
    <?php include_component('institution', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php else: ?>
    <?php if ($name == 'id_country') { ?>
        <div class="form-group <?php echo $class ?> <?php $form[$name]->hasError() and print 'has-error' ?>">
            <div class="col-sm-2"><?php echo $label ?>:</div>
            <div class="<?php echo $form[$name]->getWidget()->getOption('content-handler'); ?> col-sm-4 <?php echo $class ?>">
                <div class="form-group control-type-text">
                    <div class="col-sm-12 control-type-text">
                        <input name="tb_institution[id_country]" id="id_country" type="hidden" value="<?php echo $form->getObject()->get('id_country'); ?>">
                        <input class="form-control SearchInput" name="country" id="country" type="text" value="<?php echo GetInformationTable("tb_administrativedivision", "dmdvname", "id_administrativedivision", $form->getObject()->get('id_country')); ?>">
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
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
    <?php } ?>
<?php endif; ?>
