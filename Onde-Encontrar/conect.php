<?php 
//Endereço a ser consultado
$Link = "ENDEREÇO_REST";

//Inicia uma variavel de sessao 
$_SESSION['URL'] = $Link;
$_POST['URL'] = $Link;
$_GET['URL'] = $Link;

//Inicia a variavel de url para consulta
$_urlServer = $_SESSION['URL'];

//Recebe o token de autenticação 
$token = "";

//Chave para consultar o protheus - usuario/senha
$_urlChave = $_urlServer . "/api/oauth2/v1/token?grant_type=password&password=SUASENHA&username=SEUUSUARIO";

//Abre a conexão com curl - tipo de protocolo de transferencia 
$curl = curl_init();

//Cria o array com os dados de conexão 
curl_setopt_array($curl, array(

	//Tag para definir a chave de acesso 
	CURLOPT_URL => $_urlChave,

	//Tag para definir se retorna dados
	CURLOPT_RETURNTRANSFER => true,

	//Tag para definir o tipo de encriptação 
	//CURLOPT_ENCONDING =>  '',

	//Tag
	CURLOPT_MAXREDIRS => 10,

	//Tag para definir desconexão 
	CURLOPT_TIMEOUT => 0,

	//Tag
	CURLOPT_FOLLOWLOCATION => true,

	//Tag para definir a versao do HTTP ?????
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,	

	//Tag para definir o tipo de requisição
	CURLOPT_CUSTOMREQUEST => 'POST',

	//Tag para definir o tipo de retorno
	CURLOPT_HTTPHEADER => array(
		'Content-Type: application/json',
		'Accept: application/json'
	),

));
//executa o curl(protocolo) de acordo com o passado anteriormente 
$response = curl_exec($curl);

//Fecha a conexão curl
curl_close($curl);

//pega o retorno e decodifica para json
$response = json_decode($response, true);

//pega o link de acesso e refresh para que esteja sempre valido 
$token = ($response['access_token']);
$tokenRef = ($response['refresh_token']);
?>