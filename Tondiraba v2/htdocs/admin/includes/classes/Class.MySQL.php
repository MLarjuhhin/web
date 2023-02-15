<?php

class MySQL
{
    
    private $link;
    private $dbname;
    private $prefix;
    private $magic_quotes;
    private $mysql;
    
    function __construct($mysql)
    {
        
        $this->mysql = $mysql;
        $this->dbname = $mysql ['db'];
        $this->link = mysqli_connect($mysql ['host'], $mysql ['user'], $mysql ['pass'], $mysql ['db']);
        $this->prefix = '';
        if (!$this->link) {
         //   refreshPage('/405.php');
        }
        $this->Query("SET NAMES 'utf8mb4'");

    }
    

    
    function Query($sql_query, $params = false, $err = false)
    {
        
        $sql_query = str_replace("!prefix!", $this->prefix, $sql_query);
        
        if ($params) {
            if (!empty($params)) {
                foreach ($params as &$v) {
                    $v = $this->quote_smart($v);
                }
            }

            $sql_query = vsprintf(str_replace("?", "%s", $sql_query), $params);
        }
        
        if (!$res = mysqli_query($this->link, $sql_query)) {
            if ($err) {
                return mysqli_errno($this->link);
            }else {
                $this->Err($sql_query, mysqli_error($this->link), mysqli_errno($this->link));
            }
        }
        
        return $res;
    }
    
    function QueryTest($sql_query, $params = false, $err = false)
    {
        
        $sql_query = str_replace("!prefix!", $this->prefix, $sql_query);
        
        if ($params) {
            foreach ($params as &$v) {
                $v = $this->quote_smart($v);
            }
            $sql_query = vsprintf(str_replace("?", "%s", $sql_query), $params);
        }
        

        var_dump($sql_query);

    }
    
    function FQuery($sql_query, $params = false)
    {
               $row = $this->FetchRow($this->Query($sql_query, $params));

        return $row;
    }

    function FetchRow($recordset)
    {
        
        $r = mysqli_fetch_array($recordset, MYSQLI_ASSOC);
        
        return $r;
    }

    
    function AllRows($sql_query, $params = false)
    {
        
        $res = [];

        $recordset = $this->Query($sql_query, $params);
        
        while ($row = $this->FetchRow($recordset)) {
            $res[] = $row;
        }

        return $res;
    }

    
    function Update($table, $data, $opts = "")
    {
        $table = $this->prefix.ltrim($table);
        $fields = '';
        while (list ($fname, $value) = each($data)) {
                $fields .= "`$fname` = ".$this->quote_smart($value).',';
        }
        $fields = rtrim($fields, ',');
        $sql = 'UPDATE '.$table.' SET '.$fields.' '.$opts;
        $res = $this->Query($sql);


        
        return $res;
    }

    
    function Insert($table, $data)
    {

		$table = $this->prefix.ltrim($table);

        $fields = '';
        $values = '';
        foreach ($data as $fname => $value) {
            $fields .= '`'.$fname.'`,';

                $values .= $this->quote_smart($value).',';

        }
        $fields = rtrim($fields, ',');
        $values = rtrim($values, ',');
        $sql = 'INSERT INTO '.$table.' ('.$fields.') values('.$values.')';
        
        //return $sql;
        return $this->Query($sql, []);
    }

    
    function Delete($table, $opts = '')
    {
        $table = $this->prefix.ltrim($table);
        $sql = 'DELETE FROM '.$table.' '.$opts;
        $res = $this->Query($sql);

        return $res;
    }

    
    function getInsertID()
    {
        
        return mysqli_insert_id($this->link);
    }
    
    function getNumRows($res)
    {
        
        return mysqli_num_rows($res);
    }
    
    function getAffectedRows()
    {
        
        return mysqli_affected_rows($this->link);
    }
    
    function Close()
    {
        
        mysqli_close($this->link);
    }
    
    function StartTransaction()
    {
        
        return $this->Query("START TRANSACTION");
    }
    
    function Commit()
    {
        
        return $this->Query("COMMIT");
    }
    
    function RollBack()
    {
        
        //writeLog('Transaction','RollBack on',true);
        return $this->Query("ROLLBACK");
    }
    
    function Reconnect()
    {
        
        mysqli_close($this->link);
        $this->link = mysqli_connect(
            $this->mysql ['host'],
            $this->mysql ['user'],
            $this->mysql ['pass'],
            $this->dbname
        );
    }
    
    function Err($query, $message, $errno)
    {
        
        global $base;
    
        if ($query == 'cannot connect to the database') {
            $_SESSION = [];
            $_SESSION['error'] = 'Сайт временно не доступен, попробуйте позже=(';
        }

        //  CallMIgration::run();
        if (DEBUG) {
            echo('<b>MySQL DB error code '.$errno.'</b><br><font color="red">'.htmlspecialchars(
                    $message
                ).'</font><br>'.$query.'<hr>');
            @file_put_contents(
                $base['log_dir'].'/mysql-error-'.date("Y-m-d").'.log',
                date(
                    "H:i:s"
                )."::".(isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : "")."::".$message."::".$query."::".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."\n",
                FILE_APPEND
            );
            
            $msg = explode("'", $message);
            

            
        }else {
                   @file_put_contents(
                $base['log_dir'].'/mysql-error-'.date("Y-m-d").'.log',
                date(
                    "H:i:s"
                )."::".(isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : "")."::".$message."::".$query."::".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."\n",
                FILE_APPEND
            );
        }
        //exit ();
    }
    

    
    function quote_smart($value, $kovychki = true)
    {
        
        if ($this->magic_quotes) {
            $value = stripslashes($value);
        }
        
        if (!is_numeric($value)) {
            if ($kovychki) {
                $value = "'".mysqli_real_escape_string($this->link, $value)."'";
            }else {
                $value = mysqli_real_escape_string($this->link, $value);
            }
        }
        
        
        return $value;
    }
    



}

?>