@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}


                      <livewire:counter />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    
    var conn = new WebSocket('ws://localhost:8090');
        conn.onopen = function(e) {
            conn.send(JSON.stringify({command: "subscribe", channel: "global"}));
            conn.send(JSON.stringify({command: "groupchat", message: "hello glob", channel: "global"}));


          console.log("Connection established!");

          conn.onmessage = function(e) {
    console.log(e.data);
};
};


conn.onmessage = function(e) {
    console.log(e.data);
};




</script>