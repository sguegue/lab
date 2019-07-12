<!DOCTYPE html>
<html>
<head>
	<title>Parcial 2</title>
	<link rel="stylesheet" type="text/css" href="./styles.css">
</head>
<body>
	<div id="general">
		<div id="header" class="header"></div>
		<div id="cp" class="cp"></div>
		<div id="body" class="body"></div>
	</div>
</body>

<script src="./jquery.js"></script>
<script src="./jquery2.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var objCP = document.getElementById('cp');
		// obtengo body
		var objBody = document.getElementById('body');
		// creo tabla
		var objTabla = document.createElement('table');
		var objCargar= document.createElement('button');
		objCargar.innerHTML='Cargar';
		objCargar.setAttribute("id","cargar");
		objCP.appendChild(objCargar);
		objCargar.setAttribute("class","btn");
		
		var objBuscar= document.createElement('button');
		objBuscar.innerHTML='Buscar';
		objBuscar.id='buscar';
		objBuscar.class='btn';
		objCP.appendChild(objBuscar);
		objBuscar.setAttribute("class","btn");
		var objAlta= document.createElement('button');

		objAlta.innerHTML='Alta';
		objAlta.id='alta';
		objAlta.class='btn';
		objCP.appendChild(objAlta);
		objAlta.setAttribute("class","btn");
		objAlta.onclick=function(){
			location.href = "./alta.php";
		}

		var objBorrar= document.createElement('button');
		objBorrar.innerHTML='Borrar';
		objBorrar.class='btn';
		objBorrar.id='borrar_filtro';
		objBorrar.setAttribute("class","btn");
		objCP.appendChild(objBorrar);
		objBorrar.onclick=function(){
			
		}

		var objInpB= document.createElement('input');
		objInpB.id='busca';
		objInpB.name='busca';
		objInpB.placeholder="Buscar...";
		objCP.appendChild(objInpB);

		function obtenerDatos(){
			$.ajax({
				url:"data.php",
				type:"post",
				success:function(data){
					$("#body").html(data);
				}
			})
		}

		$(document).on('click', '#cargar', function(){
			obtenerDatos();
		});

		$(document).on('click', '#borrar_filtro', function(){
			obtenerDatos();
		});

		$(document).on('click', '#modif', function(){
			var id = $(this).data("id");
			$.ajax({
				url:"modif.php",
				type:"post",
				data:{id:id},
				success:function(data){
					obtenerDatos();
				}
			})
		});

		$(document).on('click', '#baja', function(){
			if (confirm("Estas seguro de elimar este registro?")) {
				var id = $(this).data("id");
				$.ajax({
					url:"baja.php",
					type:"post",
					data:{id:id},
					success:function(data){
						obtenerDatos();
					}
				});
			}
		});
		

	});


</script>
</html>