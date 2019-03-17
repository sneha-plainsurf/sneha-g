<?php
session_start();
if (!isset($_SESSION['username']))
{
    header("location:/index.php",301);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		
           <title>Eduversity Education Category Flat Bootstrap Responsive Website Template | Home : W3layouts</title>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        </head>
		<?php include_once './includes/global_css.php'; ?>
	<body>


		<!-- header -->
		<header>
			<?php include_once './includes/header1.php'; ?>
		</header>
		<!-- //header -->
		<!-- banner -->
			<?php include_once './includes/banner.php'; ?>
		<!-- //banner -->
		<!-- welcome -->
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
    
    
     
    
    
    
    
    
    


		<!-- footer -->	
		<footer>
			<?php include_once './includes/footer.php'; ?>
		</footer>
		<!-- footer -->
		<!-- Login modal -->
			<?php include_once './includes/login.php'; ?>
                
		<!-- //Login modal -->
             
                

		<!-- Register modal -->
			<?php include_once './includes/register.php'; ?>
		<!-- //Register modal -->

		<!-- Gloabl JS Start -->
		<?php include_once './includes/global_js.php'; ?>	
		<!-- Gloabl JS End -->
			
	</body>
         <script type="text/javascript">

    $(".remove").click(function(){

        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))

        {

            $.ajax({

               url: "delete.php",

               type: 'GET',

               data: {id: id},

               error: function() {

                  alert('Something is wrong');

               },

               success: function(data) {

                    $("#"+id).remove();

                    alert("Record removed successfully");  

               }

            });

        }

    });


</script>
</html>