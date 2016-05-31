<?php use_helper('I18N', 'Date') ?>
<?php include_partial('triallocation/assets') ?>
  <?php include_partial('triallocation/flashes') ?>
  <?php include_partial('triallocation/form_header', array('tb_triallocation' => $tb_triallocation, 'form' => $form, 'configuration' => $configuration)) ?>
  <?php include_partial('triallocation/form', array('tb_triallocation' => $tb_triallocation, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  <?php include_partial('triallocation/form_footer', array('tb_triallocation' => $tb_triallocation, 'form' => $form, 'configuration' => $configuration)) ?>
