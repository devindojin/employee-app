var search = instantsearch({
  appId: 'JP7LP38V57',
  apiKey: '240f4b6c8c92791fbe9081fec276ebd6',
  indexName: 'Jobs-EP',
  urlSync: true,
  searchParameters: {
  attributesToSnippet: ["description"] 
  }

});

  search.addWidget(
    instantsearch.widgets.searchBox({
      container: '#search-input',
      placeholder: 'Exemple : Ouvrier Paysagiste',
    })
  );

search.addWidget(
  instantsearch.widgets.refinementList({
    container: '#JobCategory',
    attributeName: 'secteur',
    operator: 'and',
    limit: 10,
    templates: {
      header: 'Type de Métier'
    }
  })
);

search.addWidget(
  instantsearch.widgets.refinementList({
    container: '#lieu',
    attributeName: 'region',
    operator: 'or',
    templates: {
      header: 'Région'
    }
  })
);

search.addWidget(
  instantsearch.widgets.refinementList({
    container: '#Contrat',
    attributeName: 'contrat',
    operator: 'or',
    limit: 10,
    templates: {
      header: 'Type de Contrat'
    }
  })
);

  search.addWidget(
    instantsearch.widgets.hits({
      container: '#hits',
      hitsPerPage: 100,
      cssClasses: {
      item: 'col-lg-12',
      },
      templates: {
        item: getTemplate('hits'),
        empty: getTemplate('no-results')
      }
    })
  );

  search.addWidget(
    instantsearch.widgets.stats({
      container: '#stats',
      templates: {
        body: getTemplate('stats')  
  }
    })
  );




function getTemplate(templateName) {
  return document.querySelector('#' + templateName + '-template').innerHTML;
}

search.start();