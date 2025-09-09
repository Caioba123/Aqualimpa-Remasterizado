// Função para alternar abas
function openTab(tabName) {
    const tabs = document.querySelectorAll('.tab-content');
    tabs.forEach(tab => tab.classList.remove('active'));
    document.getElementById(tabName).classList.add('active');

    const buttons = document.querySelectorAll('.tab-button');
    buttons.forEach(btn => {
        btn.classList.remove('border-blue-600', 'text-blue-600');
        btn.classList.add('text-gray-500');
    });

    const activeBtn = document.querySelector(`button[onclick="openTab('${tabName}')"]`);
    activeBtn.classList.add('border-blue-600', 'text-blue-600');
    activeBtn.classList.remove('text-gray-500');

    updateOrderSummary();
}


function updateQuantity(productId, change) {
    const input = document.getElementById(`${productId}-quantity`);
    let newValue = Math.max(0, parseInt(input.value) + change);
    input.value = newValue;
    updateOrderSummary();
}


function updateOrderSummary() {
    const products = [
        { id: 'medidor', name: 'Medidor de Parâmetro AP-3000', price: 70, quantity: parseInt(document.getElementById('medidor-quantity').value) },
        { id: 'sensor', name: 'Sensor de Vazamento SV-500', price: 90, quantity: parseInt(document.getElementById('sensor-quantity').value) },
        { id: 'filtro', name: 'Filtrador de Água FA-700G', price: 80, quantity: parseInt(document.getElementById('filtro-quantity').value) }
    ];

    let summaryHTML = '';
    let subtotal = 0;
    let hasItems = false;

    products.forEach(product => {
        if (product.quantity > 0) {
            hasItems = true;
            const totalPrice = product.price * product.quantity;
            subtotal += totalPrice;
            summaryHTML += `
                <div class="flex justify-between py-2 border-b border-gray-100">
                    <span>${product.name} x${product.quantity}</span>
                    <span>R$ ${totalPrice.toFixed(2).replace('.', ',')}</span>
                </div>
            `;
        }
    });

    if (!hasItems) {
        summaryHTML = '<div class="text-gray-600 italic">Selecione produtos para ver o resumo</div>';
    }

    document.getElementById('order-summary').innerHTML = summaryHTML;
    document.getElementById('total').textContent = `R$ ${subtotal.toFixed(2).replace('.', ',')}`;
}


function validateForm() {
    const hasItems = 
        parseInt(document.getElementById('medidor-quantity').value) > 0 ||
        parseInt(document.getElementById('sensor-quantity').value) > 0 ||
        parseInt(document.getElementById('filtro-quantity').value) > 0;

    if (!hasItems) {
        alert('Por favor, selecione pelo menos um produto para continuar.');
        openTab('products');
        return false;
    }

    // Submete o formulário
    document.getElementById('order-form').submit();
}


updateOrderSummary();
