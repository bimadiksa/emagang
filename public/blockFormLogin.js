let loginAttempts = 0;
const loginBtn = document.getElementById('login-btn');
const formInputs = document.querySelectorAll('#login-form input:not([type="submit"])');
const errorMessage = document.getElementById('error-message');

function disableForm() {
  formInputs.forEach(input => input.disabled = true);
  loginBtn.disabled = true;
  setTimeout(() => {
    formInputs.forEach(input => input.disabled = false);
    loginBtn.disabled = false;
  }, 60000); // 1 menit
}

document.getElementById('login-form').addEventListener('submit', function(event) {
  event.preventDefault();
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;

  // Lakukan validasi login di sini
  if (username === '' || password === '') {
    errorMessage.textContent = 'Username dan password harus diisi';
  } else if (username !== 'admin' || password !== 'password') {
    errorMessage.textContent = 'Username atau password salah';
  } else {
    loginAttempts++;
    errorMessage.textContent = '';
    alert('Login berhasil');
  }

  if (loginAttempts >= 3) {
    errorMessage.textContent = 'login kembali setelah beberapa menit';
    disableForm();
  }
});
