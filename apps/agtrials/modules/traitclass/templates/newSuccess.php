<?php use_helper('I18N', 'Date') ?>
<?php include_partial('traitclass/assets') ?>
<?php include_partial('traitclass/flashes') ?>
<?php include_partial('traitclass/form_header', array('tb_traitclass' => $tb_traitclass, 'form' => $form, 'configuration' => $configuration)) ?>
<?php include_partial('traitclass/form', array('tb_traitclass' => $tb_traitclass, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
<?php include_partial('traitclass/form_footer', array('tb_traitclass' => $tb_traitclass, 'form' => $form, 'configuration' => $configuration)) ?>
