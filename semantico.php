<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<?php


include './assets/head.php';

?>


<body>


    <body>
        <header>
            <h1>Cursos de programação</h1>
        </header>
        <main>
            <section>

                <article>
                    <div class="grid-x grid-padding-x">


                        <div class="small-12 medium-12 large-12 cell">

                            <div class="grid-container">
                                <fieldset class="fieldset">

                                    <legend>
                                        <h4>Por Favor, nos informe seus dados</h4>
                                    </legend>

                                    <div class="grid-x grid-padding-x">






                                        <div class=" auto cell">
                                        </div>

                                        <div class="small-12 medium-8 large-8 cell">
                                            <div class="grid-x grid-padding-x">


                                                <div class="small-12 medium-12 large-12 cell">
                                                    <label>Qual seu CPF</label>
                                                </div>


                                                <div class="small-12 medium-12 large-12 cell">
                                                    <input class="input-group-field" id="txtCPF" type="text">
                                                </div>
                                            </div>

                                            <div class="grid-x grid-padding-x">


                                                <div class="small-12 medium-12 large-12 cell">
                                                    <label>Digite seu Nome</label>
                                                </div>


                                                <div class="small-12 medium-12 large12 cell">
                                                    <input class="input-group-field" id="txtNome" type="text">
                                                </div>
                                            </div>

                                            <div class="grid-x grid-padding-x">


                                                <div class="small-12 medium-12 large-12 cell">
                                                    <label>E seu Email?</label>
                                                </div>


                                                <div class="small-12 medium-12 large-12 cell">
                                                    <input class="input-group-field" id="txtEMAIL" type="text">
                                                </div>
                                            </div>

                                            <div class="grid-x grid-padding-x">


                                                <div class="small-12 medium-12 large-12 cell">
                                                    <label>Obrigado, seu Celular agora</label>
                                                </div>


                                                <div class="small-12 medium-12 large-12 cell">
                                                    <input class="input-group-field" id="txtCELULAR" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" auto cell">


                                        </div>



                                </fieldset>
                            </div>
                        </div>
                    </div>









            </section>


        </main>
        <footer id="Footer">

            <div class="grid-x grid-padding-x">



                <div class="small-12 medium-12 large-12 cell" style="background-color: #66cc99; height: 15vh;">
                    <div class="grid-container">
                        <div class="grid-x grid-padding-x">
                            <div class="small-12 medium-12 large-6 cell">




                            </div>


                            <div class="small-12 medium-12 large-2 cell">

                            </div>

                            <div class="small-12 medium-12 large-2 cell">

                            </div>

                            <div class="small-12 medium-12 large-2 cell">
                              
                            </div>


                        </div>
                    </div>
                </div>


                <div class="small-12 medium-12 large-12 cell" style="background-color: #5E4947; height: 5vh;">
                    <div class="grid-container">
                        <div class="grid-x grid-padding-x">
                            <div class="small-12 medium-12 large-12 cell"></div>
                        </div>
                    </div>
                </div>






            </div>

        </footer>









    </body>



    <script>
        $(document).ready(function() {



            $('#txtCPF').mask('000.000.000.00', {
                reverse: true
            });


            $('#txtCelular').mask('(00) 00000-0000', {
                reverse: false
            });

            //txtCelular


        })
    </script>

</html>