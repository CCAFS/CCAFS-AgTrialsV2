function startIntro() {
    var intro = introJs();
    intro.setOptions({
        steps: [
            {
                element: '#Information-block',
                intro: 'General information.'
            },
            {
                element: '#TemplatePack-block',
                intro: 'A.'
            },
            {
                element: '#TrialTemplateFile-block',
                intro: 'B.'
            },
            {
                element: '#TrialInfoTemplateFile-block',
                intro: 'C.'
            },
            {
                element: '#ZipFileTrialInfoDataTemplates-block',
                intro: 'D.'
            },
            {
                element: '#ZipFiles-block',
                intro: 'E.'
            },
            {
                element: '#Buttons-block',
                intro: 'F.'
            }
        ]
    });
    intro.start();
} 