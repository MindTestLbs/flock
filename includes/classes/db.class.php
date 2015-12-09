<?php
/* 
Created Date	:: 3 September,2014
Created By		:: MLS048
Description		:: this class handles all DB related operation functions.  */
class db 
{
	private $host;
	private $user;
	private $pass;
	private $dbname;
	private $dbh;
	private $stmt;
	
	public $dbConnected = false;
	
	//initialize PDO connection
	public function __construct()
	{
		// Set DSN
		global $dbDetails;
		$this->host 	= $dbDetails['hostName'];  //  host name from  config file(config.php)
		$this->user 	= $dbDetails['userName']; //  database user name from config file(config.php)
		$this->pass 	= $dbDetails['userPassword']; // database password from config file(config.php)
		$this->dbname 	= $dbDetails['dbName'];   //  database name from config file(config.php)
		$this->Connect();
	}
	
	//connect to PDO
	public function Connect()
	{
		if(!$this->dbConnected)
		{
			$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
			// Set options
			$options = array(
				PDO::ATTR_PERSISTENT    => true,
				PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
			);
			try
			{
				$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
				# Connection succeeded, set the boolean to true.
				if($this->dbh)
				$this->dbConnected = true;
			}
			catch (PDOException $e)
			{
				# Write into log
				echo $this->ExceptionLog($e->getMessage());
				die();
			}
		}
	}
	
	// prepare PDO statement
	public function prepareStatement($query)
	{
		try
		{
			$this->stmt = $this->dbh->prepare($query); 
		} 
		catch(PDOException $e)
		{
			$this->error = $e->getMessage();
		}
		return $this->stmt;
	}
	
