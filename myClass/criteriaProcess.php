<?php
    require_once("coreClass/myObject.php");
    require_once("./coreClass/userObject.php");
    require_once("./coreClass/connection.php");

    class criteriaProcess{
       function getBasedOnCriteria($table, $dateOfDepartureCriteria, $dateOfReturnCriteria, $packegesCriteria, $priceCriteria)
       {
            $columns=array('*');

            $conditions=array(
                array('key'=>'date_start', 'operator'=>'<=','value'=>"'".$dateOfDepatureCriteria."'",'logic'=>'AND'),
                array('key'=>'date_stop', 'operator'=>'>=','value'=>"'".$dateOfReturnCriteria."'",'logic'=>'AND'),array('key'=>'packet', 'operator'=>'=','value'=>"'".$packegesCriteriaCriteria."'",'logic'=>'AND'), array('key'=>'price', 'operator'=>'=','value'=>"'".$priceCriteria."'",'logic'=>'')
            );

            $conn=new myConnection();
            $data_user=$conn->select($table, $columns, $conditions);
       }
    }
?>