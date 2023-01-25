<?php
require_once 'MySql.php';
class People extends MySql{
    public $name;
    public $age;

    public function new_man(){
        if ($this->name && $this->age){
            $this->query("INSERT INTO `people` (`name`, `age`) VALUES ('" .$this->name."', '".$this->age."')");
            if (empty($this->error_list))
                return true;
        }
        else{
            throw new Exception('Отсутствуют данные для создания новой записи');
        }
        return false;
    }

    public function update_man($id){
        if ($this->name && $this->age){
            $this->query("UPDATE `people` SET name='" .$this->name."', age='".$this->age."' WHERE id=$id");
            if (empty($this->error_list))
                return true;
        }
        else{
            throw new Exception('Ошибка');
        }
        return false;
    }

    public static function del_man($id){
        $pepole = new self();
        $pepole->query("DELETE FROM people WHERE `id`=$id");
        if (empty($pepole->error_list)){
            return true;
        }
        else{
            throw new Exception('Ошибка: ' . $pepole->error);
        }

    }

    public static function render_table(){
        $table = new self();
        echo '<table><tbody>';
        $people = $table->query('SELECT * FROM people');
        while ($x = $people->fetch_array()){
            echo '<tr><td>'. $x['name'] .'</td>';
            echo '<td>'. $x['age'] .'</td><td><a href="#" class="update" data-id="'. $x['id'] .'" data-name="'. $x['name'] .'" data-age="'. $x['age'] .'">Изменить</a></td><td><a href="del_man.php?id='. $x['id'] .'">Удалить</a></td></tr>';
        }
        echo '</tbody></table>';

    }

    public static function statistic(){
        $table = new self();
        $stats = $table->query('SELECT SUM(age) as sum, COUNT(age) as count FROM people')->fetch_array();
        echo '<p>Переписано человек: ' . $stats['count'] . '</p>';
        echo '<p>Общий возраст: ' . $stats['sum'] . '</p>';
    }
}