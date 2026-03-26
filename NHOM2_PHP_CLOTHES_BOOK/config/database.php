<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'crossover.proxy.rlwy.net',
	'port' => 13776,
    'database' => 'railway',
    'username' => 'root',
    'password' => 'UeWdNnfPmhWmgzYlArlkZSsaWTLJuLwp',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '2121110226_',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
