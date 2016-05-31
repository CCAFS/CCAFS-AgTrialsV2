<?php use_helper('I18N', 'Date') ?>
<?php include_partial('variety/assets') ?>
<?php include_partial('variety/flashes') ?>
<?php include_partial('variety/form_header', array('tb_variety' => $tb_variety, 'form' => $form, 'configuration' => $configuration)) ?>
<?php include_partial('variety/form', array('tb_variety' => $tb_variety, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
<?php include_partial('variety/form_footer', array('tb_variety' => $tb_variety, 'form' => $form, 'configuration' => $configuration)) ?>
