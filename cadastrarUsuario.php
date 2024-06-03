<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<?php


include './assets/head.php';

?>


<body>

  <div class="grid-container" style="display: grid; align-items: center;   height: 100vh;">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">










        <form action="form_controller.php" enctype="multipart/form-data" method="post">
          <div class="grid-container">

            <div class="grid-x grid-padding-x">

              <div class="small-12 medium-12 large-5 cell  translucent-form-overlay ">

                <div class="grid-x grid-padding-x">



                  <div class="medium-12 cell">
                    <label><h4>Informe seus dados</h4></label>
                  </div>

                </div>




                <div class="grid-x grid-padding-x">



                  <div class="medium-12 cell">
                    <label>Nome
                      <input type="text" placeholder="Digite seu nome" id="txtNome" name="txtNome" require class="textsForms">
                    </label>
                  </div>

                </div>



                <div class="grid-x grid-padding-x">



                  <div class="medium-12 cell">
                    <label>CPF
                      <input type="text" placeholder="Digite seu nome" id="txtCpf" name="txtCpf" require class="textsForms" value="<?= $_GET['cpf'] ?>" readonly>
                    </label>
                  </div>

                </div>


                <div class="grid-x grid-padding-x">

                  <div class="medium-12 cell">
                    <label>Email
                      <input type="text" placeholder="Digite seu email" id="txtEmail" name="txtEmail" require class="textsForms">
                    </label>
                  </div>
                </div>



                <div class="grid-x grid-padding-x">

                  <div class="medium-12 cell">
                    <label>Celular / Whats app
                      <input type="text" placeholder="Digite seu Número de celular" id="txtCelular" name="txtCelular" require class="textsForms">
                    </label>
                  </div>
                </div>

                <div class="grid-x grid-padding-x">

                  <div class="medium-12 cell">
                    <center>
                      <input type="submit" class="button succes" style="border-radius: 10px; color:white; font-weight: bold;" value="Cadastrar  dados Pessoais" />
                    </center>

                  </div>
                </div>


              </div>


              <div class=" small-12 medium-12 large-7 cell" style="display: grid; align-items: center; justify-items: center;">
                <img src="./imgs/logoPl.png" style="width: 50%;" />


              </div>


            </div>

        </form>











      </div>
    </div>
  </div>









  <?php
  // include './assets/footer.php';
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