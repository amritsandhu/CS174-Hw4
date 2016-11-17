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
					alert("Invalid Text! Line-" + (i+1) + " surpasses max character limit");
					return;
				}
				
			}
			valid = 1;
			verifyFormat(str);

			}
			else
			{
			alert("Invalid Text! Max number (50) of lines surpassed");
			}
			
    	}
    	else
    	{
    		alert("Empty text area! Please enter the data");
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

							alert("Invalid data format! Check line:" + (i+1));
							return;
						}

					}
				}
				else
				{
					alert("Invalid Line-" + (i+1) + "! Should start with text Label")
				}

				}

				sendDataToServer(str);
		}


		//This metohd only gets invoked if data is valid on client  side 
		function sendDataToServer(str)
		{
			//Sending off data to server.php
			var title = document.getElementById("title").value;

		
		$.ajax({
    	type: "POST",
    		url: "server.php",
   			 data: {'str':str, 'title': title} ,
    	success: function(data){
        if(data)
        {
           // console.log(data);
           alert(data)
             $('#comments').val('');
        }
		},
		error: function(xhr, textStatus, errorThrown){
        alert('failed');

    	}});

		}
	</script>
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
	<input type = "submit" onclick="checkStr()";  style="margin: 5px;" action="index.html" name = "Share">
	


</body>
</html>