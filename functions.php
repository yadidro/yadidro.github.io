<?php
    function email_exists($email, $con){
        $resault = mysqli_query( $con ,  "SELECT id FROM users WHERE email='$email' ");
        if(mysqli_num_rows($resault)==1){
            return true;
        }else{
            return false;
        }


    }

    function upload_file(){
        if(isset($_FILES['image'])){
            $errors= array();
            $num_inv_req="SELECT order_num FROM work WHERE date= '$date'";
            $result = $db->query($num_inv_req);
            $row2 = $result->fetch_assoc();
            $file_name = $row2["order_num"];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext=strtolower(end(explode('.',$file_name )));
            
            $expensions= array("jpeg","jpg","png","pdf");
            
            if(in_array($file_ext,$expensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG or PDF file.";
            }
            
            if($file_size > 2097152){
               $errors[]='File size must be excately 2 MB';
            }
            if($file_size==0){
             $errors[]='File size must be excately 2 MB';
          }
            
            if(empty($errors)==true){
               move_uploaded_file($file_tmp,"uploads/".$file_name);
               echo "Success";
            }else{
               print_r($errors);
            }
         
            
         
            
         }
         else  echo "please load a work to print";
        }
?>


