<style>
  #DataTables_Table_0_filter{
    display:none;
  }
</style>

<BR><BR><br>
 <div class="row">
  <div class="col-lg-8 col-md-offset-2">
  <form action="?q=pesquisa" method="POST" >
    <div class="input-group">
   <input id="consulta" name="pesquisa" class="form-control" value="<?php echo $_POST["pesquisa"]?>" placeholder="Search" type="text">
    <span class="input-group-btn">
    <button type="submit" class="btn waves-effect waves-light btn-custom" onclick="consulta()"><i class="fa fa-search"></i></button>
    </span>
      </div>
  </form>
  </div>
  </div>

  <BR><BR>
    
    <div class="row">
                    <div class="col-lg-12">
              



                            <div class="">
                                <table class="table-responsive
 table m-0">
                                    <thead>
                                        <tr>
                                            <th>Descrição</th>
                                            <th>Categoria</th>
                                            <th>Mes</th>
                                            <th>Ano</th>
                                            <th>Valor</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="resulado">
                                             
                                  
                                    </tbody>
                                </table>
                            </div>
         
                    </div><!-- end col -->

                </div>
    
    
    <script>
      
      $.getScript( "/assets/js/geral.js", function( ) {
        consulta();
      });  
      
      
      
      function consulta(){
       

         $("#resulado").html('loading...');
            carregarValores({
                consulta: "SELECIONAR_LANCAMENTOS",
                parametro: $('#consulta').val()
              }, function(obj) {
                 $("#resulado").html('');
                 $.each(obj, function(i, valor) {
                     var val;
                     val = "<tr>\
                              <td><a href='?q=detalhe-item&id="+valor.id+"'>"+valor.txt_lancamento+"</a></td>\
                              <td><a href='?q=detalhe-item&id="+valor.id+"'>"+valor.nom_categoria+"</a></td>\
                              <td><a href='?q=detalhe-item&id="+valor.id+"'>"+valor.mes_lancamento+"</a></td>\
                              <td><a href='?q=detalhe-item&id="+valor.id+"'>"+valor.ano_lancamento+"</a></td>\
                              <td><a href='?q=detalhe-item&id="+valor.id+"'>"+valor.val_lancamento+"</a></td>\
                              <td><a class='btn btn-danger btn-sm x' item="+valor.id+">x</a></td>\
                            </tr>";
                                
                     $("#resulado").append(val);
                    
                 });
                deletar();
                $('.table-responsive').DataTable();   
        
                 
                //   
              });

      }
      
	function deletar() {
		$('.x').unbind();
		$('.x').click(function() {
			id = $(this).attr("item");
			remover($(this).attr("item"), 'lancamento',function(){consulta();});
		});
	}
   
    </script>