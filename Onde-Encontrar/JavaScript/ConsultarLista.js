//Iniciamos uma função do tipo Assincrona para consultar a lista
async function ConsultarLista(latitudeInfo,longitudeInfo) {   
  if(latitudeInfo == undefined){
    console.log("Erro na validação de endereço")
  }else{
    //retornamos uma "promessa" que a função terá dados 
    return new Promise(function(resolve, reject) {
      //chama o endereço da API
      fetch("ENDERECO_REST/rest/LISTLATLOG?xLatBase="+latitudeInfo+"&xLngBase="+longitudeInfo+"", requestOptions)
      // recebe a resposta do tipo json
      .then(response => response.json())
      // permite a utilizar os dados contido em result
      .then(result =>resolve(result))
      //caso de algum erro retorna a mensagem a abaixo
      .catch(error => console.log('error', error));
    });
  }
} 