<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WindFarm</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<!--Container-->
	<div class="container w-full md:max-w-3xl mx-auto pt-20">
		<div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
			<!--Title-->
			<div class="font-sans">			
						<h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">{{ucwords($turbine->name)}}</h1>
			</div>
			<!--Lead Para-->
			<p class="py-6">
				{{$turbine->specification}}
			</p>

			<h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-1xl md:text-2xl">Components</h1>
      @if(!empty($turbine->turbinecomponents) && count($turbine->turbinecomponents)>0)
        @foreach($turbine->turbinecomponents as $component)
        <h1 class="py-2 font-sans">{{$component->components->name}}</h1>
        <p class="py-2">Grade: {{$component->grade}}</p>
        <p class="py-2">Evaluation result: {{$component->specification}}</p>
        @endforeach
      @endif

		</div>

	</div>
  </body>
</html>