function getFormattedDate(incomingDate) {
    let formatDate = {
        day: incomingDate.getDate(),
        month: incomingDate.getMonth() + 1,
        year: incomingDate.getFullYear(),
        hours: incomingDate.getHours(),
        minutes: incomingDate.getMinutes(),
        weekday: incomingDate.toLocaleString("en-US", {weekday: 'long'})
    }
    function time(hourOrMin) {
        return String(hourOrMin).length === 1 ? '0' + hourOrMin : hourOrMin;
    }
    function date(dayOrMonth) {
        return String(dayOrMonth).length === 1 ? '0' + dayOrMonth : dayOrMonth;
    }
    return `${date(formatDate.day)}.${date(formatDate.month)}.${formatDate.year} ${time(formatDate.hours)}:${time(formatDate.minutes)} ${formatDate.weekday}`;
}
