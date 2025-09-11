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
      
      if (message.includes('produt') || message.includes('catalogo') || message.includes('oferta') || message.includes('produto')) {
        response = 'Nossa linha de produtos inclui:\n\n- Sensor de Vazamento\n- Medidor de Qualidade da Água\n- Filtrador de Torneira\n\nConfira o catálogo completo na aba *Produtos*.';
      } 
      else if (message.includes('login') || message.includes('conta') || message.includes('acessar') || message.includes('entrar')) {
        response = 'Você pode fazer login na aba *Novo Cliente*. \n\nPrecisa de ajuda para recuperar sua senha? Visite a página de Recuperar Senha.';
      }
      else if (message.includes('notícia') || message.includes('novidade') || message.includes('lançamento') || message.includes('promoção')) {
        response = 'Últimas novidades da AquaLimpa:\n\n1. Novos sensores lançados\n2. Promoções de aniversário\n3. Atualizações em políticas de água sustentável\n\nVeja mais em nossa página de *Notícias*.';
      }
      else if (message.includes('suporte') || message.includes('ajuda') || message.includes('dúvida') || message.includes('problema') || message.includes('erro')) {
        response = 'Nosso time de suporte está disponível:\n\n- Seg a Sex: 8h às 18h\n- Sábado: 9h às 13h\n\nTelefone: (11) 1234-5678\nEmail: aqualimpasuporte@exemplo.com';
      }
      else if (message.includes('cadastro') || message.includes('registrar') || message.includes('inscrição')) {
        response = 'Para se cadastrar, acesse a aba *Novo Cliente* e preencha seus dados.\n\nVocê terá acesso ao painel exclusivo para acompanhar seus pedidos e novidades.';
      }
      else if (message.includes('água') || message.includes('sustentabilidade') || message.includes('reutilização')) {
        response = 'A AquaLimpa tem como missão incentivar a reutilização e o uso consciente da água.\n\nConheça mais sobre nossas iniciativas acessando a seção de *Notícias* e nossos produtos.';
      }
      else if (message.includes('compra') || message.includes('comprar') || message.includes('adquirir') || message.includes('preço')) {
        response = 'Você pode adquirir nossos produtos diretamente pela aba *Produtos*.\n\nClique em um produto para ver os detalhes e opções de compra.';
      }
      else {
        response = 'Entendi sua mensagem sobre "' + userMessage + '". Infelizmente não encontrei uma resposta específica. Por favor, tente ser mais específico ou escolha uma das opções abaixo.';
        quickOptions.style.display = 'flex';
      }
      
      addBotMessage(response);
    }