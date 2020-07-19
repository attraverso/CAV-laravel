@extends('layouts.dashboard')

@section('page-title', 'Visualizza dati iscritto')

@section('content')
  <div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center">
      <h1>Stai visualizzando i dati di <span class="text-primary">{{$member->first_name . ' ' . $member->last_name}}</span></h1>
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
    <a class="btn btn-warning" href="{{route('admin.members.edit', ['member' => $member->id])}}">Modifica</a>
    <a class="btn btn-danger" href="{{route('admin.members.edit', ['member' => $member->id])}}">Elimina</a>
  </div>
@endsection