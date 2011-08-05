<?

class ProductsController
{
  static function index()
  {
    return "ProductsController::index()";
  }

  function show()
  {
    return '$this->show()';
  }
}

$routes = array();

$routes['/'] = function() {
  return 'home';
};

$routes['/products'] = array('ProductsController', 'index');
$routes['/products/show'] = array(new ProductsController, 'show');

foreach($routes as $path => $callable):
  echo $path . " => " . $callable() . "\n";
endforeach;

