<!doctype html>
<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
	<script>
	//Helper method to check the length of each line and total number of lines 
    function checkStr()
    {
    	var str = document.getElementById("comments").value;
    	var valid = 0;
    	if(str)
    	{

    		var lines = str.split('\n');
    		if(lines.length <= 50){
			for(var i = 0;i < lines.length;i++){
				if(lines[i].length <= 80)
				{
					continue;
				}
				else
				{
					//alert("Invalid Text! Line-" + (i+1) + " surpasses max character limit");
					console.log("Invalid Text! Line-" + (i+1) + " surpasses max character limit");
					return;
				}
				
			}
			valid = 1;
			verifyFormat(str);

			}
			else
			{
			//alert("Invalid Text! Max number (50) of lines surpassed");
			console.log("Invalid Text! Max number (50) of lines surpassed");
			}
			
    	}
    	else
    	{
    		//alert("Empty text area! Please enter the data");
    		console.log("Empty text area! Please enter the data");
    	}
		
		}
		//Function to verify data format after length and number of lines are verified 
		function verifyFormat(str)
		{
			var lines = str.split("\n");
			for(var i = 0; i < lines.length; i++)
			{
				var line = lines[i].split(",");
				if(/^[ a-z]+$/i.test(line[0].trim()) && line[0] != null)
				{
				
					for(var j = 1; j < line.length; j++)
					{	
						var num = line[j].trim();
						
						if(parseFloat(num) || num == "")
						{
							continue;
						}
						
						else
						{

							//alert("Invalid data format! Check line:" + (i+1));
							console.log("Invalid data format! Check line: "+ (i+1));
							return;
						}

					}
				}
				else
				{
					//alert("Invalid Line-" + (i+1) + "! Should start with text Label")
					console.log("Invalid Line-" + (i+1) + "! Should start with text Label");
				}

				}
				//echo $str;
				sendDataToServer(str);

		}


		//This metohd only gets invoked if data is valid on client  side 
		function sendDataToServer(str)
		{
			//Sending off data to server.php
			var title = document.getElementById("title").value;

		
		$.ajax({
    	type: "POST",
    		url: "/hw4trial/server.php",
   			 data: {'str':str,'title': title} ,
    	success: function(data){
        if(data)
        {
           // console.log(data);
           //alert(data)
		   console.log(data);
		   window.location.href = "/hw4trial/server.php?title="+title;
		   window.location.href="/hw4trial/drawChart.php?c=chart&a=show&arg1=LineGraph&arg2="+data;
		  
             $('#comments').val('');
        }
		},
		error: function(xhr, textStatus, errorThrown){
        alert('failed');

    	}});

		}
	</script>

	<?php
#thisoneworks
			$con = NULL;
			
			
					
			//function to create connnection instance with DB
			function connect_mysql()
			{
			$servername = "127.0.0.1";
			$username = "root";
			$password = "";

			// Create connection
			$GLOBALS['con'] = mysqli_connect($servername, $username, $password, "myDatabase");

			// Check connection
			if ($GLOBALS['con']->connect_error) 
			{
			die("Connection failed: " . $GLOBALS['con']->connect_error);
			} 
			//echo "Connected successfully ";
			return $GLOBALS['con'];
			}
			
			function disconnect()
			{
				
			$GLOBALS['con']->close();

			}
		
		connect_mysql();

		$sql = "SELECT HASH FROM info";
		$result = $GLOBALS['con']->query($sql);
		$row = $result->fetch_assoc();
		

	
	?>
</head>
<header>
<tile> Paste Chart </tile>
</header>
<body>

	<h1> Paste Chart </h1>

	<p> Share your Data in charts </p>
 

	
	 <p><label>Chart Title: </label></p>
	 <input type="text" name="Title" id="title" placeholder="Title..." style="margin-bottom: 5px; margin-top: 0px;"> <br>
       <textarea id = "comments" rows = "15" cols = "80" name = "area" 
            placeholder = "text,value,value,value,value, value"
            class = "valid"></textarea>
  
	<br>

<?php
//$link_address = '?c=chart&a=show&arg1=LineGraph&arg2=';
//echo "<a href='".$link_address.$row['HASH']."'>";

  //header("Location: drawChart.php?c=chart&a=show&arg1=LineGraph");
?>
	<input type = "submit"  onclick="checkStr()" style="margin: 5px;" action="/index.php">


<?php
"</a>"
?>

</body>
</html>