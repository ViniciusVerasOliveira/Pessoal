<!-- Codigo desenvolvido em JS, HTML com a finalidade de gerar codigo referente ao "cadastro de produtos" para ser usado na base de worpress-->
<head>
    <link rel="icon" type="image/png" href="Logo.png"/>
    <link rel="stylesheet" href="Css.css">
    <script type="text/javascript">
    console.log("Make by Vinicius Veras")    
        //variaveis de teste; 
            //var aux;
            //var xablau;

        //variveis globais 
            var modelosTotais=0; 
            var modeloAtual=0;
            var divModelo;
            

        //botões 
            var botaoAddColuna;
            var botaoRemoveColuna;
            var botaoRemoveModelo;

        //variaveis para pular linha 
            var inputBr01 = document.createElement("br");
            var inputBr02 = document.createElement("br");
            var inputBr03 = document.createElement("br");
            var inputBr04 = document.createElement("br");
            var inputBr05 = document.createElement("br");
            var inputBr06 = document.createElement("br");
            var inputBr07 = document.createElement("br");
            var inputBr08 = document.createElement("br");
            var inputBr09 = document.createElement("br");
            var inputBr10 = document.createElement("br");
            var inputBr11 = document.createElement("br");
            var inputBr12 = document.createElement("br");
            var inputBr13 = document.createElement("br");
            var inputBr14 = document.createElement("br");
            var inputBr15 = document.createElement("br");
            var inputBr16 = document.createElement("br");
            var inputBr17 = document.createElement("br");
            var inputBr18 = document.createElement("br");
            var inputBr19 = document.createElement("br");
            var inputBr20 = document.createElement("br");


        //função que reinicia os valores atuais de Modelo/ Coluna 
        function valores(){ 
            var colunasTotais;
            var colunaAtual; 
            var imagensTotais;
            var resetaImagens; 

            var colunaAlterada;
            var codigoDoProduto;
            var dimensoesDoProduto;
            var tensaoDoProduto;
            var potenciaDoProduto;
            var temperaturaDoProduto;
            var ircDoProduto;
            var anguloDoProduto;    
            var botaoGerarColunas;
            var botaoRemoverColunas;
            var botaoRemoverModelo;

            //conta o numero de "modelos" disponiveis e retora - valor "-1" para iniciar em 0 
            modelosTotais = (document.getElementsByName("modelo").length)-1;
            
            //laço de repetição para re-atribuir os numeros de modelo 
            for(var resetaModelos=0; resetaModelos<=modelosTotais; resetaModelos++){
                //conta todas as colunas dentro do modelo (resetaModelos)
                colunasTotais = document.getElementsByClassName("modelo")[resetaModelos].getElementsByClassName("Coluna").length;

                document.getElementsByName("modelo")[resetaModelos].setAttribute("id","modelo_"+resetaModelos);
                document.getElementsByName("MODELO_DO_PRODUTO")[resetaModelos].setAttribute("id","MODELO_DO_PRODUTO_"+resetaModelos);
                document.getElementsByName("MODELO_DO_PRODUTO")[resetaModelos].setAttribute("placeholder","MODELO_DO_PRODUTO_"+resetaModelos);

                //corrige a divUrl com id correto - apos isso entra no laço para corrigir dentro da div
                document.getElementsByName("divUrl")[resetaModelos].setAttribute("id","divUrl"+resetaModelos);
                //conta o numero de imagens dentro deste modelo 
                imagensTotais = document.getElementsByName("divUrl")[resetaModelos].getElementsByTagName("INPUT").length;;
                //arrumar os ids das imagens 
                for(var resetaImagens=0; resetaImagens<imagensTotais; resetaImagens++){
                    document.getElementsByName("divUrl")[resetaModelos].getElementsByTagName("INPUT")[resetaImagens].setAttribute("id","URL_IMAGEM_"+resetaModelos+"_"+resetaImagens);
                    document.getElementsByName("divUrl")[resetaModelos].getElementsByTagName("INPUT")[resetaImagens].setAttribute("placeholder","URL_IMAGEM_"+resetaModelos+"_"+resetaImagens);
                }

                document.getElementsByName("addImagen")[resetaModelos].setAttribute("data-modelo",resetaModelos);
                
                document.getElementsByName("TIT_POTENCIA_DO_PRODUTO")[resetaModelos].setAttribute("id","TIT_POTENCIA_DO_PRODUTO_"+resetaModelos);
                document.getElementsByName("EXIBE_POTENCIA_DO_PRODUTO")[resetaModelos].setAttribute("id","POTENCIA_DO_PRODUTO_"+resetaModelos);

                document.getElementsByName("TIT_TENSAO_DO_PRODUTO")[resetaModelos].setAttribute("id","TIT_TENSAO_DO_PRODUTO_"+resetaModelos);    
                document.getElementsByName("EXIBE_TENSAO_DO_PRODUTO")[resetaModelos].setAttribute("id","TENSAO_DO_PRODUTO_"+resetaModelos);

                document.getElementsByName("TIT_TEMP_DO_PRODUTO")[resetaModelos].setAttribute("id","TIT_TEMP_DO_PRODUTO_"+resetaModelos);        
                document.getElementsByName("TEMP_DO_PRODUTO")[resetaModelos].setAttribute("id","TEMP_DO_PRODUTO_"+resetaModelos);

                document.getElementsByName("TIT_BASE_DO_PRODUTO")[resetaModelos].setAttribute("id","TIT_BASE_DO_PRODUTO_"+resetaModelos);            
                document.getElementsByName("BASE_DO_PRODUTO")[resetaModelos].setAttribute("id","BASE_DO_PRODUTO_"+resetaModelos);

                document.getElementsByName("TIT_IP_DO_PRODUTO")[resetaModelos].setAttribute("id","TIT_IP_DO_PRODUTO_"+resetaModelos);
                document.getElementsByName("IP_DO_PRODUTO")[resetaModelos].setAttribute("id","IP_DO_PRODUTO_"+resetaModelos);
            //dentro do for vamos começar um novo for para lidar com as colunas da tabela tecnica
                //botao remover modelo
                if(document.getElementsByClassName("removerModelo")[resetaModelos] !=undefined){
                    document.getElementsByClassName("removerModelo")[resetaModelos].setAttribute("data-modelo",resetaModelos);    
                }
                
                
            //inicia um novo laço para executar a correção dos dados 
                //define a coluna que inicia 
                colunaAtual=0;
                //executa o for dentro de acordo o do modelo
                for(var resetaColunas=0; resetaColunas<=colunasTotais; resetaColunas++){
                //efetuo a busca dos modelos de acordo com os elementos na tela - amarrado por classe - 
                    colunaAlterada = document.getElementsByClassName("modelo")[resetaModelos].getElementsByClassName("Coluna")[resetaColunas];
                //encontra os itens da tabela tecnica e caso exista entra no IF  
                    codigoDoProduto = document.getElementsByClassName("modelo")[resetaModelos].getElementsByClassName("Coluna")[resetaColunas]
                //se existir a coluna tecnica - codigoDoProduto valido - ele preenche as varivaves buscando por classe 
                    if(codigoDoProduto!=undefined){
                        codigoDoProduto     = document.getElementsByClassName("modelo")[resetaModelos].getElementsByClassName("Coluna")[resetaColunas].getElementsByClassName("CODIGO_DO_PRODUTO")[0];  
                        dimensoesDoProduto  = document.getElementsByClassName("modelo")[resetaModelos].getElementsByClassName("Coluna")[resetaColunas].getElementsByClassName("DIMENSAO_DO_PRODUTO")[0];
                        tensaoDoProduto     = document.getElementsByClassName("modelo")[resetaModelos].getElementsByClassName("Coluna")[resetaColunas].getElementsByClassName("TENSAO_DO_PRODUTO")[0];
                        potenciaDoProduto   = document.getElementsByClassName("modelo")[resetaModelos].getElementsByClassName("Coluna")[resetaColunas].getElementsByClassName("POTENCIA_DO_PRODUTO")[0];
                        temperaturaDoProduto= document.getElementsByClassName("modelo")[resetaModelos].getElementsByClassName("Coluna")[resetaColunas].getElementsByClassName("TEMPERATURA_DO_PRODUTO")[0];
                        ircDoProduto        = document.getElementsByClassName("modelo")[resetaModelos].getElementsByClassName("Coluna")[resetaColunas].getElementsByClassName("IRC_DO_PRODUTO")[0];
                        anguloDoProduto     = document.getElementsByClassName("modelo")[resetaModelos].getElementsByClassName("Coluna")[resetaColunas].getElementsByClassName("ANGULO_DO_PRODUTO")[0];
                        botaoGerarColunas   = document.getElementsByClassName("modelo")[resetaModelos].getElementsByClassName("Coluna")[resetaColunas].getElementsByClassName("gerarColunas")[0];
                        botaoRemoverColunas = document.getElementsByClassName("modelo")[resetaModelos].getElementsByClassName("Coluna")[resetaColunas].getElementsByClassName("removerColunas")[0];
                    }else{}
                //se coluna alterada conter um valor valido executa as alterações nas campos encontrados no if anterior 
                    if(colunaAlterada != undefined || colunaAlterada!= null){

                        colunaAlterada.setAttribute("id","tabela_Modelo"+resetaModelos+"_Coluna"+colunaAtual);
                    //codigo
                        codigoDoProduto.setAttribute("id","CODIGO_DO_PRODUTO_"+resetaModelos+"_"+colunaAtual);
                        codigoDoProduto.setAttribute("placeholder","CODIGO_DO_PRODUTO: "+resetaModelos+" / Linha: "+colunaAtual);
                    //dimensao
                        dimensoesDoProduto.setAttribute("id","DIMENSAO_DO_PRODUTO_"+resetaModelos+"_"+colunaAtual);
                        dimensoesDoProduto.setAttribute("placeholder","DIMENSAO_DO_PRODUTO "+resetaModelos+" / Linha: "+colunaAtual);
                    //tensao 
                        tensaoDoProduto.setAttribute("id","TENSAO_DO_PRODUTO_"+resetaModelos+"_"+colunaAtual);
                        tensaoDoProduto.setAttribute("placeholder","TENSAO_DO_PRODUTO "+resetaModelos+" / Linha: "+colunaAtual);
                    //potencia    
                        potenciaDoProduto.setAttribute("id","POTENCIA_DO_PRODUTO_"+resetaModelos+"_"+colunaAtual);
                        potenciaDoProduto.setAttribute("placeholder","POTENCIA_DO_PRODUTO "+resetaModelos+" / Linha: "+colunaAtual);
                    //temperatura
                        temperaturaDoProduto.setAttribute("id","TEMPERATURA_DO_PRODUTO_"+resetaModelos+"_"+colunaAtual);
                        temperaturaDoProduto.setAttribute("placeholder","TEMPERATURA_DO_PRODUTO "+resetaModelos+" / Linha: "+colunaAtual);
                    //IRC
                        ircDoProduto.setAttribute("id","IRC_DO_PRODUTO_"+resetaModelos+"_"+colunaAtual);
                        ircDoProduto.setAttribute("placeholder","IRC_DO_PRODUTO "+resetaModelos+" / Linha: "+colunaAtual);
                    //angulo
                        anguloDoProduto.setAttribute("id","ANGULO_DO_PRODUTO_"+resetaModelos+"_"+colunaAtual);
                        anguloDoProduto.setAttribute("placeholder","ANGULO_DO_PRODUTO "+resetaModelos+" / Linha: "+colunaAtual);
                    //botao gerar coluna     
                        botaoGerarColunas.setAttribute("data-modelo",resetaModelos);
                        botaoGerarColunas.setAttribute("id","gerarColunas_"+resetaModelos+"_"+colunaAtual);
                    //botao remover coluna     
                        if(botaoRemoverColunas != undefined){
                            botaoRemoverColunas.setAttribute("id","removerColunas_"+resetaModelos+"_"+colunaAtual);
                            botaoRemoverColunas.setAttribute("data-coluna","tabela_Modelo"+resetaModelos+"_Coluna"+colunaAtual);
                            botaoRemoverColunas.setAttribute("data-modelo",resetaModelos);
                        }                

                        colunaAtual++;
                    }//Fim if
                }//Fim for resetaColunas  
            }//Fim for resetaModelos
        }//Fim função de correção

        //função para criar um modelo adicional 
        function gerarModelos(){
            //aumenta 1 na contagem geral de modelos
            modelosTotais++;

        //variaveis declaradas para função - estão na orde; 
            var divMod;
            var spanNovo;
            var tituloModelo;
            var divModeloTitulo;
            var tituloCabecalho;
            var inputModelo;
            var inputImg;
            var divUrl;
            var divCorpo;
            var botaoImagem;
            var inputTituloPot;
            var inputExibePot;
            var inputTituloTensao;
            var inputExibeTensao;
            var inputTituloTemp;
            var inputExibeTemp;
            var inputTituloBase;
            var inputExibeBase;
            var inputTituloIP;
            var inputExibeIP;

            //tecnica
            var tabelaNovoMod;
            var tituloColuna;
            var inputTabCod;
            var inputTabDim;
            var inputTabTensao;
            var inputTabPot;
            var inputTabTemp;
            var inputTabIrc;
            var inputTabAngulo;

            //Cria uma div para um novo modelo adicional 
            spanNovo = document.createElement("div");
            spanNovo.setAttribute("id","modelo_"+modelosTotais);
            spanNovo.setAttribute("name","modelo");
            spanNovo.setAttribute("class","modelo");
            
            //Cria o titulo de modelo adicional 
            tituloModelo = document.createElement("h3");
            tituloModelo.innerText = "Modelo adicional";
            spanNovo.appendChild(tituloModelo);
            
            //cria uma div para separa o cabeçalho do modelo
            divModeloTitulo = document.createElement("div");
            divModeloTitulo.setAttribute("class","modelo-titulo");

            //Cria o titulo de cabeçalho adicional 
            tituloCabecalho = document.createElement("h3");
            tituloCabecalho.innerText = "Cabeçalho do produto";
            divModeloTitulo.appendChild(tituloCabecalho);

            //cria uma div para separa o corpo do modelo
            divCorpo = document.createElement("div");
            divCorpo.setAttribute("id","divCorpo");

            // Cria o input de texto pra digitar o modelo
            inputModelo = document.createElement("INPUT");
            inputModelo.setAttribute("type","text");
            inputModelo.setAttribute("id","MODELO_DO_PRODUTO_"+modelosTotais);
            inputModelo.setAttribute("name","MODELO_DO_PRODUTO");
            inputModelo.setAttribute("placeholder","MODELO_DO_PRODUTO "+modelosTotais)

            // Cria o input de texto para colocar a url da imagem.
            inputImg = document.createElement("INPUT");
            inputImg.setAttribute("type","text");
            inputImg.setAttribute("id","URL_IMAGEM_"+modelosTotais+"_0");
            inputImg.setAttribute("name", "URL_IMAGEM");
            inputImg.setAttribute("placeholder","IMAGEM_DO_PRODUTO_"+modelosTotais+"_0");

            //Cria a div da imagens do modelo atual 
            divUrl = document.createElement("div");
            divUrl.setAttribute("id","divUrl"+modelosTotais);
            divUrl.setAttribute("name","divUrl");
            //apenda a imagem a div 
            divUrl.appendChild(inputImg);

            //Cria o botao para add imagem
            botaoImagem = document.createElement("INPUT");
            botaoImagem.setAttribute("type","button");
            botaoImagem.setAttribute("class","button")
            botaoImagem.setAttribute("onclick","gerarImagem(this)");
            botaoImagem.setAttribute("id","addImagen");
            botaoImagem.setAttribute("name","addImagen");
            botaoImagem.setAttribute("value","Nova imagem");
            botaoImagem.setAttribute("data-modelo",modelosTotais);

            //cria o input de titulo potencia  
            inputTituloPot = document.createElement("INPUT");
            inputTituloPot.setAttribute("type","text");
            inputTituloPot.setAttribute("name", "TIT_POTENCIA_DO_PRODUTO");
            inputTituloPot.setAttribute("id","TIT_POTENCIA_DO_PRODUTO_"+modelosTotais);
            inputTituloPot.setAttribute("value","Potencia: ");
            inputTituloPot.setAttribute("placeholder","TIT_POTENCIA_DO_PRODUTO ");
            //cria o input de potencia  
            inputExibePot = document.createElement("INPUT");
            inputExibePot.setAttribute("type","text");
            inputExibePot.setAttribute("name", "EXIBE_POTENCIA_DO_PRODUTO");
            inputExibePot.setAttribute("id","POTENCIA_DO_PRODUTO_"+modelosTotais);
            inputExibePot.setAttribute("placeholder","POTENCIA_DO_PRODUTO ");
            
            //cria o input de titulo TENSAO
            inputTituloTensao = document.createElement("INPUT");
            inputTituloTensao.setAttribute("type","text");
            inputTituloTensao.setAttribute("name", "TIT_TENSAO_DO_PRODUTO");
            inputTituloTensao.setAttribute("id","TIT_TENSAO_DO_PRODUTO_"+modelosTotais);
            inputTituloTensao.setAttribute("value","Tensão: ");    
            inputTituloTensao.setAttribute("placeholder","TIT_TENSAO_DO_PRODUTO");
            //cria o input de TENSAO
            inputExibeTensao = document.createElement("INPUT");
            inputExibeTensao.setAttribute("type","text");
            inputExibeTensao.setAttribute("name", "EXIBE_TENSAO_DO_PRODUTO");
            inputExibeTensao.setAttribute("id","TENSAO_DO_PRODUTO_"+modelosTotais);
            inputExibeTensao.setAttribute("placeholder","TENSAO_DO_PRODUTO");
        
            //cria o input de titulo TEMPERATURA
            inputTituloTemp = document.createElement("INPUT");
            inputTituloTemp.setAttribute("type","text");
            inputTituloTemp.setAttribute("name", "TIT_TEMP_DO_PRODUTO");
            inputTituloTemp.setAttribute("id","TIT_TEMP_DO_PRODUTO_"+modelosTotais);
            inputTituloTemp.setAttribute("value","Temperatura de cor: ");    
            inputTituloTemp.setAttribute("placeholder","TIT_TEMP_DO_PRODUTO");
            //cria o input de TEMPERATURA
            inputExibeTemp = document.createElement("INPUT");
            inputExibeTemp.setAttribute("type","text");
            inputExibeTemp.setAttribute("name", "TEMP_DO_PRODUTO");
            inputExibeTemp.setAttribute("id","TEMP_DO_PRODUTO_"+modelosTotais);
            inputExibeTemp.setAttribute("placeholder","TEMP_DO_PRODUTO");

            //cria o input de titulo Base 
            inputTituloBase = document.createElement("INPUT");
            inputTituloBase.setAttribute("type","text");
            inputTituloBase.setAttribute("name", "TIT_BASE_DO_PRODUTO");
            inputTituloBase.setAttribute("id","TIT_BASE_DO_PRODUTO_"+modelosTotais);
            inputTituloBase.setAttribute("value","Base do produto: "); 
            inputTituloBase.setAttribute("placeholder","TIT_BASE_DO_PRODUTO");
            //cria o input de Base 
            inputExibeBase = document.createElement("INPUT");
            inputExibeBase.setAttribute("type","text");
            inputExibeBase.setAttribute("name", "BASE_DO_PRODUTO");
            inputExibeBase.setAttribute("id","BASE_DO_PRODUTO_"+modelosTotais);
            inputExibeBase.setAttribute("placeholder","BASE_DO_PRODUTO");

            //cria o input de titulo IP
            inputTituloIP = document.createElement("INPUT");
            inputTituloIP.setAttribute("type","text");
            inputTituloIP.setAttribute("name", "TIT_IP_DO_PRODUTO");
            inputTituloIP.setAttribute("id","TIT_IP_DO_PRODUTO_"+modelosTotais);
            inputTituloIP.setAttribute("value","Indice de proteção: "); 
            inputTituloIP.setAttribute("placeholder","TIT_IP_DO_PRODUTO");
            //cria o input de IP
            inputExibeIP = document.createElement("INPUT");
            inputExibeIP.setAttribute("type","text");
            inputExibeIP.setAttribute("name", "IP_DO_PRODUTO");
            inputExibeIP.setAttribute("id","IP_DO_PRODUTO_"+modelosTotais);
            inputExibeIP.setAttribute("placeholder","IP_DO_PRODUTO");

        //Tudo da tabela tecnica
            //div da tabela 
            tabelaNovoMod = document.createElement("div");
            tabelaNovoMod .setAttribute("id","tabela_Modelo"+modelosTotais+"_Coluna0");
            tabelaNovoMod .setAttribute("name","coluna");
            //tabelaNovoMod .setAttribute("data-tabela","nLinha_0");
            tabelaNovoMod .setAttribute("class","Coluna");

            tituloColuna = document.createElement("h3");
            tituloColuna.innerText = "Coluna da informação tecnica ";
            tabelaNovoMod.appendChild(tituloColuna);

            //cria o input de codigo 
            inputTabCod = document.createElement("INPUT");
            inputTabCod.setAttribute("type","text");
            inputTabCod.setAttribute("name", "CODIGO_DO_MODELO");
            inputTabCod.setAttribute("id","CODIGO_DO_PRODUTO_"+modelosTotais+"_0");
            inputTabCod.setAttribute("class","CODIGO_DO_PRODUTO");
            inputTabCod.setAttribute("placeholder","CODIGO_DO_PRODUTO: "+modelosTotais+" / Linha: 0");

            //cria o input de DIMENSOES 
            inputTabDim = document.createElement("INPUT");
            inputTabDim.setAttribute("type","text");
            inputTabDim.setAttribute("name", "DIMENSAO_DO_PRODUTO");
            inputTabDim.setAttribute("id","DIMENSAO_DO_PRODUTO_"+modelosTotais+"_0");
            inputTabDim.setAttribute("class", "DIMENSAO_DO_PRODUTO");
            inputTabDim.setAttribute("placeholder","DIMENSOES_DO_MODELO: "+modelosTotais+" / Linha: 0");
            
            //cria o input de TENSAO 
            inputTabTensao = document.createElement("INPUT");
            inputTabTensao.setAttribute("type","text");
            inputTabTensao.setAttribute("name", "TENSAO_DO_PRODUTO");
            inputTabTensao.setAttribute("id","TENSAO_DO_PRODUTO_"+modelosTotais+"_0");
            inputTabTensao.setAttribute("class", "TENSAO_DO_PRODUTO");
            inputTabTensao.setAttribute("placeholder","TENSAO_DO_MODELO: "+modelosTotais+"/ Linha: 0");
            
            //cria o input de potencia 
            inputTabPot = document.createElement("INPUT");
            inputTabPot.setAttribute("type","text");
            inputTabPot.setAttribute("name", "POTENCIA_DO_PRODUTO");
            inputTabPot.setAttribute("id","POTENCIA_DO_PRODUTO_"+modelosTotais+"_0");
            inputTabPot.setAttribute("class", "POTENCIA_DO_PRODUTO");
            inputTabPot.setAttribute("placeholder","POTENCIA_DO_PRODUTO: "+modelosTotais+" / Linha 0");

            //cria o input de temperatura 
            inputTabTemp = document.createElement("INPUT");
            inputTabTemp.setAttribute("type","text");
            inputTabTemp.setAttribute("name", "TEMPERATURA_DO_PRODUTO");
            inputTabTemp.setAttribute("id","TEMPERATURA_DO_PRODUTO_"+modelosTotais+"_0");
            inputTabTemp.setAttribute("class", "TEMPERATURA_DO_PRODUTO");
            inputTabTemp.setAttribute("placeholder","TEMPERATURA_DO_PRODUTO: "+modelosTotais+" / Linha 0");

            //cria o input de IRC 
            inputTabIrc = document.createElement("INPUT");
            inputTabIrc.setAttribute("type","text");
            inputTabIrc.setAttribute("name", "IRC_DO_PRODUTO");
            inputTabIrc.setAttribute("id","IRC_DO_PRODUTO_"+modelosTotais+"_0");
            inputTabIrc.setAttribute("class", "IRC_DO_PRODUTO");
            inputTabIrc.setAttribute("placeholder","IRC_DO_PRODUTO: "+modelosTotais+" / Linha 0");
            
            //cria o input de aNGULO 
            inputTabAngulo = document.createElement("INPUT");
            inputTabAngulo.setAttribute("type","text");
            inputTabAngulo.setAttribute("name", "ANGULO_DO_PRODUTO");
            inputTabAngulo.setAttribute("id","ANGULO_DO_PRODUTO_"+modelosTotais+"_0");
            inputTabAngulo.setAttribute("class", "ANGULO_DO_PRODUTO");
            inputTabAngulo.setAttribute("placeholder","ANGULO_DO_PRODUTO: "+modelosTotais+" / Linha 0");

            //Cria o botao de gerar uma nova coluna
            botaoAddColuna = document.createElement("INPUT");
            botaoAddColuna.setAttribute("type","button");
            botaoAddColuna.setAttribute("onclick","gerarColuna(this)");
            botaoAddColuna.setAttribute("id","gerarColunas_"+modelosTotais+"_0");
            botaoAddColuna.setAttribute("class","gerarColunas button");
            botaoAddColuna.setAttribute("value","Gerar nova coluna");
            botaoAddColuna.setAttribute("data-modelo",modelosTotais);
            
            //Cria o botao de remover coluna
            botaoRemoveColuna = document.createElement("INPUT");
            botaoRemoveColuna.setAttribute("type","button");
            botaoRemoveColuna.setAttribute("onclick","removerColuna(this)");
            botaoRemoveColuna.setAttribute("id","removerColunas_"+modelosTotais+"_0");
            botaoRemoveColuna.setAttribute("class","removerColunas button");
            botaoRemoveColuna.setAttribute("value","Remover coluna atual");
            botaoRemoveColuna.setAttribute("data-coluna","tabela_Modelo"+modelosTotais+"_Coluna0");
            botaoRemoveColuna.setAttribute("data-modelo",modelosTotais);

            //Cria o botao de remover Modelo
            botaoRemoveModelo = document.createElement("INPUT");
            botaoRemoveModelo.setAttribute("type","button");
            botaoRemoveModelo.setAttribute("onclick","removerModelos(this)");
            botaoRemoveModelo.setAttribute("id","removerModelo");
            botaoRemoveModelo.setAttribute("class","removerModelo button");
            botaoRemoveModelo.setAttribute("value","Remover modelo atual");
            botaoRemoveModelo.setAttribute("data-modelo",modelosTotais);

            
    //Fim tabela tecnica

            //Localiza a DIV dos modelos.
            divMod = document.getElementById("todosModelos");
            
            //Agrega o valor definido nos elementos acima dentro do span (div principal)
            //div de cabeçalho do modelo - "modelo-titulo"
            divModeloTitulo.appendChild(inputModelo);
            divModeloTitulo.appendChild(inputBr01);
            divModeloTitulo.appendChild(divUrl);
            divModeloTitulo.appendChild(botaoImagem);
            divModeloTitulo.appendChild(inputBr02);
            
            //div de corpo do modelo - "divCorpo"
            divCorpo.appendChild(inputTituloPot);
            divCorpo.appendChild(inputExibePot);
            divCorpo.appendChild(inputBr03);
            divCorpo.appendChild(inputTituloTensao);
            divCorpo.appendChild(inputExibeTensao);
            divCorpo.appendChild(inputBr04);
            divCorpo.appendChild(inputTituloTemp);
            divCorpo.appendChild(inputExibeTemp);
            divCorpo.appendChild(inputBr05);
            divCorpo.appendChild(inputTituloBase);
            divCorpo.appendChild(inputExibeBase);
            divCorpo.appendChild(inputBr06);
            divCorpo.appendChild(inputTituloIP);
            divCorpo.appendChild(inputExibeIP);
            divCorpo.appendChild(inputBr07);
            divModeloTitulo.appendChild(divCorpo)

            spanNovo.appendChild(divModeloTitulo);

            //div de tabela tecnica - tabela_ModeloX_ColunaX
            tabelaNovoMod.appendChild(inputTabCod);
            tabelaNovoMod.appendChild(inputBr08);
            tabelaNovoMod.appendChild(inputTabDim);
            tabelaNovoMod.appendChild(inputBr09);
            tabelaNovoMod.appendChild(inputTabTensao);
            tabelaNovoMod.appendChild(inputBr10);
            tabelaNovoMod.appendChild(inputTabPot);
            tabelaNovoMod.appendChild(inputBr11);
            tabelaNovoMod.appendChild(inputTabTemp);
            tabelaNovoMod.appendChild(inputBr12);
            tabelaNovoMod.appendChild(inputTabIrc);
            tabelaNovoMod.appendChild(inputBr13);
            tabelaNovoMod.appendChild(inputTabAngulo);
            tabelaNovoMod.appendChild(inputBr14);
            tabelaNovoMod.appendChild(botaoAddColuna);
            tabelaNovoMod.appendChild(botaoRemoveColuna);
            tabelaNovoMod.appendChild(inputBr15);
            spanNovo.appendChild(tabelaNovoMod);
            spanNovo.appendChild(botaoRemoveModelo);
            spanNovo.appendChild(inputBr16);

            //Agrega todo o conteúdo do span dentro da div
            divMod.appendChild(spanNovo);
            
        }

        //função para remover um modelo  
        function removerModelos(obj) {
            //remove o elemento 
            var idBotao = obj.getAttribute("data-modelo");
            var modeloDeletada = document.getElementById("modelo_"+idBotao);
            var removedChild = modeloDeletada.remove(modeloDeletada); 
        
            //conta todos os modelos após a remoção
            var contaModelosAux = document.getElementsByName("modelo").length;

            //subtrai 1 na contagem geral de modelos
            modelosTotais--;

            //Chama a função valores para que atribua o numero correto ao modelo
            valores();
        }

        
        function gerarImagem(obj){
            var idBotaoImagem;
            var contaImagens;
            var inputImg;
            //pega o id do modelo em que está add - passado pelo objeto
            idBotaoImagem = obj.getAttribute("data-modelo");
            //valida a entrada - se a opção acima não funcionar excuta o que está logo abaixo
            if(idBotaoImagem == null){
                idBotaoImagem = obj.getAttribute("data-tab");
            }
            
            //encontra a div a ser adicionada
            var divUrl=document.getElementById("divUrl"+idBotaoImagem);

            contaImagens = divUrl.getElementsByTagName("INPUT").length

            // Cria o input de texto para colocar a url da imagem.
            inputImg = document.createElement("INPUT");
            inputImg.setAttribute("type","text");
            inputImg.setAttribute("id","URL_IMAGEM_"+idBotaoImagem+"_"+contaImagens);
            inputImg.setAttribute("name", "URL_IMAGEM");
            inputImg.setAttribute("class", "URL_IMAGEM");
            inputImg.setAttribute("placeholder","IMAGEM_DO_PRODUTO "+idBotaoImagem); 

            divUrl.appendChild(inputImg);
            contaImagens++;
        }

        //função para criar uma coluna adiciona na tabela 
        function gerarColuna(obj){   
            //variaveis 
            var idBotao ;
            var spanModeloAtual;
            var contaColunas;

            var novaColuna;
            var tituloColuna;
            var inputNovaTabCod;
            var inputNovaTabDim;
            var inputNovaTabTensao; 
            var inputNovaTabPotencia;
            var inputNovaTabTemp;
            var inputNovaTabIrc;
            var inputNovaTabAngulo;

            //pega o ultimo modelo gerado 
            idBotao = obj.getAttribute("data-modelo");
            spanModeloAtual = document.getElementById("modelo_"+idBotao);
            contaColunas = document.getElementById("modelo_"+idBotao).getElementsByClassName("coluna").length;
            
            //Gera uma ultima 
            novaColuna = document.createElement("div");
            novaColuna.setAttribute("id","tabela_Modelo"+idBotao+"_Coluna"+contaColunas);
            novaColuna.setAttribute("name","coluna");
            novaColuna.setAttribute("class","Coluna");                

            tituloColuna = document.createElement("h3");
            tituloColuna.innerText = "Coluna da informação tecnica ";
            
            inputNovaTabCod = document.createElement("INPUT");
            inputNovaTabCod.setAttribute("type","text");
            inputNovaTabCod.setAttribute("name", "CODIGO_DO_MODELO");
            inputNovaTabCod.setAttribute("id","CODIGO_DO_PRODUTO_"+idBotao+"_"+contaColunas);
            inputNovaTabCod.setAttribute("class","CODIGO_DO_PRODUTO");
            inputNovaTabCod.setAttribute("placeholder","CODIGO_DO_PRODUTO: "+idBotao+" / Linha: "+contaColunas);

            //cria o input de DIMENSOES 
            inputNovaTabDim = document.createElement("INPUT");
            inputNovaTabDim.setAttribute("type","text");
            inputNovaTabDim.setAttribute("name", "DIMENSAO_DO_PRODUTO");
            inputNovaTabDim.setAttribute("id","DIMENSAO_DO_PRODUTO_"+idBotao+"_"+contaColunas);
            inputNovaTabDim.setAttribute("class", "DIMENSAO_DO_PRODUTO");
            inputNovaTabDim.setAttribute("placeholder","DIMENSOES_DO_MODELO: "+idBotao+" / Linha: "+contaColunas);

            //cria o input de TENSAO 
            inputNovaTabTensao = document.createElement("INPUT");
            inputNovaTabTensao.setAttribute("type","text");
            inputNovaTabTensao.setAttribute("name", "TENSAO_DO_PRODUTO");
            inputNovaTabTensao.setAttribute("id","TENSAO_DO_PRODUTO_"+idBotao+"_"+contaColunas);
            inputNovaTabTensao.setAttribute("class", "TENSAO_DO_PRODUTO");
            inputNovaTabTensao.setAttribute("placeholder","TENSAO_DO_MODELO "+idBotao+" / Linha: "+contaColunas);
            
            //cria o input de POTENCIA 
            inputNovaTabPotencia = document.createElement("INPUT");
            inputNovaTabPotencia.setAttribute("type","text");
            inputNovaTabPotencia.setAttribute("name", "POTENCIA_DO_PRODUTO");
            inputNovaTabPotencia.setAttribute("id","POTENCIA_DO_PRODUTO_"+idBotao+"_"+contaColunas);
            inputNovaTabPotencia.setAttribute("class", "POTENCIA_DO_PRODUTO");
            inputNovaTabPotencia.setAttribute("placeholder","POTENCIA_DO_PRODUTO: "+idBotao+" / Linha: "+contaColunas);
            
            //cria o input de TEMPERATURA 
            inputNovaTabTemp = document.createElement("INPUT");
            inputNovaTabTemp.setAttribute("type","text");
            inputNovaTabTemp.setAttribute("name", "TEMPERATURA_DO_PRODUTO");
            inputNovaTabTemp.setAttribute("id","TEMPERATURA_DO_PRODUTO_"+idBotao+"_"+contaColunas);
            inputNovaTabTemp.setAttribute("class", "TEMPERATURA_DO_PRODUTO");
            inputNovaTabTemp.setAttribute("placeholder","TEMPERATURA_DO_PRODUTO: "+idBotao+" / Linha: "+contaColunas);
            
            //cria o input de IRC 
            inputNovaTabIrc = document.createElement("INPUT");
            inputNovaTabIrc.setAttribute("type","text");
            inputNovaTabIrc.setAttribute("name", "IRC_DO_PRODUTO");
            inputNovaTabIrc.setAttribute("id","IRC_DO_PRODUTO_"+idBotao+"_"+contaColunas);
            inputNovaTabIrc.setAttribute("class", "IRC_DO_PRODUTO");
            inputNovaTabIrc.setAttribute("placeholder","IRC_DO_PRODUTO: "+idBotao+" / Linha: "+contaColunas);
            
            //cria o input de aNGULO 
            inputNovaTabAngulo = document.createElement("INPUT");
            inputNovaTabAngulo.setAttribute("type","text");
            inputNovaTabAngulo.setAttribute("name", "ANGULO_DO_PRODUTO");
            inputNovaTabAngulo.setAttribute("id","ANGULO_DO_PRODUTO_"+idBotao+"_"+contaColunas);
            inputNovaTabAngulo.setAttribute("class", "ANGULO_DO_PRODUTO");
            inputNovaTabAngulo.setAttribute("placeholder","ANGULO_DO_PRODUTO: "+idBotao+" / Linha: "+contaColunas);

            //Cria o botao de gerar uma nova coluna
            botaoAddColuna = document.createElement("INPUT");
            botaoAddColuna.setAttribute("type","button");
            botaoAddColuna.setAttribute("onclick","gerarColuna(this)");
            botaoAddColuna.setAttribute("id","gerarColunas_"+idBotao+"_"+contaColunas);
            botaoAddColuna.setAttribute("class","gerarColunas button");
            botaoAddColuna.setAttribute("value","Gerar nova coluna");
            botaoAddColuna.setAttribute("data-modelo",idBotao);
            
            //Cria o botao de remover coluna
            botaoRemoveColuna = document.createElement("INPUT");
            botaoRemoveColuna.setAttribute("type","button");
            botaoRemoveColuna.setAttribute("onclick","removerColuna(this)");
            botaoRemoveColuna.setAttribute("id","removerColunas_"+idBotao+"_"+contaColunas);
            botaoRemoveColuna.setAttribute("class","removerColunas button ");
            botaoRemoveColuna.setAttribute("value","Remover coluna atual");
            botaoRemoveColuna.setAttribute("data-coluna","tabela_Modelo"+idBotao+"_Coluna"+contaColunas );
            botaoRemoveColuna.setAttribute("data-modelo",idBotao);
            
            novaColuna.appendChild(tituloColuna);
            novaColuna.appendChild(inputNovaTabCod);

            novaColuna.appendChild(inputNovaTabDim);
            novaColuna.appendChild(inputNovaTabTensao);
            novaColuna.appendChild(inputNovaTabPotencia);
            novaColuna.appendChild(inputNovaTabTemp);
            novaColuna.appendChild(inputNovaTabIrc);
            novaColuna.appendChild(inputNovaTabAngulo);
            novaColuna.appendChild(inputBr19);
            novaColuna.appendChild(botaoAddColuna);
            novaColuna.appendChild(botaoRemoveColuna);
            novaColuna.appendChild(inputBr20);

            spanModeloAtual.appendChild(novaColuna);
            
            //Chama a função valores para que atribua o numero correto ao modelo - após rodar a função para que fique correto no fim
            valores();
        }

        //função para remover uma coluna 
        function removerColuna(obj){
            //Chama a função valores para que atribua o numero correto ao modelo - após remover o elemento corrigindo os demais  
            
            //variaveis 
            var idBotao;
            var colunaDeletada;
            var removedChild;
            var idModelo;
            var idNumModelo;
            var divModelo;
            var contaColunasRemove;
            var alteraDiv;
            var alteraBotaoDelet;

            //Encontra e remove a coluna  
            idBotao = obj.getAttribute("data-coluna");

            if(idBotao!="tabela_Modelo0_Coluna0"){
                colunaDeletada = document.getElementById(idBotao);
                removedChild = colunaDeletada.remove(colunaDeletada);
                valores();
            }
        }

        //função para importar arquivo texto 
        function importarPagina() {
            var nomeImp = document.getElementById("NOME_PRODUTO").innerText;
            document.getElementById("NOME_DO_PRODUTO").value = nomeImp; 
            
            var LinhaImp = document.getElementById("LINHA_PRODUTO").innerText;
            document.getElementById("LINHA_DO_PRODUTO").value = LinhaImp; 
            
            var descImp = document.getElementById("DESCRICAO_PRODUTO").innerText;
            document.getElementById("DESCRICAO_DO_PRODUTO").value = descImp;
                
            var infoImp = document.getElementById("infoP").innerText;
            document.getElementById("INFO_DO_PRODUTO").value = infoImp;
            
            var fichaImp = document.getElementById("BotaoFicha").getAttribute("data");
            document.getElementById("FICHA_TECNICA").value = fichaImp;
            
            //contaModelos recebe o primeiro "modelos" que é criado a importar o arquivo
            var contaModelos = document.getElementById("modelos");
            
            //conta dentro do conta modelos quantas tags A existem - ou seja quantos modelos foram criados 
            var contaModelosAux = contaModelos.getElementsByTagName("a").length;

            for(var i=0; i<contaModelosAux; i++){

                var mod = contaModelos.getElementsByTagName("a")[i].innerText;
                var ModTratado = mod.replace("|","");
                
                document.getElementById("MODELO_DO_PRODUTO_"+i).value = ModTratado;
                document.getElementById("POTENCIA_DO_PRODUTO_"+i).value = contaModelos.getElementsByTagName("a")[i].getAttribute("data-pot");
                document.getElementById("TENSAO_DO_PRODUTO_"+i).value = contaModelos.getElementsByTagName("a")[i].getAttribute("data-tensao");
                document.getElementById("TEMP_DO_PRODUTO_"+i).value = contaModelos.getElementsByTagName("a")[i].getAttribute("data-temp");
                document.getElementById("BASE_DO_PRODUTO_"+i).value = contaModelos.getElementsByTagName("a")[i].getAttribute("data-base");
                document.getElementById("IP_DO_PRODUTO_"+i).value = contaModelos.getElementsByTagName("a")[i].getAttribute("data-ip");
                
                gerarModelos();
                
                //Colunas Tecnicas 
                    //conta o numero de tabelas que este cadastro tem 
                    var contaModelosTab = document.getElementById("tabelaP_Modelo_"+i);
                        
                        //Seleciona a primeira linha da tabela                     
                        var contaModelosTabAux = contaModelosTab.getElementsByTagName("tr")[0];
                        
                        //Conta quantas colunas essa linha tem 
                        var contaColunasTab = contaModelosTabAux.getElementsByTagName("td").length;

                        //Cria os campos de novas colunas 
                        for(var p=2;p<contaColunasTab;p++){
                            var aq = document.createElement("p")
                            aq.setAttribute("data-modelo",i); 
                            gerarColuna(aq);
                        }

                        //executa o preenchimento de acordo com o numero de colunas
                        for(var j=0; j<contaColunasTab; j++){        
                            
                            //Valida se existe codigo na tabela importada
                            var validaCod = document.getElementById("TabelaLinhaCodigo"+i+""+j);
                            
                            if(validaCod != undefined){
                                var cod = document.getElementById("TabelaLinhaCodigo"+i+""+j).innerText;
                                document.getElementById("CODIGO_DO_PRODUTO_"+i+"_"+j).value = cod;
                            }

                            //Valida se existe dimensão na tabela importada
                            var validaDim = document.getElementById("TabelaDimensaoCodigo"+i+""+j);
                            if(validaDim != null){
                                var dim = document.getElementById("TabelaDimensaoCodigo"+i+""+j).innerText;
                                document.getElementById("DIMENSAO_DO_PRODUTO_"+i+"_"+j).value = dim;
                            }

                            //Valida se existe tensão na tabela importada
                            var validaTen = document.getElementById("TabelaLinhaTensao"+i+""+j);
                            if(validaTen != null){
                                var ten = document.getElementById("TabelaLinhaTensao"+i+""+j).innerText;
                                document.getElementById("TENSAO_DO_PRODUTO_"+i+"_"+j).value = ten;
                            }

                            //Valida se existe potencia na tabela importada
                            var validaPot = document.getElementById("TabelaLinhaPotencia"+i+"_"+j);
                            if(validaPot != null){
                                var pot = document.getElementById("TabelaLinhaPotencia"+i+"_"+j).innerText;
                                document.getElementById("POTENCIA_DO_PRODUTO_"+i+"_"+j).value = pot;
                            }
                        
                            //Valida se existe potencia na tabela importada
                            var validaTem = document.getElementById("TabelaLinhaTemperatura"+i+"_"+j);
                            if(validaTem != null){
                                var tem = document.getElementById("TabelaLinhaTemperatura"+i+"_"+j).innerText;
                                document.getElementById("TEMPERATURA_DO_PRODUTO_"+i+"_"+j).value = tem;
                            }
                        
                        //Valida se existe potencia na tabela importada
                            var validaIrc = document.getElementById("TabelaLinhaIRC"+i+"_"+j);
                            if(validaIrc != null){
                                var irc = document.getElementById("TabelaLinhaIRC"+i+"_"+j).innerText;
                                document.getElementById("IRC_DO_PRODUTO_"+i+"_"+j).value = irc;
                            }
                            
                        //Valida se existe potencia na tabela importada
                            var validaAng = document.getElementById("TabelaLinhaAngulo"+i+"_"+j);
                            if(validaAng != null){
                                var ang = document.getElementById("TabelaLinhaAngulo"+i+"_"+j).innerText;
                                document.getElementById("ANGULO_DO_PRODUTO_"+i+"_"+j).value = ang;
                            }                       
                        }//Fim do for J      
                //FIM DO COLUNAS TECNICAS
            }//FIM DO FOR I 

            //Inicio do importar imagens 
                var imgContador = document.getElementById("ListaMiniaturas").getElementsByTagName("a").length
                var img;
                var imgAux;
                var imgAux2;
                var imgAux3;
                
                for(var y=0;y<imgContador;y++){
                    //pego o bloco inteiro
                        img = document.getElementById("ListaMiniaturas").getElementsByTagName("a")[y];
                    
                    //pego o elemento da imagem     
                        imgAux = img.getElementsByTagName("img")[0];
                    
                    //gero o numero de imagens necessarias sempre fica uma a mais no modelo dont pergunt                 
                        gerarImagem(imgAux)
                        
                    //pego o atributo para saber exatamente onde enfiar os dados importados 
                        imgAux2 = imgAux.getAttribute("data-tab");
                    
                    //pego o valor que irei enfiar no campo 
                        imgAux3 = imgAux.getAttribute("src"); 

                    //começa a brincadeira de mal gosto - se existir o campo de destino preenche com o valor     
                    if(document.getElementById("URL_IMAGEM_"+imgAux2+"_"+y)!=null){
                        document.getElementById("URL_IMAGEM_"+imgAux2+"_"+y).value = imgAux3; 
                        
                    }else{
                        //se não existir ele vai  iniciar um novo for
                        var p1;
                        for(var p=1;p<imgContador;p++){
                            p1 = 0;
                            //se existir o campo ele insere o valor IF_2
                            if(document.getElementById("URL_IMAGEM_"+imgAux2+"_"+p)!=null){
                                document.getElementById("URL_IMAGEM_"+imgAux2+"_"+p1).value = imgAux3; 
                                p1++;
                            }//FIM DO IF_2 
                        }//FIM DO FOR 2 
                    }//FIM DO IF ELSE
                }//FIM DO FOR imgContador 
            //FIM DO IMPORTAR IMAGENS 
                    
                
            //Limpa a div que foi preenchida com os dados do arquivo. 
            var apagaSaM = document.getElementById("output");
            apagaSaM.remove(apagaSaM);

            //Limpa o ultimo modelo que fica em branco após carregar o arquivo - não me pergunte mas eu preciso disso 
            var corrige = document.createElement("p")
                corrige.setAttribute("data-modelo",contaModelosAux); 
                removerModelos(corrige); 
        
        }//FIM DA FUNCAO IMPORTAR IMAGENS 

        //função que envia todos os dados preenchidos para pré-visualização
        function carregarPreview(){
            //nome
            var NOME_DO_PRODUTO = document.getElementById("NOME_DO_PRODUTO");
            var nome = NOME_DO_PRODUTO.value;
            document.getElementById("NOME_PRODUTO").innerText=nome; 
            document.getElementById("TituloProdPrincipal").innerText=nome;

            //linha do produto
            var LINHA_DO_PRODUTO= document.getElementById("LINHA_DO_PRODUTO");
            var linha = LINHA_DO_PRODUTO.value;

            document.getElementById("LINHA_PRODUTO").innerText=linha; 

            //caminho da Linha de produto
            var caminho;
            var CorDeEtiqueta;
            var CorDeMiniatura;
            switch(linha){
                case 'Linha Line':
                caminho='http://galaxyled.com.br/NewSite22/?page_id=1243';
                CorDeEtiqueta = 'ColapseLine';
                CorDeMiniatura = 'line';
                break;
                case 'Linha Concept':
                caminho='http://galaxyled.com.br/NewSite22/?page_id=1875';
                CorDeEtiqueta = 'ColapseConcept';
                CorDeMiniatura = 'concept';
                break;
                case 'Linha Decor':
                caminho='http://galaxyled.com.br/NewSite22/?page_id=1920';
                CorDeEtiqueta = 'ColapseDecor';
                CorDeMiniatura = 'decor';
                break;
                case 'Linha PRO':
                caminho='http://galaxyled.com.br/NewSite22/?page_id=1890';
                CorDeEtiqueta = 'ColapsePRO';
                CorDeMiniatura = 'pro';
                break;
                case 'Linha Smart':
                caminho='http://galaxyled.com.br/NewSite22/?page_id=1902';
                CorDeEtiqueta = 'ColapseSmart';
                CorDeMiniatura = 'smart';
                break;
                case 'Linha Classic':
                caminho='http://galaxyled.com.br/NewSite22/?page_id=1896';
                CorDeEtiqueta = 'ColapseClassic';
                CorDeMiniatura = 'classic';
                break;
                default:
                alert("Linha de produtos não encontrada");
            }
            //Preenche a migalha de pao de acordo com o selecionado
            document.getElementById("BreadcrumbLinha").href=caminho; 

        //Preenche a cor no colapse de acordo com o selecionado - 3 pois temos apenas 3 collapse 
            for(var colapseCont=0;colapseCont<3;colapseCont++){
                let Cor = document.getElementsByClassName("collapsiblePRO")[colapseCont];
                var ValidaCor = Cor.classList;
                if(ValidaCor !== ''){
                    Cor.classList.remove("ColapseLine","ColapseConcept","ColapseDecor","ColapsePRO","ColapseSmart","ColapseClassic");
                }
                Cor.classList.add(CorDeEtiqueta);
            }//Fim colapseCont

        //Imagem Principal
            var URL_IMAGEM0 = document.getElementById("URL_IMAGEM_0_0");
            var imagem0= URL_IMAGEM0.value;
            document.getElementById("Sob").href = imagem0;

            var ImagemPrincipal = document.getElementById("Sob");
            ImagemPrincipal.getElementsByTagName("img")[0].src = imagem0;

        //Descricao
            DESCRICAO_DO_PRODUTO= document.getElementById("DESCRICAO_DO_PRODUTO");
            descricao = DESCRICAO_DO_PRODUTO.value;
            document.getElementById("DESCRICAO_PRODUTO").innerText=descricao; 

            //conta o numero do modelos 
            var contaModelos = document.getElementsByName("modelo").length;
            
            document.getElementById("modelos").innerHTML = "";
            document.getElementById("ListaMiniaturas").innerHTML = "";
            
            //variavel para verificar se existe conteudo usado no IF dentro do FOR
            var linkProd = "";
            var linkProdMini  = "";
            var nomeProd = "";

            //criando o for para carregar pré-viewe
            for(var x=0;x<contaModelos;x++){
                
                //Criando o <A HREF> MODELO
                var inputAncora = document.createElement("A");
                inputAncora.setAttribute("href","#AncoraProduto");
                inputAncora.setAttribute("onclick","ModeloAlterar(this);");
                inputAncora.setAttribute("id","TrocarImg");
                inputAncora.setAttribute("data-troca","URL01");
                inputAncora.setAttribute("data-cor",CorDeMiniatura);

                // Declara o nome do modelo
                nomeProd = document.getElementById("MODELO_DO_PRODUTO_"+x).value;
                
                //Preenche o texto descritivo do modelo.
                var link=document.createTextNode(document.getElementById("MODELO_DO_PRODUTO_"+x).value+" | ");
                inputAncora.appendChild(link);            

                //variavel recebe a divUrl contando quantas imagens tem dentro deste modelo
                var contaImagens = document.getElementById("divUrl"+x).getElementsByClassName("URL_IMAGEM").length;
                
                for(var r=0; r<=contaImagens;r++){
                    var validaExiste =document.getElementById("URL_IMAGEM_"+x+"_"+r);
                    if(validaExiste == null){
                    } else{
                    //Verifica se a url foi definida 
                        if (document.getElementById("URL_IMAGEM_"+x+"_"+r).value != '') {
                            //define a imagem no nome do modelo
                            linkProd = document.getElementById("URL_IMAGEM_"+x+"_"+r).value;
                            //define a imagem na miniatura que fica logo abaixo da principal
                            linkProdMini = document.getElementById("URL_IMAGEM_"+x+"_0").value;
                        }else{
                            //se estiver vazio vai encaminhar o link para a imagem 0
                            linkProd = document.getElementById("URL_IMAGEM_0_0").value;
                        }//Fim do IF de URL  
                    

                    //seta o link de busca da imagem
                    inputAncora.setAttribute("data-src",linkProdMini);
    
                    var arrayPotencia  = "";
                    var arrayTemperatura  = "";
                    //usado na hora de gerar as colunas dentro das informações tecnicas
                    qtdLinhas = document.getElementsByName("coluna").length;
                    
                    var arrayPotencia= document.getElementById("POTENCIA_DO_PRODUTO_"+x).value;    
                    inputAncora.setAttribute("data-pot",arrayPotencia);    
                
                    //Preenche o data-tensao
                    var arrayTensao= document.getElementById("TENSAO_DO_PRODUTO_"+x).value;
                    inputAncora.setAttribute("data-tensao",arrayTensao); 
                
                    var arrayTemperatura= document.getElementById("TEMP_DO_PRODUTO_"+x).value;
                    inputAncora.setAttribute("data-temp",arrayTemperatura);    
                    
                    //Preenche o data-base
                    var bas= document.getElementById("BASE_DO_PRODUTO_"+x).value;
                    inputAncora.setAttribute("data-base",bas); 
                    
                    //Preenche o data-ip
                    var ip= document.getElementById("IP_DO_PRODUTO_"+x).value;
                    inputAncora.setAttribute("data-ip",ip);

                    
                    //Preenche o data-tabela
                    var tab = x;
                    inputAncora.setAttribute("data-tab",tab);
                    
                    //Adcionando os atributos na div
                    var divImgModelos = document.getElementById("modelos");
                
                    divImgModelos.appendChild(inputAncora);

                //Miniaturas
                    
                    //Criando os elementos A
                    var inputAncoraMiniatura = document.createElement("A");
                    inputAncoraMiniatura.setAttribute("onclick","ImagemAlterar(this);");
                    inputAncoraMiniatura.setAttribute("id","ProdutoMiniatura");
                    inputAncoraMiniatura.classList.add(CorDeMiniatura);
                    inputAncoraMiniatura.setAttribute("data-cor",CorDeMiniatura);

                    //Criando a miniatura de imagem 
                    var imgMiniatura = document.createElement("img");
                    imgMiniatura.setAttribute("src",linkProd);
                    imgMiniatura.setAttribute("id","TrocarImg");
                    imgMiniatura.setAttribute("title",nomeProd);
                    imgMiniatura.setAttribute("alt",nomeProd);
                    imgMiniatura.setAttribute("data-temp",arrayTemperatura);
                    imgMiniatura.setAttribute("data-pot",arrayPotencia);
                    imgMiniatura.setAttribute("data-tensao",arrayTensao);
                    imgMiniatura.setAttribute("data-base",bas);
                    imgMiniatura.setAttribute("data-ip",ip);
                    imgMiniatura.setAttribute("data-tab",tab);
                
                    //Colocando a <IMG> dentro do <A>
                    inputAncoraMiniatura.appendChild(imgMiniatura); 

                    //Chamando na tela
                    var divListaMiniaturas = document.getElementById("ListaMiniaturas");
                    //se nao tiver url nãop faz nada
                    if (document.getElementById("URL_IMAGEM_"+x+"_"+r).value != ''){
                        divListaMiniaturas.appendChild(inputAncoraMiniatura); 
                    }
                    else{
                    }
                }//Fim do IF validaExiste

            }//Fim do For R Conta Imagens 
            
            //Potencia 
                var TIT_POTENCIA_DO_PRODUTO = document.getElementById("TIT_POTENCIA_DO_PRODUTO_0").value;
                document.getElementsByName("potPagina")[0].innerText=TIT_POTENCIA_DO_PRODUTO; 

                var POTENCIA_DO_PRODUTO = document.getElementById("modelos");
                var potenciaAux  = POTENCIA_DO_PRODUTO.getElementsByTagName("a")[0].getAttribute("data-pot");
                document.getElementById("POTENCIA_PRODUTO").innerText=potenciaAux; 

                //Tensao de produto
                var TIT_TENSAO_DO_PRODUTO = document.getElementById("TIT_TENSAO_DO_PRODUTO_0").value;
                document.getElementsByName("tenPagina")[0].innerText=TIT_TENSAO_DO_PRODUTO; 
                
                var TENSAO_DO_PRODUTO = document.getElementById("TENSAO_DO_PRODUTO_0");
                var tensaoValue = TENSAO_DO_PRODUTO.value;
                document.getElementById("ARRAY_TENSAO_PRODUTO").innerText=tensaoValue;

                //Temperatura
                var TIT_TEMPERATURA_PRODUTO = document.getElementById("TIT_TEMP_DO_PRODUTO_0").value;
                document.getElementsByName("tempPagina")[0].innerText=TIT_TEMPERATURA_PRODUTO; 
                
                var TEMPERATURA_DO_PRODUTO = document.getElementById("modelos");
                var temperaturaAux  = TEMPERATURA_DO_PRODUTO.getElementsByTagName("a")[0].getAttribute("data-temp");
                document.getElementById("TEMPERATURA_PRODUTO").innerText=temperaturaAux; 

                //Base de produto
                var TIT_BASE_DO_PRODUTO = document.getElementById("TIT_BASE_DO_PRODUTO_0").value;
                document.getElementsByName("basPagina")[0].innerText=TIT_BASE_DO_PRODUTO; 
                
                var BASE_DO_PRODUTO = document.getElementById("BASE_DO_PRODUTO_0");
                var base = BASE_DO_PRODUTO.value;
                document.getElementById("BASE_PRODUTO").innerText=base;

                //Indice de protecao de produto
                var TIT_IP_DO_PRODUTO = document.getElementById("TIT_IP_DO_PRODUTO_0").value;
                document.getElementsByName("ipPagina")[0].innerText=TIT_IP_DO_PRODUTO; 
                
                var IP_DO_PRODUTO = document.getElementById("IP_DO_PRODUTO_0");
                var ipvalue = IP_DO_PRODUTO.value;
                document.getElementById("IP_PRODUTO").innerText=ipvalue;

        }//FIM DO FOR X - conta Modelos  
            //colapse Informações adicionais 
                //Ficha Tecnica
                var validaVlFicha = document.getElementById("VL_FICHA_TECNICA").value;
                if(validaVlFicha=="S"){
                    FICHA_TECNICA = document.getElementById("FICHA_TECNICA");
                    ficha= FICHA_TECNICA.value;
                    document.getElementById("BotaoFicha").setAttribute("data",ficha);
                    document.getElementById("colapseFicha").setAttribute("style","");
                }else{
                    document.getElementById("colapseFicha").setAttribute("style","display:none");
                }

                //Info do produto
                var validaVlInfo = document.getElementById("VL_INFO_DO_PRODUTO").value;
                if(validaVlInfo=="S"){
                    var INFO_DO_PRODUTO = document.getElementById("INFO_DO_PRODUTO");
                    var info = INFO_DO_PRODUTO.value;
                    document.getElementById("infoP").innerHTML=info;
                    document.getElementById("colapseInfoP").setAttribute("style","");
                }else{
                    document.getElementById("colapseInfoP").setAttribute("style","display:none");   
                }

            //Tabela  
                var validaVlTabela = document.getElementById("VL_TABELA").value;
                if(validaVlTabela=="S"){
                    document.getElementById("colapseTabela").setAttribute("style","");
                }else{
                    document.getElementById("colapseTabela").setAttribute("style","display:none");
                }
            //pego o elemento onde vou adicionar linhas e limpo caso tenha valores
                document.getElementById("divTabela").innerHTML="";   
                var tabela_do_produto;

                //cria um for para cada modelo //cria um for para cada linha da tabela     
                for(var tabMod = "0"; tabMod<=modelosTotais; tabMod++){
                    //cria a tabela 
                    tabela_do_produto = document.createElement("table");
                    tabela_do_produto.setAttribute("id","tabelaP_Modelo_"+tabMod);
                    tabela_do_produto.classList.add("removeTabela");
                    
                    if(tabela_do_produto.id == "tabelaP_Modelo_0"){
                        tabela_do_produto.classList.add("ativaTabela");
                    }       

                //Cria os cabecalhos e colunas
                    //Codigo 
                    var linha_Codigo_Cabecalho = document.createElement("tr")
                    //apenda na tabela do modelo atual 
                    tabela_do_produto.appendChild(linha_Codigo_Cabecalho);            
                    var codigo_Cabecalho = document.createElement("td");
                    codigo_Cabecalho.setAttribute("id","CabecalhoCodigo");
                    //define o titulo na tabela 
                    codigo_Cabecalho.innerHTML = document.getElementById("TIT_TAB_CODIGO_DO_PRODUTO").value;
                    //apenda a coluna no cabecalho se o valor do botão for sim 
                    var validaVlCodigo = document.getElementById("VL_CODIGO_DO_PRODUTO_0_0").value;
                        if(validaVlCodigo == "S"){
                            linha_Codigo_Cabecalho.appendChild(codigo_Cabecalho);
                        }
                    //Dimensao
                    var linha_Dimensao_Cabecalho = document.createElement("tr");
                    tabela_do_produto.appendChild(linha_Dimensao_Cabecalho);    
                    var dimensao_Cabecalho = document.createElement("td");
                    dimensao_Cabecalho.setAttribute("id","CabecalhoDimensao");
                    dimensao_Cabecalho.innerHTML = document.getElementById("TIT_TAB_DIMENSAO_DO_PRODUTO").value;;
                    //
                    var validaVlDimensao = document.getElementById("VL_DIMENSAO_DO_PRODUTO_0_0").value;
                        if(validaVlDimensao == "S"){
                            linha_Dimensao_Cabecalho.appendChild(dimensao_Cabecalho);
                        }
                                    
                    var linha_Tensao_Cabecalho = document.createElement("tr")
                    tabela_do_produto.appendChild(linha_Tensao_Cabecalho);  
                    var tensao_Cabecalho = document.createElement("td");
                    tensao_Cabecalho.setAttribute("id","CabecalhoTensao");
                    tensao_Cabecalho.innerHTML = document.getElementById("TIT_TAB_TENSAO_DO_PRODUTO").value;; 
                    //
                    var validaVlTensao =document.getElementById("VL_TENSAO_DO_PRODUTO_0_0").value;
                        if( validaVlTensao == "S"){
                            linha_Tensao_Cabecalho.appendChild(tensao_Cabecalho);          
                        }
                    
                    var linha_Potencia_Cabecalho = document.createElement("tr");
                    tabela_do_produto.appendChild(linha_Potencia_Cabecalho);   
                    var potencia_Cabecalho = document.createElement("td");
                    potencia_Cabecalho.setAttribute("id","CabecalhoPotencia");
                    potencia_Cabecalho.innerHTML = document.getElementById("TIT_TAB_POTENCIA_DO_PRODUTO").value;     
                    //
                    var validaVlPotencia = document.getElementById("VL_POTENCIA_DO_PRODUTO_0_0").value;
                        if(validaVlPotencia == "S"){
                            linha_Potencia_Cabecalho.appendChild(potencia_Cabecalho);       
                        }

                    var linha_Temperatura_Cabecalho = document.createElement("tr")
                    tabela_do_produto.appendChild(linha_Temperatura_Cabecalho);            
                    var temperatura_Cabecalho = document.createElement("td"); 
                    temperatura_Cabecalho.setAttribute("id","CabecalhoTemperatura");
                    temperatura_Cabecalho.innerHTML = document.getElementById("TIT_TAB_TEMP_DO_PRODUTO").value 
                    //
                    var validaVlTemperatura = document.getElementById("VL_TEMPERATURA_DO_PRODUTO_0_0").value;
                        if(validaVlTemperatura == "S"){
                            linha_Temperatura_Cabecalho.appendChild(temperatura_Cabecalho);                                   
                        }
                    
                    var linha_IRC_Cabecalho = document.createElement("tr")
                    tabela_do_produto.appendChild(linha_IRC_Cabecalho);            
                    var irc_Cabecalho = document.createElement("td");
                    irc_Cabecalho.setAttribute("id","CabecalhoIRC");
                    irc_Cabecalho.setAttribute("title","Indice de Reprodução de Cor");
                    irc_Cabecalho.innerHTML = document.getElementById("TIT_TAB_IRC_DO_PRODUTO").value; 
                    //
                    var validaVlIrc = document.getElementById("VL_IRC_DO_PRODUTO_0_0").value;
                        if(validaVlIrc == "S"){
                            linha_IRC_Cabecalho.appendChild(irc_Cabecalho);         
                        }

                    var linha_Angulo_Cabecalho = document.createElement("tr")
                    tabela_do_produto.appendChild(linha_Angulo_Cabecalho);            
                    var angulo_Cabecalho = document.createElement("td");
                    angulo_Cabecalho.setAttribute("id","CabecalhoIRC");
                    angulo_Cabecalho.innerHTML = document.getElementById("TIT_TAB_ANGULO_DO_PRODUTO").value;   
                    //
                    var validaVlAngulo = document.getElementById("VL_ANGULO_DO_PRODUTO_0_0").value;
                        if(validaVlAngulo == "S"){
                            linha_Angulo_Cabecalho.appendChild(angulo_Cabecalho);  
                        }

                        //Cria os elementos da tabela 
                        for(var tabLinha=0;tabLinha<=qtdLinhas; tabLinha++){
                            //VALIDA A SE A LINHA EXISTE E SE EXISTIR ELA PREENCHE.
                            var validaCodigoTabela = document.getElementById("CODIGO_DO_PRODUTO_"+tabMod+"_"+tabLinha);
                            if(validaCodigoTabela !=null){ 
                                if( validaVlCodigo =="S"){
                                    var linha_Codigo = document.createElement("td");
                                    linha_Codigo.setAttribute("id","TabelaLinhaCodigo"+tabMod+tabLinha);
                                    linha_Codigo_Cabecalho.appendChild(linha_Codigo);   
                                    //Busca e preenche o elemento criado
                                    var INPUT_COD = document.getElementById("CODIGO_DO_PRODUTO_"+tabMod+"_"+tabLinha);
                                    var inputCod = INPUT_COD.value;
                                    linha_Codigo.innerHTML = inputCod;
                                }
                            }
                            var validaDimensaoTabela = document.getElementById("DIMENSAO_DO_PRODUTO_"+tabMod+"_"+tabLinha);
                            if(validaDimensaoTabela !=null){
                                if(validaVlDimensao =="S"){
                                    //Cria o elemento Dimensao
                                    var linha_Dimensao = document.createElement("td");
                                    linha_Dimensao.setAttribute("id","TabelaDimensaoCodigo"+tabMod+tabLinha);
                                    linha_Dimensao_Cabecalho.appendChild(linha_Dimensao);
                                    //Busca e preenche o elemento criado
                                    var INPUT_DIN = document.getElementById("DIMENSAO_DO_PRODUTO_"+tabMod+"_"+tabLinha);
                                    var inputDimensao = INPUT_DIN.value;
                                    linha_Dimensao.innerHTML = inputDimensao;
                                }
                            }
                            var validaTensaoTabela = document.getElementById("TENSAO_DO_PRODUTO_"+tabMod+"_"+tabLinha);
                            if(validaTensaoTabela !=null){
                                if(validaVlTensao == "S"){
                                    //Cria o elemento Tensao 
                                    var linha_Tensao = document.createElement("td");
                                    linha_Tensao.setAttribute("id","TabelaLinhaTensao"+tabMod+tabLinha);
                                    linha_Tensao_Cabecalho.appendChild(linha_Tensao);  
                                    //Busca e preenche o elemento criado
                                    var INPUT_TEN = document.getElementById("TENSAO_DO_PRODUTO_"+tabMod+"_"+tabLinha);
                                    var inputTen = INPUT_TEN.value;
                                    linha_Tensao.innerHTML = inputTen;
                                }
                            }
                            var validaPotenciaTabela = document.getElementById("POTENCIA_DO_PRODUTO_"+tabMod+"_"+tabLinha);
                            if(validaPotenciaTabela !=null){
                                if(validaVlPotencia == "S"){
                                    //Cria o elemento Potencia 
                                    var linha_Potencia = document.createElement("td");
                                    linha_Potencia.setAttribute("id","TabelaLinhaPotencia"+tabMod+"_"+tabLinha);
                                    linha_Potencia_Cabecalho.appendChild(linha_Potencia);  
                                    //Busca e preenche o elemento criado
                                    var INPUT_POT = document.getElementById("POTENCIA_DO_PRODUTO_"+tabMod+"_"+tabLinha);
                                    var inputPotencia = INPUT_POT.value;
                                    linha_Potencia.innerHTML = inputPotencia;
                                }
                            }
                            var validaTemperaturaTabela = document.getElementById("TEMPERATURA_DO_PRODUTO_"+tabMod+"_"+tabLinha);
                            if(validaTemperaturaTabela !=null){
                                if(validaVlTemperatura == "S"){
                                    //Cria o elemento Temperatura
                                    var linha_Temperatura = document.createElement("td");
                                    linha_Temperatura.setAttribute("id","TabelaLinhaTemperatura"+tabMod+"_"+tabLinha);
                                    linha_Temperatura_Cabecalho.appendChild(linha_Temperatura);
                                    //Busca e preenche o elemento criado
                                    var INPUT_TEMP = document.getElementById("TEMPERATURA_DO_PRODUTO_"+tabMod+"_"+tabLinha);
                                    var inputTemperatura = INPUT_TEMP.value;
                                    linha_Temperatura.innerHTML = inputTemperatura; 
                                }
                            }
                            var validaIrcTabela = document.getElementById("IRC_DO_PRODUTO_"+tabMod+"_"+tabLinha);
                            if(validaIrcTabela !=null){
                                if(validaVlIrc == "S"){
                                    //Cria o elemento IRC
                                    var linha_IRC = document.createElement("td");
                                    linha_IRC.setAttribute("id","TabelaLinhaIRC"+tabMod+"_"+tabLinha);
                                    linha_IRC_Cabecalho.appendChild(linha_IRC);
                                    //Busca e preenche o elemento criado
                                    var INPUT_IRC = document.getElementById("IRC_DO_PRODUTO_"+tabMod+"_"+tabLinha);
                                    var inputIRC = INPUT_IRC.value;
                                    linha_IRC.innerHTML = inputIRC;  
                                }
                            }
                            var validaAnguloTabela = document.getElementById("ANGULO_DO_PRODUTO_"+tabMod+"_"+tabLinha);
                            if(validaAnguloTabela !=null){
                                if(validaVlAngulo == "S"){
                                    //Cria o elemento Angulo
                                    var linha_Angulo = document.createElement("td");
                                    linha_Angulo.setAttribute("id","TabelaLinhaAngulo"+tabMod+"_"+tabLinha);
                                    linha_Angulo_Cabecalho.appendChild(linha_Angulo);  
                                    //Busca e preenche o elemento criado
                                    var INPUT_ANGULO = document.getElementById("ANGULO_DO_PRODUTO_"+tabMod+"_"+tabLinha);
                                    var inputAngulo = INPUT_ANGULO.value;
                                    linha_Angulo.innerHTML = inputAngulo;   
                                }
                            }

                        }//fim do for tablinhas qtdlinhas

                    var divTabela="";
                    divTabela = document.getElementById("divTabela");
                    divTabela.appendChild(tabela_do_produto);

                }//FIM do Fim For TabMod 

        }


        //função para gerar codigo a ser exportado
        function gerarCodigo(){
            //Busca o elemento contendo o codigo fonte que será o post 
            var CodigoFonte = document.getElementById("codigoFonte");
            var CodigoEscrito = CodigoFonte.innerHTML;
            var CodigoSelecionado = document.getElementById("textArea").innerText;
            document.getElementById("textArea").innerHTML=CodigoEscrito;

            //Valida se o codigo foi gerado para ser copiado / Copia o elemento "Crtl C"
            if(CodigoFonte!=""){
                //Cria um TextArea para permitir a copia -- gambiarra
                var content = document.getElementById('textArea');
                //seleciona os dados da variavel
                content.select();
                //executa a copia para a area de transferencia 
                document.execCommand('copy');

                alert("Copiado com sucesso!");
                CodigoEscrito = ""
                
            }else{
                alert("Não foi copiado");
            }
        }

    </script>

