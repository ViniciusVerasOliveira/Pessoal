 <!-- DATA: 11/07/2022 | BY: Vinicius Veras Oliveira -->
 <!-- Pagina: Onde-Encontrar                         -->
 <!-- Obrigado pela visita!                          -->
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/handlebars/4.7.7/handlebars.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  <!--PHP-->
  <?php include 'conect.php'?>
  <!--CSS-->
  <link href="CSS/Style.css" rel="stylesheet">
  <!--JS interno-->
  <script type="text/javascript" src="JavaScript/LocatorPlus.js" >                      </script>  
  <script type="text/javascript" src="JavaScript/InitializeSearchInput.js" >            </script>
  <script type="text/javascript" src="JavaScript/InitializeSearchInputAutocomplete.js"> </script>
  <script type="text/javascript" src="JavaScript/InitializeDistanceMatrix.js" >         </script>
  <script type="text/javascript" src="JavaScript/InitializeDetails.js">                 </script>
  <script type="text/javascript" src="JavaScript/InitializeDirections.js">              </script>
  <script type="text/javascript" src="JavaScript/GetLocation.js" >                      </script>
  <script type="text/javascript" src="JavaScript/ShowPosition.js" >                     </script>
  <script type="text/javascript" src="JavaScript/RetornaCoord.js" >                     </script>
  <script type="text/javascript" src="JavaScript/ConsultarLista.js" >                   </script>
  <script type="text/javascript" src="JavaScript/PreencherDados.js" >                   </script>
  
  <script>
    'use strict';
    //variaveis customizadas
    var levaMapa; 
    var comparaAux="";
    var levaLugarDigitado;
    var requestOptions;
    var token;
    var pinoRev = 'pinoRev.png';
    var pinoCli = 'pinoCli.png';

    //Conexão via API - Recebe o token de "conect" 
    token = "<?php print $token ?>";
    requestOptions = {
      method: 'GET',
      redirect: 'follow',
      headers: {
        'Access-Control-Allow-Origin': '*',
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + token
      }
    };
      
    //Configuração do mapa 
    const CONFIGURATION = {
      "locations": [],        
      "mapOptions": {
        "center":{
          "lat":-23.533773,
          "lng":-46.625290
        },
        "fullscreenControl":true,
        "mapTypeControl":false,
        "streetViewControl":true,
        "zoom":5,
        "zoomControl":true,
        "maxZoom":17
      },
      "mapsApiKey": "SUACHAVE",
      "capabilities": {
        "input":true,
        "autocomplete":true,
        "directions":true,
        "distanceMatrix":true,
        "details":true,
        "actions":true
      }
    };

    //constroi o mapa - pega a localizção atual se permitir
    async function initMap(){
      getLocation();
      new LocatorPlus(CONFIGURATION);     
    }
    </script>

    <script id="locator-result-items-tmpl" type="text/x-handlebars-template">
      {{#each locations}}
      <li class="location-result" data-location-index="{{index}}">
        <button class="select-location">
          <h2 class="name">{{title}}</h2>
        </button>
        <div class="address">{{address1}}<br>{{address2}}</div>
        <div class="options">
          <div class="option-container">
            <button class="details-button option">
              <span>Detalhes</span>
            </button>
          </div>
        </div>
        {{#if travelDistanceText}}
        <div class="distance">{{travelDistanceText}}</div>
        {{/if}}
        {{#if ../showDirectionsButton}}
        <button class="show-directions" title="Veja a rota mais próxima">
          <svg width="34" height="34" viewBox="0 0 34 34"
          fill="none" xmlns="http://www.w3.org/2000/svg" alt="Show directions">
          <path d="M17.5867 9.24375L17.9403 8.8902V8.8902L17.5867 9.24375ZM16.4117 9.24375L16.7653 9.59731L16.7675 9.59502L16.4117 9.24375ZM8.91172 16.7437L8.55817 16.3902L8.91172 16.7437ZM8.91172 17.9229L8.55817 18.2765L8.55826 18.2766L8.91172 17.9229ZM16.4117 25.4187H16.9117V25.2116L16.7652 25.0651L16.4117 25.4187ZM16.4117 25.4229H15.9117V25.63L16.0582 25.7765L16.4117 25.4229ZM25.0909 17.9229L25.4444 18.2765L25.4467 18.2742L25.0909 17.9229ZM25.4403 16.3902L17.9403 8.8902L17.2332 9.5973L24.7332 17.0973L25.4403 16.3902ZM17.9403 8.8902C17.4213 8.3712 16.5737 8.3679 16.0559 8.89248L16.7675 9.59502C16.8914 9.4696 17.1022 9.4663 17.2332 9.5973L17.9403 8.8902ZM16.0582 8.8902L8.55817 16.3902L9.26527 17.0973L16.7653 9.5973L16.0582 8.8902ZM8.55817 16.3902C8.0379 16.9105 8.0379 17.7562 8.55817 18.2765L9.26527 17.5694C9.13553 17.4396 9.13553 17.227 9.26527 17.0973L8.55817 16.3902ZM8.55826 18.2766L16.0583 25.7724L16.7652 25.0651L9.26517 17.5693L8.55826 18.2766ZM15.9117 25.4187V25.4229H16.9117V25.4187H15.9117ZM16.0582 25.7765C16.5784 26.2967 17.4242 26.2967 17.9444 25.7765L17.2373 25.0694C17.1076 25.1991 16.895 25.1991 16.7653 25.0694L16.0582 25.7765ZM17.9444 25.7765L25.4444 18.2765L24.7373 17.5694L17.2373 25.0694L17.9444 25.7765ZM25.4467 18.2742C25.9631 17.7512 25.9663 16.9096 25.438 16.3879L24.7354 17.0995C24.8655 17.2279 24.8687 17.4363 24.7351 17.5716L25.4467 18.2742Z" fill="#7e7efd"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M19 19.8333V17.75H15.6667V20.25H14V16.9167C14 16.4542 14.3708 16.0833 14.8333 16.0833H19V14L21.9167 16.9167L19 19.8333Z" fill="#7e7efd"/>
          <circle cx="17" cy="17" r="16.5" stroke="#7e7efd"/>
        </svg>
      </button>
      {{/if}}
    </li>
    {{/each}}
  </script>

  <script id="locator-details-tmpl" type="text/x-handlebars-template">
    <button class="back-button">
      <img class="icon" src="https://fonts.gstatic.com/s/i/googlematerialicons/arrow_back/v11/24px.svg" alt=""/>
      Voltar
    </button>
    <header>
      <div class="banner">
        <!--<svg width="23" height="32" viewBox="0 0 23 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M22.9976 11.5003C22.9976 13.2137 22.7083 14.9123 21.8025 16.7056C18.6321 22.9832 12.7449 24.3314 12.2758 30.7085C12.2448 31.1294 11.9286 31.4744 11.4973 31.4744C11.0689 31.4744 10.7527 31.1294 10.7218 30.7085C10.2527 24.3314 4.3655 22.9832 1.19504 16.7056C0.289306 14.9123 0 13.2137 0 11.5003C0 5.13275 5.14557 0 11.5003 0C17.852 0 22.9976 5.13275 22.9976 11.5003Z" fill="#4285F4"/>
          <path fill-rule="evenodd" clip-rule="evenodd" transform="translate(5.5,5.5)" d="M6 8.84091L9.708 11L8.724 6.92961L12 4.19158L7.6856 3.83881L6 0L4.3144 3.83881L0 4.19158L3.276 6.92961L2.292 11L6 8.84091Z" fill="#FBE15C"/>
        </svg>-->
         <img id="imagenPesquisaPlaceId" class="icon" src="ICONEDAEMPRESA.png" alt="Search"/>
        <img src=''
      </div>
      <h2>{{location.title}}</h2>
    </header>
    {{#if location.travelDistanceText}}
    <div class="distance">{{location.travelDistanceText}} de distância</div>
    {{/if}}
    <div class="address">
      {{location.address1}}<br>
      {{location.address2}}
    </div>
    <div class="atmosphere">
      {{#if place.rating}}
      <span class="star-rating-numeric">{{place.rating}}</span>
      <span>
        {{#each place.fullStarIcons}}
        <img src="https://fonts.gstatic.com/s/i/googlematerialicons/star/v15/24px.svg"
        alt="" class="star-icon"/>
        {{/each}}
        {{#each place.halfStarIcons}}
        <img src="https://fonts.gstatic.com/s/i/googlematerialicons/star_half/v17/24px.svg"
        alt="" class="star-icon"/>
        {{/each}}
        {{#each place.emptyStarIcons}}
        <img src="https://fonts.gstatic.com/s/i/googlematerialicons/star_outline/v9/24px.svg"
        alt="" class="star-icon"/>
        {{/each}}
      </span>
      {{/if}}
      {{#if place.user_ratings_total}}
      <a href="{{place.url}}" target="_blank">{{place.user_ratings_total}} reviews</a>
      {{else}}
      <a href="{{place.url}}" target="_blank">Abrir no Google Maps</a>
      {{/if}}
      {{#if place.price_level}}
      &bull;
      <span class="price-dollars">
        {{#each place.dollarSigns}}${{/each}}
      </span>
      {{/if}}
    </div>
    <hr/>
    {{#if place.opening_hours}}
    <div class="hours contact">
      <img src="https://fonts.gstatic.com/s/i/googlematerialicons/schedule/v12/24px.svg"
      alt="Opening hours" class="icon"/>
      <div class="right">
        {{#each place.openingHoursSummary}}
        <div>
          <span class="weekday">{{days}}</span>
          <span class="hours">{{hours}}</span>
        </div>
        {{/each}}
      </div>
    </div>
    {{/if}}
    {{#if place.website}}
    <div class="website contact">
      <img src="https://fonts.gstatic.com/s/i/googlematerialicons/public/v10/24px.svg"
      alt="Website" class="icon"/>
      <div class="right">
        <a href="{{place.website}}" target="_blank">{{place.websiteDomain}}</a>
      </div>
    </div>
    {{/if}}
    {{#if place.formatted_phone_number}}
    <div class="phone contact">
      <img src="https://fonts.gstatic.com/s/i/googlematerialicons/phone/v10/24px.svg"
      alt="Phone number" class="icon"/>
      <div class="right">
        {{place.formatted_phone_number}}
      </div>
    </div>
    {{/if}}
    {{#if place.html_attributions}}
    {{#each place.html_attributions}}
    <p class="attribution">{{{this}}}</p>
    {{/each}}
    {{/if}}
  </script>

</head>

<body >
  <div id="map-container">
    <div id="locations-panel">
      <div id="locations-panel-list">
        <header>
          <h1 class="search-title">
            <img src="https://fonts.gstatic.com/s/i/googlematerialicons/place/v15/24px.svg"/>
            Encontre seu endereço
          </h1>
          <div class="search-input">
            <input id="location-search-input" placeholder="Digite seu endereço ou CEP">
            <div id="search-overlay-search" class="search-input-overlay search">
              <button id="location-search-button">
                <img id="imagenPesquisa" class="icon" src="https://fonts.gstatic.com/s/i/googlematerialicons/search/v11/24px.svg" title="Clique aqui para carregar os locais" alt="Search"/>
              </button>
            </div>
          </div>
        </header>
        <div class="section-name" id="location-results-section-name">
          Revendedores próximos: 
        </div>
        <div class="results">
          <ul id="location-results-list"></ul>
          <h1></h1>
        </div>
      </div>
      <div id="locations-panel-details"></div>
    </div>
    <div id="gmp-map"></div>
  </div>
  <script src="https://maps.googleapis.com/maps/api/js?key=SUACHAVE&callback=initMap&libraries=places,geometry&solution_channel=GMP_QB_locatorplus_v5_cABCDE" async defer></script>
</body>
</html>