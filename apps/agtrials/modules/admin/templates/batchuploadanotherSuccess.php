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
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <div class="ContainerBatch">
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
                    <div class="DownloadTemplate" onclick="window.location.href = '/downloadestruturevariablesmeasured'">
                        <img width="60" height="50" border="0" src="/images/DownloadTemplate.png">
                        <div>Trial Varieties Template</div>
                    </div>
                    <div class="DownloadTemplate" onclick="window.location.href = '/downloadestruturevariety'">
                        <img width="60" height="50" border="0" src="/images/DownloadTemplate.png">
                        <div>Trial Variables Measured Template</div>
                    </div>
                </div>
                <div class="container">
                    <form class="form-horizontal" id="batchuploadanother" name="batchuploadanother" action="<?php echo url_for('@batchuploadanother'); ?>" enctype="multipart/form-data" method="post">
                        <div>Upload Template:</div>
                        <div class="col-sm-4">
                            <select class="form-control" size="1" id="SelectTemplate" name="SelectTemplate">
                                <option value="">Choose...</option>
                                <option value="Trial Project Template" title="Trial Project Template">Trial Project Template</option>
                                <option value="Trial Location Template" title="Trial Location Template">Trial Location Template</option>
                                <option value="Trial Varieties Template" title="Trial Varieties Template">Trial Varieties Template</option>
                                <option value="Trial Variables Measured Template" title="Trial Variables Measured Template">Trial Variables Measured Template</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="col-sm-3">Template File:</div>
                            <div class=" col-sm-4 control-type-text">
                                <input type="file" value="" id="TemplateFile" name="TemplateFile">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>