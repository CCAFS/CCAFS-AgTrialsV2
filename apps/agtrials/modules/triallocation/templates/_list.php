<?php if (!$pager->getNbResults()): ?>
    <p class="alert alert-warning"><?php echo __('No result', array(), 'sf_admin') ?></p>
    <div style="display:none;" class="btn-toolbar">
        <?php include_partial('triallocation/list_actions', array('helper' => $helper)) ?>
    </div>
<?php else: ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <?php include_partial('triallocation/list_th', array('sort' => $sort)) ?>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th colspan="5">
                    <div class="pull-right">
                        <div class="TotalResults">Records: <span id="CountResults" class="badge"><?php echo $pager->getNbResults(); ?></span></div>
                    </div>
                    <?php if ($pager->haveToPaginate()): ?>
                        <?php include_partial('triallocation/pagination', array('pager' => $pager)) ?>
                    <?php endif; ?>
                    <div class="btn-toolbar">
                        <?php include_partial('triallocation/list_batch_actions', array('helper' => $helper)) ?>
                    </div>
                </th>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($pager->getResults() as $tb_triallocation): ?>
                <tr>
                    <?php include_partial('triallocation/list_td', array('tb_triallocation' => $tb_triallocation)) ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

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
