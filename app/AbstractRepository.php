<?php

abstract class AbstractRepository
{
    private $dsn  = 'mysql:host=172.23.10.51;dbname=fripouilles';
    private $user = 'phpmyadmin';
    private $pwd  = '';

    protected $pdo = null;

    public $table = '';

    public function connect(): void
    {
        try {
            $this->pdo = null;
            $this->pdo = new PDO($this->dsn, $this->user, $this->pwd);
        } catch (PDOException $e) {
            echo 'Echec de la connexion: '.$e->getMessage();
            exit();
        }
    }

    public function findOne(int $id): array
    {
        $sql = 'SELECT * FROM '.$this->table.' WHERE id = :id';
        /** @var PDOStatement */
        $q = $this->pdo->prepare($sql);
        $q->bindParam('id', $id, PDO::PARAM_INT);
        $q->execute();
        
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function findAll(): array
    {
        $sql = 'SELECT * FROM '.$this->table;
        /** @var PDOStatement */
        $q = $this->pdo->prepare($sql);
        $q->execute();

        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): bool
    {
        $sql = ('DELETE FROM '.$this->table.' WHERE id = :id');
        /** @var PDOStatement */
        $q = $this->pdo->prepare($sql);
        $q->bindParam('id', $id, PDO::PARAM_INT);
        
        return $q->execute();
    }
}
