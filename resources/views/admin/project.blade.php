@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    {{ $project->name }} <span class="btn btn-sm btn-primary float-right">Edit</span></h6>
                </div>
                <div class="card-body">
                    <h6>Start Date: {{ $project->date_start }}</h6>
                    <h6>Estimated Cost: {{ $project->estimated_cost }}</h6>
                    <h6>Project Status: {{ $project->project_state }}</h6>
                    <h6>Total Project Cost: {{ $project->final_price }}</h6>6>Claimable: {{ $project->isClaimable == true ? 'Yes' : 'No'}}</h6>
                    <h6>Assigned To: {{$assigned_to}}
                </div>
            </div>
        </div>
    </div>
@endsection
