~function(){
var eventUtil = {
	teste:function(){
		console.log("Ola")
	},
	
	addHandler: function(element, type, handler){
		if(element.addEventListener){
			element.addEventListener(type, handler, false);
		} else if(element.attachEvent){
			element.attachEvent("on" + type, handler);
		} else{
			element["on" + type] = handler;
		}
	},

	removeHandler: function(){
		if(element.removeEventListener){
			element.removeEventListener(type, handler, false);
		} else if(element.attachEvent){
			element.attachEvent("on" + type, handler);
		} else{
			element["on" + type] = null;
		}
	},
}
}();