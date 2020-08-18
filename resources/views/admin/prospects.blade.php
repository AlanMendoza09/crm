@extends('admin.layouts.app')

@section('content')
    <div class="row">



        @foreach ($prospects as $prospect)
            <div class="col-md-3 offset-md-2">
            <a href="{{ route('admin.prospect', ['id' => $prospect->id]) }}" style="text-decoration: none; color:black">
                    <div class="card mt-3">
                        <div class="card-header">
                            {{ $prospect->name }}
                        </div>
                        <div class="card-body">
                            <h6>{{ $prospect->phone }}</h6>
                            <h6>{{ $prospect->email }}</h6>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    {{--./row--}}
    <div class="row mt-5">
        <div class="col-md-6 offset-md-5">
            <div class="" style="margin: 0 auto;">
                {{ $prospects->links() }}
            </div>
        </div>
    </div>
    {{--./row--}}
@endsection
