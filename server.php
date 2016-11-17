<?php
$con;
$title = $_POST['title'];
if(isset($_POST['str']))
{
	
	checkStr($_POST['str']);
	//	connect_database();
	
}


function connect_database()
                {
                    $servername = "127.0.0.1";
                    $username = "root";
                    $password = "";

                    // Create connection
                    $GLOBALS['con'] = new mysqli($servername, $username, $password);

                    // Check connection
                    if ($GLOBALS['con']->connect_error) 
                        {
                            die("Connection failed: " . $GLOBALS['con']->connect_error);
                        } 
                   echo "Connected successfully ";
            
                }


             function add_Entry($varHash, $varTitle, $varData)
                {
   				
                 
                      
                   
                     $sql = "INSERT INTO mydatabase.info (hash, title, data)  VALUES ('$varHash', '$varTitle', '$varData')";
                     $result = $GLOBALS['con']->query($sql);

                    
                    return $result;     
                   
                }


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

			createHashCode($varData);
			
		}

		function createHashCode($data)
		{
			connect_database();
			$lines = explode("\n", trim($data));
			
			for ($i=0; $i < sizeof($lines); $i++) 
			{ 
				//$hashValue = hash(md5($myTitle, $lines[$i]));
				$hashValue = md5($lines[$i]);
				echo gettype($hashValue);
				echo $hashValue;
				add_Entry($hashValue, $GLOBALS['title'], $data);
			}
		}



?>
