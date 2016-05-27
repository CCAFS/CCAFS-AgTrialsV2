<?php use_helper('I18N', 'Date') ?>
<?php include_partial('donor/assets') ?>
<?php include_partial('donor/flashes') ?>
<?php include_partial('donor/form_header', array('tb_donor' => $tb_donor, 'form' => $form, 'configuration' => $configuration)) ?>
<?php include_partial('donor/form', array('tb_donor' => $tb_donor, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
<?php include_partial('donor/form_footer', array('tb_donor' => $tb_donor, 'form' => $form, 'configuration' => $configuration)) ?>
