<?

trait Attributes
{
  protected $_attributes = array();

  public function getAttributes()
  {
    return $this->_attributes;
  }

  public function __isset($offset)
  {
    return isset($this->_attributes[$offset]);
  }

  public function __get($offset)
  {
    return $this->_attributes[$offset]; 
  }
 
  public function __set($offset, $value)
  {
    $this->_attributes[$offset] = $value;
  }
  
  public function __unset($offset)
  {
    unset($this->_attributes[$offset]);
  }
}

class Foo
{
  use Attributes;
}

$foo = new Foo;
var_dump( isset($foo->name) );
$foo->name = 'PHP';
var_dump( isset($foo->name) );
echo $foo->name;
var_dump( $foo );
var_dump( $foo->getAttributes() );

