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

      //  include 'assets/layoutTop.php';

        ?>




        <div class="grid-x grid-padding-x">
        
        <div class="large-4 cell">
        </div>
        
        <div class="large-8 cell">

                <div class="translucent-form-overlay">
                    <form>
                        <h3>Search for Properties</h3>
                        <div class="row columns">
                            <label>Keyword
                                <input type="text" name="keyword" placeholder="Any">
                            </label>
                        </div>
                        <div class="row columns">
                            <label>Property Status
                                <select name="status" type="text">
                                    <option>Any</option>
                                    <option value="rent">Rent</option>
                                    <option value="buy">Buy</option>
                                </select>
                            </label>
                        </div>
                        <div class="row columns">
                            <label>Property Type
                                <select name="status" type="text">
                                    <option>Any</option>
                                    <option value="office">Office</option>
                                    <option value="building">Building</option>
                                </select>
                            </label>
                        </div>
                        <div class="row columns">
                            <label>Location
                                <input type="text" name="location" placeholder="Any">
                            </label>
                        </div>
                        <div class="row">
                            <label class="columns small-12">Price</label>
                            <div class="columns small-6">
                                <input type="number" min="0" name="min" placeholder="Min">
                            </div>
                            <div class="columns small-6">
                                <input type="number" min="0" name="max" placeholder="Max">
                            </div>
                        </div>
                        <button type="button" class="primary button expanded search-button">
                            Search
                        </button>
                    </form>
                </div>








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