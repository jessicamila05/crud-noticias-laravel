@extends('templates.template')

@section('content')
    <h1>@if(isset($news))Editar @else Cadastrar @endif</h1>
    @if(isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-dange">
            @foreach($errors->all() as $erro)
                {{$erro}}
            @endforeach
        </div>
    @endif
    
    <div>
        @if(isset($news))
            <form name="formEdit" id="formEdit" method="post" action="{{url("noticias/$news->id")}}">
                @method('PUT')
        @else
            <form name="formCard" id="formCard" method="post" action="{{url('noticias')}}">
        @endif
            @csrf
            <input class="form-control" type="text" name="title" id="title" placeholder="Titulo"  value="{{$news->title ?? ''}}" required>
            <input class="form-control" type="text" name="text" id="text" placeholder="Texto" value="{{$news->text ?? ''}}" required>
            <select class="form-control" name="user_id" id="user_id" required>
                <option value="{{$news->relUsers->id ?? ''}}">{{$news->relUsers->name ?? 'Autor'}}</option>
                @foreach($users as $user)
                   <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <input class="btn btn-primary" type="submit" value="@if(isset($news))Editar @else Cadastrar @endif">
        </form>
        
    </div>
    

@endsection