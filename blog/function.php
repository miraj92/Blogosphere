<?php

class Functions
  {

    Function Login()
        {
          include('connection.php');


              $username=$_POST['username'];
              $password=$_POST['password'];
  
              
              $username=stripslashes($username);
              $username=mysql_real_escape_string($username);

              $password=stripslashes($password);
              $password=mysql_real_escape_string($password);

              
              $sql="select force_new_pw,Id from user_detail where Username='$username' and password='$password'";
             
            
              $result=mysqli_query($con,$sql);
              
              $row=mysqli_num_rows($result);
              
                 if($row==1) {
                 session_start(); 
                 while($data=mysqli_fetch_array($result,MYSQLI_NUM)) {
                   $pw = $data[0]; 
                   $id = $data[1];
                 }
                 if($pw==0) {
                    $_SESSION['username'] = $username;
                    $_SESSION['id'] = $id;
                   header("location:changepassword.php");
                 }  else {              
                    $_SESSION['username'] = $username;
                     $_SESSION['id'] = $id;
                    header("location:user.php");
                    echo "login success";
                 }
              } else {
                  

                  
                   echo "<script type=text/javascript>";
     echo "alert('Please login first ')";
     echo "</script>";
	 header('location:index.php');
    
              }
        }

    function passmail($id,$email)
        {
	         require_once "C:\wamp\bin\php\php5.3.8\pear\Mail.php";
           include 'connection.php';

                $rpass=$this->randomPassword();
                $username = 'Blog.at.Blogosphere@gmail.com';
                $password = 'blogosphere';
                $host = 'ssl://smtp.gmail.com';
                $from = 'shalinchoksi92@gmail.com ';
                $to = $email;
                $subj = "Subject: noreply@domain.com\n";
                $body = "Welcome to Blogosphere,\n Your password is".$rpass." please login with this password and change for ur security.\n ";
                $port = '465';
 
                $headers = array ('From' => $from,'To' => $to,'Subject' => $subj);

                $smtp = Mail::factory('smtp',array ('host' => $host,'port' => $port,'auth' => true,'username' => $username,'password' => $password));
 
                $mail = $smtp->send($to, $headers, $body);
 
              if (PEAR::isError($mail)) 
              {
                 echo("<p>" . $mail->getMessage() . "</p>");
              }
              else 
              {
                echo("<p>Message successfully sent!</p>");
                $sql="update `user_detail` set `password`='$rpass' where `id`=$id";
  
                if (mysqli_query($con,$sql)) {
                  echo "password inserted";
                  $newURL='regi3.php';
                  header("Location:".$newURL."");
                } else {
                  echo "pass error";
                }
      
              } 
            }
        
public function randomPassword() 
         {
                  $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
                  $pass = array(); //remember to declare $pass as an array
                  $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                  for ($i = 0; $i < 8; $i++) {
                  $n = rand(0, $alphaLength);
                  $pass[] = $alphabet[$n];
                 // echo implode($pass);
          }
         
          return implode($pass); 
          
          }


  function resetpassmail($user,$email)
      {
      
           require_once "C:\wamp\bin\php\php5.3.8\pear\Mail.php";
           include 'connection.php';

                     
             $rpass=$this->randomPassword();
                
                 $username = 'Blog.at.Blogosphere@gmail.com';
                $password = 'blogosphere';
                $host = 'ssl://smtp.gmail.com';
                $from = 'shalinchoksi92@gmail.com ';
                $to = $email;
                $subj = "Subject: noreply@domain.com\n";
                $body = "Welcome to Blogoshere,\n Your password is ".$rpass." .please login with this password and change for ur security.";
                $port = '465';
 
                $headers = array ('From' => $from,'To' => $to,'Subject' => $subj);

                $smtp = Mail::factory('smtp',array ('host' => $host,'port' => $port,'auth' => true,'username' => $username,'password' => $password));
 
                $mail = $smtp->send($to, $headers, $body);
 
              if (PEAR::isError($mail)) 
              
              {
                 echo("<p>" . $mail->getMessage() . "</p>");
              }
              
              else 
              
              {
                
                $sql="update user_detail set password='$rpass',force_new_pw='0' where Username='$user' and emailid='$email'";
                mysqli_query($con,$sql);
                 print("<script type=text/javascript>");
                  print("alert('Please login first ')");
                 print("</script>");
                
              } 
       
       }
        function changepassmail($user)
      {
      
           require_once "C:\wamp\bin\php\php5.3.8\pear\Mail.php";
           include 'connection.php';
           
                     $sql="select * from user_detail where Username='$user'";
                     echo $sql;
                    $result=mysqli_query($con,$sql);
                     while($row=mysqli_fetch_array($result))
                     {
                        $email=$row['emailid'];
                        $pass=$row['password'];
                     }
            
                
                 $username = 'Blog.at.Blogosphere@gmail.com';
                $password = 'blogosphere';
                $host = 'ssl://smtp.gmail.com';
                $from = 'shalinchoksi92@gmail.com ';
                $to = $email;
                $subj = "Subject: noreply@domain.com\n";
                $body = "Welcome to Blogoshere,\n Your password is recently changed. your password is ".$pass." please login with this password .";
                $port = '465';
 
                $headers = array ('From' => $from,'To' => $to,'Subject' => $subj);

                $smtp = Mail::factory('smtp',array ('host' => $host,'port' => $port,'auth' => true,'username' => $username,'password' => $password));
 
                $mail = $smtp->send($to, $headers, $body);
 
              if (PEAR::isError($mail)) 
              
              {
                 echo("<p>" . $mail->getMessage() . "</p>");
              }
              

       
       }

       function abusemail($pid)
        {
           require_once "C:\wamp\bin\php\php5.3.8\pear\Mail.php";
           include 'connection.php';

                
                 $username = 'Blog.at.Blogosphere@gmail.com';
                $password = 'blogosphere';
                $host = 'ssl://smtp.gmail.com';
                $from = 'shalinchoksi92@gmail.com ';
                $to = 'micks.9093@gmail.com';
                $subj = "Subject: noreply@domain.com\n";
                $body ="Admin,\n Inappropriate content found ..\n More than 5 users has Reported the post having id : $pid as an abuse..\n kindly refer it. ";
                $port = '465';
 
                $headers = array ('From' => $from,'To' => $to,'Subject' => $subj);

                $smtp = Mail::factory('smtp',array ('host' => $host,'port' => $port,'auth' => true,'username' => $username,'password' => $password));
 
                $mail = $smtp->send($to, $headers, $body);
 
              if (PEAR::isError($mail)) 
              {
                 echo("<p>" . $mail->getMessage() . "</p>");
              }
              else 
              {
                Echo "Reported as an abuse successfully.";
      
              } 
            }

  function checksession()
  {

  session_start();
 
    if(empty($_SESSION['username']))
    {
    
     header("location:Login.php");
    echo "<script type=\"text/javascript\" >alert('Please login first')</script>"; 
    
    }
    else
    {

    $username=$_SESSION['username'];
    
    return $username;
    }
   
  }     

}
?>