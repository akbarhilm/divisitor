<x-mail>
    <x-mail.preview>
        {{ config('app.name') }} - Ask
    </x-mail.preview>
    <x-mail.content>
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
                        align="left"
                        valign="top"
                    >
                        <x-mail.paragraph>
                            Yth. Bapak/Ibu <b> @capitalize($name) </b>
                        </x-mail.paragraph>
                    </td>
                    <td
                        align="right"
                        valign="top"
                    >
                        <x-mail.badge>
                            Status: <b>Open</b>
                        </x-mail.badge>
                    </td>
                </tr>
            </tbody>
        </table>
        <x-mail.paragraph>
            Terimakasih telah menggunakan layanan <b>Ask</b> di Known Error Database, berikut Nomor Tiket dari
            pertanyaan Bapak/Ibu <b>{{ $ticket }}</b>
        </x-mail.paragraph>
        {{-- <x-mail.button href="http://10.1.95.38/history/activity/ask/{{ $ticket }}">
            Lihat Tiket
        </x-mail.button> --}}
        <x-mail.paragraph>
            <i>Link</i> menuju jawaban akan kami kirimkan melalui email.
        </x-mail.paragraph>
        <x-mail.paragraph>
            Terimakasih,
            <br>
            Salam.
        </x-mail.paragraph>
    </x-mail.content>
    <x-mail.footer>
        IT Support • 5720
        <br>
        Divisi Teknologi Informasi
        <br>
        PT. Dirgantara Indonesia
        <br>
    </x-mail.footer>
</x-mail>
