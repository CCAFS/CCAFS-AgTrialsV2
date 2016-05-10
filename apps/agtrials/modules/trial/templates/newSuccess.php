<?php use_helper('I18N', 'Date') ?>
<?php include_partial('trial/assets') ?>



  <?php include_partial('trial/flashes') ?>

  <?php include_partial('trial/form_header', array('tb_trial' => $tb_trial, 'form' => $form, 'configuration' => $configuration)) ?>

  <?php include_partial('trial/form', array('tb_trial' => $tb_trial, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

  <?php include_partial('trial/form_footer', array('tb_trial' => $tb_trial, 'form' => $form, 'configuration' => $configuration)) ?>
