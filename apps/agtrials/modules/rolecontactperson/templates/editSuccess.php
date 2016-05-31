<?php use_helper('I18N', 'Date') ?>
<?php include_partial('rolecontactperson/assets') ?>
  <?php include_partial('rolecontactperson/flashes') ?>
  <?php include_partial('rolecontactperson/form_header', array('tb_rolecontactperson' => $tb_rolecontactperson, 'form' => $form, 'configuration' => $configuration)) ?>
  <?php include_partial('rolecontactperson/form', array('tb_rolecontactperson' => $tb_rolecontactperson, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  <?php include_partial('rolecontactperson/form_footer', array('tb_rolecontactperson' => $tb_rolecontactperson, 'form' => $form, 'configuration' => $configuration)) ?>
