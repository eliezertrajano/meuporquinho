
                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                               
                            </div>
                            <div class="col-xs-6">
                                <ul class="pull-right list-inline m-b-0">
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Help</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div>
            <!-- end container -->



            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="zmdi zmdi-close-circle-o"></i>
                </a>
                <h4 class="">Notifications</h4>
                <div class="notification-list nicescroll">
                    <ul class="list-group list-no-border user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">Michael Zenaty</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon">
                                    <i class="zmdi zmdi-account"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Signup</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">5 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon">
                                    <i class="zmdi zmdi-comment"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Message received</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">James Anderson</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="icon">
                                    <i class="zmdi zmdi-settings"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">Settings</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>





    </body>

			<script>
	$(function() {
		$("#fileuploader").uploadFile({
			url: "process/utils/upload.php?folder=arquivos",
			multiple: false,
			showStatusAfterSuccess: false,
			showAbort: false,
			showDone: false,
			showProgress: false,
			showFileCounter: false,
			onSuccess: function(files, data, xhr) {
				$("#label_status").html("Atualizando banco...");
				atualizarLancamentos();
			}

		});
	});

	function boasVindas(){
		item = parseInt($("#btn_boasvindas").attr("item"));
           if(parseInt(item)>6){  

                $.ajax({
                    method:'GET',
                    url:'/process/utils/executar.php',
                    data: { consulta:"INCLUIR_CATEGORIAS"},
                    success:function(obj){
                                  $.ajax({
                                            method:'GET',
                                            url:'/process/utils/executar.php',
                                            data: { consulta:"INCLUIR_REGRAS"},
                                            success:function(obj){
                                                                $.ajax({
                                                                        method:'GET',
                                                                        url:'/process/utils/executar.php',
                                                                        data: { consulta:"INCLUIR_LANCAMENTO"},
                                                                        success:function(obj){

                                                                             $('#myModal').modal('hide');
                                                                              location.reload(); 
                                                                        }});





                                                
                                               
                                            }});                        
                         
                    }
                });              
    
            }

		
		var msg = [] 
		msg[0]=[];
		msg[0][0]="Ótimo, antes de começar precisamos aprender pequenos conceitos!";
		msg[1]=[];
		msg[1][0]="Primeiro, nós utilizamos  regras para categorizar seus lançamentos";
		msg[2]=[];
		msg[2][0]="Por exemplo: A regra 'Habibs' vai categorizar todos os lançamentos com essa palavra em 'Alimentação'";
		msg[2][1]="40px";
		msg[3]=[];
		msg[3][0]="Essas categorias e regras podem ser alteradas a qualquer momento por você e possuem agrupadores para facilitar seu acesso";
		msg[4]=[];
		msg[4][0]="Segundo, Você tem acesso ao seu banco pela internet? você pode incluir seus lançamentos manualmente ou importá-los de seu banco. Para isso, exporte seu extrato em formato ofx e clique <a href='javascript:$(\"[type=file]\")[0].click();'>aqui</a> para importa-los";
		msg[5]=[];
		msg[5][0]="Se quiser saber mais detalhes, pode clicar no botão de interrogação, ok?";
	    msg[6]=[];
        msg[6][0]="Agora, estamos incluindo algumas regras e categorias para você!";	
		
		$("#btn_boasvindas").attr("item", (item+1));

      
             $("#msg_boasvindas").html(msg[item][0]);        
             if (msg[item][1]){$("#msg_boasvindas").css('font-size',msg[item][1]);} 

            
         
             
      
	
		$("#btn_boasvindas").html("próximo");

	}



        
</script>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color: white;font-size: 57px;text-shadow: 2px 4px 4px black;">
			<div id="msg_boasvindas">
				Oi tudo bem? Está pronto para começar?
			</div>
       
			<button class="btn btn-success btn-lg" item="0" id="btn_boasvindas" onclick="boasVindas()" style="float: right;">
				Claro!
			</button>
    </div>
  </div>
</div>




</html>