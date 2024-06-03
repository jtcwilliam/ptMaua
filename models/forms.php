<?php

class Forms
{

    private $nome;

    private $email;

    private $celular;

    private $cpf;

    private $idEixo;
    private $idSubEixo;
    private $resposta;
    private $idFormulario;
    private $idStatus;



    private $conexao;

    function __construct()
    {
        // importar a classe conexao

        require_once(__DIR__.'/db.php');
        //criar uma instancia de conexao;
        $objConectar = new Conexao();

        //chamar o metdo conectar
        $banco = $objConectar->Conectar();

        //criar uma instancia dessa nova conexao
        $this->setConexao($banco);
    }


    public function inserirForms()
    {
        try {

            $sql = " 
            
            INSERT INTO  formulario (nome, cpf, email, celular, status ) VALUES ('" . $this->getNome() . "','" . $this->getCpf() . "','" . $this->getEmail() . "','" . $this->getCelular() . "','1' )";



            $executar = mysqli_query($this->getConexao(), $sql);

            if ($executar == true) {

                return true;
            } else {

                return false;
            }
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }


    public function comboEixo($idEixo)
    {
        $sql = "select    *  from subEixo      where idEixo = " . $idEixo;



        $executar = mysqli_query($this->getConexao(), $sql);

        while ($row = mysqli_fetch_assoc($executar)) {

            $dados[] =  $row;
        }

        return $dados;
    }





    public function carregarExplicacao($idSubEixo)
    {
        $sql = "select    subEixoLongoTexto  from subEixo      where idsubEixo = " . $idSubEixo;





        $executar = mysqli_query($this->getConexao(), $sql);

        while ($row = mysqli_fetch_assoc($executar)) {

            $dados[] =  $row;
        }

        return $dados;
    }



    public function carregarUsuarioFormulario($cpf)
    {
        $sql = "select    *  from formulario      where cpf = '" . $cpf . "'";

        $executar = mysqli_query($this->getConexao(), $sql);

        $dados['retorno'] = false;

        while ($row = mysqli_fetch_assoc($executar)) {

            $dados['retorno'] = true;

            $dados[] =  $row;
        }

        return $dados;
    }


    public function verificarRespondida()
    {
        $sql = "  SELECT * FROM resposta where idEixo = ".$this->getIdEixo()  ." and status = 0";

        $executar = mysqli_query($this->getConexao(), $sql);

        $dados['retorno'] = false;

        while ($row = mysqli_fetch_assoc($executar)) {

            $dados['retorno'] = true;

            $dados[] =  $row;
        }

        return $dados;
    }


    public function inserirResposta()
    {
        try {
            $sql = "INSERT INTO resposta (idEixo, idSubEixo, Resposta, idFormulario, status) 
        VALUES ('" . $this->getIdEixo() . "', '" . $this->getIdSubEixo() . "','" . $this->getResposta() . "', '" . $this->getIdFormulario() . "','0')";

            $executar = mysqli_query($this->getConexao(), $sql);
            if ($executar == true) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }


    public function statusFormUsuario()
    {
        try {
            $sql =  "UPDATE  formulario SET  status = '".$this->getIdStatus() ."' WHERE  idformulario = '".$this->getIdFormulario()."'";
 
          
            $executar = mysqli_query($this->getConexao(), $sql);
            if ($executar == true) {
                return true;
            } else {
                return false;
            }
            
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }




    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getConexao()
    {
        return $this->conexao;
    }

    public function setConexao($conexao)
    {
        $this->conexao = $conexao;

        return $this;
    }

    public function getIdEixo()
    {
        return $this->idEixo;
    }

    public function setIdEixo($idEixo)
    {
        $this->idEixo = $idEixo;

        return $this;
    }

    public function getIdSubEixo()
    {
        return $this->idSubEixo;
    }

    public function setIdSubEixo($idSubEixo)
    {
        $this->idSubEixo = $idSubEixo;

        return $this;
    }

    public function getResposta()
    {
        return $this->resposta;
    }

    public function setResposta($resposta)
    {
        $this->resposta = $resposta;

        return $this;
    }

    public function getIdFormulario()
    {
        return $this->idFormulario;
    }

    public function setIdFormulario($idFormulario)
    {
        $this->idFormulario = $idFormulario;

        return $this;
    }

    public function getIdStatus()
    {
        return $this->idStatus;
    }

    public function setIdStatus($idStatus)
    {
        $this->idStatus = $idStatus;

        return $this;
    }
}
