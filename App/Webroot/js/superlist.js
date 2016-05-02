url = 'http://tenlike.me/';
inscriptionnum = null;


$('#loginbtn').on('click', function(el)
{
    $('input[type=submit]', this).attr('disabled', 'disabled');

    el.preventDefault();
    var username=$('#emaillg').val();
    var password=$("#passwordlg").val();
    var error = false;
    var dataString = 'email='+username+'&password='+password;

    if($.trim(username).length==0)
    {
        $("#emaillg").parent().addClass('animated shake has-error');
        setTimeout(function(){
            $('#emaillg').parent().removeClass('animated shake')}, 2000);
        error=true;
    }
    if($.trim(password).length==0)
    {

        $("#passwordlg").parent().addClass('animated shake has-error');

        setTimeout(function(){
            $('#passwordlg').parent().removeClass('animated shake')}, 2000);
        error=true;
    }


    if(error == false)
    {
        $('#email').parent().removeClass('has-error');
        $('#password').parent().removeClass('has-error');
        $.ajax({
            type: "POST",
            url: url + 'users/connect',
            data: dataString,
            cache: false,
            beforeSend: function(){ $("#login").val('Connecting...');},
            success: function(data){
                if(data =='ok')
                {
                    if(inscriptionnum != null)
                    {
                        $("#login").modal('hide');
                        register(username, "Merci de vous être inscrit pour cette action. Un responsable vous va contacter.");
                        login = true;
                    }
                    else
                    {
                        location.reload();
                    }
                }
                else
                {
                    $("#passwordlg").parent().addClass('has-error');
                    $("#emaillg").parent().addClass('has-error');

                    $('#errorlg').html('Vérifier vos informations de connexion');
                }
            },
            error: function()
            {
                $("#error").removeClass("hidden");
                $("#error").html("Une erreur est survenue au niveau du serveur. Veuillez réessayer");

            }
        });

    }
    $('input[type=submit]', this).removeAttr('disabled');


});

function register(email, text)
{
    dataString = "action="+inscriptionnum+"&user="+email;
    $.ajax({
        type: "POST",
        url: url + 'actions/inscription',
        data: dataString,
        cache: false,
        success: function(data){
           if(data == "ok")
           {
               var btn = $('[data-action_id="'+inscriptionnum+'"]');
               el.replaceWith('<div class="pull-right text-success"><i class="fa fa-check"></i> Vous êtes déjà inscrit</div>');
               el.removeClass('btn-primary');
               el.addClass('btn-info');
               $("#confirmModal").modal('show');
               $("#confirmModal .modal-body").html(text);
           }
            if(data =="already")
            {
                location.reload();
            }
        },
        error: function()
        {
            $("#error").removeClass("hidden");
            $("#error").html("Une erreur est survenue au niveau du serveur. Veuillez réessayer");

        }
    });
    inscriptionnum = null;
}
$('*#deleteBtn').on('click', function(e) {
    $('.deleteModal').modal('show');
    $('.deleteModal #title').html($(this).data('title'));

    $('.deleteModal #btnConfirmDelete').attr('href','/admin/actions/delete/'+$(this).data('id'));
});
$('*#inscrire').on('click', function(e){

    el = $(this);
    el.addClass('disable');
    e.preventDefault();

    $.ajax(url + 'users/isLogged/')
        .done(function(connected){
            inscriptionnum = $(el).data('action_id');
            $('*#registerTitle').html($(el).html() + ' pour '+ $(el).data('titre'));

            if(connected == 'false')
            {
                $('#emailModal').modal('show');
            }
            else
            {
                register(connected);
            }

        })
        .fail(function(j){
            $("#error").removeClass("hidden");
            $("#error").html("Une erreur est survenue au niveau du serveur. Veuillez réessayer").fadeIn();

        })
        .always(function()
        {
            el.removeClass('disable');
        })
});

$("#email").submit(function(element)
{
    element.preventDefault();

    var email = $("#emailCheck");
    var error = false;

    var dataString = 'email='+email.val();

    if($.trim(email.val()).length==0)
    {

        email.parent().addClass('animated shake has-error');

        setTimeout(function(){
            email.parent().removeClass('animated shake')}, 2000);

        error=true;
    }


    if(error == false)
    {
        email.parent().removeClass('has-error');

        $.ajax({
            type: "POST",
            url: url + "users/isKnown",
            data: dataString,
            cache: false,
            success: function(data){
                $('#emailModal').modal('hide');
                $("*#email").val(email.val());

                if(data == 'true')
                {
                    $("#emaillg").val(email.val());
                    $('#login').modal('show');
                }
                else
                {
                    $("#registerModal").modal('show');
                }
            },
            error: function()
            {
                $("#error").removeClass("hidden");
                $("#error").html("Une erreur est survenue au niveau du serveur. Veuillez réessayer");

            }
        });

    }

});

$("#registerMd").submit(function(element)
{
    element.preventDefault();
    $('#btnReg').addClass('disabled');
    var error = true;
    var dataString = "" ;

    $('#registerMd input').each(function(){
        if(this.id != 'btnReg')
            dataString = dataString + "&" + this.id + '=' + $(this).val();
    });
    dataString = dataString.substring(1);

    $.ajax({
        type: "POST",
        url: url + "users/register",
        data: dataString,
        cache: false,
        success: function(data){
            if(data!='ok')
            {
                data = JSON.parse(data);
                $('#registerMd input').each(function(){
                    $('*.form-group').removeClass('has-error').addClass('has-success');
                    $('*#error').html('');
                });
                $.each(data,function(index, value){
                    $("#registerMd #"+index).parent().addClass('has-error');
                    $("#registerMd #"+index +' ~ #error').html(value);
                });
            }
            else
            {
                $('#registerModal').modal('hide');

                if(inscriptionnum != null)
                {
                    register($('#registerMd #email').val(), "<p>Merci de vous être inscrit pour cette action. </p><p>Celle-ci sera effective dès que vous l’aurez confirmée via l'e-mail envoyé dans votre messagerie.</p>");
                }
                else
                {
                    $('#registerConfirmModal').modal('show');
                }
            }

        },
        error: function()
        {
            $("#error").removeClass("hidden");
            $("#error").html("Une erreur est survenue au niveau du serveur. Veuillez réessayer");
        }
    });

    $('#btnReg').removeClass('disabled');

});





$(function () {
    $('*[data-background-image]').each(function() {$(this).css({'background-image': 'url(' + $(this).data('background-image') + ')'});});
    $(".js-select-contact").select2({});
    $(".js-select-tags").select2({tags: true });
    $('#dataAction').DataTable({
        paging: false,
        oLanguage: {
            sSearch: '<i class="fa fa-search"></i> Rechercher',
            emptyTable: "Pas de résultat trouvé"
        },
        bInfo : false
    });
    $('[data-toggle="tooltip"]').tooltip()
    $('#datetimepicker4').datetimepicker({
        locale:'fr',
        sideBySide: true
    });

});

$("#upload").change(function() {
    $("#form").submit();
});