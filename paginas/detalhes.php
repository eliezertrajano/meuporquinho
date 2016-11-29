
<h1 class="page-title txt-color-blueDark">
<!-- PAGE HEADER -->
  <i class="fa-fw fa fa-home"></i> 
    Detalhes
</h1>

<table class="table">
		<form id="lancamento">

				<tr>	
					 <input type="hidden" name="tabela" value="lancamento">
					 <input type="hidden"  name="tip_origem" value="MAN">
					 <input type="hidden"  name="id" id="idLancamento">
					 <input type="hidden"  name="dat_lancamento" id="dat_lancamento">
					 <input type="hidden"  name="ano_lancamento" id="ano_lancamento" value="<?php echo $_GET["ano"] ?>">
					 <input type="hidden"  name="mes_lancamento" id="mes_lancamento" value="<?php echo $_GET["mes"] ?>">
					 <input type="hidden"  name="seq_categoria" value="<?php echo $_GET["tipo"] ?>">
					
					 <input type="hidden"  name="seq_usuario" value="<?php echo $_SESSION["seq_usuario"]?>">
        	 <td style="width: 45%"> <input placeholder="Descrição" type="text" class="form-control" name="txt_lancamento" id=""></td>
			   	 <td> <input placeholder="Valor" type="text" class="form-control" name="val_lancamento" id="val_lancamento"></td>
			
				
					<td ><label><input type="checkbox"  id="parcelarValor" style="margin: 10px;">Parcelar valor</label>
						<label><input type="checkbox" name="ind_acompanhamento" id="ind_acompanhamento" style="margin: 10px;">Só Acompanhar</label>
						
						<div id="parcelaValor" class="input-group" style="width: 30%;float: right; display:none">
							<input type="number" class="form-control" id="qtd_parcelas">
							<span class="input-group-addon">Vezes</span>
						</div>

					</td>
				
			
				<th><a class="btn btn-success btn-sm " onclick="salvarLancamento()" >&#10004;</a></td>
			</tr>
		</form>
</table>

	<table class="table">
			<thead>
	<tr>			
					<th>Descrição </th>
					<th>Data</th>
					<th>Tipo</th>
					<th>Valor</th>
					<th></th>
			</tr>
				
	


		

	</thead>
			<tbody  id="detalhes">



			</tbody>
	</table>

<script type="text/javascript">

	$('#parcelarValor').click(function(){
		if($(this).is(":checked")){
			$('#parcelaValor').show();
		}else{
			$('#parcelaValor').hide();

		}
	});
	
		$('#ind_acompanhamento').click(function(){
        $(this).val(this.checked ? 1 : 0);
    });
	
$.getScript( "/assets/js/geral.js", function( ) {
		iniciar()
	});

	function iniciar() {
		$('#lancamento').trigger("reset");
		
		carregarValores({
			consulta: "LISTAR_VALORES_DETALHES",
			parametro: "<?php echo $_GET["ano"] ?>,<?php echo $_GET["mes"] ?>,<?php echo $_GET["tipo"] ?>"
		}, function(obj) {
			console.log(obj);
			criarTabela(obj, '#detalhes', 'detalhe-item', 'x', deletar);
		});
	}
	function salvarLancamento(){
		
	
		
		var d = new Date();
		if($('#parcelarValor').is(":checked")){
			var valor = parseFloat($("#val_lancamento").val())/parseInt($("#qtd_parcelas").val()).toFixed(2);
			var mes = parseInt('<?php echo $_GET["mes"] ?>');
			var ano = parseInt('<?php echo $_GET["ano"] ?>');
			var mes_mod ="";
			var ano_mod=ano;
			var texto ="O valor informado será divido da seguinte forma:";
			for (i=0;i< parseInt($("#qtd_parcelas").val());i++){
				  if((mes+i)>12){					
						mes_mod = (mes+i)-(Math.floor((mes+i)/12)*12);
						if(mes_mod==0){mes_mod=12;}
						if(mes_mod==1){ano_mod=ano_mod+1;}
					}else{
						mes_mod = (mes+i);
					}
					texto = texto + "\n R$ "+ valor.toFixed(2) +" para o mês "+ mes_mod +" de "+ ano_mod;
			}
			texto = texto + "\n\n Confirma?";
			
			if(confirm(texto)){
				 mes_mod ="";
			   ano_mod=ano;
				
				for (i=0;i< parseInt($("#qtd_parcelas").val());i++){
				  if((mes+i)>12){					
						mes_mod = (mes+i)-(Math.floor((mes+i)/12)*12);
						if(mes_mod==0){mes_mod=12;}
						if(mes_mod==1){ano_mod=ano_mod+1;}
					}else{
						mes_mod = (mes+i);
					}
					$("#val_lancamento").val(valor);
					$("#mes_lancamento").val(mes_mod);
					$("#ano_lancamento").val(ano_mod);
					$("#idLancamento").val("<?php echo $_SESSION["seq_usuario"]?>_"+mes_mod+ano_mod+d.getDate()+d.getMonth()+d.getFullYear()+d.getHours()+d.getMinutes()+d.getMilliseconds());
					$("#dat_lancamento").val(d.getFullYear()+"-"+d.getMonth()+"-"+d.getDate());
					salvar("lancamento");
					
			}	
				iniciar();
			}

		}else{
				
				$("#idLancamento").val("<?php echo $_SESSION["seq_usuario"]?>_"+d.getDate()+d.getMonth()+d.getFullYear()+d.getHours()+d.getMinutes()+d.getMilliseconds());
				$("#dat_lancamento").val(d.getFullYear()+"-"+d.getMonth()+"-"+d.getDate());
				salvar("lancamento",iniciar);
		}
		
		
	}

	function deletar() {
		$('.x').unbind();
		$('.x').click(function() {
			id = $(this).attr("item");
			remover($(this).attr("item"), 'lancamento',function(){iniciar();});
		});
	}
</script>