const nome = document.getElementById("NickName")
const senha = document.getElementById("senha")


const urlParams = new URLSearchParams(window.location.search);
const param1 = urlParams.get('senha_Errada'); // value1

if(param1){
    alert("SENHA ERRADA ! DIGITE NOVAMENTE")
}






