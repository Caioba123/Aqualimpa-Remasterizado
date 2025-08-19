 const chatbotMessages = document.getElementById('chatbotMessages');
    const userInput = document.getElementById('userInput');
    const chatbotWindow = document.getElementById('chatbotWindow');
    const chatbotButton = document.getElementById('chatbotButton');
    const closeChatbot = document.getElementById('closeChatbot');
    const quickOptions = document.getElementById('quickOptions');
    
    // Greeting message on first load
    window.onload = function() {
      addBotMessage('Olá! eu sou o Zé Gotinha, o assistente virtual do Aqua Limpa. Como posso te ajudar hoje?');
      addBotMessage('Você pode perguntar sobre nossos produtos, login, notícias ou outras dúvidas.');
    };
    
    function toggleChatbot() {
      if (chatbotWindow.style.display === 'flex') {
        chatbotWindow.style.display = 'none';
        chatbotButton.style.animation = 'bounce 2s infinite running';
      } else {
        chatbotWindow.style.display = 'flex';
        chatbotButton.style.animation = 'none';
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
      }
    }
    
    closeChatbot.addEventListener('click', toggleChatbot);
    
    function addMessage(text, isUser) {
      const messageDiv = document.createElement('div');
      messageDiv.className = `message ${isUser ? 'user-message' : 'bot-message'}`;
      messageDiv.textContent = text;
      chatbotMessages.appendChild(messageDiv);
      chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }
    
    function addBotMessage(text) {
      addMessage(text, false);
    }
    
    function addUserMessage(text) {
      addMessage(text, true);
    }
    
    function handleKeyPress(e) {
      if (e.key === 'Enter') {
        sendMessage();
      }
    }
    
    function sendMessage() {
      const text = userInput.value.trim();
      if (text !== '') {
        addUserMessage(text);
        userInput.value = '';
        setTimeout(() => getBotResponse(text), 1000);
      }
    }
    
    function sendQuickMessage(element) {
      const text = element.textContent;
      addUserMessage(text);
      setTimeout(() => getBotResponse(text), 1000);
    }
    
    function getBotResponse(userMessage) {
      const message = userMessage.toLowerCase();
      let response = '';
      
      if (message.includes('produt') || message.includes('catalogo') || message.includes('oferta')) {
        response = 'Nossa linha de produtos inclui:\n\n- Eletrônicos\n- Vestuário\n- Acessórios\n- Casa e Cozinha\n\nConfira nosso catálogo completo em www.exemplo.com/produtos';
      } 
      else if (message.includes('login') || message.includes('conta') || message.includes('acessar')) {
        response = 'Você pode fazer login em www.exemplo.com/login\n\nPrecisa de ajuda para recuperar sua senha? Visite www.exemplo.com/recuperar-senha';
      }
      else if (message.includes('notícia') || message.includes('novidade') || message.includes('lançamento')) {
        response = 'As últimas notícias sobre nossa empresa:\n\n1. Novos produtos lançados esta semana\n2. Promoção de aniversário\n3. Atualizações de políticas\n\nVeja mais em www.exemplo.com/noticias';
      }
      else if (message.includes('suporte') || message.includes('ajuda') || message.includes('dúvida')) {
        response = 'Nosso time de suporte está disponível:\n\n- Seg a Sex: 8h às 18h\n- Sábado: 9h às 13h\n\nTelefone: (11) 1234-5678\nEmail: suporte@exemplo.com';
      }
      else {
        response = 'Entendi sua mensagem sobre "' + userMessage + '". Infelizmente não encontrei uma resposta específica. Por favor, tente ser mais específico ou escolha uma das opções abaixo.';
        quickOptions.style.display = 'flex';
      }
      
      addBotMessage(response);
    }