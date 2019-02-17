<?php
	class myConnection
	{
		var $servername = "localhost";
		var $username = "root";
		var $password = "";
		var $dbname = "db_recommendation_haji";
		var $conn=null;

		function __construct()
		{
			// Create connection
			$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
			// Check connection
			if ($this->conn->connect_error) {
				die("Connection failed: " . $this->conn->connect_error);
			}
		}

		function removeWhiteSpace($text)
		{
			$text = preg_replace('/[\t\n\r\0\x0B]/', '', $text);
			$text = preg_replace('/([\s])\1+/', ' ', $text);
			$text = trim($text);
			return $text;
		}

		function arrayToStringCondition($conditions)
		{
			$sql_where="";
			$logic_operator="";
			foreach($conditions as $condition)
			{
				if($sql_where=="")
				{
					$sql_where=$condition['key']." ".$condition['operator']." ".$condition['value'];
					$logic_operator=$condition['logic'];
				}
				else
				{
					$sql_where=$sql_where." ".$logic_operator." ".$condition['key']." ".$condition['operator']." ".$condition['value'];
					$logic_operator=$condition['logic'];
				}
			}

			return "where ".$this->removeWhiteSpace($sql_where);
		}

		function arrayToStringColumn($columns)
		{
			$sql_column="";
			foreach($columns as $column)
			{
				if($sql_column=="")
				{
					$sql_column=$column;
				}
				else
				{
					$sql_column=$sql_column.", ".$column;
				}
			}

			return $this->removeWhiteSpace($sql_column);
		}

		function  arrayToStringValues($data)
		{
			$sql_values="";
			foreach($data as $row)
			{
				if($sql_values=="")
				{
					$sql_values="values(".$this->arrayToStringColumn($row).")";
				}
				else
				{
					$sql_values=$sql_values.",values(".$this->arrayToStringColumn($row).")";
				}
			}

			return $this->removeWhiteSpace($sql_values);
		}

		function arrayToStringUpdate($data)
		{
			$sql_update="";
			foreach($data as $row)
			{
				if($sql_update=="")
				{
					$sql_update=$row[0]."=".$row[1];
				}
				else
				{
					$sql_update=$sql_update.", ". $row[0]."=".$row[1];
				}
			}

			return $this->removeWhiteSpace($sql_update);
		}

		function errorMessage($class, $method, $sql, $description)
		{
			return "Class: ".$class."<br>Method: ".$method."<br>SQL: ".$sql."<br>Description: ".$description;
		}
		
		function select($table, $columns, $conditions)
		{
			try
			{
				$sql="SELECT ".$this->arrayToStringColumn($columns)." FROM ".$table." ".$this->arrayToStringCondition($conditions).";";
				
				if($raw_data=mysqli_query($this->conn, $sql))
				{
					return $raw_data->fetch_all(MYSQLI_ASSOC);
				}
				else
				{
					return $this->errorMessage(get_class($this), __METHOD__, $sql, mysqli_error($this->conn));
				}
			}
			catch(Exception $e)
			{
				echo 'Message: ' .$e->getMessage();
			}
			//$sql = mysqli_query($this->conn, "SELECT * FROM ".$table_name." where username='$usernamed';");
		}

		function insert($table, $columns, $data)
		{
			try
			{
				$sql="insert tb_kategori(".$this->arrayToStringColumn($columns).") ".$this->arrayToStringValues($data).";";
				if($raw_data=mysqli_query($this->conn, $sql))
				{
					return $conn->insert_id;
				}
				else
				{
					return $this->errorMessage(get_class($this), __METHOD__, $sql, mysqli_error($this->conn));
				}
			}
			catch(Exception $e)
			{
				echo 'Message: ' .$e->getMessage();
			}
		}

		function delete($table, $conditions)
		{
			try
			{
				$sql="DELETE FROM ".$table." ".$this->arrayToStringCondition($conditions).";";

				if($raw_data=mysqli_query($this->conn, $sql))
				{
					return "Delete Successfully";
				}
				else
				{
					return $this->errorMessage(get_class($this), __METHOD__, $sql, mysqli_error($this->conn));
				}
			}
			catch(Exception $e)
			{
				echo 'Message: ' .$e->getMessage();
			}
		}

		function update($table, $data, $conditions)
		{
			try
			{
				$sql="UPDATE ".$table." SET ".$this->arrayToStringUpdate($data)." ".$this->arrayToStringCondition($conditions).";";

				if($raw_data=mysqli_query($this->conn, $sql))
				{
					return "Update Successfully";
				}
				else
				{
					return $this->errorMessage(get_class($this), __METHOD__, $sql, mysqli_error($this->conn));
				}
			}
			catch(Exception $e)
			{
				echo 'Message: ' .$e->getMessage();
			}
		}
	}
?>