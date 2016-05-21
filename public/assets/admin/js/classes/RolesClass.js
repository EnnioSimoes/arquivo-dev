// Certifique-se que o jQuery foi carregado antes desse arquivo
if (typeof jQuery === "undefined") {
    throw new Error("Este modulo requer jQuery");
}

var RolesClass = (function(){

    function Roles() {
        //
    }

    Roles.prototype = {
        iniciar: function() {
            var Roles = this;

            Roles.acoes();
        },
        acoes: function() {
            $(".act-check-permission-role").off("click").on("click", function() {
                var data_role_id = $(this).attr("data-role-id");
                var data_permission_id = $(this).attr("data-permission-id");
                var click_role_name = $(this).val();
                var elementos = $(".grupo-" + click_role_name);
                var permissions = {};

                $.each(elementos, function(key, value) {
                    permissions[key] = $(value).attr("data-permission-id");
                });

                // ###########
                // CONTINUAR AQUI, JA CONSEGUI PEGAR TODOS data-permission-id DO GRUPO CLICADO, AGORA SÓ VERIFICAR QUAIS FORAM CHECADOS
                // ###########


                // console.dir($(elementos[1]).attr("data-permission-id"));
                console.dir(data_role_id);
                console.dir(data_permission_id);
                console.dir(permissions);

                // $.ajax({
                //     url: "ajax-store/",
                //     data: {
                //         role_id: data_role_id,
                //         permission_id: data_permission_id
                //     },
                //     type: "POST",
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     },
                //     success: function(retorno) {
                //         console.log(retorno);
                //     },
                //     complete: function() {
                //         //
                //     }
                // });

            });
        }
    }

    return Roles;
})();
