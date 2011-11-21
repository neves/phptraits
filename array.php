<?

$data = [
	'db' => [
		'host' => 'localhost',
		'user' => 'root',
		'passwd' => ''
	],
	'config' => []
];

class Teste
{
	public $config = [
		'extension' => '.php'
	];
}

function teste($db = [])
{
	return $db;
}

echo (new Teste)->config;

print_r(teste(['host' => 'localhost']));