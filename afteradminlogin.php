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

  <title>Complaint system</title>
  
  
  
  <style>

	body{
		margin:0px;
	}

	
	.btn{
		background-color: red;
	}





	input{
		margin:20px;
	}
	.nav-item{
		padding:0px;
			width:100%;
			
	}
	.btn1, .btn{
		width:200px;
		padding:20px;
		border-bottom: transparent;
		border-left: transparent;
		border-right: transparent;
		border-top: transparent;
		border-color: black;
	
	}
	.btn1:hover{
		background:#789DBC;
	}
	
	.navbar ul{
		padding:0px;
		border:10px transparent;
		width:100%;
	}
	#file1,#file2,#file3{
				border: 2px solid black;

				display:inline-block;
				font-size:160px;
				margin-left:50px;
				color:white;
				padding:20px;
				border-bottom:none;
			}
			#file1:hover{
				border:none;
				
			}
			#file1:hover #pen{
				display:block;
			}
			#file2:hover{
				border:none;
				
			}
				#file2:hover #pen2{
				display:block;
			}
			#file3:hover{
				border:none;
			
			}	#file3:hover #pen3{
				display:block;
			}
			.tr{
				width:auto;
				float;left;
				border:1px solid black;
			}
			h5 {
				padding:15px;
			}
			
			#file12:hover #pen{
				display:block;
			}
			#pen,#pen2,#pen3{
				display:none;
				font-size:18px;
				text-align:center;
				border-bottom:0.5px solid black;
			}
			#specialchk
			{
				background-color:transparent;
				color:white;
				float:right;
				border:1px transparent;
				border-radius:10px;
				width:auto;
				padding-left: 10px;
				padding-top: 17px;
				font-weight: bold;
			}
			h6{
				padding:10px;
				border-bottom:1px solid black;
				border-left:1px solid black;
				border-right:1px solid black;
			}
			#span{
				color:green;
				padding:5px;
			}
			.now{
				display:none;
			}
			#remark{
				color:grey;
				font-size:20px;
			}
			.thead{
				font-size:large;
			}


  </style>
  
  <script>
			function callsh()
			{
				if(document.getElementById("sh_menu").style.display=='block')
				{
					document.getElementById("sh_menu").style.display='none';
				}
				else {
					document.getElementById("sh_menu").style.display='block';
				}
			}
			function comp()
			{
				var p=document.getElementById("p_comp");
				var f=document.getElementById("f_comp");
				var i=document.getElementById("i_comp");
				if(document.getElementById('ccomp').style.display=='block')
				{
					p.style.display='none';
					document.getElementById('ccomp').style.display='none';
					f.style.display='none';
					i.style.display='none';
					
				}
				else
				{
					p.style.display='block';
					document.getElementById('ccomp').style.display='block';
					f.style.display='block';
					i.style.display='block';
					
				}
			}
			function manageuser(){
				var l=document.getElementById("l_user");
				if(l.style.display=='none')
				{
					l.style.display='block';
					document.getElementById('a_user').style.display='block';
				}
				else
				{
					l.style.display='none';
					document.getElementById('a_user').style.display='none';
					
				}
			}
			function dashboard()
			{
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				var auser=document.getElementById('alluser');
				var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				if(dash.style.display=='block')
				{
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
					pend.style.display='none';
				}
				else
				{
					dash.style.display='block';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
					pend.style.display='none';
				}
			}
			function pending()
			{
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				var auser=document.getElementById('alluser');
				var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				var comp=document.getElementById('complcomp');
				if(pend.style.display=='block')
				{
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				else
				{
					
					pend.style.display='block';
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				
			}
				function complcomp()
			{
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				var auser=document.getElementById('alluser');
				var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				if(comp.style.display=='block')
				{
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					pend.style.display='none';
				}
				else
				{
					
					comp.style.display='block';
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					inpro.style.display='none';
					pend.style.display='none';
				}
				
			}	
			function inpro()
			{
				var inpro=document.getElementById('inprocomp');
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				var auser=document.getElementById('alluser');
				var full=document.getElementById('fullhistory');
				if(inpro.style.display=='block')
				{
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					comp.style.display='none';
				}
				else
				{
					
					inpro.style.display='block';
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					comp.style.display='none';
				}
				
			}
				
			function full()
			{
				var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				var luser=document.getElementById('logindata');
				var auser=document.getElementById('alluser');
				if(full.style.display=='block')
				{
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				else
				{
					
					full.style.display='block';
					dash.style.display='none';
					luser.style.display='none';
					auser.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				
			}
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
				
			}function luser()
			{
				var luser=document.getElementById('logindata');
				var full=document.getElementById('fullhistory');
				var inpro=document.getElementById('inprocomp');
				var auser=document.getElementById('alluser');
				var comp=document.getElementById('complcomp');
				var pend=document.getElementById('pending');
				var dash=document.getElementById('dashboard');
				if(luser.style.display=='none')
				{
					dash.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					auser.style.display='none';
					comp.style.display='none';
					
					document.getElementById("logindata").style.display="block";
				}
				else
				{
					
					document.getElementById("logindata").style.display="block";
					
					dash.style.display='none';
					auser.style.display='none';
					full.style.display='none';
					pend.style.display='none';
					inpro.style.display='none';
					comp.style.display='none';
				}
				
			}
	</script>
  </head>
<body style="margin: 0px;">


		<!-- This is the sidebar code startting from here-->
  
		<nav>

			<ul class="sidebar">
					
					<li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></a></li>


					
						
						<li>
							<a  onclick="dashboard()" href="#"><b>Dashboard</b></a>
						</li>
						
						<li>
						<a  onclick="comp()" href="#"><b>Manage Complaints</b></a>
						</li>
						
						<li class="nav-item"  id="p_comp" style="display:none;">
							<a onclick="pending()" href="#">Pending complaints<p id="specialchk"><?php echo $pend;?></p></a>
						</li>

						<li class="nav-item" id="i_comp"  style="display:none"> 
							<a onclick="inpro()"  href="#">In progress<p id="specialchk"><?php echo $inpro;?></p></a>
						</li>

						<li class="nav-item" id="ccomp" style="display:none;">
							<a onclick="complcomp()"href="#">Complete Complaints<p id="specialchk"><?php echo $compl; ?></p></a>
						</li>

						<li class="nav-item" id="f_comp" style="display:none;">
							<a onclick="full()"  href="#">Full Complaint history<p id="specialchk"><?php echo $full;?></p></a>
						</li>
							
						<li class="nav-item" >
							<a onclick="manageuser()" href="#"><b>Manage Users</b></a>
						</li>
						<li class="nav-item" id="a_user" style="display:none;">
							<a  onclick="auser()" href="#">All users data</a>
							
						</li>

						<li class="nav-item" id="l_user"  style="display:none">
							<a onclick="luser()"   href="#">User Login info</a>
						</li>
			
				</ul>

				<ul>
						<li><a href="#"><img src="slsu_logo.png" style="width:50px;"><h5>SLSU-TO Complaint System | Admin</h5></a></li>

						<li><a href="adminlogin1.html"><h5>Logout</h5></a></li>

						<li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 170 960 960" width="26"><path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg></a></li>
				</ul>
			
		</nav>
			
		<!-- This is the sidebar code ending here-->


		<div>
			<!----------------------------------------------------------------------------------------DASHBOARD-->
			
			<div class="" id="dashboard" style="width:100%;display:block;padding:20px; color:white; text-align:center;">
			<h4>Dashboard<hr /></h4>
				<div id="file1" onclick="pending()" style="cursor:pointer; ">
					<i  style=""></i>
					<p id="file12" style="display:block;font-size:15px;text-align:center;">Pending complaints<div id="pen"><?php echo $pend; ?></div></p>
				</div>
					<div id="file2" href="afteradminlogin.php" onclick="inpro()" target="_blank">
						<i style="cursor:pointer;" onclick="inpro()"></i>
						<p id="file22" style="display:block;font-size:15px;text-align:center;">In Progress Complaints<div id="pen2"><?php echo $inpro; ?></div></p>
					</div>
						<div id="file3" onclick="complcomp()">
							<i style="cursor:pointer;" onclick="complcomp()"></i>
							<p id="file32" style="display:block;font-size:15px;text-align:center;">Completed Complaints<div id="pen3"><?php echo $compl; ?></div></p>
						</div>
			</div>
			
			<!----------------------------------------------------------------------------------------DASHBOARD-->
				
		
				<!----------------------------------------------------------------------------------------pending-->
			
			<div class="" id="pending" style="width:auto;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(91, 12, 9,.1);border:1px #789DBC;">
			<h4>Pending Complaints<hr /></h4>
				<?php
					$query1="SELECT * FROM `complaints`";
					$result=mysqli_query($conn,$query1);
						$num=0;
				
						if($result)
						{
							while($row=mysqli_fetch_assoc($result))
								{
									
									$cme=$row['pending'];
									if($cme=='1')
									{
										
										$num++;
											$id=$row['id'];
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>
											
											<form method='POST' action='solvepend1.php'>
											<input type='text' name='user' value='$usr' class='now'>
											<input type='text' name='compid' value='$id' class='now'>
											<input type='submit' value='solve it' style='float:right;margin:0px;' class='btn btn-info' >
											</form>
											
											Number:$num  
											User: $usr  
																					
											</h5>";
											echo"<h6>File:               ";
											if($fil==""||$fil=='0')
											{
												
											echo "<span id='span'>No file</span><br />";
											}
											else{
											echo "<a href='$fil' target='_blank'>view file</a><br />";
											}
											 echo "Complaint-categoty:<span id='span'> $cate</span><br />
											 Complaint-Subcategoty:   <span id='span'>$subcate</span><br />
											 Complaint-Nature:        <span id='span'>$nat</span><br />
											 Complaint-Date:          <span id='span'>$da</span><br />
											 COMLAINT >               <span id='span'>$co</span><br /></h6><br /><hr />";
										
									}
								}
						}
											
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------pending-->
			<!----------------------------------------------------------------------------------------inprogress-->
			
			<div class="" id="inprocomp" style="width:97%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(91, 12, 9,.1);border:1px #789DBC;">
			<h4>In progress Complaints<hr /></h4>
			<?php
				$num=0;
				$query1="SELECT * FROM `complaints`";
				$seee="SELECT * FROM `inprogresscomp`";
				$reso=mysqli_query($conn,$seee);
					
					if($reso)
					{
						while($inpro=mysqli_fetch_assoc($reso))
						{
							$inid=$inpro['compnum'];
						$result=mysqli_query($conn,$query1);
						
						if($result)
							{
							while($row=mysqli_fetch_assoc($result))
								{				
										$id=$row['id'];
										if($id==$inid)
										{
											$num++;
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>
											
											<form method='POST' action='solveinpro1.php'>
											<input type='text' name='user' value='$usr' class='now'>
											<input type='text' name='compid' value='$id' class='now'>
											<input type='submit' value='complete it' style='float:right;margin:0px;' class='btn btn-secondary' >
											</form>
											
											Number:$num  
											User: $usr  				
											</h5>";
											echo"<h6>File:               ";
											if($fil==""||$fil=='0')
											{
												
											echo "<span id='span'>No file</span><br />";
											}
											else{
											echo "<a href='$fil' target='_blank'>view file</a><br />";
											}
											 echo "Complaint-categoty:<span id='span'> $cate</span><br />
											 Complaint-Subcategoty:   <span id='span'>$subcate</span><br />
											 Complaint-Nature:        <span id='span'>$nat</span><br />
											 Complaint-Date:          <span id='span'>$da</span><br />
											 COMLAINT >               <span id='span'>$co</span><br /></h6><br /><hr />";
										}
										
									
								}
							}
						}
					}
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------inprogress-->
			<!----------------------------------------------------------------------------------------completed-->
			
			<div class="" id="complcomp" style="width:97%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(91, 12, 9,.1);border:1px #789DBC;">
			<h4>Completed Complaints<hr /></h4>
				<?php
				$num=0;
				$query1="SELECT * FROM `complaints`";
				$seee="SELECT * FROM `completedcomp`";
				$reso=mysqli_query($conn,$seee);
					
					if($reso)
					{
						while($coomp=mysqli_fetch_assoc($reso))
						{
							$cid=$coomp['compnum'];
							$remark=$coomp['remark'];
						$result=mysqli_query($conn,$query1);
						
						if($result)
							{
							while($row=mysqli_fetch_assoc($result))
								{				
										$id=$row['id'];
										if($id==$cid)
										{
											$num++;
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>											
											Number:$num  
											User: $usr  				
											</h5>
											<h6>
											 Remark :<span id='remark'>$remark</span><br />
											";
											echo"File:               ";
											if($fil==""||$fil=='0')
											{
												
											echo "<span id='span'>No file</span><br />";
											}
											else{
											echo "<a href='$fil' target='_blank'>view file</a><br />";
											}
											 echo "
											 Complaint-categoty:<span id='span'> $cate</span><br />
											 Complaint-Subcategoty:   <span id='span'>$subcate</span><br />
											 Complaint-Nature:        <span id='span'>$nat</span><br />
											 Complaint-Date:          <span id='span'>$da</span><br />
											 COMLAINT >               <span id='span'>$co</span><br /></h6><br /><hr />";
										}
										
									
								}
							}
						}
					}
				?>
			</div>
			
			<!----------------------------------------------------------------------------------------inprogress-->
			<!----------------------------------------------------------------------------------------full-->
			
			<div class="" id="fullhistory" style="width:97%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(91, 12, 9,.1);border:1px #789DBC;">
			<h3>Full history of Complaints<hr /></h3>
				<h4>Pending Complaints<hr /></h4>
				<?php
					$query1="SELECT * FROM `complaints`";
					$result=mysqli_query($conn,$query1);
						$num=0;
				
						if($result)
						{
							while($row=mysqli_fetch_assoc($result))
								{
									
									$cme=$row['pending'];
									if($cme=='1')
									{
										
										$num++;
											$id=$row['id'];
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>
											
											<form method='POST' action='solvepend1.php'>
											<input type='text' name='user' value='$usr' class='now'>
											<input type='text' name='compid' value='$id' class='now'>
											<input type='submit' value='solve it' style='float:right;margin:0px;' class='btn btn-info' >
											</form>
											
											Number:$num  
											User: $usr  
																					
											</h5>";
											echo"<h6>File:               ";
											if($fil==""||$fil=='0')
											{
												
											echo "<span id='span'>No file</span><br />";
											}
											else{
											echo "<a href='$fil' target='_blank'>view file</a><br />";
											}
											 echo "Complaint-categoty:<span id='span'> $cate</span><br />
											 Complaint-Subcategoty:   <span id='span'>$subcate</span><br />
											 Complaint-Nature:        <span id='span'>$nat</span><br />
											 Complaint-Date:          <span id='span'>$da</span><br />
											 COMLAINT >               <span id='span'>$co</span><br /></h6><br /><hr />";
										
									}
								}
						}
						
						
						//////////////////////////////////////////////////////////////////////////////////////////////////////////////
						echo "<br /br /><h4>Inprogress Complaints<hr /></h4>";
						$num=0;
				$query1="SELECT * FROM `complaints`";
				$seee="SELECT * FROM `inprogresscomp`";
				$reso=mysqli_query($conn,$seee);
					
					if($reso)
					{
						while($inpro=mysqli_fetch_assoc($reso))
						{
							$inid=$inpro['compnum'];
						$result=mysqli_query($conn,$query1);
						
						if($result)
							{
							while($row=mysqli_fetch_assoc($result))
								{				
										$id=$row['id'];
										if($id==$inid)
										{
											$num++;
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>
											
											<form method='POST' action='solveinpro1.php'>
											<input type='text' name='user' value='$usr' class='now'>
											<input type='text' name='compid' value='$id' class='now'>
											<input type='submit' value='complete it' style='float:right;margin:0px;' class='btn btn-secondary' >
											</form>
											
											Number:$num  
											User: $usr  				
											</h5>";
											echo"<h6>File:               ";
											if($fil==""||$fil=='0')
											{
												
											echo "<span id='span'>No file</span><br />";
											}
											else{
											echo "<a href='$fil' target='_blank'>view file</a><br />";
											}
											 echo "Complaint-categoty:<span id='span'> $cate</span><br />
											 Complaint-Subcategoty:   <span id='span'>$subcate</span><br />
											 Complaint-Nature:        <span id='span'>$nat</span><br />
											 Complaint-Date:          <span id='span'>$da</span><br />
											 COMLAINT >               <span id='span'>$co</span><br /></h6><br /><hr />";
										}
										
									
								}
							}
						}
					}
					/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						//////////////////////////////////////////////////////////////////////////////////////////////////////////////
						echo "<br /br /><h4>Completed Complaints<hr /></h4>";	

				$num=0;
				$query1="SELECT * FROM `complaints`";
				$seee="SELECT * FROM `completedcomp`";
				$reso=mysqli_query($conn,$seee);
					
					if($reso)
					{
						while($coomp=mysqli_fetch_assoc($reso))
						{
							$cid=$coomp['compnum'];
							$remark=$coomp['remark'];
						$result=mysqli_query($conn,$query1);
						
						if($result)
							{
							while($row=mysqli_fetch_assoc($result))
								{				
										$id=$row['id'];
										if($id==$cid)
										{
											$num++;
											$usr=$row['user'];
											$cate=$row['category'];
											$subcate=$row['subcategory'];
											$nat=$row['nature'];
											$da=$row['date'];
											$fil=$row['file'];
											$co=$row['comp'];
											echo "<h5 class='tr'>											
											Number:$num  
											User: $usr  				
											</h5>
											<h6>
											 Remark :<span id='remark'>$remark</span><br />
											";
											echo"File:               ";
											if($fil==""||$fil=='0')
											{
												
											echo "<span id='span'>No file</span><br />";
											}
											else{
											echo "<a href='$fil' target='_blank'>view file</a><br />";
											}
											 echo "
											 Complaint-categoty:<span id='span'> $cate</span><br />
											 Complaint-Subcategoty:   <span id='span'>$subcate</span><br />
											 Complaint-Nature:        <span id='span'>$nat</span><br />
											 Complaint-Date:          <span id='span'>$da</span><br />
											 COMLAINT >               <span id='span'>$co</span><br /></h6><br /><hr />";
										}
										
									
								}
							}
						}
					}						
					////////////////////////////////////////////////////////
			?>
			</div>
			
			<!----------------------------------------------------------------------------------------full-->
		
			<!----------------------------------------------------------------------------------------all-user-->
			
			<div class="" id="alluser" style="width:97%;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(91, 12, 9,.1);border:1px #789DBC;">
    <h4>All Users data<hr /></h4>
    
    <?php
    $num = 0;
    $userss = "SELECT * FROM `userregistration`";
    $result786 = mysqli_query($conn, $userss);
    
    if ($result786) {
        // Start the table outside the loop
        echo "
        <table class='table table-striped table-info table-hover'>
			<thead>
				<tr>
					<th>Id</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Username</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th>Gender</th>
					<th>Date</th>
				</tr>


					
				<tbody>";
        
        // Loop through users and add rows
        while ($rowuser = mysqli_fetch_assoc($result786)) {
            $num++;
            $fnamen = $rowuser['fname'];
            $lnamen = $rowuser['lname'];
            $usern = $rowuser['username'];
            $mailn = $rowuser['email'];
            $phonen = $rowuser['phone'];
            $gendern = $rowuser['gender'];
            $daten = $rowuser['date'];
            echo "
            <tr>
                <td>$num</td>
                <td>$fnamen</td>
                <td>$lnamen</td>
                <td>$usern</td>
                <td>$mailn</td>
                <td>$phonen</td>
                <td>$gendern</td>
                <td>$daten</td>
            </tr>";
        }
        
        // Close the table
        echo "</tbody></table>";
    }
    ?>
</div>

			
			<!----------------------------------------------------------------------------------------all-user-->
					<!----------------------------------------------------------------------------------------Login-->	
					<div class="" id="logindata" style="width:97%;float:left;display:none;border-radius:15px;padding:15px;margin:10px;background-color:rgba(91, 12, 9,.1);border:1px #789DBC;">
    <h3 style="text-align:center;">Login data<hr /></h3>
    
    <?php
    $num = 0;
    $users = "SELECT * FROM `userloginfo`";
    $result78 = mysqli_query($conn, query: $users);
    
    if ($result78) {
        // Start the table outside the loop
        echo "
        <table class='table table-striped table-danger table-hover'>
            <thead>
                <tr>
                    <th>Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>";

        // Loop through users and add rows
        while ($rowuser = mysqli_fetch_assoc($result78)) {
            $num++;
            $fnamen = $rowuser['fname'];
            $lnamen = $rowuser['lname'];
            $usern = $rowuser['user'];
            $daten = $rowuser['date'];
            echo "
            <tr>
                <td>$num</td>
                <td>$fnamen</td>
                <td>$lnamen</td>
                <td>$usern</td>
                <td>$daten</td>
            </tr>";
        }
        
        // Close the table
        echo "</tbody></table>";
    }
    ?>
</div>

			
			<!----------------------------------------------------------------------------------------Login-->
			
			</div>
			<?php include 'footer.php'; ?>
		</div>
		

		<script>
    function showSidebar(){
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'flex'
    }
    function hideSidebar(){
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'none'
    }
  </script>

	


	</body>
</html>