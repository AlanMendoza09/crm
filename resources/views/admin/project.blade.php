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
                {{ $project->name }} <span class="btn btn-sm btn-primary float-right" id="add-prospect-btn">Edit</span></h6>
            </div>
            <div class="card-body">
                <h6>Start Date: {{ $project->date_start }}</h6>
                <h6>Estimated Cost: {{ $project->estimated_cost }}</h6>
                <h6>Project Status: {{ $project->project_state }}</h6>
                <h6>Total Project Cost: {{ $project->final_price }}</h6>Claimable: {{ $project->isClaimable == true ? 'Yes' : 'No'}}</h6>
                <h6>Assigned To: {{$assigned_to}}
            </div>
        </div>
    </div>
</div>

 {{--Modals--}}
 <div  class="modal-style-project" id="add-project-modal">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="card mt-5">
                <div class="card-header">
                    Edit the details for: {{ $project->name }} <span class="float-right close-modal-project" style="cursor: pointer; color:red"><b>X</b></span>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.project.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="id" value="{{ $project->id }}" hidden>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('name')}}
                                    </div>
                                @endif
                                </div>
                                {{--<div class="form-group">
                                    <label for="date_start">Start Date:</label>
                                <input type="text" class="form-control {{ $errors->has('date_start') ? 'is-invalid' : '' }}" name="date_start" value="{{ old('date_start') }}">
                                @if ($errors->has('date_start'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('date_start')}}
                                    </div>
                                @endif
                                </div>--}}
                                <div class="form-group">
                                    <label for="estimated_cost">Estimated Cost:</label>
                                <input type="text" class="form-control {{ $errors->has('estimated_cost') ? 'is-invalid' : '' }}" name="estimated_cost" value="{{ old('estimated_cost') }}">
                                @if ($errors->has('estimated_cost'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('estimated_cost')}}
                                    </div>
                                @endif
                                </div>
                            </div>
                            {{--./col-md-6 FIRST COLUMN--}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project_state">Project State:</label>
                                <input type="text" class="form-control {{ $errors->has('project_state') ? 'is-invalid' : '' }}" name="project_state" value="{{ old('project_state') }}">
                                @if ($errors->has('project_state'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('project_state')}}
                                    </div>
                                @endif
                                </div>
                                <div class="form-group">
                                    <label for="final_price">Final Price:</label>
                                <input type="text" class="form-control {{ $errors->has('final_price') ? 'is-invalid' : '' }}" name="final_price" value="{{ old('final_price') }}">
                                @if ($errors->has('final_price'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('final_price')}}
                                    </div>
                                @endif
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
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block">Update Project Details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('admin.layouts.scripts.scripts')
<script src="{{ asset('js/admin/project.js') }}"></script>
@endpush

@endsection
