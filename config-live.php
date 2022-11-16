<?php
date_default_timezone_set("Asia/Calcutta");
class Db
{
    private $host = 'localhost',
    $user = 'lkuecbmy_vfadmin',
    $password = '@naaisYIF147963',
    $database = 'lkuecbmy_voterfestival',
    $con = 0;

    public function __construct()
    {
        $this->con = new mysqli($this->host, $this->user, $this->password, $this->database);
    }

    public function query($sql)
    {
        $pStatement = $this->con->prepare($sql);
        $pStatement->execute();
        $temp = $pStatement->get_result();
        $pStatement->close();
        return $temp;
    }
}