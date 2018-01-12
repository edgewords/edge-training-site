<?php

/*
 * Utility routines for MYSQL.
 */



class MYSQL_class {

    var $db, $id, $result, $rows, $data, $a_rows;
    var $user, $pass, $host;

    /* Make sure you change the USERNAME and PASSWORD to your name and
     * password for the DB
     */

    function Setup ($user, $pass) {
        $this->user = 'root';
        $this->pass = '';
		$this->host = "127.0.0.1";
    }

    function Connect ($db ){

        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, 'edgew02_demo_1');
		if($this->mysqli->connect_errno) {
            $this->throwError("Unable to connect to MYSQL server: $this->host : '$SERVER_NAME'");
			$this->throwError($this->mysqli->connect_error);
		}
    }
/*
    function SelectDB ($db) {

        if (!@mysql_select_db($db, $this->id))
            MYSQL_ErrorMsg ("Unable to select database: $db");

    }
*/

    # Use this function is the query will return multiple rows.  Use the Fetch
    # routine to loop through those rows.

    function Query ($query) {
		
        if ($this->result = $this->mysqli->query($query)) 

		{
        	$this->rows = $this->result->num_rows;
        	$this->a_rows = $this->result->affected_rows;
		}

		else
            $this->throwError("Unable to perform query: $query");

    }

    # Use this function if the query will only return a
    # single data element.

    function QueryItem ($query) {

        if ($this->result = $this->mysqli->query($query))
		{
        	$this->rows = $this->result->num_rows;
			$this->a_rows = $this->result->affected_rows;

			if ($this->data = $this->result->fetch_array())
				return($this->data[0]);
			else
				$this->throwError("Unable to fetch data from query: $query");
				$this->throwError($this->result->error);
		}
		else 
            $this->throwError("Unable to perform query: $query");

		return "";
		
    }

    # This function is useful if the query will only return a
    # single row.

    function QueryRow ($query) {

        if ($this->result = $this->mysqli->query($query)) {

        	$this->rows = $this->result->num_rows;
        	$this->a_rows = $this->result->affected_rows;

        	if ($this->data = $this->result->fetch_array()) 
        		return($this->data);
            else
				$this->throwError("Unable to fetch data from query: $query");
		}

        else
		    $this->throwError("Unable to perform query: $query");

    }

    function Fetch ($row) {

        if ($this->result->data_seek($this->result, $row)) {
        	if ($this->data = $this->result->fetch_array()) {
				return;
			} else {
				$this->throwError("Unable to fetch row: $row");
			}
		} else {
			$this->throwError("Unable to seek data row: $row");
		}

    }



    function Insert ($query) {

        if ($this->result = $this->mysqli->query($query))
        	$this->a_rows = $this->result->affected_rows;

		else

            $this->throwError("Unable to perform insert: $query");

    }



    function Update ($query) {

        if ($this->result = $this->mysqli->query($query))

        	$this->a_rows = $this->result->affected_rows;

		else 

            $this->throwError("Unable to perform update: $query");

    }



	function Delete ($query) {

        $this->result = $this->mysqli->query($query) or

            $this->throwError("Unable to perform Delete: $query");

        $this->a_rows = $this->result->affected_rows;

    }
	
	function throwError($error) {
		
		echo "<pre>";
			echo "Errors:<br>";
			echo $error;
		echo "</pre>";
		
	}

}

?>

