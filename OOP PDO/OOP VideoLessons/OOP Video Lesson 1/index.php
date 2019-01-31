<?php

class Girl
{
    public $hair_color = 'dark brown';
    public $hair_color_after_salon;
    private $age = 19;
    protected $birthday = '25.12.1999';
    private $name = 'Boo';
    private $haircut;

    public function getHairColor()
    {
        return $this->hair_color;
    }

    public function getAge()
    {
        return $this->age;
    }

    // vorde uzum es gri :D meka construct-y demica ashxatelu , destruct-nel verjic
    public function __construct()
    {

        echo '<hr> !!! Construct !!! <hr>';
    }

    public function __destruct()
    {
        echo '<hr>!!! Destruct !!! <hr>';
    }

    // vorde uzum es gri :D meka construct-y demica ashxately , destruct-nel verjic


    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setHairColor($color)
    {
        return $this->hair_color = $color;
    }

    public function __get($var)
    {
        echo $this->name;
    }

    public function __set($var, $value)
    {
        $this->$var = $value;
    }

}

$object = new Girl();

echo $object->hair_color . '<br>';
echo $object->hair_color_after_salon = 'burentte' . '<br>';
echo $object->getHairColor() . '<br>';
echo $object->getAge() . '<br>';
echo $object->getBirthday() . '<br>';
$object->setHairColor('blonde');
echo $object->hair_color . '<br>';
echo $object->name . '<br>';
echo $object->haircut = 'short' . '<br>';

?>