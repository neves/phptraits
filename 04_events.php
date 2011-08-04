<?

trait EventDispatcher
{
  protected $_event_listeners = array();

  public function addEventListener($event_name, $callable)
  {
    if ( ! is_callable($callable) || is_scalar($callable))
      throw new InvalidArgumentException("$callable is not callable.");
    $this->getEventListener($event_name)->attach($callable);
  }

  public function removeEventListener($event_name, $callable)
  {
    $this->getEventListener($event_name)->detach($callable);
  }

  public function notify($event_name, $data = array())
  {
    foreach($this->getEventListener($event_name) as $listener)
      call_user_func($listener, $data);
  }

  public function getEventListener($event_name)
  {
    if ( ! isset($this->_event_listeners[$event_name]) )
      $this->_event_listeners[$event_name] = new SplObjectStorage();
    return $this->_event_listeners[$event_name];
  }
}

class Foo
{
  use EventDispatcher;
}


$foo = new Foo;

$f = function($data) {
  var_dump($data);
};

$foo->addEventListener('bar', $f);

$foo->notify('bar', array('a' => 'b'));
$foo->notify('none');

$foo->removeEventListener('bar', $f);
$foo->notify('bar');

$foo->addEventListener('bar', 'count');

