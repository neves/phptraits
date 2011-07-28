<?

trait PropertyArrayAccess
{
  public function offsetExists($offset)
  {
    return isset($this->$offset);
  }

  public function offsetGet($offset)
  {
    return $this->$offset; 
  }
 
  public function offsetSet($offset, $value)
  {
    $this->$offset = $value;
  }
  
  public function offsetUnset($offset)
  {
    unset($this->$offset);
  }
}

class Foo implements ArrayAccess
{
  use PropertyArrayAccess;
}

$foo = new Foo;
var_dump( isset($foo['name']) );
$foo['name'] = 'PHP';
var_dump( isset($foo['name']) );
echo $foo['name'];


