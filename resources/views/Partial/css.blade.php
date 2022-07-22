<link href='//fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i|Poppins:400,600,700' media='all' rel='stylesheet' type='text/css' />
    <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' />
    <!-- Template Style CSS -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <style type='text/css'>
        .demo-float {
            position: fixed;
            left: 25px;
            bottom: 25px;
            width: 300px;
            background-color: #fff;
            z-index: 99999;
            padding: 15px;
            border-radius: 6px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1)
        }

        .df-logo {
            float: left;
            width: 70px;
            height: 70px;
            background: #f9f9f9 url(https://1.bp.blogspot.com/-mLMq_3OmCeM/YIAN18LwCXI/AAAAAAAAKnk/8_kttoielQ84O9zyr10Vyf0otiNDE4p9gCNcBGAsYHQ/s72-c/540309_389242681126812_957133422_n.jpg);
            margin: 0 10px 0 0
        }

        .rtl .df-logo {
            float: right;
            margin: 0 0 0 10px
        }

        .demo-float h3 {
            color: #000;
            font-size: 17px;
            font-weight: 600;
            margin: 0 0 7px
        }

        .demo-float p {
            font-size: 13px;
            color: #656565;
            line-height: 1.5em;
            margin: 0
        }

        .demo-float a {
            float: left;
            width: 100%;
            height: 28px;
            background-color: #27ae60;
            font-size: 14px;
            color: #fff;
            text-align: center;
            line-height: 28px;
            margin: 15px 0 0;
            border-radius: 2px;
            transition: background .17s ease
        }

        .demo-float a:hover {
            background-color: #2980b9
        }

        .df-hide {
            position: absolute;
            top: 10px;
            right: 13px;
            font-size: 13px;
            color: #333333;
            cursor: pointer;
            transition: color .17s ease
        }

        .rtl .df-hide {
            right: unset;
            left: 13px
        }

        .df-hide:hover {
            color: #e74c3c
        }

        @media (max-width: 880px) {
            .demo-float {
                display: none
            }
        }
    </style>