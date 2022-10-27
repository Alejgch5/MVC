//funcion que se encarga de la gráfica de barras
function graficasBar() {

  //obtiene los datos del input con el id="datosGraficaMesValor"
  var datos = document.getElementById("datosGraficaMesValor").value;

  // Obtener una referencia al elemento canvas del DOM
  //separa los datos del array y tiene la , como delimitador
  var ventasMes = datos.split(",");

  //obtiene el area donde se mostrará la gráfica
  var ctx = document.getElementById("myAreaChart");

  //var etiquetas = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
  // Las etiquetas son las que van en el eje X.
  //obtiene los datos del input con el id="datosGraficaMes"
  var etiquetas = document.getElementById("datosGraficaMes").value;

  //separa los datos del array y tiene la , como delimitador
  var mes = etiquetas.split(",");
  // Podemos tener varios conjuntos de datos

  //aquí se tiene toda la información necesaria para mostrar la gráfica de "las ventas por mes"
  var datosVentasMes= {
    label: "Total Ventas ",

    // data: [10000, 1700, 5000, 5989], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: "rgba(255, 159, 64, 0.2)", // Color de fondo
    borderColor: "rgba(255, 159, 64, 1)", // Color del borde
    borderWidth: 1, // Ancho del borde
    data: ventasMes, //datos que se obtienen del input
  };

  new Chart(ctx, {
    type: "bar", // Tipo de gráfica
    data: {
      labels: mes, //etiquetas
      datasets: [
        datosVentasMes,
        // Aquí los datos a mostrar...
      ],
    },
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0,
        },
      },
      scales: {
        xAxes: [
          {
            time: {
              unit: "date",
            },
            gridLines: {
              display: false,
              drawBorder: false,
            },
            ticks: {
              maxTicksLimit: 6,
            },
          },
        ],
        yAxes: [
          {
            ticks: {
              maxTicksLimit: 7,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function (value, index, values) {
                return number_format(value);
              },
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2],
            },
          },
        ],
      },
      legend: {
        display: false,
      },
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: "#6e707e",
        titleFontSize: 14,
        borderColor: "#dddfeb",
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: "index",
        caretPadding: 10,
        callbacks: {
          label: function (tooltipItem, chart) {
            var datasetLabel =
              chart.datasets[tooltipItem.datasetIndex].label || "";
            return datasetLabel + ": " + number_format(tooltipItem.yLabel);
          },
        },
      },
    },
  });
}
//funcion que se encarga de la gráfica pastel
function graficasPie() {

  //obtiene los datos del input con el id="datosGraficaGenero3"
  var datos2 = document.getElementById("datosGraficaGenero").value;
  
  // Obtener una referencia al elemento canvas del DOM
 //separa los datos del array y tiene la , como delimitador
  var genero2 = datos2.split(",");

  // Pie Chart Example
  //obtiene el area donde se mostrará la gráfica
  var ctx2 = document.getElementById("myPieChart");

  //aquí se tiene toda la información necesaria para mostrar la gráfica de "genero"
  var myPieChart = new Chart(ctx2, {
    type: "doughnut",
    data: {
      labels: ["Femenino", "Masculino", "Otros"], //etiquetas
      datasets: [
        {
          data: genero2, //datos a mostrar
          backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc"],
          hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf"],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: "#dddfeb",
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false,
      },
      cutoutPercentage: 80,
    },
  });
}
