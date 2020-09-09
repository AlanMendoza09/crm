@extends('admin.layouts.app')

@section('content')
@if (count ($errors) > 0)
    <div class="row">
        <div class="col-12">
            {{--$errors--}}
            <div class="alert alert-danger alert-dismissable fade show" role="alert">
                <strong>There is an error on your form!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    {{ $prospect->name }} <span class="btn btn-sm btn-primary float-right" id="add-prospect-btn">Edit</span></h6>
                </div>
                <div class="card-body">
                    <h6>Email: {{ $prospect->email }}</h6>
                    <h6>Phone: {{ $prospect->phone }}</h6>
                    <h6>Secondary Phone: {{ $prospect->phone_2 }}</h6>
                    <h6>Address: {{ $prospect->address }}</h6>
                    <h6>City: {{ $prospect->city }}</h6>
                    <h6>Province/State: {{ $prospect->province_state }}</h6>
                    <h6>Country: {{ $prospect->country }}</h6>
                    <h6>Note: {{ $prospect->note }}</h6>
                    <h6>Prospect Message: {{ $prospect->prospect_message }}</h6>
                    <h6>Active Client: {{ $prospect->isClient  == true ? 'Yes' : 'No'}}</h6>
                    <h6>Claimable: {{ $prospect->isClaimable == true ? 'Yes' : 'No'}}</h6>
                    <h6>Assigned To: {{$assigned_to}}
                </div>
            </div>
        </div>
    </div>

    {{--Modals--}}
    <div  class="modal-style-prospect" id="edit-prospect-modal">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card mt-5">
                    <div class="card-header">
                        Edit the details for: {{ $prospect->name }} <span class="float-right close-modal-prospect" style="cursor: pointer; color:red"><b>X</b></span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.prospect.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="id" value="{{ $prospect->id }}" hidden>
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('name')}}
                                        </div>
                                    @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('email')}}
                                        </div>
                                    @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" value="{{ old('phone') }}">
                                        @if ($errors->has('phone'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('phone')}}
                                        </div>
                                    @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_2">Secondary Phone:</label>
                                        <input type="text" class="form-control" name="phone_2" value="{{ old('phone_2') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City:</label>
                                        <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                                    </div>
                                </div>
                                {{--./col-md-6 FIRST COLUMN--}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="province_state">Province/State:</label>
                                        <input type="text" class="form-control" name="province_state" value="{{ old('province_state') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country:</label>
                                        <input type="text" class="form-control" name="country" value="{{ old('country') }}">
                                    </div>
                                    {{--<div class="form-group">
                                        <label for="assigned">Assigned To:</label>
                                        <select name="assigned" id="" class="form-control" value="{{ old('assigned') }}">
                                            <option value="0">Unassigned</option>
                                            @foreach ($users as $user)
                                            <option value="{{$user->id}}" {{ old('assigned') == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>--}}
                                    <div class="form-group">
                                        <label for="note">Note:</label>
                                        <textarea name="note" id="" cols="30" rows="9" class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}">{{ old('note') }}</textarea>
                                        @if ($errors->has('note'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('note')}}
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block">Update Prospect Details</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('admin.layouts.scripts.scripts')
<script src="{{ asset('js/admin/prospect.js') }}"></script>
@endpush

@endsection
