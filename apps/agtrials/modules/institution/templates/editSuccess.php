<?php use_helper('I18N', 'Date') ?>
<?php include_partial('institution/assets') ?>
  <?php include_partial('institution/flashes') ?>
  <?php include_partial('institution/form_header', array('tb_institution' => $tb_institution, 'form' => $form, 'configuration' => $configuration)) ?>
  <?php include_partial('institution/form', array('tb_institution' => $tb_institution, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  <?php include_partial('institution/form_footer', array('tb_institution' => $tb_institution, 'form' => $form, 'configuration' => $configuration)) ?>
