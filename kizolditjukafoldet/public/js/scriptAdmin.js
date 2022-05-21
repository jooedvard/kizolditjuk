$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const ajax = new Ajax(token);
    ajax.getAjax("/bejegyzesek/filterbytanar", bejegyzesLista);

    ajax.getAjax("/osztaly/tanar",(adat)=>{
       $(".osztaly-nev").text(adat);
    });

    function bejegyzesLista(adatok){
        let szulo = $("#tablazat");
        szulo.empty();
        let tablazat = new BejegyzesAdminTablazat(szulo, adatok);
        
    }

    $(window).on("elfogadas",(event)=>{
        ajax.getAjax("/bejegyzesek/elfogadott/"+event.detail.osztaly_id+"/"+event.detail.tevekenyseg_id, (adat)=>{
            if (adat==2){
                alert("Nem lehet egy tevékenységből kettőnél többet jóváhagyni!");
            }
            else{
                let ujAdat = {
                    tevekenyseg_id:event.detail.tevekenyseg_id,
                    osztaly_id:event.detail.osztaly_id,
                    allapot:"elfogadva",
                };
                ajax.putAjax("/bejegyzes",event.detail.id,ujAdat);
                ajax.getAjax("/bejegyzesek/filterbytanar", bejegyzesLista);
                
            }
        });
        
    });

    $(window).on("elutasitas",(event)=>{
        ajax.deleteAjax("/bejegyzes",event.detail.id);
        ajax.getAjax("/bejegyzesek/filterbytanar", bejegyzesLista);
    });

    $("#logout").on("click", (event)=>{
        //event.preventDefault();
        let ujAdat ={
            _token:event.detail._token
        }
        ajax.postAjax("/logout",ujAdat);
    });

});