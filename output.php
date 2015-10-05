<!DOCTYPE html>
<html>
<head>
	<title>Results</title>
	<meta name="author" content="Victor Lora" />
	<meta http-equiv="Content-Type" content="text/php; charset=UTF-8" />
	<meta name="description" content="PHP Game Result Page">
	<meta name="keywords" content="computer science, software engineering">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
    <header>
   	<h1 style="text-align:center"> Welcome to the Race Track! </h1> 
	</header>
	<div class="nav">	<!-- Our Menu bar that links to rest of site. -->		
	      <ul>
	        <li class="home"><a href="http://mathcs.muhlenberg.edu/~ej248960/Sim/intro.html">Home</a></li>
	        <li class="input"><a href="http://mathcs.muhlenberg.edu/~ej248960/Sim/playerInput.php">Let's Race</a></li>
	        <li class="thankyou"><a href="http://mathcs.muhlenberg.edu/~ej248960/Sim/done.html">Thank You</a></li>
	      </ul>
	  </div>
	<div class="wrapper">
	<?php
		session_start();
		if (isset($_SESSION["name"])) {          
				$name = $_SESSION["name"];}  
		if (isset($_SESSION["car"])) {          
				$car = $_SESSION["car"];}
		if (isset($_SESSION["color"])) {          
				$color = $_SESSION["color"];}
		if (isset($_SESSION["track"])) {          
				$track = $_SESSION["track"];}
				
		if ($track == "track1") {
				$track = "track 1";}
		else if ($track == "track2") {
				$track = "track 2";}
		else if ($track == "track3") {
				$track = "track 3";}	
		else {
			$track = "track 4";}	
				
		$_SESSION["lastCar"] = $car;
		$_SESSION["lastColor"] = $color;
		$_SESSION["lastTrack"] = $track;
		function place($car, $track, $color)
		{
			switch ($car) {
			    case "ferrari":
			        if ($track == "track1" && $color == "red") {
			        	$position = "first";
			        } elseif ($track == "track2" && $color == "blue") {
			        	$position = "second";
			        } elseif ($track == "track3" && $color == "black") {
			        	$position = "third";
			        } else {
			        	$n = rand(0,3);
			        	switch ($n) {
			        		case 0: 
			        			$position = "first";
			        			break;
			        		case 1: 
			        			$position = "second";
			        			break;
			        		case 2: 
			        			$position = "third";
			        			break;
			        		case 3:
			        			$position = "null";
			        			break;
			        	}
			        }
			        break;
			    case "pagani":
			        if ($track == "track1" && $color == "red") {
			        	$position = "third";
			        } elseif ($track == "track2" && $color == "blue") {
			        	$position = "second";
			        } elseif ($track == "track3" && $color == "black") {
			        	$position = "first";
			        } else {
			        	$n = rand(0,3);
			        	switch ($n) {
			        		case 0: 
			        			$position = "first";
			        			break;
			        		case 1: 
			        			$position = "third";
			        			break;
			        		case 2: 
			        			$position = "null";
			        			break;
			        		case 3:
			        			$position = "second";
			        			break;
			        	}
			        }
			        break;
			    case "lamborghini":
			        if ($track == "track1" && $color == "red") {
			        	$position = "first";
			        } elseif ($track == "track2" && $color == "black") {
			        	$position = "third";
			        } elseif ($track == "track3" && $color == "white") {
			        	$position = "second";
			        } else {
			        	$n = rand(0,3);
			        	switch ($n) {
			        		case 0: 
			        			$position = "second";
			        			break;
			        		case 1: 
			        			$position = "third";
			        			break;
			        		case 2: 
			        			$position = "first";
			        			break;
			        		case 3:
			        			$position = "null";
			        			break;
			        	}
			        }
			        break;
		    }
		    return $position;
		}
		function randomCar() {
			$n = rand(0,2);
        	switch ($n) {
        		case 0: 
        			$simCar = "ferrari";
        			break;
        		case 1:
        			$simCar = "pagani";
        			break;
        		case 2: 
        			$simCar = "lamborghini";
        			break;
        	}
        	return $simCar;
		}
		function randomColor() {
			$n = rand(0,3);
        	switch ($n) {
        		case 0: 
        			$simColor = "red";
        			break;
        		case 1: 
        			$simColor = "blue";
        			break;
        		case 2: 
        			$simColor = "black";
        			break;
        		case 3:
        			$simColor = "white";
        			break;
        	}
        	return $simColor;
		}
		
		class sim {
			public $color;
			public $car;
			public $track;
			
			function __construct ($co, $ca, $t ) {
			        $this->color = $co;
			        $this->car = $ca;
					$this->track = $t;
			    }
		}
		
		// Sets Live Players position
		$livePlayer = place($car, $track, $color);
		while ($sim1 == $sim2 || $sim1 == $sim3 || $sim1 == $livePlayer ||
				$sim2 == $livePlayer || $sim2 == $sim3 || $sim3 == $livePlayer) { // check to make sure all cases are here
			$sim1 = place(randomCar(), $track, randomColor());
			$sim2 = place(randomCar(), $track, randomColor());
			$sim3 = place(randomCar(), $track, randomColor());
		}
		// Generates Sims to race against
		$sim1 = new sim ( randomColor(), randomCar(), $track);
		//$sim1 = place(randomCar(), $track, randomColor());
		$sim2 = place(randomCar(), $track, randomColor());
		$sim3 = place(randomCar(), $track, randomColor());

		
		
		
		//$sim1->color = "black";
		//echo "$sim1: $color\n";
	?>

	<h1>Results</h1>

	<ul>
		<?php
		if ($livePlayer == "first") {
			echo "<li> First Place: " . $name . " with a " . $color . " " . $car . " on " . $track . "</li>";
		} else if ($sim1 == "first") {
			echo "<li> First Place: Player 2 with a " . $sim1.$color . " " . $car . " on " . $track . "</li>";
		} else if ($sim2 == "first") {
			echo "<li> First Place: Player 3 with a " . $color . " " . $car . " on " . $track . "</li>";
		} else if ($sim3 == "first") {
			echo "<li> First Place: Player 4 with a " . $color . " " . $car . " on " . $track . "</li>";
		}
		if ($livePlayer == "second") {
			echo "<li> Second Place: " . $name . " with a " . $color . " " . $car . " on " . $track . "</li>";
		} else if ($sim1 == "second") {
			echo "<li> Second Place: Player 2 with a " . $color . " " . $car . " on " . $track . "</li>";
		} else if ($sim2 == "Second") {
			echo "<li> Second Place: Player 3 with a " . $color . " " . $car . " on " . $track . "</li>";
		} else if ($sim3 == "second") {
			echo "<li> Second Place: Player 4 with a " . $color . " " . $car . " on " . $track . "</li>";
		}
		if ($livePlayer == "third") {
			echo "<li> Third Place: " . $name . " with a " . $color . " " . $car . " on " . $track . "</li>";
		} else if ($sim1 == "third") {
			echo "<li> Third Place: Player 2 with a " . $color . " " . $car . " on " . $track . "</li>";
		} else if ($sim2 == "third") {
			echo "<li> Third Place: Player 3 with a " . $color . " " . $car . " on " . $track . "</li>";
		} else if ($sim3 == "third") {
			echo "<li> Third Place: Player 4 with a " . $color . " " . $car . " on " . $track . "</li>";
		}
		if ($livePlayer == "null") {
			echo "<li>" . $name . " with a " . $color . " " . $car . " on " . $track . " was not in the top Three.</li>";
		} else if ($sim1 == "null") {
			echo "<li>Player 2  with a " . $color . " " . $car . " on " . $track . " was not in the top Three.</li>";
		} else if ($sim2 == "null") {
			echo "<li>Player 3  with a " . $color . " " . $car . " on " . $track . " was not in the top Three.</li>";
		} else if ($sim3 == "null") {
			echo "<li>Player 4  with a " . $color . " " . $car . " on " . $track . " was not in the top Three.</li>";
		}
		?>
	</ul>

	<form id="resumeInput" action="playerInput.php" method="post">
		<input id="submitButton" name="doneButton" value="Race Again!" type="submit">
	</form>
	<br />
	<form id="closing" action="closing.html" method="post">
		<input id="doneButton" name="doneButton" value="I'm done!" type="submit">
	</form>
</div>
</body>
</html>