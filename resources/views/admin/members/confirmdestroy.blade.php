@extends('layouts.dashboard')

@section('page-title', 'Visualizza dati iscritto')

@section('content')
  <div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center">
      <h1>Stai per <span class="text-danger">eliminare</span> i dati di {{$member->first_name . ' ' . $member->last_name}}</h1>
      <a class="btn btn-secondary" href="{{route('admin.members.index')}} ">Torna alla lista</a>
    </div>
    <table class="table">
      <tbody>
        <tr>
          <th class="table-secondary" scope="row">Nome</th>
          <td>{{$member->first_name}}</td>
        </tr>
        <tr>
          <th class="table-secondary" scope="row">Cognome</th>
          <td>{{$member->last_name}}</td>
        </tr>
        <tr>
          <th class="table-secondary" scope="row">Codice Fiscale</th>
          <td>{{$member->social_sec_nr}}</td>
        </tr>
        <tr>
          <th class="table-secondary" scope="row">Data di nascita</th>
          <td>{{$member->date_of_birth}}</td>
        </tr>
        <tr>
          <th class="table-secondary" scope="row">Città di nascita</th>
          <td>{{$member->city_of_birth}}</td>
        </tr>
        <tr>
          <th class="table-secondary" scope="row">Provincia/Stato</th>
          <td>{{$member->province_of_birth}}</td>
        </tr>
        <tr>
          <th class="table-secondary" scope="row">Indirizzo</th>
          <td>{{$member->address}}</td>
        </tr>
        <tr>
          <th class="table-secondary" scope="row">Località</th>
          <td>{{$member->city}}</td>
        </tr>
        <tr>
          <th class="table-secondary" scope="row">Provincia</th>
          <td>{{$member->province}}</td>
        </tr>
        <tr>
          <th class="table-secondary" scope="row">Telefono</th>
          <td>{{$member->phone_nr}}</td>
        </tr>
        <tr>
          <th class="table-secondary" scope="row">Email</th>
          <td>{{$member->email}}</td>
        </tr>
        <tr>
          <th class="table-secondary" scope="row">Note</th>
          <td>{{$member->notes}}</td>
        </tr>
      </tbody>
    </table>
    <form action="{{route('admin.members.destroy', ['member' => $member->id])}}" method="post">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger" type="submit">Conferma eliminazione</button>
    </form>
  </div>
@endsection