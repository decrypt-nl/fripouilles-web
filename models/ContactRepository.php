<?php

class ContactRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->table = 'contact';
        $this->connect();
    }

    public function insertContact(array $data): bool
    {
        $sql = 'INSERT INTO '.$this->table.'(email, message) VALUES(:email, :message)';

        try{
            /** @var PDOStatement */
            $q = $this->pdo->prepare($sql);
            $q->bindParam(':email', $data['email'], PDO::PARAM_STR);
            $q->bindParam(':message', $data['message'], PDO::PARAM_STR);
            $q->execute();

            return $q->execute();

        }catch(\Throwable $th){
            echo $th->getMessage();
        }
    }
}
