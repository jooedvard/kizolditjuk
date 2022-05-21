<link type="text/css" rel="stylesheet" href="{{ URL::asset('/css/login.css')}}">
<x-guest-layout >
    <x-auth-card >
        
        <x-slot name="logo">
         
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <a href="/" class="logo-link">
        
        <img src="kepek/szamalk.png"/>
       
        </a>
            <div class="szamalk"><span class="main"><span class="main-alt">Számalk</span>-Szalézi</span><span class="alt">Technikum és Szakgimnázium</span></div>
            <!-- Email Address -->
            <div>
                

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="E-mail" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
               

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" placeholder="Jelszó" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600 " style="font-size:1.05rem">{{ __('Emlékezz rám') }}</span>
                </label>
            </div>

            <div class="flex items-center mt-4 login-button-group">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 forgotpass" href="{{ route('password.request') }}">
                        {{ __('Elfelejtett jelszó?') }}
                    </a>
                @endif
 
                <x-button class="ml-3 login" >
                    {{ __('Bejelentkezés') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
