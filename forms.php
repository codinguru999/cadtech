<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <!-- <script src="https://kit.fontawesome.com/3f04a3eb9b.js" crossorigin="anonymous"></script> -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="fonts/google-fonts.css" /> -->

    <title>Cad Tech</title>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="./index.js"></script> -->
</head>

<body>
<?php
include "config.php";
?>
    <a id="link" href="">Redirecting....</a>
   
    <script>
<?php
$recipient_email = 'prafullmangla@gmail.com';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (array_key_exists('name', $_POST)) {
        $userName = $_POST["name"];
        $userEmail = $_POST["email"];
        $userPhone = $_POST["mobile"];
        $userMessage = $_POST["description"];
        

        $mailHeaders = " Name : " . $userName .
            "\r\n Email: " . $userEmail .
            "\r\n Phone: " . $userPhone .
            "\r\n Message: " . $userMessage . "\r\n ";

        if (mail($recipient_email, $userName, $mailHeaders)) {
            $message = " Your contact information is received successfully.";
        }

        echo 'alert("Form Submitted Successfully")
           window.location.href ="./"';
    } elseif (array_key_exists('namep', $_POST)) {
        $userName = $_POST["namep"];
        $userEmail = $_POST["emailp"];
        $userPhone = $_POST["mobilep"];
        $address = $_POST["addlinep"];
        $state=$_POST["state"];
        //$country = $_POST["country"];
        $city = $_POST["city"];
        $zipcode = $_POST["zipp"];
        

        $mailHeaders = " Name : " . $userName .
            "\r\n Email: " . $userEmail .
            "\r\n Phone: " . $userPhone .
            "\r\n Address: " . $address . "\r\n City: " . $city . "\r\n State: " . $state . "\r\n Zipcode: " . $zipcode . "\r\n ";

        if (mail($recipient_email, $userName, $mailHeaders)) {
            $message = " Your contact information is received successfully.";
        }
        echo 'alert("Form Submitted Successfully")
           window.location.href ="./"';
    } elseif (array_key_exists('namet', $_POST)) {
        $from_email = $_POST["emailt"]; //from mail, sender email address
         //recipient email address

        //Load POST data from HTML form
        $sender_name = $_POST["namet"]; //sender name
        $reply_to_email = $_POST["emailt"]; //sender email, it will be used in "reply-to" header
        $subject = ' Appling for' . $_POST['positiont'] . ':'; //subject for the email
            $message = " Name : " . $_POST['namet'] .
            "\r\n Email: " . $_POST['emailt'] .
            "\r\n Phone: " . $_POST['mobilet'] .
            "\r\n Hi I am applying for the : " . $_POST['positiont'] .
            "\r\n and the position are: " . $_POST['qualificationt'] . "\r\n "; //body of the email

        /*Always remember to validate the form fields like this
        if(strlen($sender_name)<1)
        {
        die('Name is too short or empty!');
        }
        */
        //Get uploaded file data using $_FILES array
        $tmp_name = $_FILES['resumet']['tmp_name']; // get the temporary file name of the file on the server
        $name = $_FILES['resumet']['name']; // get the name of the file
        $size = $_FILES['resumet']['size']; // get size of the file for size validation
        $type = $_FILES['resumet']['type']; // get type of the file
        $error = $_FILES['resumet']['error']; // get the error (if any)

        //validate form field for attaching the file
        if($error > 0)
    {
        die('Upload error or No files uploaded');
    }
 
    //read from the uploaded file & base64_encode content
    $handle = fopen($tmp_name, "r"); // set the file handle only for reading the file
    $content = fread($handle, $size); // reading the file
    fclose($handle);                 // close upon completion
 
    $encoded_content = chunk_split(base64_encode($content));
    $boundary = md5("random"); // define boundary with a md5 hashed value
 
    //header
    $headers = "MIME-Version: 1.0\r\n"; // Defining the MIME version
    $headers .= "From:".$from_email."\r\n"; // Sender Email
    $headers .= "Reply-To: ".$reply_to_email."\r\n"; // Email address to reach back
    $headers .= "Content-Type: multipart/mixed;"; // Defining Content-Type
    $headers .= "boundary = $boundary\r\n"; //Defining the Boundary
         
    //plain text
    $body = "--$boundary\r\n";
    $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $body .= chunk_split(base64_encode($message));
         
    //attachment
    $body .= "--$boundary\r\n";
    $body .="Content-Type: $type; name=".$name."\r\n";
    $body .="Content-Disposition: attachment; filename=".$name."\r\n";
    $body .="Content-Transfer-Encoding: base64\r\n";
    $body .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n";
    $body .= $encoded_content; // Attaching the encoded file with email
     
    $sentMailResult = mail($recipient_email, $subject, $body, $headers);
        // if ($sentMailResult) {
        //     echo "< h3 > File Sent Successfully.< h3 >";
        //     // unlink($name); // delete the file after attachment sent.
        // } else {
        //     die("Sorry but the email could not be sent.
        //             Please go back and try again! ");
        // }
        echo 'alert("Form Submitted Successfully")
           window.location.href ="./"';
    } elseif(array_key_exists('namei', $_POST)) {
            $userName = $_POST["namei"];
            $userEmail = $_POST["emaili"];
            $userPhone = $_POST["mobilei"];
            $userCategory = $_POST["Categoryi"];
           $userCourse = $_POST["Coursei"];
          $userCenter = $_POST["centeri"];
         

           $mailHeaders = " Name : " . $userName .
            "\r\n Email: " . $userEmail .
            "\r\n Phone: " . $userPhone .
            "\r\n Category: " . $userCategory . "\r\nCourse: " . $userCourse . "\r\nCenter: " . $userCenter . "\r\n ";

          if (mail($recipient_email, $userName, $mailHeaders)) {
             $message = " Your contact information is received successfully.";
          }
          echo 'alert("Form Submitted Successfully")
           window.location.href ="./"';
        } elseif (array_key_exists('nameo', $_POST)) {
         $userName = $_POST["nameo"];
           $userEmail = $_POST["emailo"];
            $userPhone = $_POST["mobileo"];
        $userCategory = $_POST["Categoryo"];
          $userCourse = $_POST["Courseo"];
            // $userCenter = $_POST["Centeri"];
        

          $mailHeaders = " Name : " . $userName .
            "\r\n Email: " . $userEmail .
            "\r\n Phone: " . $userPhone .
            "\r\n Category: " . $userCategory . "\r\nCourse: " . $userCourse . "\r\n ";

           if (mail($recipient_email, $userName, $mailHeaders)) {
              $message = " Your contact information is received successfully.";
         }
            echo 'alert("Form Submitted Successfully")
           window.location.href ="./"';
        }
    }
?>
    </script>


    <script>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if (array_key_exists('certificateId', $_POST)) {
        $id = $_POST['certificateId'];
        $sql = " SELECT * from certificates where id = $id ";
        $result = mysqli_query($connection, $sql);
        $x = 0;
        while ($row = mysqli_fetch_array($result)) {
            echo '
                    console.log("hiii ")
    let a = document.getElementById("link")
                a.href ="data:certificate/jpeg;base64,'.base64_encode($row['certificate']).'"
                    a.download="cert.jpg"
                        a.click()
    window.location.href ="./"';
        }
}
    }

    ?>
// echo '<div class="hidden" id="certload"> <img src="data:certificate/jpeg;base64,' . base64_encode($row['certificate']) . '" alt="yytgy" /><a href="data:certificate/jpeg;base64,' . base64_encode($row['certificate']) . '" download="cert.jpg" style="width:fit-content; margin:auto;" id="down"><button>Download certificate</button></a></div>';
    </script>

</body>

</html>