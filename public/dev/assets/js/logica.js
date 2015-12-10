	// recuperar
	// recuperar altura
	// numero da posição do elemento
	// numero da posição do elemento 4 posições antes da do atual
	// altura do elemento elemento 4 posições antes da do atual
	// criar um contador do 0 ao 3


	// left é igual ao numero da posição vezes (x) 	largura
	// se a posição for maior que 3 o top é igual a altura do elemento elemento 4 posições antes da do atual




		largura: function(){
		var larguraPost = document.querySelectorAll(".post");
		for(var i = 0; i < larguraPost.length; i++){
			console.log( "largura do elemento " + i + ": "+ larguraPost[i].offsetHeight);
		}
	}