<?php
// this loads after db_objects but before mysqli loader!
class db extends error_logging
{
    protected $dbHost = "localhost";
    protected $dbName = "test";
    protected $dbUser = "root";
    protected $dbPass = "";
}
?>
