<?php require_once $_SERVER[DOCUMENT_ROOT].'meuporquinho/header.php'; ?>
<?php require_once $_SERVER[DOCUMENT_ROOT].'meuporquinho/menu.php'; ?>

	<div class="content-page">
		<div class="content">
			<div class="container">
				<?php 
				  if(isset($_REQUEST['q'])){
						$pagina=$_REQUEST['q'];
					}else{
						$pagina='home';						
					}
			   	require_once $_SERVER[DOCUMENT_ROOT].'meuporquinho/paginas/'.$pagina.'.php'; 
				
			?>
			</div>
		</div>
	</div>

<?php require_once $_SERVER[DOCUMENT_ROOT].'meuporquinho/footer.php'; ?>