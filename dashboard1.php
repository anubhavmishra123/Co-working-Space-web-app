
<html>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="dashcss.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
    

<div class="w3-sidebar w3-bar-block w3-black w3-xxlarge" style="width:50px;font-size:25px!important;">
    <br>
    <br>
  <a href="dashboard1.php" class="w3-bar-item w3-button" style="background-color:#F1F1F1;color:black;"><i class="fa fa-home" ></i></a> <br>
  <a href="groupchat1.php" class="w3-bar-item w3-button"><i class="fa fa-users"></i></a> <br>
  <a href="chat1.php" class="w3-bar-item w3-button"><i class="fa fa-paper-plane-o"></i></a> <br>
  <a href="TaskManager1.php" class="w3-bar-item w3-button"><i class="fa fa-tasks"></i></a><br>
  <a href="setting1.php" class="w3-bar-item w3-button"><i class="fa fa-gear"></i></a><br>
  <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i></a> <br>
</div>

<div style="margin-left:70px">

<nav class="navbar navbar-default navbar-expand-lg navbar-light">
	<div class="navbar-header d-flex col">
		<a class="navbar-brand" href="#">Co-working<b>Space</b></a>  		
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler ml-auto">
			<span class="navbar-toggler-icon"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-end">
<ul class="nav navbar-nav navbar-right"  >
    <li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
    <li class="nav-item "><a href="#" class="nav-link">Pricing</a></li>
			<li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
			<li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i class="fa fa-user-circle-o" >&nbsp;&nbsp;<?php 

      session_start();
                echo $_SESSION['email']; 
                
?> </i><b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="logout.php" class="dropdown-item">LogOut</a></a></a></li>
				
				</ul>
			</li>
</ul>

		</div>
		</nav>


</div>

<div class="main-content">
			<div class="title">
				Dashboard
			</div>
			
			<div class="main">
				<div class="widget">
					<div class="title">Members</div>
					<div class="chart">
				<?php	$servername = "shareddb-s.hosting.stackcp.net";
$database = "anudbms-313235305e";
$username = "anudbms-313235305e";
$password = "welcome123";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
    $check_user1="select * from member WHERE groupid='".$_SESSION['sessionid']."'";
    $check_user="select * from admins WHERE adminid='".$_SESSION['sessionid']."'";
  
    
    $run1=mysqli_query($conn,$check_user1);
    $run=mysqli_query($conn,$check_user);
    
  
    $count=mysqli_num_rows($run1);
    $count1=mysqli_num_rows($run);
    $number= "c100 p".$count;
    $number1= "c100 p".$count1;
    ?>  
		<div class="<?php echo $number ?>">		

  <span><?php echo $count ?></span>

  <div class="slice">
    <div class="bar"></div>
    <div class="fill"></div>
  </div>
</div>
					    
					    
					</div>
				</div>
				<div class="widget">
					<div class="title">Admins</div>
					<div class="chart">
					    
					    <div class="<?php echo $number1 ?>">

  <span><?php echo $count1 ?></span>

  <div class="slice">
    <div class="bar"></div>
    <div class="fill"></div>
  </div>
</div>
					    
					</div>
				</div>
				<div class="widget">
					<div class="title">Tasks</div>
					<div class="chart">
					    
					    <div class="c100 p25">

  <span>25</span>

  <div class="slice">
    <div class="bar"></div>
    <div class="fill"></div>
  </div>
</div>
					    
					</div>
				</div>
			</div>
			<div>
			<div class="title">
			User Story
			</div>
			 <center><div class="story">
			   
			    <div id="group_chat_dialog" title="Group Chat Window">
 
 <br>
 <br>
 <div class="form-group">
  <textarea name="group_chat_message" id="group_chat_message" placeholder="Whats on your mind ?"class="form-control"></textarea>
 </div>
 <div class="form-group" >
<font size="6"><i class="fa fa-picture-o" aria-hidden="true"></i></font>&nbsp;&nbsp;<input type="file" placeholder="Choose a file ..." name="image" id="image" class="image">&nbsp;&nbsp;
 <button type="button"  name="send_group_chat" id="send_group_chat" class="btn btn-info">Share</button>
 </div></center>
 <div id="group_chat_history" >
hello
 </div>

		    
			    
			    
			    </div>
			</div>
		</div>
 <script>
  $('#send_group_chat').click(function(){
 var chat_message = $('#group_chat_message').val();
 var action = 'insert_data';
 var file_name=$('.image').val();
 var formData = new FormData();
			formData.append('fileupload',$( '.image' )[0].files[0], file_name);
			formData.append('action',action);
			formData.append('chat_message',chat_message);
 
  $.ajax({
   url:"userstory.php",
   method:"POST",
   processData: false,
   contentType: false,
   data:formData,
   success:function(data){
    $('#group_chat_message').val('');
    document.getElementById('image').value="";
   
   }
  })
 
});


function fetch_group_chat_history()
{
    
var action = "fetch_data";
 $.ajax({
   url:"userstory.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
      
   $('#group_chat_history').html(data);
   }
  })
 
}

setInterval(fetch_group_chat_history,1000);
 </script>
		
		<style>
		.story{
		    
		    width:70%;
		    
		}
		#group_chat_message{
		    
		    width:50%;
		    height:16%;
		    
		}
		.list-unstyled
		{font-size:8%!important;
		border:1px solid grey;
		box-shadow:2px 2px;
		    background-color:white;
		}
		.list-unstyled:hover
		{
		    background-color:#EEF1F7;
		}
		#group_chat_history{
		    
		    margin-left:2px;
		    
		}
		#fileimage{
		    width:30%;
		    height:40%;
		}
@media only screen and (max-width: 600px) {
	#fileimage{
		    width:80%;
		    
		}
    #group_chat_message{
		    
		    width:100%;
		    height:16%;
		    
		}
		#image{
		    margin-top:5%;
		    margin-bottom:5%;
		}
    
    
    
}







		</style>
		
		
		</div>
		
		<style>
		.rect-auto,
