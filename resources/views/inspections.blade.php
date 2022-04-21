<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inspections Updates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
      .size{
        width: 20%;
        margin: auto;
      }
      a:link {
        text-decoration: none !important;
      }
      a:hover {
        text-decoration: none !important;
      }
    </style>
</head>
<body>
  <div class="container">
    <div class="row text-center">
      <div class="col">
        <h1 class="display-6"> Inspected Turbines</h1>
      </div>
    </div>
  </div>



  <div class="container mt-2">
    <div class="row">
      <div class="size shadow-sm p-3 mb-5 bg-body rounded">
        <div class="table">
          <table class="table table-bordered table-striped">
              <tbody>
                <?php $turbinesArray = $turbines ?>
               @foreach($turbinesArray->chunk(2) as $set)
                <tr>
                  @foreach ($set as $turbine) 
                  <td class="border border-secondary border-5 text-center fw-bolder"><a href="turbines/{{ $turbine->id }}">T{{ $turbine->id }}</a></td>
                  @endforeach
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>

      </div>
    </div>    
  </div>
  
</body>
</html>