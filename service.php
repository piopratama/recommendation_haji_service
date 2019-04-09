<?php
    require_once("coreClass/myObject.php");
    require_once("myClass/loginProcess.php");
    require_once("myClass/registrasiProcess.php");
    require_once("myClass/criteriaProcess.php");
    require_once("myClass/finishBookingProcess.php");
    require_once("coreClass/connection.php");
    require_once("testingService.php");

    $data_input=json_decode(trim(file_get_contents('php://input')), true);
    echo json_encode()
    $baseImagePath="http://192.168.100.8/github/recommendation_haji_service";
   
    if(count($data_input)>0 && count($data_input)<2)
    {
        echo json_encode(count($data_input));
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
    else if(is_array($data_input[0][0]))
    {
        foreach($data_input as $data)
        {
            foreach($data as $data2)
            {
                if($data2['ObjectID']=="url")
                {
                    $url=$data2['ObjectInJson'];
                }
            }
        }
        if($url=="finishBooking")
        {
            foreach($data_input as $data)
            {
                $fullNameFinishBooking="";
                $addressFinishBooking="";
                $emailFinishBooking="";
                $phoneFinishBooking="";
                $imageFinisaBooking="";
                foreach($data as $data2)
                {    
                        if($data2['ObjectID']=="fullNameFinishBooking")
                        {
                            $fullNameFinishBooking=$data2['ObjectInJson'];
                        }

                        if($data2['ObjectID']=="addressFinishBooking")
                        {
                            $addressFinishBooking=$data2['ObjectInJson'];
                        }

                        if($data2['ObjectID']=="emailFinishBooking")
                        {
                            $emailFinishBooking=$data2['ObjectInJson'];
                        }

                        if($data2['ObjectID']=="phoneFinishBooking")
                        {
                            $phoneFinishBooking=$data2['ObjectInJson'];
                        }

                        /*if($data['ObjectID']=="imageFinishBooking")
                        {
                            $imageFinishBooking=$data2['ObjectInJson'];
                        }*/

                        $dataBooking[0]["id"]="";
                        $dataBooking[0]["id_user_packet"]="";
                        $dataBooking[0]["name"]=$fullNameFinishBooking;
                        $dataBooking[0]["address"]=$addressFinishBooking;
                        $dataBooking[0]["telp"]=$phoneFinishBooking;
                        $dataBooking[0]["email"]=$emailFinishBooking;
                        $dataBooking[0]["image"]="";

                        //echo json_encode($dataBooking);
                }
            }

            $dataUser[0]["id"]="";
            $dataUser[0]["id_user"]=2;
            $dataUser[0]["id_packet"]=1;
            $dataUser[0]["description"]="";
            $dataUser[0]["status_book"]=1;

            $finishBookingObject=new finishBookingProcess();
            $MyObject=$finishBookingObject->insertDataUser($dataUser);
            $MyObject=$finishBookingObject->insertDataBooking($dataBooking);
            $imageId= $MyObject[1]->ObjectInJson;

            $path = "assets/images/img".$imageId.".png";
            /*$status = file_put_contents($path,base64_decode($imageFinishBooking));
            if($status){
                echo "Successfully Uploaded";
            
            }else{
                echo "Upload failed";
            }*/

            $dataImage[0][0]="image";
            $dataImage[0][1]="'".$baseImagePath."/".$path."'";
            $dataIdImage=$imageId;

            $MyObject=$finishBookingObject->updateDataBooking($dataImage, $dataIdImage);
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