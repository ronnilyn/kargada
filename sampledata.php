<?php

    include 'config/config.php';

    class controller extends Connection{

        public function managcontroller(){
            
            // Detail 1
            $referencecode1 = "REF001";
            $receiverfullname1 = "Alice Johnson";
            $receivercontact1 = "111-222-3333";
            $receiveraddress1 = "123 Elm St, Cityville";
            $senderfullname1 = "Bob Anderson";
            $sendercontact1 = "444-555-6666";
            $senderaddress1 = "789 Oak St, Townsville";
            $sendertin1 = "TIN123456";

            // Detail 2
            $referencecode2 = "REF002";
            $receiverfullname2 = "Charlie Brown";
            $receivercontact2 = "777-888-9999";
            $receiveraddress2 = "456 Maple St, Villagetown";
            $senderfullname2 = "Diana Smith";
            $sendercontact2 = "999-000-1111";
            $senderaddress2 = "321 Pine St, Hamletville";
            $sendertin2 = "TIN789012";

            // Detail 3
            $referencecode3 = "REF003";
            $receiverfullname3 = "Eva Miller";
            $receivercontact3 = "123-456-7890";
            $receiveraddress3 = "987 Birch St, Countryside";
            $senderfullname3 = "Frank Johnson";
            $sendercontact3 = "222-333-4444";
            $senderaddress3 = "654 Cedar St, Riverside";
            $sendertin3 = "TIN345678";

            // Detail 4
            $referencecode4 = "REF004";
            $receiverfullname4 = "George Williams";
            $receivercontact4 = "555-666-7777";
            $receiveraddress4 = "789 Pine St, Lakeside";
            $senderfullname4 = "Helen Davis";
            $sendercontact4 = "111-222-3333";
            $senderaddress4 = "432 Oak St, Mountainside";
            $sendertin4 = "TIN901234";

            // Detail 5
            $referencecode5 = "REF005";
            $receiverfullname5 = "Ivy Martinez";
            $receivercontact5 = "888-999-0000";
            $receiveraddress5 = "567 Maple St, Hillside";
            $senderfullname5 = "Jack Smith";
            $sendercontact5 = "333-444-5555";
            $senderaddress5 = "876 Elm St, Seaside";
            $sendertin5 = "TIN567890";

            // Detail 6
            $referencecode6 = "REF006";
            $receiverfullname6 = "Ivy Martinez";
            $receivercontact6 = "888-999-0000";
            $receiveraddress6 = "567 Maple St, Hillside";
            $senderfullname6 = "Jack Smith";
            $sendercontact6 = "333-444-5555";
            $senderaddress6 = "876 Elm St, Seaside";
            $sendertin6 = "TIN567890";

            $sqlinsert = "INSERT INTO shipment_details (reference_code,receiver_fullname,receiver_contact,receiver_address,sender_fullname,sender_contact,sender_address,sender_tin) VALUES (?,?,?,?,?,?,?,?)";

            $statementinsert1 = $this->conn()->prepare($sqlinsert);
            $statementinsert1->execute([$referencecode1,$receiverfullname1,$receivercontact1,$receiveraddress1,$senderfullname1,$sendercontact1,$senderaddress1,$sendertin1]);

            $statementinsert2 = $this->conn()->prepare($sqlinsert);
            $statementinsert2->execute([$referencecode2,$receiverfullname2,$receivercontact2,$receiveraddress2,$senderfullname2,$sendercontact2,$senderaddress2,$sendertin2]);

            $statementinsert3 = $this->conn()->prepare($sqlinsert);
            $statementinsert3->execute([$referencecode3,$receiverfullname3,$receivercontact3,$receiveraddress3,$senderfullname3,$sendercontact3,$senderaddress3,$sendertin3]);

            $statementinsert4 = $this->conn()->prepare($sqlinsert);
            $statementinsert4->execute([$referencecode4,$receiverfullname4,$receivercontact4,$receiveraddress4,$senderfullname4,$sendercontact4,$senderaddress4,$sendertin4]);

            $statementinsert5 = $this->conn()->prepare($sqlinsert);
            $statementinsert5->execute([$referencecode5,$receiverfullname5,$receivercontact5,$receiveraddress5,$senderfullname5,$sendercontact5,$senderaddress5,$sendertin5]);

            $statementinsert6 = $this->conn()->prepare($sqlinsert);
            $statementinsert6->execute([$referencecode6,$receiverfullname6,$receivercontact6,$receiveraddress6,$senderfullname6,$sendercontact6,$senderaddress6,$sendertin6]);



               // Item 1
               $itemname1 = "Device";
               $description1 = "A small widget with gears";
               $length1 = 5.0;
               $width1 = 3.5;
               $height1 = 2.0;

               // Item 2
               $itemname2 = "Electronics";
               $description2 = "An electronic gadget with a touchscreen";
               $length2 = 8.0;
               $width2 = 4.5;
               $height2 = 1.5;

               // Item 3
               $itemname3 = "Tool Set";
               $description3 = "A set of essential tools for DIY projects";
               $length3 = 12.0;
               $width3 = 6.0;
               $height3 = 3.0;

               // Item 4
               $itemname4 = "Bookshelf";
               $description4 = "A wooden bookshelf with multiple shelves";
               $length4 = 36.0;
               $width4 = 24.0;
               $height4 = 72.0;

               // Item 5
               $itemname5 = "Laptop";
               $description5 = "A high-performance laptop for gaming";
               $length5 = 14.0;
               $width5 = 10.0;
               $height5 = 1.0;

               // Item 6
               $itemname6 = "Candle Set";
               $description6 = "A set of scented candles in various fragrances";
               $length6 = 3.0;
               $width6 = 3.0;
               $height6 = 4.0;

               // Item 7
               $itemname7 = "Fitness Tracker";
               $description7 = "A wearable device to monitor fitness activities";
               $length7 = 2.5;
               $width7 = 0.8;
               $height7 = 0.5;

               // Item 8
               $itemname8 = "Kitchen Blender";
               $description8 = "A powerful blender for smoothies and shakes";
               $length8 = 10.0;
               $width8 = 8.0;
               $height8 = 12.0;

               // Item 9
               $itemname9 = "Artificial Plant";
               $description9 = "A realistic artificial plant for home decor";
               $length9 = 6.0;
               $width9 = 6.0;
               $height9 = 4.6;

               $itemname10 = "Wireless Headphones";
               $description10 = "High-quality wireless headphones with noise cancellation";
               $length10 = 7.0;
               $width10 = 6.0;
               $height10 = 3.0;

               $itemname11 = "Wireless Phone";
               $description11 = "High-quality wireless headphones with noise cancellation";
               $length11 = 7.0;
               $width11 = 6.0;
               $height11 = 3.0;

               $sqlinsert = "INSERT INTO items (reference_code,itemname,description,length,width,height) VALUES (?,?,?,?,?,?)";

               $statementinsert1 = $this->conn()->prepare($sqlinsert);
               $statementinsert1->execute([$referencecode1,$itemname1,$description1,$length1,$width1,$height1]);

               $statementinsert2 = $this->conn()->prepare($sqlinsert);
               $statementinsert2->execute([$referencecode1,$itemname2,$description2,$length2,$width2,$height2]);

               $statementinsert3 = $this->conn()->prepare($sqlinsert);
               $statementinsert3->execute([$referencecode1,$itemname3,$description3,$length3,$width3,$height3]);

               $statementinsert4 = $this->conn()->prepare($sqlinsert);
               $statementinsert4->execute([$referencecode2,$itemname4,$description4,$length4,$width4,$height4]);

               $statementinsert5 = $this->conn()->prepare($sqlinsert);
               $statementinsert5->execute([$referencecode3,$itemname5,$description5,$length5,$width5,$height5]);

               $statementinsert6 = $this->conn()->prepare($sqlinsert);
               $statementinsert6->execute([$referencecode3,$itemname6,$description6,$length6,$width6,$height6]);

               $statementinsert7 = $this->conn()->prepare($sqlinsert);
               $statementinsert7->execute([$referencecode4,$itemname7,$description7,$length7,$width7,$height7]);

               $statementinsert8 = $this->conn()->prepare($sqlinsert);
               $statementinsert8->execute([$referencecode5,$itemname8,$description8,$length8,$width8,$height8]);

               $statementinsert9 = $this->conn()->prepare($sqlinsert);
               $statementinsert9->execute([$referencecode5,$itemname9,$description9,$length9,$width9,$height9]);

               $statementinsert10 = $this->conn()->prepare($sqlinsert);
               $statementinsert10->execute([$referencecode5,$itemname10,$description10,$length10,$width10,$height10]);

               $statementinsert11 = $this->conn()->prepare($sqlinsert);
               $statementinsert11->execute([$referencecode6,$itemname11,$description11,$length11,$width11,$height11]);

        }

    }

    $controllerrun = new controller();
    $controllerrun->managcontroller();

?>
