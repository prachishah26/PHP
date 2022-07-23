<?php
  class cartoons{
    public $name;
    function __construct($name){
        $this->name  = $name;
    }
    function __destruct(){
        echo $this->name;
    }
  }

  $doreamon = new cartoons(doreamon);
?>  


<!-- multilevel inheritance  -->
<?php
class A {
	public function myage() {
	return  "age is 80\n";
	}
}
class B extends A {
	public function mysonage() {
	return "age is 50\n";
	}
}
class C extends B {
	public function mygrandsonage() {
	return  "age is 20\n";
	   }
        public function myHistory() {
        echo "Class A " .$this->myage();
        echo "Class B ".$this-> mysonage();
        echo "Class C " . $this->mygrandsonage();
        }
}
$obj = new C();
$obj->myHistory();
?>
