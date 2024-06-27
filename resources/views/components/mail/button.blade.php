@props([
    'href' => '#',
])

<table
    role="presentation"
    border="0"
    cellpadding="0"
    cellspacing="0"
    class="btn btn-primary"
    style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%; min-width: 100%;"
    width="100%"
>
    <tbody>
        <tr>
            <td
                align="center"
                style="font-family: Helvetica, sans-serif; font-size: 16px; vertical-align: top; padding-bottom: 16px;"
                valign="top"
            >
                <a
                    href="{{ $href }}"
                    target="_blank"
                    style="border: solid 2px #206bc4; border-radius: 4px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 16px; margin: 0; padding: 0.4375rem 1rem; text-decoration: none; background-color: #206bc4; border-color: #206bc4; color: #ffffff;"
                >
                    {{ $slot }}
                </a>
            </td>
        </tr>
    </tbody>
</table>
