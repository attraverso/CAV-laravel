@extends('layouts.dashboard')

@section('page-title', 'Visualizza dati iscritto')

@section('content')
  <div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center">
      <h1>Stai visualizzando un'attività di <span class="text-primary">{{$member->first_name . ' ' . $member->last_name}}</span></h1>
      <a class="btn btn-secondary" href="{{route('admin.members.index')}} ">Torna alla lista</a>
    </div>
    <table class="table w-50">
      <tbody">
        <tr>
          <th class="table-secondary w-50" scope="row">Anno sociale</th>
          <td class="w-50">{{$activity->membership_for_year}}</td>
        </tr>
        <tr>
          <th class="table-secondary" scope="row">Attività</th>
          <td>
            @switch($activity->membership_type)
              @case(1)
                Nuovo Tesserato
                @break;
              
              @case(2)
                Rinnovo Tesserato
                @break;
              
              @case(3)
                Nuovo Socio
                @break;
              
              @case(4)
                Rinnovo Socio
                @break;

              @case(5)
                Utilizzo strutture - Estivo
                @break;

              @case(6)
                Utilizzo strutture - Invernale
                @break;
              
              @default:
                nessuna attività inserita
            @endswitch
          </td>
        </tr>
        <tr>
          <th class="table-secondary" scope="row">Data di iscrizione</th>
          <td>
            <?php
              $date_pieces = explode('-', $activity->membership_start);
              $date_reversed = array_reverse($date_pieces);
              $date = implode('-', $date_reversed);
              echo $date;
            ?>  
          </td>
        </tr>
        <tr>
          <th class="table-secondary" scope="row">Scadenza iscrizione</th>
          <td>
            <?php
              $date_pieces = explode('-', $activity->membership_end);
              $date_reversed = array_reverse($date_pieces);
              $date = implode('-', $date_reversed);
              echo $date;
            ?> 
          </td>
        </tr>
        <tr>
          <th class="table-secondary" scope="row">Corso di tiro?</th>
          <td>{{$activity->class == 1 ? 'Sì' : 'No'}}</td>
        </tr>
      </tbody>
    </table>
    <a class="btn btn-warning" href="{{route('admin.members.edit', ['member' => $member->id])}}">Modifica</a>
    <a class="btn btn-danger" href="{{route('admin.members.confirmdestroy', ['member' => $member->id])}}">Elimina</a>
  </div>
@endsection