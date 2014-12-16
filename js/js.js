function rezervuj(datum, cas)
{
    
     
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
                    '<td><input type="text" name="meno" id="meno" /></td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Vaše tel. č.:</td>' +
                    '<td><input type="text" name="telefon" id="telefon" /></td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Váš email:</td>' +
                    '<td><input type="email" name="email" id="email" /></td>' +
                '</tr>' +
            '</table>' +
                '<input type="submit" value="Odošli" name="odosli" onclick="odosliFormular()" />' +
        '</div>',
}); 
    $("#datum").val(datum);
    $("#cas").val(cas);
    $("#form").css("display", "table");
    


}


function odosliFormular()
{
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
        window.location.reload();
    });
}



