@extends('template-default')

@section('content')


  <div class="flex justify-center">
    <div class="w-full lg:w-1/2 xl:w-1/3">

      <div class="flex justify-center mt-10">
        <img class="rounded-full w-20 h-20 object-cover" src="{{asset('profile.jpg')}}" alt="Perfil">
      </div>

      <h1 class="text-3xl font-bold text-center mt-5 mb-5">
        Inscrição confirmada!
      </h1>
  
      <p class="text-center mt-2 mb-2">
        No dia de trabalho seguinte, você vai receber a primeira edição da nossa Newsletter 🎉.
      </p>
    </div>
  </div>
@endsection