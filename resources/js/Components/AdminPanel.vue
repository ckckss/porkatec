<template><header class="rounded-t-md bg-gray-900 py-6">
   <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center">
         <h1 class="text-3xl font-bold text-white">PORKA-TEC | ADMINISTRADOR</h1>
      </div>
   </div>
</header>
   <div class="padre_real rounded-md">
      
      <div class="py-4 px-16 bg-gray-400">
         <ul class="divide-y divide-gray-300">
            <li class="flex items-center py-2">
               <span class="text-lg text-green-300">| 🐖 | Número de cerdas:</span>
               <span class="text-lg font-bold ml-2">{{ totalCerdas }}</span>
            </li>
            <li class="flex items-center py-2">
               <span class="text-lg text-green-300">| 📜 | Número de cubriciones:</span>
               <span class="text-lg font-bold ml-2">{{ totalCubriciones }}</span>
            </li>
            <li class="flex items-center py-2">
               <span class="text-lg text-green-300">| 💊 | Número de medicamentos:</span>
               <span class="text-lg font-bold ml-2">{{ totalMedicamentos }}</span>
            </li>
            <li class="flex items-center py-2">
               <span class="text-lg text-green-300">| 🏭 | Número de naves:</span>
               <span class="text-lg font-bold ml-2">{{ totalNaves }}</span>
            </li>
            <li class="flex items-center py-2">
               <span class="text-lg text-green-300">| 👥 | Número de usuarios:</span>
               <span class="text-lg font-bold ml-2">{{ totalUsuarios }}</span>
            </li>
         </ul>
      </div>


      <div class="bg-gray-400 pb-32 container_padre">
         <div id="container_uno">
            <div id="grafico_uno">
               <canvas id="chart_uno"></canvas>
            </div>
            <div id="grafico_dos"></div>
         </div>
         <div id="container_dos">
            <div id="grafico_tres">
               <div class="w-full text-center text-green-300 text-2xl">
                  <b><b class="text-green-400">MENSUAL |</b> LECHONES DESTETADOS POR CERDA</b>
               </div>
               <canvas id="chart_tres"></canvas>
            </div>
         </div>

      </div>
   </div>
   <div class="bg-gray-400 px-4 pb-6">
      <button @click="exportToPDF"
         class="w-full mx-auto bg-green-300 rounded-md shadow-sm hover:bg-green-400 hover:border-black border-gray-400 border px-4 py-4 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm text-center">
         Exportar a PDF
      </button>
   </div>
   <div class="bg-gray-400 px-4 rounded-b-md pb-6">
      <button @click=""
         class="w-full mx-auto bg-green-300 rounded-md shadow-sm hover:bg-green-400 hover:border-black border-gray-400 border px-4 py-4 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm text-center">
         Backup base de datos
      </button>
   </div>
</template>

<script>

import Chart from "chart.js/auto"
import { jsPDF } from 'jspdf';
import html2canvas from 'html2canvas';

const printCharts = async () => {
   var data = {}
   try {
      const response = await fetch("/api/cubriciones"); // Correct usage of fetch and await
      if (!response.ok) {
         throw new Error('Network response was not ok ' + response.statusText);
      }
      data = await response.json();
   } catch (error) {
      console.error("Error al cargar los datos:", error);
      return; // Exit the function if data load fails
   }
   var cubriciones = data
   renderVivosMuertos(cubriciones)
   renderMonthlyChart(cubriciones)
}

const renderVivosMuertos = cubriciones => {
   const uniqueCubriciones = [...new Set(cubriciones.map(cubricion => cubricion.id_cerda))]

   const vivosPorCerda = uniqueCubriciones.map(currentCerda =>
      cubriciones.filter(cubricion => cubricion.id_cerda === currentCerda)
         .reduce((total, cubricion) => total + cubricion.nacidos_vivos, 0));

   const muertosPorCerda = uniqueCubriciones.map(currentCerda =>
      cubriciones.filter(cubricion => cubricion.id_cerda === currentCerda)
         .reduce((total, cubricion) => total + cubricion.nacidos_muertos, 0));

   const data = {
      labels: uniqueCubriciones,
      datasets: [
         {
            label: ' Vivos',
            data: vivosPorCerda,
            borderColor: 'rgba(68, 209, 136, 1)',
            backgroundColor: 'rgba(68, 209, 136, 0.8)'
         },
         {
            label: ' Muertos',
            data: muertosPorCerda,
            borderColor: 'rgba(26, 104, 64, 1)',
            backgroundColor: 'rgba(26, 104, 64, 0.8)',
         }
      ]
   }

   const options = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
         legend: { position: 'top' }
      },
      scales: {
         x: { stacked: true },
         y: { stacked: true }
      }
   }

   const container = document.getElementById('grafico_uno')
   const canvas = document.getElementById('chart_uno')
   const context = canvas.getContext('2d')

   canvas.width = container.offsetWidth
   canvas.height = container.offsetHeight

   new Chart(context, { type: 'bar', data, options })
}

