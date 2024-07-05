<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <style media="all" type="text/css">
        @media all {
            .btn-primary table td:hover {
                background-color: #1a569d !important;
            }

            .btn-primary a:hover {
                background-color: #1a569d !important;
                border-color: #1a569d !important;
            }

            .d-flex {
                display: flex;
            }

            .align-items-center {
                align-items: center;
            }

            .align-items-between {

                align-items: space-between;
            }

            .flex-column {
                flex-direction: column;
            }

            .mb-auto {
                margin-bottom: auto;
            }

            .p-2 {
                padding: 0.5rem;
            }

            .text-muted {
                color: #6c757d;
            }

            .w-75 {
                width: 75%;
            }


        }

        @media {

            .main p,
            .main td,
            .main span {
                font-size: 16px !important;
            }

            .wrapper {
                padding: 8px !important;
            }

            .content {
                padding: 0 !important;
            }

            .container {
                padding: 0 !important;
                padding-top: 8px !important;
                width: 100% !important;
            }

            .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important;
            }

            .btn table {
                max-width: 100% !important;
                width: 100% !important;
            }

            .btn a {
                font-size: 16px !important;
                max-width: 100% !important;
                width: 100% !important;
            }
        }

        @media all {
            .ExternalClass {
                width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
                font-size: inherit;
                font-family: inherit;
                font-weight: inherit;
                line-height: inherit;
            }

            .badge {
                --tblr-badge-padding-x: 0.5em;
                --tblr-badge-padding-y: 0.25em;
                --tblr-badge-font-size: 85.714285%;
                --tblr-badge-font-weight: var(--tblr-font-weight-medium);
                --tblr-badge-color: #ffffff;
                --tblr-badge-border-radius: var(--tblr-border-radius);
                display: inline-block;
                padding: var(--tblr-badge-padding-y) var(--tblr-badge-padding-x);
                font-size: var(--tblr-badge-font-size);
                font-weight: var(--tblr-badge-font-weight);
                line-height: 1;
                color: var(--tblr-badge-color);
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: var(--tblr-badge-border-radius);
            }

            .bg-blue {
                --tblr-bg-opacity: 1;
                background-color: rgba(var(--tblr-blue-rgb), var(--tblr-bg-opacity)) !important;
            }
        }
    </style>
</head>

<body
    style="font-family: Helvetica, sans-serif; -webkit-font-smoothing: antialiased; font-size: 16px; line-height: 1.3; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #f4f5f6; margin: 0; padding: 0;">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body"
        style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f4f5f6; width: 100%;"
        width="100%" bgcolor="#f4f5f6">
        <tr>
            <td style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top;" valign="top">&nbsp;
            </td>
            <td class="container"
                style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top; max-width: 600px; padding: 0; padding-top: 24px; width: 600px; margin: 0 auto;"
                width="600" valign="top">
                <div class="content"
                    style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="main"
                        style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border: 1px solid #eaebed; border-radius: 16px; width: 100%;"
                        width="100%">
                        <tr>
                            <td class="wrapper"
                                style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top; box-sizing: border-box; padding: 24px;"
                                valign="top">
                                <center>
                                    <div class="d-flex align-items-center flex-column">
                                        <div class="mb-auto p-2 align-items-center"> <img
                                                src="data:image/png;base64, {!! base64_encode(
                                                    QrCode::format('png')->size(128)->generate($undangan->c_meet_qr),
                                                ) !!} "></div>

                                        <div class="p-2">
                                            <h3>
                                                <small
                                                    class="text-muted">{{ implode(' ', str_split($undangan->c_meet_qr)) }}</small>
                                            </h3>
                                        </div>








                                        <div class="p-2 w-75">
                                           
                                            <div>
                                               
                                                <table 
                                            style="table-layout: fixed; border: 0.5px solid #cfcfcf;
                                                border-right-width:0px;
                                                border-left-width:0px;
                                                width:100%" >
                                            <tr>
                                                <td>
                                                    <small class="text-muted">Tanggal</small>
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    {{ $undangan->d_meet }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <small class="text-muted">Jam</small>
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    {{ $undangan->d_meet_timestart }}
                                                </td>
                                            </tr>

                                        </table>
                                                
                                            </div>
                                        
                                        </div>

                                    </div>

                                </center>
                                <p
                                    style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">
                                <h3> Peraturan Tamu </h3>

                                </p>

                                <p
                                    style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">
                                    <small> Peraturan memasuki PT. Dirgantara Indonesia (Persero) :</small>
                                <p
                                    style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">
                                <p
                                    style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">
                                <ol type="1">
                                    <li>Tamu wajib dalam keadaan sehat</li>
                                    <li>Tamu wajib mematuhi peraturan dan tanda keselamatan</li>
                                    <li>Tamu dilarang membawa senjata tajam dan obat-obatan terlarang</li>
                                    <li>Dilarang mendokumentasi/foto tanpa ijin</li>
                                    <li>Melaksanakan Protokol Kesehatan Covid-19</li>
                                    <li>Masa PPKM: Dimohon Antigen maks. 1x24 Jam atau PCR 3x24 Jam</li>
                                    <li>Melakukan checkin aplikasi Peduli Lindungi di area Lobby</li>
                                    <li>Tamu menunggu di Lobby, dilarang memasuki gedung lain tanpa pendamping
                                        perusahaan</li>
                                    <li>Jika ada pelanggaran, akan ditindak sesuai dengan ketentuan perusahaan</li>
                                </ol>
                                <p
                                    style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">
                            </td>
                        </tr>
                    </table>
                    <div class="footer" style="clear: both; padding-top: 24px; text-align: center; width: 100%;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                            style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;"
                            width="100%">
                            <tr>
                                <td class="content-block"
                                    style="font-family: Helvetica, sans-serif; vertical-align: top; color: #9a9ea6; font-size: 16px; text-align: center;"
                                    valign="top" align="center">
                                    <span style="color: #9a9ea6; font-size: 16px; text-align: center;">


                                        PT. Dirgantara Indonesia (Persero)
                                        <br>
                                        <small>Jl. Pajajaran No. 154. Bandung 40174, Indonesia</small>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="content-block powered-by"
                                    style="font-family: Helvetica, sans-serif; vertical-align: top; color: #9a9ea6; font-size: 16px; text-align: center;"
                                    valign="top" align="center">
                                    <span style="color: #9a9ea6; font-size: 16px; text-align: center;">
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
            <td style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top;" valign="top">&nbsp;
            </td>
        </tr>
    </table>
</body>

</html>
