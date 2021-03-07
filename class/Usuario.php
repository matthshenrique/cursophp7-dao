<?php

class Usuario
{

    private $idUsuario;
    private $nome;
    private $senha;
    private $dtCadastro;

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro($dtCadastro)
    {
        $this->dtCadastro = $dtCadastro;
    }

    public function __toString()
    {
        return json_encode(array(
            "idUsuario" => $this->getIdUsuario(),
            "nome" => $this->getNome(),
            "senha" => $this->getSenha(),
            "data" => $this->getDtCadastro()->format("d/m/Y H:i:s"),
        ));
    }

    public function loadById($id)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM usuarios WHERE idUsuario = :ID", array(
            ":ID" => $id,
        ));

        if (count($results) > 0) {
            $row = $results[0];

            $this->setIdUsuario($row['idUsuario']);
            $this->setNome($row['nome']);
            $this->setSenha($row['senha']);
            $this->setDtCadastro(new Datetime($row['data']));
        }
    }

    public static function getList()
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM usuarios ORDER BY nome");
    }

    public static function search($Login)
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM usuarios WHERE nome LIKE :SEARCH ORDER BY nome", array(
            ':SEARCH' => "%" . $Login . "%",
        ));
    }

    public function login($usuario, $senha)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM usuarios WHERE nome = :LOGIN AND senha = :PASSWORD", array(
            ":LOGIN"=>$usuario,
            ":PASSWORD"=>$senha
            ));

        if (count($results) > 0) {
            $row = $results[0];

            $this->setIdUsuario($row['idUsuario']);
            $this->setNome($row['nome']);
            $this->setSenha($row['senha']);
            $this->setDtCadastro(new Datetime($row['data']));
        } else {
            throw new exception("Dados Inválidos!");
        }

    }

}
