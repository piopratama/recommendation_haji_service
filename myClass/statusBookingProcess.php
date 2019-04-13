<?php
    require_once("coreClass/myObject.php");
    require_once("./coreClass/userObject.php");
    require_once("./coreClass/connection.php");

    class statusBookingProcess{
        
        function getStatusBooking($idUser)
        {
            $columns=array('name', 'address', 'telp', 'email', 'tb_user_booking.description as description', 'status');
            $table="tb_user_packet INNER JOIN tb_user_booking ON tb_user_packet.id=tb_user_booking.id_user_packet";
            $conditions=array(
                array('key'=>'id_user', 'operator'=>'=','value'=>"'".$idUser."'",'logic'=>'')
            );

            $conn=new myConnection();
            $data=$conn->select($table, $columns, $conditions);
            //echo json_encode(count($data));
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
