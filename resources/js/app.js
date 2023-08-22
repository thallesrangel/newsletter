import './bootstrap';
import feather from 'feather-icons';
feather.replace();
import 'flowbite';

document.addEventListener("DOMContentLoaded", function() {
    var copyButton = document.getElementById("copyButton");
    var emailList = document.getElementById("emailList");

    copyButton.addEventListener("click", function() {
        emailList.select();
        document.execCommand("copy");
        // alert("Emails copiados");
       
        copyButton.textContent = "Copiado com sucesso!";

        setTimeout(function() {
            copyButton.textContent = "Copiar e-mails";
        }, 2000);
    });
});