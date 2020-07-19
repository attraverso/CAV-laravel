@extends('layouts.dashboard')

@section('page-title', 'Modifica dati iscritto')

@section('content')
  <div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center">
      <h1>Modifica dati iscritto</h1>
      <a class="btn btn-secondary" href="{{route('admin.members.index')}} ">Torna alla lista</a>
    </div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
     @endif
    <form action="{{route('admin.members.update', ['member' => $member->id])}}" method="post">
      @csrf
      @method('PUT')
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="member-firstname">Nome</label>
          <input type="text" class="form-control" id="member-firstname" name="first_name" value="{{$errors->any() ? old('first_name') : $member->first_name}}" required>
        </div>
        <div class="form-group col-md-4">
          <label for="member-lastname">Cognome</label>
          <input type="text" class="form-control" id="member-lastname" name="last_name" value="{{$errors->any() ? old('last_name') : $member->last_name}}" required>
        </div>
        <div class="form-group col-md-4">
          <label for="member-ssn">Codice Fiscale</label>
          <input type="text" class="form-control" id="member-ssn" name="social_sec_nr" value="{{$errors->any() ? old('social_sec_nr') : $member->social_sec_nr}}">
        </div>
      </div>
     <div class="form-row">
        <div class="form-group col-md-6">
          <label for="member-cityob">Nato a</label>
          <input type="text" class="form-control" id="member-cityob" name="city_of_birth" value="{{$errors->any() ? old('city_of_birth') : $member->city_of_birth}}">
        </div>
        <div class="form-group col-md-2">
          <label for="member-provinceob">Provincia/Stato estero</label>
          <input type="text" class="form-control" id="mamber-provinceob" name="province_of_birth" value="{{$errors->any() ? old('province_of_birth') : $member->province_of_birth}}">
        </div>
        <div class="form-group col-md-4">
          <label for="member-dob">Data di nascita</label>
          <input type="date" class="form-control" id="mamber-dob" name="date_of_birth" value="{{$errors->any() ? old('date_of_birth') : $member->date_of_birth}}">
        </div>
     </div>
     <div class="form-row">
        <div class="form-group col-md-6">
          <label for="member-ssn">Indirizzo di residenza</label>
          <input type="text" class="form-control" id="member-address" name="address" value="{{$errors->any() ? old('address') : $member->address}}">
        </div>
        <div class="form-group col-md-2">
          <label for="member-zipcode">CAP</label>
          <input type="text" class="form-control" id="member-zipcode" name="postal_code" value="{{$errors->any() ? old('postal_code') : $member->postal_code}}">
        </div>
        <div class="form-group col-md-2">
          <label for="member-city">Città</label>
          <input type="text" class="form-control" id="member-city" name="city" value="{{$errors->any() ? old('city') : $member->city}}">
        </div>
        <div class="form-group col-md-2">
          <label for="member-province">Provincia</label>
          <input type="text" class="form-control" id="member-province" name="province" value="{{$errors->any() ? old('province') : $member->province}}">
        </div>
     </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="member-phone">Telefono</label>
          <input type="text" class="form-control" id="member-phone" name="phone_nr" value="{{$errors->any() ? old('phone_nr') : $member->phone_nr}}">
        </div>
        <div class="form-group col-md-6">
          <label for="member-email">Email</label>
          <input type="email" class="form-control" id="member-email" name="email" value="{{$errors->any() ? old('email') : $member->email}}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="member-notes">Note</label>
          <textarea class="form-control" name="notes" id="member-notes" rows="3">{{$errors->any() ? old('notes') : $member->notes}}</textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-warning">Modifica dati</button>
    </form>
  </div>
@endsection