function startIntro(){
  var intro = introJs();
  intro.setOptions({
    steps: [
      {
        element: '#crop-block',
        intro: '1'
      },
      {
        element: '#varieties-block',
        intro: '2'
      },
      {
        element: '#variablesMeasured-block',
        intro: '3'
      },
      {
        element: '#nuevocrop',
        intro: '3'
      },
      {
        element: '#buttons-block',
        intro: "4"
      }
    ]
  });
  intro.start();
}