@extends('layouts.dashboard')

@section('page-title', 'Aggiungi nuovo iscritto')

@section('content')
  <div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center">
      <h1>Aggiungi nuova attività per
        <span class="text-primary">{{$member->first_name.' '.$member->last_name}}</span>
      </h1>
      <a class="btn btn-secondary" href="{{route('admin.members.index')}} ">Torna alla lista</a>
    </div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
     @endif
    <form action="{{route('admin.activities.store')}}" method="post">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="activity-firstname">Anno sociale</label>
          <input type="text" class="form-control" id="activity-firstname" name="membership_for_year" value="{{old('first_name')}}" required>
        </div>
        <div class="form-group col-md-3">
          <label for="activity-lastname">Data iscrizione</label>
          <input type="date" class="form-control" id="activity-lastname" name="membership_start" value="{{old('last_name')}}" required>
        </div>
      </div>
     <div class="form-row">
      <div class="form-group col-md-3">
        <label for="activity-ssn">Tipo attività</label>
        <input type="text" class="form-control" id="activity-ssn" name="membership_type" value="{{old('social_sec_nr')}}">
      </div>
        <fieldset class="form-group col-md-3">
          <legend class="col-form-label">Corso di tiro</legend>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="class" id="activity-radio1" value="1" {{old('class') == 1 ? 'checked' : ''}}>
            <label class="form-check-label" for="activity-radio1">Sì</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="class" id="activity-radio2" value="0" {{old('class') == 0 ? 'checked' : ''}}>
            <label class="form-check-label" for="activity-radio2">No</label>
          </div>
        </fieldset>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="member-notes">Note</label>
          <textarea class="form-control" name="notes" id="member-notes" rows="3">{{old('notes')}}</textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Aggiungi iscrizione</button>
    </form>
  </div>
@endsection