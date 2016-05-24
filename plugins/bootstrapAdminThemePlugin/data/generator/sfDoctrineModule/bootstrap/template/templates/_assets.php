<?php if (isset($this->params['css']) && ($this->params['css'] !== false)): ?> 
[?php use_stylesheet('<?php echo $this->params['css'] ?>', 'first') ?] 
<?php elseif(!isset($this->params['css'])): ?>
[?php use_stylesheet('<?php echo sfConfig::get('sf_bootstrap_admin_module_web_dir').'/css/bootstrap.css' ?>', 'first') ?]
[?php use_javascript('/js/jquery-1.11.3.min.js', 'first') ?]
[?php use_javascript('<?php echo sfConfig::get('sf_bootstrap_admin_module_web_dir').'/js/bootstrap.min.js' ?>', 'first') ?]
<?php endif; ?>
<style type="text/css">
.control-type-date select {width:auto;}
</style>