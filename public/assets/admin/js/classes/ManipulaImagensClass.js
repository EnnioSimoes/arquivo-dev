
var ManipulaImagensClass = (function () {
    function ManipulaImagens() {
        this.imageLoader = '';
        this.canvas = '';
        this.ctx = '';
    }
    
    ManipulaImagens.prototype = {
        iniciar: function () {
            var obj = this;

            obj.acoes();
        },
        
        acoes: function () {
            var obj = this;

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

            obj.imageLoader = document.getElementById('imageLoader');
            obj.imageLoader.addEventListener('change', function(e) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $('#imageCanvas').removeClass('hidden');
                    var img = new Image();
                    img.src = event.target.result;
                    img.onload = function(){
                        obj.canvas.width = img.width;
                        obj.canvas.height = img.height;
                        obj.ctx.drawImage(img, 0, 0);
                    }
                };
                reader.readAsDataURL(e.target.files[0]);
            }, false);
            obj.canvas = document.getElementById('imageCanvas');
            obj.ctx = obj.canvas.getContext('2d');
        },
    };
    
    return ManipulaImagens;
})();



imageLoader = {
    addEventListener: function(a, b, c) {
        b();
    },
};
