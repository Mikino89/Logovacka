// jQuery část
/////$.get('test.php', {jmeno: "Pepa", prijmeni: "Novak"});
// odešle pomocí metody get PHP skriptu test.php dvě
// proměnné, jmeno a prijmeni
 
// PHP část      
///////$jmeno = $_GET['jmeno'];
///////$prijmeni = $_GET['prijmeni'];
// Přijmutí proměnných v PHP pomocí metody GET



function rezervuj(datum, cas){
    bootbox.dialog({
    title: "Formulár...",
    message:         '<div id="form">' +
            '<table>' +
                '<tr class="hidden">' +
                    '<td>Dátum:</td>' +
                    '<td><input type="text" name="datum" id="datum" /></td>' +
                '</tr>' +
                '<tr class="hidden">' +
                    '<td>Čas:</td>' +
                    '<td><input type="text" name="cas" id="cas" /></td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Vaše meno:</td>' +
                    '<td><input type="text" name="meno" id="meno" maxlength="50" /></td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Vaše tel. č.:</td>' +
                    '<td><input type="text" name="telefon" id="telefon" maxlength="25" oninput="kontrolaTelefon()" /></td>' +
                    '<td class="vypisKontrolaTelefon"></td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Váš email:</td>' +
                    '<td><input type="text" name="email" id="email" maxlength="50" oninput="kontrolaEmail()" /></td>' +
                    '<td class="vypisKontrolaEmail"></td>' +
                '</tr>' +
            '</table>' +
                '<input type="submit" value="Odošli" name="odosli"  id="fsubmit" onclick="odosliFormular()" />' +
        '</div>',
}); 
    $("#datum").val(datum);
    $("#cas").val(cas);
    $("#form").css("display", "table");
}

function kontrolaEmail(){

    var mail = $('#email').val();


    if(!(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-z]{2,4}$/.test(mail))){
        $('.vypisKontrolaEmail').text('Zadajte emailovú adresu v správnom tvare!');
         $("#fsubmit").prop("disabled",true);       
    }
    else{
        $('.vypisKontrolaEmail').text('');
        $("#fsubmit").prop("disabled",false);
    }
}

function kontrolaTelefon(){
       var tel = $('#telefon').val();


    if(!(/\d/.test(tel))){
        $('.vypisKontrolaTelefon').text('Musí obsahovať iba čísla!');
         $("#fsubmit").prop("disabled",true);       
    }
    else{
        $('.vypisKontrolaTelefon').text('');
        $("#fsubmit").prop("disabled",false);
    }
}


function odosliFormular(){
    var datum = $("#datum").val();
    var cas = $("#cas").val();
    var meno = $("#meno").val();
    var telefon = $("#telefon").val();
    var email = $("#email").val();

    if (datum == "" || cas == "" || meno == "" || telefon == "" || email == "") {
        alert("Vyplňte všetky polia!");
        return;
    }

    $.post("data/vloz.php", {
        datum: datum,
        cas: cas,
        meno: meno,
        telefon: telefon,
        email: email
    }, function(data) {
        if (data != "ok") {
            alert("Nepodarilo sa uložiť údaje");
            return;
        }

        // ulozene ok
        alert('Rezervácia prebehla úspešne.')
        window.location.reload();
        
    });
}
