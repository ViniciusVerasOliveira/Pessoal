/** Initialize Distance Matrix for the locator. */
function initializeDistanceMatrix(locator) {
  const distanceMatrixService = new google.maps.DistanceMatrixService();
  // Annotate travel times to the selected location using Distance Matrix.
  locator.updateTravelTimes = function() {
    if (!locator.searchLocation) return;

    const units = (locator.userCountry === 'BRA') ?
    google.maps.UnitSystem.IMPERIAL :
    google.maps.UnitSystem.METRIC;
    const request = {
      origins: [locator.searchLocation.location],
      destinations: locator.locations.map(function(x) {
        return x.coords;
      }),
      travelMode: google.maps.TravelMode.DRIVING,
      unitSystem: units,
    };
    const callback = function(response, status) {
      if (status === 'OK') {
        const distances = response.rows[0].elements;
        for (let i = 0; i < distances.length; i++) {
          const distResult = distances[i];
          let travelDistanceText, travelDistanceValue;
          if (distResult.status === 'OK') {
            travelDistanceText = distResult.distance.text;
            travelDistanceValue = distResult.distance.value;
          }
          const location = locator.locations[i];
          location.travelDistanceText = travelDistanceText;
          location.travelDistanceValue = travelDistanceValue;
        }

        // Re-render the results list, in case the ordering has changed.
        locator.renderResultsList();
      }
    };
    distanceMatrixService.getDistanceMatrix(request, callback);
  };
}