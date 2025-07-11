<script setup>
import VueBarcode from "@chenfengyuan/vue-barcode";
import html2canvas from "html2canvas";

const props = defineProps({
    barcode: String,
});

function downloadBarCode() {
    html2canvas(document.querySelector("#barcode")).then((canvas) => {
        var barcodeImgTag = document.createElement("a");
        document.body.appendChild(barcodeImgTag);
        barcodeImgTag.download = "Barcode.jpg";
        barcodeImgTag.href = canvas.toDataURL();
        barcodeImgTag.target = "_blank";
        barcodeImgTag.click();
    });
}
</script>

<template>
    <div class="card">
        <div class="card-body">
            <div id="barcode" ref="barCodeDiv">
                <VueBarcode
                    ref="BarImg"
                    :value="props.barcode"
                    tag="img"
                    :options="{ displayValue: true, lineColor: '#2B2B2C' }"
                >
                </VueBarcode>
            </div>
            <div class="">4April2025</div>
        </div>
    </div>
</template>

<style scoped>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: #2c3e50;
    margin-top: 60px;
}
button {
    height: 40px;
    width: 310px;
    background-color: green;
    color: white;
    border: none;
    border-radius: 0.5rem;
    font-size: medium;
    display: block;
    margin-top: 1.3rem;
}
input {
    height: 30px;
    width: 300px;
    padding: 5px;
    font-size: 1rem;
    border-radius: 7px;
}
</style>
