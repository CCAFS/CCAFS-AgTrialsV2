function startIntro(){
  var intro = introJs();
  intro.setOptions({
    steps: [
      {
        element: '#nameofproject-block',
        intro: 'nameofproject'
      },
      {
        element: '#projectleader-block',
        intro: 'projectleader'
      },
      {
        element: '#projectinstitutions-block',
        intro: 'projectinstitutions'
      },
      {
        element: '#projectperiod-block',
        intro: 'projectperiod'
      },
      {
        element: '#projectfunding-block',
        intro: 'projectfunding'
      },
      {
        element: '#projectinformation-block',
        intro: 'projectinformation'
      },
      {
        element: '#projecttrialmanager-block',
        intro: 'projecttrialmanager'
      },
      {
        element: '#projecttrialperiod-block',
        intro: 'projecttrialperiod'
      },
      {
        element: '#projecttriallocation-block',
        intro: 'projecttriallocation'
      },
      {
        element: '#projecttrialchar-block',
        intro: 'projecttrialchar'
      },
      {
        element: '#projectaccessinfo-block',
        intro: 'projectaccessinfo'
      },
      {
        element: '#projectlicense-block',
        intro: 'projectlicense'
      },
      {
        element: '#DivCrop1 .cropInfo',
        intro: 'DivCrop1'
      },
      {
        element: '#DivCrop1 .varieties',
        intro: 'DivCrop1'
      },
      {
        element: '#DivCrop1 .variablesMeasured',
        intro: 'DivCrop1'
      },
      {
        element: '#DivCrop1 .dataInformation',
        intro: '<iframe width="420" height="315" src="https://www.youtube.com/embed/wzfm3ltrixk?t=7m47s" frameborder="0" allowfullscreen></iframe>'
      },
      {
        element: '#nuevocrop',
        intro: 'nuevocrop'
      },
      {
        element: '#buttons-block',
        intro: "4"
      }
    ]
  });
  intro.start();
}



