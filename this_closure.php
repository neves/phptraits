<?

class Foo
{
  protected $name = 'foo';

  public function bar($m)
  {
    var_dump($this->name);
    $f = function() {
      var_dump($this);
    };
    $f();
    $m();
  }
}

$foo = new Foo;

$foo->bar(function() { var_dump($this); });

