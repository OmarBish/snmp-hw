@extends('layouts.app')

@section('content')
<div class="container">

    {{--  system contact table --}}
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">System Table</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" id="type" name="type">
                            <option value="#">Choose Table</option>
                            <option value="{{ route('tables/system') }}">System group</option>
                            <option value="{{ route('tables/ipNetToMediaIfIndex') }}">ipNetToMediaIfIndex</option>
                            <option value="{{ route('tables/ipNetToMediaPhysAddress') }}">ipNetToMediaPhysAddress</option>
                            <option value="{{ route('tables/ipNetToMediaNetAddress') }}">ipNetToMediaPhysAddress</option>
                            <option value="{{ route('tables/ipNetToMediaType') }}">ipNetToMediaPhysAddress</option>
                        </select>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Type</th>
                                <th scope="col">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($systemData as $row)
                            <tr>
                                <th scope="row"> {{$row['id']}} </th>
                                <td> {{$row['type']}} </td>
                                <td> {{$row['data']}} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
          // bind change event to select
          $('#type').on('change', function () {
              var url = $(this).val(); // get selected value
              if (url) { // require a URL
                  window.location = url; // redirect
              }
              return false;
          });
        });
    </script>
</div>
@endsection
