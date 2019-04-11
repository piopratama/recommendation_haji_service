<?php
    require_once("coreClass/myObject.php");
    require_once("./coreClass/userObject.php");
    require_once("./coreClass/connection.php");

    class registrasiProcess{
        public function insertDataLogin($dataLogin)
        {
            $columnsLogin=array('username','password','level');
            $columnsUser=array('name', 'address','telp','email','image');

            $conn=new myConnection();
            $returnVal=$conn->insert("tb_login", $columnsLogin, $dataLogin);
            
            if (filter_var($returnVal, FILTER_VALIDATE_INT) === 0 || filter_var($returnVal, FILTER_VALIDATE_INT)) 
            {
                
                $MyObject[0] = new MyObjectInJson();
                $MyObject[0]->ObjectID = 'key';
                $MyObject[0]->ObjectInJson = 1;
                $MyObject[1] = new MyObjectInJson();
                $MyObject[1]->ObjectID = 'message';
                $MyObject[1]->ObjectInJson = $returnVal;
            }
            else 
            {
                $MyObject[0] = new MyObjectInJson();
                $MyObject[0]->ObjectID = 'key';
                $MyObject[0]->ObjectInJson = -1;
                $MyObject[1] = new MyObjectInJson();
                $MyObject[1]->ObjectID = 'message';
                $MyObject[1]->ObjectInJson = "insert failed in tb_login <br> Description : ".$returnVal;
            }
            return $MyObject;
        }

        public function insertDataUser($dataUser)
        {
            $columnsLogin=array('username','password','level');
            $columnsUser=array('name', 'address','telp','email','image');

            $conn=new myConnection();
            $returnVal=$conn->insert("tb_user", $columnsUser, $dataUser);
            
            if (filter_var($returnVal, FILTER_VALIDATE_INT) === 0 || filter_var($returnVal, FILTER_VALIDATE_INT)) 
            {
                
                $MyObject[0] = new MyObjectInJson();
                $MyObject[0]->ObjectID = 'key';
                $MyObject[0]->ObjectInJson = 1;
                $MyObject[1] = new MyObjectInJson();
                $MyObject[1]->ObjectID = 'message';
                $MyObject[1]->ObjectInJson = $returnVal;
            }
            else 
            {
                $MyObject[0] = new MyObjectInJson();
                $MyObject[0]->ObjectID = 'key';
                $MyObject[0]->ObjectInJson = -1;
                $MyObject[1] = new MyObjectInJson();
                $MyObject[1]->ObjectID = 'message';
                $MyObject[1]->ObjectInJson = "insert failed in tb_login <br> Description : ".$returnVal;
            }
            return $MyObject;
        }
    }
?>