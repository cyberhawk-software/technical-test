<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WindFarm</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

  <div class="container mx-auto px-10">
  <section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="w-48 h-2 mx-auto  rounded-lg dark:bg-gray-700">CyberHawk</h1>

        <p class="w-64 h-2 mx-auto mt-4  rounded-lg dark:bg-gray-700"></p>
        <p class="w-64 h-2 mx-auto mt-4  rounded-lg sm:w-80 dark:bg-gray-700"></p>

        
          @if(count($turbines)>0)
          <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 sm:grid-cols-2 xl:grid-cols-4 lg:grid-cols-3">
            @foreach($turbines as $turbine)
                <div class="w-full ">
                  <a href="/turbines/{{$turbine->id}}" target="new">
                    <div class="w-full h-64 bg-gray-300 rounded-lg dark:bg-gray-600">
                    <img src="{{url('/img/turbine.png')}}" alt="Image" />
                    </div>
                  </a>
                    
                    <h1 class="w-56 h-2 mt-4  rounded-lg dark:bg-gray-700">{{$turbine->name}}</h1>
                </div>
            @endforeach
          </div>
          @else
          <p class="w-64 h-2 mx-auto mt-4  rounded-lg dark:bg-gray-700">No Turbines installed !</p>
          @endif
        
    </div>
</section>



  </div>
</body>
</html>