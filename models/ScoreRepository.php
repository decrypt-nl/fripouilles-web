<?php

class ScoreRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->table = 'score';
        $this->connect();
    }

    public function findOne(int $id): array
    {
        $sql = 'SELECT s.*, u.name AS username FROM score AS s INNER JOIN user AS u ON s.user_id = u.id WHERE s.id = :id';
        /** @var PDOStatement */
        $q = $this->pdo->prepare($sql);
        $q->bindParam('id', $id, PDO::PARAM_INT);
        $q->execute();
        
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function findAll(): array
    {
        $sql = 'SELECT s.*, u.name AS user_name FROM score AS s INNER JOIN user AS u ON s.user_id = u.id';
        /** @var PDOStatement */
        $q = $this->pdo->prepare($sql);
        $q->execute();

        return $q->fetchAll(PDO::FETCH_ASSOC);
    }
}
