<?

trait Singleton
{
  protected static $_singleton_instance = null;

  public static function getInstance()
  {
    if ( ! self::$_singleton_instance )
    { 
      $class = get_called_class(); 
      self::$_singleton_instance = new $class;
    }
    return self::$_singleton_instance;
  }
}

class FooBar
{
  use Singleton;
}

$a = FooBar::getInstance();
$b = FooBar::getInstance();

var_dump($a === $b);
