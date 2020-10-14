<?php

class ChatManager
{

    private PDO $database;
    private array $cdb;

    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function readDatabase(): string
    {
        $ans = '';
        $sql = $this->database->query("SELECT * FROM tbl_chat");
        $this->cdb = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($this->cdb as $chat) {
            $ans .= $chat['Name'] . ": " . $chat['Msg'] . "<br>";
        }
        return $ans;
    }

    public function writeDatabase(string $Name, string $Msg): void
    {
        $sql = "INSERT INTO tbl_chat (Name, Msg) VALUES (?,?)";
        $stmt= ($this->database)->prepare($sql);
        $stmt->execute([$Name, $Msg]);

    }

    public function deleteDatabase():void
    {

        $sql = ($this->database)->prepare("DELETE FROM tbl_chat");
        $sql->execute();
    }


}