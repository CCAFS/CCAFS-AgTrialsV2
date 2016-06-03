<?php use_helper('I18N', 'Date') ?>
<?php include_partial('sfGuardUser/assets') ?>
  <?php include_partial('sfGuardUser/flashes') ?>
  <?php include_partial('sfGuardUser/form_header', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>
  <?php include_partial('sfGuardUser/form', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  <?php include_partial('sfGuardUser/form_footer', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>
