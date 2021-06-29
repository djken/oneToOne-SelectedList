@extends('schools.layout')
 
@section('content')

{{-- <select name='' id=''>
    @foreach ($data as $row)
        <option value='{{ $row->id }}'>
            {{ $row->firstname }}
        </option>
    @endforeach
</select> --}}

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('schools.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Addresse</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Description</th>
            <th>Founder</th>
            <th width="280px">Action</th>
        </tr>
        
       
        
        @foreach ($schools as $school)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $school->name }}</td>
            <td>{{ $school->address }}</td>
            <td>{{ $school->phone }}</td>
            <td>{{ $school->email }}</td>
            <td>{{ $school->description }}</td>
            <td>{{$school->founder->firstname }}</td>
            
            <td>
                <form action="{{ route('schools.destroy',$school->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('schools.show',$school->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('schools.edit',$school->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $schools->links() !!}
      
@endsection