
<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <script  type="text/javascript">
var dato1 = JSON.parse(document.getElementById('dato1').value);
var dato2 = JSON.parse(document.getElementById('dato2').value);
var dato3 = JSON.parse(document.getElementById('dato3').value);
var dato4 = JSON.parse(document.getElementById('dato4').value);
var dato5 = JSON.parse(document.getElementById('dato5').value);
var bita = dato1[0].bita;
var hist = dato2[0].hist;
var viv = dato3[0].viv;
var prov = dato4[0].prov;
var prod = dato5[0].prod;
var ctx = document.getElementById('myChart').getContext('2d');
console.log(ctx);
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Bitacora', 'Historial', 'Viveres', 'Proveedores', 'Productos'],
        datasets: [{
            label: 'Registros',
            data: [bita, hist, viv, prov, prod],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script  type="text/javascript">
var dato1 = JSON.parse(document.getElementById('dato1').value);
var dato2 = JSON.parse(document.getElementById('dato2').value);
var dato3 = JSON.parse(document.getElementById('dato3').value);
var dato4 = JSON.parse(document.getElementById('dato4').value);
var dato5 = JSON.parse(document.getElementById('dato5').value);
var bita = dato1[0].bita;
var hist = dato2[0].hist;
var viv = dato3[0].viv;
var prov = dato4[0].prov;
var prod = dato5[0].prod;
var ctx = document.getElementById('myChart2').getContext('2d');
console.log(ctx);
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Bitacora', 'Historial', 'Viveres', 'Proveedores', 'Productos'],
        datasets: [{
            label: 'Registros',
            data: [bita, hist, viv, prov, prod],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script type="text/javascript">

    let myBox2 = document.getElementById('precio').value;
    let myBox1 = document.getElementById('cantidad').value; 
    let importe = document.getElementById('importe'); 
    let myResult = myBox2 * myBox1;
        importe.value = myResult;

    function calculate() {
        let myBox2 = document.getElementById('precio').value;
        let myBox1 = document.getElementById('cantidad').value; 
        let importe = document.getElementById('importe'); 
        let myResult = myBox2 * myBox1;
            importe.value = myResult;
    }
    
</script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
