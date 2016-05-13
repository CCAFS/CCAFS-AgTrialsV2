<div class="row">
    <div class="col-md-3 MenuProcesses" style="width: 210px;">
        <div onclick="window.location.href = '/batchuploadanother'" class="MenuProcessesButtonSelected"> 
            Batch upload another
        </div>
        <div onclick="window.location.href = '/checkanother'" class="MenuProcessesButton"> 
            Check another
        </div>
    </div>
    <div class="col-md-9 sf_admin_form" style="margin-top: 13px; width: 930px;">
        <span class="Title">Batch upload another</span>
        <div id="div_loading" class="loading" align="center" style="display:none;">
            <?php echo image_tag('loading.gif'); ?>
            <br>Copying files to the server, please wait...
        </div>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <div class="container">
                <div>Download templates:</div>
                <div class="row RowDownloadTemplate">
                    <div class="DownloadTemplate" onclick="window.location.href = '/downloadestrutureproject'">
                        <img width="60" height="50" border="0" src="/images/DownloadTemplate.png">
                        <div>Trial Project Template</div>
                    </div>
                    <div class="DownloadTemplate" onclick="window.location.href = '/downloadestruturetriallocation'">
                        <img width="60" height="50" border="0" src="/images/DownloadTemplate.png">
                        <div>Trial Location Template</div>
                    </div>
                    <div class="DownloadTemplate" onclick="window.location.href = '/downloadestruturevariety'">
                        <img width="60" height="50" border="0" src="/images/DownloadTemplate.png">
                        <div>Trial Varieties Template</div>
                    </div>
                    <div class="DownloadTemplate" onclick="window.location.href = '/downloadestruturevariablesmeasured'">
                        <img width="60" height="50" border="0" src="/images/DownloadTemplate.png">
                        <div>Trial Variables Measured Template</div>
                    </div>
                </div>
                <div id="DivTemplatesInformation" style="display:none;">
                    <div><b>Templates Information:</b></div>
                    <div id="DivTemplatesInformationInfo"></div>
                </div>

                <form class="form-horizontal" id="batchuploadanother" name="batchuploadanother" action="<?php echo url_for('@batchuploadanother'); ?>" enctype="multipart/form-data" method="post">
                    <fieldset style="margin-top: 20px;">
                        <div class="form-group control-type-text">
                            <div class="col-sm-2">Upload Template:</div>
                            <div class=" col-sm-3 control-type-text">
                                <select class="form-control" size="1" id="SelectTemplate" name="SelectTemplate">
                                    <option value="">Choose...</option>
                                    <option value="Trial Project Template" title="Trial Project Template">Trial Project Template</option>
                                    <option value="Trial Location Template" title="Trial Location Template">Trial Location Template</option>
                                    <option value="Trial Varieties Template" title="Trial Varieties Template">Trial Varieties Template</option>
                                    <option value="Trial Variables Measured Template" title="Trial Variables Measured Template">Trial Variables Measured Template</option>
                                </select>                                
                            </div>
                        </div>
                    </fieldset>
                    <fieldset style="margin-top: 5px;">
                        <div class="form-group control-type-text">
                            <div class="col-sm-2">Template File:</div>
                            <div class=" col-sm-6 control-type-text">
                                <input type="file" value="" id="TemplateFile" name="TemplateFile">
                            </div>
                        </div>
                    </fieldset>
                    <div class="col-sm-10" style="padding-left: 0px; padding-top: 15px;">
                        <button neme="ExecuteBatchuploadanother" id="ExecuteBatchuploadanother" title=" Execute " type="button" class="btn btn-action"><span aria-hidden="true" class="glyphicon glyphicon-cog"></span>&ensp;Execute&ensp;</button>
                        <input type="hidden" name="Form" id="Form" value="">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>