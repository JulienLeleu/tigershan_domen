<?php
namespace tigershan_domen\data\database;

include_once __DIR__.'\..\..\ConstantsNavigation.php';
use PDO;

/**
 *
 * @author Julien
 *        
 */
class Database extends PDO {

	private static $instance;
	
	/**
	 * Default constructor
	 */
	public function __construct() {
		$properties = simplexml_load_file(DATABASE_FILE_CONFIG);
		$dbInfo = '%s:host=%s;dbname=%s;charset=%s';
		foreach($properties as $property) {
			if (strcmp($property['name'], DATABASE_NODE ) === 0) {
				parent::__construct ( 
						sprintf( 
						$dbInfo, 
						$property->{'database-verbose'}, 
						$property->{'host'},
						$property->{'database-name'},
						$property->{'charset'}),
						$property->{'user'},
						$property->{'password'}
				);
				break;
			}
		}
	}
	
	/**
	 * Gets or create the single instance of PDO
	 */
	public static function getInstance() {
		if (! isset ( self::$instance )) {
			try {
				self::$instance = new Database();
			} catch ( PDOException $e ) {
				echo $e;
			}
		}
		return self::$instance;
	}
}
