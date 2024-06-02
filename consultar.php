<?php


include 'models/forms.php';
$objForms = new Forms();

if (isset($_POST['verificarCPF__'])) {

    $dadosUsuario = $objForms->carregarUsuarioFormulario($_POST['cpf']);

    

    if ($dadosUsuario['retorno'] == false) {

        echo json_encode(array('retorno' => true));
        die();
    }
}


?>


<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<?php


include './assets/head.php';

?>


<body>

    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell">





                <fieldset class="fieldset">

                    <legend>
                        <h4><B>Por favor informe seus dados </B></h4>
                    </legend>




                    <form>
                        <div class="grid-container">

                            <div class="grid-x grid-padding-x">

                                <div class=" cell auto">
                                </div>
                                <div class="small-12 medium-6 large-6 cell">






                                    <div class="grid-x grid-padding-x">



                                        <div class="medium-12 cell">
                                            <label>CPF
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
                url: 'consultar.php',
                data: formData,
                dataType: 'json',
                encode: true
            })
            .done(function(data) {

                console.log(data);

                if (data.retorno == true) {
                    window.location.href = "cadastrarUsuario.php";
                }


            });
    }
</script>

</html>