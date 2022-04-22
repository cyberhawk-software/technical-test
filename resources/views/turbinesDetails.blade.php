<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Turbine Details</title>
    <style>
      .gaps{
        margin-top: 50px;
      }


    </style>
</head>
<body>
  <div class="container gaps">
    <div class="row">
      <div class="col-sm-6">
  
        <div class="card w-75" style="width:18rem;">
          <div class="card-body">
            <h1 class="card-title">Turbine{{ $turbine->id }}</h1>
            <p class="card-text">Turbine location is between {{ $turbine->latitude }} and {{ $turbine->longitude }}. Average Grade of the turbine is {{ $avgGrd }}.</p>
            <h3>Components Details are</h3>
            <ul>
              @foreach($components as $component)      
                <li>Name:{{$component->name}}</li>  
                <li>Id:{{$component->id}}</li>
                <li>Type:{{$component->type}}</li>
                <li><b>Grade:{{$component->grade}}</b></li>
                <hr>
              @endforeach
            </ul>
      
            <a href="/turbines" class="btn btn-primary">Back</a>
          </div>
        </div>
  
      </div> 
    </div>
  
  </div>
  
 


  
</body>
</html>