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
    
    .master{
        cursor:pointer; 
        background-color: rgba(70, 103, 204, 0.06);    
        padding-left: 11px;
    
    }
    .master th{
            font-weight: 400;
    }
    .destaque{
        background-color:rgba(151, 158, 180, 0.39);
        color:white;
    }
    .borda{
        border: red 1px solid;
        box-shadow: 0px 0px 11px #333 !important;
        -webkit-box-shadow: 5px 5px 14px #333;
        -moz-box-shadow: 5px 5px 0 #333;
        height: 20px;
        width: 95px;
        position: absolute;
        right: 89px;
        border-radius: 11px;
    }
</style>
<!-- row -->
<!-- col -->

    <br>
<select  class="col-sm-2" onchange="iniciar()" id="ano" name="ano" style="float:right">

    </select>

    <table class="table resumotable"
             data-graph-container=".. .. .resumotable"          
             data-graph-yaxis-1-reversed="1"
             data-graph-type="line"
             >
                <thead>
                <tr>
                        <th></th>
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
                <tbody class="resumo">



                </tbody>
        </table>

</div>

<h1 class="page-title txt-color-blueDark">

    <!-- PAGE HEADER -->
    <i class="fa-fw fa fa-home"></i> 
    Informações de Gastos
    
</h1>

<!-- end row -->

<!--
    The ID "widget-grid" will start to initialize all widgets below 
    You do not need to use widgets if you dont want to. Simply remove 
    the <section></section> and you can use wells or panels instead 
-->



