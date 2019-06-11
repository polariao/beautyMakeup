<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Show Time Page</title>
</head>
<body>

<a id="time"></a><a id="bjtime"></a>

<script type="text/javascript">
    /*
      进入页面加载的方法
    */
    window.onload=function()
    {
        var date=new Date(),time=date.getTime();
        setInterval(function() {set(time);time = Number(time);time += 1000;},1000);
        setTodayDate(date);
    }

    /*
     设置日期的方法，针对年月日星期的显示
    */
    function setTodayDate(today)
    {
        var years,months,dates,weeks, intYears,intMonths,intDates,intWeeks,today,timeString;

        intYears = today.getFullYear();//获得年
        intMonths = today.getMonth() + 1;//获得月份+1
        intDates = today.getDate();//获得天数
        intWeeks = today.getDay();//获得星期

        years = intYears + '年     ';

        if(intMonths < 10){
            months = '0' + intMonths + '月';
        }else{
            months = intMonths + '月';
        }

        if(intDates < 10){
            dates = '0' + intDates + '日     ';
        }else{
            dates = intDates + '日     ';
        }

        var weekArray = new Array(7);
        weekArray[0] = '星期日';
        weekArray[1] = '星期一';
        weekArray[2] = '星期二';
        weekArray[3] = '星期三';
        weekArray[4] = '星期四';
        weekArray[5] = '星期五';
        weekArray[6] = '星期六';
        weeks =weekArray[intWeeks] + ' ';

        timeString = years + months + dates + weeks;

        document.getElementById('time').innerHTML=timeString;
    }

    /*
      设置北京时间的方法，针对时分秒的显示
    */
    function set(time)
    {
        var beijingTimeZone = 8;
        var timeOffset = ((-1 * (new Date()).getTimezoneOffset()) - (beijingTimeZone * 60)) * 60000;
        var now = new Date(time - timeOffset);
        document.getElementById('bjtime').innerHTML = p(now.getHours())+':'+p(now.getMinutes())+':'+p(now.getSeconds());
    }

    /*
      格式化时间的显示方式
    */
    function p(s)
    {
        return s < 10 ? '0' + s : s;
    }

</script>
</body>
</html>