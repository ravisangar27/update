@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@stop

@section('content')
    <!-- tables -->
<section>
    <div class="container-fluid mt-5">
        <div class="row mb-5 align-items-center">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="card card-common">
                    <div class="card-header">
                        <div class="float-right">
                        <a href="{{ route('user.create') }}" class="btn btn-primary">Add</a>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['route' => 'user.store', 'method' => 'POST', 'class' => 'form-horizontal']) }}
                            @include('users.form', ['submitButtonText' => 'Add'])
                        {{ Form::close() }}
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
      <!-- end of tables -->
@stop