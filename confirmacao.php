<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<?php


include './assets/head.php';

?>


<body>

  <div class="grid-container">
    <div class="grid-x grid-padding-x" style="display: grid; align-items: center; justify-items: center; height: 100vh;">

      <div class="large-12 cell">
        <center>
          <img src="imgs/logoPL.png" style="height: 14vh;" />
          
          <h5 style="padding-top: 60px; font-weight: 700;">Obrigado por sua participação!<br> Sua Opinião é extremamente importante  fará a diferença!</h5>
          
        </center>


      </div>
      <div class="large-12 cell">

        <center>
       
        </center>
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