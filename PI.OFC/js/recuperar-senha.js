
        document.getElementById('recoveryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (!emailRegex.test(email)) {
                alert('Por favor, insira um endereço de e-mail válido.');
                return;
            }
            
            document.getElementById('recoveryForm').classList.add('hidden');
            document.getElementById('successMessage').classList.remove('hidden');
            
            setTimeout(() => {
                document.getElementById('recoveryForm').classList.remove('hidden');
                document.getElementById('successMessage').classList.add('hidden');
            }, 5000);
        });
        
        document.getElementById('resendBtn').addEventListener('click', function() {
            alert('Enviamos novamente as instruções para o seu e-mail.');
        });
    