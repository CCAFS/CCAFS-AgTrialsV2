function startIntro() {
    var intro = introJs();
    intro.setOptions({
        steps: [
            {
                element: '#searchterms-block',
                intro: 'Enter keywords here that help you find trials according to crop, location, contact person, institution or other criteria'
            },
            {
                element: '#filterby-block',
                intro: 'You can narrow your search by putting in terms related to the project name, the contact person, the crop or technology evaluated or the trial name. These fields use auto complete.'
            },
            {
                element: '#ShowHideDivAdvancedSearch',
                intro: 'The advance search allows you to search trials by the planting or sewing date or by the harvest date. You can also search trials according to the date that records in the database were created.'
            },
            {
                element: '#buttons-block',
                intro: "Click on the search button when you have completed the fields above. The clear button removes all entries in the fields above and allows you to put in new search criteria."
            }
        ]
    });
    intro.start();
}