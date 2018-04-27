<?php 

//echo phpinfo();
//echo "this works 7";

	function cbus_cgate_send_message($msg)
    {

        $cr_ret = chr(0x0D) . chr(0x0A);
        $cbus_cgate_project = "MYHOME";
        $cbus_cgate_network = "254";
        $cbus_cgate_lighting_application = "56";

        // we have a message so open a command-port, issue a get command and get the status of the whole network for lighting
        if ($msg == "get_all") { $msg = "get //" . $cbus_cgate_project . "/" . $cbus_cgate_network . "/" . $cbus_cgate_lighting_application . "/* level"; }

//        $fp = fsockopen("pidocker4_cgate_1", "20023", $errno, $errstr);
        $fp = fsockopen("cgate-container", "20023", $errno, $errstr);
        if (!$fp) { $result2 = "could not connect6"; } // error: could not connect to command interface port
        else {

            fgets($fp, 1024); // get the command port welcome message
            fputs($fp, $msg . $cr_ret); // write the $msg string to the socket to request the status info

            $last_response_line = false;

            $result2 = "";
            while (!$last_response_line) {
                $buffer = fgets($fp, 4096);
                if (strpos($buffer,"300-//") === false) { $last_response_line = true; } // ie. the last line will not have the dash and will just be '300 //' not '300-//'
                $result2 .= $buffer;
            }
    
            fclose($fp); // close the connection
        }
        //return $result2 . "::" . $errno . "::" . $errstr;
        return $result2;
    }

echo cbus_cgate_send_message("get_all");
//echo cbus_cgate_send_message("RAMP //MYHOME/254/56/0 80");
