<?php
    require_once("coreClass/myObject.php");
    require_once("myClass/loginProcess.php");
    require_once("myClass/registrasiProcess.php");
    require_once("myClass/criteriaProcess.php");

    $data_input=json_decode(trim(file_get_contents('php://input')), true);

    $url="";
    
    if(count($data_input)>0)
    {

        foreach($data_input as $data)
        {
            if($data['ObjectID']=="url")
            {
                $url=$data['ObjectInJson'];
            }
        }

        if($url!="")
        {
            if($url=="login")
            {
                $username="";
                $password="";
                $nameRegistrasi="";
                $descriptionRegistrasi="";
                foreach($data_input as $data)
                {
                    if($data['ObjectID']=="username")
                    {
                        $username=$data['ObjectInJson'];
                    }

                    if($data['ObjectID']=="password")
                    {
                        $password=$data['ObjectInJson'];
                    }

                    if($data['ObjectID']=="nameRegistrasi")
                    {
                        $nameRegistrasi=$data['ObjectInJson'];
                    }

                    if($data['ObjectID']=="descriptionRegistrasi")
                    {
                        $descriptionRegistrasi=$data['ObjectInJson'];
                    }

                }

                $loginObject=new loginProcess();
                $MyObject=$loginObject->checkLogin($username, $password);
                
            }
            else if($url=="registrationUser")
            {
                $fullNameRegistration="";
                $usernameRegistration="";
                $passwordRegistration="";
                $dayOfBirthRegistration="";
                $emailRegistration="";
                $addressRegistration="";
                $phoneNumberRegistration="";
                foreach($data_input as $data)
                {

                    if($data['ObjectID']=="fullNameRegistration")
                    {
                        $fullNameRegistration=$data['ObjectInJson'];
                    }
                    
                    if($data['ObjectID']=="usernameRegistration")
                    {
                        $usernameRegistration=$data['ObjectInJson'];
                    }

                    if($data['ObjectID']=="passwordRegistration")
                    {
                        $passwordRegistration=$data['ObjectInJson'];
                    }

                    if($data['ObjectID']=="dayOfBirthRegistration")
                    {
                        $dayOfBirthRegistration=$data['ObjectInJson'];
                    }

                    if($data['ObjectID']=="emailRegistration")
                    {
                        $emailRegistration=$data['ObjectInJson'];
                    }

                    if($data['ObjectID']=="addressRegistration")
                    {
                        $addressRegistration=$data['ObjectInJson'];
                    }

                    if($data['ObjectID']=="phoneNumberRegistration")
                    {
                        $phoneNumberRegistration=$data['ObjectInJson'];
                    }
                }
                $dataUser[0]["id"]="";
                $dataUser[0]["name"]=$fullNameRegistration;
                $dataUser[0]["dayOfBirth"]=$dayOfBirthRegistration;
                $dataUser[0]["address"]=$addressRegistration;
                $dataUser[0]["telp"]=$phoneNumberRegistration;
                $dataUser[0]["email"]=$emailRegistration;
                $dataUser[0]["status"]="";

                $dataLogin[0]["username"]=$usernameRegistration;
                $dataLogin[0]["password"]=md5($passwordRegistration);
                $dataLogin[0]["level"]="";

                $registrasiClass=new registrasiProcess();
                $MyObject = $registrasiClass->insertRegistrasiUser($dataUser, $dataLogin);
                
            }
            else if($url=="criteria")
            {
                //sample input: [{"ObjectID":"url","ObjectInJson":"criteria"},{"ObjectID":"dateOfDepartureCriteria","ObjectInJson":"12"},{"ObjectID":"dateOfReturnCriteria","ObjectInJson":"12"},{"ObjectID":"packegesCriteria","ObjectInJson":"qw"},{"ObjectID":"priceCriteria","ObjectInJson":"12"}]
                $dateOfDepartureCriteria="";
                $dateofReturnCriteria="";
                $packegesCriteria="";
                $priceCriteria="";
                foreach($data_input as $data)
                {
                    if($data['ObjectID']=="dateOfDepartureCriteria")
                    {
                        $dateOfDepartureCriteria=$data['ObjectInJson'];
                    }

                    if($data['ObjectID']=="dateOfReturnCriteria")
                    {
                        $dateOfReturnCriteria=$data['ObjectInJson'];
                    }

                    if($data['ObjectID']=="packegesCriteria")
                    {
                        $packegesCriteria=$data['ObjectInJson'];
                    }

                    if($data['ObjectID']=="priceCriteria")
                    {
                        $priceCriteria=$data['ObjectInJson'];
                    }
                }
                $table=

                $criteriaProcessClass=new criteriaProcess();
                $MyObject = $criteriaProcessClass->getBasedOnCriteria($dateOfDepartureCriteria, $dateOfReturnCriteria, $packegesCriteria, $priceCriteria);
            }
        }
        else
        {
            $MyObject[0] = new MyObjectInJson();
            $MyObject[0]->ObjectID = 'key';
            $MyObject[0]->ObjectInJson = -1;
            $MyObject[1] = new MyObjectInJson();
            $MyObject[1]->ObjectID = 'message';
            $MyObject[1]->ObjectInJson = 'no url parameter matched';
        }
    }
    else
    {
        $MyObject[0] = new MyObjectInJson();
        $MyObject[0]->ObjectID = 'key';
        $MyObject[0]->ObjectInJson = -1;
        $MyObject[1] = new MyObjectInJson();
        $MyObject[1]->ObjectID = 'message';
        $MyObject[1]->ObjectInJson = 'no parameter passed';
    }

    echo json_encode($MyObject);
?>