<div class="table-responsive">
    
        <table class="table tabela" 
            
             data-graph-container=".. .. .tabela"           
             data-graph-yaxis-1-reversed="1"
             data-graph-type="column"
    
             >
                <thead>
                <tr>
                        <th>Categorias</th>
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
    <BR>


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
            consulta: "EXIBIR_GURPOSCATEGORIA",
            parametro: $('#ano').val()
        }, function(obj) {
        
            if(obj.length<2){
                
                 
                  setTimeout(function(){  $("#myModal").modal(); $(".modal-backdrop").css("display","block"); }, 2000);
            }

            $('.meses').html("");
            $.each(obj, function(index, value) {
            if(value.tip_grupo===null){
                        value.nom_grupo="Sem Categorizacao"
                    }
                    carregarValores({
                        consulta: "LISTAR_VALORES_ANO_DETALHES",
                        parametro: $('#ano').val()+","+value.tip_grupo
                    }, function(obj) {
                        if (value.tip_grupo=='SEM'){
                                $('.meses').append("<tr class='master' ><th><span class='zmdi zmdi zmdi-caret-right'></span>&nbsp;&nbsp;"+value.nom_grupo+"</th><th><a href='?q=detalhes&mes=01&ano="+$('#ano').val()+"'>"+tratarValores(value.Janeiro)+"</a></th><th><a href='?q=detalhes&mes=02&ano="+$('#ano').val()+"'>"+tratarValores(value.Fevereiro)+"</a></th><th><a href='?q=detalhes&mes=03&ano="+$('#ano').val()+"'>"+tratarValores(value.Marco)+"</a></th><th><a href='?q=detalhes&mes=04&ano="+$('#ano').val()+"'>"+tratarValores(value.Abril)+"</a></th><th><a href='?q=detalhes&mes=05&ano="+$('#ano').val()+"'>"+tratarValores(value.Maio)+"</a></th><th><a href='?q=detalhes&mes=06&ano="+$('#ano').val()+"'>"+tratarValores(value.Junho)+"</a></th><th><a href='?q=detalhes&mes=07&ano="+$('#ano').val()+"'>"+tratarValores(value.Julho)+"</a></th><th><a href='?q=detalhes&mes=08&ano="+$('#ano').val()+"'>"+tratarValores(value.Agosto)+"</a></th><th><a href='?q=detalhes&mes=09&ano="+$('#ano').val()+"'>"+tratarValores(value.Setembro)+"</a></th><th><a href='?q=detalhes&mes=10&ano="+$('#ano').val()+"'>"+tratarValores(value.Outubro)+"</a></th><th><a href='?q=detalhes&mes=11&ano="+$('#ano').val()+"'>"+tratarValores(value.Novembro)+"</a></th><th><a href='?q=detalhes&mes=12&ano="+$('#ano').val()+"'>"+tratarValores(value.Dezembro)+"</a></th></tr>");
                        }else{
                                $('.meses').append("<tr class='master_"+value.tip_grupo+" master'  onclick=\"toogle('"+value.tip_grupo+"')\" ><th ><span class='zmdi zmdi zmdi-caret-right'></span>&nbsp;&nbsp;"+value.nom_grupo+"</th><th>"+tratarValores(value.Janeiro)+"</th><th>"+tratarValores(value.Fevereiro)+"</th><th>"+tratarValores(value.Marco)+"</th><th>"+tratarValores(value.Abril)+"</th><th>"+tratarValores(value.Maio)+"</th><th>"+tratarValores(value.Junho)+"</th><th>"+tratarValores(value.Julho)+"</th><th>"+tratarValores(value.Agosto)+"</th><th>"+tratarValores(value.Setembro)+"</th><th>"+tratarValores(value.Outubro)+"</th><th>"+tratarValores(value.Novembro)+"</th><th>"+tratarValores(value.Dezembro)+"</th></tr>");
                        }
                         mostrarValores(obj,value.tip_grupo);
                    }); 
                
                
            });
        });
        
        carregarValores({
            consulta: "RESUMO_GASTOS",
            parametro: $('#ano').val()
        },function(obj){
        $('.resumo').html("");
            $.each(obj, function(index, value) {
                    var item = '';
                    item = item + '<tr>';
                    item = item + '<td>'+value.tip_classificacao+'</td><td>'+tratarValores(value.Janeiro)+'</td><td>'+tratarValores(value.Fevereiro)+'</td><td>'+tratarValores(value.Marco)+'</td><td>'+tratarValores(value.Abril)+'</td><td>'+tratarValores(value.Maio)+'</td><td>'+tratarValores(value.Junho)+'</td><td>'+tratarValores(value.Julho)+'</td><td>'+tratarValores(value.Agosto)+'</td><td>'+tratarValores(value.Setembro)+'</td><td>'+tratarValores(value.Outubro)+'</td><td>'+tratarValores(value.Novembro)+'</td><td>'+tratarValores(value.Dezembro)+'</td>';
                        item = item + '</tr>';
                $('.resumo').append(item);  
            });
        });
    
    }
    
    function tratarValores(valor){
        valor = Number(valor);
        valor = valor.toFixed(2);
        if(valor==null){
            valor =0.00;
        }
        if(valor<0){
            valor = valor*(-1);
        }
            return valor.toString().replace(".",",");
    }
    
    function toogle(classe){
        $("."+classe).toggle();
        $(".master_"+classe+" .zmdi").toggleClass(' zmdi-caret-down');
        $(".master_"+classe).toggleClass("destaque");
        
        
        
    }
    function mostrarValores(obj,tipo){
                    $.each(obj, function(index, value) {
                if (value.tipo == "1") {
                    color = "#B0C4DE";
                } else {
                    color = 'white';
                }
                var item = '';
                item = item + '<tr class="'+tipo+'" style="display:none;background:rgba(238, 232, 170, 0.64) none repeat scroll 0% 0%"><td><span> <a href="#" data-toggle="tooltip" data-placement="top" title="0" id="media_' + value.id + '">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + value.nom_categoria + '</a></span></td>';
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
        $.each( $(".valor a"), function(index, value) {

            var d = new Date();
            var n = d.getMonth();
            console.log(n);
            for(i=1;i<(n+2);i++){
                if(parseInt($(value).html())==0){
                    if($(value).parent().hasClass('mes'+i)){
                        $(value).parent().css('background','rgba(252, 201, 201, 0.33) none repeat scroll 0% 0%');
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