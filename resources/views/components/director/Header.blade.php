<header class="led bg-gray-900 text-white flex items-center justify-between p-4 tamañoletra">      
    <div>           
     <h1 class="tamañoletra">COLEGIO FROEBEL</h1>
   
    </div>



    <button
        id="change-bg-btn"
        class="px-3 py-2 bg-purple-600 text-white rounded-lg shadow-lg hover:bg-purple-700 focus:outline-none"
    >
        Cambiar Fondo
    </button>

    <script>
        document.getElementById('change-bg-btn').onclick = () => {
            document.getElementById('main-body').style.backgroundImage = "url('/images/fondoblanco.png')";
        };
    </script>












    
</header>
