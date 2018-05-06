//pour attendre que tous les objets soient chargés
$(document).ready(function(){

     //$(".navbar-toggler").collapse();
     //$(".dropdown-toggle").dropdown();



          //pour pouvoir utiliser regex
          $.validator.addMethod("regex", function (value, element, regexpr) {
            return regexpr.test(value);
        }, "Format non valide.");


    //champs -> identifiants
    $("#form_commande").validate({
        rules: {
            email_maitre: "required",
            nom_maitre: "required",
            prenom_maitre: "required",
            telephone: {
                required: true,
                regex: /^(0)[0-9]{2,3}\/[0-9]{2}\.[0-9]{2}\.[0-9]{2}$/
            },
            adresse_maitre: "required",
            numero_maitre: "required",
            codepostal: {
                required: true,
                min: 1000,
                max: 9999
            },
            ville: "required",
            submitHandler: function (form) {
                form.submit();
            }
        }
    });

    //TRADUCTION DES MESSAGES DE VALIDATION EN FRANÇAIS
    $.extend($.validator.messages, {
        required: "Veuillez renseigner ce champ.",
        email: "Veuillez renseigner un email valide.",
        url: "Url non conforme.",
        date: "Date non valide.",
        number: "Veuillez n'entrer que des chiffres.",
        digits: "Veuillez n'entrer que des chiffres.",
        equalTo: "Les champs ne concordent pas.",
        maxlength: $.validator.format("Entrez au maximum {0} caract&egrave;res."),
        minlength: $.validator.format("Entrez au minimum {0} caract&egrave;res."),
        rangelength: $.validator.format("Votre entrée doit compter entre {0} et {1} caract&egrave;res."),
        range: $.validator.format("Entrez un nombre entre {0} et {1}."),
        max: $.validator.format("Entrez un nombre inférieur ou égal à {0}."),
        min: $.validator.format("Entrz un nombre de minimum {0}."),
        regex: "Format non conforme"
    });

    
});