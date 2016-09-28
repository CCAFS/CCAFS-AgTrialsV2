function startIntro() {
    var intro = introJs();
    intro.setOptions({
        steps: [
            {
                element: '#crop-block',
                intro: 'Choose a crop or agricultural technology that is the subject of your data.'
            },
            {
                element: '#varieties-block',
                intro: 'Indicate the varieties that are included in your data set.'
            },
            {
                element: '#variablesMeasured-block',
                intro: '3'
            },
            {
                element: '#nuevocrop',
                intro: 'The traits or variables measured in your trial'
            },
            {
                element: '#buttons-block',
                intro: "For trials with multiple crops (such as intercropping trials) here you can add additional crops."
            }
        ]
    });
    intro.start();
}