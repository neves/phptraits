<?

// http://simas.posterous.com/new-to-php-54-traits

trait FooBar
{
  function foo()
  {
    var_dump("trait foo");
  }
}

class K
{
  use FooBar {
    FooBar::foo as f;
  }

  function foo()
  {
    $this->f();
    var_dump("K foo");
  }
}


$k = new K;
$k->foo();

