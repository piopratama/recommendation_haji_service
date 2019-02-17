<?php
    require_once("coreClass/myObject.php");
    require_once("./coreClass/userObject.php");
    require_once("./coreClass/connection.php");

    class registrasiProcess{
        public function insertRegistrasiUser($dataUser, $dataLogin)
        {
            $columnsLogin=array('username','password','level');
            $columnsUser=array('id', 'name','address','telp','email','status');

            $conn=new myConnection();
            $returnVal=$conn->insert("tb_login", $columnsLogin, $dataLogin);
            if (filter_var($last_insert_id, FILTER_VALIDATE_INT) === 0 || filter_var($last_insert_id, FILTER_VALIDATE_INT)) {
                //PIO + 20190127 add last id insert in tb_user ton first index of the array
                array_unshift($dataUser, $returnVal);
                $returnVal=$conn->insert("tb_user", $columnsUser, $dataUser);
            } else {
                $MyObject[0] = new MyObjectInJson();
                $MyObject[0]->ObjectID = 'key';
                $MyObject[0]->ObjectInJson = -1;
                $MyObject[1] = new MyObjectInJson();
                $MyObject[1]->ObjectID = 'message';
                $MyObject[1]->ObjectInJson = $returnVal;
            }
        }
    }
?>