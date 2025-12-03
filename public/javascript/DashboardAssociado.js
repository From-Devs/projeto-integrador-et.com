var ctxDireita = document.getElementById('myChartDireita').getContext('2d');
var ctxEsquerda = document.getElementById('myChartEsquerda').getContext('2d');


// Gráfico à esquerda
var myChartEsquerda = new Chart(ctxEsquerda, {
  type: 'doughnut', // Tipo de gráfico
  data: {
    labels: ['Produto 1', 'Produto 2', 'Produto 3', 'Produto 4', 'Produto 5'],
    datasets: [{
      label: 'Vendas',
      data: [12, 19, 3, 5, 2], // Dados para o gráfico
      backgroundColor: [
        'rgba(255, 99, 132)',
        'rgba(54, 162, 235)',
        'rgba(255, 206, 86)',
        'rgba(75, 192, 192)',
        'rgba(153, 102, 255)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    plugins: {
      legend: {
        position: 'bottom', // Posiciona as legendas à baixo
        labels: {
          boxWidth: 20,
          padding: 15
        }
      },
      title: {
        display: true,
        text: 'Top 5 Produtos Mais Vendidos', // Texto do título
        font: {
          size: 28, // Tamanho grande do título
          weight: 'bold',
          borderColor: '#FFFFFF',
        },
        padding: {
          top: 20,
          bottom: 15,
        }
      }
    }
  }
});

// Gráfico à direita
var myChartDireita = new Chart(ctxDireita, {
  type: 'bar',
  data: {
    labels: [
    'Aguardando Confirmação',
    'Em Andamento',
    'Enviado',
    'Concluído',
    'Devolvido',
    'Cancelado'],
    datasets: [{
      label: 'Vendas',
      data: [12, 19, 3, 5, 2],
      backgroundColor: [
        '#F1C40F', // Aguardando Confirmação
        '#3498DB', // Em Andamento
        '#9B59B6', // Enviado
        '#2ECC71', // Concluído
        '#E67E22', // Devolvido
        '#E74C3C'  // Cancelado
      ],
      borderColor: [
        '#D4AC0D',
        '#2E86C1',
        '#884EA0',
        '#28B463',
        '#CA6F1E',
        '#CB4335'
      ],
      borderWidth: 1
    }]
  },
 options: {
  responsive: true,
  maintainAspectRatio: false,

  plugins: {
    legend: {
      position: 'bottom',
      labels: {
        boxWidth: 18,
        padding: 20,
        font: {
          size: 14,
          weight: '600'
        },
        color: '#333' // cor do texto da legenda
      }
    },

    title: {
      display: true,
      text: 'Status dos Pedidos',
      font: {
        size: 30,
        weight: 'bold',
        family: 'Arial, sans-serif'
      },
      color: '#222',
      padding: {
        top: 25,
        bottom: 35
      }
    },

    tooltip: {
      backgroundColor: 'rgba(0,0,0,0.8)',
      titleFont: { size: 14 },
      bodyFont: { size: 13 },
      padding: 12,
      cornerRadius: 6
    }
  },

  scales: {
    y: {
      beginAtZero: true,
      ticks: {
        font: { size: 14 },
        color: '#444'
      }
    },
    x: {
      ticks: {
        font: { size: 14 },
        color: '#444'
      }
    }
  }
}

});


document.addEventListener("DOMContentLoaded",function(){
  const menuBotoes = document.querySelectorAll(".nav-item");

  menuBotoes.forEach(item => {
      item.addEventListener("click",function(){
          menuBotoes.forEach(el=>el.classList.remove("active"));
          this.classList.add("active");
      });
  });
})