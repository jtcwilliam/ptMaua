<?php



include 'models/forms.php';

$objSubEixo = new Forms();

 

$dado = $objSubEixo->carregarExplicacao($_POST['idSubEixo']);

echo $dado[0]['subEixoLongoTexto'];
