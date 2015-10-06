		
		
		<?php
		$simColor1 = get_object_vars ( $sim1 );
		echo ""$simColor1"";
		
		
		
		class sim {
			public $color;
			public $car;
			public $track;
			public $place;
			
			function sim($co, $ca, $t ) {
			        $this->color = $co;
			        $this->car = $ca;
					$this->track = $t;
					$this->place = place($ca, $t, $co);
			    }
		}
		
		// Sets Live Players position
		$livePlayer = new sim ($color, $car, $track);
		// Generates Sims to race against
		$sim1 = new sim ( randomColor(), randomCar(), $track);
		$sim2 = new sim ( randomColor(), randomCar(), $track);
		$sim3 = new sim ( randomColor(), randomCar(), $track);
		
		while ($sim1 == $sim2 || $sim1 == $sim3 || $sim1 == $livePlayer) {
		$sim1 = new sim ( randomColor(), randomCar(), $track); }
		while ($sim2 == $sim1 || $sim2 == $sim3 || $sim2 == $livePlayer) {
		$sim2 = new sim ( randomColor(), randomCar(), $track); }
		while ($sim3 == $sim1 || $sim3 == $sim2 || $sim3 == $livePlayer) {
		$sim3 = new sim ( randomColor(), randomCar(), $track);}
		
		
		<img src="<?php echo file_dir . '/' . $redColor; ?>" height="100" width="100"/>
		
		
		?>
		
		
		
		