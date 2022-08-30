/** Initialize Directions service for the locator. */
function initializeDirections(locator) {
  const directionsCache = new Map();
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer({
    suppressMarkers: true,
  });

  // Update directions displayed from the search location to
  // the selected location on the map.
  locator.updateDirections = function() {
    if (!locator.searchLocation || (locator.selectedLocationIdx == null)) {
      return;
    }
    const cacheKey = JSON.stringify(
      [locator.searchLocation.location, locator.selectedLocationIdx]);
    if (directionsCache.has(cacheKey)) {
      const directions = directionsCache.get(cacheKey);
      directionsRenderer.setMap(locator.map);
      directionsRenderer.setDirections(directions);
      return;
    }
    const request = {
      origin: locator.searchLocation.location,
      destination: locator.locations[locator.selectedLocationIdx].coords,
      travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function(response, status) {
      if (status === 'OK') {
        directionsRenderer.setMap(locator.map);
        directionsRenderer.setDirections(response);
        directionsCache.set(cacheKey, response);
      }
    });
  };

  locator.clearDirections = function() {
    directionsRenderer.setMap(null);
  };
}