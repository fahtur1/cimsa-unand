<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Miqdad and Raihan">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CIMSA UNAND</title>
    <link rel="shortcut icon" href="{{ asset('img/logo/logo-primary.png') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/froala_style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/froala_editor.pkgd.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/froala_editor.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('/vendor/datatables-plugins/dataTables.bootstrap.css') }}">
    <!-- DataTables Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('/vendor/datatables-responsive/dataTables.responsive.css') }}">

    <!-- Sweetalert2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.css">
    @yield('css')

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/logo/logo-cimsa.png') }}">
        </a>
        <button class=" navbar-toggle navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="border: none !important; color: #d00a2c;">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link text-center" href="{{ url('/') }}">
                        <b>Home</b><span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown {{ str_contains(Request::url(), 'about') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b>About <i class="fa fa-caret-down" aria-hidden="true"></i></b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownLink">
                        <a href="{{ url('about', 'cimsa') }}" class="dropdown-item">CIMSA</a>
                        <a href="{{ url('about', 'our-team') }}" class="dropdown-item">Our Team</a>
                        <a href="{{ url('about', 'partners') }}" class="dropdown-item">Our Partners</a>
                        {{-- <div class="dropdown-divider"></div> --}}
                    </div>
                </li>
                <li class="nav-item dropdown {{ str_contains(Request::url(), 'alumni') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b>Alumni <i class="fa fa-caret-down" aria-hidden="true"></i></b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownLink">
                        <a href="{{ url('alumni','directory') }}" class="dropdown-item">Our Alumni</a>
                        <a href="{{ url('alumni','alumni-of-the-month') }}" class="dropdown-item">Alumni on Period</a>
                        <a href="{{ url('alumni','list-alumni-of-the-month') }}" class="dropdown-item">Alumni and Senior on Period</a>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('articles') ? 'active' : '' }}">
                    <a class="nav-link text-center" href="{{ url('/articles') }}"><b>Articles</b></a>
                </li>
                <li class="nav-item {{ Request::is('activities') ? 'active' : '' }}">
                    <a class="nav-link text-center" href="{{ url('/activities') }}"><b>Activities</b></a>
                </li>
                <li class="nav-item dropdown {{ str_contains(Request::url(), 'standing-committees') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b>Standing Committees <i class="fa fa-caret-down" aria-hidden="true"></i></b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownLink">
                        <a href="{{ url('standing-committees','scome') }}" class="dropdown-item">SCOME</a>
                        <a href="{{ url('standing-committees','scora') }}" class="dropdown-item">SCORA</a>
                        <a href="{{ url('standing-committees','scorp') }}" class="dropdown-item">SCORP</a>
                        <a href="{{ url('standing-committees','scoph') }}" class="dropdown-item">SCOPH</a>
                        <a href="{{ url('standing-committees','score') }}" class="dropdown-item">SCORE</a>
                        <a href="{{ url('standing-committees','scope') }}" class="dropdown-item">SCOPE</a>
                    </div>
                </li>
                {{-- <li class="nav-item {{ Request::is('standing-committees') ? 'active' : '' }}">
                <a class="nav-link text-center" href="{{ url('/standing-committees') }}"><b>Standing Committees</b></a>
                </li> --}}
                <li class="nav-item {{ Request::is('catalogs') ? 'active' : '' }}">
                    <a class="nav-link text-center" href="{{ url('catalogs') }}"><b>Merchandise</b></a>
                </li>
                @if(!Auth::check())
                <li class="nav-item ">
                    <a class="nav-link text-center" href="#" data-toggle="modal" data-target=".login-modal-lg"><b>Login</b></a>
                </li>
                @else
                <li class="nav-item dropdown {{ Request::is('about') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b>Admin <i class="fa fa-caret-down" aria-hidden="true"></i></b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownLink">
                        <a href="{{ url('/admin') }}" class="dropdown-item">Admin Page</a>
                        {!! Form::open(['url'=>'logout','method'=>'post','id'=>'form-logout']) !!}

                        {!! Form::close() !!}
                        <a href='' id="logout" class="dropdown-item">Logout</a>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="py-5 bg-dark footer-sc">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p class="m-0 text-white">Local Secretariat: </p>
                    <p class="m-0 text-white">Faculty of Medicine, Andalas University</p>
                    <p class="m-0 text-white">Jl. Perintis Kemerdekaan</p>
                    <p class="m-0 text-white">Padang, 25127</p>
                    <p class="m-0 text-white">Copyright &copy; CIMSA UNAND 2017</p>
                </div>
                <div class="col-md-4">
                    <p class="m-0 text-white">Official Partners :</p>
                    <div class="row text-center">
                        <div class="col-md-3">
                            <img src="{{ asset('img/official-partners/singgalang.png') }}" alt="BCC LOGO" class="img-fluid">
                        </div>
                        <div class="col-md-3">
                            <a href="{{ url('https://instagram.com/jooksjuicebar/') }}" target="_blank">
                                <img src=" {{ asset('img/official-partners/nirwana.png') }}" alt="JOOKS LOGO" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ url('http://malala-tours.com/') }}" target="_blank">
                                <img src=" {{ asset('img/official-partners/bcc.png') }}" alt="MALALA LOGO" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ url('https://instagram.com/_thekafe/') }}" target="_blank">
                                <img src=" {{ asset('img/official-partners/starradio.jpg') }}" alt="THE KAFE LOGO" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ url('http://starradiopadang.com/') }}" target="_blank">
                                <img src="{{ asset('img/official-partners/clayton.png') }}" alt="STAR RADIO" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ url('http://starradiopadang.com/') }}" target="_blank">
                                <img src="{{ asset('img/official-partners/hoya.png') }}" alt="STAR RADIO" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="">
                        <div class="row">
                            <div class="col-md-2">
                                <span class="fa-stack fa-lg">
                                    <a href="https://www.facebook.com/cimsafkunand" target="_blank">
                                        <i class="fa fa-circle fa-stack-2x logo-fb"></i>
                                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="col-md-2">
                                <span class="fa-stack fa-lg">
                                    <a href="https://twitter.com/cimsaunand" target="_blank">
                                        <i class="fa fa-circle fa-stack-2x logo-twitter"></i>
                                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="col-md-2">
                                <span class="fa-stack fa-lg">
                                    <a href="https://www.instagram.com/cimsaunand/" target="_blank">
                                        <i class="fa fa-circle fa-stack-2x logo-instagram"></i>
                                        <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="col-md-2">
                                <span class="fa-stack fa-lg">
                                    <a href="https://www.youtube.com/channel/UCnSEulZ2b1Rtlb8USFDjGrA" target="_blank">
                                        <i class="fa fa-circle fa-stack-2x logo-youtube"></i>
                                        <i class="fa fa-youtube-play fa-stack-1x fa-inverse"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="col-md-2">
                                <span class="fa-stack fa-lg">
                                    <a href="https://open.spotify.com/show/6MT0oIX0eZPQPRJ8Ut9ajY" target="_blank">
                                        <i class="fa fa-circle fa-stack-2x logo-spotify"></i>
                                        <i class="fa fa-spotify fa-stack-1x fa-inverse"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="col-md-2">
                                {{-- <span class="fa-stack fa-lg img-animated-footer"> --}}
                                <span class="fa-stack fa-lg">
                                    <a href="https://issuu.com/cimsaunand" target="_blank">
                                        <img class="img-fluid" src="{{ asset('img/logo/isu.png') }}" alt="">
                                    </a>
                                </span>
                            </div>
                            <div class="col-md-2">
                                <span class="fa-stack fa-lg">
                                    <a href="https://lin.ee/ac3QFtC" target="_blank">
                                        <img class="img-fluid" src="{{ asset('img/logo/line.png') }}" alt="">
                                    </a>
                                </span>
                            </div>
                        </div>

                    </h5>
                </div>
            </div>
        </div>
    </footer>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v8.0&appId=256665252355241&autoLogAppEvents=1" nonce="dPcBRg9s"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/counter.js') }}"></script>
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/froala_editor.pkgd.min.js')}}"></script>
    <script src="https://platform.twitter.com/widgets.js"></script>
    <script src="http://lightwidget.com/widgets/lightwidget.js"></script>

    <!-- DataTables JavaScript -->
    <script type="text/javascript" src="{{asset('/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>

    <!-- SweetAlert 2 JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.js"></script>
    <script>
        $('#logout').click(function() {
            event.preventDefault();
            $('#form-logout').submit()
        })
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
            $(".upload-image").fileinput({
                showUpload: false
                , showRemove: false
                , required: true
                , validateInitialCount: true
                , overwriteInitial: false
                , allowedFileExtensions: ["jpg", "png", "gif"]
            });
            $(".edit-upload-image").fileinput({
                showUpload: false
                , showRemove: false
                , required: false
                , validateInitialCount: true
                , overwriteInitial: false
                , allowedFileExtensions: ["jpg", "png", "gif"]
            });
            $(".edit-upload-image").change(function() {
                $('.preview-image').html('')
            })
            $('#input').on('fileerror', function(event, data, msg) {
                alert(msg);
            });
        });

        function submitdelete(id) {
            swal({
                title: 'Are you sure?'
                , text: "You won't be able to revert this!"
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Yes, delete it!'
            }).then(function() {
                $(`#deleteform${id}`).submit();
            })
        }

    </script>
    @yield('script')
    <script>
        $('.pagination').addClass('mx-auto')
        $('.pagination').children().addClass('page-item')
        $('.pagination').children().children('a').addClass('page-link')
        $('.pagination').children().children('span').addClass('page-link')

    </script>
    @if(session('completemessage'))
    <script>
        console.log("{{ session('completemessage') }}")
        swal(
            'Konfirmasi Pesan'
            , "{{ session('completemessage') }}"
            , 'success'
        )

    </script>
    @endif
</body>

</html>
