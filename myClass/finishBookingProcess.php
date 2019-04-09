<?php
    require_once("coreClass/myObject.php");
    require_once("./coreClass/userObject.php");
    require_once("./coreClass/connection.php");

    class finishBookingProcess{
        
        public function insertDataUser($dataUser)
        {
            $columnsUser=array('id', 'id_user','id_packet','description','status_book');

            $conn=new myConnection();
            $userId=$conn->insert("tb_user_packet", $columnsUser, $dataUser);
            $_SESSION['id']=$userId;

            if (filter_var($userId, FILTER_VALIDATE_INT) === 0 || filter_var($userId, FILTER_VALIDATE_INT)) {
                //PIO + 20190127 add last id insert in tb_user ton first index of the array
                //array_unshift($dataUser, $returnVal);
                $MyObject[0] = new MyObjectInJson();
                $MyObject[0]->ObjectID = 'key';
                $MyObject[0]->ObjectInJson = 1;
                $MyObject[1] = new MyObjectInJson();
                $MyObject[1]->ObjectID = 'message';
                $MyObject[1]->ObjectInJson = $userId;
                
            } else {
                $MyObject[0] = new MyObjectInJson();
                $MyObject[0]->ObjectID = 'key';
                $MyObject[0]->ObjectInJson = -1;
                $MyObject[1] = new MyObjectInJson();
                $MyObject[1]->ObjectID = 'message';
                $MyObject[1]->ObjectInJson = "insert failed in tb_userpacket <br> Description : ".$userId;
            }
            return $MyObject;
            
        }

        public function insertDataBooking($dataBooking)
        {
            $columnsBooking=array('id_user_packet','name','address','telp','email','image');

            $conn=new myConnection();
            $returnVal=$conn->insert("tb_user_booking", $columnsBooking, $dataBooking);

            if (filter_var($returnVal, FILTER_VALIDATE_INT) === 0 || filter_var($returnVal, FILTER_VALIDATE_INT)) {
                //PIO + 20190127 add last id insert in tb_user ton first index of the array
                //array_unshift($dataUser, $returnVal);
                $MyObject[0] = new MyObjectInJson();
                $MyObject[0]->ObjectID = 'key';
                $MyObject[0]->ObjectInJson = 1;
                $MyObject[1] = new MyObjectInJson();
                $MyObject[1]->ObjectID = 'message';
                $MyObject[1]->ObjectInJson = $returnVal;
                
            } else {
                $MyObject[0] = new MyObjectInJson();
                $MyObject[0]->ObjectID = 'key';
                $MyObject[0]->ObjectInJson = -1;
                $MyObject[1] = new MyObjectInJson();
                $MyObject[1]->ObjectID = 'message';
                $MyObject[1]->ObjectInJson = "insert failed in tb_user_bookig <br> Description : ".$returnVal;
            }
            return $MyObject;
            
        }

        public function updateDataBooking($dataImage, $dataIdImage)
        {
            $bookingId= $dataIdImage; 
            $columnsBooking=array('image');
            $conditions=array(
                array('key'=>'id', 'operator'=>'=','value'=>"'".$bookingId."'",'logic'=>'')  
            );

            $conn=new myConnection();
            $updateDataBooking =$conn->update("tb_user_booking", $dataImage, $conditions);

            if (filter_var($updateDataBooking, FILTER_VALIDATE_INT) === 0 || filter_var($updateDataBooking, FILTER_VALIDATE_INT)) {
                //PIO + 20190127 add last id insert in tb_user ton first index of the array
                //array_unshift($dataUser, $returnVal);
                $MyObject[0] = new MyObjectInJson();
                $MyObject[0]->ObjectID = 'key';
                $MyObject[0]->ObjectInJson = 1;
                $MyObject[1] = new MyObjectInJson();
                $MyObject[1]->ObjectID = 'message';
                $MyObject[1]->ObjectInJson = $updateDataBooking;
                
            } else {
                $MyObject[0] = new MyObjectInJson();
                $MyObject[0]->ObjectID = 'key';
                $MyObject[0]->ObjectInJson = -1;
                $MyObject[1] = new MyObjectInJson();
                $MyObject[1]->ObjectID = 'message';
                $MyObject[1]->ObjectInJson = "insert update in tb_user_booking <br> Description : ".$updateDataBooking;
            }
            return $MyObject;
            
        }
    }
?>