</head>
<body>
<!--Formulario de cadastro-->
<form name="Formulario" id="Formulario">
    <h1>Cadastro de produtos</h1>
    <label for="nome">Nome </label><input type="text" id="NOME_DO_PRODUTO" name="NOME_DO_PRODUTO" placeholder="NOME DO PRODUTO"/> 
    <br>
    <label> Linha do Produto </label>  
    <select id='LINHA_DO_PRODUTO'>
        <option value="Linha Line">Line</option>
        <option value="Linha Concept">Concept</option>
        <option value="Linha Smart">Smart</option>
        <option value="Linha Decor">Decor</option>
        <option value="Linha PRO">PRO</option>
        <option value="Linha Classic">Classic</option>
    </select>
    </br>
    <label for="nome">Descrição do Produto</label><input type="text" id="DESCRICAO_DO_PRODUTO" name="DESCRICAO_DO_PRODUTO" placeholder="DESCRICAO DO PRODUTO"/> 
    <br>
    <div id='todosModelos' class='ModelP'> 
        <br>
        <div id='modelo_0' name='modelo' class='modelo'>
            <H3>Modelo Base</h3>
            <div class='modelo-titulo'>
                <div> 
                    <H3>Cabeçalho do produto </h3>
                    <input type="text" id="MODELO_DO_PRODUTO_0" name="MODELO_DO_PRODUTO"           placeholder="MODELO_DO_PRODUTO"/> 
                    <br>
                    <div id="divUrl0" name='divUrl'>
                    <input type="text" id="URL_IMAGEM_0_0"      name="URL_IMAGEM" class="URL_IMAGEM"                 placeholder="IMAGEM_DO_PRODUTO 0"/>
                    </div>
                    
                    <input type='button' class="button" onclick="gerarImagem(this);"  id="addImagen" name="addImagen" value="Nova imagem" data-modelo='0'><br> 
                </div>
                <div id="divCorpo0">
                    <label class="vlLabel">
                        <input type="text" id="TIT_POTENCIA_DO_PRODUTO_0"   name="TIT_POTENCIA_DO_PRODUTO"    placeholder="TIT_POTENCIA_DO_PRODUTO" value ="Potência: " class="Tit"/> 
                        <input type="text" id="POTENCIA_DO_PRODUTO_0"   name="EXIBE_POTENCIA_DO_PRODUTO"    placeholder="POTENCIA_DO_PRODUTO"/> 
                    </label>
                    <br>
                    <label class="vlLabel">
                        <input type="text" id="TIT_TENSAO_DO_PRODUTO_0"     name="TIT_TENSAO_DO_PRODUTO"      placeholder="TIT_TENSAO_DO_PRODUTO" value ="Tensão: " class="Tit"/> 
                        <input type="text" id="TENSAO_DO_PRODUTO_0"     name="EXIBE_TENSAO_DO_PRODUTO"      placeholder="TENSAO_DO_PRODUTO"/> 
                    </label>
                    <br>
                    <label class="vlLabel">
                        <input type="text" id="TIT_TEMP_DO_PRODUTO_0"       name="TIT_TEMP_DO_PRODUTO"        placeholder="TIT_TEMP_DO_PRODUTO" value ="Temperatura de cor: "class="Tit"/>
                        <input type="text" id="TEMP_DO_PRODUTO_0"       name="TEMP_DO_PRODUTO"        placeholder="TEMP_DO_PRODUTO"/>
                    </label>
                    <br>
                    <label class="vlLabel">
                        <input type="text" id="TIT_BASE_DO_PRODUTO_0"       name="TIT_BASE_DO_PRODUTO"        placeholder="TIT_BASE_DO_PRODUTO" value ="Base do produto: " class="Tit"/>
                        <input type="text" id="BASE_DO_PRODUTO_0"       name="BASE_DO_PRODUTO"        placeholder="BASE_DO_PRODUTO"/> 
                    </label>
                    <br>
                    <label class="vlLabel">
                        <input type="text" id="TIT_IP_DO_PRODUTO_0"         name="TIT_IP_DO_PRODUTO"          placeholder="TIT_IP_DO_PRODUTO" value ="Indice de proteção: " class="Tit"/> 
                        <input type="text" id="IP_DO_PRODUTO_0"         name="IP_DO_PRODUTO"          placeholder="IP_DO_PRODUTO"/> 
                    </label>
                    <br>
                </div>
            </div>
            <br>
            <div id="tabela_Modelo0_Coluna0" name="coluna" class='Coluna'>
                <h3>Colunas de informações técnicas</h3>
                <label class="vlLabel">
                    <select id="VL_CODIGO_DO_PRODUTO_0_0" class="vlTabela">
                        <option value="S">S</option>
                        <option value="N">N</option>
                    </select>
                    <input type="text" id="TIT_TAB_CODIGO_DO_PRODUTO"   name="TIT_TAB_CODIGO_DO_PRODUTO"    placeholder="TIT_TAB_CODIGO_DO_PRODUTO" value ="Código " class="Tit"/> 
                    <input type="text" id="CODIGO_DO_PRODUTO_0_0"      class="CODIGO_DO_PRODUTO"        name="CODIGO_DO_PRODUTO"     placeholder="CODIGO_DO_PRODUTO 0 / Linha: 0"/>  
                </label>
                <br>
                <label class="vlLabel">
                    <select id="VL_DIMENSAO_DO_PRODUTO_0_0" class="vlTabela">
                        <option value="S">S</option>
                        <option value="N">N</option>
                    </select>
                    <input type="text" id="TIT_TAB_DIMENSAO_DO_PRODUTO"   name="TIT_TAB_DIMENSAO_DO_PRODUTO"    placeholder="TIT_TAB_DIMENSAO_DO_PRODUTO" value ="Dimensões Produto(øAxB)" class="Tit"/> 
                    <input type="text" id="DIMENSAO_DO_PRODUTO_0_0"    class="DIMENSAO_DO_PRODUTO"      name="DIMENSAO_DO_PRODUTO"   placeholder="DIMENSAO_DO_PRODUTO 0 / Linha: 0"/>  
                </label>
                <br>
                <label class="vlLabel">
                    <select id="VL_TENSAO_DO_PRODUTO_0_0" class="vlTabela">
                        <option value="S">S</option>
                        <option value="N">N</option>
                    </select>
                    <input type="text" id="TIT_TAB_TENSAO_DO_PRODUTO"   name="TIT_TAB_TENSAO_DO_PRODUTO"    placeholder="TIT_TAB_TENSAO_DO_PRODUTO" value ="Tensão (V) " class="Tit"/> 
                    <input type="text" id="TENSAO_DO_PRODUTO_0_0"      class="TENSAO_DO_PRODUTO"        name="TENSAO_DO_PRODUTO"     placeholder="TENSAO_DO_PRODUTO 0 / Linha: 0"/>  
                </label>
                <br>
                <label class="vlLabel">
                    <select id="VL_POTENCIA_DO_PRODUTO_0_0" class="vlTabela">
                        <option value="S">S</option>
                        <option value="N">N</option>
                    </select>
                    <input type="text" id="TIT_TAB_POTENCIA_DO_PRODUTO"   name="TIT_TAB_POTENCIA_DO_PRODUTO"    placeholder="TIT_TAB_POTENCIA_DO_PRODUTO" value ="Potência (W)" class="Tit"/> 
                    <input type="text" id="POTENCIA_DO_PRODUTO_0_0"    class="POTENCIA_DO_PRODUTO"      name="POTENCIA_DO_PRODUTO"   placeholder="POTENCIA_DO_PRODUTO 0 / Linha: 0"/> 
                </label>
                <br>
                <label class="vlLabel">
                    <select id="VL_TEMPERATURA_DO_PRODUTO_0_0" class="vlTabela">
                        <option value="S">S</option>
                        <option value="N">N</option>
                    </select>
                    <input type="text" id="TIT_TAB_TEMP_DO_PRODUTO"   name="TIT_TAB_TEMP_DO_PRODUTO"    placeholder="TIT_TAB_TEMP_DO_PRODUTO" value ="Temp. de cor(K) " class="Tit"/> 
                    <input type="text" id="TEMPERATURA_DO_PRODUTO_0_0" class="TEMPERATURA_DO_PRODUTO"   name="TEMPERATURA_DO_PRODUTO"placeholder="TEMPERATURA_DO_PRODUTO 0 / Linha: 0"/> 
                </label>
                <br>
                <label class="vlLabel">
                    <select id="VL_IRC_DO_PRODUTO_0_0" class="vlTabela">
                        <option value="S">S</option>
                        <option value="N">N</option>
                    </select>
                    <input type="text" id="TIT_TAB_IRC_DO_PRODUTO"   name="TIT_TAB_IRC_DO_PRODUTO"    placeholder="TIT_TAB_IRC_DO_PRODUTO" value ="IRC " class="Tit"/> 
                    <input type="text" id="IRC_DO_PRODUTO_0_0"         class="IRC_DO_PRODUTO"           name="IRC_DO_PRODUTO"        placeholder="IRC_DO_PRODUTO 0 / Linha: 0"/>  
                </label>
                <br>
                <label class="vlLabel">
                    <select id="VL_ANGULO_DO_PRODUTO_0_0" class="vlTabela">
                        <option value="S">S</option>
                        <option value="N">N</option>
                    </select>
                    <input type="text" id="TIT_TAB_ANGULO_DO_PRODUTO"   name="TIT_TAB_ANGULO_DO_PRODUTO"    placeholder="TIT_TAB_ANGULO_DO_PRODUTO" value ="Ângulo de abertura (°) " class="Tit"/> 
                    <input type="text" id="ANGULO_DO_PRODUTO_0_0"      class="ANGULO_DO_PRODUTO"        name="ANGULO_DO_PRODUTO"     placeholder="ANGULO_DO_PRODUTO 0 / Linha: 0"/> 
                </label>
                <br>
                <br>
                <input type='button' onclick="gerarColuna(this);"    id="gerarColunas_0_0"   class="gerarColunas button"    value="Gerar nova coluna"     data-modelo='0' title="Adicionar mais uma coluna na tabela de inforções tecnicas dentro deste modelo">
                <!--<input type='button' onclick="removerColuna(this);"  id="removerColunas_0_0" class="removerColunas"  value="Remover coluna atual"  data-coluna ='tabela_Modelo0_Coluna0' data-modelo='0' > -->
            </div>
        <!--<input type='button' onclick="removerModelos(this);"  id="removerModelo" class="removerModelo" value="Remover modelo" data-modelo='0'> -->
        </div>

    </div>
    
    <input type='button'class='button' onclick="gerarModelos();"  id="gerarModelo" value="Gerar novo Modelo"> 
    
    <br>
    <br>
    <label class="vlLabel"> 
        <select id="VL_TABELA" class="vlTabela">
            <option value="S">S</option>
            <option value="N">N</option>
        </select>
        <label for="nome" class="TitColapse">Exibe tabela</label>        
    </label>
    <br>
    <label class="vlLabel">
        <select id="VL_INFO_DO_PRODUTO" class="vlTabela">
            <option value="S">S</option>
            <option value="N">N</option>
        </select>
        <label for="nome" class="TitColapse">Informações especificas</label><textarea id="INFO_DO_PRODUTO"         name="INFO_DO_PRODUTO" /></textarea> 
    </label>
    <br>
    <label class="vlLabel"> 
        <select id="VL_FICHA_TECNICA" class="vlTabela">
            <option value="S">S</option>
            <option value="N">N</option>
        </select>
        <label for="nome" name="i" class="TitColapse">Ficha técnica</label>         <input type="text" id="FICHA_TECNICA"   name="FICHA_TECNICA" />                 
    </label>
    <br> 
    
    <input type='button' class="enviar button" onclick="carregarPreview();  "value="Carregar pré-visualização" />
    <input type='button' class="button" onclick="gerarCodigo();" value="Gerar codigo"/>
        
