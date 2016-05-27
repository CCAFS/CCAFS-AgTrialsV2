<?php use_helper('I18N', 'Date') ?>
<?php include_partial('contactperson/assets') ?>
<?php include_partial('contactperson/flashes') ?>
<?php include_partial('contactperson/form_header', array('tb_contactperson' => $tb_contactperson, 'form' => $form, 'configuration' => $configuration)) ?>
<?php include_partial('contactperson/form', array('tb_contactperson' => $tb_contactperson, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
<?php include_partial('contactperson/form_footer', array('tb_contactperson' => $tb_contactperson, 'form' => $form, 'configuration' => $configuration)) ?>
