<script type="text/javascript" src="index.php"></script>
<?php


if(isset($_POST['str']))
{

	echo $_POST['str'];
	
}
else
{
	header('HTTP/1.1 500 Internal Server Error');
}

echo"hey im here";

function checkStr($varData)
{
	
	$valid = 0;
	if (!empty($varData))
	{
		
		
		 $lines =(explode('\n', $varData));
		 
    		if(sizeof($lines)<= 50){
			for($i = 0;$i < sizeof($lines);$i++)
			{
				if(strlen($lines[$i]) <= 80)
				{
				
					continue;

				}
				else
				{
					echo "Invalid Text! Line-" . ($i+1) . " surpasses max character limit";
					return;
				}
				
			}
			$valid = 0;


			verifyFormat($varData);

			}

			else
    	{
    		echo "Empty text area! Please enter the data";
    		return;
    	}


	}
}

function verifyFormat($varData)
		{
			$lines = explode("\n", trim($varData));
			for($i = 0;$i < sizeof($lines);$i++)
			{
				$line = explode(",", $lines[$i]);

				if(preg_match('/^[a-zA-Z]+$/', trim($line[0])) && $line[0] != null)
				{
					

				
					for($j = 1; $j < sizeof($line); $j++)
					{	
						$num = trim($line[$j]);

						
						if(is_float($num) || $num == "" || is_numeric($num))
						{
							echo $num;
							continue;
						}
						
						else
						{

							echo "Invalid data format! Check line:" . ($i+1);
							return;
							
						}
					}
					
					

				}
				else
				{
					echo "Invalid Line-".($i+1)."! Should start with text Label";
					return;

				}
			}
		}




?>
