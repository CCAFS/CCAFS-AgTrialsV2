<?php use_stylesheets_for_form($form); ?>
<?php use_javascripts_for_form($form); ?>
<?php use_javascript('modulesvalidate.js'); ?>

<div class="row">
    <div class="col-md-2 left-column">
        <?php include_partial('admin/ModuleMenu') ?>
    </div>
    <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
        <span class="Title">User</span>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <fieldset>
                <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                    <div class="col-sm-2">Username:</div>
                    <div class=" col-sm-10 control-type-text">
                        <values><?php echo $form->getObject()->get('username'); ?></values>
                    </div>
                </div>
                <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                    <div class="col-sm-2">First name:</div>
                    <div class=" col-sm-10 control-type-text">
                        <values><?php echo $form->getObject()->get('first_name'); ?></values>
                    </div>
                </div>
                <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                    <div class="col-sm-2">Last name:</div>
                    <div class=" col-sm-10 control-type-text">
                        <values><?php echo $form->getObject()->get('last_name'); ?></values>
                    </div>
                </div>
                <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                    <div class="col-sm-2">Email address:</div>
                    <div class=" col-sm-10 control-type-text">
                        <values><?php echo $form->getObject()->get('email_address'); ?></values>
                    </div>
                </div>
                <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                    <div class="col-sm-2">Created at:</div>
                    <div class=" col-sm-10 control-type-text">
                        <values><?php echo $form->getObject()->get('created_at'); ?></values>
                    </div>
                </div>
                <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                    <div class="col-sm-2">Last login:</div>
                    <div class=" col-sm-10 control-type-text">
                        <values><?php echo $form->getObject()->get('last_login'); ?></values>
                    </div>
                </div>
                <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                    <div class="col-sm-2">Active:</div>
                    <div class=" col-sm-10 control-type-text">
                        <values><?php echo $form->getObject()->get('is_active'); ?></values>
                    </div>
                </div>
            </fieldset>
            <fieldset>

                <?php
                $SfGuardUserInformation = Doctrine::getTable('SfGuardUserInformation')->findOneByUserId($form->getObject()->get('id'));
                if (count($SfGuardUserInformation) > 1) {
                    ?>

                    <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                        <div class="col-sm-2">Permissions:</div>
                        <div class=" col-sm-10 control-type-text">
                            <values><?php echo GetPermissionsUser($form->getObject()->get('id')) ?></values>
                        </div>
                    </div>
                    <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                        <div class="col-sm-2">Groups:</div>
                        <div class=" col-sm-10 control-type-text">
                            <values><?php echo GetGroupsUser($form->getObject()->get('id')) ?></values>
                        </div>
                    </div>
                    <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                        <div class="col-sm-2">Institution:</div>
                        <div class=" col-sm-10 control-type-text">
                            <values>
                                <?php
                                if ($SfGuardUserInformation->getIdInstitution() != '') {
                                    $TbInstitution = Doctrine::getTable('TbInstitution')->findOneByIdInstitution($SfGuardUserInformation->getIdInstitution());
                                    echo $TbInstitution->getInsname();
                                }
                                ?>
                            </values>
                        </div>
                    </div>
                    <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                        <div class="col-sm-2">Country:</div>
                        <div class=" col-sm-10 control-type-text">
                            <values>
                                <?php
                                if ($SfGuardUserInformation->getIdCountry() != '') {
                                    $TbAdministrativedivision = Doctrine::getTable('TbAdministrativedivision')->findOneByIdAdministrativedivision($SfGuardUserInformation->getIdCountry());
                                    echo $TbAdministrativedivision->getDmdvname();
                                }
                                ?>
                            </values>
                        </div>
                    </div>
                    <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                        <div class="col-sm-2">City:</div>
                        <div class=" col-sm-10 control-type-text">
                            <values><?php echo $SfGuardUserInformation->getCity(); ?></values>
                        </div>
                    </div>
                    <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                        <div class="col-sm-2">State:</div>
                        <div class=" col-sm-10 control-type-text">
                            <values><?php echo $SfGuardUserInformation->getState(); ?></values>
                        </div>
                    </div>
                    <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                        <div class="col-sm-2">Address:</div>
                        <div class=" col-sm-10 control-type-text">
                            <values><?php echo $SfGuardUserInformation->getAddress(); ?></values>
                        </div>
                    </div>
                    <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                        <div class="col-sm-2">Telephone:</div>
                        <div class=" col-sm-10 control-type-text">
                            <values><?php echo $SfGuardUserInformation->getTelephone(); ?></values>
                        </div>
                    </div>
                    <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                        <div class="col-sm-2">Motivation:</div>
                        <div class=" col-sm-10 control-type-text">
                            <values><?php echo $SfGuardUserInformation->getMotivation(); ?></values>
                        </div>
                    </div>
                    <div class="form-group control-type-text" style="padding-bottom: 10px; padding-top: 10px;">
                        <div class="col-sm-2">Visits:</div>
                        <div class=" col-sm-10 control-type-text">
                            <values><?php echo $SfGuardUserInformation->getVisits(); ?></values>
                        </div>
                    </div>

                <?php } ?>

            </fieldset>
        </div>
        <ul class="sf_admin_actions_form">
            <button onclick="location.href = '/guard/users'" type="button" class="btn btn-action"><span class="glyphicon glyphicon-list"></span> Back to list</button>
            <button onclick="location.href = '/guard/users/<?php echo $form->getObject()->get('id'); ?>/edit'" type="button" class="btn btn-action"><span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button>
        </ul>
    </div>
</div>
