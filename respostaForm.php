<?php

include  './models/forms.php';
$objSubEixo = new Forms();


session_start();





if ($_SESSION['usuario']['0']['status'] == null) {

    header("Location: negado.php");
    die();
}


if (isset($_POST['verificarRespondida'])) {


    $objSubEixo->setIdEixo($_GET['eixo']);
    $respondida =   $objSubEixo->verificarRespondida();



    if ($respondida['retorno'] == false) {
        echo json_encode(array('retorno' => true));
    } else {
        echo json_encode(array('retorno' => false));
    }

    die();
}


switch ($_GET['eixo']) {
    case '1':
        $eixo = 1;
        $labelEixo = "INFRAESTRURA";


        break;

    case '2':
        $eixo = 2;
        $labelEixo = "POLÍTICAS PÚBLICAS E CIDADANIA";


        break;

    case '3':
        $eixo = 3;
        $labelEixo = "TRANSPARÊNCIA E PARTICIPAÇÃO";

        break;

    default:
        # code...
        break;
}



if (isset($_POST['Resposta'])) {






    $objSubEixo->setIdEixo($_POST['eixoForm']);
    $objSubEixo->setResposta($_POST['propostaEscrever']);

    $objSubEixo->setIdSubEixo($_POST['cbSubEixo']);

    $objSubEixo->setIdFormulario($_POST['idFormulario']);
    if ($objSubEixo->inserirResposta()) {


        switch ($_POST['eixoForm']) {
            case 1:
                $_SESSION['eixo1'] = $_POST['eixoForm'];
                break;
            case 2:
                $_SESSION['eixo2'] = $_POST['eixoForm'];
                break;
            case 3:
                $_SESSION['eixo3'] = $_POST['eixoForm'];


                $objSubEixo->setIdStatus('0');
                $objSubEixo->statusFormUsuario();
                $_SESSION['usuario']['0']['status'] = '0';
                break;

            default:


                break;
        }
    }



    echo json_encode(array('retorno' => true, 'eixofinal' => $_POST['eixoForm']));


    die();
}











if (isset($_POST['carregarConteudo'])) {
?>

    <legend>
        <center>
            <h3>Propostas para o Eixo <B><?= $labelEixo ?></B></h3>
        </center>
    </legend>
    <form action="form_controller.php" enctype="multipart/form-data" method="post">
        <div class="grid-container">

            <div class="container">
                <div class="small-12 medium-12 large-12 cell">


                    <div class="small-12 medium-12 large-12 cell">
                        <div class="grid-x grid-padding-x">
                            <div class="medium-12 cell">
                                <label>
                                    <h5><b>Selecione uma Proposta</b></h5>

                                    <input type="hidden" id="eixoForm" value="<?= $eixo ?>" />


                                    <input type="hidden" id="idFormulario" value="<?= $_SESSION['usuario']['0']['idformulario'] ?>" />


                                    <select onchange="carregarExplicacao(this.value)" id="cbSubEixo">
                                        <option value="0">Selecione</option>
                                        <?php



                                        $dadosEixo = $objSubEixo->comboEixo($eixo);
                                        foreach ($dadosEixo as $key => $value) {
                                        ?>
                                            <option value="<?= $dadosEixo[$key]['idsubEixo']; ?>"> <?= $dadosEixo[$key]['subEixoDescricao'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="grid-x grid-padding-x">

                            <div class="medium-12 cell">

                                <div id="explicacao" class="textsForms" style="background-color: rgba(255,255,255,0.4); padding: 20px; font-size: 1.3em;"></div>

                            </div>
                        </div>
                        <div class="grid-x grid-padding-x" style="padding-top: 30px; display: none;" id="caixaProposta">
                            <div class="medium-12 cell">
                                <label>
                                    <h5><b> Escreva sua proposta e idéia</b></h5>
                                </label>
                                <textarea rows="10" id="propostaEscrever"></textarea>
                                </label>
                            </div>
                        </div>

                        <div class="grid-x grid-padding-x">

                            <div class="medium-12 cell">
                                <center>
                                    <a onclick="gravarFormulario()" class="button succes" style="border-radius: 10px;" value="Cadastrar  dados Pessoais">Gravar Resposta</a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
    </form>



<?php

    die();
}



?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<?php


include './assets/head.php';
?>

<body>
    <div class="grid-container" style="display: grid; align-items: center; height: 100vh;">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell">
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

            <div class="grid-x grid-padding-x">


            </div>
            <div class="large-12 cell">


                <fieldset>
                    <div id="conteudo">

                    </div>

                </fieldset>


            </div>
        </div>
    </div>

    <?php
    //  include './assets/footer.php';
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

        $('#caixaProposta').hide();


    })

    $('#caixaProposta').hide();

    function carregarExplicacao(idSubEixo) {

        $('#explicacao').html("<label><h5><b> <center>Aguarde</center>    </b></h5>   </label> ");

        var formData = {
            idSubEixo: idSubEixo
        };
        $.ajax({
                type: 'POST',
                url: 'subEixoController.php',
                data: formData,
                dataType: 'html',
                encode: true
            })
            .done(function(data) {
                if (idSubEixo == 0) {
                    $('#explicacao').html("<label><h5><b> <center>Selecione uma Proposta</center>    </b></h5>   </label> ");
                    $('#caixaProposta').show();
                } else {

                    $('#explicacao').html("<label><h5><b>Explicação</b></h5>   </label> " + data);

                    $('#caixaProposta').show();
                }
            });
    }

    function gravarFormulario() {
        var formData = {
            eixoForm: $('#eixoForm').val(),
            propostaEscrever: $('#propostaEscrever').val(),
            cbSubEixo: $('#cbSubEixo').val(),
            idFormulario: $('#idFormulario').val(),
            Resposta: '1'
        };
        $.ajax({
                type: 'POST',
                url: 'respostaForm.php?eixo=<?= $_GET['eixo'] ?>',
                data: formData,
                dataType: 'json',
                encode: true
            })
            .done(function(data) {

                console.log(data);




                carregarConteudo();




            });
    }


    function carregarConteudo() {
        var formData = {

            carregarConteudo: '1'
        };
        $.ajax({
                type: 'POST',
                url: 'respostaForm.php?eixo=<?= $_GET['eixo'] ?>',
                data: formData,
                dataType: 'html',
                encode: true
            })
            .done(function(data) {

                $('#conteudo').html(data);
            });
    }

    function verificarRespondida() {
        var formData = {

            verificarRespondida: '1'
        };
        $.ajax({
                type: 'POST',
                url: 'respostaForm.php?eixo=<?= $_GET['eixo'] ?>',
                data: formData,
                dataType: 'json',
                encode: true
            })
            .done(function(data) {

                console.log(data);

                switch (<?= $_GET['eixo'] ?>) {
                    case 1:

                        textoForm = 'Infra estrutura';


                        break;
                    case 2:

                        textoForm = 'Politicas Públicas e Cidadania';


                        break;

                    case 3:

                        textoForm = 'Transparência e Participação';


                        break;
                }

                if (data.retorno == false) {
                    alert('Você já respondeu sobre  ' + textoForm + '  ! Por Favor, escolha Outro');
                } else {
                    carregarConteudo();
                }
            });
    }



    verificarRespondida();
</script>



</html>