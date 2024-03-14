@extends('dashboard.layout.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-sm-flex align-items-center mb-4">
          <h4 class="card-title mb-sm-0">{{ $data['page'] }}</h4>
          <a href="{{ route('addPrice') }}" class="text-dark ml-auto mb-3 mb-sm-0"> Add new Price</a>
        </div>
        <div class="table-responsive border rounded p-1">
          <table class="table">
            <thead>
              <tr>
                  <th class="font-weight-bold">Year & Month</th>
                <th class="font-weight-bold">Content</th>
                <th class="font-weight-bold">Link</th>
                <th class="font-weight-bold">Action(s)</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($data['prices'] as $price)

                <tr>
                    <td>{{ $price['created_at']->format('F, Y') }}</td>
                    <td style="color: green">{!! Illuminate\Support\Str::limit($price['description'], 50) !!}</td>
                    <td>
                        @if ($price['hyperlink'])
                            <button class="btn btn-dark">View</button>
                        @else
                            <button class="btn btn-dark" disabled>No Link</button>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('editPrice', ['id' => $price->id]) }}" class="btn btn-icon bg-success">
                            <button class="btn btn-icon bg-success"><i class="icon-pencil text-white"></i></button>
                        </a>
                        <form action="{{ route('deletePriceWatch', ['id' => $price]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-icon bg-danger">
                                <i class="icon-trash text-white"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                @endforeach

            </tbody>
          </table>
        </div>
        <div class="d-flex mt-4 flex-wrap">
          <p class="text-muted">Showing 1 to 10 of 57 entries</p>
          <nav class="ml-auto">
            <ul class="pagination separated pagination-info">
              <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-left"></i></a></li>
              <li class="page-item active bg-danger"><a href="#" class="page-link">1</a></li>
              <li class="page-item"><a href="#" class="page-link">2</a></li>
              <li class="page-item"><a href="#" class="page-link">3</a></li>
              <li class="page-item"><a href="#" class="page-link">4</a></li>
              <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-right"></i></a></li>
            </ul>
          </nav>
        </div>

    </div>
    {{-- dcnj --}}
    </div>
  </div>
</div>

@endsection
