//aqui onde recebemos a lat-Lng para chamar a API 
async function retornaCoord(obj){
  //recebe e converte os valores para JSON 
  const latlog =  JSON.parse(JSON.stringify(obj));
  var latitudeInfo  = latlog.lat;
  var longitudeInfo = latlog.lng;
  
  //chama a consulta passando os dados e aguarda o retorno 
  var aDados = await ConsultarLista(latitudeInfo,longitudeInfo);
  
  //ao retornar validamos os dados 
  if(aDados.PRTDADOS == undefined){
    console.log("Erro no retorno da consulta")
    alert("Desculpe nosso serviço está sofrendo com instabilidade - Tente novamente em alguns minutos !")
  }else{
    aDados = aDados.PRTDADOS;
  }
  //Envia para função que percorre o Array e adiciona ao mapa
  PreencherDados(aDados);
}