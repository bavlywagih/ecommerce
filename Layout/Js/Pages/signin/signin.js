document.addEventListener('DOMContentLoaded', function() {
    let usernameInput = document.getElementById('Password');
    let elementToHide = document.getElementById('password-strength-bar');
    let strengthText = document.getElementById('password-strength');

    usernameInput.addEventListener('focus', function() {
        elementToHide.style.display = 'block';
    });

    usernameInput.addEventListener('blur', function() {
        elementToHide.style.display = 'none';
    });

    usernameInput.addEventListener('input', function() {
        let password = this.value;
        let strength = checkPasswordStrength(password);

        if (strength === 'Weak') {
            strengthText.textContent = 'Weak';
            strengthText.className = 'weak';
        } else if (strength === 'Medium') {
            strengthText.textContent = 'Medium';
            strengthText.className = 'medium';
        } else if (strength === 'Strong') {
            strengthText.textContent = 'Strong';
            strengthText.className = 'strong';
        } else {
            strengthText.textContent = '';
        }
    });
});

function checkPasswordStrength(password) {
    let strength = 0;

    if (password.length >= 8) strength++;
    if (password.match(/[a-z]/)) strength++;
    if (password.match(/[A-Z]/)) strength++;
    if (password.match(/[0-9]/)) strength++;
    if (password.match(/[^a-zA-Z0-9]/)) strength++;
    
    if (strength <= 2) return 'Weak';
    if (strength === 3 || strength === 4) return 'Medium';
    if (strength === 5) return 'Strong';
    
    return '';
}
