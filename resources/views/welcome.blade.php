<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            body {
                background: #eee;
                overflow-x: hidden;
            }

            #regForm {
                background-color: #ffffff;
                margin: 0px auto;
                font-family: Raleway;
                padding: 60px;
                border-radius: 10px
            }

            #register {
                color: #6A1B9A
            }

            h1 {
                text-align: center
            }

            input, select {
                padding: 10px;
                width: 100%;
                font-size: 17px;
                font-family: Raleway;
                border: 1px solid #aaaaaa;
                border-radius: 10px;
                -webkit-appearance: none
            }

            .tab input:focus {
                border: 1px solid #6a1b9a !important;
                outline: none
            }

            input.invalid {
                border: 1px solid #e03a0666
            }

            .tab {
                display: none
            }

            button {            
                background-color: #6A1B9A;
                color: #ffffff;
                border: none;
                border-radius: 50%;
                padding: 10px 20px;
                font-size: 17px;
                font-family: Raleway;
                cursor: pointer
            }

            button:hover {
                opacity: 0.8
            }

            button:focus {
                outline: none !important
            }

            #prevBtn {
                background-color: #bbbbbb
            }
            
            .all-steps {
                text-align: center;
                margin-top: 30px;
                margin-bottom: 30px;
                width: 100%;
                display: inline-flex;
                justify-content: center
            }

            .step {
                height: 40px;
                width: 40px;
                margin: 0 2px;
                background-color: #bbbbbb;
                border: none;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 15px;
                color: #6a1b9a;
                opacity: 0.5
            }

            .step.active {
                opacity: 1
            }

            .step.finish {
                color: #fff;
                background: #6a1b9a;
                opacity: 1
            }
        
            .all-steps {
                text-align: center;
                margin-top: 30px;
                margin-bottom: 30px
            }

            .thanks-message {
                display: none
            }
            * {
              box-sizing:border-box;
            @import url('https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&display=swap');
            }
            body { 

              font-family:'Assistant';
            }
            .heading-primary {
              font-size:36px;
              padding:.5em;
              text-align:center;
            }
            .accordion dl,
            .accordion-list {
              &:after {
                  content: "";
                  display:block;
                  height:1em;
                  width:100%;
                  background-color:darken(#38cc70, 10%);
                }
            }
            .accordion dd,
            .accordion__panel {
              background-color:#fffe;
              font-size:1em;
              line-height:1.5em; 
            }
            .accordion p {
              padding:1em 2em 1em 2em;
            }

            .accordion {
                position:relative;
                background-color:#eee;
            }
            .container {
              max-width:960px;
              margin:0 auto;
              padding:2em 0 2em 0;
            }
            .accordionTitle,
            .accordion__Heading {
            background-color:#f5f5fe; 
              text-align:center;
                font-weight:700; 
                      padding:2em;
                      display:block;
                      text-decoration:none;
                      color:#333;
                      transition:background-color 0.5s ease-in-out;
              border-bottom:1px solid darken(
            #9674fd, 5%);
              &:before {
              content: "+";
              font-size:2.5em;
              line-height:0.5em;
              color: #9674fd;
              float:left; 
              transition: transform 0.3s ease-in-out;
              }
              &:hover {
                background-color:darken(
            #9674fd, 10%);
              }
            }
            .accordionTitleActive, 
            .accordionTitle.is-expanded {
                
              background-color:darken(
            #9674fd, 10%);
                &:before {
                
                  transform:rotate(-225deg);
                }
            }
            .accordionItem {
                height:auto;
                overflow:hidden; 
                //SHAME: magic number to allow the accordion to animate
                
                max-height:50em;
                transition:max-height 1s;   
            
                
                @media screen and (min-width:48em) {
                    max-height:15em;
                    transition:max-height 0.5s
                    
                }
                
              
            }
            
            .accordionItem.is-collapsed {
                max-height:0;
            }
            .no-js .accordionItem.is-collapsed {
              max-height: auto;
            }
            .animateIn {
                animation: accordionIn 0.45s normal ease-in-out both 1; 
            }
            .animateOut {
                animation: accordionOut 0.45s alternate ease-in-out both 1;
            }
            .vert-move {
                -webkit-animation: mover 2s infinite  alternate;
                animation: mover 1s infinite  alternate;
            }
            .vert-move {
                -webkit-animation: mover 2s infinite  alternate;
                animation: mover 1s infinite  alternate;
            }
            @-webkit-keyframes mover {
                0% { transform: translateY(0); }
                100% { transform: translateY(-10px); }
            }
            @keyframes mover {
                0% { transform: translateY(0); }
                100% { transform: translateY(-10px); }
            }
            @keyframes accordionIn {
              0% {
                opacity: 0;
                transform:scale(0.9) rotateX(-60deg);
                transform-origin: 50% 0;
              }
              100% {
                opacity:1;
                transform:scale(1);
              }
            }

            @keyframes accordionOut {
                0% {
                  opacity: 1;
                  transform:scale(1);
                }
                100% {
                      opacity:0;
                      transform:scale(0.9) rotateX(-60deg);
                  }
            }
        </style>

    </head>
    <body class="antialiased">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <form id="regForm" action="{{route('compare_price_show') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <h1 id="register">Cloud Price Calculator</h1>
                        <div class="tab">
                            <h6>vCPUs</h6>
                            <p> <input type="number" placeholder="Number of vCPUs"  name="vcpus" ></p>
                        
                            <h6>Memory Size</h6>
                            <p><input type="number" placeholder="Memory Size" name="memory"></p>
                            
                            <h6>Platform</h6>
                            <p><input type="text" placeholder="Platform you wish for your server" name="platform"></p>

                            <h6>Region</h6>
                            <p>
                              <select class="form-select" aria-label="Default select example" name="region">
                                <option selected disabled>Please select Region</option>
                                <option value="australia-central">Australia Central</option>
                                <option value="australia-central-2">Australia Central 2</option>
                                <option value="australia-east">Australia East</option>
                                <option value="australia-southeast">Australia Southeast</option>
                              </select>
                            </p>
                        </div>
                        <button type="submit" id="nextBtn" class="btn btn-primary" style="float:right; margin-bottom:10px;">Calculate <i class="fa fa-angle-double-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="container">
          <div class="section_our_solution">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="row">
                  @if(isset($aws_product))
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <h1 class="heading-primary">
                      <img src="{{url('AWS.png')}}" alt="AWS Logo" height = 150px/>
                    </h1>
                    <div class="accordion">
                      <dl>
                        @foreach($aws_product as $data)
                        <dt>
                          <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">
                            
                            <div class="row">
                              <div class="col-md-2">
                                <i class="fa fa-angle-down vert-move"></i>
                              </div>
                              <div class="col-md-6">
                                {{$data->instanceType}}
                              </div>
                              <div class="col-md-4">
                                {{round($data->price, 3)}}/Hrs
                              </div>
                            </div>
                          </a>
                        </dt>
                        <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
                          <ul style="list-style-type: none; margin-top: 1rem;">
                            <li><b>vCPUs: </b>{{$data->vcpu}}</li>
                            <li><b>ECU: </b>{{$data->ecu}}</li>
                            <li><b>Memory: </b>{{$data->memory}}</li>
                            <li><b>Storage: </b>{{$data->storage}}</li>
                            <li><b>Price/Monthly: </b>{{round($data->price, 3) * 24 * 30}} (Estm.)</li>
                            <li><b>Location: </b>{{$data->location}}</li>
                            @if($data->gpu)
                              <li><b>GPU: </b>{{$data->gpu}}</li>
                            @else
                              <li><b>GPU: </b>N/A</li>
                            @endif
                            <li><b>Operating System: </b>{{$data->operatingSystem}}</li>
                            <li><b>Tenancy: </b>{{$data->tenancy}}</li>
                            <li><b>Term Type: </b>{{$data->termType}}</li>
                            <!--<li>{{$data->physicalProcessor}}</li>
                                          <li>{{$data->networkPerformance}}</li>-->
                            <li><b>License: </b>{{$data->licenseModel}}</li>
                          </ul>
                        </dd>
                        @endforeach
                      </dl>
                    </div>
                  </div>
                  @endif
                  
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="row">
                  @if(isset($mergedArray))
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <h1 class="heading-primary">
                      <img src="{{url('azure.png')}}" alt="Azure Logo" height = 150px/>
                    </h1>
                    <div class="accordion">
                      <dl>
                        @foreach($mergedArray as $result)
                        <dt>
                          <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">
                            <div class="row">
                              <div class="col-md-2 vert-move">
                                <i class="fa fa-angle-down "></i>
                              </div>
                              <div class="col-md-6">
                                {{$result['series']}}
                              </div>
                              <div class="col-md-4">
                                {{round($result['price'], 3)}}/Hrs
                              </div>
                            </div>
                          </a>
                        </dt>
                        <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
                          <ul style="list-style-type: none; margin-top: 1rem;">
                            <li><b>vCPUs:</b> {{$result['cores']}}</li>
                            <li><b>Disk Size:</b> {{$result['diskSize']}}</li>
                            <li><b>GPU:</b> {{$result['gpu']}}</li>
                            <li><b>Memory:</b> {{$result['ram']}} GiB</li>
                            @foreach(explode('-', $result['series']) as $os)
                            <li><b>Operating System:</b> {{$os}}</li>
                            @break
                            @endforeach
                            <li><b>Location: </b>{{$region}}</li>
                            <li><b>Price/Month: </b>{{round($result['price'], 3)* 24 * 30}} (Estm.)</li>
                            <!-- <li>{{$result['price_perhour_threeyear']}}</li>
                                          <li>{{$result['price_perhourspot']}}</li>-->
                            <li><b>Offer Type :</b>{{$result['offerType']}}</li>
                            <li><b>Pricing Type :</b>{{$result['pricingType']}}</li>
                          </ul>
                        </dd>
                        @endforeach
                      </dl>
                    </div>
                  </div>
                  @endif
                  
                </div>
              </div>
            </div>
          </div>
        </div>
    </body>
    <script type ="text/javascript">
        var currentTab = 0;
        document.addEventListener("DOMContentLoaded", function(event) {
            showTab(currentTab);
        });

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } 
            else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
            } 
            else {
                document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
            }
            
            fixStepIndicator(n)
        }

        

//uses classList, setAttribute, and querySelectorAll
//if you want this to work in IE8/9 youll need to polyfill these
(function(){
	var d = document,
	accordionToggles = d.querySelectorAll('.js-accordionTrigger'),
	setAria,
	setAccordionAria,
	switchAccordion,
  touchSupported = ('ontouchstart' in window),
  pointerSupported = ('pointerdown' in window);
  
  skipClickDelay = function(e){
    e.preventDefault();
    e.target.click();
  }

		setAriaAttr = function(el, ariaType, newProperty){
		el.setAttribute(ariaType, newProperty);
	};
	setAccordionAria = function(el1, el2, expanded){
		switch(expanded) {
      case "true":
      	setAriaAttr(el1, 'aria-expanded', 'true');
      	setAriaAttr(el2, 'aria-hidden', 'false');
      	break;
      case "false":
      	setAriaAttr(el1, 'aria-expanded', 'false');
      	setAriaAttr(el2, 'aria-hidden', 'true');
      	break;
      default:
				break;
		}
	};
//function
switchAccordion = function(e) {
  console.log("triggered");
	e.preventDefault();
	var thisAnswer = e.target.parentNode.nextElementSibling;
	var thisQuestion = e.target;
	if(thisAnswer.classList.contains('is-collapsed')) {
		setAccordionAria(thisQuestion, thisAnswer, 'true');
	} else {
		setAccordionAria(thisQuestion, thisAnswer, 'false');
	}
  	thisQuestion.classList.toggle('is-collapsed');
  	thisQuestion.classList.toggle('is-expanded');
		thisAnswer.classList.toggle('is-collapsed');
		thisAnswer.classList.toggle('is-expanded');
 	
  	thisAnswer.classList.toggle('animateIn');
	};
	for (var i=0,len=accordionToggles.length; i<len; i++) {
		if(touchSupported) {
      accordionToggles[i].addEventListener('touchstart', skipClickDelay, false);
    }
    if(pointerSupported){
      accordionToggles[i].addEventListener('pointerdown', skipClickDelay, false);
    }
    accordionToggles[i].addEventListener('click', switchAccordion, false);
  }
})();
        
    </script>
</html>
