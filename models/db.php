<?php

class Conexao
{
    private $success;

    public function Conectar()
    {
        try {



            //Produção
            $host = '193.203.175.91';

            $password = 'Ptmaua_2024_13';
            $db = 'u928319575_bancoFormulari';
            $user = 'u928319575_bdformmaua';



 






            ini_set('default_socket_timeout', 300);

            $con = mysqli_connect($host, $user, $password, $db);

            if (!mysqli_ping($con)) {

                $con = mysqli_connect($host, $user, $password, $db, true);
            }

            mysqli_set_charset($con, "utf8");

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            return $con;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
