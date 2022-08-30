//funcão que retorna as posições do user. 
var consultou = 0;//variavel utilizada para que seja chamado apenas uma vez ao carregar 
var autoLat;
var autoLng;
async function showPosition(position){
  autoLat = position.coords.latitude;
  autoLng = position.coords.longitude;  
  
  if(autoLat != ""){
    if(consultou == 0){
      consultou++
      //chama a consulta passando os dados 
      var aDados = await ConsultarLista(autoLat,autoLng);
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
  }
}