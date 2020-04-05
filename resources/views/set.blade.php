@extends('layouts.app')

@section('content')
<div class="container">
    {{--  set SNMP Object --}}
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Set SNMP object</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('snmp/set') }}">
                        @csrf
                        <div class="form-group">
                            <label for="hostName">SNMP Host</label>
                            <input type="text" class="form-control" id="hostName" placeholder="(ex: localhost)">
                            <small id="hostNameHelp" name="hostNameHelp" class="form-text text-muted">the host you will send the SNMP
                                request to.</small>
                        </div>
                        <div class="form-group">
                            <label for="commuinity">Commuinity</label>
                            <input type="text" class="form-control" id="commuinity" name="commuinity"
                                placeholder="(ex: public,secret...etc)">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type">
                                <option value="i">i--->INTEGER</option>
                                <option value="u">u--->INTEGER</option>
                                <option value="s">s--->STRING</option>
                                <option value="x">x--->HEX STRING</option>
                                <option value="d">d--->DECIMAL STRING</option>
                                <option value="n">n--->NULLOBJ</option>
                                <option value="o">o--->OBJID</option>
                                <option value="t">t--->TIMETICKS</option>
                                <option value="a">a--->IPADDRESS</option>
                                <option value="b">b--->BITS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="oid">OID</label>
                            <input type="text" class="form-control" id="oid" name="oid" placeholder="(ex: 1.3.6.1.2.1.1.4.0)">
                        </div>
                        <div class="form-group">
                            <label for="oid">Value</label>
                            <input type="text" class="form-control" id="value" name="value" placeholder="(ex: Omar ^-^)">
                        </div>
                        <button type="submit" class="btn btn-primary">send</button>
                    </form>
                    @if(session('setData'))
                    <h1 class="text-success text-center">Data was set successfully</h1>
                    @endif
                    @error('setError')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
