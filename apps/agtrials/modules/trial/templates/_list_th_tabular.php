<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_id_trial ui-state-default ui-th-column">
    <?php if ('id_trial' == $sort[0]): ?>
        <?php /* echo link_to(__('Id', array(), 'messages'), '@tb_trial?sort=id_trial&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), array('class' => $sort[1])) */ ?>

        <a href="<?php echo url_for('@tb_trial?sort=id_trial&sort_type=' . ($sort[1] == 'asc' ? 'desc' : 'asc')) ?>">
            <span class="ui-icon <?php echo ($sort[1] == 'asc' ? 'ui-icon-circle-triangle-s' : 'ui-icon-circle-triangle-n') ?>"></span>
            <?php echo __('Id', array(), 'messages') ?>
        </a>

        <?php //echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
    <?php else: ?>
        <?php /* echo link_to(__('Id', array(), 'messages'), '@tb_trial?sort=id_trial&sort_type=asc') */ ?>

        <a href="<?php echo url_for('@tb_trial?sort=id_trial&sort_type=asc') ?>">
            <span class="ui-icon ui-icon-triangle-2-n-s"></span>
            <?php echo __('Id', array(), 'messages') ?>
        </a>

    <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_project ui-state-default ui-th-column">
    <?php echo __('Project', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_contactperson ui-state-default ui-th-column">
    <?php echo __('Contact person', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_triallocation ui-state-default ui-th-column">
    <?php echo __('Trial location', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_trltrialname ui-state-default ui-th-column">
    <?php if ('trltrialname' == $sort[0]): ?>
        <?php  echo link_to(__('Name', array(), 'messages'), '@tb_trial?sort=trltrialname&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), array('class' => $sort[1])) ?>

        <a href="<?php echo url_for('@tb_trial?sort=trltrialname&sort_type=' . ($sort[1] == 'asc' ? 'desc' : 'asc')) ?>">
            <span class="ui-icon <?php echo ($sort[1] == 'asc' ? 'ui-icon-circle-triangle-s' : 'ui-icon-circle-triangle-n') ?>"></span>
            <?php echo __('Name', array(), 'messages') ?>
        </a>

        <?php //echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
    <?php else: ?>
        <?php /* echo link_to(__('Name', array(), 'messages'), '@tb_trial?sort=trltrialname&sort_type=asc') */ ?>

        <a href="<?php echo url_for('@tb_trial?sort=trltrialname&sort_type=asc') ?>">
            <span class="ui-icon ui-icon-triangle-2-n-s"></span>
            <?php echo __('Name', array(), 'messages') ?>
        </a>

    <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>