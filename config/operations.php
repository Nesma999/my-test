<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operations extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_save']))
            {
                $name = $db->check($_POST['name']);
                $email = $db->check($_POST['email']);
                $phone = $db->check($_POST['phone']);
                $password = $db->check($_POST['password']);

                if($this->insert_record($name,$email,$phone,$password))
                {
                    //echo "<script>window.location.href='login_user.php'</script>";
                    header("Location:login_user.php");
                }
                else
                {
                    echo '<div class="alert alert-danger"> Failed </div>';
                }
            }
        }

        // Insert Record in the Database Using Query    
        function insert_record($name,$email,$phone,$password)
        {
            global $db;
            $query = "insert into users (name,email,phone,password) values('$name','$email','$phone','$password')";
            $result = mysqli_query($db->connection,$query);

            if($result)
            {

                return true;
            }
            else
            {
                return false;
            }
        }
        
       
                $ID = $_POST['id'];
                $name = $db->check($_POST['name']);
                $email = $db->check($_POST['email']);
                $phone = $db->check($_POST['phone']);
                $password = $db->check($_POST['password']);

                if($this->update_record($ID,$name,$email,$phone,$password))
                {
                    $this->set_messsage('<div class="alert alert-success"> Your Record Has Been Updated : )</div>');
                    header("location:view.php");
                }
                else
                {   
                    $this->set_messsage('<div class="alert alert-success"> Something Wrong : )</div>');
                }

               
            }
        }

       

?>