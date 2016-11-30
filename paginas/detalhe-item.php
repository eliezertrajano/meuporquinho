<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-home"></i> 
				Detalhes
			
		</h1> Informação do registro:

<br>
<table class="table">
			<thead>
			<tr>	
					<th>Data</th>
					<th>Descrição</th>
					<th>Mes</th>
				  <th>Ano</th>
				 <th>Tipo</th>
				 <th>Origem</th>
				<th>Valor</th>
			</tr>
			</thead>
			<tbody  id="detalhes">



			</tbody>
	</table>


<br>
Sugestão de Alteração:
<BR><BR>
<form id="registro">

<input type="hidden" name="tabela" value="lancamento">
<input type="hidden" name="id" value ="<?php echo $_GET["id"] ?>">
<input type="hidden"  name="seq_usuario" value="<?php echo $_SESSION["seq_usuario"]?>">
<input type="hidden"  name="tip_origem" value="MAN">
	
  <div class="form-group col-xs-3 col-sm-3 col-lg-3">
    <label for="seq_categoria">seq_categoria:</label>
    <select class="form-control" name="seq_categoria"></select>
  </div>

  <div class="form-group col-xs-6 col-sm-6 col-lg-6">
    <label for="email">Descrição:</label>
    <input type="text" class="form-control" name="txt_lancamento" id="txt_lancamento">
  </div>

  <div class="form-group col-xs-3 col-sm-3 col-lg-3">
    <label for="mes">Mes de Referência:</label>
    <select class="form-control" name="mes_lancamento">
      <option value="1">Janeiro</option>
      <option value="2">Fevereiro</option>
      <option value="3">Março</option>
      <option value="4">Abril</option>
      <option value="5">Maio</option>    
      <option value="6">Junho</option>    
      <option value="7">Julho</option>   
      <option value="8">Agosto</option>    
      <option value="9">Setembro</option>   
      <option value="10">Outubro</option>    
      <option value="11">Novembro</option>  
      <option value="12">Dezembro</option>
    </select>
  </div>

</form>
<div class="form-group col-xs-2 col-sm-2 col-lg-2">
     <label > </label>
 <button class="form-control" onclick="salvarExclusivo()">Salvar</button>
</div>

<script type="text/javascript">

$.getScript( "/assets/js/geral.js", function( ) {
 		$("#label_status").html("<img src='/assets/images/default.svg' width='20px'> Carregando Valores...");

		carregarValores({
			ent: "categoria",
			condicoes:"seq_usuario!<?php echo $_SESSION["seq_usuario"]?>"
		}, function(obj) {
			var options="";
			for (var j in obj ) {
				options = options + "<option value="+obj[j]["categoria"]["id"]+">"+obj[j]["categoria"]["nom_categoria"]+"</option>";
			}
			
			$("[name=seq_categoria]").html(options);
			
			 iniciar();
			
		},false,true);
  });

function salvarExclusivo() {

				salvar('registro',iniciar);
}
	
	


	
  function iniciar() {

    carregarValores({
			col:"id,dat_lancamento,txt_lancamento,mes_lancamento,ano_lancamento,tip_origem,nom_origem,val_lancamento,seq_categoria",
      ent: "lancamento",
      condicoes: "id!.<?php echo $_GET["id"] ?>."
    }, function(obj) {
			
			console.log(obj[0]["lancamento"]);
 
	    $("[name=id]").val(obj[0]["lancamento"].id);
			$("[name=seq_categoria]").val(obj[0]["lancamento"].seq_categoria);
			$("[name=txt_lancamento]").val(obj[0]["lancamento"].txt_lancamento);			
			$('[name=mes_lancamento]').val(obj[0]["lancamento"].mes_lancamento);
		$("#label_status").html("Atualizado");

      criarTabela(obj[0], '#detalhes', 'detalhe_item.php');
    }, true, true);
  }
</script>