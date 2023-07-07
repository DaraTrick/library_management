<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('backend.shared.link-css')
</head>
<body>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 login-wrapper-page m-auto py-5"
            style="margin:0 20%; padding:50% 0;"
        >
            <div class="card col-md-8 m-0 p-0">
                <div class="card-header bg-white text-center">
                    <h3 class="mt-1" style="font-weight: 800;">ចូលគណនី</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('login_submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">អុីម៉ែល</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="បញ្ជូលអុីម៉េល..">
                            @error('email')
                                <span style="font-size:16px;" class="text-danger">{{ $message }}</span>
                            @enderror
                            @if(session()->get('error'))
                                <span style="font-size:16px;" class="text-danger">{{ session()->get('error') }}</span>
                            @endif
                            {{-- @if(session()->get('warning'))
                                <span style="font-size:16px;" class="text-danger">{{ session()->get('warning') }}</span>
                            @endif --}}
                        </div>
                        <div class="form-group">
                            <label for="">ពាក្យសម្ងាត់</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="បញ្ចូលពាក្យសម្ងាត់..">
                            @error('password')
                                <span style="font-size:16px;" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <div class="form-group pt-3">
                                <input style="width:100%;" type="submit" class="btn btn-primary" value="ចូលគណនី">
                            </div>
                            <div class="row gx-3">
                                <div class="form-group pt-1 col-md-12 text-center">
                                    <a href="{{ route('forget_password') }}" style="font-size:15px; margin-left:15px;">ភ្លេចពាក្យសម្ងាត់?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
@if(session()->get('error'))
    <script>
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('error') }}',
        })
    </script>
@endif
@if(session()->get('success'))
    <script>
        iziToast.success({
        title: '',
        position: 'topRight',
        message: '{{ session()->get('success') }}',
    })
    </script>
@endif
@include('backend.shared.link-java')
</body>
</html>
