<?php
class Form
{
    // Проверка является ли переданный параметр массивом. Зачем? Чисто чтобы исключение добавить
    private function isArray($form){

        if( !is_array($form) ){
            throw new Exception("Переданые параметры не является массивом");
        }
        return true;

    }

    // Создание аттрибутов для добавления в html теги
    private function parametr($attributes = []){
        $param = '';
        if( !empty($attributes) && $this->isArray($attributes) ){
            foreach ($attributes as $key => $val){
                $param .= $key . "='{$val}' ";
            }
        }
        return $param;
    }

    // Создание формы
    public static function Begin($attributes){
        $form = new self();
        $param = "<form ". $form->parametr($attributes) ." >\n";
        echo $param;
        return $form;
    }

    // Добавление поля в форму
    public function input ($attributes, $label = false, $required = false){
        $this->isArray($attributes);

        $param = "<div>\n   ";
        if ($label) $param .= '<label>'. $label;
        $param .= "<input ". $this->parametr($attributes) . ($required ? 'required' : '') ." />\n";
        if ($label) $param .= '</label>';
        $param .= "</div>\n";

        return $param;
    }

    // Добавление кнопки в форму
    public function submit ($attributes = []){

        $this->isArray($attributes);

        $attributes['type'] = 'submit';

        return $this->input($attributes);
    }

    // Закрытие формы
    public static function end(){
        echo "</form>\n";
    }
}