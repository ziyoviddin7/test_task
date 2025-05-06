<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

</head>

<body>

    <button>Загрузить</button>
    <div id="news">
        <h3>Нет новостей</h3>
    </div>
    <script type="text/javascript">
        $(function() {
            $('button').click(function() {
                $('#news').load('ajax.php', {
                    'event': 'Начало чемпионата России',
                    'date': '13.07.2013'
                });
            });
        });
    </>

</body>

</html>
