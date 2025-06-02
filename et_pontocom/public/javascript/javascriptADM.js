var ctxDireita = document.getElementById('myChartDireita').getContext('2d');
var ctxEsquerda = document.getElementById('myChartEsquerda').getContext('2d');


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
      borderWidth: 2
    }]
  },
  options: {
    resoponsive: true,
    maintainAspectRatio: false,
    layout: {
      padding: 40
    },
    plugins: {
      legend: {
        position: 'right', // Posiciona as legendas à direita
        labels: {
            boxWidth: 20,
            padding: 30,
            font: {
              size: (context) => {
                const width = context.chart.width;
                if (width >= 596) return 27;
                if (width < 596) return 18;
                return 12;
            },
          }
        }
      },
      title: {
        display: true,
        text: 'Top 5 Regiões',
        font: {
          size: (context) => {
            const width = context.chart.width;
            if (width >= 596) return 40;
            if (width < 596) return 18;
            return 12;
          }
        },
        padding: {
          top: 20,
          bottom: 30,
        }
      }
    }
  }
});

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
    resoponsive: true,
    maintainAspectRatio: false,
    layout: {
      padding: 40
    },
    plugins: {
      legend: {
        position: 'right', 
        labels: {
            boxWidth: 20,
            padding: 30,
            font: {
              size: (context) => {
                const width = context.chart.width;
                if (width >= 596) return 27;
                if (width < 596) return 20;
                return 12;
            },
          }
        }
      },
      title: {
        display: true,
        text: 'Top 5 Vendedores', 
        font: {
          size: (context) => {
            const width = context.chart.width;
            if (width >= 596) return 40;
            if (width < 596) return 18;
            return 12;
          }
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