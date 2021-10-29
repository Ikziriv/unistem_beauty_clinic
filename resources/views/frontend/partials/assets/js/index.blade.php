  <script src="{{url('_frontend/js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{url('_frontend/js/popper.min.js')}}"></script>
  <script src="{{url('_frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{url('_frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{url('_frontend/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{url('_frontend/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{url('_frontend/js/jquery.animateNumber.min.js')}}"></script>

  <script src="{{url('_frontend/js/main.js')}}"></script>
  
  <script type="text/javascript">
	var _createClass = function () {function defineProperties(target, props) {for (var i = 0; i < props.length; i++) {var descriptor = props[i];descriptor.enumerable = descriptor.enumerable || false;descriptor.configurable = true;if ("value" in descriptor) descriptor.writable = true;Object.defineProperty(target, descriptor.key, descriptor);}}return function (Constructor, protoProps, staticProps) {if (protoProps) defineProperties(Constructor.prototype, protoProps);if (staticProps) defineProperties(Constructor, staticProps);return Constructor;};}();function _classCallCheck(instance, Constructor) {if (!(instance instanceof Constructor)) {throw new TypeError("Cannot call a class as a function");}}{var
	  SliderClip = function () {
	    function SliderClip(el) {_classCallCheck(this, SliderClip);
	      this.el = el;
	      this.Slides = Array.from(this.el.querySelectorAll('li'));
	      this.Nav = Array.from(this.el.querySelectorAll('nav a'));
	      this.totalSlides = this.Slides.length;
	      this.current = 0;
	      this.autoPlay = true; //true or false
	      this.timeTrans = 4000; //transition time in milliseconds
	      this.IndexElements = [];

	      for (var i = 0; i < this.totalSlides; i++) {
	        this.IndexElements.push(i);
	      }

	      this.setCurret();
	      this.initEvents();
	    }_createClass(SliderClip, [{ key: 'setCurret', value: function setCurret()
	      {
	        this.Slides[this.current].classList.add('current');
	        this.Nav[this.current].classList.add('current_dot');
	      } }, { key: 'initEvents', value: function initEvents()
	      {var _this = this;
	        var self = this;

	        this.Nav.forEach(function (dot) {
	          dot.addEventListener('click', function (ele) {
	            ele.preventDefault();
	            _this.changeSlide(_this.Nav.indexOf(dot));
	          });
	        });

	        this.el.addEventListener('mouseenter', function () {return self.autoPlay = false;});
	        this.el.addEventListener('mouseleave', function () {return self.autoPlay = true;});

	        setInterval(function () {
	          if (self.autoPlay) {
	            self.current = self.current < self.Slides.length - 1 ? self.current + 1 : 0;
	            self.changeSlide(self.current);
	          }
	        }, this.timeTrans);

	      } }, { key: 'changeSlide', value: function changeSlide(
	      index) {var _this2 = this;

	        this.Nav.forEach(function (allDot) {return allDot.classList.remove('current_dot');});

	        this.Slides.forEach(function (allSlides) {return allSlides.classList.remove('prev', 'current');});

	        var getAllPrev = function getAllPrev(value) {return value < index;};

	        var prevElements = this.IndexElements.filter(getAllPrev);

	        prevElements.forEach(function (indexPrevEle) {return _this2.Slides[indexPrevEle].classList.add('prev');});

	        this.Slides[index].classList.add('current');
	        this.Nav[index].classList.add('current_dot');
	      } }]);return SliderClip;}();


	  var slider = new SliderClip(document.querySelector('.slider'));
	}
  </script>