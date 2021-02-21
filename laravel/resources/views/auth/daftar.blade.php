<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="host_url" content="{{ url('/') }}">
  <title>PT PLN (PERSERO) UP3 BIAK</title>
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}">

  <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('landing/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
</head>
<body>

  <div class="content-auten">
    <div class="container">
      <div class="title_page_auth">PT PLN (PERSERO) UP3 BIAK</div>
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="box_auth">

            <div class="title_login grid_title_login">Daftar Agent</div>
            <div class="hr_auth"></div>

            <form method="POST" id="register_akun" action="{{ route('agent.daftar') }}">
              @csrf

              <div class="form-group">
                <label for="alamat" class="labels_login">Nama Lengkap (Sesuai KTP)</label>
                <input type="name" class="form-control grid_control_form_auth @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus placeholder="Nama Lengkap...">
                @error('name')
                <span class="invalid-feedback ml-5" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="alamat" class="labels_login">Nomor KTP</label>
                <input type="number" class="form-control grid_control_form_auth @error('no_ktp') is-invalid @enderror" name="no_ktp" value="{{ old('no_ktp') }}" required autocomplete="off" autofocus placeholder="Nomor KTP...">
                @error('no_ktp')
                <span class="invalid-feedback ml-5" role="alert">
                  <strong>Nomor KTP telah digunakan</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="alamat" class="labels_login">Nomor Telepon</label>
                <input type="number" class="form-control grid_control_form_auth @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ old('no_telepon') }}" required autocomplete="off" autofocus placeholder="Nomor Telepon...">
                @error('no_telepon')
                <span class="invalid-feedback ml-5" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="email" class="labels_login">Email</label>
                <input type="email" class="form-control grid_control_form_auth @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus placeholder="Email...">
                @error('email')
                <span class="invalid-feedback ml-5" role="alert">
                  <strong>Email telah terdaftar di sistem</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="username" class="labels_login">Username</label>
                <input type="username" class="form-control grid_control_form_auth @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off" autofocus placeholder="Username...">
                @error('username')
                <span class="invalid-feedback ml-5" role="alert">
                  @if($message == 'The username has already been taken.')
                  <strong>Username telah terdaftar di sistem</strong>
                  @else
                  <strong>Masukkan huruf, angka dan simbol "_" atau "-"</strong>
                  @endif
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password" class="labels_login">Password</label>
                <input type="password" class="form-control grid_control_form_auth @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password...">
                @error('password')
                <span class="invalid-feedback ml-5" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="grid_button_box_auth">
                <button type="submit" id="submi_regis" class="btns-box-auth text-btns-auth bg_button_blue">Daftar</button>
              </div>
            </form>
          </div>
          <div class="note_auth">
            Sudah Punya Akun? <b><a href="{{url('/login')}}">Login</a></b>
         </div>
       </div>
     </div>
   </div>
 </div>

</body>
<script src="{{ asset('landing/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('landing/js/popper.min.js') }}"></script>
<script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('landing/js/mains.js') }}"></script>
<script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script>
  $(document).ready(function($) {
    @isset ($_GET['success'])
    Swal.fire({
      title: 'Pendaftaran Selesai',
      text: 'Pendaftaran telah selesai, sihkan melakukan login!',
      type: 'success',
      onClose: () => {
        location.href = "{{ url('/login') }}";
      }
    });
    @endisset
  });
</script>
