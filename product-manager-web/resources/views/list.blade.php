<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

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

            /*#list-container {
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
            } */

            #list-container {
                display: grid;
                grid-template-columns: 32% 32% 32%;
            }

            .card{
                border: 1px solid transparent;
                cursor: pointer;
                margin: 10px;
            }

            .card:hover {
                border: 1px solid #02a658;
                color: #000 !important;
            }

            .card-body {
                padding: 1em;
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

            const getProducts = async () => {
                try {
                    const { data } = await axios.get('/api/product')
                    return data.results || []
                } catch (ex) {
                    console.error(ex)
                    return []
                }
            }

            const getCategories = async () => {
                try {
                    const { data } = await axios.get('/api/category')
                    return data.results || []
                } catch (ex) {
                    console.error(ex)
                    return []
                }
            }

            const renderItem = cat => {
                return `
                    <div class="item card text-dark bg-light" data-cat='${cat.Co_Poducto_Categoria}'>
                            <a href="/product/${cat.Co_Poducto_Categoria}" class="item card-header" data-cat='${cat.Co_Poducto_Categoria}'>
                                Nb_Producto: ${cat.Nb_Producto}
                            </a>
                            <a href="/product/${cat.Co_Producto}" class="item  card-body" data-cat='${cat.Co_Poducto_Categoria}'>
                                Co_Producto: ${cat.Co_Producto}
                                <br />
                                Co_Poducto_Categoria: ${cat.Co_Poducto_Categoria}
                                <br />
                                St_Activo: ${cat.St_Activo}
                                <br />
                                Co_Auditoria: ${cat.Co_Auditoria}
                                <br />
                            </a>
                        </div>
                    `
            }

            

            window.onload = async () => {
                const $cat = document.getElementById('cat')
                const $subCat = document.getElementById('sub-cat')
                const $producsContainer = document.getElementById('list-container')
                const categories = await getCategories()
                const products = await getProducts()

                $cat.innerHTML = `
                    <option value='all'>All categories</option>
                    ${categories.map(({ Co_Poducto_Categoria, Nb_Poducto_Categoria }) => (`<option value="${Co_Poducto_Categoria}">${Nb_Poducto_Categoria}</option>`))}
                `;

                $subCat.innerHTML = `<option value='all'>All Subcategories</option>`;

                $cat.setAttribute('value', 'all')

                $producsContainer.innerHTML = products.map(prod => {
                    return renderItem(prod)
                })

                $subCat.addEventListener('change', function() {
                    $subCat.setAttribute('value', this.value)
                    const $elms = document.getElementsByClassName('item')
                    const subvValue = this.value
                    const value = $cat.getAttribute('value')

                    if (subvValue === 'all') {
                        for (let i = 0; i < $elms.length; i++) {
                            if ($elms[i].getAttribute('data-cat') !== value) {
                                const all_sub_cat = categories.find(cat => {
                                    if (`${cat.Co_Poducto_Categoria}` === `${value}`) {
                                        return cat.categories
                                    }
                                    return null
                                })
                                const isInSubCategori = all_sub_cat.categories.find(sub => {
                                    console.log(sub.Co_Poducto_Categoria, subvValue)
                                    return (`${sub.Co_Poducto_Categoria}` === $elms[i].getAttribute('data-cat'))
                                })
                                if (isInSubCategori) {
                                    $elms[i].style.display = 'block'
                                } else {
                                    $elms[i].style.display = 'none'
                                }
                            } else {
                                $elms[i].style.display = 'block'
                            }
                        }
                    } else {
                        for (let i = 0; i < $elms.length; i++) {
                            if ($elms[i].getAttribute('data-cat') !== subvValue) {
                                $elms[i].style.display = 'none'
                            } else {
                                $elms[i].style.display = 'block'
                            }
                        }
                    }
                })

                $cat.addEventListener('change', function() {
                    $cat.setAttribute('value', this.value)
                    const $elms = document.getElementsByClassName('item');
                    const subCategories = categories.find(cat => {
                        if (`${cat.Co_Poducto_Categoria}` === `${this.value}`) {
                            return cat.categories
                        }
                        return null
                    })

                    if (subCategories && subCategories.categories) {
                        $subCat.innerHTML = `
                            <option value='all'>All Subcategories</option>
                            ${subCategories.categories.map(({ Co_Poducto_Categoria, Nb_Poducto_Categoria }) => (`<option value="${Co_Poducto_Categoria}">${Nb_Poducto_Categoria}</option>`))}
                        `;
                    } else {
                        $subCat.innerHTML = `<option value='all'>All Subcategories</option>`;
                    }

                    for (let i = 0; i < $elms.length; i++) {
                        if (this.value === 'all') {
                            $elms[i].style.display = 'block'
                        } else {
                            if ($elms[i].getAttribute('data-cat') !== this.value) {
                                const isInSubCategori = subCategories.categories.find(cat => {
                                    console.log(cat.Co_Poducto_Categoria, $elms[i].getAttribute('data-cat'))
                                    return `${cat.Co_Poducto_Categoria}` === `${$elms[i].getAttribute('data-cat')}`
                                })
                                if (isInSubCategori) {
                                    $elms[i].style.display = 'block'
                                } else {
                                    $elms[i].style.display = 'none'
                                }
                            } else {
                                $elms[i].style.display = 'block'
                            }
                        }
                    }
                })
            }
        </script>
    </head>
    <body class="antialiased">

        <h1 id="title">Product Manager <strong>API</strong></h1>
        <div class='container'>
            <div class='input-container'>
            <div class='input'>
                <label class="form-label" for='cat'>Select Category</label>
                <br />
                <select class="form-select" id='cat'></select>
            </div>
            <div class='input'>
                <label class="form-label" for='sub-cat'>Sub Category</label>
                <br />
                <select class="form-select" id='sub-cat'></select>
            </div>
            </div>

            <div id='list-container'>
            </div>
        </div>

        <div class="bottom-bar">
            <div id='bottom_logo'></div>
            <div class="menu">
                <a class="a1" href="/">Home</a>
                <a class="a1" href="/audit">Audit</a>
                <a class="a1 active" href="/list">Products</a>
                <a class="a1" href="/add-product">Add product</a>
                <a class="a1" href="/add-category">Add category</a>
                <a class="a1" href="/categories">Categories</a>
            </div>
        </div>
    </body>
</html>
