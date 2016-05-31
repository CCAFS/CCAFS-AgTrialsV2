<?php use_helper('Thickbox'); ?>
<?php use_stylesheets_for_form($form); ?>
<?php use_javascripts_for_form($form); ?>
<?php use_javascript('modulesvalidate.js'); ?>

<div class="row">
    <div class="col-md-2 left-column">
        <?php include_partial('admin/ModuleMenu') ?>
    </div>
    <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
        <span class="Title">Trial location</span>
        <?php echo form_tag_for($form, '@tb_triallocation', array('class' => 'form-horizontal', 'id' => 'FormTriallocation', 'enctype' => 'multipart/form-data')) ?>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <div class="form-group control-type-text" style="margin-left: 0px;">All fields marked with <span class="Mandatory">*</span> are required.</div>
            <fieldset>
                <?php echo $form->renderHiddenFields() ?>
                <div class="form-group control-type-text control-name-trlcname ">
                    <div class="col-sm-2">Name:</div>
                    <div class=" col-sm-3 control-type-text control-name-trlcname">
                        <input type="text" id="tb_triallocation_trlcname" class="form-control" name="tb_triallocation[trlcname]" value="<?php echo $form->getObject()->get('trlcname'); ?>">                                
                    </div>
                </div>
                <div class="form-group control-type-text control-name-trlclatitude ">
                    <div class="col-sm-2">Latitude:</div>
                    <div class=" col-sm-3 control-type-text control-name-trlclatitude">
                        <input type="text" id="tb_triallocation_trlclatitude" class="form-control" name="tb_triallocation[trlclatitude]" value="<?php echo $form->getObject()->get('trlclatitude'); ?>">
                    </div>
                    <div class="DivColIcon">
                        <?php echo thickbox_iframe(image_tag('map.gif'), '/triallocation/locationcoordinates/', array('pop' => '1'), array(), array('width' => '800', 'height' => '600')) ?>
                    </div>
                </div>
                <div class="form-group control-type-text control-name-trlclongitude ">
                    <div class="col-sm-2">Longitude:</div>
                    <div class=" col-sm-3 control-type-text control-name-trlclongitude">
                        <input type="text" id="tb_triallocation_trlclongitude" class="form-control" name="tb_triallocation[trlclongitude]" value="<?php echo $form->getObject()->get('trlclongitude'); ?>"> 
                    </div>
                    <div class="DivColIcon">
                        <?php echo thickbox_iframe(image_tag('map.gif'), '/triallocation/locationcoordinates/', array('pop' => '1'), array(), array('width' => '800', 'height' => '600')) ?>
                    </div>
                </div>
                <div class="form-group control-type-text control-name-trlcaltitude ">
                    <div class="col-sm-2">Altitude:</div>
                    <div class=" col-sm-3 control-type-text control-name-trlcaltitude">
                        <input type="text" id="tb_triallocation_trlcaltitude" class="form-control" name="tb_triallocation[trlcaltitude]" value="<?php echo $form->getObject()->get('trlcaltitude'); ?>">                                
                    </div>
                </div>

                <?php $InfoTrialLocation = GetInfoTrialLocation($form->getObject()->get('id_triallocation')); ?>
                <div class="form-group control-type-text control-name-location ">
                    <div class="col-sm-2">Country:</div>
                    <div class=" col-sm-3 control-type-text control-name-location">
                        <?php $PartCountry = explode(",", $InfoTrialLocation['country'], 2); ?>
                        <input name="id_countrytriallocation" id="id_countrytriallocation" type="hidden" value="<?php echo $PartCountry[0]; ?>">
                        <input class="form-control" name="countrytriallocation" id="countrytriallocation" type="text" size="48" maxlength="150" value="<?php echo $PartCountry[1]; ?>" <?php echo $DisabledFieldTrialLocation; ?>>
                    </div>
                    <div class="DivColIcon">
                        <span id='CheckCountrytriallocation'></span>            
                    </div>
                </div>
                <div class="form-group control-type-text control-name-location ">
                    <div class="col-sm-2">District/Satate:</div>
                    <div class=" col-sm-3 control-type-text control-name-location">
                        <?php $PartDistrict = explode(",", $InfoTrialLocation['district'], 2); ?>
                        <input name="id_districttriallocation" id="id_districttriallocation" type="hidden" value="<?php echo $PartDistrict[0]; ?>">
                        <input class="form-control" name="districttriallocation" id="districttriallocation" type="text" size="48" maxlength="150" value="<?php echo $PartDistrict[1]; ?>" <?php echo $DisabledFieldTrialLocation; ?> ReadOnly>
                    </div>
                    <div class="DivColIcon">
                        <span id='CheckDistricttriallocation'></span>            
                    </div>
                </div>
                <div class="form-group control-type-text control-name-location ">
                    <div class="col-sm-2">Sub-district/Division:</div>
                    <div class=" col-sm-3 control-type-text control-name-location">
                        <?php $PartSubdistrict = explode(",", $InfoTrialLocation['subdistrict'], 2); ?>
                        <input name="id_subdistricttriallocation" id="id_subdistricttriallocation" type="hidden" value="<?php echo $PartSubdistrict[0]; ?>">
                        <input class="form-control" name="subdistricttriallocation" id="subdistricttriallocation" type="text" maxlength="150" value="<?php echo $PartSubdistrict[1]; ?>"size="48" <?php echo $DisabledFieldTrialLocation; ?> ReadOnly>
                    </div>
                    <div class="DivColIcon">
                        <span id='CheckSubdistricttriallocation'></span>            
                    </div>
                </div>
                <div class="form-group control-type-text control-name-location ">
                    <div class="col-sm-2">Village:</div>
                    <div class=" col-sm-3 control-type-text control-name-location">
                        <?php $PartVillage = explode(",", $InfoTrialLocation['village'], 2); ?>
                        <input name="id_villagetriallocation" id="id_villagetriallocation" type="hidden" value="<?php echo $PartVillage[0]; ?>">
                        <input class="form-control" name="villagetriallocation" id="villagetriallocation" type="text" size="48" maxlength="150" value="<?php echo $PartVillage[1]; ?>" <?php echo $DisabledFieldTrialLocation; ?> ReadOnly>
                    </div>
                    <div class="DivColIcon">
                        <span id='CheckVillagetriallocation'></span>     
                        <span id='AddVillage' title="Add"></span>
                    </div>
                </div>
            </fieldset>
        </div>
        <?php include_partial('triallocation/form_actions', array('tb_triallocation' => $tb_triallocation, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        </form>
    </div>
</div>