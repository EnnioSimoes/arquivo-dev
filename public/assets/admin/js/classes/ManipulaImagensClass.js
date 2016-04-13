var ManipulaImagensClass = (function() {
    function ManipulaImagens() {
        // atributos
    }
    
    ManipulaImagens.prototype = {
        iniciar: function() {
            this.acoes();
        },
        
        acoes: function() {
            //Exibe mascara recorte e faz set com valores em inputs hidden
            $('#imageCanvas').imgAreaSelect({
                // var canvas = this;
                // console.log($('#imageCanvas'));
                // canvas.removeClass('hidden');
                onSelectEnd: function (img, selection) {
                    $('input[name="x1"]').val(selection.x1);
                    $('input[name="y1"]').val(selection.y1);
                    $('input[name="x2"]').val(selection.x2);
                    $('input[name="y2"]').val(selection.y2);
                }
            });            
        },
        //Exibe thumb (preview) para recorte
//        handleImage: function(e){
//            
//        }        
    }
    
    return ManipulaImagens;
})();