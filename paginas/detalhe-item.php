<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-home"></i> 
				Detalhes
			
		</h1> Informação do registro:
<div id="detalhes">

</div>

Sugestão de Alteração:

<form id="registro">

<input type="hidden" name="tabela" value="lancamento">
<input type="hidden" name="seq_lancamento" value ="<?php echo $_GET["seq_lancamento"] ?>">
<input type="hidden" name="dat_lancamento" value="">
<input type="hidden" name="mes_lancamento" value="">
<input type="hidden" name="ano_lancamento" value=""> 
<input type="hidden" name="val_lancamento" value=""> 	
<input type="hidden" name="seq_categoria" value=""> 
<input type="hidden" name="nom_origem" value=""> 	
<input type="hidden" name="tip_origem" value=""> 	
<input type="hidden" name="cod_identificacao" value=""> 	
<input type="hidden"  name="seq_usuario" value="<?php echo $_SESSION["seq_usuario"]?>">
	
  <div class="form-group col-xs-12 col-sm-4 col-lg-4">
    <label for="seq_categoria">Categoria:</label>
    <select class="form-control" name="seq_categoria"></select>
  </div>

  <div class="form-group col-xs-12 col-sm-4 col-lg-4">
    <label for="email">Descrição:</label>
    <input type="text" class="form-control" name="Item" id="Item">
		 <input type="hidden" class="form-control" name="usuario" id="usuario" value="<?php echo $_SESSION["id_usuario"]?>">
  </div>

  <div class="form-group col-xs-12 col-sm-3 col-lg-4">
    <label for="mes">Mes de Referência:</label>
    <select class="form-control" name="mes_lancamento">
      <option value="01">Janeiro</option>
      <option value="02">Fevereiro</option>
      <option value="03">Março</option>
      <option value="04">Abril</option>
      <option value="05">Maio</option>    
      <option value="06">Junho</option>    
      <option value="07">Julho</option>   
      <option value="08">Agosto</option>    
      <option value="09">Setembro</option>   
      <option value="10">Outubro</option>    
      <option value="11">Novembro</option>  
      <option value="12">Dezembro</option>
    </select>
  </div>

</form>
  <button class="btn  col-sm-1 col-lg-1 btn-default" onclick="salvarExclusivo()">Salvar</button>


<script type="text/javascript">

$.getScript( "/meuporquinho/assets/js/geral.js", function( ) {
    iniciar();
    carregarSelect('tipo', 'tipo');
  });

function salvarExclusivo() {
		removery($("[name=id]").val(), 'tarefas',function(){
				salvar('registro',iniciar);
		});
	
	
		removery($("[name=id]").val(), 'tipo_tarefas',function(){
				$.ajax({
					method:'POST',
					url:'inc/process/utils/salvar.php',
					data:{
						tabela:'tipo_tarefas',
						tipo:$("[name=tipo]").val(),
						id : $("[name=id]").val()
					}
				});
		});

}
	
  function iniciar() {
    carregarValores({
      ent: "tarefas",
      condicoes: "id!.<?php echo $_GET["id"] ?>."
    }, function(obj) {
 
      $("[name=Categoria]").val(obj[0].tarefas.Categoria);
			$("[name=mes]").val(obj[0].tarefas.mes);
			$("[name=Item]").val(obj[0].tarefas.Item);
			
$('[name=data]').val(obj[0].tarefas.data);
$('[name=mes]').val(obj[0].tarefas.mes);
$('[name=ano]').val(obj[0].tarefas.ano);
$('[name=valor]').val(obj[0].tarefas.valor); 	
$('[name=Categoria]').val(obj[0].tarefas.Categoria);
$('[name=agenciacontacartao]').val(obj[0].tarefas.agenciacontacartao);	
$('[name=tiporegistro]').val(obj[0].tarefas.tiporegistro);  	
$('[name=identificacao]').val(obj[0].tarefas.identificacao); 
			
			
			
      criarTabela(obj[0], '#detalhes', 'detalhe_item.php');
    }, true, true);
  }
</script>