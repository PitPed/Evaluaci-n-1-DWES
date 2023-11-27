const FIBO = document.getElementById("fibo")
const SLIDER = document.getElementById("slider")
const SLIDER_NUM = document.getElementById("num")
sliderValue = SLIDER.value

async function getFibo() {
    const response = await fetch(`exports/fibonacci.php?till=${sliderValue}`)
    let data = await response.text()
    return data
}
SLIDER.oninput = async function () {
    sliderValue = SLIDER.value
    SLIDER_NUM.value = sliderValue;
    FIBO.innerHTML = await getFibo()
}
SLIDER_NUM.oninput = async function () {
    sliderValue = SLIDER_NUM.value
    SLIDER.value = sliderValue;
    FIBO.innerHTML = await getFibo()
}

async function refresh() {
    FIBO.innerHTML = await getFibo()
}
refresh()