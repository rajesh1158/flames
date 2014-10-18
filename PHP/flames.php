<html>
<title>Flames by Rajesh</title>

<head>

<script type="text/javascript">

function Trim(str)
{
	while (str.substring(0,1) == ' ')
	{
		str = str.substring(1, str.length);
	}

	while (str.substring(str.length-1, str.length) == ' ')
	{
		str = str.substring(0,str.length-1);
	}
	return str;
}

function validate(flamesForm)
{
	if(Trim(flamesForm.partner1.value) == "")
	{
		document.getElementById("errMsg").innerText = "Enter your name";
		flamesForm.partner1.value = "";
		flamesForm.partner1.focus();
		return false;
	}

	if(Trim(flamesForm.partner2.value) == "")
	{
		document.getElementById("errMsg").innerText = "Enter your partner's name";
		flamesForm.partner2.value = "";
		flamesForm.partner2.focus();
		return false;
	}
}

</script>

</head>

<body onLoad="flamesForm.reset();">
<center>
<br/><br/><br/><br/>

<span id="errMsg"></span>

<br/><br/>

<?php

if(count($_POST) > 0)
{
		$sPattern = '/\s*/m'; 
		$sReplace = '';

		$firstName = $_POST[partner1];
		$secondName = $_POST[partner2];
		$flames = "FLAMES";

		$firstName = preg_replace($sPattern, $sReplace, $firstName);
		$secondName = preg_replace($sPattern, $sReplace, $secondName);
		
		$firstArray = array();
		$secondArray = array();
		$flamesArray = array();

		for($b=0; $b<strlen($firstName); $b++)
		{
			array_push($firstArray, substr($firstName, $b, 1));
		}

		for($b=0; $b<strlen($secondName); $b++)
		{
			array_push($secondArray, substr($secondName, $b, 1));
		}

		for($b=0; $b<strlen($flames); $b++)
		{
			array_push($flamesArray, substr($flames, $b, 1));
		}

		$totalLength = 0;

		for($i=0; $i<count($firstArray); $i++)
		{
			for($j=0; $j<count($secondArray); $j++)
			{
				if(strcmp($firstArray[$i], $secondArray[$j]) == 0)
				{				
					unset($firstArray[$i]);
					$firstArray = array_values($firstArray);
					unset($secondArray[$j]);
					$secondArray = array_values($secondArray);
					break;
				}
			}
		}

		$totalLength = count($firstArray) + count($secondArray);

		$tempFlames = $flamesArray;
		$temp = array();
		
		while(count($tempFlames) > 1)
		{
			$y = $totalLength - count($tempFlames) - 1;
			$indexOfRemEle = $y % count($tempFlames);

			for($v=0; $v<$indexOfRemEle; $v++)
			{
				array_push($temp, $tempFlames[$v]);
			}
			
			for($v=0; $v<count($temp); $v++)
			{
				unset($tempFlames[0]);
				$tempFlames = array_values($tempFlames);
				array_push($tempFlames, $temp[$v]);
			}		
			
			unset($tempFlames[0]);
			$tempFlames = array_values($tempFlames);
		}

		if($tempFlames[0] == "F")
		{
			$result = "Friends";
		}
		else if($tempFlames[0] == "L")
		{
			$result = "Love";
		}
		else if($tempFlames[0] == "A")
		{
			$result = "Affection";
		}
		else if($tempFlames[0] == "M")
		{
			$result = "Marriage";
		}
		else if($tempFlames[0] == "E")
		{
			$result = "Enemy";
		}
		else
		{
			$result = "Sister";
		}
?>

<script type="text/javascript">
	document.getElementById("errMsg").innerText = "<?php echo $result; ?>";
</script>

<?php
}

?>
	<form name="flamesForm" method="POST" action="" onSubmit="return validate(this);">
		<table width="50%" align="center" border="0">
			<tr>
				<td align="right">Your name:</td>
				<td><input type="text" name="partner1" size="40" /></td>
			</tr>

			<tr>
				<td align="right">Your partner's name:</td>
				<td><input type="text" name="partner2" size="40" /></td>
			</tr>

			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>

			<tr>
				<td colspan="2" align="center"><input type="submit" value="Find FLAMES" /></td>
			</tr>
		</table>
	</form>

</center>
</body>
</html>
