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

function calcularTotal() {
    let Total = 0;
    const checkboxes = document.querySelectorAll('.get-value');
    const selectedIds = [];

    checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            Total += parseFloat(checkbox.getAttribute('data-valor'));
            selectedIds.push(checkbox.getAttribute('data-id'));
        }
    });
    document.querySelector('.checkout-box p').innerText = 'Valor total: R$ ' + Total.toFixed(2);
    document.getElementById('selected_ids').value = selectedIds.join(',');
}