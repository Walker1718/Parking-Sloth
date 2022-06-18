
<script>
    const usuarioJson = localStorage.getItem("usuario")
    if(usuarioJson){
        const adminUrl = "{{ url('admin') }}"
        window.location.replace(adminUrl);
    }

    async function login(){
        const email = document.getElementById('email').value;
        const pass = document.getElementById('pass').value;
        const url = "{{ url('/api/login') }}";
        const data = {
            email,
            pass
        }
        const res = await axios.post(url, data);
        const usuario = res.data;
        if(!usuario){
            new AWN().alert('Credenciales invalidas');
        }else{
            localStorage.setItem("usuario", JSON.stringify(usuario));
            const adminUrl = "{{ url('admin') }}"
            window.location.replace(adminUrl);
        }
    }
    
</script>

<head>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<div>
    <form>
        <input type="email" name="email" id="email"><br>
        <input type="password" name="pass" id="pass"><br>
        <a onclick="login()">Iniciar sesión</a>
    </form>
</div>
<script src="{{ mix('js/app.js') }}" defer></script>