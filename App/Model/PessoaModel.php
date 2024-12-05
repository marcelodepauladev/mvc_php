<?php

class PessoaModel
{
    public $id, $nome, $cpf, $data_nascimento;

    public $rows;

    public function save()
    {
        include "DAO/PessoaDAO.php";

        $dao = new PessoaDAO();

        if(empty($this->id))
        {
            $dao->insert($this);

        }else{
            
            $dao->update($this);
        }
    }

    public function getAllRows()
    {
        include "DAO/PessoaDAO.php";

        $dao = new PessoaDAO();

        $this->rows = $dao->select();
        
    }

    public function getById(int $id)
    {
        include "DAO/PessoaDAO.php";

        $dao = new PessoaDAO();

        $obj = $dao->selectByID($id);

        return ($obj) ? $obj : new PessoaModel();
        //Se $obj for diferente de falso, retorne $obj, senao uma nova pessoa model

        /*if($obj)
        {
           return $obj;
        } else {
            return new PessoaModel();
        }*/

    }

}