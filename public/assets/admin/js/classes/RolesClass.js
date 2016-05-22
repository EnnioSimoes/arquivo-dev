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
                    if($(value).is(':checked')) {
                        permissions[key] = $(value).attr("data-permission-id");
                    }
                });

                $.ajax({
                    url: "ajax-store/",
                    data: {
                        role_id: data_role_id,
                        permission_id: permissions
                    },
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(retorno) {
                        console.log(retorno);
                        // Fazer isso funcionar
                        $(document).ajaxStart(function() { Pace.restart(); })

                    },
                    complete: function() {
                    }
                });

            });
        }
    }
    return Roles;
})();
