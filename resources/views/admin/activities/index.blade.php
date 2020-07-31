@extends('layouts.dashboard')

@section('page-title', 'Elenco attività iscritto')

@section('content')
<div class="container mt-3">
  <div class="d-flex justify-content-between align-items-center">
    <h1>Elenco iscrizioni</h1>
    <a class="btn btn-success" href="{{route('admin.members.create')}} ">Aggiungi nuova</a>
  </div>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Cognome</th>
        <th scope="col">Anno sociale</th>
        <th scope="col">Data iscrizione</th>
        <th scope="col">Tipo iscrizione</th>
        <th scope="col">Scadenza iscrizione</th>
        <th scope="col">Corso tiro?</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($activities as $activity)
        <tr>
          <td>{{$activity->member->first_name}}</td>
          <td>{{$activity->member->last_name}}</td>
          <td>{{$activity->membership_for_year}}</td>
          <td>{{$activity->membership_start}}</td>
          <td>{{$activity->membership_type}}</td>
          <td>{{$activity->membership_end}}</td>
          <td>{{$activity->class == true? 'SI' : 'NO'}}</td>
          {{-- <td>
            <a class="btn btn-primary" href="{{route('admin.member_activities.show', ['member_activity' => $activity->id])}}">Dettagli</a>
            <a class="btn btn-warning" href="{{route('admin.member_activities.edit', ['member_activity' => $activity->id])}}">Modifica</a>
            <a class="btn btn-danger" href="{{route('admin.member_activities.confirmdestroy', ['member_activity' => $activity->id])}}">Elimina</a>
          </td> --}}
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection