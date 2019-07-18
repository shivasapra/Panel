<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Thank You</title>
    <style>
    	@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap');
    	body{margin:0;padding:0;font-family: 'Open Sans', sans-serif;background-color:#ffedc3;word-break:break-word;}
    	h1 span {
	    background: linear-gradient(to left, #61dec7 0%, #8e2ef7 50%);
	    -webkit-linear-gradient(to left, #c9fe90 0%, #4ac1b6 50%): ;
	    -moz-linear-gradient(to left, #c9fe90 0%, #4ac1b6 50%): ;
	    -o-linear-gradient(to left, #c9fe90 0%, #4ac1b6 50%): ;
	    -ms-linear-gradient(to left, #c9fe90 0%, #4ac1b6 50%): ;
	    -webkit-background-clip: text;
	    -webkit-text-fill-color: transparent;
	    font-size:90px;
	    font-weight:700;}
	    .container{
	    	width:900px;
	    	margin:50px auto;
	    	background-color:#fff;
	    	padding:30px;
	    }
	    hr{
	    	border-top:#ddd;
	    }
	    .fw-600{font-weight:600;}
	    p.card-text {color: #787878;}
	    h2 {
		    background-image: linear-gradient(to left, #feb8f6, #aed8e8);
		    padding: 13px 0;
		    font-weight: 600;
		    font-size: 1.8rem;
		    margin: 40px -20px 20px -20px;
		}
		h5 {
		    font-size: 1.25rem;
		    font-weight: 400;
		    color: #444242;
		}
		.footer{
			margin:0;
			padding:0;
			list-style:none;
			margin-bottom:0.5rem;
		}
		.footer li{
			display:inline-block;
			padding:5px 5px;
		}
		.footer li a {
			display: block;
			width: 35px;
			height: 35px;
			border-radius: 50%;
			text-align: center;
			color: #fff;
			border: 1px solid rgba(255,255,255,0.1);
			padding-top: 6px;
		}
		.footer li a:hover{
			background-color:#fff;
			color:#333;
		}
		.border-radius0{
			border-radius:0;
		}
		.border0{
			border:0;
		}
		.btn-success {
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}
.card-footer {
    margin-top: 3rem;
    border-top: 1px solid #ddd;
    padding-top: 1rem;
}
.btn {
    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    text-decoration:none;
    font-size:16px;
}
.text-center{
	text-align: center;
}
    </style>
  </head>
  <body>
    <div class="container">
    				<div class="card-header bg-white border-radius0 border0" style="width:100%; float:left;margin-bottom:15px;">
    					<img src="{{asset('material/img/iisermlogo.jpg')}}" alt="logo" class="img-fluid" style="width:120px;float:left;"/>
						<h1 style="float:left;margin-left:20px;font-size:26px;font-weight:500;margin-top:45px;">Indian Institute of Science Education and Research</h1>
    				</div><hr>
				  <div class="card-body">
				  	<h1>Hello {{$name}},</h1>
				  	<h3><span style="font-size:50px;color:#ba0000;">Thank You!</span><br>For Your Support!!</h3><br>
				    <p class="card-text">Your Cancellation Of Accomodation has been approved by <b>IISER</b>.</p>
				    <a href="http://buildatwill.com/panel/public" class="btn btn-success">Account Login</a><br><br>
				     <!-- <span style="font-size:14px;color:#888;">if button does not work click on below link</span><br>
				    <a href="#" style="font-size:14px;color:#888;">https://www.google.com/search?q=twitter+icon+png&rlz=1C1CHBF_enIN840IN840&source=lnms&tbm=isch&sa=X&ved=0ahUKEwiy7e6Ts77jAhUIMo8KHX1kAHIQ_AUIESgB&cshid=1563450692723830&biw=1920&bih=888</a> -->
				  </div>
				  <div class="card-footer text-center bg-dark text-white border-radius0 border0">
					  <ul class="footer">
							<li><a href="#" target="blank"><img src="{{asset('material/img/facebook.png')}}"/></a></li>
							<li><a href="#" target="blank"><img src="{{asset('material/img/youtube.png')}}"/></a></li>
							<li><a href="#" target="blank"><img src="{{asset('material/img/twitter.png')}}"/></a></li>
					  </ul>
					  <p class="mb-1 mt-3">Knowledge city, Sector 81, SAS Nagar, Mohali, India – 160055 <br>
				  	© 2019 IISER Mohali | <a href="http://www.iisermohali.ac.in/" class="text-white">www.iisermohali.ac.in<a></p>
				  </div>
    </div>
  </body>
</html>