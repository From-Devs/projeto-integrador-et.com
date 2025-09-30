var ctxDireita = document.getElementById('myChartDireita').getContext('2d');
var ctxEsquerda = document.getElementById('myChartEsquerda').getContext('2d');

// Gráfico à esquerda
var myChartEsquerda = new Chart(ctxEsquerda, {
  type: 'doughnut', // Tipo de gráfico
  data: {
    labels: ['Vendedor 1', 'Vendedor 2', 'Vendedor 3', 'Vendedor 4', 'Vendedor 5'],
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
        text: 'Top 5 Vendedores', // Texto do título
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
  type: 'doughnut',
  data: {
    labels: ['Centro Oeste', 'Sul', 'Norte', 'Nordeste', 'Sudeste'],
    
    datasets: [{
      label: 'Vendas',
      data: [12, 19, 3, 5, 2],
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
        position: 'bottom', 
        labels: {
          boxWidth: 20,
          padding: 15
        }
      },
      title: {
        display: true,
        text: 'Top 5 Regiões', // Texto do título
        font: {
          size: 28, // Tamanho grande do título
          weight: 'bold',
        },
        padding: {
          top: 20,
          bottom: 30,
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