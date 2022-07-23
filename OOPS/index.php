<?php

class Fruit {
    // Properties
    public $name;
    public $color;

    // Methods

    function set_name( $name ) {
        $this->name = $name;
    }

    function get_name() {
        return $this->name;
    }
}

$apple = new Fruit();
$banana = new Fruit();
$apple->set_name( 'Apple' );
$banana->set_name( 'Banana' );

echo $apple->get_name();
echo '<br>';
echo $banana->get_name();
echo '<br>';
?>
<?php

class animals {
    public $name;
    public $sound;

    function set_name( $name ) {
        $this->name = $name;
    }

    function get_name() {
        return $this->name;
    }

}

/*
 instanceof
 */
$dog = new animals();
$dog->set_name( 'cow' );
echo $dog->get_name();
echo '<br>';
var_dump( $dog instanceof animals );

// construct 
class Fruit {
    public $name;
    public $color;

    function __construct( $name ) {
        $this->name = $name;
    }

    function get_name() {
        return $this->name;
    }
}

$apple = new Fruit( 'Apple' );
echo $apple->get_name();
?>

<?php
class Fruit123 {
  public $name;
  public $color;

  function __construct($name) {
    $this->name = $name;
  }
  function __destruct() {
    echo "The fruit is {$this->name}.";
  }
}

$apple1 = new Fruit123("no");
?>