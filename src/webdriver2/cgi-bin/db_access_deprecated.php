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
        $this->user = $user;
        $this->pass = $pass;
		$this->host = "localhost";
    }

    function Connect ($db ){
  
        $this->db = $db;
        if ($this->id = @mysql_pconnect($this->host, $this->user, $this->pass)) 
        	$this->selectdb($db);
		else
            MYSQL_ErrorMsg("Unable to connect to MYSQL server: $this->host : '$SERVER_NAME'");
    }


    function SelectDB ($db) {
        if (!@mysql_select_db($db, $this->id))
            MYSQL_ErrorMsg ("Unable to select database: $db");
    }

    # Use this function is the query will return multiple rows.  Use the Fetch
    # routine to loop through those rows.
    function Query ($query) {
        if ($this->result = @mysql_query($query, $this->id)) 
		{
        	$this->rows = @mysql_num_rows($this->result);
        	$this->a_rows = @mysql_affected_rows($this->result);
		}
		else
            MYSQL_ErrorMsg ("Unable to perform query: $query");
    }

    # Use this function if the query will only return a
    # single data element.
    function QueryItem ($query) {
        if ($this->result = @mysql_query($query, $this->id))
		{
        	$this->rows = @mysql_num_rows($this->result);
			$this->a_rows = @mysql_affected_rows($this->result);
			if ($this->data = @mysql_fetch_array($this->result))
				return($this->data[0]);
			else
				MYSQL_ErrorMsg ("Unable to fetch data from query: $query");

		}
		else 
            MYSQL_ErrorMsg ("Unable to perform query: $query");
		
		return "";
		
    }

    # This function is useful if the query will only return a
    # single row.
    function QueryRow ($query) {
        if ($this->result = @mysql_query($query, $this->id))
		{
        	$this->rows = @mysql_num_rows($this->result);
        	$this->a_rows = @mysql_affected_rows($this->result);
        	if ($this->data = @mysql_fetch_array($this->result)) 
        		return($this->data);
            else
				MYSQL_ErrorMsg ("Unable to fetch data from query: $query");
		}
        else
		    MYSQL_ErrorMsg ("Unable to perform query: $query");
    }

    function Fetch ($row) {
        if (@mysql_data_seek($this->result, $row))
		{
        	if ($this->data = @mysql_fetch_array($this->result))
			{
				return;
			}
            else	
				MYSQL_ErrorMsg ("Unable to fetch row: $row");

		}
        else
		    MYSQL_ErrorMsg ("Unable to seek data row: $row");
    }

    function Insert ($query) {
        if ($this->result = @mysql_query($query, $this->id))
        	$this->a_rows = @mysql_affected_rows($this->result);
		else
            MYSQL_ErrorMsg ("Unable to perform insert: $query");
    }

    function Update ($query) {
        if ($this->result = @mysql_query($query, $this->id))
        	$this->a_rows = @mysql_affected_rows($this->result);
		else 
            MYSQL_ErrorMsg ("Unable to perform update: $query");
    }

	function Delete ($query) {
        $this->result = @mysql_query($query, $this->id) or
            MYSQL_ErrorMsg ("Unable to perform Delete: $query");
        $this->a_rows = @mysql_affected_rows($this->result);
    }
}
function MYSQL_ErrorMsg ($msg) {
	echo("</ul></dl></ol>\n");
	echo("</table></script>\n");
   	$errortext  = "<font color=\"#ff0000\" size=+2><p>Error: $msg :";
   	$errortext .= mysql_error();
   	$errortext .= "</font><br>\n";
	die($errortext);
}
?>
