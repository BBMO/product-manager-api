<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: rgb(247, 247, 247);
                /* background: #02a658; */
                /* #fbf11f */
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                min-height: 85.6vh;
                min-width: 100vw;
            }

            #title {
                font-weight: 900;
                letter-spacing: 0;
                font-size: 1.875em;
                line-height: 40px;
                text-align: center;
                margin: 1em 0;
                padding: 0 0 0 4px;
            }

            .body {
                text-align: center;
                position: relative;
                display: flex;
                margin: 0 auto;
                margin-bottom: 50px;
                margin-top: 50px;
            }

            .img {
                margin: 0 auto;
                display: block;
                border-radius: 50%;
                border: 8px solid #fbf11f;
            }

            .top {
                height: 200px;
                width: 200px;
                border-radius: 4px;
            }

            .bottom-bar {
                height: 11.4vh;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                padding: 0 1em;
                background-color: #FFFFFF;
                display: flex;
                justify-content: space-around;
                align-items: center;
                box-shadow: 0px 1px 2px rgba(0,0,0,.1);
            }

            #bottom_logo {
                background-image: url('/top_logo.png');
                width: 108px;
                height: 50px;
                background-size: 100%;
                background-position: center;
            }

            .menu {
                display: flex;
                justify-items: center;
                align-items: center;
            }

            .menu a {
                color: #434343;
                border-bottom: 2px solid #FFFFFF;
                font-weight: normal;
                display: block;
                letter-spacing: 0;
                margin: 0 1em;
                padding: 1em;
                transition: border 0.2s linear;
                text-align: center;
                text-decoration: none;
            }

            .menu a:hover {
                border-bottom: 2px solid #02a658;
            }

            .menu a.active {
                border-bottom: 2px solid #02a658;
            }

            .input-container {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: row;
            }

            .input {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                margin: 0 2em;
            }

            .container {
                width: 100%;
            }

            #list-container {
                overflow-y: scroll;
                display: flex;
                justify-content: flex-start;
                align-items: flex-start;
                width: 100%;
                flex-wrap: wrap;
                display: grid;
                grid-template-columns: 25% 25% 25% 25%;
                grid-gap: 2em;
                margin-top: 2em;
            }

            .form-select {
                width: 160px;
                height: 25px;
            }

            .item {
            padding: 1em;
            height: 200px
            }

            #container {
                display: grid;
                grid-template-columns: 50% 50%;
            }

            #list-container {
                width: 80%;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
                margin-left: 10%;
            }

            @media all and (max-width: 768px) {
                #container {
                    grid-template-columns: 100%;
                }
            }

            @media all and (max-width: 425px) {
                .input-container {
                    flex-direction: column;
                }
            }
            
            .input {
                margin-bottom: 25px
            }
            
            .form-select {
                margin-top: -10px
            }
        }
        </style>
        <script>
            let active_category = null

            const getCategories = async () => {
                try {
                    const { data } = await axios.get('/api/category')
                    return data.results || []
                } catch (ex) {
                    console.error(ex)
                    return []
                }
            }

            window.onload = async () => {
                const $cat = document.getElementById('cat')
                const categories = await getCategories()
                console.log(categories)
            }
        </script>
    </head>
    <body class="antialiased">
        <!-- <img class="img" src="/img1.jpeg" /> -->

        <h1 id="title">Product Manager <strong>API</strong></h1>
        <div class='container'>
            <div class='input-container'>
            <div class='input'>
                <label class="form-label" for='cat'>Select Category</label>
                <br />
                <select class="form-select" id='cat'></select>
            </div>
            <div class='input'>
                <label class="form-label" for='cat'>Sub Category</label>
                <br />
                <select class="form-select" id='sub-cat'></select>
            </div>
            </div>

            <div id='list-container'>
                <div class='item'>
                    Co_Producto
                    <br />
                    Nb_Producto
                    <br />
                    Co_Poducto_Categoria
                    <br />
                    St_Activo
                    <br />
                    Co_Auditoria (link to details)
                </div>
            </div>
        </div>

        <div class="bottom-bar">
            <div id='bottom_logo'></div>
            <div class="menu">
                <a class="a1" href="/">Home</a>
                <a class="a1 active" href="/list">Products</a>
                <a class="a1" href="/add-category">Add category</a>
                <a class="a1" href="/categories">Categories</a>
            </div>
        </div>
    </body>
</html>
