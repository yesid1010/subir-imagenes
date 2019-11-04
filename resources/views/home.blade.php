@extends('layouts.app')

@section('content')
{{-- <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                    @csrf
                <div class="card-header text-center">Publications</div>
                
                <div class="card-body">
                    <index-component urls = "/all" user = "{{ Auth::user()->id}}"/>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<app-component user = "{{ Auth::user()->id}}"/>
{{-- <router-view/> --}}
@endsection
