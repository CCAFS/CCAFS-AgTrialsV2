<?php use_helper('I18N', 'Date') ?>
<?php include_partial('sfGuardUser/assets') ?>
<div class="row">
    <div class="col-md-2 left-column">
        <?php include_partial('admin/ModuleMenu') ?>
    </div>
    <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
        <span class="Title">User</span>
        <div class="pull-right">
            <a href="#filterPopup" class="btn btn-action" data-toggle="modal"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Filter</a>
        </div>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <div id="sf_admin_container" style="margin-top: -15px;">
                <?php
                $filterValues = $sf_user->getRawValue()->getAttribute($this->getModuleName() . '.filters', array(), 'admin_module');
                if (!empty($filterValues)):
                    ?>
                    <div class="alert alert-info alert-block">
                        <a href="#" class="close fade" data-dismiss="alert">&times;</a>
                        These results are filtered. <a href="#filterPopup" data-toggle="modal">Modify filter</a>
                    </div>
                <?php endif; ?>
                <?php include_partial('sfGuardUser/flashes') ?>
                <?php include_partial('sfGuardUser/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'hasFilters' => $hasFilters)) ?>
                <div id="sf_admin_footer">
                    <?php include_partial('sfGuardUser/list_footer', array('pager' => $pager)) ?>
                </div>
                <?php include_partial('sfGuardUser/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
            </div>
        </div>
        <?php include_partial('sfGuardUser/list_actions', array('helper' => $helper)) ?>
    </div>
</div>
