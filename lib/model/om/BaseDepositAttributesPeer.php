<?php


abstract class BaseDepositAttributesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'deposit_attributes';

	
	const CLASS_DEFAULT = 'lib.model.DepositAttributes';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'deposit_attributes.ID';

	
	const PARENT_ID = 'deposit_attributes.PARENT_ID';

	
	const TYPE = 'deposit_attributes.TYPE';

	
	const VALUE = 'deposit_attributes.VALUE';

	
	const SYNC_STATUS = 'deposit_attributes.SYNC_STATUS';

	
	const CREATED_AT = 'deposit_attributes.CREATED_AT';

	
	const UPDATED_AT = 'deposit_attributes.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ParentId', 'Type', 'Value', 'SyncStatus', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (DepositAttributesPeer::ID, DepositAttributesPeer::PARENT_ID, DepositAttributesPeer::TYPE, DepositAttributesPeer::VALUE, DepositAttributesPeer::SYNC_STATUS, DepositAttributesPeer::CREATED_AT, DepositAttributesPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'parent_id', 'type', 'value', 'sync_status', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ParentId' => 1, 'Type' => 2, 'Value' => 3, 'SyncStatus' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, ),
		BasePeer::TYPE_COLNAME => array (DepositAttributesPeer::ID => 0, DepositAttributesPeer::PARENT_ID => 1, DepositAttributesPeer::TYPE => 2, DepositAttributesPeer::VALUE => 3, DepositAttributesPeer::SYNC_STATUS => 4, DepositAttributesPeer::CREATED_AT => 5, DepositAttributesPeer::UPDATED_AT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'parent_id' => 1, 'type' => 2, 'value' => 3, 'sync_status' => 4, 'created_at' => 5, 'updated_at' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/DepositAttributesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.DepositAttributesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DepositAttributesPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(DepositAttributesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DepositAttributesPeer::ID);

		$criteria->addSelectColumn(DepositAttributesPeer::PARENT_ID);

		$criteria->addSelectColumn(DepositAttributesPeer::TYPE);

		$criteria->addSelectColumn(DepositAttributesPeer::VALUE);

		$criteria->addSelectColumn(DepositAttributesPeer::SYNC_STATUS);

		$criteria->addSelectColumn(DepositAttributesPeer::CREATED_AT);

		$criteria->addSelectColumn(DepositAttributesPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(deposit_attributes.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT deposit_attributes.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DepositAttributesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DepositAttributesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DepositAttributesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = DepositAttributesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DepositAttributesPeer::populateObjects(DepositAttributesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DepositAttributesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DepositAttributesPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return DepositAttributesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(DepositAttributesPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DepositAttributesPeer::ID);
			$selectCriteria->add(DepositAttributesPeer::ID, $criteria->remove(DepositAttributesPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(DepositAttributesPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(DepositAttributesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof DepositAttributes) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DepositAttributesPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(DepositAttributes $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DepositAttributesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DepositAttributesPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(DepositAttributesPeer::DATABASE_NAME, DepositAttributesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DepositAttributesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(DepositAttributesPeer::DATABASE_NAME);

		$criteria->add(DepositAttributesPeer::ID, $pk);


		$v = DepositAttributesPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(DepositAttributesPeer::ID, $pks, Criteria::IN);
			$objs = DepositAttributesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDepositAttributesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/DepositAttributesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.DepositAttributesMapBuilder');
}
