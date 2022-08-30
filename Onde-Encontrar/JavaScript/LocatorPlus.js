function LocatorPlus(configuration) {
  const locator = this;

  locator.locations = configuration.locations || [];
  locator.capabilities = configuration.capabilities || {};

  const mapEl = document.getElementById('gmp-map');
  const panelEl = document.getElementById('locations-panel');
  locator.panelListEl = document.getElementById('locations-panel-list');
  const sectionNameEl = document.getElementById('location-results-section-name');
  const resultsContainerEl = document.getElementById('location-results-list');
  const itemsTemplate = Handlebars.compile(document.getElementById('locator-result-items-tmpl').innerHTML);

  locator.searchLocation = null;
  locator.searchLocationMarker = null;
  locator.selectedLocationIdx = null;
  locator.userCountry = null;

  // Initialize the map -------------------------------------------------------
  locator.map = new google.maps.Map(mapEl, configuration.mapOptions);

  // Store selection.
  const selectResultItem = function(locationIdx, panToMarker, scrollToResult) {
    locator.selectedLocationIdx = locationIdx;
    for (let locationElem of resultsContainerEl.children) {
      locationElem.classList.remove('selected');
      if (getResultIndex(locationElem) === locator.selectedLocationIdx) {
        locationElem.classList.add('selected');
        if (scrollToResult) {
          panelEl.scrollTop = locationElem.offsetTop;
        }
      }
    }
    if (panToMarker && (locationIdx != null)) {
      locator.map.panTo(locator.locations[locationIdx].coords);
    }
  };
  
  //Create a marker for each location.
  const markers = locator.locations.map(function(location, index) {
    const marker = new google.maps.Marker({
      position: location.coords,
      map: locator.map,
      title: location.title,
      icon: pinoRev// Utiliza o ícone personalizado
    });

    marker.addListener('click', function() {
      selectResultItem(index, true, true);
    });
    return marker;
  });

  // Fit map to marker bounds.
  locator.updateBounds = function() {
    const bounds = new google.maps.LatLngBounds();
    if (locator.searchLocationMarker) {
      bounds.extend(locator.searchLocationMarker.getPosition());
    }
    for (let i = 0; i < markers.length; i++) {
      bounds.extend(markers[i].getPosition());
    }
    
    locator.map.fitBounds(bounds);
  };
  
  if (locator.locations.length) {
    locator.updateBounds();
  }

  // Get the distance of a store location to the user's location,
  // used in sorting the list.
  const getLocationDistance = function(location) {
    if (!locator.searchLocation) return null;
    // Use travel distance if available (from Distance Matrix).
    if (location.travelDistanceValue != null) {
      return location.travelDistanceValue;
    }
    // Fall back to straight-line distance.
    return google.maps.geometry.spherical.computeDistanceBetween(
      new google.maps.LatLng(location.coords),
      locator.searchLocation.location);
  };

  // Render the results list --------------------------------------------------
  const getResultIndex = function(elem) {
    return parseInt(elem.getAttribute('data-location-index'));
  };

  locator.renderResultsList = function() {
    let locations = locator.locations.slice();
    for (let i = 0; i < locations.length; i++) {
      locations[i].index = i;
    }
    if (locator.searchLocation) {
      sectionNameEl.textContent =
      'Revendedores proximos (' + locations.length + ')';
      locations.sort(function(a, b) {
        return getLocationDistance(a) - getLocationDistance(b);
      });
    } else {
      sectionNameEl.textContent = `Revendedores dos produtos (${locations.length})`;//Altera o texto e mostra quantos resultados tem na lista
    }
    
    const resultItemContext = {
      locations: locations,
      showDirectionsButton: !!locator.searchLocation
    };
    
    resultsContainerEl.innerHTML = itemsTemplate(resultItemContext);
      for (let item of resultsContainerEl.children) {
        const resultIndex = getResultIndex(item);
        if (resultIndex === locator.selectedLocationIdx) {
          item.classList.add('selected');
      }

      const resultSelectionHandler = function() {
        if (resultIndex !== locator.selectedLocationIdx) {
          locator.clearDirections();
        }
        selectResultItem(resultIndex, true, false);
      };

      // Clicking anywhere on the item selects this location.
      // Additionally, create a button element to make this behavior
      // accessible under tab navigation.
      item.addEventListener('click', resultSelectionHandler);
      item.querySelector('.select-location').addEventListener('click', function(e) {
        resultSelectionHandler();
        e.stopPropagation();
      });
      item.querySelector('.details-button').addEventListener('click', function() {
        locator.showDetails(resultIndex);
      });
      if (resultItemContext.showDirectionsButton) {
        item.querySelector('.show-directions').addEventListener('click', function(e) {
          selectResultItem(resultIndex, false, false);
          locator.updateDirections();
          e.stopPropagation();
        });
      }
    }
  };

  // Optional capability initialization --------------------------------------
  initializeSearchInput(locator);
  initializeDistanceMatrix(locator);
  initializeDirections(locator);
  initializeDetails(locator);

  // Initial render of results -----------------------------------------------
  locator.renderResultsList();

}