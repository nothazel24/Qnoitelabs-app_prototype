<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap components -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <title>Qnoite employee | Login</title>
</head>

<body style="background-color: #efefef;">

    <!-- WRAPPER FLEX CONTAINER -->
    <div class="d-flex justify-content-center align-items-center min-vh-100">

        <!-- ISI FORM & GAMBAR -->
        <div class="d-flex flex-row align-items-center justify-content-around gap-5 container">

            <!-- GAMBAR -->
            <div class="test">
                <img src="../../assets/components/img/bg.png" alt="login-image" width="400" height="500"
                    class="shadow" style="border-radius: 10px;">
            </div>

            <!-- FORM LOGIN -->
            <div class="w-50">
                <h1 style="color: #5948C6;">Selamat datang!</h1>
                <p>Silahkan masukkan data diri anda.</p>

                <div class="p-5 shadow" style="background-color: #fefefe; border-radius: 10px;">

                    <form action="{{ route('login') }}" method="POST" autocomplete="off" novalidate>
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" placeholder="your@email.com"
                                value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" placeholder="Your password"
                                value="{{ old('password') }}"
                                class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>


</body>

</html>
