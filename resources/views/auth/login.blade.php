

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <title>Login</title>

</head>
<body>
    <section class="flex bg-gray-50 items-center justify-center h-screen">
        <div class="bg-[#850E35] flex rounded-2xl shadow-lg max-w-3xl p-5">

            <!-- form -->
            <div class="md:w-1/2 px-16 sm:w-full">
                <h2 class="font-bold text-2xl text-gray-300 lg:mt-15 sm:mt-5">Login</h2>
                <p class="text-sm text-gray-300">Jika sudah memiliki akun silakan login</p>

                <form method="POST" action="{{route('login')}}" class="flex flex-col gap-4">
                    @csrf
                    <input type="email" id="email" name="email" value="{{ old('email') }}"class=" @error('email') is-invalid @enderror mt-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-800 focus:border-red-800 block w-full p-2.5" placeholder="name@gmail.com" required>
                    @error('email')
                        <span class="invalid-feedback text-red-300 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                    <div class="relative">
                        <input name="password" class="@error('password') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-800 focus:border-red-800 block w-full p-2.5" type="password" name="password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback text-sm text-red-300" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg>
                    </div>
                    <button class="bg-[#3D0000] rounded-xl text-white py-2 hover:scale-105 duration-300">Login</button>
                </form>
                <br>
                @if (Route::has('password.request'))
                    <a class=" mt-5 text-xs text-white border-b border-gray-400 py-4" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                {{-- <a href="#" class="">Forgot your Password?</a> --}}

                <div class="mt-3 text-xs text-white flex justify-between items-center">
                    <p>Don't have an account..?</p>
                    <a href="{{route('register')}}" class="py-2 px-5 bg-white text-[#850E35] border rounded-xl hover:scale-105 duration-300">
                        Register
                    </a>
                </div>

            </div>
            
            <!-- image -->
            <div class="md:block hidden w-1/2 pt-8p-2">
                <img class="sm:block hidden rounded-2xl" src="{{url('Mobile-login.jpg')}}" alt="">
            </div>

        </div>
    </section>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>
