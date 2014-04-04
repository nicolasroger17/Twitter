<?php
class Cassandra{

	function __construct(){
		require_once(__DIR__.'/../lib/autoload.php');
		use phpcassa\Connection\ConnectionPool;
		use phpcassa\ColumnFamily;
		use phpcassa\SystemManager;
		use phpcassa\Schema\StrategyClass;

		// Create a new keyspace and column family
		$sys = new SystemManager('89.156.6.211:9160');
		$sys->create_keyspace('twitter', array(
		    "strategy_class" => StrategyClass::SIMPLE_STRATEGY,
		    "strategy_options" => array('replication_factor' => '1')));
		$sys->create_column_family('tweets', 'Nicolas');

		$pool = new ConnectionPool('twitter', array('89.156.6.211:9160'));
	}
	
}
?>