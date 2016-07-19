jQuery(document).ready(function () {
    $.ajax({
        url: '/jquery.qtip/helpfile/trial.json',
        type: 'GET',
        dataType: 'json',
        data: {}
    })
            .then(function (data) {
                jQuery('#HelpNameProject').qtip({
                    content: data.HelpNameProject
                });

                jQuery('#HelpProjectLeadName').qtip({
                    content: data.HelpProjectLeadName
                });

            });


});

