<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Email</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
        }

        .backarea {
            background: #1df2b5;
            height: 250px;
        }

        .totaltable {
            width: 640px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0px 0px 15px #44444414;

        }

        table {
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #19222e;
            font-weight: 500;
            font-size: 45px;
            letter-spacing: 1px;
            margin: 0 0 20px 0;
        }

        p {
            color: #696969;
            font-size: 14px;
            line-height: 21px;
        }

        a {
            color: #12d099;
            text-decoration: none;
            font-weight: 600;
        }

        h5 {
            font-size: 20px;
            font-weight: 500;
            color: #13ca95;
        }

        h6 {
            font-size: 16px;
            color: #19222e;
            font-weight: 500;
            margin: 10px 0;
        }

        .logoarea {
            text-align: center;
            margin-bottom: 20px;
            width: 100%;
        }

        .totaltableback {
            margin: 50px 0;
            width: 100%;
        }

        .footer {
            width: 640px;
            margin: 0 auto;
            background: #1df2b5;
            padding: 30px;
            box-shadow: 0px 3px 15px #4444443b;
            position: relative;
        }

        .socialicon {
            text-align: center;
        }

        .socialicon li {
            list-style: none;
            display: inline-block;
            padding: 0 10px;
        }

     

        .footer:after {
            position: absolute;
            bottom: 100%;
            right: 50%;
            margin-right: -9px;
            content: ' ';
            width: 0;
            height: 0;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-bottom: 15px solid #1df2b5;
            border-top: 15px solid transparent;
        }

        .footer p {
            text-align: center;
            color: #19222e;
            margin-bottom: 15px;
            font-size: 20px;
        }
        .socialicon li img{width: 22px;}

        @media(max-width:767px) {
            .totaltable {
                width: auto;
            }

            .footer {
                width: auto;
            }

            .totaltableback {
                margin-top: -55%;
            }
        }

    </style>

    </head>

    <body>





        
        
        
    <div class="totaltableback">
        <div class="logoarea">
            <img src="<?php echo $site_url; ?>assets/front/images/logo.png" style="height: 40px;" />
        </div>
        <div class="totaltable">

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <h1 style="text-align: center;"><?php echo $subject; ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;"><img src="<?php echo $site_url; ?>assets/front/images/approved.png" style="height: 80px;margin-bottom: 20px;" /></td>
                        </tr>

                    </tbody>

                </table>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <h5>Hello <?php echo $dear_name; ?>,</h5>
                            </td>
                        </tr>
                        
                        <tr>
                            <tr>
                                <td>
                                    <p> Thanks for choosing Benasmart. We have received a ticket. </p>
                                    <p> Customer Name : <?php echo $customer_name; ?> </p>
                                    <p> Professional Name : <?php echo $professional_name; ?> </p>
                                    <p> Message : <?php echo $message; ?> </p>
                                    <p> Time : <?php echo date('d-M-Y'); ?> </p>
                                </td>
                            </tr>
                            
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="footer">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <p>Stay in Touch</p>
                            <ul class="socialicon">
                                    <li><a href="#"><img src="<?php echo base_url('assets/front/images/'); ?>twitter.png"></a></li>
                                    <li><a href="#"><img src="<?php echo base_url('assets/front/images/'); ?>facebook.png"></a></li>
                                    <li><a href="#"><img src="<?php echo base_url('assets/front/images/'); ?>you-tube.png"></a></li>
                                </ul>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>

    </body>

</html>