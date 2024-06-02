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
            <h3><B>Olá</B></h3>
          </legend>

          <center><h5>Obrigado por sua participação</h5></center>



      


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