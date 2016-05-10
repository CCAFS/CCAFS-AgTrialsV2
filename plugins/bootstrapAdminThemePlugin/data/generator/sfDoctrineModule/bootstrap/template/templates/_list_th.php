<?php foreach ($this->configuration->getValue('list.display') as $name => $field): ?>
[?php slot('sf_admin.current_header') ?]
<th  class="LabelList">
<?php echo $field->getConfig('label', '', true) ?>
</th>
[?php end_slot(); ?]
<?php echo $this->addCredentialCondition("[?php include_slot('sf_admin.current_header') ?]", $field->getConfig()) ?>
<?php endforeach; ?>
