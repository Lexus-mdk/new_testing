<?php
class MySql extends mysqli
{
    private $connect = false;

    function __construct()
    {
        parent::__construct('localhost', 'root', '', 'fortest');

        if ($this->connect_error) {
            throw new Exception('Нет подключения: ' . $this->connect_errno . ' -> ' . $this->connect_error);
        }

        $this->connect = true;
    }

    // Проверка подключения к базе данных. Не использовал, но пусть будет
    public function connected()
    {
        return $this->connect;
    }
}