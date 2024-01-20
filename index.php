<?php 

// Capturando os dados obtidos no Form Post e atualizando o arquivo

//Selecionadno o input com name acão, é armazenado o conteúdo dos POSTS nas respectevias variaveis
if (isset($_POST['acao'])) {
	$texto =  $_POST['texto'];
	$arquivo = $_POST['arquivo'];

	//Função PHP que  buscar o nome do arquivo e preenche com o conteúdo da segunda variavel
	file_put_contents($arquivo, $texto);

	//Mesagemn de sucesso
	echo "<script>alert('Salvo com sucesso');</script>";
}  
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Editor - Listagem de arquivos</title>
		<link rel="stylesheet" type="text/css" href="files/css/estilo.css">
	</head>

	<body>


		<?php 

		//Utilizando a função PHP SCANDIR a partir do diretório files para armezanar os arquivos na variavel $file
		 $files = scandir('files');

		 //Pecorrendo a variavel files e verificando se é um diretório
		 for ($i=0; $i < count($files) ; $i++) { 

		  	if(is_dir($files[$i]))
		  		continue;

		  	//Essa função explode transforma o nome do arquivo lido da variavel Files em um Array. A partir do '.' o primeiro indice desse 
		  	//Array é a extensão, validamos se é extensão que desejamos editar e então imprimos os arquivo compativeis na tela
		  	$file_extension = explode('.', $files[$i]);
		  	if (@$file_extension[1] == 'php' || @$file_extension[1] == 'html' || @$file_extension[1] == 'js') {
		 ?>
		 	<div class="lista-arquivo-single">
		 	<!-- Aqui passamos o arquivo pelo método GET, na URL -->
		 	<p><a href="?file=<?php echo $files[$i]; ?>"><?php echo $files[$i]; ?></a></p>
		 	</div>
		  		
		 <?php 
			
			}
		  	
		  	
		  } 

		  // Validando se foi selecionado GET, passado anterioremente na URL, e validando se esse arquivo existe 
		  if (isset($_GET['file']) && file_exists('files/'.$_GET['file'])) {
		  		

		?>

		<!-- Metodo post, para recuperar posteriormente essas informçaçoes preenchidas e atualizar o arquivo -->
		<form method="post">

			<!-- Pegando o arquivo em questão passadoi na URL e utilizando a função PHP para imprimir na TextArea o conteúdo através do file_get_content -->
			<h2><?php echo 'Editando aquivo: '.$_GET['file']?></h2>
			<textarea name="texto" style="width: 500px; height: 300px;"><?php echo file_get_contents('files/'.$_GET['file']) ?></textarea>
			<br>
			<input type="hidden" name="arquivo" value="<?php echo 'files/'.$_GET['file'] ?>">
			<input type="submit" name="acao" value="Salvar">
		</form>

		<?php 
			}
		?>

	</body>
</html>