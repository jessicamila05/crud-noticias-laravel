@extends('templates.template')

@section('content')
    <h1>Notícias</h1>
    
    <div>
        @csrf
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Texto</th>
                    <th>Autor</th>
                </tr>

            </thead>
            <tbody>
                @Foreach($news as $news)
                  @php
                     $user=$news->find($news->id)->relUsers;
                  @endphp
                  <tr>
                      <th scope="row">{{$news->id}}</th>
                      <td>{{$news->title}}</td>
                      <td>{{$news->text}}</td>
                      <td>{{$user->name}}</td>
                      <td>
                          <a href="{{url("noticias/$news->id")}}">
                              <button>Visualizar</button>
                          </a>
                          <a href="{{url("noticias/$news->id/edit")}}">
                              <button>Editar</button>
                          </a>
                          <a href="{{url("noticias/$news->id")}}" class="js-delete">
                              <button>Deletar</button>
                          </a>
                      </td>
                  </tr>   
                @endforeach
            </tbody>
        </table>

        <div>
           <a href="{{url('noticias/create')}}">
              <button>Cadastrar</button>
            </a>
        </div>
        {{$news->links()}}
    </div>
    

@endsection

