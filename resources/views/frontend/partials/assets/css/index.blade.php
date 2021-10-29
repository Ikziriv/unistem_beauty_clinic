  <link rel="stylesheet" href="{{url('_frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('_frontend/css/open-iconic-bootstrap.min.css')}}">
  
  <link rel="stylesheet" href="{{url('_frontend/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{url('_frontend/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{url('_frontend/css/icomoon.css')}}">
  <link rel="stylesheet" href="{{url('_frontend/css/flaticon.css')}}">
  <link rel="stylesheet" href="{{url('_frontend/css/animate.css')}}">
  <link rel="stylesheet" href="{{url('_frontend/css/bootstrap-datepicker.css')}}">
  <link rel="stylesheet" href="{{url('_frontend/css/style.css')}}">
  <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">
	{{-- <style type="text/css">
	  .promo {
	    width: 100%;
	  }
	  .carousel-inner{
	    width:100%;
	    max-height: 200px !important;
	  }
	</style>
	<style type="text/css">
	.intro {
	  position: relative;
	  width: 100%;
	  height: 50vh;
	}
	.left {
	  float: left;
	  height: 50%;
	  width: 60%;
	  padding: 3rem 3rem 3rem 5rem;
	  display: table;
	}
	.left > div {
	  display: table-cell;
	  vertical-align: middle;
	}
	.slider {
	  float: right;
	  position: relative;
	  width: 40%;
	  height: 80%;
	}
	.slider li {
	  position: absolute;
	  top: 0;
	  left: 0;
	  width: 100%;
	  height: 100%;
	  background-size: cover;
	  background-repeat: no-repeat;
	  background-position: 50% 50%;
	  transition: clip .7s ease-in-out, z-index 0s .7s;
	  clip: rect(0, 100vw, 100vh, 100vw);
	  display: table;
	}
	.center-y {
	  display: table-cell;
	  vertical-align: middle;
	  text-align: center;
	  color: #fff;
	}
	li.current h3, li.current h3 + a {
	  opacity: 1;
	  transition-delay: 1s;
	  transform: translate3d(0, 0, 0);
	}
	li.current {
	  z-index: 1;
	  clip: rect(0, 100vw, 100vh, 0);
	}
	li.prev {
	  clip: rect(0, 0, 100vh, 0);
	}
	.slider nav {
	  position: absolute;
	  bottom: 5%;
	  left: 0;
	  right: 0;
	  text-align: center;
	  z-index: 10;
	}
	@media screen and (max-width: 700px) {
	  .left {
	    width: 100%;
	    height: 30%;
	  }
	  .slider {
	    width: 100%;
	    height: 70%;
	  }
	}
	</style> --}}
{{-- New --}}
  <style type="text/css">
  	#myCarousel .carousel-item .mask {
    position: absolute;
    top: 0;
	left:0;
	height:100%;
    width: 100%;
    background-attachment: fixed;
}
#myCarousel h4{
	font-size:50px;
	margin-bottom:15px;
	color:#e1b12c;
	line-height:100%;
	letter-spacing:0.5px;
	font-weight:600;
}
#myCarousel p{
	font-size:18px;
	margin-bottom:15px;
	color:#d5d5d5;
	color: #2d2d2d;
}
#myCarousel .carousel-item a{background:#F47735; font-size:14px; color:#FFF; padding:13px 32px; display:inline-block; }
#myCarousel .carousel-item a:hover{background:#394fa2; text-decoration:none;  }

#myCarousel .carousel-item h4{-webkit-animation-name:fadeInLeft; animation-name:fadeInLeft;} 
#myCarousel .carousel-item p{-webkit-animation-name:slideInRight; animation-name:slideInRight;} 
#myCarousel .carousel-item a{-webkit-animation-name:fadeInUp; animation-name:fadeInUp;}
#myCarousel .carousel-item .mask img{-webkit-animation-name:slideInRight; animation-name:slideInRight; display:block; height:auto; max-width:100%;}
#myCarousel h4, #myCarousel p, #myCarousel a, #myCarousel .carousel-item .mask img{-webkit-animation-duration: 1s;
    animation-duration: 1.2s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
#myCarousel .container {max-width: 1430px;  }
#myCarousel .carousel-item{height:100%; min-height:550px; }
#myCarousel{position:relative; z-index:1; background:url({{asset('img/bg_head.png')}}) center center no-repeat; background-size:cover; }

.carousel-control-next, .carousel-control-prev{height:40px; width:40px; padding:12px; top:50%; bottom:auto; transform:translateY(-50%); background-color: #e1b12c; }


.carousel-item {
    position: relative;
    display: none;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    width: 100%;
    transition: -webkit-transform .6s ease;
    transition: transform .6s ease;
    transition: transform .6s ease,-webkit-transform .6s ease;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-perspective: 1000px;
    perspective: 1000px;
}
.carousel-fade .carousel-item {
	opacity: 0;
	-webkit-transition-duration: .6s;
	transition-duration: .6s;
	-webkit-transition-property: opacity;
	transition-property: opacity
}
.carousel-fade .carousel-item-next.carousel-item-left, .carousel-fade .carousel-item-prev.carousel-item-right, .carousel-fade .carousel-item.active {
	opacity: 1
}
.carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-right.active {
	opacity: 0
}
.carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active {
	-webkit-transform: translateX(0);
	-ms-transform: translateX(0);
	transform: translateX(0)
}
@supports (transform-style:preserve-3d) {
	.carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active {
	-webkit-transform:translate3d(0, 0, 0);
	transform:translate3d(0, 0, 0)
	}
}
.carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active {
    -webkit-transform: translate3d(0,0,0);
    transform: translate3d(0,0,0);
}


 
@-webkit-keyframes fadeInLeft {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInLeft {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInLeft {
  -webkit-animation-name: fadeInLeft;
  animation-name: fadeInLeft;
}

@-webkit-keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInUp {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp;
}

@-webkit-keyframes slideInRight {
  from {
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes slideInRight {
  from {
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.slideInRight {
  -webkit-animation-name: slideInRight;
  animation-name: slideInRight;
}
  </style>