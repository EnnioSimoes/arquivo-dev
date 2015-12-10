var showMenu = function(){
	var html          = document.querySelector('html');
	var btnMostrar    = document.querySelector('.icone-menu');
	var btnFechar     = document.querySelector('.icone-fechar');

	btnMostrar.addEventListener("click", function(){
		html.classList.add('menu-ativo');
		btnMostrar.classList.add('u-esconder');
	}, true);

	btnFechar.addEventListener("click", function(){
		btnMostrar.classList.remove('u-esconder');
		html.classList.remove('menu-ativo');
	}, true);

	document.addEventListener("click", function(){
		btnMostrar.classList.remove('u-esconder');
		html.classList.remove('menu-ativo');
	}, true);
}
showMenu();