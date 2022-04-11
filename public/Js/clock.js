
function realtimeClock() {
    let date = new Date();

    let hour = date.getHours();
    let min = date.getMinutes();
    let sec = date.getSeconds();

    let year = date.getFullYear();
    let month = date.getMonth()+1;
    let day = date.getDate();
    month = ("0" + month).slice(-2);
    day = ("0" + day).slice(-2);
    hour = ("0" + hour).slice(-2);
    min = ("0" + min).slice(-2);
    sec = ("0" + sec).slice(-2);

    document.getElementById("datetime").innerHTML = day + "/" + month + "/" + year + " " + hour + ":" + min + ":" + sec;
    setTimeout(realtimeClock, 500);
}
