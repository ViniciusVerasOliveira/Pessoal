//pega a geolocalização 
function getLocation(){
  if (navigator.geolocation){
    navigator.geolocation.getCurrentPosition(showPosition);
  }else{
    console.log("O seu navegador não suporta Geolocalização.");
  }
}