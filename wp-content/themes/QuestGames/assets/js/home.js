window.onload = function(){
    document.getElementById('bannerNav1').checked = true;
    banner1()
}

var timer1
var timer2
var timer3
function banner1() {
    clearTimeout(timer2);
    clearTimeout(timer3);
    const banner = document.getElementById('bannerHome')
    banner.style.transform = 'translate(0)'
    timer1 = setTimeout(function () {
        document.getElementById('bannerNav2').checked = true;
        banner2()
    }, 5000);
}

function banner2() {
    clearTimeout(timer1);
    clearTimeout(timer3);
    const banner = document.getElementById('bannerHome')
    banner.style.transform = 'translate(-33.333333%)'
    timer2 = setTimeout(function () {
        document.getElementById('bannerNav3').checked = true;
        banner3()
    }, 5000);
}

function banner3() {
    clearTimeout(timer1);
    clearTimeout(timer2);
    const banner = document.getElementById('bannerHome')
    banner.style.transform = 'translate(-66.666666%)'
    timer3 = setTimeout(function () {
        document.getElementById('bannerNav1').checked = true;
        banner1()
    }, 5000);
}