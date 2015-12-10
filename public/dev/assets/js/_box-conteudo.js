var estiloBox = (function () {

	var posts = document.querySelectorAll(".post");
	
	function posLeft(indice){
		var contador = 0;
		for(var i = 0; i < posts.length; i++){
			
			posts[i].style.left = contador*25+"%";
			
			contador++

			if(contador > 3){
				contador = 0;
			} 
		}
	}

	// fn (indice do elemento corrente, quantos elementos voltar)
	function posTop(indAtual, indAnterior){
		if(indAtual >= indAnterior){
			elemCurr = posts[indAtual];
			elemPrev = posts[indAtual-indAnterior];
			elemCurr.style.top = elemPrev.offsetHeight+29+"px";
		}
		if(indAtual >= indAnterior*2){
			elemCurr.style.top = parseInt(elemPrev.offsetHeight)+parseInt(elemPrev.style.top)+29+"px"
		}
	}

	for (var i = 0; i < posts.length; i++) {
			posTop(i, 4);
	}
	function actionInElement(){
		posLeft();
		posTop();
	}
	
	actionInElement();
}());