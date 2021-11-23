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
          
        </style>
    </head>
    <body>
      <div class="container">
        <div class="section_our_solution">
          <h2>AWS Price List</h2>
          <div class="row">
            @foreach($aws_product as $result)
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="our_solution_category">
                    <div class="solution_cards_box">
                        <div class="solution_card">
                            <div class="hover_color_bubble"></div>
                              
                              <div class="solu_title">
                                <h3>{{$result->instanceType}}</h3>
                              </div>
                              <div class="solu_description">
                                <ul style="list-style-type: none;"> 
                                  <li><b>vCPUs:</b>{{$result->vcpu}}</li>
                                  <li><b>ECU:</b>{{$result->ecu}}</li>
                                  <li><b>Memory:</b>{{$result->memory}}</li>
                                  <li><b>Storage:</b>{{$result->storage}}</li>
                                  <li><b>Price:</b>{{$result->price}} per {{$result->unit}}</li>
                                  <li><b>Location:</b>{{$result->location}}</li>
                                  <!-- <li>{{$result->gpu}}</li> -->
                                  <li><b>Operating System:</b>{{$result->operatingSystem}}</li>
                                  <!-- <li>{{$result->tenancy}}</li>
                                  <li>{{$result->termType}}</li>
                                  <li>{{$result->physicalProcessor}}</li>
                                  <li>{{$result->networkPerformance}}</li>
                                  <li>{{$result->licenseModel}}</li> -->
                                </ul>
                              </div>
                        </div>
                    </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="section_our_solution">
          <h2>Azure Price List</h2>
          <div class="row">
            @foreach($azure_product as $data)
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="our_solution_category">
                    <div class="solution_cards_box">
                        <div class="solution_card">
                            <div class="hover_color_bubble"></div>
                              
                              <div class="solu_title">
                                <h3>{{$data->series}}</h3>
                              </div>
                              <div class="solu_description">
                                <ul style="list-style-type: none;">
                                  <li><b>vCPUs:</b> {{$data->cores}}</li>
                                  <li><b>Disk Size:</b> {{$data->diskSize}}</li>
                                  <li><b>GPU:</b> {{$data->gpu}}</li>
                                  <li><b>Memory:</b> {{$data->ram}} GiB</li>
                                  @foreach(explode('-', $data->series) as $os) 
                                    <li><b>Operating System:</b> {{$os}}</li>
                                    @break
                                  @endforeach
                                  
                                  <!-- <li>{{$data->price_perhour}}</li>
                                  <li>{{$data->price_perhour_oneyear}}</li>
                                  <li>{{$data->price_perhour_threeyear}}</li>
                                  <li>{{$data->price_perhourspot}}</li>
                                  <li>{{$data->offerType}}</li>
                                  <li>{{$data->pricingType}}</li> -->
                                </ul>
                              </div>
                        </div>
                    </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>  
    </body>
</html>
