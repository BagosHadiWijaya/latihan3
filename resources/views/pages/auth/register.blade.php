@extends('layouts.guest')
@section('content')
  <div class="col-lg-6 col-md-7 col-sm-8">
    <div class="card shadow-lg">
      <div class="card-body p-4">
        <h1 class="fs-4 text-center fw-bold mb-4">Register</h1>
        <h1 class="fs-6 mb-3">Register to get more benefits!!</h1>
        <form method="POST" action="{{ route('register') }}" class="needs-validation">
          @csrf
          <div class="mb-3">
            <label class="mb-2 text-muted" for="name">Full Name</label>
            <div class="input-group input-group-join mb-3">
              <input type="text" placeholder="Enter Your Name" id="name" class="form-control" name="name"
                required autofocus autocomplete="name">
              <span class="input-group-text rounded-end">&nbsp<i class="fa fa-user"></i>&nbsp</span>
            </div>
          </div>
          <div class="mb-3">
            <label class="mb-2 text-muted" for="email">E-Mail Address</label>
            <div class="input-group input-group-join mb-3">
              <input id="email" type="email" placeholder="Enter Email" class="form-control" name="email" required
                autofocus autocomplete="username">
              <span class="input-group-text rounded-end">&nbsp<i class="fa fa-envelope"></i>&nbsp</span>
            </div>
          </div>

          <div class="mb-3">
            <div class="mb-2 w-100">
              <label class="text-muted" for="password">Password</label>
            </div>
            <div class="input-group input-group-join mb-3">
              <input type="password" class="form-control" id="password" placeholder="Your password" name="password"
                required>
              <span class="input-group-text rounded-end password cursor-pointer">
                &nbsp<i id="eye-1" class="fa fa-eye"></i>&nbsp
              </span>
            </div>
          </div>
          <div class="mb-3">
            <div class="mb-2 w-100">
              <label class="text-muted" for="password">Confirm Password</label>
            </div>
            <div class="input-group input-group-join mb-3">
              <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Your Password"
                name="password_confirmation" required>
              <span class="input-group-text rounded-end password cursor-pointer">
                &nbsp
                <i id="eye-2" class="fa fa-eye"></i>&nbsp
              </span>
            </div>
          </div>

          <div class="mb-3">
            <label class="mb-2 text-muted" for="role">Role</label>
            <div class="input-group input-group-join mb-3">
              <select name="role" id="role" class="form-select" required>
                <option value="">Select Role</option>
                <option value="admin">Admin Sekolah</option>
                <option value="guru">Guru</option>
                <option value="siswa">Siswa</option>
              </select>
              <span class="input-group-text rounded-end">&nbsp<i class="fa fa-user"></i>&nbsp</span>
            </div>
          </div>

          <div id="sekolah_input" class="mb-3">
            <label class="mb-2 text-muted" for="sekolah_id">Asal Sekolah</label>
            <div class="input-group input-group-join mb-3">
              <select name="sekolah_id" id="sekolah_id" class="form-select">
                <option value="">Pilih Asal Sekolah</option>
                @foreach ($dataSekolah as $sekolah)
                  <option value="{{ $sekolah->id }}">{{ $sekolah->nama }}</option>
                @endforeach
              </select>
              <span class="input-group-text rounded-end">&nbsp<i class="fa fa-school"></i>&nbsp</span>
            </div>
          </div>

          <div id="kelas_input" class="mb-3 d-none">
            <label class="mb-2 text-muted" for="kelas_id">Kelas</label>
            <div class="input-group input-group-join mb-3">
              <select name="kelas_id" id="kelas_id" class="form-select">
                <option value="">Pilih Kelas</option>
              </select>
              <span class="input-group-text rounded-end">&nbsp<i class="fa fa-school"></i>&nbsp</span>
            </div>
          </div>

          <div id="admin_form" class="d-flex flex-column gap-3 mb-3 d-none">
            <div>
              <label class="mb-2 text-muted" for="sekolah">Asal Sekolah</label>
              <div class="input-group input-group-join">
                <input type="text" placeholder="Masukkan Nama Sekolah" id="sekolah" class="form-control"
                  name="sekolah" autofocus>
                <span class="input-group-text rounded-end">&nbsp<i class="fa fa-school"></i>&nbsp</span>
              </div>
            </div>
          </div>

          <div class="d-flex align-items-center">
            <button type="submit" class="btn btn-primary ms-auto">
              Register
            </button>
          </div>
        </form>
      </div>
      <div class="card-footer py-3 border-0">
        <div class="text-center">
          Already have an account? <a href="{{ route('login') }}" class="text-dark">Login Now</a>
        </div>
      </div>
    </div>
    <div class="text-center mt-5 text-muted">
      Copyright &copy; 2022 &mdash; Mulai Dari Null
    </div>
  </div>
  <script>
    $(document).ready(function() {
      const password = $('#password');
      const passwordConfirmation = $('#password_confirmation');
      $('#eye-1').click(function() {
        if (password.attr('type') === 'password') {
          password.attr('type', 'text');
          $('#eye-1').removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
          password.attr('type', 'password');
          $('#eye-1').removeClass('fa-eye-slash').addClass('fa-eye');
        }
      });
      $('#eye-2').click(function() {
        if (passwordConfirmation.attr('type') === 'password') {
          passwordConfirmation.attr('type', 'text');
          $('#eye-2').removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
          passwordConfirmation.attr('type', 'password');
          $('#eye-2').removeClass('fa-eye-slash').addClass('fa-eye');
        }
      });
    });
  </script>
@endsection
