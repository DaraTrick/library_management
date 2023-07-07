<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        @include('backend.shared.link-css')
        @yield('css')
    </head>

    <body data-sidebar="dark">

        

        @yield('main-contain')

        @stack('scripts')
        @include('backend.shared.link-java')
        {{-- @if($errors->any())
            @foreach($errors->all() as $error)

                <script>
                    iziToast.error({
                        title: '',
                        position: 'topCenter',
                        message: '{{ $error }}'
                    });
                </script>

            @endforeach
        @endif --}}

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
        @if(session()->get('info'))
            <script>
                iziToast.info({
                title: '',
                position: 'topRight',
                message: '{{ session()->get('info') }}',
            })
            </script>
        @endif 

        @yield('java')
      </body>
  </html>
  