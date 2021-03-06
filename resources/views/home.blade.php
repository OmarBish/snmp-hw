@extends('layouts.app')

@section('content')
<div class="container">

    {{--  system contact table --}}
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tavles</div>

                <div class="card-body">
                    <div class="form-group text-center">
                        <label for="table">Choose table</label>
                        <select class="form-control" id="table" name="table">
                            <option value="#">Choose Table</option>
                            <option value="{{ route('tables/system') }}">System group</option>
                            <option value="{{ route('tables/ipNetToMediaIfIndex') }}">ipNetToMediaIfIndex</option>
                            <option value="{{ route('tables/ipNetToMediaPhysAddress') }}">ipNetToMediaPhysAddress</option>
                            <option value="{{ route('tables/ipNetToMediaNetAddress') }}">ipNetToMediaPhysAddress</option>
                            <option value="{{ route('tables/ipNetToMediaType') }}">ipNetToMediaPhysAddress</option>
                        </select>
                    </div>
                    <span style="display: flex;
                    justify-content: space-evenly;">
                        <a class="btn btn-primary btn-lg" href="{{ route('snmp/get') }}" role="button">Get Object</a>
                        <a class="btn btn-primary btn-lg" href="{{ route('snmp/set') }}" role="button">Set Object</a>
                    </span>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
          // bind change event to select
          $('#table').on('change', function () {
              var url = $(this).val(); // get selected value
              if (url) { // require a URL
                  window.location = url; // redirect
              }
              return false;
          });
        });
    </script
</div>
@endsection
