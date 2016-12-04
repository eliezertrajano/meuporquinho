<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

	<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-home"></i> 
				Categorias
			
		</h1>

<form id="categoria">
	<input type="hidden" value="categoria" name="tabela">
	<input type="hidden"  name="seq_usuario" value="<?php echo $_SESSION["seq_usuario"]?>">
<table class="col-sm-12">
	<tr>
		<td class="col-sm-4">
		  <input type="text" class="form-control" name="nom_categoria" placeholder="categoria">
		</td>
		<td class="col-sm-4">
		  <select class="form-control" name="ind_categoria">
		    <option value="D">Despesa</option>
		    <option value="R">Receita</option>
		    <option value="I">Investimento</option>
		  </select>
		</td>
		<td class="col-sm-3">
		  <select class="form-control" name="tip_grupo">

		  </select>
		</td>
		<td class="col-sm-1">
		  <input type="button" class="form-control btn-success" value="Incluir" onclick="salvar('categoria',iniciar)" >
		</td>
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
		iniciar()
	});

	function iniciar() {
		$("#label_status").html("<img src='/assets/images/default.svg' width='20px'> Carregando Valores...");
		$("#categoria").trigger("reset");
		carregarValores({
			consulta: "LISTAR_CATEGORIAS_DETALHES"
		}, function(obj) {
			criarTabela(obj, '#detalhes', '', 'x', deletar);
		});
		
	carregarValores({
			ent: "categoria_grupo",
		
		}, function(obj) {
			var options="";
			for (var j in obj ) {
				options = options + "<option value="+obj[j]["categoria_grupo"]["tip_grupo"]+">"+obj[j]["categoria_grupo"]["nom_grupo"]+"</option>";
			}
			
			$("[name=tip_grupo]").html(options);
			
		},false,true);
		
	}

	function deletar() {

		$("#label_status").html("Atualizados");
		$('.x').unbind();
		$('.x').click(function() {
			id = $(this).attr("item");
			remover($(this).attr("item"), 'categoria',iniciar);
		});
		
				  $('.table').DataTable();
	}
</script>