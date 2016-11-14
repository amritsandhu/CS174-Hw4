<!doctype html>

<html>
<header>
<tile> Paste Chart </tile>
</header>
<body>

	<h1> Paste Chart </h1>

	<p> Share your Data in charts </p>

	<script>
    function val()
    {
    	var str = document.getElementById("comments").value;
    	var valid = 0;
    	if(str)
    	{

    		var lines = str.split('\n');
			for(var i = 0;i < lines.length;i++){
				if(lines[i].length <= 10)
				{

				}
				else
				{
					alert("Invalid Text! Line-" + (i+1) + " surpasses max character limit");
					return;
				}
				
			}
			valid = 1;

			alert(Boolean(valid));

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


} 


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
	<input type = "submit" onclick="val()";  style="margin: 5px;" action="index.html" name = "Share">
	</form>

	
	
		
		

	



</body>
</html>
