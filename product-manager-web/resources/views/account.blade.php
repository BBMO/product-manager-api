<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css" integrity="sha256-ogmFxjqiTMnZhxCqVmcqTvjfe1Y/ec4WaRj/aQPvn+I=" crossorigin="anonymous">
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
            /*display: flex;*/
            /*justify-content: center;*/
            /*align-items: center;*/
            /*flex-direction: column;*/
            margin-top: 100px;
            min-height: 85.6vh;
            min-width: 100vw;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #title {
            font-weight: 900;
            letter-spacing: 0;
            font-size: 1.875em;
            line-height: 40px;
            text-align: center;
            margin-bottom: 1em;
            padding: 0 0 0 4px;
        }

        .bottom_bar {
            height: 11.4vh;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: #FFFFFF  !important;
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
            justify-content: flex-end;
            align-items: center;
            background-color: #FFFFFF;
        }

        .container-fluid {
            padding: 0;
        }

        .navbar-brand {
            margin-left: 1.5em;
        }

        .navbar-toggler {
            margin-right: 1.5em;
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
        }

        .menu a:hover {
            border-bottom: 2px solid #02a658;
        }

        .menu a.active {
            border-bottom: 2px solid #02a658;
        }


        label {
            font-weight: bolder;
        }

        #submit {
            height: 45px;
            width: 120px;
            border-radius: 4px;
            margin-right: auto;
            margin-left: auto;
            transition: all 0.2s linear;
            box-shadow: 1px 3px 2px #9D9DA0;
        }

        input {
            height: 30px;
            border-radius: 4px;
            outline: none;
            margin: 2em 0;
            padding-left: 1em;
            padding-right: 1em;
        }

        form,.form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .form-control {
            width : 240px;
        }


        .bg-danger {
            width: 250px;
            padding: 20px;
            margin: 20px auto 30px;
        }

        @media all and (max-width: 991px) {
            .menu {
                justify-content: flex-start;
                padding: 10px;
            }
        }

    </style>
    <script>
        const updateUserById = async (values) => {
            try {
                const { data } = await axios.put(`/api/user/{{ session()->get('user')->Co_Usuario }}`, {
                    ...values,
                })
                return data
            } catch (ex) {
                alert(ex.message)
                console.error(ex)
                return []
            }
        }

        const getUserById = async () => {
            try {
                const { data } = await axios.get(`/api/user/{{ session()->get('user')->Co_Usuario }}`)

                return data
            } catch (ex) {
                console.error(ex)
                return []
            }
        }


        window.onload = () => {
            getUserById();

            document.getElementById('form').addEventListener('submit', handleSubmit)
        }

        const handleSubmit = function (e) {
            e.preventDefault();
            e.stopPropagation();

            const $name = document.getElementById('name')
            const $email = document.getElementById('email')
            const $phone = document.getElementById('phone')
            const $password = document.getElementById('password')

            if(($password.value).trim().length > 0) {
                updateUserById({
                    name: $name.value,
                    email: $email.value,
                    phone: $phone.value,
                    password: $password.value
                }).then((response) => {
                    if(response.results == 'error') {
                        alert('Failed to update');
                    } else {
                        window.location.href = '/account'
                        alert('Updated');
                    }
                });
            } else {
                updateUserById({
                    name: $name.value,
                    email: $email.value,
                    phone: $phone.value
                }).then((response) => {
                    if(response.results == 'error') {
                        alert('Failed to update');
                    } else {
                        window.location.href = '/account'
                        alert('Updated');
                    }
                });
            }
        }

    </script>
</head>
<body class="antialiased">
<h1 id="title">Product Manager <strong>My Account</strong></h1>
<div class="container">
    <form id="form" method="post" action="/api/user" enctype="application/x-www-form-urlencoded">
        {{ csrf_field() }}

        <label class="form-label" for="name">
            Name:
            <br />
            <input class="form-control"  id="name" type="text" name="name" value="{{session()->get('user')->Nb_Usuario}}"/>
        </label>

        <label class="form-label" for="name">
            Email:
            <br />
            <input class="form-control" id="email" type="email" name="email" value="{{session()->get('user')->Tx_Email}}"/>
        </label>

        <label class="form-label" for="name">
            Phone:
            <br />
            <input class="form-control" id="phone" type="text" name="phone" value="{{session()->get('user')->Nu_Movil}}"/>
        </label>

        <label class="form-label" for="name">
            Password:
            <br />
            <input class="form-control" id="password" type="password" name="password"/>
        </label>

        <br />
        <input id="submit" type="submit" value="Update" class="btn btn-success" />
    </form>
</div>
<div class="bottom_bar navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="navbar-brand" id='bottom_logo'></div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" menu collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="a1 nav-link" href="/" aria-current="page">Home</a>
                </li>
                <li class="nav-item">
                    <a class="a1 nav-link" class="a1" href="/audit" aria-current="page">Audit</a>
                </li>
                <li class="nav-item">
                    <a class="a1 nav-link" class="a1" href="/audit" aria-current="page">Logbook</a>
                </li>
                <li class="nav-item">
                    <a class="a1 nav-link" href="/list" aria-current="page">Products</a>
                </li>
                <li class="nav-item">
                    <a class="a1 nav-link" href="/add-product" aria-current="page">Add product</a>
                </li>
                <li class="nav-item">
                    <a class="a1 nav-link" href="/add-category" aria-current="page">Add category</a>
                </li>
                <li class="nav-item">
                    <a class="a1 nav-link" href="/categories" aria-current="page">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="a1 active nav-link" href="/account" aria-current="page">Edit account</a>
                </li>
                <li class="nav-item">
                    <a class="a1 nav-link" href="/logout" aria-current="page">Sign out</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