const renderMonthlyChart = cubriciones => {
   const months = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

   const data = {
      labels: months,
      datasets: getCubricionesMonthly(cubriciones, months)
   };

   const options = {
      responsive: true,
      plugins: {
         legend: { position: 'bottom' },
         tooltip: {
            callbacks: {
               label: function (context) {
                  const y = context.raw.y;
                  return ` Destetados: ${y}`; // Mostrar solo el valor de x (mes)
               }
            }
         }
      },
      scales: {
         x: {
            title: {
               display: true,
               text: 'Mes'
            },
            ticks: {
               callback: function (value, index, values) {
                  return months[value];
               }
            }
         },
         y: {
            title: {
               display: true,
               text: 'Número de destetados'
            }
         }
      }
   };

   const container = document.getElementById('grafico_tres');
   const canvas = document.getElementById('chart_tres');
   const context = canvas.getContext('2d');

   canvas.width = container.offsetWidth;
   canvas.height = container.offsetHeight;

   new Chart(context, { type: 'bubble', data, options });
};

const getCubricionesMonthly = (cubriciones, months) => {
   const dataByCerdaAndMonth = {};

   cubriciones.forEach(cubricion => {
      const id_cerda = cubricion.id_cerda;
      const desteteDate = new Date(cubricion.fecha_destete);
      const month = desteteDate.getMonth();
      const year = desteteDate.getFullYear();
      const key = `${id_cerda}-${year}-${month}`;

      if (!dataByCerdaAndMonth[key]) {
         dataByCerdaAndMonth[key] = {
            id_cerda,
            year,
            month,
            num_destetados: 0
         };
      }

      dataByCerdaAndMonth[key].num_destetados += cubricion.num_destetados;
   });

   const organizedData = Object.values(dataByCerdaAndMonth).reduce((acc, obj) => {
      const cerdaId = obj.id_cerda;
      const monthIndex = obj.month;
      const destetados = obj.num_destetados;
      if (!acc[cerdaId]) {
         acc[cerdaId] = Array.from({ length: months.length }).fill(0);
      }

      acc[cerdaId][monthIndex] = destetados;

      return acc;
   }, {});

   const datasets = Object.entries(organizedData).map(([cerdaId, destetados]) => {
      return {
         label: `Cerda ${cerdaId}`,
         data: destetados.map((num_destetados, monthIndex) => ({
            x: monthIndex, // Usamos el índice del mes como el valor de x
            y: num_destetados,
            r: num_destetados * 0.5 // Ajustamos el radio según el número de destetados
         })),
      };
   });
   return datasets;
};


printCharts()
export default {
   data() {
      return {
         totalCerdas: '',
         totalCubriciones: '',
         totalMedicamentos: '',
         totalNaves: '',
         totalUsuarios: ''
      }
   },
   mounted() {
      this.fetchTotales();
   },
   methods: {
      exportToPDF() {
         const pdf = new jsPDF({
            orientation: 'landscape', // Establecer la orientación en horizontal
            unit: 'mm',
            format: 'a4'
         });

         const container = document.querySelector('.padre_real');

         html2canvas(container).then((canvas) => {
            const imgData = canvas.toDataURL('image/png');

            pdf.addImage(imgData, 'PNG', 0, 0, pdf.internal.pageSize.getWidth(), pdf.internal.pageSize.getHeight());

            pdf.save('graficos.pdf');
         });
      },
      async fetchTotales() {
         try {
            const responseCerdas = await axios.get("/api/cerdas");
            this.totalCerdas = responseCerdas.data.length;

            const responseCubriciones = await axios.get("/api/cubriciones");
            this.totalCubriciones = responseCubriciones.data.length;

            const responseMedicamentos = await axios.get("/api/medicamentos");
            this.totalMedicamentos = responseMedicamentos.data.length;

            const responseNaves = await axios.get("/api/naves");
            this.totalNaves = responseNaves.data.length;

            const responseUsuarios = await axios.get("/api/usuarios");
            this.totalUsuarios = responseUsuarios.data.length;
         } catch (error) {
            console.error("Error al cargar los datos:", error);
         }
      },
   }
}
</script>

<style>
.container_padre {
   display: grid;
   grid-template-rows: 1fr 1fr;
   gap: 20px;
   height: 100vh;
   padding: 20px;
   box-sizing: border-box;
}

#container_uno {
   display: flex;
   gap: 20px;
   width: 100%;
}

#grafico_uno,
#grafico_dos {
   border: 1px solid #000;
   padding: 20px;
   box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
   flex: 1;
   width: 40%;
   height: 100%;
   box-sizing: border-box;
}

#grafico_tres {
   border: 1px solid #000;
   padding: 20px;
   box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
   height: 100%;
   box-sizing: border-box;
}

#container_dos {
   width: 100%;
}

canvas {
   height: 100%;
   width: 100%;
}
</style>
