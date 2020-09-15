@extends('layouts/app')
@section('title')
    Cars
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center pt-3 pb-3 border-bottom">
        <h2>Cars</h2>
        <div class="btn-toolbar mb-2 mb-md-0 ">
            <a href="{{ route('cars.create') }}" class="btn btn-sm btn-primary">Add New Car</a>
        </div>
    </div>

    @if (Session::has('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ Session::get('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <div class="table-responsive shadow rounded">
        <table class="table table-sm table-striped table-hover">
            <tr>
                <th>#</th>
                <th>Make</th>
                <th>Model</th>
                <th>Produced on</th>
                 <th>Created At</th>
                <th>Updated At</th>
            </tr>
            @foreach ($cars as $car)
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->make }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->produced_on }}</td>
                <td>{{ $car->created_at }}</td>
                <td>{{ $car->updated_at }}</td>
                <td class="text-center">
                    <a href="{{ route('cars.edit',['car' => $car]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <form class="d-inline" action="{{ route('cars.destroy',['car' => $car]) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{-- <div class="m1-1">
            {{ $cars->links() }}
        </div> --}}
        <nav aria-label="Pagination" class="d-flex justify-content-between align-items-center px-2">
            <p>Showing {{ $cars->firstItem() }} to {{ $cars->lastItem() }} of {{ $cars->total() }} entiers</p>
            <ul class="pagination pagination-sm">
                <form class="form-inline mr-1" method="GET" role="form">
                    <div class="form-group">
                        <label for="perPage">Items per page</label>
                        <select name="perPage" id="perPage" class="form-control form-control-sm ml-1" onchange="this.form.submit()">
                            <option value="5" @if ($cars->perPage() == 5) selected @endif>5</option>
                            <option value="10" @if ($cars->perPage() == 10) selected @endif>10</option>
                            <option value="15" @if ($cars->perPage() == 15) selected @endif>15</option>
                        </select>
                    </div>
                </form>
                {{ $cars->appends(['perPage' => $cars->perPage()])->links() }}
            </ul>
        </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
