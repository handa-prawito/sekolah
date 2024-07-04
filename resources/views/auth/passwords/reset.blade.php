<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">Buat Password Baru</div>
            <div class="card-body">
                <p>Apakah Anda yakin ingin mengatur ulang kata sandi Anda? Jika iya, mohon konfirmasinya.</p>
               
                @if($message = Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    <div class="alert-body">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
                </div>
            @elseif($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <div class="alert-body">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
            </div>
            @endif
                <form id="resetPasswordForm" method="POST" action="/reset-password">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ request('email') }}">
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="login-password">Password</label>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input class="form-control form-control-merge @error('password') is-invalid @enderror" id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" />
                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="login-password">Konfirmasi Password</label>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input class="form-control form-control-merge @error('password') is-invalid @enderror" id="login-password" type="password" name="password_confirmation" placeholder="············" aria-describedby="login-password" tabindex="2" />
                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="confirmResetButton">Confirm</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     var confirmResetButton = document.getElementById("confirmResetButton");
        //     confirmResetButton.onclick = function() {
        //         $.ajax({
        //             url: '/reset-password',
        //             method: 'POST',
        //             data: {
        //                 token: $('input[name="token"]').val(),
        //                 email: $('input[name="email"]').val(),
        //                 password: $('input[name="password"]').val(),
        //                 password_confirmation: $('input[name="password_confirmation"]').val(),
        //                 _token: $('meta[name="csrf-token"]').attr('content')
        //             },
        //             success: function(response) {
        //                 // console.log(response);
        //                 alert(response.message);
        //                 window.location.href = '/';
        //             },
        //             error: function(xhr) {
        //                 console.log(xhr)
        //                 alert('An error occurred. Please try again.');
        //             }
        //         });
        //     }
        // });
    </script>
</body>
</html>
