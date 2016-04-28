
var ManipulaImagensClass = (function () {
    "use strict";
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
                    if(selection.height == 0 || selection.width == 0) {
                        $('input[name="x1"]').val('');
                        $('input[name="y1"]').val('');
                        $('input[name="x2"]').val('');
                        $('input[name="y2"]').val('');
                    } else {
                        $('input[name="x1"]').val(selection.x1);
                        $('input[name="y1"]').val(selection.y1);
                        $('input[name="x2"]').val(selection.x2);
                        $('input[name="y2"]').val(selection.y2);
                    }
                }
            });
            // exibe thumb para recorte com limite de tamanho
            obj.imageLoader = document.getElementById('imageLoader');
            obj.imageLoader.addEventListener('change', function (e) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $('#alertCropImage').addClass('hidden')
                    var img = new Image();
                    img.src = event.target.result;
                    if(img.width > 500 || img.height > 500) {
                        $('#alertCropImage').removeClass('hidden').text('A imagem deve ter no máximo 500px x 500px, verifique e tente novamente.');
                    } else {
                        $('#imageAvatar').addClass('hidden');
                        $('#imageCanvas').removeClass('hidden');
                        img.onload = function () {
                            obj.canvas.width = img.width;
                            obj.canvas.height = img.height;
                            obj.ctx.drawImage(img, 0, 0);
                        };
                    }
                };
                reader.readAsDataURL(e.target.files[0]);
            }, false);
            obj.canvas = document.getElementById('imageCanvas');
            obj.ctx = obj.canvas.getContext('2d');
        }
    };

    return ManipulaImagens;
})();
