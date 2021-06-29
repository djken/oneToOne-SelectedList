@extends('schools.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Founders Name</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('founders.create') }}"> Create New Founder</a>
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
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($founders as $founder)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $founder->firstname }}</td>
            <td>{{ $founder->lastname }}</td>
            <td>{{ $founder->email }}</td>
            <td>
                <form action="{{ route('founders.destroy',$founder->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('founders.show',$founder->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('founders.edit',$founder->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $founders->links() !!}
      
@endsection