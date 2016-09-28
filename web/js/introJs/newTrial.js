function startIntro() {
    var intro = introJs();
    intro.setOptions({
        steps: [
            {
                element: '#nameofproject-block',
                intro: 'The name that the data provider gives to identify the project.'
            },
            {
                element: '#projectleader-block',
                intro: 'The name and contact information of the person who leads the project.'
            },
            {
                element: '#projectinstitutions-block',
                intro: 'The name of the institution and the country where it is located of the organization that is implementing the project.'
            },
            {
                element: '#projectperiod-block',
                intro: 'The known or expected start and end dates of the project.'
            },
            {
                element: '#projectfunding-block',
                intro: 'The name of the donor organization who is funding the project.'
            },
            {
                element: '#projectinformation-block',
                intro: 'A short summary of the project in one paragraph and keywords that help identify the focus of the project and its location.'
            },
            {
                element: '#projecttrialmanager-block',
                intro: 'The name and contact of the person responsible for carrying out the trial. This may be the manager of the experiment station or the principal investigator of the project.'
            },
            {
                element: '#projecttrialperiod-block',
                intro: 'The beginning and ending dates of all trial activities, or the sowing date and the harvest date for crop trials,'
            },
            {
                element: '#projecttriallocation-block',
                intro: 'The name and location of the experiment station or trial site, as well as latitude and longitude coordinates and elevation of the site.'
            },
            {
                element: '#projecttrialchar-block',
                intro: 'A name that you get to the trial and the objectives of the trial.'
            },
            {
                element: '#projectaccessinfo-block',
                intro: 'As a data provider, you specify the AgTrials registered users  who have access to the data, or whether it can be in the public domain.'
            },
            {
                element: '#projectlicense-block',
                intro: 'Computer code generated from the Creative Commons License Generator (button on the lower right) that specifies the conditions under which the data can be used.'
            },
            {
                element: '#DivCrop1 .cropInfo',
                intro: 'Here you indicate information on the design of the trial, including planting, maturity and harvest dates.'
            },
            {
                element: '#DivCrop1 .varieties',
                intro: 'Here you search for existing variety names or indicate new variety names.'
            },
            {
                element: '#DivCrop1 .variablesMeasured',
                intro: 'Here you traits measured in the trial, from the Crop Ontology and AgTrials databases.'
            },
            {
                element: '#DivCrop1 .dataInformation',
                intro: 'This is the upload page where you can upload formatted data to AgTrials.'
            },
            {
                element: '#nuevocrop',
                intro: 'Here you can add additional crops in the cases of inter-cropping or other types of trials that imply more than one crop.'
            },
            {
                element: '#buttons-block',
                intro: "Click on the save button when you have completed your information."
            }
        ]
    });
    intro.start();
}



