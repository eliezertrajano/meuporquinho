
<h1 class="page-title txt-color-blueDark">
<!-- PAGE HEADER -->
  <i class="fa-fw fa fa-home"></i> 
    Detalhes
</h1>

<div id="detalhes">

</div>

<script type="text/javascript">

$.getScript( "/meuporquinho/assets/js/geral.js", function( ) {
		iniciar()
	});

	function iniciar() {
		carregarValores({
			consulta: "LISTAR_VALORES_DETALHES",
			parametro: "<?php echo $_GET["ano_lancamento"] ?>,<?php echo $_GET["mes_lancamento"] ?>,<?php echo $_GET["seq_categoria"] ?>"
		}, function(obj) {
			criarTabela(obj, '#detalhes', 'detalhe-item', 'x', deletar);
		});
	}

	function deletar() {
		$('.x').unbind();
		$('.x').click(function() {
			id = $(this).attr("item");
			remover($(this).attr("item"), 'tarefas',function(){iniciar();});
		});
	}
</script>