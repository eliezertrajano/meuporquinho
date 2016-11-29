<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<h1 class="page-title txt-color-blueDark">
	<i class="fa-fw fa fa-home"></i> 
	Regras
</h1>

<form id="regra">
	<input type="hidden" value="regra" name="tabela">
	<input type="hidden" name="seq_usuario" value="<?php echo $_SESSION["seq_usuario"]?>">
	<table class="col-sm-12">
		<tr>
			<td class="col-sm-6"><input type="text" class="form-control" name="des_regra" placeholder="categoria"></td>
			<td class="col-sm-5"><select class="form-control" name="seq_categoria"></select></td>
			<td class="col-sm-1"><input type="button" class="form-control btn-success" value="Incluir" onclick="salvar('regra',iniciar)" ></td>
		</tr>
	</table>
	
</form>

<br>
<hr>

	<table class="table">
			<thead>
			<tr>
					<th>Descricao</th>
					<th>Categoria</th>
					<th>Tipo</th>
					<th></th>
			</tr>
			</thead>
			<tbody  id="detalhes">



			</tbody>
	</table>


<script type="text/javascript">
	$.getScript( "/assets/js/geral.js", function( ) {
		iniciar();
	});

	function iniciar() {
		$("#label_status").html("<img src='/assets/images/default.svg' width='20px'> Carregando Valores...");
		$("#regra").trigger("reset");
		carregarValores({
			consulta: "LISTAR_REGRAS"
		}, function(obj) {
			criarTabela(obj, '#detalhes', '', 'x', deletar);
			//atualizarLancamentos();
		});
		
		carregarValores({
			  ent: "categoria",
			  condicoes:"seq_usuario!.<?php echo $_SESSION["seq_usuario"]?>.",
			  order:"nom_categoria"
		}, function(obj) {
			var options="";
			for (var j in obj ) {
				options = options + "<option value="+obj[j]["categoria"]["id"]+">"+obj[j]["categoria"]["nom_categoria"]+"</option>";
			}
			
			$("[name=seq_categoria]").html(options);
			
		},false,true);
		
		
	}

	function deletar() {
		$("#label_status").html("Atualizados.")
		$('.x').unbind();
		$('.x').click(function() {
			id = $(this).attr("item");
			remover($(this).attr("item"), 'regra',function(){iniciar();atualizarLancamentos();});
		});
	}

</script>