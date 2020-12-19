@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div style="text-align: center;">
                    <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()"
                            class="btn btn-danger btn-xs btn-flat">Allow for Notification
                    </button>
                </div>
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('send.notification') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label>Body</label>
                                <textarea class="form-control" name="body"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Notification</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
    <script>

        var firebaseConfig = {
            // apiKey: "AIzaSyC2Z0pj967o45tGMDGJ_A_b-THFfi075_U",
            // authDomain: "alaan-286520.firebaseapp.com",
            // databaseURL: "https://alaan-286520.firebaseio.com",
            // projectId: "alaan-286520",
            // storageBucket: "alaan-286520.appspot.com",
            // messagingSenderId: "435624249943",
            // appId: "1:435624249943:web:472b64af939132c052b112",
            // measurementId: "G-08VV08QPSG"
        };

        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function initFirebaseMessagingRegistration() {
            messaging
                .requestPermission()
                .then(function () {
                    return messaging.getToken()
                })
                .then(function (token) {
                    console.log(token);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '{{ route("save-token") }}'+'?_token=' + '{{ csrf_token() }}',
                        type: 'POST',
                        data: {
                            token: token
                        },
                        dataType: 'JSON',
                        success: function (response) {
                            alert('Token saved successfully.');
                        },
                        error: function (err) {
                            console.log('User Chat Token Error' + err);
                        },
                    });

                }).catch(function (err) {
                console.log('User Chat Token Error' + err);
            });
        }

        messaging.onMessage(function (payload) {
            const noteTitle = payload.notification.title;
            const noteOptions = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(noteTitle, noteOptions);
        });

    </script>
@endsection

{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row">--}}

{{--<p>jjj</p>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
