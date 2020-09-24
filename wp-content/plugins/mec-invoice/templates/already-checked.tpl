<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>[[Already Checked]]</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        }

        .mec-qrcode-successfull-notice {
            background-color: transparent;
            background-image: linear-gradient(135deg, #49d5dc 0%, #15bbcc 45%, #25de80 100%);
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

        /* Already checked */
        .mec-qrcode-ticket-button a {
            text-decoration: none;
            color: #fff;
            border: 1px solid #fff;
            border-radius: 5px;
            padding: 10px 35px 12px;
            margin-top: 55px;
            display: inline-block;
            font-size: 16px;
            line-height: 22px;
            transition: all 0.2s ease;
        }

        .mec-qrcode-ticket-button a:hover {
            background: #222;
            border-color: transparent;
        }
    </style>
</head>

<body class="mec-qrcode-successfull-notice">
    <div class="mec-qrcode-content-wrap">
        <div class="mec-qrcode-content">
            <div class="mec-qrcode-ticket-number-box">
                <svg xmlns="http://www.w3.org/2000/svg" width="79" height="79" viewBox="0 0 79 79">
                    <g id="Group_52" data-name="Group 52" transform="translate(-971 -782)">
                        <path id="box" d="M6,0H73a6,6,0,0,1,6,6V73a6,6,0,0,1-6,6H6a6,6,0,0,1-6-6V6A6,6,0,0,1,6,0Z" transform="translate(971 782)" fill="#fff" />
                        <path id="icon" d="M12.227-.6a1.8,1.8,0,0,0,2.546,0l20.7-20.7a1.8,1.8,0,0,0,0-2.546L32.927-26.4a1.8,1.8,0,0,0-2.546,0L13.5-9.514,5.618-17.4a1.8,1.8,0,0,0-2.546,0L.527-14.85a1.8,1.8,0,0,0,0,2.546Z" transform="translate(993 835)" fill="#17d681" />
                    </g>
                </svg>
                <div class="mec-qrcode-ticket-number-text"><span>[[Invoice ID]]</span><span>#{{invoiceID}}</span></div>
            </div>
            <div class="mec-qrcode-ticket-content-box">
                <h3>[[Already Checked!]]</h3>
                <div class="mec-qrcode-ticket-content-information">
                    <div class="mec-qrcode-ticket-content-information-title">[[Event Name]]</div>
                    <div class="mec-qrcode-ticket-content-information-content"><b>{{eventName}}</b></div>
                </div>
                <div class="mec-qrcode-ticket-content-information">
                    <div class="mec-qrcode-ticket-content-information-title">[[Name]]</div>
                    <div class="mec-qrcode-ticket-content-information-content">{{attendeeName}}</div>
                </div>
                <div class="mec-qrcode-ticket-content-information">
                    <div class="mec-qrcode-ticket-content-information-title">[[Email]]</div>
                    <div class="mec-qrcode-ticket-content-information-content">{{attendeeEmail}}</div>
                </div>
                <div class="mec-qrcode-ticket-content-information">
                    <div class="mec-qrcode-ticket-content-information-title">[[Checked Time]]</div>
                    <div class="mec-qrcode-ticket-content-information-content">{{checkedTime}}</div>
                </div>
            </div>
            <div class="mec-qrcode-ticket-button">
                <a href="{{unCheckUrl}}">[[Un-Check Ticket]]</a>
            </div>
        </div>
    </div>
</body>

</html>