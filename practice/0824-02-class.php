<?php

//講義17頁
//class類別名稱
class Person {
    public $name;
    public $age;
    //public定義可公開使用的屬性  //private定義私有屬性只能在類別裡使用
    // __construct 建立 19頁
    function __construct($name, $age=18)
    {
        $this->name = $name;  //把參數（區域變數）設定到屬性
        $this->age = $age;

    }

    function getJSON(){
        return json_encode([
            'name' => $this->name,
            'age' => $this->age,
        ], JSON_UNESCAPED_UNICODE);
    }
}

$p1 = new Person('Peter');
// new 關鍵字表示建立物件

echo $p1->getJSON();
//php 瘦箭頭-> 可用於存取物件本身的屬性或方法 胖箭頭＝>可用於數組 ex.[key]=>[value]  //等於在js裡面的.   
//php . 表示字串的＋
?>


