<?php use_helper('I18N', 'Date') ?>
<?php include_partial('crop/assets') ?>
<?php include_partial('crop/flashes') ?>
<?php include_partial('crop/form_header', array('tb_crop' => $tb_crop, 'form' => $form, 'configuration' => $configuration)) ?>
<?php include_partial('crop/form', array('tb_crop' => $tb_crop, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
<?php include_partial('crop/form_footer', array('tb_crop' => $tb_crop, 'form' => $form, 'configuration' => $configuration)) ?>
