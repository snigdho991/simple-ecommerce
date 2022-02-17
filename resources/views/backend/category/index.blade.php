@extends('layouts.master')

@section('title', 'All Category')

@section('content')
   
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div class="inline" style="display: flex; gap: 5px;">
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a> 
                                        <form method="POST" action="{{ route('category.destroy', $category->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" style="margin-left: 5px;" title="Delete" type="submit">Delete</button> 
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
    </div>

@endsection