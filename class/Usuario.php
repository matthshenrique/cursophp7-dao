<?php

class Usuario {

    private $idUsuario;
    private $nome;
    private $senha;
    private $dtCadastro;

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getDtCadastro(){
        return $this->dtCadastro;
    }

    public function setDtCadastro($dtCadastro) {
        $this->dtCadastro = $dtCadastro;
    }

    public function __toString() {
        return json_encode(array(
            "idUsuario"=>$this->getIdUsuario(),
            "nome"=>$this->getNome(),
            "senha"=>$this->getSenha(),
            "data"=>$this->getDtCadastro()->format("d/m/Y H:i:s")
        ));
    }

    public function loadById($id) {
        $sql = New Sql();

        $results = $sql->select("SELECT * FROM usuarios WHERE idUsuario = :ID",array(
            ":ID" => $id
        ));

        If (count($results) > 0) {
            $row = $results[0];

            $this->setIdUsuario($row['idUsuario']);
            $this->setNome($row['nome']);
            $this->setSenha($row['senha']);
            $this->setDtCadastro(new Datetime( $row['data']));
        }




    }






}
