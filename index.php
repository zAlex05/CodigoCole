<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).on("click","#btn-publicar",()=>{
			const user=$("#pub_usuario").val();
			const desc=$("#pub_descripcion").val();
			const img=$("#pub_imagen").val();
			const est=$("#pub_estado").val();
			$.ajax({
				url:'acciones_publicaciones.php',
				data:{user:user,desc:desc,img:img,est:est},
				type:'POST',
				dataType:'json',
				success:(data)=>{
					console.log(data);
					$("#estado").text(data[0].pub_estado);
					$("#publicacion").text(data[0].pub_descripcion);
					if(data[0].pub_estado=='Alegre'){
						$(".cont_publicacion").removeClass("bg-primary");
						$(".cont_publicacion").removeClass("bg-warning");
						$(".cont_publicacion").addClass("bg-success");
					}
					if(data[0].pub_estado=='Triste'){
						$(".cont_publicacion").removeClass("bg-success");
						$(".cont_publicacion").removeClass("bg-warning");
						$(".cont_publicacion").addClass("bg-primary");
					}
					if(data[0].pub_estado=='Molesto'){
						$(".cont_publicacion").removeClass("bg-success");
						$(".cont_publicacion").addClass("bg-warning");
						$(".cont_publicacion").removeClass("bg-primary");
					}
				},
				error:(desc,estado)=>{},
			})

		 });
	</script>
</head>
<body>
	<h1 class="title title-success"> VN BOOK</h1>
	<div class="container">

	  <div class="row">
	  	<div class="col-md-6">
	  		<input type="text" placeholder="Usuario" class="form-control" id="pub_usuario">
			<textarea id="pub_descripcion" cols="30" rows="2" class="form-control"></textarea>
			<input type="file" id="pub_imagen" class="form-control">	
	  		<select id="pub_estado" class="form-control bg-dark">
			<option value="">Elija una opción</option>
			<option value="Alegre">Alegre</option>
			<option value="Triste">Triste</option>
			<option value="Molesto">Molesto</option>
		</select>
		<div class="d-grid gap-2">
				<button class="btn btn-danger" id="btn-publicar">Publicar</button>
			</div>
	  	</div>

	  	<div class="col-md-6">
	  		<img src="no_imagen.png" width="220px" alt="">
	  	</div>
	  </div>
	  
	  <div class="row">
	  	<div class="col-md-4">
	  		<div class="card cont_publicacion" style="width: 18rem;">
  				<img src="imagen.jpg" class="card-img-top" alt="...">
  			<div class="card-body">
  				<h3 id="estado">Estado</h3>
    		<p class="card-text" id="publicacion">Descripcion</p>
 		 </div>
		</div>


	  	</div>
	  </div>	



	</div>

</body>
</html>