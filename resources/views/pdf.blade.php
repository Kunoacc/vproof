<html>
<head>
    <meta charset="utf-8">
    <title>Virtual Proof</title>
    <style>
        .page-break {
            page-break-after: always;
        }

        @media print
        {
            .no-print, .no-print *
            {
                display: none !important;
            }

            a[href]:after {
                content: '';
            }
        }
        body{
            font-family: Roboto, sans-serif;
        }
        .top{
            position: relative;
            top: 0;
            width: calc(100vw - 70px);
            height: 60px;
            left: 0;
            display: inline-flex;
            margin-left: 10px;
        }

        .right{
            height: 70px;
            right: 0;
            position: absolute;
        }

        .left{
            width: 20%;
            left: 10px;
            background-color: transparent;
            position: absolute;
        }

        .left img{
            height: 100px;
        }

        .text{
            margin-left: 14%;
            margin-top: 1.2em;
            color: white;
            font-size: 1.2em;
        }

        .proof{
            position: relative;
            margin-top: 80px;
            margin-left: auto;
            margin-right: auto;
        }

        .displayed {
            display: block;
            margin-left: auto;
            margin-right: auto;
            height: auto;
            max-height: 500px;
        }

        .page-break {
            page-break-after: always;
        }

        .buttom{
            position: fixed;
            bottom: 20px;
            right: 20px;
            height: 50px;
            width: 150px;
            color: white;
            font-size: 20px;
            font-weight: bold;
            background: rgba(0, 0, 0, 0.5);
            border: solid 1px transparent;
            border-radius: 0;
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);;
            transition: all 0.5s ease;
        }
        .buttom:hover{
            color: rgba(0, 0, 0, 0.5);
            background: transparent;
            border-radius: 25px;
            border: solid 2.5px rgba(0, 0, 0, 0.5);
            box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
        }
        .buttom:focus{
            outline: none;
        }

        .bottom{
            position: relative;
            bottom: 10px;
            height: 100px;
            width: calc( 100vw - 70px );
        }

        .bottom .right{
            right: 20px;
            left: auto;
            position: absolute;
            width: 20%;
            display: flex;
        }
        .right ul{
            display: inline-flex;
        }
        .right button{
            margin-right: 10px;
            height: 40px;
            width: 80px;
            float: left;
            border: solid 1px transparent;
        }
        .right button:nth-child(2){
            background: blue;
        }
        .bottom .left {
            width: 30%;
            color: #df2262;
            text-transform: none;
            font-size: 18px;
            margin-top: 10px;
        }

        .bottom .centre {
            left: calc( 30% + 20px);
            background-color: transparent;
            position: absolute;
            width: 30%;
            color: rgba(0, 0, 0, 0.75);
            margin-top: 10px;
            text-align: center;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .circle-one {
            position: absolute;
            top: 50;
            right: 0;
        }
        .last_page{
            background: deeppink;
            height: 100%;
            width: calc( 100vw - 25px );
        }
        .img-white{
            display: block;
            background: url("/img/LOGO1.png");
            background-size: 1024px;
            background-position: center center;
            background-repeat: no-repeat;
            padding-top: 200px;
            margin-bottom: 20px;
            margin-left: auto;
            margin-right: auto;
            min-height: 500px;
            width: 1024px;
        }

        .button{
            text-decoration: none;
            margin-left: 20px;
            border-radius: 25%;
            font-family: "Passion One";
            height: 30px;
            width: 100px;
            font-size: 25px;
        }
        .accept{
            color: springgreen;
        }
        .decline{
            color: red;
        }
        .last-text p{
            line-height: 30px;
        }
        .last-text{
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            margin-top: -50vh;
            height: auto;
            font-family: Passion One, serif;
            font-size: 70px;
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>

<div class="first_page">

</div>

<div class="page-break"></div>
<?php
$email = "hello@printanything.com";
$dir = storage_path() .'\\app\\users\\' . auth()->user()->id . '\\' . $name;
$pub_dir = 'app/users/' . auth()->user()->id . '/' . $name;
chdir($dir);
$file_name =  glob("*.{jpg,gif,png,jpeg,PNG,JPG,JPEG}", GLOB_BRACE);
if ($dir){
$files = File::allFiles($dir);
$i = 0;
foreach ($files as $index => $file){
$i = $i + 1?>
<div class="top">

    <div class="right">
        <img src="{{asset('images/bitmap.png')}}" style="height: 80px">
        <div style="width: 100%"><p style="text-align: right">{{date('Y-m-d')}}</p></div>
        <div style="width: 100%"><p style="text-align: right">{{'VPR/' . date('Y') . '/' . date('m') . '/' . '1'}}</p></div>
    </div>

    <div class="left">
        <img src="{{asset('images/1.png')}}">
    </div>

</div>
<div class="proof">
    <img class="displayed" src="<?php echo asset('storage/' . $pub_dir . '/' . $file_name[$index])?>">

</div>
<div class="bottom">
    <div class="left">
        <p>Please kindly review all text, letters, spellings, images and formatting to ensure this virtual proof
            matches your design requirements. Print Anything &trade; Nigeria will not be held liable for any errors
            in production once this virtual proof is approved.</p>
    </div>
    <div class="centre">
        <ul style="list-style: none">
            <li style="text-decoration: underline">Contact Information</li>
            <li><strong>0909-999-9652</strong></li>
            <li><strong style="text-transform: lowercase">{{$email}}</strong></li>
        </ul>
    </div>
    <div class="right">
        <div>
            <ul style="list-style: none">
                <li><A HREF="{{url('/accept/' . $name)}}" class="button accept">Accept</A></li>
                <li><A HREF="{{url('/decline/' . $name)}}" class="button decline">Decline</A> </li>
            </ul>
            <div class="circle-one">
                    <p style="position: absolute;
    top: 17;
    right: 37;
    font-weight: normal;
    font-size: small;"><?php echo $i ;?></p>
            </div>
        </div>
    </div>
</div>
<div class="page-break"></div>
<?php

}
}
?>
<div class="last_page">
    <span class="img-white"></span>
    <div class="last-text">
        <p>We hope you like your designs</p>
        <p>Please kindly refer back</p>
        <p>with corrections</p>
        <p>as soon as possible</p>
    </div>
</div>

<button onclick="myFunction()" class="buttom no-print">Print</button>

<script>
    page.evaluate(function() {
        [].slice.call(document.querySelectorAll("a[href]")).forEach(function (a) {
            var e = document.createEvent('MouseEvents');
            e.initMouseEvent('click', true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);

            a.dispatchEvent(e);
            waitforload = true; //for putting some delay to load the page properly
        });
    });

    function myFunction() {
        window.print();
    }

</script>

</body>
</html>