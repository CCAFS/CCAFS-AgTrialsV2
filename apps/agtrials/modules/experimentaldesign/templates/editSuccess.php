<?php use_helper('I18N', 'Date') ?>
<?php include_partial('experimentaldesign/assets') ?>
  <?php include_partial('experimentaldesign/flashes') ?>
  <?php include_partial('experimentaldesign/form_header', array('tb_experimentaldesign' => $tb_experimentaldesign, 'form' => $form, 'configuration' => $configuration)) ?>
  <?php include_partial('experimentaldesign/form', array('tb_experimentaldesign' => $tb_experimentaldesign, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  <?php include_partial('experimentaldesign/form_footer', array('tb_experimentaldesign' => $tb_experimentaldesign, 'form' => $form, 'configuration' => $configuration)) ?>