	// prepare and execute PDO statement
	public function prepareConditionStatement($query,$condnValues=array())
	{
		//echo $query;
		//print_r($condnValues);
		try
		{ 
			$this->stmt = $this->dbh->prepare($query); 
			if(count($condnValues)>0)
			{
				$this->stmt->execute($condnValues); 
			}
			else
			{
				$this->stmt->execute();
			}
		} 
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	// prepare and execute PDO statement  and returns whole result set
	public function resultSetAll($query,$condnValues=array())
	{  
		try
		{  
			$this->stmt = $this->dbh->prepare($query); 
			if(count($condnValues)>0)
			{
				$this->stmt->execute($condnValues); 
			}
			else
			{
				$this->stmt->execute(); 
			}

			return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		} 
		catch(PDOException $e)
		{
			$this->error = $e->getMessage();
			echo $this->error ;
		}
	}
	
	// prepare and execute PDO statement  for fetching a single record
	public function resultSetSingle($query,$condnValues=array())
	{ 
		try
		{
			$this->stmt = $this->dbh->prepare($query); 
			if(count($condnValues)>0)
			{
				$this->stmt->execute($condnValues);
			}
			else
			{
				$this->stmt->execute();
			}
			return $this->stmt->fetch(PDO::FETCH_ASSOC);
		} 
		catch(PDOException $e)
		{
			$this->error = $e->getMessage();
		}
	}
	
	// bind values
	public function bind($param, $value, $type = null)
	{ 
		if (is_null($type))
		{
			switch (true) 
			{
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}
	
	
	// prepare statement for insert. parameters passed are : table name, assciative array containing fields and values to be inserted
	
	public function prepareInsertStatement($table, $arFieldsValues)
	{
		$fields	=	array_keys($arFieldsValues);
		$values	=	array_values($arFieldsValues);
				
		$formatedValues	=	array();
		$formatedValues1	=	array();
		foreach($values as $key=>$val)
		{
			if(!is_numeric($val))
			{
				if(strcmp($val,"NOW()") == 0)
					{$vala	=	$val;$valu	= $val; $formatedValues[]	=	$vala; }
				else
					{ $vala	=	"?"; 
					if($fields[$key]=='map_html')
					{
					 $valu	=	trim($val);
					}
					else
					{
					 $valu	=	addslashes(trim($val));
					}
					 $formatedValues[]	=	$vala; $formatedValues1[] = $valu; }
			}
			else
			{
			  $vala	=	"?"; $valu = $val;$formatedValues[]	=	$vala; $formatedValues1[] = $valu;
			}
			
		}
		
		$sql	=	"INSERT INTO ".$table." (";
		$sql	.=	implode(", ",$fields).") ";
		$sql	.=	"VALUES( ";
		$sql	.=	implode(", ",$formatedValues);
		$sql	.=	")";
		$this->prepareConditionStatement($sql,$formatedValues1);
		return $this->dbh->lastInsertId();
	}
	
	/* prepare statement for update. parameters passed are : table name, assciative array containing fields and values to be updated,condition for update, array containing values on conditions */
	function prepareUpdateStatement($table, $arFieldsValues, $strCondition='',$conditionValues)
	{
		$formatedValues	=	array();
		$formatedValues1	=	array();
		foreach($arFieldsValues as $key => $val)
		{
			if(!is_numeric($val))
			{
				if(strcmp($val,"NOW()") == 0)
					{$vala	=	$val;$valu	= $val; $formatedValues[]	=	"$key = $vala"; }
				else
					{ $vala	=	"?"; 
					
					if($key=='map_html')
					{
					 $valu	=	trim($val);
					}
					else
					{
					 $valu	=	addslashes(trim($val));
					}
					$formatedValues[] =	"$key = $vala"; $formatedValues1[] = $valu; }
			}
			else
			{
			  $vala	=	"?"; $valu = $val;$formatedValues[]	=	"$key = $vala"; $formatedValues1[] = $valu;
			}
		}
		foreach($conditionValues as $key2 => $val2)
		{
		   $formatedValues1[]	= addslashes(trim($val2));
		}
		
		$sql	=	"UPDATE ".$table." SET ";
		
		$sql	.=	implode(", ",$formatedValues);
		if($strCondition != "") 
		{
			$sql	.=	" WHERE ".$strCondition;
		}
	//	echo $sql;print_r($formatedValues1);exit;
		$this->prepareConditionStatement($sql,$formatedValues1);
		return $this->getAffectedRows();
	}
		
	/* prepare statement for delete. parameters passed are : table name, condition for update, array containing values on conditions */
	function prepareDeleteStatement($table,$strCondition='',$conditionValues)
	{
		$sql	=	"DELETE FROM ".$table;
		if($strCondition != "") 
		{
			$sql	.=	" WHERE ".$strCondition;
		}
		$this->prepareConditionStatement($sql,$conditionValues);
		return $this->getAffectedRows();
	}
	// get last inserted ID
	public function lastInsertId()
	{
		return $this->dbh->lastInsertId();
	}
	
	// begin a transaction
	public function beginTransaction()
	{
		return $this->dbh->beginTransaction();
	}
	// end d a transaction
	public function endTransaction()
	{
		return $this->dbh->commit();
	}
	
	// cancel  transaction
	public function cancelTransaction()
	{
		return $this->dbh->rollBack();
	}
	
	//returns number of rows affected on select, update or delete
	public function getAffectedRows()
	{
		
		return $this->stmt->rowCount();
	}
	//close a prepare statement
	public function closeStatement()
	{
		$this->stmt->close();
	}
	// escape quotes
	public function quote($string)
	{
		return $this->dbh->quote($string);
	}
	
	// fetching a single record from the provided table with necessary condition
	public function getTableRecordSingle($tableName,$condition,$conditionValue=array())
	{
		$checkQry	=	"SELECT * FROM $tableName WHERE $condition";
		$result 		= 	$this->resultSetSingle($checkQry,$conditionValue); 
		return $result;
	}
	
	// fetching whole result set from the provided table with necessary condition
	public function getTableRecordDetails($tableName,$condition,$conditionValue)
	{
		$checkQry		=	"SELECT * FROM $tableName WHERE $condition";
		$result	 		= 	$this->resultSetAll($checkQry,$conditionValue); 
		return $result;
	}
	
	// fetching a single record from the provided table with necessary condition and return value of required table field	
	public function getTableRecordField($tableName,$condition,$conditionValue=array(),$returnValue)
	{
		$checkQry	=	"SELECT * FROM $tableName WHERE $condition";
		$result 		= 	$this->resultSetSingle($checkQry,$conditionValue); 
		return trim(stripslashes($result[$returnValue]));
	}
	
	public function getTableRecordCount($tableName,$condition,$conditionValues=array())
	{
		$query		=	"SELECT * FROM $tableName WHERE $condition";
		$this->prepareConditionStatement($query,$conditionValues);
		return $this->getAffectedRows();
	}
	
	public function getRequiredFieldsSingle($tableName,$condition,$conditionValue=array(),$requiredFields)
	{
		$checkQry		=	"SELECT $requiredFields FROM $tableName WHERE $condition";
		$result 		= 	$this->resultSetSingle($checkQry,$conditionValue); 
		return $result;
	}
	
	public function getRequiredFieldsAll($tableName,$fieldName,$condition,$conditionValue=array())
	{
		$checkQry		=	"SELECT $fieldName FROM $tableName WHERE $condition";
		$result	 		= 	$this->resultSetAll($checkQry,$conditionValue); 
		return $result;
	}
	
	public function getTableRecordDetailsWithCondition($tableName,$condition,$conditionValue=array(),$orderCondn='',$limitCondn='')
	{
		$checkQry		=	"SELECT * FROM $tableName WHERE $condition ".$orderCondn.' '.$limitCondn;
		$result	 		= 	$this->resultSetAll($checkQry,$conditionValue); 
		return $result;
	}
	
	public function getTableRecordNoCodition($tableName,$orderCondn='',$limitCondn='')
	{
		$checkQry		=	"SELECT * FROM $tableName WHERE 1 ".$orderCondn.' '.$limitCondn;
		$result	 		= 	$this->resultSetAll($checkQry); 
		return $result;
	}
	
	function checkEntryExist($table,$condition,$conditionValues)
	{
		$flag = false;
		$checkQry	=	"SELECT * FROM $table WHERE $condition";
		$this->prepareConditionStatement($checkQry,$conditionValues);
		$numRows = $this->getAffectedRows();
		if($numRows>0) $flag = true;
		return $flag;
	}
	
	public function getSingleFieldDetails($tableName,$fieldName,$condition,$conditionValue)
		{
			$checkQry		=	"SELECT $fieldName FROM $tableName WHERE $condition";
			$result	 		= 	$this->resultSetAll($checkQry,$conditionValue); 
			return $result;
		}
	
	
}
?>