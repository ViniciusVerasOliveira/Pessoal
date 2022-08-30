/** Inicialize o serviço e a interface do usuário do Place Details para o localizador. */
function initializeDetails(locator) {
  const panelDetailsEl = document.getElementById('locations-panel-details');
  const detailsService = new google.maps.places.PlacesService(locator.map);
  const detailsTemplate = Handlebars.compile(document.getElementById('locator-details-tmpl').innerHTML);
  
  const renderDetails = function(context) {
    panelDetailsEl.innerHTML = detailsTemplate(context);
    panelDetailsEl.querySelector('.back-button')
    .addEventListener('click', hideDetails);
  };

  const hideDetails = function() {
    showElement(locator.panelListEl);
    hideElement(panelDetailsEl);
  };

  locator.showDetails = function(locationIndex) {
    const location = locator.locations[locationIndex];
    const context = {location};

    // Helper function to create a fixed-size array.
    const initArray = function(arraySize) {
      const array = [];
      while (array.length < arraySize) {
        array.push(0);
      }
      return array;
    };
    
    if (location.placeId) {
      const request = {
        placeId: location.placeId,
        fields:
          [
            'formatted_phone_number', 'website', 'opening_hours', 'url','utc_offset_minutes', 'price_level', 'rating', 'user_ratings_total'
          ]
      };

      detailsService.getDetails(request, function(place, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
          if (place.opening_hours) {
            const daysHours = place.opening_hours.weekday_text.map(e => e.split(/\:\s+/)).map(e => ({'days': e[0].substr(0, 3), 'hours': e[1]}));
            for (let i = 1; i < daysHours.length; i++) {
              if (daysHours[i - 1].hours === daysHours[i].hours) {
                if (daysHours[i - 1].days.indexOf('-') !== -1) {
                  daysHours[i - 1].days = daysHours[i - 1].days.replace(/\w+$/, daysHours[i].days);
                } else {
                  daysHours[i - 1].days += ' - ' + daysHours[i].days;
                }
                daysHours.splice(i--, 1);
              }
            }
            place.openingHoursSummary = daysHours;
          }
          if (place.rating) {
            const starsOutOfTen = Math.round(2 * place.rating);
            const fullStars = Math.floor(starsOutOfTen / 2);
            const halfStars = fullStars !== starsOutOfTen / 2 ? 1 : 0;
            const emptyStars = 5 - fullStars - halfStars;

            // Express stars as arrays to make iterating in Handlebars easy.
            place.fullStarIcons = initArray(fullStars);
            place.halfStarIcons = initArray(halfStars);
            place.emptyStarIcons = initArray(emptyStars);
          }

          if (place.price_level) {
            place.dollarSigns = initArray(place.price_level);
          }

          if (place.website) {
            const url = new URL(place.website);
            place.websiteDomain = url.hostname;
          }

          context.place = place;
          renderDetails(context);
        }
      });
    }
    
    renderDetails(context);
    hideElement(locator.panelListEl);
    showElement(panelDetailsEl);
  };
}