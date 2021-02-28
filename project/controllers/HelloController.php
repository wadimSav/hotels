<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Hello;
	
	class HelloController extends Controller
	{
		public function index() {
			$this->title = 'Чистых Елена';
			
			$hello = new Hello;
			$allActiveWork = $hello->getAllWorks();
			$dates = $hello->getDateStartEnd();
			$earnings = $hello->getPrice();
			
			return $this->render('hello/index', [
				'works' => $allActiveWork,
				'dates' => $dates,
				'earnings' => $earnings,
				'h1' => $this->title
			]);
		}

		public function day($param) {
			$this->title = 'Чистых Елена';
			$hello = new Hello;
			$oneDay = $hello->getDayPrice($param['day']);
			
			return $this->render('hello/day', [
				'oneDay' => $oneDay,
				'h1' => $this->title
			]);
		}
	}
