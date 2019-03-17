<center>
    <table border="1">
        <tr>
        <th>firstname</th>
        <th>lastname</th>
        <th>email</th>
        <th>message</th>
        <th>phone</th>
        <th>opt</th>
        <th>Action</th>
       
        
        </tr>
        <?php 
        $conn = mysqli_connect("localhost","root","sneha","contact");
        if($conn->connect_error)
        {
            die("connection failed:" .$conn->connect_error);
        }
        $sql="SELECT firstname,lastname,email,phone,message,opt,id FROM contacttab";
        $result=$conn->query($sql);
        
        if($result->num_rows > 0)
        {
            while($row=$result->fetch_assoc()){
                ?>
        <tr id="<?php  echo $row['id']?>">
         
            <td><?php echo $row['firstname']?></td>
             <td><?php echo $row['lastname']?></td>  
              <td><?php echo $row['email']?></td> 
               <td><?php echo $row['message']?></td>
               <td><?php echo $row['phone']?></td>  
                <td><?php echo $row['opt']?></td>  
                <td><button class="btn btn-danger btn-sm remove">Delete</button></td>
            
        
        </tr>
            
        <?php           
            
            
            }
        }
        
        
        ?>
        
    </table></center>
    
    
     
    
    
    
    
    
    
