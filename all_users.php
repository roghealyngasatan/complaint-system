<?php

$servername='localhost';
$username='root';
$password='';
$dbname='complaint system';

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn)






{
	$query1="SELECT * FROM `complaints`";
	$result=mysqli_query($conn,$query1);
	$pend=0;
	$full=0;
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			
				$cme=$row['pending'];
				if($cme=='1')
				{
					$pend++;
				}
			
		}
	}







	$full+=$pend;
	$query1="SELECT * FROM `completedcomp`";
	$result=mysqli_query($conn,$query1);
	$compl=0;
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
					$full++;
					$compl++;	
			
		}
	}
	$query1="SELECT * FROM `inprogresscomp`";
	$result=mysqli_query($conn,$query1);
	$inpro=0;
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
				
					$inpro++;	
					$full++;
			
		}
	}


    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="sidebarNav.css">
  <link rel="stylesheet" href="main.css">



    <title>All Users Data</title>

    <script>

        function auser()
                    {
                        var auser=document.getElementById('alluser');
                            var full=document.getElementById('fullhistory');
                        var inpro=document.getElementById('inprocomp');
                        var comp=document.getElementById('complcomp');
                        var pend=document.getElementById('pending');
                        var dash=document.getElementById('dashboard');
                        var luser=document.getElementById('logindata');
                        if(auser.style.display=='block')
                        {
                            
                            dash.style.display='none';
                            luser.style.display='none';
                            full.style.display='none';
                            pend.style.display='none';
                            inpro.style.display='none';
                            comp.style.display='none';
                        }
                        else
                        {
                            auser.style.display='block';
                            dash.style.display='none';
                            luser.style.display='none';
                            full.style.display='none';
                            pend.style.display='none';
                            inpro.style.display='none';
                            comp.style.display='none';
                        }
                    }
                        
        </script>                              




</head>
<body>

  

	
    <div class="" id="alluser" style="width:97%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(91, 12, 9,.1);border:1px #789DBC;">
        <h4>All Users data<hr /></h4>

            <?php
                $num=0;
                $userss="SELECT * FROM `userregistration`";
                $result786=mysqli_query($conn,$userss);
                if($result786)
                {
                    while($rowuser=mysqli_fetch_assoc($result786))
                    {$num++;
                        $fnamen=$rowuser['fname'];
                        $lnamen=$rowuser['lname'];
                        $usern=$rowuser['username'];
                        $mailn=$rowuser['email'];
                        $phonen=$rowuser['phone'];
                        $gendern=$rowuser['gender'];
                        $daten=$rowuser['date'];
                        echo"
                        <table class='table table-striped table-info table-hover'> 
                            <tr class='thead'><th>Number</th><th>$num</th></tr>
                            <tr><td>First Name</td><td>$fnamen</td></tr>
                            <tr><td>Last Name</td><td>$lnamen</td></tr>
                            <tr><td>Username</td><td>$usern</td></tr>
                            <tr><td>Email</td><td>$mailn</td></tr>
                            <tr><td>Phone Number</td><td>$phonen</td></tr>
                            <tr><td>Gender</td><td>$gendern</td></tr>
                            <tr><td>Date</td><td>$daten</td></tr><hr /><br />
                            </table>
                            ";
                    }
                }
            
            ?>
    </div>   
            

    
</body>
</html>

