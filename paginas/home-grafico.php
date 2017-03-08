<style>
#hora span {
  font-size: 30px;
  display: block;
  color: #5D6678;
  text-align: center;
}

#hora {
  padding-left: 23px;
  padding-right: 23px;
  border: solid 4px;
  border-radius: 100px;
  color: white;
  height: 170px;
  -webkit-box-shadow: 8px 11px 16px -9px #2F3E47;
  -moz-box-shadow: 8px 11px 16px -9px #2F3E47;
  box-shadow: 8px 11px 16px -9px #2F3E47;
  text-align: center;
}

#hora label {
  text-shadow: 2px 1px 2px #2F3E47 !important;
}

.alert {
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#f1e767+0,feb645+100;Yellow+3D */
  background: #f1e767;
 /* Old browsers */
  background: -moz-linear-gradient(left,  #f1e767 0%, #feb645 100%);
 /* FF3.6-15 */
  background: -webkit-linear-gradient(left,  #f1e767 0%,#feb645 100%);
 /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to right,  #f1e767 0%,#feb645 100%);
 /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1e767', endColorstr='#feb645',GradientType=1 );
 /* IE6-9 */;
}

.danger {
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#feccb1+0,f17432+50,ea5507+51,fb955e+100;Red+Gloss+%232 */
  background: #feccb1;
 /* Old browsers */
  background: -moz-linear-gradient(left,  #feccb1 0%, #f17432 50%, #ea5507 51%, #fb955e 100%);
 /* FF3.6-15 */
  background: -webkit-linear-gradient(left,  #feccb1 0%,#f17432 50%,#ea5507 51%,#fb955e 100%);
 /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to right,  #feccb1 0%,#f17432 50%,#ea5507 51%,#fb955e 100%);
 /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#feccb1', endColorstr='#fb955e',GradientType=1 );
 /* IE6-9 */;
}

.success {
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#606c88+0,3f4c6b+100;Grey+3D+%232 */
  background: #606c88;
 /* Old browsers */
  background: -moz-linear-gradient(left,  #606c88 0%, #3f4c6b 100%);
 /* FF3.6-15 */
  background: -webkit-linear-gradient(left,  #606c88 0%,#3f4c6b 100%);
 /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to right,  #606c88 0%,#3f4c6b 100%);
 /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#606c88', endColorstr='#3f4c6b',GradientType=1 );
 /* IE6-9 */;
}

.resumo_txt{
	border: solid 3px #f5f5f5;
	background: white;
	padding: 4px;
}
.resumo_valor{
	float: right;
}


</style>
<bR>
<select  class="col-sm-2" onchange="iniciar()" id="ano" name="ano" style="float: left;position: absolute;right: 17px;width: 110px;"></select>


<div id='hora' class="col-sm-2 alert">
<label >Total de Entradas:</label><BR>
<div style="color: green" id="qtd_entrada">R$ 0,00</div>
<label >Minha hora: </label>

	<span id="qtd_hora">
		<b>R$ 0,00</b>
	</span>


</div>
<div id='hora' class="col-sm-2 col-md-offset-1 alert">
<label >Investimento:</label><BR>
<div style="color: green" id="qtd_Investimento">R$ 0,00</div>
<label >Porcentagem: </label>

	<span id="qtd_Investporcentagem">
		<b>30%</b>
	</span>


</div>
<div id='hora' class="col-sm-2 col-md-offset-1 alert">
<label >Total de Saidas:</label><BR>
<div style="color: red" id="qtd_saida">R$ 0,00</div>
<label>Porcentagem: </label>

	<span id="qtd_saidaporcentagem">
		<b>0%</b>
	</span>


</div>
<div id='hora' class="col-sm-2 col-md-offset-1 alert">
<label >Maior Gasto:</label><BR>
<div style="color: green" id="maior_gasto">Alimentação</div>
<label>Porcentagem: </label>

	<span id="qtd_maiorgasto">
		<b>0%</b>
	</span>


</div>
	<br>
		<div class="col-sm-12" id="Resumo"></div>
		<hr>

		<div class="col-sm-12" id="teste" style="width: 100%;height: 300px;"></div>



<script type="text/javascript">
	 var d = new Date();
	 var n = d.getMonth()+1; 

	 
	 $('table.highchart').highchartTable();
 	 $('table.highchartt').highchartTable();
     $.getScript( "/assets/js/graficos.js", function( ) {
	     $.getScript( "/assets/js/geral.js", function( ) {
	     	 carregarSelect_custom('ano', 'LISTAR_ANOS_DISPONIVEIS');
	         iniciar();	       
		 });
     });


     function iniciar(){
     	   

     	    carregarValores({
	            consulta: "RESUMO_GASTOS",
	            parametro: $('#ano').val()
	        },function(obj){
	                  

	            $.each(obj, function(index, value) {
	            	 var i=0;
	             	 var totalEntrada =0;
					 var totalHoras =0;
					 var totalInvestimento =0;
					 var totalDespezas =0;
	            	 

                    ////////////////////////////////////////////////////////////////////////
	            	 if(value["tip_classificacao"] == "Total de Receitas"){
	            	
		            	 $.each(value, function(index1, value1) {
									
										 
		            	 	i++;
		            	 	if((i!=1) ){
											if(!isNaN(parseFloat(value1))){
												totalEntrada=parseFloat(totalEntrada)+parseFloat(value1);
											}
		            	 		
			                  }
		            	 	
		            	 });
		            	 totalHoras = parseFloat(totalEntrada/(160*n)).toFixed(2);
		            	 totalEntrada = totalEntrada.toFixed(2);
									 
		            	 $('#qtd_entrada').html(totalEntrada);
		            	 $('#qtd_hora').html("R$ "+totalHoras);
		            	
	            	 }

	            	 ///////////////////////////////////////////////////////////////////////
	            	  if(value["tip_classificacao"] == "Total de Investimentos"){
	            
		            	 $.each(value, function(index1, value1) {
		            	 	i++;
		            	 	if((i!=1)){
		            	 		totalInvestimento= format(value1)+format(totalInvestimento);
			                  }
		            	 	
		            	 });
		          
		            	 $('#qtd_Investimento').html(totalInvestimento.toFixed(2));

  	                     setTimeout(function(){$("#qtd_Investporcentagem").html(parseFloat(format($("#qtd_Investimento").html())/parseFloat($("#qtd_entrada").html())*100).toFixed(2)+"%")}, 1000);               
	           
	  			      }	
	  			     ///////////////////////////////////////////////////////////////////////
	            	  if(value["tip_classificacao"] == "Total de Despesas"){
	            
		            	 $.each(value, function(index1, value1) {
		            	 	i++;
		            	 	if((i!=1)&&(i<=n)){
		            	 		totalDespezas=(parseFloat(totalDespezas)+parseFloat(value1));
			                  }
		            	 	
		            	 });
		            	 totalDespezas=totalDespezas*(-1);
		            	 $('#qtd_saida').html(totalDespezas.toFixed(2));

  	                     setTimeout(function(){$("#qtd_saidaporcentagem").html(parseFloat(format($("#qtd_saida").html())/format($("#qtd_entrada").html())*100).toFixed(2)+"%")}, 1000);               
	           
	  			      }	
	            });
	        });
	        var valorMaior =0;
	        var NomeCategoria='';
	        var valor=0;
	        var serie= [];

	        carregarValores({
	            consulta: "EXIBIR_GURPOSCATEGORIA",
	            parametro: $('#ano').val()
	        },function(obj){ 
	        	
	        	$.each(obj, function(index, value) {
                    valor=0;
                    valor = valor+ format(value["Janeiro"]);
                    valor = valor+ format(value["Fevereiro"]);
                    valor = valor+ format(value["Marco"]);
                    valor = valor+ format(value["Abril"]);
                    valor = valor+ format(value["Maio"]);
                    valor = valor+ format(value["Junho"]);
                    valor = valor+ format(value["Julho"]);
                    valor = valor+ format(value["Agosto"]);
                    valor = valor+ format(value["Setembro"]);
                    valor = valor+ format(value["Outubro"]);
                    valor = valor+ format(value["Novembro"]);
                    valor = valor+ format(value["Dezembro"]);

                    ////////////////verifica o maior valor entre as categorias/////////////////////

                    if ((valor>valorMaior)&&(value["nom_grupo"]!='Receitas')){
                    	valorMaior= valor;
                    	NomeCategoria = value["nom_grupo"];
                    } 

                    ////////////////Adiciona o somatorio///////////////////// 

                    $('#Resumo').append("<div class='col-sm-4 resumo_txt'>"+value["nom_grupo"]+"<span class='resumo_valor'> R$"+format(valor).toFixed(2)+"</span></div>");

                    ////////////////cria o grafico////////////////////////////////////////////////

                    if(value["nom_grupo"]!='Receitas'){
                    	   serie.push({
					     name: value["nom_grupo"],
					     data: [format(value["Janeiro"]),
					     	    format(value["Fevereiro"]), 
					     	    format(value["Marco"]),
					     	    format(value["Abril"]),
					     	    format(value["Maio"]),
					     	    format(value["Junho"]),
					     	    format(value["Julho"]),
					     	    format(value["Agosto"]),
					     	    format(value["Setembro"]),
					     	    format(value["Outubro"]),
					     	    format(value["Novembro"]),
					     	    format(value["Dezembro"])
					     	    ]
					     });
                    }
       
                  
                     
	              
	        	});

				$("#maior_gasto").html(NomeCategoria);
	       		$("#qtd_maiorgasto").html(parseFloat(parseFloat(valorMaior)/parseFloat($("#qtd_entrada").html())*100).toFixed(2)+"%");  


				var categoria = ['JAN',	'FEV','MAR','ABR','MAI','JUN','JUL','AGO','SET','OUT','NOV','DEZ'];
				gerarLinhas('#teste', categoria, 'Despesas durante o ano <br> <label style="font-size:15px">(Clique nas Categorias para compara-las)</label>', serie); 

console.log(serie);

	        }); 





	       

	 }

	 function format(numero){
	 	if (numero<0){
	 		numero=numero*(-1);
	 	}
	 	if (numero==null){
	 		numero=0;
	 	}
	
      return parseFloat(numero);
	 }
     


</script>