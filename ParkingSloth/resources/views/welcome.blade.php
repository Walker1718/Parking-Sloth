
<script>
    
    async function login(){

        const email = document.getElementById('email').value;
        const pass = document.getElementById('pass').value;
        console.log(email, pass);
        const url = "{{ url('/api/login') }}";
        console.log(url);
        const data = {
            email,
            pass
        }
        const res = await axios.post(url, data);
        const usuario = res.data;
        if(!usuario){
            alert('Credenciales invalidas');
        }else{
            console.log(usuario)
            localStorage.setItem("usuario", JSON.stringify(usuario));
            const adminUrl = "{{ url('admin') }}"
            window.location.replace(adminUrl);
            //redirect al admin
        }

    }
        
    
</script>

<div>
    <form>
        <input type="email" name="email" id="email"><br>
        <input type="password" name="pass" id="pass"><br>
        <a onclick="login()">Iniciar sesión</a>
    </form>
</div>
<script src="{{ mix('js/app.js') }}" defer></script>