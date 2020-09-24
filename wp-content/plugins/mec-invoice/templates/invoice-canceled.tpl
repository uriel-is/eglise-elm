<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo __('Permission Denied', 'mec-invoice'); ?></title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        }

        .mec-qrcode-successfull-notice {
            background-color: transparent;
            background-image: linear-gradient(135deg, #FF7E7E 0%, #f9304c 45%, #f9304c 100%);
            padding: 0;
            margin: 0;
        }

        .mec-qrcode-content-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .mec-qrcode-content-wrap .mec-qrcode-content {
            width: 500px;
            text-align: left;
        }

        .mec-qrcode-ticket-number-box {
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.12);
            padding: 25px 45px 20px 25px;
        }

        .mec-qrcode-ticket-number-box svg {
            display: inline-block;
            box-shadow: 0px 10px 30px 0 rgba(0, 0, 0, 0.10);
            margin-right: 20px;
        }

        .mec-qrcode-ticket-number-text {
            display: inline-block;
            vertical-align: top;
            padding-top: 8px;
            font-size: 23px;
            color: #fff;
        }

        .mec-qrcode-ticket-number-text span {
            display: block;
        }

        .mec-qrcode-ticket-content-box h3 {
            font-size: 41px;
            margin: 0;
            color: #fff;
            text-transform: uppercase;
            margin-top: 24px;
            margin-bottom: 32px;
        }

        .mec-qrcode-ticket-content-information {
            clear: both;
            color: #fff;
            margin-bottom: 10px;
        }

        .mec-qrcode-ticket-content-information-title {
            display: inline-block;
            width: 40%;
            font-size: 21px;
            font-weight: 500;
            vertical-align: middle;
        }

        .mec-qrcode-ticket-content-information-content {
            display: inline-block;
            width: 58%;
            font-size: 21px;
            font-weight: 300;
            vertical-align: middle;
        }

        @media (max-width: 768px) {
            .mec-qrcode-content-wrap .mec-qrcode-content {
                width: 90%;
            }
        }
    </style>
</head>

<body class="mec-qrcode-successfull-notice">
    <div class="mec-qrcode-content-wrap">
        <div class="mec-qrcode-content">
            <div class="mec-qrcode-ticket-number-box">
                <svg xmlns="http://www.w3.org/2000/svg" width="79" height="79" viewBox="0 0 79 79">
                    <g id="Group_53" data-name="Group 53" transform="translate(-971 -782)">
                        <rect id="box" width="79" height="79" rx="6" transform="translate(971 782)" fill="#fff" />
                        <path id="icon" d="M19.437-15.375l8.013-8.013a2.519,2.519,0,0,0,0-3.562l-1.781-1.781a2.519,2.519,0,0,0-3.562,0l-8.013,8.013L6.08-28.731a2.519,2.519,0,0,0-3.562,0L.738-26.95a2.519,2.519,0,0,0,0,3.562l8.013,8.013L.738-7.362a2.519,2.519,0,0,0,0,3.562L2.518-2.019a2.519,2.519,0,0,0,3.562,0l8.013-8.013,8.013,8.013a2.519,2.519,0,0,0,3.562,0L27.45-3.8a2.519,2.519,0,0,0,0-3.562Z" transform="translate(996 837)" fill="#fe0000" />
                    </g>
                </svg>
                <div class="mec-qrcode-ticket-number-text"><span><?php echo __('Ooops!', 'mec-invoice'); ?></span><span><?php echo _e('Invoice Not Found', 'mec-invoice'); ?></span></div>
            </div>
            <div class="mec-qrcode-ticket-content-box">
                <h3><?php echo __('Access Denied!', 'mec-invoice'); ?></h3>
            </div>
        </div>
    </div>
</body>

</html>