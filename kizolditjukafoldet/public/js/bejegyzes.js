class BejegyzesTablazat{
    constructor(szulo, adat) {
        this.szulo = szulo;
        this.tablazat(szulo);
        this.adat = adat;
        this.tabla = this.szulo.children("table:last");   
        this.tablazatEpites(adat,this.tabla);
        
    }
    tablazat(szulo){
        szulo.append(
            `<table id="nagy">
                <tr id="head">
                    <th>Osztály</th>
                    <th>Tevékenység</th>
                    <th>Pont</th>
                    <th>Státusz</th>
                </tr>
            </table>`
        );
    }

    tablazatEpites(adat,tabla){
        for (const index in adat) {
            tabla.append("<tr></tr>");
            this.tablaElem = tabla.children("tbody").children("tr:last");
            this.tablaElem.append(
              "<td>" + this.adat[index].nev + "</td>"
            );
            this.tablaElem.append("<td>" + this.adat[index].tevekenyseg_nev + "</td>");
            this.tablaElem.append("<td>" + this.adat[index].pontszam + "</td>");
            if(this.adat[index].allapot==="elfogadva"){
                this.tablaElem.append("<td class="+"allapot-kesz"+">" + this.adat[index].allapot + "</td>");
            }
            else{
                this.tablaElem.append("<td class="+"allapot-folyamatban"+">" + this.adat[index].allapot + "</td>");
            }
            
        }
        for (let index = 0; index < $(".allapot-elem").length; index++) {
            console.log($(".allapot-elem").eq(index));
            
        }
    }
}

class BejegyzesKisTablazat extends BejegyzesTablazat{
    constructor(szulo, adat){
        super(szulo, adat);
        console.log(this)
    }

    tablazat(szulo){
        szulo.append(
            `<table id="kicsi">
                <tbody>
                </tbody>
            </table>`
        );
    }
    tablazatEpites(adat, tabla){
        for (const index in adat) {
            tabla.append("<tr></tr>");
            this.tablaElem = tabla.children("tbody").children("tr:last");
            this.tablaElem.append(
              "<td>" + this.adat[index].nev + "\nPontérték: " + this.adat[index].pontszam + "</td>"
            );
            this.tablaElem.append("<td>" + this.adat[index].tevekenyseg_nev + "\nStátusz: " + this.adat[index].allapot + "</td>");
        }
    }
}

class BejegyzesAdminTablazat extends BejegyzesTablazat{
    constructor(szulo, adatok){
        super(szulo, adatok);
    }

    tablazat(szulo){
        szulo.append(
            `<table>
                <tr>
                    <th>Osztály</th>
                    <th>Diák</th>
                    <th>Tevékenység</th>
                    <th>Pont</th>
                    <th>Elfogadott(db)</th>
                    <th>Státusz</th>
                    <th>Jóváhagyás</th>
                    <th>Törlés</th>
                </tr>
            </table>`
        );
    }

    tablazatEpites(adat,tabla){
        for (const index in adat) {
            tabla.append("<tr></tr>");
            this.tablaElem = tabla.children("tbody").children("tr:last");
            this.tablaElem.append(
              "<td class="+"osztaly"+">" + this.adat[index].osztaly.nev + "</td>"
            );
            this.tablaElem.append("<td>" + this.adat[index].diak + "</td>");
            this.tablaElem.append("<td>" + this.adat[index].tevekenyseg.tevekenyseg_nev + "</td>");
            this.tablaElem.append("<td>" + this.adat[index].tevekenyseg.pontszam + "</td>");
            this.tablaElem.append("<td>"+this.adat[index].tevekenyseg_count.db+"</td>");
            this.tablaElem.append("<td>" + this.adat[index].allapot + "</td>");
            this.tablaElem.append("<td class="+"buttons"+">" + "<button>Elfogadás</button>" +"</td>");
            this.Modosit = this.tablaElem.children("td:last").children("button");
            this.Modosit.on("click",()=>{this.kattintasTrigger("elfogadas",adat[index]);});
            this.tablaElem.append("<td class="+"buttons"+">" + "<button class="+"elutasit"+">Elutasítás</button>" +"</td>");
            this.Torles = this.tablaElem.children("td:last").children("button");
            this.Torles.on("click",()=>{this.kattintasTrigger("elutasitas",adat[index]);});

            // this.Modosit = this.tablaElem.children("td:last").children("button");
            // this.Modosit.on("click",()=>{this.kattintasTrigger("elfogadas",adat[index]);});
        }
    }

    kattintasTrigger(gomb, adat){
        let esemeny = new CustomEvent(gomb, {detail:adat});
        window.dispatchEvent(esemeny);
    }
}