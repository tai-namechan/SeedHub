@extends('layouts.app')

@section('content')
<body class="home-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class=" home-card-header">
                        <p class="home-font">Dashboard</p>
                    </div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <p class="home-font">ログイン中</p>
                    </div>
                </div>
                <!-- <img src="../img/rekishinokabe2.PNG" alt=""> -->
            </div>
            <div class="home-card">
                <img src="../img/rekishinokabe2.PNG" alt="">
            </div>
        </div>
    </div>
</body>
@endsection
