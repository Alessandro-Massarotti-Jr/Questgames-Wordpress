window.onload = function(){
    document.getElementById('bannerNav1').checked = true;
    banner1()
}

function banner1() {
    const banner = document.getElementById('bannerHome')
    banner.style.transform = 'translate(0)'
    setTimeout(function () {
        document.getElementById('bannerNav2').checked = true;
        banner2()
    }, 5000);
}

function banner2() {
    const banner = document.getElementById('bannerHome')
    banner.style.transform = 'translate(-33.333333%)'
    setTimeout(function () {
        document.getElementById('bannerNav3').checked = true;
        banner3()
    }, 5000);
}

function banner3() {
    const banner = document.getElementById('bannerHome')
    banner.style.transform = 'translate(-66.666666%)'
    setTimeout(function () {
        document.getElementById('bannerNav1').checked = true;
        banner1()
    }, 5000);
}