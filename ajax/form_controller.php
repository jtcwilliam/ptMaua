<?php

include '../models/forms.php';
$objForms = new Forms();




 

$nome = $_REQUEST['txtNome'];

$email = $_REQUEST['txtEmail'];

$celular = $_REQUEST['txtCelular'];

$cpf = $_REQUEST['txtCpf'];


$objForms->setNome($nome);
$objForms->setEmail($email);
$objForms->setCelular($celular);
$objForms->setCpf($cpf);



if($objForms->inserirForms() == true){
    echo  'Agora que você está registrado, gostariamos de receber suas opniões';
}
