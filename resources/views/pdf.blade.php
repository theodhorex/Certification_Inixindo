<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        @font-face {
            font-family: 'geinspira';
            src: url('{{ public_path('fonts/ge_inspira_normal_3af3d90b4f8ef12e491557b9603e3245.ufm') }}') format("truetype");
        }

        @font-face {
            font-family: 'bookman-old-style';
            src: url('{{ public_path('fonts/bookman old style.ufm') }}') format("truetype");
        }

        @page {
        size: A4 landscape;
        orientation: landscape;
        margin: .1cm 0cm;
        }
        .wrapper #nama_peserta, #materi, #periode, #nomor_certificate{
            text-align: center;
            color: black;
            z-index: 100;
            position: absolute;
        }
        .wrapper{
            position: relative;
            height: 500px;
            width: 1073px;
            float: right;
        }
        .img-wrapper{
            position: relative;
        }
        .img-wrapper img{
            width: 100%;
            position: absolute;
            justify-content: center;
        }
        .wrapper #periode{
            font-size: 24px;
            bottom: -40px;
            left: 160px;
            font-family: geinspira, sans-serif;
            font-style: italic;
            font-weight: light; 
        }
        .wrapper #nama_peserta{
            font-size: 40px;
            bottom: 130px;
            justify-content: center;
            width: 100%;
            font-family: geinspira, sans-serif;
        }
        .wrapper #materi{
            font-size: 30px;
            justify-content: center;
            width: 100%;
            bottom: 15px;
            font-family: geinspira, sans-serif;
        }
        .wrapper #nomor_certificate{
            left: 920px;
            top: 30px;
            font-size: 19px;
            font-weight: lighter;
            /* font-family: bookman-old-style, sans-serif; */
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="img-wrapper">
        <img src="{{ public_path('pdf-folder/pdf-jpg-bg.jpg') }}" alt="">
    </div>
    <div class="wrapper">
        <h3 id="nomor_certificate">No. {{ str_ireplace(['[', ']', '"'], '', $id) }}</h3>
        <h1 id="nama_peserta">{{ str_ireplace(['[', ']', '"'], '', $nama_peserta) }}</h1>
        <h1 id="materi">{{ str_ireplace(['[', ']', '"'], '', $materi) }}</h1>
        <h1 id="periode">{{ str_ireplace(['[', ']', '"'], '', $dari_kapan) }} - {{ str_ireplace(['[', ']', '"'], '', $sampai_kapan) }}</h1>
    </div>
</body>
</html>