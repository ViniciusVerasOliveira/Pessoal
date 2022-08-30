/** Add Autocomplete to the search input. */
function initializeSearchInputAutocomplete(locator, searchInputEl, fallbackSearch, searchLocationUpdater){
  // Set up Autocomplete on the search input. Bias results to map viewport.
  const autocomplete = new google.maps.places.Autocomplete(searchInputEl, {
    types: ['geocode'],
    fields: ['place_id', 'formatted_address', 'geometry.location']
  });
  autocomplete.bindTo('bounds', locator.map);
  autocomplete.addListener('place_changed', function() {
    const placeResult = autocomplete.getPlace();
    if (!placeResult.geometry) {
      // Hitting 'Enter' without selecting a suggestion will result in a
      // placeResult with only the text input value as the 'name' field.
      fallbackSearch(placeResult.name);
      return;
    }
    searchLocationUpdater(
      placeResult.formatted_address, placeResult.geometry.location);  
  });
}
