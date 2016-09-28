function startIntro() {
    var intro = introJs();
    intro.setOptions({
        steps: [
            {
                element: '#information-block',
                intro: 'General information.'
            },
            {
                element: '#templatepack-block',
                intro: 'A.'
            },
            {
                element: '#trialtemplatefile-block',
                intro: 'B.'
            }
        ]
    });
    intro.start();
} 