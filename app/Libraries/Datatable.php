<?php
namespace App\Libraries;
class Datatable 
{	

	function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	//--------------------------------------------

	function LoadJson($SQL,$EXTRA_WHERE='',$GROUP_BY='')

	{
			
		if(!empty($EXTRA_WHERE))

		{

			$SQL.= " WHERE 1 ( $EXTRA_WHERE )";

		}

		

		$query = $this->db->query($SQL);

		$total = $query->getNumRows();

		// pre($_GET);die;

		if(!empty($_GET['search']['value']))
		{

			$qry = array();

			foreach($_GET['columns'] as $cl)

			{

				if($cl['searchable']=='true')

				$qry[] =" ".$cl['name']." like '%".$_GET['search']['value']."%' ";

			}

			$SQL.= " AND ( ";

			$SQL.= implode(" OR",$qry);

			$SQL.= " ) ";	

		}

        //------------------------------------------------

		if(!empty($GROUP_BY))

		{

			$SQL.= $GROUP_BY;

		}

	 	//------------------------------------------------

		$query = $this->db->query($SQL);

		$filtered = $query->getNumRows();



		$SQL.= " ORDER BY ";

		$SQL.= $_GET['columns'][$_GET['order'][0]['column']]['name']." ";

		$SQL.= $_GET['order'][0]['dir'];

		$SQL.= " LIMIT ".$_GET['length']." OFFSET ".$_GET['start']." ";



		$query = $this->db->query($SQL);

		$data = $query->getResultArray();

		

		return array("recordsTotal"=>$total,"recordsFiltered"=>$filtered,'data' => $data);

	}	

}

?>