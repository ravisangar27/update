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
                        <h3 class="text-muted text-center mb-3">Staff Salary</h3>
                        <table class="table table-striped bg-light text-center">
                            <thead>
                                <tr class="text-muted">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Contact</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th></th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td> 
                                        <a href="{{ route('user.edit', $user) }}" data-toggle="tooltip" title="<h6>edit</h6>" data-html="true" data-placement="top">
                                            <i class="fas fa-edit fa-lg text-success mr-2"></i>
                                        </a>

                                        <a href="#" data-toggle="modal" data-target="#delete-model" title="<h6>delete</h6>" data-html="true" data-placement="top">
                                            <i class="fas fa-trash-alt fa-lg text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $users->links() }}
                    </div>
                </div>    
        <!-- pagination -->
        
        <!-- end of pagination -->
        
            </div>
        </div>
    </div>
</section>
@include('layouts.delete', ['route' => 'user.destroy', 'model' => $user])
      <!-- end of tables -->
@stop