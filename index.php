<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'models/forms.php';
$objForms = new Forms();

if (isset($_POST['verificarCPF__'])) {

    $dadosUsuario = $objForms->carregarUsuarioFormulario($_POST['cpf']);



    if ($dadosUsuario['retorno'] == false) {

        echo json_encode(array('retorno' => true, 'cpf' => $_POST['cpf']));
        die();
    } else {
        echo json_encode(array('retorno' => false));
        die();
    }
}


?>


<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<?php


include './assets/head.php';

?>


<body style="background-color: #ececec;">

    <div class="grid-container">


        <?php

                include 'assets/layoutTop.php';

        ?>


   

        <div class="grid-x grid-padding-x">
            <div class="large-12 cell">





                <fieldset class="fieldset">





                    <form>
                        <div class="grid-container">

                            <div class="grid-x grid-padding-x">

                                <div class=" cell auto">
                                </div>
                                <div class="small-12 medium-6 large-6 cell">






                                    <div class="grid-x grid-padding-x">



                                        <div class="medium-12 cell">
                                            <label>Para iniciar, por favor, informe seu CPF
                                                <input type="text" placeholder="Digite seu nome" id="txtCpf" name="txtCpf" require class="textsForms">
                                            </label>
                                        </div>

                                    </div>


                                    <div class="grid-x grid-padding-x">

                                        <div class="medium-12 cell">
                                            <center>
                                                <a onclick="verificarCPF()" class="button succes" style="border-radius: 10px;">Vamos verificar seu acesso</a>
                                            </center>

                                        </div>
                                    </div>
                                </div>
                                <div class=" cell auto">
                                </div>
                            </div>
                    </form>

                </fieldset>

            </div>
        </div>
    </div>

    <?php
    include './assets/footer.php';
    ?>

</body>

<script>
    $(document).ready(function() {



        $('#txtCpf').mask('000.000.000.00', {
            reverse: true
        });


        $('#txtCelular').mask('(00) 00000-0000', {
            reverse: false
        });

        //txtCelular


    })

    function verificarCPF() {
        var formData = {
            cpf: $('#txtCpf').val(),
            verificarCPF__: '1'
        };
        $.ajax({
                type: 'POST',
                url: 'index.php',
                data: formData,
                dataType: 'json',
                encode: true
            })
            .done(function(data) {

                console.log(data);

                if (data.retorno == true) {
                    window.location.href = "cadastrarUsuario.php?cpf=" + data.cpf;
                } else {
                    alert('Olá. Sua Participação ja foi registrada');
                }


            });
    }
</script>

</html>