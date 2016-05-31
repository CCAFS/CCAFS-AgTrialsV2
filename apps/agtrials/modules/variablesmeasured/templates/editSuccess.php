<?php use_helper('I18N', 'Date') ?>
<?php include_partial('variablesmeasured/assets') ?>
  <?php include_partial('variablesmeasured/flashes') ?>
  <?php include_partial('variablesmeasured/form_header', array('tb_variablesmeasured' => $tb_variablesmeasured, 'form' => $form, 'configuration' => $configuration)) ?>
  <?php include_partial('variablesmeasured/form', array('tb_variablesmeasured' => $tb_variablesmeasured, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  <?php include_partial('variablesmeasured/form_footer', array('tb_variablesmeasured' => $tb_variablesmeasured, 'form' => $form, 'configuration' => $configuration)) ?>