.c100.p51 .slice,
.c100.p52 .slice,
.c100.p53 .slice,
.c100.p54 .slice,
.c100.p55 .slice,
.c100.p56 .slice,
.c100.p57 .slice,
.c100.p58 .slice,
.c100.p59 .slice,
.c100.p60 .slice,
.c100.p61 .slice,
.c100.p62 .slice,
.c100.p63 .slice,
.c100.p64 .slice,
.c100.p65 .slice,
.c100.p66 .slice,
.c100.p67 .slice,
.c100.p68 .slice,
.c100.p69 .slice,
.c100.p70 .slice,
.c100.p71 .slice,
.c100.p72 .slice,
.c100.p73 .slice,
.c100.p74 .slice,
.c100.p75 .slice,
.c100.p76 .slice,
.c100.p77 .slice,
.c100.p78 .slice,
.c100.p79 .slice,
.c100.p80 .slice,
.c100.p81 .slice,
.c100.p82 .slice,
.c100.p83 .slice,
.c100.p84 .slice,
.c100.p85 .slice,
.c100.p86 .slice,
.c100.p87 .slice,
.c100.p88 .slice,
.c100.p89 .slice,
.c100.p90 .slice,
.c100.p91 .slice,
.c100.p92 .slice,
.c100.p93 .slice,
.c100.p94 .slice,
.c100.p95 .slice,
.c100.p96 .slice,
.c100.p97 .slice,
.c100.p98 .slice,
.c100.p99 .slice,
.c100.p100 .slice {
  clip: rect(auto, auto, auto, auto);
}
.pie,
.c100 .bar,
.c100.p51 .fill,
.c100.p52 .fill,
.c100.p53 .fill,
.c100.p54 .fill,
.c100.p55 .fill,
.c100.p56 .fill,
.c100.p57 .fill,
.c100.p58 .fill,
.c100.p59 .fill,
.c100.p60 .fill,
.c100.p61 .fill,
.c100.p62 .fill,
.c100.p63 .fill,
.c100.p64 .fill,
.c100.p65 .fill,
.c100.p66 .fill,
.c100.p67 .fill,
.c100.p68 .fill,
.c100.p69 .fill,
.c100.p70 .fill,
.c100.p71 .fill,
.c100.p72 .fill,
.c100.p73 .fill,
.c100.p74 .fill,
.c100.p75 .fill,
.c100.p76 .fill,
.c100.p77 .fill,
.c100.p78 .fill,
.c100.p79 .fill,
.c100.p80 .fill,
.c100.p81 .fill,
.c100.p82 .fill,
.c100.p83 .fill,
.c100.p84 .fill,
.c100.p85 .fill,
.c100.p86 .fill,
.c100.p87 .fill,
.c100.p88 .fill,
.c100.p89 .fill,
.c100.p90 .fill,
.c100.p91 .fill,
.c100.p92 .fill,
.c100.p93 .fill,
.c100.p94 .fill,
.c100.p95 .fill,
.c100.p96 .fill,
.c100.p97 .fill,
.c100.p98 .fill,
.c100.p99 .fill,
.c100.p100 .fill {
    
  position: absolute;
  border: 0.08em solid black;
  width: 0.84em;
  height: 0.84em;
  clip: rect(0em, 0.5em, 1em, 0em);
  border-radius: 50%;
  -webkit-transform: rotate(0deg);
  -moz-transform: rotate(0deg);
  -ms-transform: rotate(0deg);
  -o-transform: rotate(0deg);
  transform: rotate(0deg);
}
.pie-fill,
.c100.p51 .bar:after,
.c100.p51 .fill,
.c100.p52 .bar:after,
.c100.p52 .fill,
.c100.p53 .bar:after,
.c100.p53 .fill,
.c100.p54 .bar:after,
.c100.p54 .fill,
.c100.p55 .bar:after,
.c100.p55 .fill,
.c100.p56 .bar:after,
.c100.p56 .fill,
.c100.p57 .bar:after,
.c100.p57 .fill,
.c100.p58 .bar:after,
.c100.p58 .fill,
.c100.p59 .bar:after,
.c100.p59 .fill,
.c100.p60 .bar:after,
.c100.p60 .fill,
.c100.p61 .bar:after,
.c100.p61 .fill,
.c100.p62 .bar:after,
.c100.p62 .fill,
.c100.p63 .bar:after,
.c100.p63 .fill,
.c100.p64 .bar:after,
.c100.p64 .fill,
.c100.p65 .bar:after,
.c100.p65 .fill,
.c100.p66 .bar:after,
.c100.p66 .fill,
.c100.p67 .bar:after,
.c100.p67 .fill,
.c100.p68 .bar:after,
.c100.p68 .fill,
.c100.p69 .bar:after,
.c100.p69 .fill,
.c100.p70 .bar:after,
.c100.p70 .fill,
.c100.p71 .bar:after,
.c100.p71 .fill,
.c100.p72 .bar:after,
.c100.p72 .fill,
.c100.p73 .bar:after,
.c100.p73 .fill,
.c100.p74 .bar:after,
.c100.p74 .fill,
.c100.p75 .bar:after,
.c100.p75 .fill,
.c100.p76 .bar:after,
.c100.p76 .fill,
.c100.p77 .bar:after,
.c100.p77 .fill,
.c100.p78 .bar:after,
.c100.p78 .fill,
.c100.p79 .bar:after,
.c100.p79 .fill,
.c100.p80 .bar:after,
.c100.p80 .fill,
.c100.p81 .bar:after,
.c100.p81 .fill,
.c100.p82 .bar:after,
.c100.p82 .fill,
.c100.p83 .bar:after,
.c100.p83 .fill,
.c100.p84 .bar:after,
.c100.p84 .fill,
.c100.p85 .bar:after,
.c100.p85 .fill,
.c100.p86 .bar:after,
.c100.p86 .fill,
.c100.p87 .bar:after,
.c100.p87 .fill,
.c100.p88 .bar:after,
.c100.p88 .fill,
.c100.p89 .bar:after,
.c100.p89 .fill,
.c100.p90 .bar:after,
.c100.p90 .fill,
.c100.p91 .bar:after,
.c100.p91 .fill,
.c100.p92 .bar:after,
.c100.p92 .fill,
.c100.p93 .bar:after,
.c100.p93 .fill,
.c100.p94 .bar:after,
.c100.p94 .fill,
.c100.p95 .bar:after,
.c100.p95 .fill,
.c100.p96 .bar:after,
.c100.p96 .fill,
.c100.p97 .bar:after,
.c100.p97 .fill,
.c100.p98 .bar:after,
.c100.p98 .fill,
.c100.p99 .bar:after,
.c100.p99 .fill,
.c100.p100 .bar:after,
.c100.p100 .fill {
  -webkit-transform: rotate(180deg);
  -moz-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  transform: rotate(180deg);
}
.c100 {
  position: relative;
  font-size: 120px;
  width: 1em;
  height: 1em;
  border-radius: 50%;
  float: left;
  margin-left:35%;
  margin-top:16%;
  background-color: #cccccc;
}
.c100 *,
.c100 *:before,
.c100 *:after {
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
}
.c100.center {
  float: none;
  margin: 0 auto;
}
.c100.big {
  font-size: 240px;
}
.c100.small {
  font-size: 80px;
}
.c100 > span {
  position: absolute;
  width: 100%;
  z-index: 1;
  left: 0;
  top: 0;
  width: 5em;
  line-height: 5em;
  font-size: 0.2em;
  color: #cccccc;
  display: block;
  text-align: center;
  white-space: nowrap;
  -webkit-transition-property: all;
  -moz-transition-property: all;
  -o-transition-property: all;
  transition-property: all;
  -webkit-transition-duration: 0.2s;
  -moz-transition-duration: 0.2s;
  -o-transition-duration: 0.2s;
  transition-duration: 0.2s;
  -webkit-transition-timing-function: ease-out;
  -moz-transition-timing-function: ease-out;
  -o-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.c100:after {
  position: absolute;
  top: 0.08em;
  left: 0.08em;
  display: block;
  content: " ";
  border-radius: 50%;
  background-color: #f5f5f5;
  width: 0.84em;
  height: 0.84em;
  -webkit-transition-property: all;
  -moz-transition-property: all;
  -o-transition-property: all;
  transition-property: all;
  -webkit-transition-duration: 0.2s;
  -moz-transition-duration: 0.2s;
  -o-transition-duration: 0.2s;
  transition-duration: 0.2s;
  -webkit-transition-timing-function: ease-in;
  -moz-transition-timing-function: ease-in;
  -o-transition-timing-function: ease-in;
  transition-timing-function: ease-in;
}
.c100 .slice {
  position: absolute;
  width: 1em;
  height: 1em;
  clip: rect(0em, 1em, 1em, 0.5em);
}
.c100.p1 .bar {
  -webkit-transform: rotate(3.6deg);
  -moz-transform: rotate(3.6deg);
  -ms-transform: rotate(3.6deg);
  -o-transform: rotate(3.6deg);
  transform: rotate(3.6deg);
}
.c100.p2 .bar {
  -webkit-transform: rotate(7.2deg);
  -moz-transform: rotate(7.2deg);
  -ms-transform: rotate(7.2deg);
  -o-transform: rotate(7.2deg);
  transform: rotate(7.2deg);
}
.c100.p3 .bar {
  -webkit-transform: rotate(10.8deg);
  -moz-transform: rotate(10.8deg);
  -ms-transform: rotate(10.8deg);
  -o-transform: rotate(10.8deg);
  transform: rotate(10.8deg);
}
.c100.p4 .bar {
  -webkit-transform: rotate(14.4deg);
  -moz-transform: rotate(14.4deg);
  -ms-transform: rotate(14.4deg);
  -o-transform: rotate(14.4deg);
  transform: rotate(14.4deg);
}
.c100.p5 .bar {
  -webkit-transform: rotate(18deg);
  -moz-transform: rotate(18deg);
  -ms-transform: rotate(18deg);
  -o-transform: rotate(18deg);
  transform: rotate(18deg);
}
.c100.p6 .bar {
  -webkit-transform: rotate(21.6deg);
  -moz-transform: rotate(21.6deg);
  -ms-transform: rotate(21.6deg);
  -o-transform: rotate(21.6deg);
  transform: rotate(21.6deg);
}
.c100.p7 .bar {
  -webkit-transform: rotate(25.2deg);
  -moz-transform: rotate(25.2deg);
  -ms-transform: rotate(25.2deg);
  -o-transform: rotate(25.2deg);
  transform: rotate(25.2deg);
}
.c100.p8 .bar {
  -webkit-transform: rotate(28.8deg);
  -moz-transform: rotate(28.8deg);
  -ms-transform: rotate(28.8deg);
  -o-transform: rotate(28.8deg);
  transform: rotate(28.8deg);
}
.c100.p9 .bar {
  -webkit-transform: rotate(32.4deg);
  -moz-transform: rotate(32.4deg);
  -ms-transform: rotate(32.4deg);
  -o-transform: rotate(32.4deg);
  transform: rotate(32.4deg);
}
.c100.p10 .bar {
  -webkit-transform: rotate(36deg);
  -moz-transform: rotate(36deg);
  -ms-transform: rotate(36deg);
  -o-transform: rotate(36deg);
  transform: rotate(36deg);
}
.c100.p11 .bar {
  -webkit-transform: rotate(39.6deg);
  -moz-transform: rotate(39.6deg);
  -ms-transform: rotate(39.6deg);
  -o-transform: rotate(39.6deg);
  transform: rotate(39.6deg);
}
.c100.p12 .bar {
  -webkit-transform: rotate(43.2deg);
  -moz-transform: rotate(43.2deg);
  -ms-transform: rotate(43.2deg);
  -o-transform: rotate(43.2deg);
  transform: rotate(43.2deg);
}
.c100.p13 .bar {
  -webkit-transform: rotate(46.800000000000004deg);
  -moz-transform: rotate(46.800000000000004deg);
  -ms-transform: rotate(46.800000000000004deg);
  -o-transform: rotate(46.800000000000004deg);
  transform: rotate(46.800000000000004deg);
}
.c100.p14 .bar {
  -webkit-transform: rotate(50.4deg);
  -moz-transform: rotate(50.4deg);
  -ms-transform: rotate(50.4deg);
  -o-transform: rotate(50.4deg);
  transform: rotate(50.4deg);
}
.c100.p15 .bar {
  -webkit-transform: rotate(54deg);
  -moz-transform: rotate(54deg);
  -ms-transform: rotate(54deg);
  -o-transform: rotate(54deg);
  transform: rotate(54deg);
}
.c100.p16 .bar {
  -webkit-transform: rotate(57.6deg);
  -moz-transform: rotate(57.6deg);
  -ms-transform: rotate(57.6deg);
  -o-transform: rotate(57.6deg);
  transform: rotate(57.6deg);
}
.c100.p17 .bar {
  -webkit-transform: rotate(61.2deg);
  -moz-transform: rotate(61.2deg);
  -ms-transform: rotate(61.2deg);
  -o-transform: rotate(61.2deg);
  transform: rotate(61.2deg);
}
.c100.p18 .bar {
  -webkit-transform: rotate(64.8deg);
  -moz-transform: rotate(64.8deg);
  -ms-transform: rotate(64.8deg);
  -o-transform: rotate(64.8deg);
  transform: rotate(64.8deg);
}
.c100.p19 .bar {
  -webkit-transform: rotate(68.4deg);
  -moz-transform: rotate(68.4deg);
  -ms-transform: rotate(68.4deg);
  -o-transform: rotate(68.4deg);
  transform: rotate(68.4deg);
}
.c100.p20 .bar {
  -webkit-transform: rotate(72deg);
  -moz-transform: rotate(72deg);
  -ms-transform: rotate(72deg);
  -o-transform: rotate(72deg);
  transform: rotate(72deg);
}
.c100.p21 .bar {
  -webkit-transform: rotate(75.60000000000001deg);
  -moz-transform: rotate(75.60000000000001deg);
  -ms-transform: rotate(75.60000000000001deg);
  -o-transform: rotate(75.60000000000001deg);
  transform: rotate(75.60000000000001deg);
}
.c100.p22 .bar {
  -webkit-transform: rotate(79.2deg);
  -moz-transform: rotate(79.2deg);
  -ms-transform: rotate(79.2deg);
  -o-transform: rotate(79.2deg);
  transform: rotate(79.2deg);
}
.c100.p23 .bar {
  -webkit-transform: rotate(82.8deg);
  -moz-transform: rotate(82.8deg);
  -ms-transform: rotate(82.8deg);
  -o-transform: rotate(82.8deg);
  transform: rotate(82.8deg);
}
.c100.p24 .bar {
  -webkit-transform: rotate(86.4deg);
  -moz-transform: rotate(86.4deg);
  -ms-transform: rotate(86.4deg);
  -o-transform: rotate(86.4deg);
  transform: rotate(86.4deg);
}
.c100.p25 .bar {
  -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  transform: rotate(90deg);
}
.c100.p26 .bar {
  -webkit-transform: rotate(93.60000000000001deg);
  -moz-transform: rotate(93.60000000000001deg);
  -ms-transform: rotate(93.60000000000001deg);
  -o-transform: rotate(93.60000000000001deg);
  transform: rotate(93.60000000000001deg);
}
.c100.p27 .bar {
  -webkit-transform: rotate(97.2deg);
  -moz-transform: rotate(97.2deg);
  -ms-transform: rotate(97.2deg);
  -o-transform: rotate(97.2deg);
  transform: rotate(97.2deg);
}
.c100.p28 .bar {
  -webkit-transform: rotate(100.8deg);
  -moz-transform: rotate(100.8deg);
  -ms-transform: rotate(100.8deg);
  -o-transform: rotate(100.8deg);
  transform: rotate(100.8deg);
}
.c100.p29 .bar {
  -webkit-transform: rotate(104.4deg);
  -moz-transform: rotate(104.4deg);
  -ms-transform: rotate(104.4deg);
  -o-transform: rotate(104.4deg);
  transform: rotate(104.4deg);
}
.c100.p30 .bar {
  -webkit-transform: rotate(108deg);
  -moz-transform: rotate(108deg);
  -ms-transform: rotate(108deg);
  -o-transform: rotate(108deg);
  transform: rotate(108deg);
}
.c100.p31 .bar {
  -webkit-transform: rotate(111.60000000000001deg);
  -moz-transform: rotate(111.60000000000001deg);
  -ms-transform: rotate(111.60000000000001deg);
  -o-transform: rotate(111.60000000000001deg);
  transform: rotate(111.60000000000001deg);
}
.c100.p32 .bar {
  -webkit-transform: rotate(115.2deg);
  -moz-transform: rotate(115.2deg);
  -ms-transform: rotate(115.2deg);
  -o-transform: rotate(115.2deg);
  transform: rotate(115.2deg);
}
.c100.p33 .bar {
  -webkit-transform: rotate(118.8deg);
  -moz-transform: rotate(118.8deg);
  -ms-transform: rotate(118.8deg);
  -o-transform: rotate(118.8deg);
  transform: rotate(118.8deg);
}
.c100.p34 .bar {
  -webkit-transform: rotate(122.4deg);
  -moz-transform: rotate(122.4deg);
  -ms-transform: rotate(122.4deg);
  -o-transform: rotate(122.4deg);
  transform: rotate(122.4deg);
}
.c100.p35 .bar {
  -webkit-transform: rotate(126deg);
  -moz-transform: rotate(126deg);
  -ms-transform: rotate(126deg);
  -o-transform: rotate(126deg);
  transform: rotate(126deg);
}
.c100.p36 .bar {
  -webkit-transform: rotate(129.6deg);
  -moz-transform: rotate(129.6deg);
  -ms-transform: rotate(129.6deg);
  -o-transform: rotate(129.6deg);
  transform: rotate(129.6deg);
}
.c100.p37 .bar {
  -webkit-transform: rotate(133.20000000000002deg);
  -moz-transform: rotate(133.20000000000002deg);
  -ms-transform: rotate(133.20000000000002deg);
  -o-transform: rotate(133.20000000000002deg);
  transform: rotate(133.20000000000002deg);
}
.c100.p38 .bar {
  -webkit-transform: rotate(136.8deg);
  -moz-transform: rotate(136.8deg);
  -ms-transform: rotate(136.8deg);
  -o-transform: rotate(136.8deg);
  transform: rotate(136.8deg);
}
.c100.p39 .bar {
  -webkit-transform: rotate(140.4deg);
  -moz-transform: rotate(140.4deg);
  -ms-transform: rotate(140.4deg);
  -o-transform: rotate(140.4deg);
  transform: rotate(140.4deg);
}
.c100.p40 .bar {
  -webkit-transform: rotate(144deg);
  -moz-transform: rotate(144deg);
  -ms-transform: rotate(144deg);
  -o-transform: rotate(144deg);
  transform: rotate(144deg);
}
.c100.p41 .bar {
  -webkit-transform: rotate(147.6deg);
  -moz-transform: rotate(147.6deg);
  -ms-transform: rotate(147.6deg);
  -o-transform: rotate(147.6deg);
  transform: rotate(147.6deg);
}
.c100.p42 .bar {
  -webkit-transform: rotate(151.20000000000002deg);
  -moz-transform: rotate(151.20000000000002deg);
  -ms-transform: rotate(151.20000000000002deg);
  -o-transform: rotate(151.20000000000002deg);
  transform: rotate(151.20000000000002deg);
}
.c100.p43 .bar {
  -webkit-transform: rotate(154.8deg);
  -moz-transform: rotate(154.8deg);
  -ms-transform: rotate(154.8deg);
  -o-transform: rotate(154.8deg);
  transform: rotate(154.8deg);
}
.c100.p44 .bar {
  -webkit-transform: rotate(158.4deg);
  -moz-transform: rotate(158.4deg);
  -ms-transform: rotate(158.4deg);
  -o-transform: rotate(158.4deg);
  transform: rotate(158.4deg);
}
.c100.p45 .bar {
  -webkit-transform: rotate(162deg);
  -moz-transform: rotate(162deg);
  -ms-transform: rotate(162deg);
  -o-transform: rotate(162deg);
  transform: rotate(162deg);
}
.c100.p46 .bar {
  -webkit-transform: rotate(165.6deg);
  -moz-transform: rotate(165.6deg);
  -ms-transform: rotate(165.6deg);
  -o-transform: rotate(165.6deg);
  transform: rotate(165.6deg);
}
.c100.p47 .bar {
  -webkit-transform: rotate(169.20000000000002deg);
  -moz-transform: rotate(169.20000000000002deg);
  -ms-transform: rotate(169.20000000000002deg);
  -o-transform: rotate(169.20000000000002deg);
  transform: rotate(169.20000000000002deg);
}
.c100.p48 .bar {
  -webkit-transform: rotate(172.8deg);
  -moz-transform: rotate(172.8deg);
  -ms-transform: rotate(172.8deg);
  -o-transform: rotate(172.8deg);
  transform: rotate(172.8deg);
}
.c100.p49 .bar {
  -webkit-transform: rotate(176.4deg);
  -moz-transform: rotate(176.4deg);
  -ms-transform: rotate(176.4deg);
  -o-transform: rotate(176.4deg);
  transform: rotate(176.4deg);
}
.c100.p50 .bar {
  -webkit-transform: rotate(180deg);
  -moz-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  transform: rotate(180deg);
}
.c100.p51 .bar {
  -webkit-transform: rotate(183.6deg);
  -moz-transform: rotate(183.6deg);
  -ms-transform: rotate(183.6deg);
  -o-transform: rotate(183.6deg);
  transform: rotate(183.6deg);
}
.c100.p52 .bar {
  -webkit-transform: rotate(187.20000000000002deg);
  -moz-transform: rotate(187.20000000000002deg);
  -ms-transform: rotate(187.20000000000002deg);
  -o-transform: rotate(187.20000000000002deg);
  transform: rotate(187.20000000000002deg);
}
.c100.p53 .bar {
  -webkit-transform: rotate(190.8deg);
  -moz-transform: rotate(190.8deg);
  -ms-transform: rotate(190.8deg);
  -o-transform: rotate(190.8deg);
  transform: rotate(190.8deg);
}
.c100.p54 .bar {
  -webkit-transform: rotate(194.4deg);
  -moz-transform: rotate(194.4deg);
  -ms-transform: rotate(194.4deg);
  -o-transform: rotate(194.4deg);
  transform: rotate(194.4deg);
}
.c100.p55 .bar {
  -webkit-transform: rotate(198deg);
  -moz-transform: rotate(198deg);
  -ms-transform: rotate(198deg);
  -o-transform: rotate(198deg);
  transform: rotate(198deg);
}
.c100.p56 .bar {
  -webkit-transform: rotate(201.6deg);
  -moz-transform: rotate(201.6deg);
  -ms-transform: rotate(201.6deg);
  -o-transform: rotate(201.6deg);
  transform: rotate(201.6deg);
}
.c100.p57 .bar {
  -webkit-transform: rotate(205.20000000000002deg);
  -moz-transform: rotate(205.20000000000002deg);
  -ms-transform: rotate(205.20000000000002deg);
  -o-transform: rotate(205.20000000000002deg);
  transform: rotate(205.20000000000002deg);
}
.c100.p58 .bar {
  -webkit-transform: rotate(208.8deg);
  -moz-transform: rotate(208.8deg);
  -ms-transform: rotate(208.8deg);
  -o-transform: rotate(208.8deg);
  transform: rotate(208.8deg);
}
.c100.p59 .bar {
  -webkit-transform: rotate(212.4deg);
  -moz-transform: rotate(212.4deg);
  -ms-transform: rotate(212.4deg);
  -o-transform: rotate(212.4deg);
  transform: rotate(212.4deg);
}
.c100.p60 .bar {
  -webkit-transform: rotate(216deg);
  -moz-transform: rotate(216deg);
  -ms-transform: rotate(216deg);
  -o-transform: rotate(216deg);
  transform: rotate(216deg);
}
.c100.p61 .bar {
  -webkit-transform: rotate(219.6deg);
  -moz-transform: rotate(219.6deg);
  -ms-transform: rotate(219.6deg);
  -o-transform: rotate(219.6deg);
  transform: rotate(219.6deg);
}
.c100.p62 .bar {
  -webkit-transform: rotate(223.20000000000002deg);
  -moz-transform: rotate(223.20000000000002deg);
  -ms-transform: rotate(223.20000000000002deg);
  -o-transform: rotate(223.20000000000002deg);
  transform: rotate(223.20000000000002deg);
}
.c100.p63 .bar {
  -webkit-transform: rotate(226.8deg);
  -moz-transform: rotate(226.8deg);
  -ms-transform: rotate(226.8deg);
  -o-transform: rotate(226.8deg);
  transform: rotate(226.8deg);
}
.c100.p64 .bar {
  -webkit-transform: rotate(230.4deg);
  -moz-transform: rotate(230.4deg);
  -ms-transform: rotate(230.4deg);
  -o-transform: rotate(230.4deg);
  transform: rotate(230.4deg);
}
.c100.p65 .bar {
  -webkit-transform: rotate(234deg);
  -moz-transform: rotate(234deg);
  -ms-transform: rotate(234deg);
  -o-transform: rotate(234deg);
  transform: rotate(234deg);
}
.c100.p66 .bar {
  -webkit-transform: rotate(237.6deg);
  -moz-transform: rotate(237.6deg);
  -ms-transform: rotate(237.6deg);
  -o-transform: rotate(237.6deg);
  transform: rotate(237.6deg);
}
.c100.p67 .bar {
  -webkit-transform: rotate(241.20000000000002deg);
  -moz-transform: rotate(241.20000000000002deg);
  -ms-transform: rotate(241.20000000000002deg);
  -o-transform: rotate(241.20000000000002deg);
  transform: rotate(241.20000000000002deg);
}
.c100.p68 .bar {
  -webkit-transform: rotate(244.8deg);
  -moz-transform: rotate(244.8deg);
  -ms-transform: rotate(244.8deg);
  -o-transform: rotate(244.8deg);
  transform: rotate(244.8deg);
}
.c100.p69 .bar {
  -webkit-transform: rotate(248.4deg);
  -moz-transform: rotate(248.4deg);
  -ms-transform: rotate(248.4deg);
  -o-transform: rotate(248.4deg);
  transform: rotate(248.4deg);
}
.c100.p70 .bar {
  -webkit-transform: rotate(252deg);
  -moz-transform: rotate(252deg);
  -ms-transform: rotate(252deg);
  -o-transform: rotate(252deg);
  transform: rotate(252deg);
}
.c100.p71 .bar {
  -webkit-transform: rotate(255.6deg);
  -moz-transform: rotate(255.6deg);
  -ms-transform: rotate(255.6deg);
  -o-transform: rotate(255.6deg);
  transform: rotate(255.6deg);
}
.c100.p72 .bar {
  -webkit-transform: rotate(259.2deg);
  -moz-transform: rotate(259.2deg);
  -ms-transform: rotate(259.2deg);
  -o-transform: rotate(259.2deg);
  transform: rotate(259.2deg);
}
.c100.p73 .bar {
  -webkit-transform: rotate(262.8deg);
  -moz-transform: rotate(262.8deg);
  -ms-transform: rotate(262.8deg);
  -o-transform: rotate(262.8deg);
  transform: rotate(262.8deg);
}
.c100.p74 .bar {
  -webkit-transform: rotate(266.40000000000003deg);
  -moz-transform: rotate(266.40000000000003deg);
  -ms-transform: rotate(266.40000000000003deg);
  -o-transform: rotate(266.40000000000003deg);
  transform: rotate(266.40000000000003deg);
}
.c100.p75 .bar {
  -webkit-transform: rotate(270deg);
  -moz-transform: rotate(270deg);
  -ms-transform: rotate(270deg);
  -o-transform: rotate(270deg);
  transform: rotate(270deg);
}
.c100.p76 .bar {
  -webkit-transform: rotate(273.6deg);
  -moz-transform: rotate(273.6deg);
  -ms-transform: rotate(273.6deg);
  -o-transform: rotate(273.6deg);
  transform: rotate(273.6deg);
}
.c100.p77 .bar {
  -webkit-transform: rotate(277.2deg);
  -moz-transform: rotate(277.2deg);
  -ms-transform: rotate(277.2deg);
  -o-transform: rotate(277.2deg);
  transform: rotate(277.2deg);
}
.c100.p78 .bar {
  -webkit-transform: rotate(280.8deg);
  -moz-transform: rotate(280.8deg);
  -ms-transform: rotate(280.8deg);
  -o-transform: rotate(280.8deg);
  transform: rotate(280.8deg);
}
.c100.p79 .bar {
  -webkit-transform: rotate(284.40000000000003deg);
  -moz-transform: rotate(284.40000000000003deg);
  -ms-transform: rotate(284.40000000000003deg);
  -o-transform: rotate(284.40000000000003deg);
  transform: rotate(284.40000000000003deg);
}
.c100.p80 .bar {
  -webkit-transform: rotate(288deg);
  -moz-transform: rotate(288deg);
  -ms-transform: rotate(288deg);
  -o-transform: rotate(288deg);
  transform: rotate(288deg);
}
.c100.p81 .bar {
  -webkit-transform: rotate(291.6deg);
  -moz-transform: rotate(291.6deg);
  -ms-transform: rotate(291.6deg);
  -o-transform: rotate(291.6deg);
  transform: rotate(291.6deg);
}
.c100.p82 .bar {
  -webkit-transform: rotate(295.2deg);
  -moz-transform: rotate(295.2deg);
  -ms-transform: rotate(295.2deg);
  -o-transform: rotate(295.2deg);
  transform: rotate(295.2deg);
}
.c100.p83 .bar {
  -webkit-transform: rotate(298.8deg);
  -moz-transform: rotate(298.8deg);
  -ms-transform: rotate(298.8deg);
  -o-transform: rotate(298.8deg);
  transform: rotate(298.8deg);
}
.c100.p84 .bar {
  -webkit-transform: rotate(302.40000000000003deg);
  -moz-transform: rotate(302.40000000000003deg);
  -ms-transform: rotate(302.40000000000003deg);
  -o-transform: rotate(302.40000000000003deg);
  transform: rotate(302.40000000000003deg);
}
.c100.p85 .bar {
  -webkit-transform: rotate(306deg);
  -moz-transform: rotate(306deg);
  -ms-transform: rotate(306deg);
  -o-transform: rotate(306deg);
  transform: rotate(306deg);
}
.c100.p86 .bar {
  -webkit-transform: rotate(309.6deg);
  -moz-transform: rotate(309.6deg);
  -ms-transform: rotate(309.6deg);
  -o-transform: rotate(309.6deg);
  transform: rotate(309.6deg);
}
.c100.p87 .bar {
  -webkit-transform: rotate(313.2deg);
  -moz-transform: rotate(313.2deg);
  -ms-transform: rotate(313.2deg);
  -o-transform: rotate(313.2deg);
  transform: rotate(313.2deg);
}
.c100.p88 .bar {
  -webkit-transform: rotate(316.8deg);
  -moz-transform: rotate(316.8deg);
  -ms-transform: rotate(316.8deg);
  -o-transform: rotate(316.8deg);
  transform: rotate(316.8deg);
}
.c100.p89 .bar {
  -webkit-transform: rotate(320.40000000000003deg);
  -moz-transform: rotate(320.40000000000003deg);
  -ms-transform: rotate(320.40000000000003deg);
  -o-transform: rotate(320.40000000000003deg);
  transform: rotate(320.40000000000003deg);
}
.c100.p90 .bar {
  -webkit-transform: rotate(324deg);
  -moz-transform: rotate(324deg);
  -ms-transform: rotate(324deg);
  -o-transform: rotate(324deg);
  transform: rotate(324deg);
}
.c100.p91 .bar {
  -webkit-transform: rotate(327.6deg);
  -moz-transform: rotate(327.6deg);
  -ms-transform: rotate(327.6deg);
  -o-transform: rotate(327.6deg);
  transform: rotate(327.6deg);
}
.c100.p92 .bar {
  -webkit-transform: rotate(331.2deg);
  -moz-transform: rotate(331.2deg);
  -ms-transform: rotate(331.2deg);
  -o-transform: rotate(331.2deg);
  transform: rotate(331.2deg);
}
.c100.p93 .bar {
  -webkit-transform: rotate(334.8deg);
  -moz-transform: rotate(334.8deg);
  -ms-transform: rotate(334.8deg);
  -o-transform: rotate(334.8deg);
  transform: rotate(334.8deg);
}
.c100.p94 .bar {
  -webkit-transform: rotate(338.40000000000003deg);
  -moz-transform: rotate(338.40000000000003deg);
  -ms-transform: rotate(338.40000000000003deg);
  -o-transform: rotate(338.40000000000003deg);
  transform: rotate(338.40000000000003deg);
}
.c100.p95 .bar {
  -webkit-transform: rotate(342deg);
  -moz-transform: rotate(342deg);
  -ms-transform: rotate(342deg);
  -o-transform: rotate(342deg);
  transform: rotate(342deg);
}
.c100.p96 .bar {
  -webkit-transform: rotate(345.6deg);
  -moz-transform: rotate(345.6deg);
  -ms-transform: rotate(345.6deg);
  -o-transform: rotate(345.6deg);
  transform: rotate(345.6deg);
}
.c100.p97 .bar {
  -webkit-transform: rotate(349.2deg);
  -moz-transform: rotate(349.2deg);
  -ms-transform: rotate(349.2deg);
  -o-transform: rotate(349.2deg);
  transform: rotate(349.2deg);
}
.c100.p98 .bar {
  -webkit-transform: rotate(352.8deg);
  -moz-transform: rotate(352.8deg);
  -ms-transform: rotate(352.8deg);
  -o-transform: rotate(352.8deg);
  transform: rotate(352.8deg);
}
.c100.p99 .bar {
  -webkit-transform: rotate(356.40000000000003deg);
  -moz-transform: rotate(356.40000000000003deg);
  -ms-transform: rotate(356.40000000000003deg);
  -o-transform: rotate(356.40000000000003deg);
  transform: rotate(356.40000000000003deg);
}
.c100.p100 .bar {
  -webkit-transform: rotate(360deg);
  -moz-transform: rotate(360deg);
  -ms-transform: rotate(360deg);
  -o-transform: rotate(360deg);
  transform: rotate(360deg);
}
.c100:hover {
  cursor: default;
}
.c100:hover > span {
  width: 3.33em;
  line-height: 3.33em;
  font-size: 0.3em;
  color: #307bbb;
}
.c100:hover:after {
  top: 0.04em;
  left: 0.04em;
  width: 0.92em;
  height: 0.92em;
}
.c100.dark {
  background-color: #777777;
}
.c100.dark .bar,
.c100.dark .fill {
  border-color: #c6ff00 !important;
}
.c100.dark > span {
  color: #777777;
}
.c100.dark:after {
  background-color: #666666;
}
.c100.dark:hover > span {
  color: #c6ff00;
}
.c100.green .bar,
.c100.green .fill {
  border-color: #4db53c !important;
}
.c100.green:hover > span {
  color: #4db53c;
}
.c100.green.dark .bar,
.c100.green.dark .fill {
  border-color: #5fd400 !important;
}
.c100.green.dark:hover > span {
  color: #5fd400;
}
.c100.orange .bar,
.c100.orange .fill {
  border-color: #dd9d22 !important;
}
.c100.orange:hover > span {
  color: #dd9d22;
}
.c100.orange.dark .bar,
.c100.orange.dark .fill {
  border-color: #e08833 !important;
}
.c100.orange.dark:hover > span {
  color: #e08833;
}

		
		
		
		* {
	box-sizing: border-box;
}
body {
	margin: 0;
	paddin: 0;
	font-family: 'Source Sans Pro', sans-serif;
	background-color: #d5dae5;
	-webkit-font-smoothing: antialiased;
  	-moz-osx-font-smoothing: grayscale;
}
.header {
	position: absolute;
	width: 100%;
	z-index: 3;
	height: 44px;
	background-color: #fff;
	border-bottom: 3px solid #2d3d51;
}
/* logo in header(mobile version) and side-nav (tablet & desktop) */
.logo {
	height: 44px;
	padding: 10px;
	font-weight: 700;
}
.header .logo {
	color: #233245;
}
.side-nav .logo {
	background-color: #233245;
	color: #fff;
}
.header .logo {
	float: left;
}
.header .logo {
	height: 44px;
	z-index: 1;
	padding: 10px;
	font-weight: 700;
	color: #233245;
}
.logo  i {
	font-size: 22px;
}
.logo span {
	margin-left: 5px;
	text-transform: uppercase;
}
.nav-trigger {
	position: relative;
	float: right;
	width: 20px;
	height: 44px;
	right: 30px;
	display: block;	
}
.nav-trigger span, .nav-trigger span:before, span:after {
	width: 20px;
	height: 2px;
	background-color: #35475e;
	position: absolute;
}
.nav-trigger span {
	top: 50%;
}
.nav-trigger span:before, .nav-trigger span:after {
	content: '';
}
.nav-trigger span:before {
	top: -6px;
}
.nav-trigger span:after {
	top: 6px;
}
/* side navigation styles */
.side-nav {
	position: absolute;
	width: 100%;
	height: 100vh;
	background-color: #35475e;
	z-index: 1;
	display: none;
}
.side-nav.visible {
	display: block;
}
.side-nav ul {
	margin: 0;
	padding: 0;
}
.side-nav ul li {
	padding: 16px 16px;
	border-bottom: 1px solid #3c506a;
	position: relative;
}
.side-nav ul li.active:before {
	content: '';
	position: absolute;
	width: 4px;
	height: 100%;
	top: 0;
	left: 0;
	background-color: #fff;
}
.side-nav ul li a {
	color: #fff;
	display: block;
	text-decoration: none;
}
.side-nav ul li i {
	color: #0497df;
	min-width: 20px;
	text-align: center;
}
.side-nav ul li span:nth-child(2) {
	margin-left: 10px;
	font-size: 14px;
	font-weight: 600;
}
/* main content styles */
.main-content {
	padding: 40px;
	margin-top: 0;
	padding: 0;
	padding-top: 44px;
	height: 100%;
	overflow: scroll;
}
.main-content .title {
	background-color: #eef1f7;
	border-bottom: 1px solid #b8bec9;
	padding: 10px 20px;
	font-weight: 700;
	color: #333;
	font-size: 18px;
}
/* set element styles to fit tablet and higher(desktop) */
@media screen and (min-width: 300px) {
	.header {
		background-color: #35475e;
		z-index: 1;
	}
	.header .logo {
		display: none;
	}
	.nav-trigger {
		display: none;
	}
	.nav-trigger span, .nav-trigger span:before, span:after {
		background-color: #fff;
	}
	.side-nav {
		display: block;
		width: 70px;
		z-index: 2;
	}
	.side-nav ul li span:nth-child(2) {
		display: none;
	}
	.side-nav .logo i {
		padding-left: 12px;
	}
	.side-nav .logo span {
		display: none;
	}
	.side-nav ul li i {
		font-size: 26px;
	}
	.side-nav ul li a {
		text-align: center;
	}
	.main-content {
		margin-left:50px;
	}
}
/* set element styles for desktop */
@media screen and (min-width: 800px) {
	.side-nav {
		width: 200px;
	}
	.side-nav ul li span:nth-child(2) {
		display: inline-block;
	}
	.side-nav ul li i {
		font-size: 16px;
	}
	.side-nav ul li a {
		text-align: left;
	}
	.side-nav .logo i {
		padding-left: 0;
	}
	.side-nav .logo span {
		display: inline-block;
	}
	.main-content {
		margin-left:50px;
	}
}

/* main box container */
.main {
	display: flex;
	flex-flow: row wrap;
}
.widget {
	flex-basis: 300px;
	flex-grow: 10;
	height: 300px;
	margin: 15px;
	border-radius: 6px;
	background-color: #ffffff;
	position: relative;
}
.widget .title {
	background-color: #eef1f7;
	border-bottom: 1px solid #dfe4ec;
	padding: 10px;
	border-top-left-radius: 6px;
	border-top-right-radius: 6px;
	color: #617085;
	font-weight: 600;
}
.ad {
	width: 350px;
	height: 300px;
	border: 1px solid #ddd;
}


		</style>

   

      
</body>
</html>
