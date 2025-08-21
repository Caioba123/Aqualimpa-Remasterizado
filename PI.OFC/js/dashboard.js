
        function checkPassword() {
        const input = document.getElementById("passwordInput").value;
        const correctPassword = "aqualimpa0110";

        if (input === correctPassword) {
            document.getElementById("loginScreen").style.display = "none";
        } else {
            document.getElementById("errorMessage").style.display = "block";
        }
        }

    // Bloqueia conteúdo até digitar a senha
        document.body.style.overflow = 'hidden';
        window.addEventListener('load', () => {
        const loginScreen = document.getElementById('loginScreen');
        if (loginScreen) {
            loginScreen.style.display = 'flex';
        }
        });



        // Toggle Sidebar
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        // Charts
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        const distributionCtx = document.getElementById('distributionChart').getContext('2d');

        // Sales Chart
        const salesChart = new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                datasets: [{
                    label: 'Vendas 2025',
                    data: [8500, 9200, 10200, 11500, 12500, 13300, 14200, 15000, 14000, 13200, 11800, 10500],
                    borderColor: '#4361ee',
                    backgroundColor: 'rgba(67, 97, 238, 0.1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'R$' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });

        // Distribution Chart
        const distributionChart = new Chart(distributionCtx, {
            type: 'doughnut',
            data: {
                labels: ['Filtro de água', 'Sensor de vazamento', 'Medidor de parametros'],
                datasets: [{
                    data: [50, 30, 20,],
                    backgroundColor: [
                        '#4361ee',
                        '#3f37c9',
                        '#4895ef',
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    }
                }
            }
        });