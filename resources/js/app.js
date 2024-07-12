import {Html5Qrcode} from "html5-qrcode";
const code = new Html5Qrcode("qr-reader")
// Html5Qrcode.addConfetti()
// const html5QrCode = new Html5Qrcode("qr-reader");
 window.startscan = function(){
var resultContainer = document.getElementById('qr-reader-results');

const qrCodeSuccessCallback = (decodedText, decodedResult) => {


const e = new Event("input");
const element = document.querySelector("input[id='searchu']")
element.value = decodedText;
element.dispatchEvent(e);

code.stop().then((ignore) => {
    console.log(ignore)
    }).catch((err) => {
        console.log(err)
    });
    $("#undangan-modal-form").modal('hide')

};
const config = { fps: 10, qrbox: { width: 250, height: 250 } };
code.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
}


       
$('#undangan-modal-form').on('hidden.bs.modal', function () {
    code.stop().then((ignore) => {
       console.log(ignore)
    }).catch((err) => {
        console.log(err)
    });
});

