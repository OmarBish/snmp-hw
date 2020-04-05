@extends('layouts.app')

@section('content')
<div class="container">
    {{-- get SNMP Object --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Get SNMP object</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('snmp/get') }}">
                        @csrf
                        <div class="form-group">
                            <label for="hostName">SNMP Host</label>
                            <input type="text" class="form-control" id="hostName" name="hostName"
                                placeholder="(ex: localhost)">
                            <small id="hostNameHelp" class="form-text text-muted">the host you will send the SNMP
                                request
                                to.</small>
                        </div>
                        <div class="form-group">
                            <label for="commuinity">Commuinity</label>
                            <input type="text" class="form-control" id="commuinity" name="commuinity"
                                placeholder="(ex: public,secret...etc)">
                        </div>
                        <div class="form-group">
                            <label for="oid">OID</label>
                            <input type="text" class="form-control" id="oid" name="oid"
                                placeholder="(ex: 1.3.6.1.2.1.1.4.0)">
                        </div>

                        <button type="submit" class="btn btn-primary">get</button>

                    </form>
                    @if(session('getData'))
                    <h1 class="text-center">Result:</h1>
                    <h1 class="text-success text-center">{{session('getData')}}</h1>
                    @endif
                    @error('getError')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
