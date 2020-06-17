@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($entries->isEmpty())
                        <p> Todavía no has publicado ninguna Entrada!!! </p>

                     @else
                         <p> Mis Entradas: </p>
                         <ul>
                         @foreach($entries as $entry)
                             <li>
                             <!--                <a href="{{ url('entries/'.$entry->id) }}"> {{ $entry->title }} </a>  -->
                             <a href="{{ $entry->getUrl() }}"> {{ $entry->title }} </a>
                             </li>
                         @endforeach
                         </ul>
                    @endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
