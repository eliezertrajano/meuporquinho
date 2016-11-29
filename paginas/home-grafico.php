<style>
	.itens div {
		padding-left: 0;
		padding-right: 0;
		text-align: center;
	}
	
	.meses div {
		border: 0 solid;
		color: #000;
		text-align: right;
	}
</style>
<!-- row -->
<!-- col -->
<h1 class="page-title txt-color-blueDark">

	<!-- PAGE HEADER -->
	<i class="fa-fw fa fa-home"></i> 
	Relatório Sintético 
	<select  class="col-sm-2" onchange="iniciar()" id="ano" name="ano" style="float:right">

	</select>
</h1>

<!-- end row -->

<!--
	The ID "widget-grid" will start to initialize all widgets below 
	You do not need to use widgets if you dont want to. Simply remove 
	the <section></section> and you can use wells or panels instead 
-->



<div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Categoria</th>
                                        <th>JAN</th>
                                        <th>FEV</th>
                                        <th>MAR</th>
                                        <th>ABR</th>
                                        <th>MAI</th>
																			<th>JUN</th>
																			<th>JUL</th>
																			<th>AGO</th>
																			<th>SET</th>
																			<th>OUT</th>
																			<th>NOV</th>
																			<th>DEZ</th>
																			
                                    </tr>
                                    </thead>
                                    <tbody class="meses">
                              
                    

                                    </tbody>
                                </table>
                            </div>

<script type="text/javascript">
	$(function() {
		$.getScript( "/assets/js/geral.js", function( ) {
			carregarSelect_custom('ano', 'LISTAR_ANOS_DISPONIVEIS');
			iniciar();
		});
	});

	function iniciar() {
		$("#label_status").html("<img src='/assets/images/default.svg' width='20px'>Aguarde... Atualizando registros!!");
	

	  carregarValores({
			consulta: "EXIBIR_GURPOSCATEGORIA"
		}, function(obj) {
			$('.meses').html("");
			$.each(obj, function(index, value) {
	        if(value.tip_grupo==0){
						value.nom_grupo="Sem Categorizacao"
					}
					carregarValores({
						consulta: "LISTAR_VALORES_ANO_DETALHES",
						parametro: $('#ano').val()+","+value.tip_grupo
					}, function(obj) {
						$('.meses').append("<tr><th colspan='13' style=' background-color: rgba(70, 103, 204, 0.15);    padding: 1px;    padding-left: 11px;'>"+value.nom_grupo+"</th></tr>");
						 mostrarValores(obj);
					});
				
				
			});
		});
		
		
	
		

	}
	
	function mostrarValores(obj){
					$.each(obj, function(index, value) {
				if (value.tipo == "1") {
					color = "#B0C4DE";
				} else {
					color = 'white';
				}
				var item = '';
				item = item + '<tr><td><span> <a href="#" data-toggle="tooltip" data-placement="top" title="0" id="media_' + value.id + '">' + value.nom_categoria + '</a></span></td>';
				item = item + '<td class=" valor mes1"><a href="?q=detalhes&mes=01&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["1"])+'</a></td>';	
				item = item + '<td class=" valor mes2" ><a href="?q=detalhes&mes=02&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["2"])+'</a></td>';
				item = item + '<td class=" valor mes3"><a href="?q=detalhes&mes=03&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["3"])+'</a></td>';	
				item = item + '<td class="valor mes4"><a href="?q=detalhes&mes=04&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["4"])+'</a></td>';
				item = item + '<td class=" valor mes5"><a href="?q=detalhes&mes=05&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["5"])+'</a></td>';	
				item = item + '<td class=" valor mes6"><a href="?q=detalhes&mes=06&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["6"])+'</a></td>';
				item = item + '<td class="valor mes7"><a href="?q=detalhes&mes=07&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["7"])+'</a></td>';	
				item = item + '<td class="valor mes8"><a href="?q=detalhes&mes=08&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["8"])+'</a></td>';
				item = item + '<td class="valor mes9"><a href="?q=detalhes&mes=09&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["9"])+'</a></td>';  	
				item = item + '<td class=" valor mes10"><a href="?q=detalhes&mes=10&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["10"])+'</a></td>';
				item = item + '<td class="valor mes11"><a href="?q=detalhes&mes=11&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["11"])+'</a></td>';	
				item = item + '<td class= valor mes12" ><a href="?q=detalhes&mes=12&ano=' + $('#ano').val() + '&tipo=' + value.id + '" > '+retVal(value["12"])+'</a></td>';
				item = item + '</tr>';
				$('.meses').append(item);

			});


			$("#label_status").html("Registros Atualizados!");
			colorir();
	}

	function colorir(){
		$.each(	$(".valor a"), function(index, value) {

			var d = new Date();
			var n = d.getMonth();
			console.log(n);
			for(i=1;i<(n+2);i++){
				if(parseInt($(value).html())==0){
					if($(value).parent().hasClass('mes'+i)){
						$(value).parent().css('background','#FCC9C9');
					}
				}
			}
		});
	}
	
	function retVal(val){
		if(val){
			return val.replace('.',',');
		}else{
			return '0,00';
		}
	}
</script>