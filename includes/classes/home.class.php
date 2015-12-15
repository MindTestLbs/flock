<?php
class home extends db
{
		##-> constructor
		public function __construct()
		{
			parent::__construct(); 
		}

		
		
		public function listPackages()
		{
			$packageArray  = array();
			$conditionVal 	= array(1);
			$packageQry 	= " select * from package_settings where package_status=? order by package_order asc";
			$this->prepareConditionStatement($packageQry,$conditionVal);
			$packageCnt 	= $this->getAffectedRows();
			if($packageCnt>0)
			{
				$packages	 	= 	$this->resultSetAll($packageQry,$conditionVal); 
			}
			
			
			$packageArray['packageCnt']    =  $packageCnt;
			$packageArray['packages'] =  $packages;
			return $packageArray;
		
		}

		 function getuserDet($usrId)
		{
			return $this->getTableRecordSingle('users',"user_id=?",array($usrId));
		}
		
		function getpackageDet($packageId)
		{
			return $this->getTableRecordSingle('package_settings',"package_setting_id=?",array($packageId));
		}
		
		function getPaypaldet()
		{
			return $this->getTableRecordSingle('payment_settings',"payment_settings_id=?",array(1));
		}
		
		function getFullname($usrId)
		{
			$userInfo=$this->getRequiredFieldsSingle('users',"user_id=?",array($usrId),'user_firstname,user_lastname');
			return $userInfo['user_firstname']." ".$userInfo['user_lastname'];
		}
		

		function getCustFieldforauser($userId)
		{
			
			$customFieldArray  = array();
			$conditionVal 	= array($userId);
			$customQry 	= " select * from customfields where customfield_createdby=?";
			$this->prepareConditionStatement($customQry,$conditionVal);
			$customCnt 	= $this->getAffectedRows();
			if($customCnt>0)
			{
				$customFields	 	= 	$this->resultSetAll($customQry,$conditionVal); 
			}
			
			
			$customFieldArray['customCnt']    =  $customCnt;
			$customFieldArray['customFields'] =  $customFields;
			return $customFieldArray;
		}
		
		
		function buildKeywords($field,$condition ='or')
		{
			$additionalQuery = "";
			$additionalQuery = $additionalQuery ." ". $condition." ".$field." LIKE ?";
			return $additionalQuery;
		}
		
		function buildQueryForSeach($fields,$condition ='or') // with default condition or
		{
			$data ="";
				
			$fieldsArray = split(',',$fields);
			$countFields = count($fieldsArray);
			
			if($countFields > 1)
			{
				for($j=0;$j<$countFields;$j++)
				{
					$data = $data . $this->buildKeywords($fieldsArray[$j],$condition);	
				}
			}
			else
			{
				$data = $data . $this->buildKeywords($fieldsArray[0],$condition);	
			}
			if ($condition == "or") $data = substr($data,3); else $data = substr($data,4);
			return $data;
		}
		
		function buildConditionArrayForSearch($fields,$keyword,$condArray)
		{
			$index = count($condArray);
			$fieldsArray = split(',',$fields);
			$totalCount = count($fieldsArray);
			if($totalCount>0)
			{
				for($i=0;$i<$totalCount;$i++)
				{
					$condArray[$index]="%".$keyword."%";
					$index = $index+1;
				}
			}
			return $condArray;
		}
		
		public function getTotalSubscriber($userId)
		{
			$totalSubs=0;
			
			$fetchQry 	= " select * from contact_lists where list_user_id=?";
			$this->prepareConditionStatement($fetchQry,array($userId));
			$customCnt 	= $this->getAffectedRows();
			if($customCnt>0)
			{
				$alllists	 	= 	$this->resultSetAll($fetchQry,array($userId)); 
			}
			
			if($customCnt>0)
			{
				foreach($alllists as $listKey=>$listValue)
				{
					$listId=$listValue['list_id'];
					$fetchQry1 	= " select contactlist_id from contact_subscribers where contactlist_id=?";
					$this->prepareConditionStatement($fetchQry1,array($listId));
					$ct 	= $this->getAffectedRows();
					$totalSubs=$totalSubs+$ct;
				}
			}
			return $totalSubs;
		}

	
}
?>