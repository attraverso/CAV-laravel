@extends('layouts.dashboard')

@section('page-title', 'Elenco iscritti')

@section('content')
  <div class="container mt-3">
    <div class="d-flex justify-content-start align-items-center">
      <h1>Elenco iscritti</h1>
      <a class="btn btn-success ml-3" href="{{route('admin.members.create')}} ">Nuovo iscritto</a>
    </div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Cognome</th>
          <th scope="col">Codice Fiscale</th>
          <th scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($members as $member)
          <tr>
            <td>{{$member->first_name}}</td>
            <td>{{$member->last_name}}</td>
            <td>{{$member->social_sec_nr}}</td>
            <td>
              <a class="btn btn-info" href="{{route('admin.members.show', ['member' => $member->id])}}">Dettagli</a>
              <a class="btn btn-warning" href="{{route('admin.members.edit', ['member' => $member->id])}}">Modifica</a>
              <a class="btn btn-danger" href="{{route('admin.members.confirmdestroy', ['member' => $member->id])}}">Elimina</a>
              <a class="btn btn-success" href="{{route('admin.activities.new', ['activity' => $member->id])}}">Aggiungi dettaglio</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection