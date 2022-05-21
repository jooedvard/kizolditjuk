<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/newpassword.css">
    <meta name="csrf-token" content=<?php $token=csrf_token(); echo $token;?>>
    <title>Jelszó visszaállítás</title>
</head>
<body>
    <main>
        <div class="logo-flex">
        <a href="/" class="logo-link">
        
        <img src="kepek/szamalk.png"/>
       
        </a>
        <div class="logo-container">
        <div class="szamalk"><span class="main"><span class="main-alt">Számalk</span>-Szalézi</span><span class="alt">Technikum és Szakgimnázium</span></div>
            <h2>Kizöldítjük a Földet!</h2>
        </div>  
        </div> 
        <form id="form" method="POST" action=<?php $route=route('reset.password'); echo $route?>>
           <h3>Jelszó Módosítás</h3>
        <fieldset>
                
                <input type="hidden" name="_token" value=<?php $token=csrf_token(); echo $token;?>>
                
                <input type="password" id="newpwd" name="newpwd" placeholder="Új jelszó"><br>
                <p id="newpwderror">
                    <?php if(session('errors')!==null) { $error=session('errors')->first('newpwd'); if ($error!==''){echo $error; echo "<br>";}} ?>
                </p>
                              
                <input type="password" id="confirmpwd" name="confirmpwd" placeholder="Jelszó megerősítése"><br>
                <p id="confirmpwderror">
                    <?php if(session('errors')!==null) { $error=session('errors')->first('confirmpwd'); if ($error!==''){echo $error; echo "<br>";}} ?>
                </p>
                <button id="submit">Módosít</button>         
            </fieldset> 
        </form>
    </main>
</body>
</html>