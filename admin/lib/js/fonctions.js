//pour attendre que tous les objets soient chargés
$(document).ready(function(){

    //adresse livraison panier
    $('#exampleCheck1').click(function(){
        $('#checkverif').toggle();  
    });

    //recherche client dans la partie admin
    $("#mesChamps").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableClient tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });


    $.validator.setDefaults({
        errorClass: 'help-block',
        highlight: function(element) {
          $(element)
          .closest('.champs-insc')
          .addClass('has-error');
      },
      unhighlight: function(element) {
          $(element)
          .closest('.champs-insc')
          .removeClass('has-error');
      },
      errorPlacement: function (error, element) {
          if (element.prop('type') === 'checkbox') {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

    $.validator.addMethod('strongPassword', function(value, element) {
        return this.optional(element) 
        || value.length >= 6
        && /\d/.test(value)
        && /[a-z]/i.test(value);
    }, 'Votre mot de passe doit contenir au moins 6 caractères et doit contenir au moins un chiffre\'.')

    $("#new_user").validate({
        rules: {
            username: {
                required: true,
                nowhitespace: true,
            },
            email: {
                required: true,
                email: true,

            },
            password: {
                required: true,
                strongPassword: true
            },
            password_confirmation: {
                required: true,
                equalTo: '#password'
            },
            nom: {
                required: true,
                nowhitespace: true,
                lettersonly: true
            },
            prenom: {
                required: true,
                nowhitespace: true,
                lettersonly: true
            },
            adresse: {
                required: true
            },
            ville: {
                required: true,

            },
            code_postal: {
                required: true,
                min: 1000,
                max: 9999

            }
        },
        messages: {
            username: {
                required: 'Ce champ est requis.',
                nowhitespace: 'Le nom d\'utilisateur ne peut pas contenir d\'espace',

            },nom: {
                required: 'Ce champ est requis.',
                lettersonly: 'Veuillez entrer un nom .',
                nowhitespace: 'Le nom ne peut pas contenir d\'espace',
            },
            prenom: {
                required: 'Ce champ est requis.',
                lettersonly: 'Veuillez entrer un prénom .',
                nowhitespace: 'Le pénom ne peut pas contenir d\'espace',
            },
            ville: {
                required: 'Ce champ est requis.',
                lettersonly: 'Veuillez entrer une ville .',
            },
            adresse: {
                required: 'Ce champ est requis.',
                adresse: 'Veuillez entrer une adresse .',
                max: 'Veuillez entrer un code postal valide',
            },
            code_postal: {
                required: 'Ce champ est requis.',
                min: 'Veuillez entrer un code postal valide .',
                max: 'Veuillez entrer un code postal valide .',
            },
            password: {
                required: 'Veuillez entrer un mot de passe.',


            },
            password_confirmation: {
                required: 'Veuillez entrer un mot de passe.',


            },
            email: {
                required: 'Veuillez entrer une adresse email.',
                email: 'Veuillez entrer une adresse email <em>valide</em>.',

            }
        }
    });




    $("#validationpanier").validate({
        rules: {
            adresse: {
                required: true,
                
            },
            codepostal: {
                required: true,
                min: 1000,
                max: 9999

            },
        },
        messages: {
            adresse: {
                required: 'Ce champ est requis.',
                adresse: 'Veuillez entrer une adresse .',
                

            },
            codepostal: {
                required: 'Ce champ est requis.',
                min: 'Veuillez entrer un code postal valide .',
                max: 'Veuillez entrer un code postal valide .',
            },
        }
    });


    $("#formcontact").validate({
        rules: {
            nom: {
                required: true,
                nowhitespace: true,
                lettersonly: true     
            },
            email: {
                required: true,
                email: true

            },
            message: {
                required: true,
                

            },
        },
        messages: {
            nom: {
                required: 'Ce champ est requis.',
                lettersonly: 'Veuillez entrer un nom .',
                nowhitespace: 'Le nom ne peut pas contenir d\'espace',
            },
            email: {
                required: 'Veuillez entrer une adresse email.',
                email: 'Veuillez entrer une adresse email <em>valide</em>.',

            },
            message: {
                required: 'Ce champ est requis.',

            },
        }
    });





    $("td[id]").click(function () {
        var valeur1 = $.trim($(this).text());
        if (/Edge\/\d./i.test(navigator.userAgent)) {
            $(this).addClass("borderInput");
        }

        var ident = $(this).attr("id");
        var name = $(this).attr("name");

        $(this).blur(function () {
            $(this).removeClass("borderInput");
            var valeur2 = $(this).text();
            valeur2 = $.trim(valeur2);

            if (valeur1 != valeur2)
            {
                var parametre = 'champ=' + name + '&id=' + ident + '&nouveau=' + valeur2;
                var retour = $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: "text",
                    url: "../lib/php/ajax/UpdateProduit.php",
                    success: function (data) {
                        console.log("success");
                    }
                });
                retour.fail(function (jqXHR, textStatus, errorThrown) {
                    //alert("Echec retour: " + textStatus + "\nerrorThrown: " + errorThrown);
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                });
            };
        });
    });


















});