<?php
    require_once("coreClass/myObject.php");
    require_once("./coreClass/userObject.php");
    require_once("./coreClass/connection.php");

    class criteriaProcess{
       function getBasedOnCriteria($dateOfDepartureCriteria, $dateOfReturnCriteria, $packegesCriteria, $priceCriteria)
       {
            $columns=array('tb_packet.id', 'DATE(tb_packet.date_start) as date_start', 'DATE(tb_packet.date_end) as date_end', 
            'tb_packet.id_travel', 
            'tb_travel.travel', 'tb_travel.address', 'tb_travel.telp',
            'tb_travel.email', 'tb_travel.description AS travel_description',
            'tb_packet.packet', 'tb_packet.price', 'tb_packet.description AS packet_description', 'tb_packet.type','tb_travel.logo','tb_travel.license', 'tb_travel.rating');

            $table="tb_packet INNER JOIN tb_travel ON tb_packet.id_travel=tb_travel.id";

            $conditions=array(
                array('key'=>'price', 'operator'=>'<=','value'=>"".$priceCriteria."",'logic'=>'AND'),
                array('key'=>'type', 'operator'=>'=','value'=>"'".$packegesCriteria."'",'logic'=>'AND'),
                array('key'=>'DATE(date_start)', 'operator'=>'>=','value'=>"'".$dateOfDepartureCriteria."'",'logic'=>'AND'), 
                array('key'=>'DATE(date_end) ', 'operator'=>'<=','value'=>"'".$dateOfReturnCriteria."'",'logic'=>'')
            );

            $conn=new myConnection();
            $data=$conn->select($table, $columns, $conditions);

            if(count($data)>0)
            {
                $MyObject[0] = new MyObjectInJson();
                $MyObject[0]->ObjectID = 'key';
                $MyObject[0]->ObjectInJson = 1;
                $MyObject[1] = new MyObjectInJson();
                $MyObject[1]->ObjectID = 'message';
                $MyObject[1]->ObjectInJson = '';
                $MyObject[2] = new MyObjectInJson();
                $MyObject[2]->ObjectID = 'data';
                $MyObject[2]->ObjectInJson = $data;
                return $MyObject;
            }
            else
            {
                $MyObject[0] = new MyObjectInJson();
                $MyObject[0]->ObjectID = 'key';
                $MyObject[0]->ObjectInJson = -1;
                $MyObject[1] = new MyObjectInJson();
                $MyObject[1]->ObjectID = 'message';
                $MyObject[1]->ObjectInJson = '-1';
                return  $MyObject;
            }
       }
    }
?>