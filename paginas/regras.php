<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<h1 class="page-title txt-color-blueDark">
	<i class="fa-fw fa fa-home"></i> 
	Regras
</h1>

<form id="categoria">
	<input type="hidden" value="regra" name="tabela">
	<input type="hidden" name="usuario" value="<?php echo $_SESSION["seq_usuario"]?>">
	<table class="col-sm-12">
		<tr>
			<td class="col-sm-6"><input type="text" class="form-control" name="des_regra" placeholder="categoria"></td>
			<td class="col-sm-5"><select class="form-control" name="seq_categoria"></select></td>
			<td class="col-sm-1"><input type="button" class="form-control btn-success" value="Incluir" onclick="salvar('categoria',iniciar)" ></td>
		</tr>
	</table>
	
</form>

<br>
<hr>
<div id="detalhes">
	
</div>

<script type="text/javascript">
	$.getScript( "/assets/js/geral.js", function( ) {
		iniciar();
		carregarSelect('tipo', 'tipo');
	});

	function iniciar() {
		carregarValores({
			consulta: "LISTAR_REGRAS"
		}, function(obj) {
			criarTabela(obj, '#detalhes', '', 'x', deletar);
		});
	}

	function deletar() {
		$('.x').unbind();
		$('.x').click(function() {
			id = $(this).attr("item");
			remover($(this).attr("item"), 'tipo_palavras',function(){iniciar();});
		});
	}

</script>