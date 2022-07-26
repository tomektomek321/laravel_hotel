

@extends('layouts.frontend')

@section('content')
<div class="container-fluid places">

    @if (session('norooms'))
        <p class="text-center red bolded">
            {{ session('norooms') }}
        </p>
    @endif



</div>
@endsection


