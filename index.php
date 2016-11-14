<!doctype html>

<html>
<header>
<tile> Paste Chart </tile>
</header>
<body>

	<h1> Paste Chart </h1>

	<p> Share your Data in charts </p>

	<script>
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
							alert(num);
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
		}






			/**if(/^[ a-z]+$/i.test(firstLetter))
			{
  				alert("Good");

  				for(var i = 1; i<length; i++) 
				{

			

					if (/^[ a-z]+$/i.test(res[i]))
  					{
  						alert("invalid");
  					}
  					else
  					{
  						alert("great Job");
  						makeHash(res);

					}
				}
  			}

  			else
  			{
  				alert("Error");
  			}
  			*/


 


 </script>

 <?php

 function makeHash($valueToHash)
 {

 echo $valueToHash;
 $myHash = hash(md5, $valueToHash);



}

 ?>



	<form action = "index.php" method =  "post" name = "myForm">
	 <p><label>Chart Title:<br>
       <textarea id = "comments" rows = "15" cols = "80" name = "area" 
            placeholder = "text,value,value,value,value, value"
            class = "valid"></textarea>
    </label>
</p>
	<input type = "submit" onclick="checkStr()";  style="margin: 5px;" action="index.html" name = "Share">
	</form>

	
	
		
		

	



</body>
</html>
