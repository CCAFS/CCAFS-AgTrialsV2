<?php use_helper('I18N', 'Date') ?>
<?php include_partial('project/assets') ?>
  <?php include_partial('project/flashes') ?>
  <?php include_partial('project/form_header', array('tb_project' => $tb_project, 'form' => $form, 'configuration' => $configuration)) ?>
  <?php include_partial('project/form', array('tb_project' => $tb_project, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  <?php include_partial('project/form_footer', array('tb_project' => $tb_project, 'form' => $form, 'configuration' => $configuration)) ?>
