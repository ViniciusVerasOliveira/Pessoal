function PreencherDados(aDados){
  //Cria um laço de repetição que preenche os dados
  for (var i = 0; i < 5; i++) {
    cNomeCli = aDados[i].RAZAO            
    cEnd = aDados[i].ENDERECO
    cMun = aDados[i].MUNICIPIO
    cUF = aDados[i].UF
    nLat = parseFloat(aDados[i].LATITUDE)
    nLong = parseFloat(aDados[i].LONGITUDE)
    cPlaceID = aDados[i].PLACEID
    
    //Preenchemos um array para que seja chamado no mapa 
    oDadosEnd = {
      "title": cNomeCli,
      "address1": cEnd,
      "address2": cMun + ", " + cUF + ", Brasil",
      "coords": {
        "lat": nLat,
        "lng": nLong
      },
      "placeId": cPlaceID,
    }
    
    //envia para a lista de exibição a cada laço de repetição 
    CONFIGURATION.locations.push(oDadosEnd) 
    var coordenada = [nLat,nLong]
    //No ultimo registro preenchido re-iniciamos o mapa para carregar os pontos novamente
    if(i==4){
      initMap();   
      //aproveito para "clicar" sobre o pesquisar para que funcione o traçar rotas -- sim eu sei que é gambiarra mas funciona... ou quase
      document.getElementById("location-search-button").click();
    }
    //no fim de tudo "clico" novamente sobre o pesquisar para confirmar tudo
    document.getElementById("location-search-button").click();
  }
  document.getElementById("location-search-button").click(); 
}