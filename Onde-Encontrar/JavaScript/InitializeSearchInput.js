/** Quando o recurso de entrada de pesquisa estiver ativado, inicialize-o. **/
function initializeSearchInput(locator) {

  const geocodeCache = new Map();
  const geocoder = new google.maps.Geocoder();
  
  const searchInputEl = document.getElementById('location-search-input');
  const searchButtonEl = document.getElementById('location-search-button');

  const updateSearchLocation = function(address, location) {      
  var comparaEnd = document.getElementById("location-search-input").value;
    if (locator.searchLocationMarker) {
      locator.searchLocationMarker.setMap(null); 
    }

    if (!location) {
      locator.searchLocation = null;
      return;
    }            

    locator.searchLocation = {
      'address': address, 
      'location': location
    };

    if(location!=null){
      if(comparaEnd != comparaAux){
        comparaAux = comparaEnd;

        for(let y=0;y<5;y++){
          CONFIGURATION.locations.pop() 
        }
        retornaCoord(location);
      }
    }
    //cria e encontra o lugar correto do pino digitado
    locator.searchLocationMarker = new google.maps.Marker({            
      position: location,
      map: locator.map,
      title: 'Seu local!',
      icon: pinoCli// <-- Busca o ícone personalizado do revendedor 
    });

    levaLugarDigitado = location;
    //mopa = locator.map;

    // Atualiza a ideia do localizador do país do usuário, usado para unidades. Use formatted_address em vez dos `address_components` mais estruturados
    const addressParts = address.split(' ');
    locator.userCountry = addressParts[addressParts.length - 1];

    // Atualiza os limites do mapa para incluir o novo marcador de local.
    locator.updateBounds();
    // Atualiza a lista de resultados para que possamos classificá-la por proximidade.
    locator.renderResultsList();
    //mostra a distancia
    locator.updateTravelTimes();
    locator.clearDirections();
  };
  
  const geocodeSearch = function(query) {
    if (!query) {
      return;
    }

    const handleResult = function(geocodeResult) {
      //caso clique em pesquisar pela lupa ele mostra aqui
      searchInputEl.value = geocodeResult.formatted_address;
      updateSearchLocation(geocodeResult.formatted_address, geocodeResult.geometry.location);
    };

    if (geocodeCache.has(query)) {
      handleResult(geocodeCache.get(query));
      return;
    }
    const request = {address: query, bounds: locator.map.getBounds()};
    
    geocoder.geocode(request, function(results, status) {
      if (status === 'OK') {
        if (results.length > 0) {
          const result = results[0];
          geocodeCache.set(query, result);
          handleResult(result);
        }
      }
    });
  };

  // Configure a geocodificação na entrada de pesquisa.
  searchButtonEl.addEventListener('click', function() {
    geocodeSearch(searchInputEl.value.trim());
  });

  // Initialize Autocomplete.
  initializeSearchInputAutocomplete(locator, searchInputEl, geocodeSearch, updateSearchLocation);

  if(autoLat!=undefined){
    locator.searchLocationMarker = new google.maps.Marker({            
      position:  new google.maps.LatLng(autoLat,autoLng),
      map: locator.map,
      title: 'Seu local!',
      icon: pinoCli// <-- Busca o ícone personalizado do revendedor 
    });
    
  }

}