</form>

<!--Mostra o Codigo Gerado-->
    <div>
        <span id="Codigo_Escrito"></span>
        </br>
        <textarea id="textArea" readonly placeholder="O codigo será exibido aqui!"></textarea>
    </div>

<div id="ImportarCad">
    <h1>Importar cadastro</h1>
    <input type='button' class='button' onclick="importarPagina();" value="Carregar arquivo " />
    <input type="file" name="inputFile" id="inputFile">
    <br>
    <pre id="output"></pre>

    <script type="text/javascript">
    //carrega o arquivo texto - não me pergunte, ele apenas funciona
      document.getElementById('inputFile').addEventListener('change', function() {
        var file = new FileReader();
        file.onload = () => {
        document.getElementById('output').innerHTML = file.result;
        }
        file.readAsText(this.files[0]);
      });
    </script>
</div>
<br>
<!-- Fim-Formulario de cadastro-->

<!---------------------------------------------------------------------------------->

<!-- div para separar o que sera gerado pelo "Codigo_Escrito"-->
<div id="codigoFonte">
    <!-- wp:columns {"align":"full"} -->
    <div class="wp-block-columns alignfull" id="ColunasProduto">
        <!-- wp:column {"verticalAlignment":"top"} -->
        <div class="wp-block-column is-vertically-aligned-top">
            <!-- wp:group {"align":"wide","layout":{"type":"flex","allowOrientation":false}} -->
            <div class="wp-block-group alignwide" id="Breadcrumbs">
                <!-- wp:html -->
                <p id="Breadcrumbs">
                    <a href="http://galaxyled.com.br/NewSite22/" id="LinkBreadcrumbs">Inicio</a> / 
                    <a href="http://galaxyled.com.br/NewSite22/?page_id=1243" id="BreadcrumbLinha"> <span id="LINHA_PRODUTO"> LINHA_PRODUTO </span></a> /  
                    <span id="NOME_PRODUTO"> NOME_PRODUTO</span>
                </p>
                <!-- /wp:html -->
            </div>
            <!-- /wp:group --> 
            
            <!-- wp:spacer -->            
            <div style="height:150px; margin-top:-140px;" aria-hidden="true" id="AncoraProduto" class="wp-block-spacer">
            </div>            
            <!-- /wp:spacer --> 
            <!-- wp:group -->
            <div id="ProdutoPrincipal" class="wp-block-group"><!-- wp:html -->

                <script type="text/javascript">
                    function ImagemAlterar(obj) {
                        var urlImg = (obj.childNodes[0].currentSrc);
                        document.getElementById("TrocarImg").src = urlImg;
                        var url = (obj.childNodes[0]);
                        var urlPot = url.getAttribute("data-pot");
                        var urlTemp = url.getAttribute("data-temp");
                        var urlTensao = url.getAttribute("data-tensao");
                        var urlBase = url.getAttribute("data-base");
                        var urlIp   = url.getAttribute("data-ip");
                        var urlCor  = obj.getAttribute("data-cor");
                        document.getElementById("POTENCIA_PRODUTO").innerText = urlPot;
                        document.getElementById("TEMPERATURA_PRODUTO").innerText = urlTemp;
                        document.getElementById("ARRAY_TENSAO_PRODUTO").innerText = urlTensao;
                        document.getElementById("BASE_PRODUTO").innerText = urlBase;
                         document.getElementById("IP_PRODUTO").innerText = urlIp;

                        var urlTab = url.getAttribute("data-tab"); 
                        var TabAlter = document.getElementById("tabelaP_Modelo_"+urlTab);                    
                        var divTabelas = document.getElementById("divTabela");
                        var contaTabelas = divTabelas.getElementsByTagName( "table").length;
                        var validaTabela = TabAlter.classList;

                        var divModelosPreenchidos = document.getElementById("modelos"); 
                        var AddCor = divModelosPreenchidos.getElementsByTagName("a")[urlTab];

                        for(var j="0";j<contaTabelas;j++){
                            
                            var RemoveClasse = document.getElementById("tabelaP_Modelo_"+j);
                            var RemoveClasseCor = divModelosPreenchidos.getElementsByTagName("a")[j];
                            if(RemoveClasseCor != undefined){
                                RemoveClasseCor.classList.remove(urlCor);
                            }
                            RemoveClasse.classList.remove("ativaTabela");
                        }

                        TabAlter.classList.add("ativaTabela");
                        AddCor.classList.add(urlCor);

                    }    

                    function ModeloAlterar(obj) {
                        var urlImg = obj.getAttribute("data-src");
                        var urlPot = obj.getAttribute("data-pot");
                        var urlTemp = obj.getAttribute("data-temp");
                        var urlTensao = obj.getAttribute("data-tensao");
                        var urlBase = obj.getAttribute("data-base");
                        var urlIp = obj.getAttribute("data-ip");
                        var urlCor = obj.getAttribute("data-cor");
                        document.getElementById("TrocarImg").src = urlImg;
                        document.getElementById("POTENCIA_PRODUTO").innerText = urlPot;
                        document.getElementById("ARRAY_TENSAO_PRODUTO").innerText = urlTensao;
                        document.getElementById("TEMPERATURA_PRODUTO").innerText = urlTemp;
                        document.getElementById("BASE_PRODUTO").innerText = urlBase;
                        document.getElementById("IP_PRODUTO").innerText = urlIp;

                        var urlTab = obj.getAttribute("data-tab");        
                        var TabAlter = document.getElementById("tabelaP_Modelo_"+urlTab);                    
                        var divTabelas = document.getElementById("divTabela");
                        var contaTabelas = divTabelas.getElementsByTagName( "table").length;
                        
                        var validaTabela = TabAlter.classList;
                        
                        var divModelosPreenchidos = document.getElementById("modelos"); 
                        var AddCor = divModelosPreenchidos.getElementsByTagName("a")[urlTab];

                        for(var j="0";j<contaTabelas;j++){
                            
                            var RemoveClasse = document.getElementById("tabelaP_Modelo_"+j);
                            var RemoveClasseCor = divModelosPreenchidos.getElementsByTagName("a")[j];
                            if(RemoveClasseCor != undefined){
                                RemoveClasseCor.classList.remove(urlCor);
                            }
                            RemoveClasse.classList.remove("ativaTabela");
                        }

                        TabAlter.classList.add("ativaTabela");
                        AddCor.classList.add(urlCor);
                    }

                    function Filamento03(obj) {
                        var urlImg = (obj.childNodes[1].currentSrc);
                        document.getElementById("Sob").href = urlImg;
                    }
                    
                </script>

                <a onclick="Filamento03(this);" href="#" id="Sob" class='oceanwp-lightbox' >
                    <img id="TrocarImg" src="#" data-src="" alt="Imagem Principal">
                </a>
                
                <br>
                <!-- /wp:html -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"center","flexWrap":"wrap"}} -->
            <div id="ListaMiniaturas" class="wp-block-group"><!-- wp:html --></div><!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column" id="sobre"><!-- wp:paragraph -->
            <p> </p>
            <!-- /wp:paragraph -->

            <!-- wp:spacer {"height":"31px"} -->
            <div style="height:31px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->

            <!-- wp:heading {"level":1,"align":"wide","fontSize":"large"} -->
            <h1 class="alignwide has-large-font-size" id="TituloProdPrincipal">Titulo</h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p id="DESCRICAO_PRODUTO">DESCRICAO_PRODUTO</p>
            <!-- /wp:paragraph -->

            <!-- wp:group -->
            <div id="InfoProduto" class="wp-block-group"><!-- wp:html -->
                <div id="SobreInterno">
                    <span id="TituloInfoPrinc">Informações </span>
                    <br> <span id="TituloInfo">             Modelos:</span><span id="TituloVisualizar"> Clique sobre nome do modelo para visualizar.</span>            
                    <br> <div id="modelos"></div>
                         <span id="TituloInfo" name="potPagina">             Potência:</span>
                    <br> <span id="POTENCIA_PRODUTO">       POTENCIA_PRODUTO </span>
                    <br> <span id="TituloInfo" name="tenPagina">             Tensão:</span>
                    <br> <span id="ARRAY_TENSAO_PRODUTO">   TENSAO_ARRAY_PRODUTO</span>
                    <br> <span id="TituloInfo" name="tempPagina">             Temperatura de cor:</span>
                    <br> <span id="TEMPERATURA_PRODUTO">    TEMPERATURA_PRODUTO </span>
                    <br> <span id="TituloInfo" name="basPagina">             Base do produto:</span>
                    <br> <span id="BASE_PRODUTO">           BASE_PRODUTO</span>
                    <br> <span id="TituloInfo" name="ipPagina">             Indice de proteção:</span>
                    <br> <span id="IP_PRODUTO">             IP_PRODUTO</span>
                </div>
                <!-- /wp:html -->
            </div>
            <!-- /wp:group -->
            </div>

        
            </div>

            <!-- /wp:column -->
            <!--wp:html -->
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
            </head>
            <div id="colapseTabela">
                <button id='ColapseButton' type="button" class="collapsiblePRO">+ Informações Tecnicas</button>
                <div class="contentPRO">
                    <div id="divTabela"></div>
                </div>
                <br>
            </div>
            <div id="colapseInfoP">
                <button id='ColapseButton' type="button" class="collapsiblePRO">+ Informações especificas</button>
                <div class="contentPRO">
                    <textarea id="infoP" readonly>Informações especificas          </textarea>
                </div>
            </div>
            <div id="colapseFicha">
                <button id='ColapseButton' type="button" class="collapsiblePRO">+ Ficha Técnica</button>
                <div class="contentPRO">
  
                        <object class="wp-block-file__embed" id="BotaoFicha" data="" type="application/pdf" style="width:100%;height:600px"></object>

                </div>
            </div>
            <script>
                var coll = document.getElementsByClassName("collapsiblePRO");
                var i;

                for (i = 0; i < coll.length; i++) {
                  coll[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var content = this.nextElementSibling;
                    if (content.style.display === "block") {
                      content.style.display = "none";
                  } else {
                      content.style.display = "block";
                  }
              });
              }
            </script>
            
            
      <!-- /wp:html -->

      <!-- wp:html -->
    <br>
    <br>
    <!-- /wp:html -->
</div>
</div>
<!-- /wp:columns -->
</body>