<!DOCTYPE html>
<html>
<head>
    <title>Contato</title>
    <style>
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            display: none;
        }
        .success { background-color: #d4edda; color: #155724; }
        .error { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <h1>Contato</h1>
    
    <div id="message" class="message"></div>

    <form id="contactForm" onsubmit="return submitForm(event)">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" rows="5" required></textarea>
        </div>
        
        <button type="submit">Enviar</button>
    </form>

    <script>
        function submitForm(event) {
            event.preventDefault();
            
            const form = document.getElementById('contactForm');
            const messageDiv = document.getElementById('message');
            
            const formData = new FormData(form);
            
            fetch('controllers/ContactController.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                messageDiv.style.display = 'block';
                if (data.success) {
                    messageDiv.className = 'message success';
                    messageDiv.textContent = data.message;
                    form.reset();
                } else {
                    messageDiv.className = 'message error';
                    messageDiv.textContent = data.message;
                }
            })
            .catch(error => {
                messageDiv.style.display = 'block';
                messageDiv.className = 'message error';
                messageDiv.textContent = 'Erro ao enviar mensagem. Tente novamente.';
            });
            
            return false;
        }
    </script>
</body>
</html>