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
    	if(str)
		var res = str.split(",");



		var length = res.length;
		var stringLength = str.length


		var firstLetter = res[0];
    	 
      	if(str==null || str=="")
		alert("blank text area")
		
		else

		
			


			if(/^[ a-z]+$/i.test(firstLetter))
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
       <textarea id = "comments" rows = "15" cols = "50" name = "area" 
            placeholder = "text,value,value,value,value, value"
            class = "valid"></textarea>
    </label>
</p>
	<input type = "submit" onclick="val()";  style="margin: 5px;" action="index.html" name = "Share">
	</form>

	
	
		
		

	



</body>
</html>
