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







                    <div class="grid-container">

                        <div class="grid-x grid-padding-x">

                            <div class="small-12 medium-12 large-12 cell">


                                <?php

                                include 'models/forms.php';
                                $objForms = new Forms();

                                $nome = $_REQUEST['txtNome'];

                                $email = $_REQUEST['txtEmail'];

                                $celular = $_REQUEST['txtCelular'];

                                $cpf = $_REQUEST['txtCpf'];


                                $objForms->setNome($nome);
                                $objForms->setEmail($email);
                                $objForms->setCelular($celular);
                                $objForms->setCpf($cpf);



                                if ($objForms->inserirForms() == true) {


                                    $dadosUsuario = $objForms->carregarUsuarioFormulario($cpf);

                                    session_start();
                                    $_SESSION['usuario'] = $dadosUsuario;
                                    $_SESSION['eixo1'] = false;
                                    $_SESSION['eixo2'] = false;
                                    $_SESSION['eixo3'] = false;
                                }
                                ?>




                            </div>


                        </div>





                </fieldset>
                <fieldset class="fieldset" style="width: 100%;">
                    <legend>
                        <center>
                            <h3>Escolha Um eixo para registrar sua idéia!</h3>
                        </center>
                    </legend>
                    <center>
                        <a class="button small large-only-expanded" href="respostaForm.php?eixo=1">Proposta para Infraestrutura</a>
                        <a class="button small large-only-expanded" href="respostaForm.php?eixo=2">Proposta para POLÍTICAS PÚBLICAS E CIDADANIA</a>
                        <a class="button small large-only-expanded" href="respostaForm.php?eixo=3">Proposta para TRANSPARÊNCIA E PARTICIPAÇÃO</a>

                    </center>
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
</script>

</html>