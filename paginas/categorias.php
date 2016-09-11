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
	<input type="hidden"  name="usuario" value="<?php echo $_SESSION["seq_usuario"]?>">
<table class="col-sm-12">
	<tr>
		<td class="col-sm-6">
		  <input type="text" class="form-control" name="nom_categoria" placeholder="categoria">
		</td>
		<td class="col-sm-5">
		  <select class="form-control" name="ind_categoria">
		    <option value="D">Despesa</option>
		    <option value="R">Receita</option>
		    <option value="I">Investimento</option>
		  </select>
		</td>
		<td class="col-sm-5">
		  <select class="form-control" name="tip_categoria">
		    <option value="MIG">Migração</option> 
            <option value="FIX">Gastos fixos</option>
            <option value="HAB">Habitação</option>
            <option value="SAU">Saúde</option>
            <option value="AUT">Automóvel</option>
            <option value="PES">Pessoal</option>
            <option value="LAZ">Lazer</option>
            <option value="DEP">Dependentes</option>
            <option value="INV">Investimento</option>
            <option value="TAX">Impostos e taxas</option>
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
<div id="detalhes">
	
</div>
<script type="text/javascript">
  $.getScript( "/meuporquinho/assets/js/geral.js", function( ) {
		iniciar()
	});

	function iniciar() {
		carregarValores({
			consulta: "LISTAR_CATEGORIAS_DETALHES"
		}, function(obj) {
			criarTabela(obj, '#detalhes', '', 'x', deletar);
		});
	}

	function deletar() {
		$('.x').unbind();
		$('.x').click(function() {
			id = $(this).attr("item");
			remover($(this).attr("item"), 'tipo',iniciar);
		});
	}
</script>