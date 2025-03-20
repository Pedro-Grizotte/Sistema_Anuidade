// Arquivo de JavaScript
const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');

const btnLogin = document.querySelector('.btn_login')
const btnRegister = document.querySelector('.btn_register')

registerLink.addEventListener('click', ()=> {
    wrapper.classList.add('active');
});

loginLink.addEventListener('click', ()=> {
    wrapper.classList.remove('active');
});

btnPopup.addEventListener('click', ()=> {
    wrapper.classList.add('active-popup');
});

iconClose.addEventListener('click', ()=> {
    wrapper.classList.remove('active-popup');
});

function openEditPopup() {
    document.getElementById('editPopup').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function openDeletePopup() {
    document.getElementById('deletePopup').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function closeEditPopup() {
    document.getElementById('editPopup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

function closeDeletePopup() {
    document.getElementById('deletePopup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

function gerarBoleto() {
    $(document).ready(function() {
        var boletos = [];
        $('.get-value').each(function() {
            if($(this).is(":checked")) {
                boletos.push($(this).val());
            }
        });
        boletos = boletos.toString();
        $.ajax({
            URL: "../controllers/usersController.php",
            method: "POST",
            data: {boletos: boletos},
            success: function(data) {
                $('#result').html(data);
            }
        });
    });
}