function startIntro(){
  var intro = introJs();
  intro.setOptions({
    steps: [
      {
        element: '#searchterms-block',
        intro: '1'
      },
      {
        element: '#filterby-block',
        intro: '2'
      },
      {
        element: '#ShowHideDivAdvancedSearch',
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