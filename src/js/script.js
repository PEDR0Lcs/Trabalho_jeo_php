const buttonADD = document.getElementById("adici")
const modal = document.querySelector("dialog")
const buttaoFechar = document.getElementById("enviado")

buttonADD.onclick = function (){
    limpar()
    modal.showModal()
}

buttaoFechar.onclick = function(){
    modal.close()
}

function limpar(){
    var nome = document.getElementById('gameForm')
    nome.reset()
}