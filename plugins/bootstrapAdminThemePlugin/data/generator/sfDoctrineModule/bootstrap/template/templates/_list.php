[?php if (!$pager->getNbResults()): ?]
<p class="alert alert-warning">[?php echo __('No result', array(), 'sf_admin') ?]</p>
<div style="display:none;" class="btn-toolbar">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
</div>
[?php else: ?]

<table class="table table-hover">
    <thead>
        <tr>
            <?php if ($this->configuration->getValue('list.batch_actions')): ?>
                <th class="LabelList"><input id="checkAll" type="checkbox" onclick="toggleCheckboxes();" /></th>
            <?php endif; ?>
            [?php include_partial('<?php echo $this->getModuleName() ?>/list_th', array('sort' => $sort)) ?]
            <?php if ($this->configuration->getValue('list.object_actions')): ?>
                <th class="LabelList LabelListAction">[?php echo __('Actions', array(), 'sf_admin') ?]</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th colspan="<?php echo count($this->configuration->getValue('list.display')) + ($this->configuration->getValue('list.object_actions') ? 1 : 0) + ($this->configuration->getValue('list.batch_actions') ? 1 : 0) ?>">
    <div class="pull-right">
        <div class="TotalResults">Records: <span id="CountResults" class="badge">[?php echo $pager->getNbResults(); ?]</span></div>
    </div>
    [?php if ($pager->haveToPaginate()): ?]
    [?php include_partial('<?php echo $this->getModuleName() ?>/pagination', array('pager' => $pager)) ?]
    [?php endif; ?]
    <div class="btn-toolbar">
        [?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', array('helper' => $helper)) ?]
        [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
    </div>
</th>
</tr>
</tfoot>
<tbody>
    [?php foreach ($pager->getResults() as $<?php echo $this->getSingularName() ?>): ?]
    <tr>
        <?php if ($this->configuration->getValue('list.batch_actions')): ?>
            [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_batch_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper)) ?]
        <?php endif; ?>
        [?php include_partial('<?php echo $this->getModuleName() ?>/list_td', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
        <?php if ($this->configuration->getValue('list.object_actions')): ?>
            [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper)) ?]
        <?php endif; ?>
    </tr>
    [?php endforeach; ?]
</tbody>
</table>
[?php endif; ?]

<script type="text/javascript">
    /* <![CDATA[ */
    function toggleCheckboxes()
    {
        var $mainCheckbox = $('#checkAll');
        $boxes = $('tbody input[type="checkbox"]');

        if ($mainCheckbox.is(':checked'))
            $boxes.attr('checked', 'checked');
        else
            $boxes.removeAttr('checked');
    }
    /* ]]> */
</script>
