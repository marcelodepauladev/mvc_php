<?php

class PessoaDAO
{

    private $conexao;

    public function __construct()
    {
        //DataSourceName
        $dsn = "mysql:host=localhost:3306;dbname=db_mvc";

        $this->conexao = new PDO($dsn,"root","@Mae97095452");
    }

    public function insert(PessoaModel $model)
    {
        $sql = "INSERT INTO pessoa (nome, cpf, data_nascimento) VALUES (?, ?, ?)";

        //prepare vai receber o sql
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->data_nascimento);

        $stmt->execute();
    }

    public function update(PessoaModel $model)
    {
        $sql = "UPDATE pessoa set nome=?, cpf=?, data_nascimento=? WHERE id=?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->data_nascimento);

        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM pessoa ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        //fetchAll vai retornar todas as linhas
        return $stmt->fetchAll(PDO::FETCH_CLASS);
        //Fetch_class vai organizar o retorno dos registro em um array de objetos
    }

    public function selectByID(int $id)
    {
        include_once "Model/PessoaModel.php";

        $sql = "SELECT * FROM pessoa WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        //Vai entregar um objeto montadinho
        return $stmt->fetchObject("PessoaModel");
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM pessoa WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

}