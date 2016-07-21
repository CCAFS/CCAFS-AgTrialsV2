jQuery(document).ready(function () {
    $.ajax({
        url: "/admin/ModuleHelp?HelpModule=Trial",
        type: "GET",
        dataType: "json",
        success: function (data) {
            for (var i in data) {
                jQuery('#' + data[i].idhelp).qtip({
                    content: data[i].texthelp
                });
            }
        }
    });
});


