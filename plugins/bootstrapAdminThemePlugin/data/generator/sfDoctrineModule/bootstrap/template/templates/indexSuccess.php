[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

[?php #include_partial('<?php echo $this->getModuleName() ?>/navbar', array('filter' => <?php echo $this->configuration->hasFilterForm() ? true : false ?>)) ?]


<div id="sf_admin_container">
    <?php if ($this->configuration->hasFilterForm()): ?>
        <div class="page-header">
            <div class="pull-right">
                <a href="#filterPopup" class="btn btn-action" data-toggle="modal"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Filter</a>
            </div>
        <?php endif; ?>
        <h1 class="title-module">[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h1>
    </div>
    <?php if ($this->configuration->hasFilterForm()): ?>
        [?php $filterValues = $sf_user->getRawValue()->getAttribute($this->getModuleName().'.filters', array(), 'admin_module'); if (!empty($filterValues)): ?]
        <div class="alert alert-info alert-block">
            <a href="#" class="close fade" data-dismiss="alert">&times;</a>
            These results are filtered. <a href="#filterPopup" data-toggle="modal">Modify filter</a>
        </div>
        [?php endif; ?]

    <?php endif; ?>

    [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

    [?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('pager' => $pager)) ?]

    <div id="sf_admin_content">
        <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'batch')) ?]" method="post">
            [?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?]
        </form>
    </div>

    <div id="sf_admin_footer">
        [?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager)) ?]
    </div>

    <?php if ($this->configuration->hasFilterForm()): ?>
        [?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration)) ?]
    <?php endif; ?>
</div>
