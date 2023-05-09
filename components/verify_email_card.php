<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        /**
* Google webfonts. Recommended to include the .woff version for cross-client compatibility.
*/
        @media screen {
            @font-face {
                font-family: 'Source Sans Pro';
                font-style: normal;
                font-weight: 400;
                src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
            }

            @font-face {
                font-family: 'Source Sans Pro';
                font-style: normal;
                font-weight: 700;
                src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
            }
        }

        /**
* Avoid browser level font resizing.
* 1. Windows Mobile
* 2. iOS / OSX
*/
        body,
        table,
        td,
        a {
            -ms-text-size-adjust: 100%;
            /* 1 */
            -webkit-text-size-adjust: 100%;
            /* 2 */
        }

        /**
* Remove extra space added to tables and cells in Outlook.
*/
        table,
        td {
            mso-table-rspace: 0pt;
            mso-table-lspace: 0pt;
        }

        /**
* Better fluid images in Internet Explorer.
*/
        img {
            -ms-interpolation-mode: bicubic;
        }

        /**
* Remove blue links for iOS devices.
*/
        a[x-apple-data-detectors] {
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
            color: inherit !important;
            text-decoration: none !important;
        }

        /**
* Fix centering issues in Android 4.4.
*/
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }

        body {
            width: 100% !important;
            height: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        /**
* Collapse table borders to avoid space between cells.
*/
        table {
            border-collapse: collapse !important;
        }

        a {
            color: #1a82e2;
        }

        img {
            height: auto;
            line-height: 100%;
            text-decoration: none;
            border: 0;
            outline: none;
        }
    </style>

</head>

<body style="background-color: #e9ecef;">

    <?php
    require "./services/is_verified.php";
    
    if ($verified) {
        $email_verification_msg = "Congratulation! Your Email is Verified Successfully";
        $unsubscribe_msg = "To stop receiving these emails, you can <a href='http://localhost:8080/forum/unsubscribe.php' target='_blank'>unsubscribe</a> at any time.</p> <p style='margin: 0;'>Maharashtra ,India";
    } else {
        $email_verification_msg = "Sorry! Your Email is Verification Failed";
        $unsubscribe_msg = "";
    }
    ?>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">

        <tr>
            <td align="center" bgcolor="#e9ecef">

                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 36px 24px;">
                            <a href="/forum/welcome.php" target="_blank" style="display: inline-block;">
                                <img src='./data/logo.png' style='width:70px ; padding-right:10px;' alt=''> </a>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>

        <tr>
            <td align="center" bgcolor="#e9ecef">

                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor='#FFA73B' align='center' style='padding: 0px 10px 0px 10px;'>
                            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                                <tr>
                                    <td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: ' Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                                        <h2 style='font-size: 40px; font-weight: 400; margin: 2;'><?= $email_verification_msg ?></h2> <img src=' https://img.icons8.com/clouds/100/000000/handshake.png' width='125' height='120' style='display: block; border: 0px;' />
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- start copy -->
                    <tr>
                        <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
                            <p style="margin: 0;">IDescuss,<br> Team</p>
                        </td>
                    </tr>
                    <!-- end copy -->
                </table>
            </td>
        </tr>
        <!-- end copy block -->

        <!-- start footer -->
        <tr>
            <td align="center" bgcolor="#e9ecef" style="padding: 24px;">

                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">



                    <!-- start unsubscribe -->
                    <tr>
                        <td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
                            <p style="margin: 0;"><?php echo ("$unsubscribe_msg"); ?></p>
                        </td>
                    </tr>
                    <!-- end unsubscribe -->
                </table>
            </td>
        </tr>
        <!-- end footer -->
    </table>
    <!-- end body -->
</body>