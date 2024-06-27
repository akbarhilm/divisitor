<!doctype html>
<html lang="en">

<head>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <meta
        http-equiv="Content-Type"
        content="text/html; charset=UTF-8"
    >

    <style
        media="all"
        type="text/css"
    >
        @media all {
            .btn-primary table td:hover {
                background-color: #1a569d !important;
            }

            .btn-primary a:hover {
                background-color: #1a569d !important;
                border-color: #1a569d !important;
            }
        }

        @media only screen and (max-width: 640px) {

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
    style="font-family: Helvetica, sans-serif; -webkit-font-smoothing: antialiased; font-size: 16px; line-height: 1.3; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #f4f5f6; margin: 0; padding: 0;"
>
    <table
        role="presentation"
        border="0"
        cellpadding="0"
        cellspacing="0"
        class="body"
        style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f4f5f6; width: 100%;"
        width="100%"
        bgcolor="#f4f5f6"
    >
        <tr>
            <td
                style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top;"
                valign="top"
            >&nbsp;</td>
            <td
                class="container"
                style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top; max-width: 600px; padding: 0; padding-top: 24px; width: 600px; margin: 0 auto;"
                width="600"
                valign="top"
            >
                <div
                    class="content"
                    style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 600px; padding: 0;"
                >
                    {{ $slot }}
                </div>
            </td>
            <td
                style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top;"
                valign="top"
            >&nbsp;</td>
        </tr>
    </table>
</body>

</html>
