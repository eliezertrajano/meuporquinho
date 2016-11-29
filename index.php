<?php require_once $_SERVER[DOCUMENT_ROOT].'/header.php'; ?>
<?php require_once $_SERVER[DOCUMENT_ROOT].'/menu.php'; ?>

	<div class="content-page">
		<div class="content">
			<div class="container">
				<?php 
				  if(isset($_REQUEST['q'])){
						$pagina=$_REQUEST['q'];
					}else{
						$pagina='home-grafico';						
					}
			   	require_once $_SERVER[DOCUMENT_ROOT].'/paginas/'.$pagina.'.php'; 
				
			?>
			</div>
		</div>
	</div>

<?php require_once $_SERVER[DOCUMENT_ROOT].'/footer.php'; ?>