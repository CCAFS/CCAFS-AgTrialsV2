<?php use_helper('Thickbox') ?>
<link rel="stylesheet" href="/autocomplete/css/autocomplete.css">
<script src="/autocomplete/lib/jquery.1.7.1.js"></script>
<script src="/autocomplete/lib/jquery.ui.1.8.16.js"></script>
<script src="/autocomplete/autocomplete.js"></script>
<div class="sf_admin_form">
    <?php echo form_tag_for($form, '@tb_triallocation', array('class' => 'form-horizontal')) ?>
    <fieldset>
        <?php echo $form->renderHiddenFields() ?>
        <div class="form-group control-type-text control-name-trlcname ">
            <div class=" col-sm-2 control-type-text control-name-location">
                <label for="tb_triallocation_trlcname" class="col-sm-5 control-label">Name</label> 
            </div>
            <div class=" col-sm-3 control-type-text control-name-trlcname">
                <input type="text" id="tb_triallocation_trlcname" class="form-control" name="tb_triallocation[trlcname]" value="<?php echo $form->getObject()->get('trlcname'); ?>" required="true">                                
            </div>
        </div>
        <div class="form-group control-type-text control-name-trlclatitude ">
            <div class=" col-sm-2 control-type-text control-name-location">
                <label for="tb_triallocation_trlclatitude" class="col-sm-5 control-label">Latitude</label>      
            </div>
            <div class=" col-sm-3 control-type-text control-name-trlclatitude">
                <input type="number" id="tb_triallocation_trlclatitude" class="form-control" name="tb_triallocation[trlclatitude]" value="<?php echo $form->getObject()->get('trlclatitude'); ?>" required="true">
            </div>
            <div class="DivColIcon">
                <?php echo thickbox_iframe(image_tag('map.gif'), '/triallocation/locationcoordinates/', array('pop' => '1'), array(), array('width' => '800', 'height' => '600')) ?>
            </div>
        </div>
        <div class="form-group control-type-text control-name-trlclongitude ">
            <div class=" col-sm-2 control-type-text control-name-location">
                <label for="tb_triallocation_trlclongitude" class="col-sm-5 control-label">Longitude</label>    
            </div>
            <div class=" col-sm-3 control-type-text control-name-trlclongitude">
                <input type="number" id="tb_triallocation_trlclongitude" class="form-control" name="tb_triallocation[trlclongitude]" value="<?php echo $form->getObject()->get('trlclongitude'); ?>" required="true"> 
            </div>
            <div class="DivColIcon">
                <?php echo thickbox_iframe(image_tag('map.gif'), '/triallocation/locationcoordinates/', array('pop' => '1'), array(), array('width' => '800', 'height' => '600')) ?>
            </div>
        </div>
        <div class="form-group control-type-text control-name-trlcaltitude ">
            <div class=" col-sm-2 control-type-text control-name-location">
                <label for="tb_triallocation_trlcaltitude" class="col-sm-5 control-label">Altitude</label>   
            </div>
            <div class=" col-sm-3 control-type-text control-name-trlcaltitude">
                <input type="number" id="tb_triallocation_trlcaltitude" class="form-control" name="tb_triallocation[trlcaltitude]" value="<?php echo $form->getObject()->get('trlcaltitude'); ?>" required="true">                                
            </div>
        </div>

        <?php $InfoTrialLocation = GetInfoTrialLocation($form->getObject()->get('id_triallocation')); ?>
        <div class="form-group control-type-text control-name-location ">
            <div class=" col-sm-2 control-type-text control-name-location">
                <label for="tb_triallocation_location" class="col-sm-5 control-label">Country</label>    
            </div>
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
            <div class=" col-sm-2 control-type-text control-name-location">
                <label for="tb_triallocation_location" class="col-sm-5 control-label">District/Satate</label>  
            </div>
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
            <div class=" col-sm-2 control-type-text control-name-location">
                <label for="tb_triallocation_location" class="col-sm-5 control-label">Sub-district/Division</label>  
            </div>
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
            <div class=" col-sm-2 control-type-text control-name-location">
                <label for="tb_triallocation_location" class="col-sm-5 control-label">Village </label>     
            </div>
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
    <div class="BotonAccionesFijo">
        <?php include_partial('triallocation/form_actions', array('tb_triallocation' => $tb_triallocation, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
</div>


