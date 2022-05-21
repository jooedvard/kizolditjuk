<link type="text/css" rel="stylesheet" href="{{ URL::asset('/css/elfelejtett-jelszo.css')}}">
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        <a href="/" class="logo-link">
        
        <img src="kepek/szamalk.png"/>
       
        </a>
        <div class="logo-container">
        <div class="szamalk"><span class="main"><span class="main-alt">Számalk</span>-Szalézi</span><span class="alt">Technikum és Szakgimnázium</span></div>
            <h2>Kizöldítjük a Földet!</h2>
        </div>    
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">

        <p class="kerdes">Elfelejtette a jelszavát?</p>
        <p><span class="keres">Kérjük keresse Cséfalvay Katalint!<br>Elérhetőség:</span><span class="email-csefy">csefalvay@szamalk-szalezi.hu</span> </p>
        </div>
            <div>
               
            </div>

            <div class="flex items-center justify-center mt-4">
                <a href="/">
                <x-button>
                    {{ __('Rendben') }}
                </x-button>
                </a>
            </div>
    </x-auth-card>
</x-guest-layout>
