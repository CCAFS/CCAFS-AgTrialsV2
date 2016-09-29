function startIntro() {
    var intro = introJs();
    intro.setOptions({
        steps: [
            {
                element: '#Information-block',
                intro: 'General information.'
            },
            {
                element: '#TrialTemplateFile-block',
                intro: 'Choose here your trial Dtemplate file.'
            },
            {
                element: '#TrialInfoTemplateFile-block',
                intro: 'Choose here your trial info template file.'
            },
            {
                element: '#ZipFileTrialInfoDataTemplates-block',
                intro: 'Choose here your zip file, it is contains all "trial info data templates" without folders'
            },
            {
                element: '#ZipFiles-block',
                intro: 'Choose here your zip file, it is contains all files of his essays without folders.'
            },
            {
                element: '#Buttons-block',
                intro: "Click on the back button for return to after page, or click on the execute button for run processes."
            }
        ]
    });
    intro.start();
} 