@extends('templates.template')

@section('content')
    <h1>Visualizar</h1>
    
    <div>
        @php
            $user=$news->find($news->id)->relUsers;
        @endphp
        Titulo: {{$news->title}}</br>
        Texto: {{$news->text}}</br>
        Autor: {{$user->name}}</br>
        
    </div>
    

@endsection

