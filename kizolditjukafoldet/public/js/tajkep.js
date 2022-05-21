$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    let ajax = new Ajax(token);
   
    

    window.addEventListener('resize', ()=>{
        ablakMeretEllenorzes();
    });

    

    function ablakMeretEllenorzes(){
        let magassag = window.innerHeight;
        let hosszusag = window.innerWidth;
        if(magassag>1080 || hosszusag >1920){
            
            $(".teljes-tajkep").hide();
            $(".menu").hide();
            $(".navopen").hide();
            $(".window-hibauzenet").show();
        }
        else{
            $(".teljes-tajkep").show();
            $(".menu").show();
            $(".navopen").show();
            $(".window-hibauzenet").hide();
        }
    }
    
    ajax.getAjax("/islogged", (adat) => {
        if (JSON.parse(adat)) {
            ajax.getAjax("/osztaly/tanar", (adat) => {
                $(".logged-osztaly-nev").text("Üdvözöllek " + adat);
                $(".login-button").hide();
            });
        } else {
            $(".logged-osztaly-nev").hide();
            $(".login-button").show();
            $("#logout").hide();
        }
    });

    $(document).click(function (event) {
        $(".nav").slideUp(500, () => {
            $(".navopen").show();
            ablakMeretEllenorzes();
        });
    });

    $("main").click(function (event) {
        event.stopPropagation();
    });
    $(".navopen").click(function (event) {
        event.stopPropagation();
    });

    $(".navopen").on("click", (event) => {
        $(".nav").slideDown(500);
        $(".navopen").hide();
    });

    $(".navclose").on("click", (event) => {
        $(".nav").slideUp(500, () => {
            $(".navopen").show();
        });
    });

    $("body").children().hide();

    let megnyit = () => {
        $("body").children().css("display", "block");
        $(".nav").css("display", "none");
        $("body").css("backgroundColor", "gray");
        $(".loading").hide();
        ablakMeretEllenorzes();
    };

    let toltes = () => {
        $("body").css("backgroundColor", "white");
        $(".loading").css("display", "");
    };

    toltes();

    $(window).on("load", () => {
        megnyit();

    });
});
